<?php
get_header();
?>
<div class="container m-margin-container">
    <div class="row">
        <!-- Artists images-->
        <div class="banner col-md-12">
            <a target="_blank"
               href="http://fastclick.co/a.aspx?Task=Click&ZoneID=2473&CampaignID=3272&AdvertiserID=26&BannerID=1337&SiteID=58​">
                <img src="/wp-content/themes/nava/img/banner/cafegardesh-main.gif">
            </a>
        </div>
        <section class="col-xs-12">
            <?php
            $post_id = '';
            $artist_id = '';
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    $post_id = get_the_ID();
                    echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
                    $post_meta = get_post_meta(get_the_ID());
                    $artist = get_artist_by_id($post_meta['gArtistName']);
                    $artist_id = $artist->ID;
                    ?>
                    <article class="navagram-inner-content m-innernews-item">
                        <div class="col-lg-6 col-md-6 cl-sm-12 col-xs-12 m-margin-container">
                            <div class="navagram-head">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="navagram-artist">
                                <?php
                                if (!empty($artist->ID)) {
                                    echo get_the_post_thumbnail($artist->ID, 'nava_music_xs', array('class' => 'img-responsive'));
                                } else {
                                    echo '<img src="' . THEME_IMAGES . 'wiki.jpg' . '" class="img-responsive" />';
                                }
                                ?>
                                <div class="navagram-artist-name">
                                    <h4><a href="<?php echo get_post_permalink($post_meta['gArtistName'][0]) ?>"><?php echo (!empty($artist->post_title)) ? $artist->post_title : ''; ?></a></h4>

                                    <time datetime="<?php the_date('Y-m-d H:i:s') ?>"
                                          class="conc-date col-md-6 col-sm-12 col-xs-12 col-lg-6 nopadding"><i
                                                class="fa fa-calendar"
                                                aria-hidden="true"></i> <?php echo get_the_date() ?></time>
                                </div>
                            </div>
                            <div class="navagram-caption">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="m-navagram-img col-md-6 text-center m-margin-container">
                            <figure>
                                <?php the_post_thumbnail('full', array()); ?>
                            </figure>
                        </div>
                    </article>
                    <?php
                endwhile;
            endif;
            ?>
            <?php
            wp_reset_query();

            $related = get_related_posts_by_artist_id($artist_id, 'navagram', 8, array($post_id));
            if (!empty($related)):
                if ($related->have_posts()):
                    ?>
                    <article
                            class="m-innernews-item related-navagram nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="m-owl-navagramsinner">
                            <?php echo nava_title_row('مطالب مرتبط', home_url('#'), 'fa-link'); ?>

                            <div id="m-owl-navagramsinner" class="owl-carousel">
                                <?php


                                while ($related->have_posts()):
                                    $related->the_post();

                                    ?>
                                    <div class="item">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="navagram-img-carousel"
                                                 style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'nava_image_m'); ?>)"></div>
                                            <div class="k-s-itemdesc">
                                                <h4><?php the_title(); ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </article>
                <?php endif; endif; ?>

        </section>
        <!-- Inner news content-->
        <section class="clearfix col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <section class="k-comment clearfix">
                <header class="k-comment-header">
                    <h2>
                        <span class="icon icon-bubbles3"></span><?php comments_number('بدون دیدگاه', 'یک دیدگاه', '% دیدگاه'); ?>
                    </h2>
                </header>
                <div class="k-comment-body">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template('/inc/comments.php');
                    }
                    ?>
                </div>
            </section>
        </section>

        <!-- Artists filter-->
        <aside class="side nopadding-top col-md-4 col-sm-4 col-xs-12 col-lg-4 clearfix">
            <?php
            if (is_active_sidebar('single-simple-widget-area')) {
                dynamic_sidebar('single-simple-widget-area');
            }
            ?>
        </aside>
        <!-- Artists filter-->

    </div>
</div>
<?php
get_footer();
?>
