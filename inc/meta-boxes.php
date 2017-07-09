<?php

add_filter('rwmb_meta_boxes', 'nava_meta_boxes');
function nava_meta_boxes($meta_boxes)
{
    // WordPress default posts meta boxes
    $meta_boxes[] = array(
        'title'         => __('مشخصات نوشته ها', 'nava'),
        'post_types'    => array('post'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('قرار گرفتن در اسلایدر'),
                'id'        => 'homeSlider',
                'type'      => 'checkbox',
                'desc'      => 'در اسلایدر صفحه اول قرار بگیرد'
            ),
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('رو تیتر', 'nava'),
                'id'        => 'postSupTitle',
                'type'      => 'text',
                'desc'      => ''
            ),
            array(
                'name'        => esc_html__( 'انتخاب هنرمند', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
        )
    );
    // end wordpress default extra fields

    // music extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات آهنگ', 'nava'),
        'post_types'    => array('music'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(

            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'          => __('موسیقی ویژه اسلایدر'),
                'id'            => 'musicFeature',
                'type'          => 'checkbox',
                'desc'          => 'نمایش این موسیقی در اسلایدر صفحه موسیقی'
            ),
            array(
                'name'      => __('موسیقی', 'nava'),
                'id'        => 'musicFile',
                'type'      => 'file_advanced',
            ),
            array(
                'name'      => __('نام آهنگ', 'nava'),
                'id'        => 'musicName',
                'type'      => 'text',
            ),
			array(
                'name'        => esc_html__( 'نام هنرمند اصلی', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمند را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
            array(
                'name'        => esc_html__( 'سایر هنرمندان', 'nava' ),
                // general artist name
                'id'         => "gArtistNameOther",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
            // array(
                // 'name'        => esc_html__( 'لیست  پخش موسیقی', 'nava' ),
                // // general artist name
                // 'id'         => "musicPlaylist",
                // 'type'        => 'post',
                // 'post_type'   => 'playlist',
                // // Can this be cloned?

                // // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                // 'field_type' => 'select_advanced',
                // 'multiple'  => true,
                // 'placeholder' => esc_html__( 'لیست پخش موسیقی را انتخاب کنید', 'nava' ),
                // // Query arguments (optional). No settings means get all published posts
                // 'query_args'  => array(
                    // 'post_status'    => 'publish',
                    // 'posts_per_page' => -1,
                // ),
            // ),
            array(
                'name'        => esc_html__( 'موسیقی فیلم', 'nava' ),
                // general artist name
                'id'         => "musicSoundTrack",
                'type'        => 'post',
                'post_type'   => 'soundtrack',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'موسیقی فیلم را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
            array(
                'name'      => __('آهنگساز', 'nava'),
                'id'        => 'musicMusician',
                'type'      => 'text'
            ),
            array(
                'name'      => __('تنظیم کننده', 'nava'),
                'id'        => 'musicRegulator',
                'type'      => 'text'
            ),
            array(
                'name'      => __('ترانه سرا', 'nava'),
                'id'        => 'musicSongwriter',
                'type'      => 'text'
            ),
            array(
                'name'      => __('میکس و مستر', 'nava'),
                'id'        => 'musicMixAndMaster',
                'type'      => 'text'
            ),
            array(
                'name'      => __('رنگ پس زمینه'),
                'id'        => 'musicBackColor',
                'type'      => 'color'
            )
        )
    );
    // end music extra fields

    // artists extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات هنرمند', 'nava'),
        'post_types'    => array('wiki'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('تصویر کاور هنرمند'),
                'id'        => 'artistProfile',
                'type'      => 'image_upload'
            ),
            array(
                'name'      => __('سطح هنرمند', 'nava'),
                'id'        => 'artistLevel',
                'type'      => 'select',
                'options'   => array(
                    'normal'        => 'معمولی',
                    'protagonist'   => 'پیشکسوت'
                )
            ),
            array(
                'name'      => __('تاریخ تولد', 'nava'),
                'id'        => 'artistAge',
                'type'      => 'text',
            ),
            array(
                'name'      => __('محل تولد', 'nava'),
                'id'        => 'artistHomeTown',
                'type'      => 'text',
            ),
            array(
                'name'      => __('مرده', 'nava'),
                'id'        => 'artistDead',
                'type'      => 'checkbox',
                'desc'      => 'این هنرمند فوت کرده است.'
            ),
			array(
                'name'      => __('تاریخ فوت ', 'nava'),
                'id'        => 'artistDeathDate',
                'type'      => 'text'
            ),
            array(
                'name'      =>  __('ملیت', 'nava'),
                'id'        => 'artistNationality',
                'type'      => 'text',
            )
        )
    );
    $meta_boxes[] = array(
        'title'         => __('شبکه های اجتماعی', 'nava'),
        'post_types'    => array('wiki'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('فیس بوک', 'nava'),
                'id'        => 'artistFacebook',
                'type'      => 'text'
            ),
            array(
                'name'      => __('توییتر', 'nava'),
                'id'        => 'artistTwitter',
                'type'      => 'text'
            ),
            array(
                'name'      => __('اینستاگرام', 'nava'),
                'id'        => 'artistInstagram',
                'type'      => 'text'
            ),
            array(
                'name'      => __('تلگرام', 'nava'),
                'id'        => 'artistTelegram',
                'type'      => 'text'
            ),
            array(
                'name'      => __('آی ام دی بی', 'nava'),
                'id'        => 'artistImdb',
                'type'      => 'text'
            ),
            array(
                'name'      => __('لینکداین', 'nava'),
                'id'        => 'artistLinkedIn',
                'type'      => 'text'
            )
        )
    );
    // end artists extra fields

    // nava tv extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات نوا تی وی', 'nava'),
        'post_types'    => array('tv'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('قرار گرفتن در اسلایدر'),
                'id'        => 'homeSlider',
                'type'      => 'checkbox',
                'desc'      => 'در اسلایدر صفحه اول قرار بگیرد'
            ),
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('اسلایدر تی وی','nava'),
                'id'        => 'tvFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در اسلایدر صفحه اصلی تی وی'
            ),
            array(
                'name'      => __('کیفیت فول اچ دی', 'nava'),
                'id'        => 'isVideoFullHD',
                'type'      => 'checkbox',
                'desc'      => 'کیفیت 1080 یعنی FULL HD دارد'
            ),
            array(
                'name'      => __('فایل ویدیو', 'nava'),
                'id'        => 'videoFile',
                'type'      => 'file_advanced',
            ),
            array(
                'name'      => __('روتیتر', 'nava'),
                'id'        => 'videoSupTitle',
                'type'      => 'text'
            ),
            array(
                'name'        => esc_html__( 'انتخاب هنرمند', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
        )
    );
    // end nava tv extra fields

    // concert extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات زمان برگزاری کنسرت', 'nava'),
        'post_types'    => array('concert'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('کنسرت ویژه', 'nava'),
                'id'        => 'concertFeature',
                'type'      => 'checkbox',
                'desc'      => 'قرار دادن در باکس ویژه زمان صفحه اصلی'
            ),
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('هر روز', 'nava'),
                'id'        => 'concertIsEveryDay',
                'type'      => 'checkbox',
                'desc'      => 'هر روز'
            ),
            array(
                'name'      => __('تاریخ شروع','nava'),
                'id'        => 'concertStartDate',
                'type'      => 'text',
                'desc'      => 'فرمت تاریخ: yyyy/mm/dd'
            ),
            array(
                'name'      => __('تاریخ پایان', 'nava'),
                'id'        => 'concertEndDate',
                'type'      => 'text',
                'desc'      => 'فرمت تاریخ: yyyy/mm/dd'
            ),
            array(
                'name'      => __('زمان شروع', 'nava'),
                'id'        => 'concertStartTime',
                'type'      => 'text',
                'desc'      => 'فرمت زمان: HH:MM:SS'
            ),
            array(
                'name'      => __('زمان پایان','nava'),
                'id'        => 'concertEndTime',
                'type'      => 'text',
                'desc'      => 'فرمت زمان: HH:MM:SS'
            ),
            array(
                'name'        => esc_html__( 'انتخاب هنرمند', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
        )
    );
    $meta_boxes[] = array(
        'title'         => __('مشخصات محل برگزاری کنسرت', 'nava'),
        'post_types'    => array('concert'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('این رویداد مکان فیزیکی', 'nava'),
                'id'        => 'concertIsEveryDay',
                'type'      => 'checkbox',
                'desc'      => 'هر روز'
            ),
            array(
                'name'      => __('رویداد داخلی', 'nava'),
                'id'        => 'concertIsInternal',
                'type'      => 'checkbox',
                'desc'      => 'رویداد داخلی'
            ),
            array(
                'name'      => __('نام محل برگزاری', 'nava'),
                'id'        => 'concertPlaceName',
                'type'      => 'text',
            ),
            array(
                'name'      => __('کشور', 'nava'),
                'id'        => 'concertCountry',
                'type'      => 'text'
            ),
            array(
                'name'      => __('استان', 'nava'),
                'id'        => 'concertProvince',
                'type'      => 'text'
            ),
            array(
                'name'      => __('شهر', 'nava'),
                'id'        => 'concertCity',
                'type'      => 'text'
            ),
            array(
                'name'      => __('آدرس', 'nava'),
                'id'        => 'concertAddress',
                'type'      => 'text'
            ),
            array(
                'name'      => __('کد پستی', 'nava'),
                'id'        => 'concertPostalCode',
                'type'      => 'text'
            ),
            array(
                'name'      => __('عرض جغرافیایی', 'nava'),
                'id'        => 'concertLat',
                'type'      => 'text'
            ),
            array(
                'name'      => __('طول جغرافیایی', 'nava'),
                'id'        => 'concertLong',
                'type'      => 'text'
            ),
            array(
                'name'      => __('میزان زوم نقشه', 'nava'),
                'id'        => 'concertZoom',
                'type'      => 'number'
            )
        )
    );
    $meta_boxes[] = array(
        'title'         => __('مشخصات تماس کنسرت', 'nava'),
        'post_types'    => array('concert'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('شماره تماس', 'nava'),
                'id'        => 'concertPhone',
                'type'      => 'text',
                'desc'      => ''
            ),
            array(
                'name'      => __('وب سایت', 'nava'),
                'id'        => 'concertWebsite',
                'type'      => 'url',
                'desc'      => ''
            ),
            array(
                'name'      => __('پست الکترونیکی', 'nava'),
                'id'        => 'concertEmail',
                'type'      => 'email',
                'desc'      => ''
            ),
        )
    );
    // end concert extra fields

    // Reviews extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات نقد و بررسی', 'nava'),
        'post_types'    => array('reviews'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('قرار گرفتن در اسلایدر'),
                'id'        => 'homeSlider',
                'type'      => 'checkbox',
                'desc'      => 'در اسلایدر صفحه اول قرار بگیرد'
            ),
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('عکس آلبوم', 'nava'),
                'id'        => 'reviewAlbumImage',
                'type'      => 'image_upload',
                'desc'      => 'عکس کاور و پس زمینه را از بخش تصویر شاخص آپلود نمایید. '
            ),
            array(
                'name'      => __('نام آلبوم', 'nava'),
                'id'        => 'reviewAlbumName',
                'type'      => 'text',
            ),
            array(
                'name'      => __('روتیتر', 'nava'),
                'id'        => 'reviewSupTitle',
                'type'      => 'text',
            ),
            array(
                'name'      => __('آهنگساز', 'nava'),
                'id'        => 'reviewMusician',
                'type'      => 'text',
            ),
            array(
                'name'      => __('تنظیم کننده', 'nava'),
                'id'        => 'reviewRegulator',
                'type'      => 'text',
            ),
            array(
                'name'      => __('میکس و مستر', 'nava'),
                'id'        => 'reviewMixAndMaster',
                'type'      => 'text',
            ),
            array(
                'name'      => __('سال انتشار', 'nava'),
                'id'        => 'reviewNavaPublish',
                'type'      => 'text'
            ),
            array(
                'name'      => __('ترانه سرا', 'nava'),
                'id'        => 'reviewNavaSongWriter',
                'type'      => 'text'
            ),
            array(
                'name'      => __('ناشر', 'nava'),
                'id'        => 'reviewNavaPublisher',
                'type'      => 'text'
            ),
            array(
                'name'        => esc_html__( 'انتخاب هنرمند', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),

        )
    );
    $meta_boxes[] = array(
        'title'         => __('امتیاز نقد و بررسی نوا ( همه امتیازات را براساس عدد 10 وارد نمایید )', 'nava'),
        'post_types'    => array('reviews'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('امتیاز ساختار کلی', 'nava'),
                'id'        => 'reviewNavaAll',
                'type'      => 'text'
            ),
            array(
                'name'      => __('امتیاز تنظیم', 'nava'),
                'id'        => 'reviewNavaTuning',
                'type'      => 'text'
            ),
            array(
                'name'      => __('امتیاز ترانه', 'nava'),
                'id'        => 'reviewNavaMusic',
                'type'      => 'text'
            ),
            array(
                'name'      => __('امتیاز آهنگسازی', 'nava'),
                'id'        => 'reviewNavaComposer',
                'type'      => 'text'
            ),
            array(
                'name'      => __('امتیاز میکس و مستر', 'nava'),
                'id'        => 'reviewNavaMix',
                'type'      => 'text'
            ),
        )
    );
