<?php

/* recipes custom post type */
function music_posts_type() {

    /** plural title */
    $pt = 'آهنگ ها';

    /** single title */
    $st = 'آهنگ';

    $cat_name = 'musics';
    $tag_name = 'music-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-format-audio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'music', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'music_posts_type', 0 );

/* end recipes post type */

/* recipes Custom Taxonomy */
function music_taxonomy() {

    /** plural title */
    $pt = 'آهنگ ها';

    /** single title */
    $st = 'آهنگ';

    $cat_name = 'musics';
    $tag_name = 'music-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
       // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'music' ), $args );
    register_taxonomy( $tag_name, array( 'music' ), $tag_args );

}
add_action( 'init', 'music_taxonomy', 0 );

/* end recipes custom taxonomy */


/** Artists Post Type */

function artists_posts_type() {

    /** plural title */
    $pt = 'هنرمندان';

    /** single title */
    $st = 'هنرمند';

    $cat_name = 'wikinode';
    $tag_name = 'wiki-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'wiki', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'artists_posts_type', 0 );


/** End Artists Post Type */

/* Artists Custom Taxonomy */

function artists_taxonomy() {

    /** plural title */
    $pt = 'هنرمندان';

    /** single title */
    $st = 'هنرمند';

    $cat_name = 'wikinode';
    $tag_name = 'wiki-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'wiki' ), $args );
    register_taxonomy( $tag_name, array( 'wiki' ), $tag_args );

}
add_action( 'init', 'artists_taxonomy', 0 );

/* end Artists custom taxonomy */


/** Nava TV custom post type */

function tv_posts_type() {

    /** plural title */
    $pt = 'ویدیوها';

    /** single title */
    $st = 'ویدیو';

    $cat_name = 'videos';
    $tag_name = 'video-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 22,
        'menu_icon'             => 'dashicons-video-alt3',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'tv', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'tv_posts_type', 0 );

/** End Nava TV custom post type */

/** Nava TV custom Taxonomies */

function tv_taxonomy() {

    /** plural title */
    $pt = 'ویدیوها';

    /** single title */
    $st = 'ویدیو';

    $cat_name = 'videos';
    $tag_name = 'video-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'tv' ), $args );
    register_taxonomy( $tag_name, array( 'tv' ), $tag_args );

}
add_action( 'init', 'tv_taxonomy', 0 );

/** End Nava TV custom post type */


/** Nava Concert Custom Post type */

function concert_posts_type() {

    /** plural title */
    $pt = 'کنسرت ها';

    /** single title */
    $st = 'کنسرت';

    $cat_name = 'concerts';
    $tag_name = 'concert-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'concert', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'concert_posts_type', 0 );

/** End Nava Concert custom post type */

/** Nava Concert custom taxonomies */

function concert_taxonomy() {

    /** plural title */
    $pt = 'کنسرت ها';

    /** single title */
    $st = 'کنسرت';

    $cat_name = 'concerts';
    $tag_name = 'concert-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'concert' ), $args );
    register_taxonomy( $tag_name, array( 'concert' ), $tag_args );

}
add_action( 'init', 'concert_taxonomy', 0 );

/** End Nava Concert custom taxonomies */

/** Nava Reviews custom post type */

function reviews_posts_type() {

    /** plural title */
    $pt = 'نقد و بررسی ها';

    /** single title */
    $st = 'نقد و بررسی';

    $cat_name = 'review';
    $tag_name = 'review-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt', 'author' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 24,
        'menu_icon'             => 'dashicons-chart-bar',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'reviews', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'reviews_posts_type', 0 );

/** End Reviews custom post type */

/** Nava Reviews custom taxonomies */

function reviews_taxonomy() {

    /** plural title */
    $pt = 'نقد و بررسی ها';

    /** single title */
    $st = 'نقد و بررسی';

    $cat_name = 'review';
    $tag_name = 'review-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'reviews' ), $args );
    register_taxonomy( $tag_name, array( 'reviews' ), $tag_args );

}
add_action( 'init', 'reviews_taxonomy', 0 );

/** End Nava Reviews custom taxonomies */


/** Navagram custom post type */

function navagram_posts_type() {

    /** plural title */
    $pt = 'نواگرام';

    /** single title */
    $st = 'نواگرام';

    $cat_name = 'navagrams';
    $tag_name = 'navagram-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-format-chat',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'navagram', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'navagram_posts_type', 0 );

/** End Navagram custom post type */

/** Navagram custom taxonomies */

function navagram_taxonomy() {

    /** plural title */
    $pt = 'نواگرام';

    /** single title */
    $st = 'نواگرام';

    $cat_name = 'navagram';
    $tag_name = 'navagram-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'navagram' ), $args );
    register_taxonomy( $tag_name, array( 'navagram' ), $tag_args );

}
add_action( 'init', 'navagram_taxonomy', 0 );

/** End Navagram custom taxonomies */

/** Nava gallery custom post type */

function gallery_posts_type() {

    /** plural title */
    $pt = 'گالری ها';

    /** single title */
    $st = 'گالری';

    $cat_name = 'galleries';
    $tag_name = 'gallery-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-images-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'gallery', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'gallery_posts_type', 0 );

/** End nava gallery custom post type */

/** Nava gallery custom taxonomy */

function gallery_taxonomy() {

    /** plural title */
    $pt = 'گالری ها';

    /** single title */
    $st = 'گالری';

    $cat_name = 'galleries';
    $tag_name = 'gallery-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'gallery' ), $args );
    register_taxonomy( $tag_name, array( 'gallery' ), $tag_args );

}
add_action( 'init', 'gallery_taxonomy', 0 );

/** End Nava gallery custom taxonomy */

/** Nava Film musics post type */
function soundtrack_posts_type() {

    /** plural title */
    $pt = 'آهنگ های فیلم';

    /** single title */
    $st = 'آهنگ فیلم';

    $cat_name = 'soundtracks';
    $tag_name = 'soundtrack-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 27,
        'menu_icon'             => 'dashicons-format-video',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'soundtrack', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'soundtrack_posts_type', 0 );
/** End Nava film musics post type */


/** Nava Film musics taxonomy */
function soundtrack_taxonomy() {

    /** plural title */
    $pt = 'آهنگ های فیلم';

    /** single title */
    $st = 'آهنگ فیلم';

    $cat_name = 'soundtracks';
    $tag_name = 'soundtrack-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'soundtrack' ), $args );
    register_taxonomy( $tag_name, array( 'soundtrack' ), $tag_args );

}
add_action( 'init', 'soundtrack_taxonomy', 0 );
/** End Nava Film musics taxonomy */

/** Nava playlist post type */
function playlist_posts_type() {

    /** plural title */
    $pt = 'لیست های پخش';

    /** single title */
    $st = 'لیست پخش';

    $cat_name = 'playlists';
    $tag_name = 'playlist-tag';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'taxonomies'            => array( $cat_name, $tag_name ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 28,
        'menu_icon'             => 'dashicons-playlist-audio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'playlist', $args );
    //flush_rewrite_rules();
}
add_action( 'init', 'playlist_posts_type', 0 );
/** End Nava playlist post type */

/** Nava playlist custom taxonomy */
function playlist_taxonomy() {

    /** plural title */
    $pt = 'لیست های پخش';

    /** single title */
    $st = 'لیست پخش';

    $cat_name = 'playlists';
    $tag_name = 'playlist-tag';

    $labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'دسته بندی '.$pt, 'nava' ),
        'all_items'                  => __( 'همه دسته بندی ها', 'nava' ),
        'add_new_item'               => __( 'افزودن دسته بندی جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش دسته بندی', 'nava' ),
        'update_item'                => __( 'به روز رسانی دسته بندی', 'nava' ),
        'view_item'                  => __( 'نمایش دسته بندی', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف دسته بندی', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'دسته بندی های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو دسته بندی ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'دسته بندی وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست دسته بندی ها', 'nava' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        // 'rewrite'                    => array('slug' => 'music')

    );
    /* */
    $tag_labels = array(
        'name'                       => _x( $pt, 'Taxonomy General Name', 'nava' ),
        'singular_name'              => _x( $st, 'Taxonomy Singular Name', 'nava' ),
        'menu_name'                  => __( 'برچسب '.$pt, 'nava' ),
        'all_items'                  => __( 'همه برچسب ها', 'nava' ),
        'add_new_item'               => __( 'افزودن برچسب جدید', 'nava' ),
        'edit_item'                  => __( 'ویرایش برچسب', 'nava' ),
        'update_item'                => __( 'به روز رسانی برچسب', 'nava' ),
        'view_item'                  => __( 'نمایش برچسب', 'nava' ),
        'add_or_remove_items'        => __( 'افزودن و یا حذف برچسب', 'nava' ),
        'choose_from_most_used'      => __( 'انتخاب از بین محبوب ترین ها', 'nava' ),
        'popular_items'              => __( 'برچسب های محبوب', 'nava' ),
        'search_items'               => __( 'جستجو برچسب ها', 'nava' ),
        'not_found'                  => __( 'یافت نشد!', 'nava' ),
        'no_terms'                   => __( 'برچسب وجود ندارد', 'nava' ),
        'items_list'                 => __( 'لیست برچسب ها', 'nava' ),
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        //'rewrite'                    => array('slug' => 'music')

    );
    register_taxonomy( $cat_name, array( 'playlist' ), $args );
    register_taxonomy( $tag_name, array( 'playlist' ), $tag_args );

}
add_action( 'init', 'playlist_taxonomy', 0 );
/** End Nava playlist custom taxonomy */

/** Nava user playlist post type */
function user_playlist_posts_type() {

    /** plural title */
    $pt = 'لیست های پخش کاربران';

    /** single title */
    $st = 'لیست پخش کاربر';

    $labels = array(
        'name'                  => _x( $pt, 'Post Type General Name', 'nava' ),
        'singular_name'         => _x( $st, 'Post Type Singular Name', 'nava' ),
        'menu_name'             => __( $pt, 'nava' ),
        'name_admin_bar'        => __( $st, 'nava' ),
        'archives'              => __( 'آرشیو', 'nava' ),
        'parent_item_colon'     => __( 'والد '.$st.':', 'nava' ),
        'all_items'             => __( 'همه '.$pt, 'nava' ),
        'add_new_item'          => __( 'افزودن '.$st.' جدید', 'nava' ),
        'add_new'               => __( 'افزودن ' . $st, 'nava' ),
        'new_item'              => __( $st . ' جدید', 'nava' ),
        'edit_item'             => __( 'ویرایش '.$st, 'nava' ),
        'update_item'           => __( 'به روز رسانی '.$st, 'nava' ),
        'view_item'             => __( 'نمایش '.$st, 'nava' ),
        'search_items'          => __( 'جسجتو '.$st, 'nava' ),
        'not_found'             => __( 'یافت نشد!', 'nava' ),
        'not_found_in_trash'    => __( 'در زباله دانی پیدا نشد', 'nava' ),
        'featured_image'        => __( 'تصویر شاخص', 'nava' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'nava' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'nava' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'nava' ),
        'items_list'            => __( 'لیست '.$pt, 'nava' ),
        'filter_items_list'     => __( 'صافی کردن لیست '.$pt, 'nava' ),
    );
    $args = array(
        'label'                 => __( $st, 'nava' ),
        'description'           => __( $pt.'وب سایت نوا', 'nava' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 29,
        'menu_icon'             => 'dashicons-id-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        //'has_archive'           => 'music',
        'capability_type'       => 'post',
        //'rewrite'               => array('slug' => 'music/%musics%'),


    );
    register_post_type( 'fav', $args );
    //flush_rewrite_rules();
}
add_action( 'init', 'user_playlist_posts_type', 0 );
/** End Nava user playlist post type */