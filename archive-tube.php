<?php get_header() ?>

<!--  People video Slider -->
<section id="demos" class="People-video k-web">
    <div class="container">
        <div class="row">
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    <?php
                    global $h;
                    $pvid_slider_args = array(
                        'posts_per_page'    => '5',
                        'post_type'         => $h->config['peopleVideosPostType'],
                        'orderby'           => 'date',
                        'order'             => 'DESC',
                        'meta_query'        => array(
                            array(
                                'key'       => 'mmt_pvid_is_slider',
                                'value'     => 'on',
                                'compare'   => '='
                            )
                        )
                    );


                    $pvid_slider_q = new WP_Query($pvid_slider_args);

                    if ($pvid_slider_q->have_posts()):
                        while($pvid_slider_q->have_posts()):
                            $pvid_slider_q->the_post();
                    ?>
                        <div class="item" >
                            <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('full', array( 'alt' => get_the_title() )); ?>
                            </a>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End People video Slider -->

<!--central-->
<section class="items-people-video k-central k-central-video col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container video-container">
        <div class="row">
            <div class="tv-box-items col-md-9 col-sm-12 col-xs-12 col-lg-9 nopadding">
                <div class="row k-title-row clearfix">
                    <div class="col-md-6">
                        <h2 class="k-title-text">آخرین ویدئو های ارسالی</h2>
                    </div>
                </div>
                <div class="People-video-items">
                    <?php
                    if (have_posts()):
                        while(have_posts()):
                            the_post();
                            $post_profile_id = get_post_meta(get_the_ID(), 'mmt_pvid_profile_id', true);
                            $profile_metas = get_post_meta($post_profile_id);
                    ?>
                    <div class="item col-md-4 col-xs-12 col-sm-3 col-lg-4 ">
                        <div class="tv-item-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('nava_image_m', array('alt' => get_the_title(), 'class' => 'img-responsive wp-post-image') ); ?>
                            </a>
                        </div>
                        <div class="tv-item-desc dir-rtl">
                            <div class="video-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="rating col-xs-4 pull-left nopadding">
<!--                                <div class="music-rating">-->
<!--                                    <div class="stars">-->
<!--                                        <form action="">-->
<!--                                            <input class="star star-5" id="star-5" name="star" type="radio"> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" name="star" type="radio"> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" name="star" type="radio"> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" name="star" type="radio"> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" name="star" type="radio"> <label class="star star-1" for="star-1"></label>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                            <div class="video-detail">
                                <div class="m-innernews-span k-news-item">
                                    <time itemprop="datePublished" datetime="<?php echo get_the_date('Y-d-m H:i:s') ?>" class="conc-date  nopadding"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date(); ?></time>
                                </div>
                                <span class="user-name"><i class="fa fa-user" aria-hidden="true"></i><?php echo $profile_metas['mmt_user_full_name'][0] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    echo do_shortcode('[pagination]');
                    ?>
                </div>
                <?php
                display_pivd_category('دسته بندی کنسرت ها', 'concerts', home_url($h->config['peopleVideoCategory'].'/concerts') );
                display_pivd_category('دسته بندی اجرای زنده', 'live', home_url($h->config['peopleVideoCategory'].'/live') );
                display_pivd_category('دسته بندی موزیک ویدیو', 'clip', home_url($h->config['peopleVideoCategory'].'/clip') );
                display_pivd_category('دسته بندی گزارش و خبر', 'story', home_url($h->config['peopleVideoCategory'].'/story') );
                display_pivd_category('سایر ویدیوها', 'others', home_url($h->config['peopleVideoCategory'].'/others') );
                ?>
            </div>
            <?php get_template_part('template', 'pvid-aside'); ?>
        </div>
    </div>
</section>
<!--central-->

<?php get_footer() ?>

<?php
function display_pivd_category($section_title, $category_slug, $category_url, $posts_per_page = 4) {
global $h;
    $pvid_concert_args = array(
        'posts_per_page'    => $posts_per_page,
        'post_type'         => $h->config['peopleVideosPostType'],
        'orderby'           => 'date',
        'order'             => 'DESC',
        'tax_query'         => array(
            array(
                'taxonomy'  => $h->config['peopleVideoCategory'],
                'field'     => 'slug',
                'terms'     => array($category_slug)
            )
        )
    );
    $pvid_concert_q = new WP_Query( $pvid_concert_args );
    if ($pvid_concert_q->have_posts()):
        ?>
        <div>
            <div class="col-md-12 k-web">
                <div class="people-video-container">
                    <?php echo nava_title_row($section_title, $category_url, '', 'مشاهده بیشتر', '', 'h2', 'black'); ?>
                    <?php
                    $i = 1;
                    while($pvid_concert_q->have_posts()):
                        $pvid_concert_q->the_post();
                        ?>
                        <div id="tvitem<?php echo $i; ?>" class="tvitem col-md-3 col-xs-12 col-sm-6 col-lg-3">
                            <div class="tvitem-box">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('nava_image_m', array('alt' => get_the_title())); ?>
                                </a>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                        <?php
                        $i++;
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    <?php endif;
}

