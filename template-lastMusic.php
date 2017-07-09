<?php 
header("Content-Type: application/json;charset=utf-8");
/**
Template Name: last music web service
*/
require_once('ws/database.php');
global $wpdb;

$key = "5cedbe88767e13dec86f7a6e08c41b3d";

if (!empty($_GET['k']) && $key == $_GET['k']) {
	if (!empty($_GET['t'])) {
		$page = (!empty($_GET['pg']) && isset($_GET['pg'])) ? $_GET['pg'] : 1;
		$count = (!empty($_GET['c']) && isset($_GET['c'])) ? $_GET['c'] : 12;
		$category_type = $_GET['t'];
		
/** mobile application web service category array */
$appMusicCategory = array(
	1 => 'all',
	2 => 'pop',
	3 => 'rock',
	4 => 'traditional',
	5 => 'hot',
	6 => 'tv'
);
switch($category_type) {
	case 2:
	case 3:
	case 4: {
		$args = array(
			'posts_per_page' 	=> $count,
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'post_type'			=> 'music',
			'paged'				=> $page,
			'tax_query' 		=> array(
				array(
					'taxonomy'	=> 'musics',
					'field'		=> 'slug',
					'terms'		=> $appMusicCategory[$category_type]
				)
			)
		);
		break;
	}
	case 5: {
		$args = array(
			'posts_per_page'	=> $count,
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC',
			'meta_key'			=> 'nava_post_views_count',
			'post_type'			=> 'music',
			'paged'				=> $page,
			'date_query '		=> array(
				array(
					'before'	=> '1 week ago'
				)
			)
		);
		break;
	}	
	case 6: {
		$args = array(
			'posts_per_page' 	=> $count,
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'post_type'			=> 'tv',
			'paged'				=> $page,
		);
		break;
	}
	default: {
		$query = 'SELECT * FROM ' . $wpdb->prefix . 'posts WHERE post_type = "music" AND post_parent = 0 ORDER BY post_date LIMIT ' . $count . ' OFFSET ' . $page;

		$stmt = $db->con->prepare($query);
		$stmt->execute();
		$results = $stmt->fetchAll();
		//print_r($results);
		$args = array(
			'posts_per_page' 	=> $count,
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'post_type'			=> 'music',
			'paged'				=> $page,
		);
		break;
	}


}

//print_r($args);
//$query = new WP_Query( $args );
if (count($results) > 0) {
	$return_array = array();
	foreach ($results as $post) {
		$post_id = $post[ID];

		$music_meta = get_post_meta($post_id);
		$artists_names = get_artist_name_by_id($music_meta['gArtistName']);
		$one_artist_name = $artists_names;

		if (!empty($artists_names)) {
			$temp = get_artist_name_by_id($music_meta['gArtistNameOther']);
			foreach($temp as $t) {
				$artists_names[] = $t;
			}
		}
		$artist_name = implode(' Ù ', $artists_names);
		
		$music_name = $music_meta['musicName'][0];
		
		$return_array[] = array(
			'ID' 			=> $post_id, 
			'Image' 		=> get_the_post_thumbnail_url($post_id, 'nava_music_thumbnail'),
			'SingerName' 	=> utf8_encode($artist_name),
			'SongName' 		=> utf8_encode($music_name)
		);
	}
	
	//print_r($return_array);
	echo json_encode($return_array, JSON_UNESCAPED_UNICODE);
} else {
	//redirect_404();
}
	} else {
		//echo '000';
		redirect_404();
	}
} else {
	//echo '001';
	redirect_404();
}