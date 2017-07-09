<?php
//$GLOBAL['post_not_in'] = array();
/**
 * Home slider single query
 *
 * @param $post_type
 * @return WP_Query
 */
function home_slider_single_query($post_type, $posts_per_page) {
    $args = array(
        'posts_per_page'    => $posts_per_page,
        'post_type'         => $post_type,
        'order'             => 'DESC',
        'orderby'           => 'post_date',
        'meta_query'        => array(
            array(
                'key'       => 'homeSlider',
                'value'     => '1',
                'compare'   => '='
            )
        )
    );
    $query = new WP_Query( $args );
    return $query;
}

/**
 * get all queries for slider and merge them together to use on home slider
 *
 * @return WP_Query
 */
 function sortByDate( $a, $b ) {
    return strtotime($a->post_date) - strtotime($b->post_date);
}
function home_slider_query() {

    $review_query = home_slider_single_query('reviews', 5);
	wp_reset_query();
	//print_r($review_query->posts);
    $video_query = home_slider_single_query('tv', 5);
	//print_r($video_query->posts);
	wp_reset_query();
    $post_query = home_slider_single_query('post', 5);
	//$post_query = array();

    $all_query = new WP_Query();
	
    $all_query->posts = array_merge( $review_query->posts, $video_query->posts, $post_query->posts );
	
	
	
	usort($all_query->posts, "sortByDate");
	$a = array_reverse($all_query->posts);
	
	$all_query->posts = array_chunk($a, 5)[0];
    //$all_query->post_count = count( $all_query->posts );
	$all_query->post_count =5;
	//print_r($all_query->posts);
    return $all_query;

}

/**
 * Get artists names by id
 *
 * @param $artist_ids
 * @return array|bool
 */
function get_artist_name_by_id($artist_ids) {
    $output = array();
    if (!is_array($artist_ids)) {
        $output[] = $artist_ids;
    } else {
        $output = $artist_ids;
    }

    $args = array(
        'order'             => 'DESC',
        'orderby'           => 'date',
        'posts_per_page'    => -1,
        'post_type'         => 'wiki',
        'post__in'          => $output
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $names = array();
        while($query->have_posts()) {
            $query->the_post();
            if (in_array(get_the_ID(), $output)) {
                $names[get_the_ID()] = get_the_title();
            }
        }
        wp_reset_query();
        return $names;
    } else {
        return false;
    }
}

function get_artist_by_id($artist_id) {

    global $wpdb;
    $output = array();
    if (is_array($artist_id)) {
        $output = $artist_id;
    } else {
        $output[] = $artist_id;
    }

    $args = array(
        'order'             => 'DESC',
        'orderby'           => 'date',
        'posts_per_page'    => '1',
        'post_type'         => 'wiki',
        'post__in'          => $output
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $artist_post = $query->get_posts()[0];
        return $artist_post;
    } else {
        return false;
    }
}


function get_related_posts_by_artist_id($artist_id, $post_type, $posts_per_page = 8, $post__not_in = array(), $is_random = true, $paged = 1) {
    if ($is_random == true) {
        $args['orderby'] = 'rand';
    } else {
        $args['orderby'] = 'date';

    }
    $args = array(
        'order'             => 'DESC',
        'posts_per_page'    => $posts_per_page,
        'post_type'         => $post_type,
        'post__not_in'      => $post__not_in,
        'paged'             => $paged
    );
    if (!empty($artist_id) && isset($artist_id)) {
        if (is_array($artist_id) && count($artist_id) > 1) {
            $args['meta_query']['relation'] = 'AND';
            foreach($artist_id as $artist) {
                $args['meta_query'][] =  array(
                    'key'       => 'gArtistName',
                    'value'     => $artist,
                    'compare'   => '='
                );
            }
        } else {

            $args['meta_query'][] = array(
                'key'       => 'gArtistName',
                'value'     => $artist_id,
                'compare'   => '='
            );
        }
    } else {
        return false;
    }
    //print_r(get_post($artist_id[0]));
    //print_r($args);

    $query = new WP_Query( $args );
    //echo $query->request;
    //print_r($query->posts);
    //echo $query->post_count;
    //wp_die();
    wp_reset_query();
    return $query;
}


