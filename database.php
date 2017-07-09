<?php

/**
 * Home slider single query
 *
 * @param $post_type
 * @return WP_Query
 */
function home_slider_single_query($post_type) {
    $args = array(
        'posts_per_page'    => '8',
        'post_type'         => $post_type,
        'order'             => 'DESC',
        'orderby'           => 'date',
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
function home_slider_query() {

    $review_query = home_slider_single_query('review');
    $video_query = home_slider_single_query('tv');
    $post_query = home_slider_single_query('post');

    $all_query = new WP_Query();
    $all_query->posts = array_merge( $review_query->posts, $video_query->posts, $post_query->posts );
    $all_query->post_count = count( $all_query->posts );

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
        'post__in '         => $output
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
    $output = array();
    if (!is_array($artist_id)) {
        $output[] = $artist_id;
    } else {
        $output = $artist_id;
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

function get_related_posts_by_artist_id($artist_id, $post_type, $posts_per_page = 8, $post__not_in = array()) {
	wp_die();
    $args = array(
        'order'             => 'DESC',
        'orderby'           => 'date',
        'posts_per_page'    => $posts_per_page,
        'post_type'         => $post_type,
        'meta_query'        => array(
            array(
                'key'       => 'gArtistName',
                'value'     => $artist_id,
                'compare'   => '='
            )
        ),
        'post__not_in'      => $post__not_in
    );
    $query = new WP_Query( $args );
	echo $query->post_count;
	wp_die();
	
    wp_reset_query();
    return $query;
}


function get_user_review_ratings($review_id) {
    $rating = 6.8;
    return $rating;
}