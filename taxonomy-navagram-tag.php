<?php
get_header();
?>
<section class="m-breadcrumbs clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="m-breadcrumb">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container">
        <div class="k-news row">
            <?php
            $args = array(
                'posts_per_page'    => '16',
                'post_type'         => 'navagram',
                'orderby'           => 'date',
                'order'             => 'DESC'
            );
            $q = new WP_Query( $args );
            if (have_posts()):
                while(have_posts()):
                    the_post();
                    $post_meta = get_post_meta(get_the_ID());
                    if (!empty($post_meta['gArtistName'])) {
                        $artist = get_artist_by_id($post_meta['gArtistName'][0]);
                    }
            ?>
            <article class="k-news-item col-md-3 col-sm-6 col-xs-12 col-lg-3">
                <div class="m-news-box">
                    <a class="m-news-item" href="<?php the_permalink(); ?>"
                       style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'nava_image_m'); ?>);" >
                    </a>
                    <div class="k-b-itemdesc">
                        <div class="m-circle-img">
                            <a href="<?php the_permalink(); ?>">
                                <div class="m-navagram-circle">
                                    <?php echo get_the_post_thumbnail($artist->ID, 'nava_music_xs'); ?>
                                </div>
                                <div class="m-navagram-span">
                                    <span><?php echo $artist->post_title; ?></span>
                                </div>
                            </a>
                        </div>

                        <a href="<?php the_permalink(); ?>">
                            <h4 class="k-b-title"><?php the_title(); ?></h4>
                        </a>
                        <div class="me-navagram-desc">
                            <?php the_excerpt(); ?>
                        </div>
                        <time datetime="<?php the_date('Y-m-d H:i:s'); ?>"
                              class="conc-date col-md-6 col-sm-12 col-xs-12 col-lg-6 nopadding"><i
                                class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                        </time>
                        <a href="<?php the_permalink(); ?>" class="kbtn black">ادامه</a>
                    </div>
                </div>
            </article>
            <?php
                endwhile;
            endif;
            echo do_shortcode("[pagination]");
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