/** Get related posts query */
function get_related_posts($post_id, $post_count, $post_not_in = -1, $post_type = 'post', $orderby = 'rand', $taxonomy = 'post') {
    if (!empty($post_id)) {
        $cat = nava_get_post_term($post_id, $post_type, 'musics');
        $args = array(
            'posts_per_page'    => $post_count,
            'order'             => 'DESC',
            'orderby'           => $orderby,
            'post__not_in'      => $post_not_in,
            'post_type'         => $post_type,
            'tax_query'         => array(
                'terms'     => array($cat->term_id),
                'field'     => 'id',
                'taxonomy'  => $taxonomy
            )
        );
    } else {
        $args = array(
            'posts_per_page'    => $post_count,
            'order'             => 'DESC',
            'orderby'           => 'rand',
            'post__not_in'      => $post_not_in,
            'post_type'         => $post_type
        );
    }

    $query = new WP_Query($args);
    return $query;
}
/** End */

function get_user_review_ratings($review_id) {
    $rating = 6.8;
    return $rating;
}

function nava_get_search_query($post_types, $posts_per_page, $search_word, $offset = '') {
    $args = array(
        'posts_per_page'    => $posts_per_page,
        'post_type'         => $post_types,
        'orderby'           => 'date',
        'order'             => 'DESC',
        's'                 => strip_tags(esc_attr($search_word)),
    );
    if (!empty($offset)) {
        $args['paged'] = $offset;
    }
    $q = new WP_Query( $args );
    if ($q->have_posts()) {
        return $q;
    } else {
        return false;
    }

}

function nava_get_search_wiki_query($search_word, $offset = 0, $posts_per_page = 6) {
	$offset = (int)esc_attr($offset);
	$search_word = esc_sql(sanitize_text_field($search_word));
	//echo $search_word;
	global $wpdb; 
	$request = $search_word; // could be any letter you want
	$sql = "
		SELECT * FROM $wpdb->posts
		WHERE post_title LIKE '$search_word%'
		AND post_type = 'wiki'
		AND post_status = 'publish' 
	    LIMIT ".$posts_per_page;
	
	//echo $offset;
	
	if (!empty($offset)) {
		$sql .= " OFFSET ".$offset;
	}

	//echo $sql;
		
	$results = $wpdb->get_results($sql); 

    
    if (!empty($results)) {
        return $results;
    } else {
        return false;
    }
}

function nava_get_search_wiki_count($search_word) {
	global $wpdb;
    $search_word = esc_sql(sanitize_text_field($search_word));
	$sql = "
	SELECT COUNT(*) as count FROM $wpdb->posts
	WHERE post_title LIKE '$search_word%'
	AND post_type = 'wiki'
	AND post_status = 'publish' ";
	$results = $wpdb->get_results($sql); 
	return $results;
}

function get_most_viewd_musics($count = 10) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $previous_week = strtotime("-1 month ");
    $start_week = $previous_week;
    $end_week = strtotime("next month +2 day",$start_week);

    $start_week = date("Y-m-d H:i:s",$start_week);
    $end_week = date("Y-m-d H:i:s",$end_week);

    //echo $start_week.' '.$end_week ;
    $sql =
        'SELECT * FROM ' . $prefix . 'clicklike' .
        ' JOIN ' . $prefix . 'clicklike_users' .
        ' ON ' . $prefix . 'clicklike.like_id = ' . $prefix . 'clicklike_users.like_id ' .
        ' AND ' . $prefix . 'clicklike_users.create_date BETWEEN "' . $start_week . '" AND "' . $end_week . '"' .
        ' GROUP by ' . $prefix . 'clicklike.post_id' .
        ' ORDER BY ' . $prefix . 'clicklike.likes DESC, ' . $prefix . 'clicklike_users.val DESC LIMIT ' . (int)$count;
	//echo $sql;
    $res = $wpdb->get_results( $sql );
    if (!empty($res)) {
        return $res;
    } else {
        return false;
    }
}