//    $meta_boxes[] = array(
//        'title'         => __('امتیاز نقد و بررسی کاربران', 'nava'),
//        'post_types'    => array('reviews'),
//        'context'       => 'normal',
//        'priority'      => 'high',
//        'fields'        => array(
//            array(
//                'name'      => __('امتیاز ساختار کلی', 'nava'),
//                'id'        => 'reviewUserAll',
//                'type'      => 'text'
//            ),
//            array(
//                'name'      => __('امتیاز تنظیم', 'nava'),
//                'id'        => 'reviewUserTuning',
//                'type'      => 'text'
//            ),
//            array(
//                'name'      => __('امتیاز ترانه', 'nava'),
//                'id'        => 'reviewUserMusic',
//                'type'      => 'text'
//            ),
//            array(
//                'name'      => __('امتیاز آهنگسازی', 'nava'),
//                'id'        => 'reviewUserComposer',
//                'type'      => 'text'
//            ),
//            array(
//                'name'      => __('امتیاز میکس و مستر', 'nava'),
//                'id'        => 'reviewUserMix',
//                'type'      => 'text'
//            )
//        )
//    );
    // End reviews extra fields

    // Soundtracks extra fields
    $meta_boxes[] = array(
        'title'          => __('مشخصات آهنگ های فیلم', 'nava'),
        'post_types'    => array('soundtrack'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'      => __('آهنگ ها', 'nava'),
                'id'        => 'stMusics',
                'type'      => 'file_advanced',
                'desc'      => 'آهنگ های مد نظر خود را انتخاب کنید'
            ),
            array(
                'name'      => __('نام فیلم', 'nava'),
                'id'        => 'stMovieName',
                'type'      => 'text'
            ),
            array(
                'name'      => __('نام آهنگساز', 'nava'),
                'id'        => 'stMusician',
                'type'      => 'text'
            ),
            array(
                'name'      => __('سال ساخت', 'nava'),
                'id'        => 'stYear',
                'type'      => 'text'
            ),
            array(
                'name'      => __('کارگردان', 'nava'),
                'id'        => 'stProducer',
                'type'      => 'text'
            )
        )
    );
    // End soundtracks extra fields

    // playlist extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات لیست پخش', 'nava'),
        'post_types'    => array('playlist'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('عنوان لیست پخش', 'nava'),
                'id'        => 'playlistName',
                'type'      => 'text'
            ),
			array(
				'name'        => esc_html__( 'انتخاب موسیقی', 'nava' ),
				// general artist name
				'id'         => "gMusic",
				'type'        => 'post',
				'post_type'   => 'music',
				// Can this be cloned?

				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'field_type' => 'select_advanced',
				'multiple'  => true,
				'placeholder' => esc_html__( 'موسیقی را انتخاب کنید', 'nava' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => -1,
				),
			),
        ),
		
    );
    // End playlist extra fields

    // user playlist extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات لیست پخش کاربران', 'nava'),
        'post_types'    => array('fav'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('دسترسی لیست پخش', 'nava'),
                'id'        => 'favIsPrivate',
                'type'      => 'checkbox',
                'desc'      => 'لیست پخش خصوصی است'
            ),
            array(
                'name'      => __('تعداد فالورها', 'nava'),
                'id'        => 'favFollowers',
                'type'      => 'number'
            ),
            array(
                'name'      => __('تعداد', 'nava'),
                'id'        => '',
                'type'      => ''
            )
        )
    );
    // End user playlist extra fields

    // navagram extra fields
    $meta_boxes[] = array(
        'title'         => __('مشخصات نواگرام', 'nava'),
        'post_types'    => array('navagram'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array(
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array(
                'name'        => esc_html__( 'انتخاب هنرمند', 'nava' ),
                // general artist name
                'id'         => "gArtistName",
                'type'        => 'post',
                'post_type'   => 'wiki',
                // Can this be cloned?

                // How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
                'field_type' => 'select_advanced',
                'multiple'  => true,
                'placeholder' => esc_html__( 'هنرمندان را انتخاب کنید', 'nava' ),
                // Query arguments (optional). No settings means get all published posts
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
        )
    );
    // End navagram extra fields

    // Nava Gallery extra fields
    $meta_boxes[] = array (
        'title'         => __('مشخصات گالری', 'nava'),
        'post_types'    => array('gallery'),
        'context'       => 'normal',
        'priority'      => 'high',
        'fields'        => array(
            array (
                'name'      => __('مطلب ویژه','nava'),
                'id'        => 'homeFeature',
                'type'      => 'checkbox',
                'desc'      => 'نمایش این مطلب در صفحه اصلی'
            ),
            array (
                'name'          => __('انتخاب عکاس گالری تصویر'),
                'id'            => 'galleryPhotographer',
                'type'          => 'user',
                'field_type'    => 'select_advanced',
                'multiple'      => true,
                'placeholder'   => esc_html__( 'عکاس گالری را انتخاب نمایید', 'nava' ),
            )
        )
    );
    // End Nava Gallery extra fields


    return $meta_boxes;
}

function fb_add_custom_user_profile_fields( $user ) {
    ?>
    <h3><?php _e('اطلاعات تماس اضافی', 'nava'); ?></h3>

    <table class="form-table">
        <tr>
            <th>
                <label for="userPhone"><?php _e('شماره تماس', 'nava'); ?>
                </label></th>
            <td>
                <input type="text" name="userPhone" id="userPhone"
                       value="<?php echo esc_attr( get_the_author_meta( 'userPhone', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('شماره تماس شخصی ( موبایل ) خود را وارد نمایید.', 'nava'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="userTelegram"><?php _e('تلگرام', 'nava'); ?>
                </label></th>
            <td>
                <input type="url" name="userTelegram" id="userTelegram"
                       value="<?php echo esc_attr( get_the_author_meta( 'userTelegram', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('آدرس اینترنتی تلگرام خود را وارد نمایید. نمونه: http://t.me/username', 'nava'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="userInstagram"><?php _e('اینستاگرام', 'nava'); ?>
                </label></th>
            <td>
                <input type="url" name="userInstagram" id="userInstagram"
                       value="<?php echo esc_attr( get_the_author_meta( 'userInstagram', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('آدرس اینترنتی اینستاگرام خود را وارد نمایید. نمونه: http://instagram.com/username', 'nava'); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <label for="userLinkedIn"><?php _e('لینکداین', 'nava'); ?>
                </label></th>
            <td>
                <input type="url" name="userLinkedIn" id="userLinkedIn"
                       value="<?php echo esc_attr( get_the_author_meta( 'userLinkedIn', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('آدرس اینترنتی لینکداین', 'nava'); ?></span>
            </td>
        </tr>
    </table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return FALSE;

    update_user_meta( $user_id, 'userPhone', $_POST['userPhone'] );
    update_user_meta( $user_id, 'userTelegram', $_POST['userTelegram'] );
    update_user_meta( $user_id, 'userInstagram', $_POST['userInstagram'] );
    update_user_meta( $user_id, 'userLinkedIn', $_POST['userLinkedIn'] );
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );