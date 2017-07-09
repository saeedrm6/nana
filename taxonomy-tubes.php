<?php
get_header();
?>

<section class="items-people-video k-central k-central-video col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container video-container">
        <div class="row">
            <div class="tv-box-items col-md-9 col-sm-12 col-xs-12 col-lg-9 nopadding">
                <div class="row k-title-row clearfix">
                    <div class="col-md-6">
                        <h2 class="k-title-text">&nbsp;</h2>
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
            </div>
            <aside style="margin-top: 60px;" class="side col-md-3 col-sm-12 col-xs-12 col-lg-3" id="myScrollspy" >
                <div class="best-People-video k-side-box col-sm-12">
                    <div class="row nopadding k-title-row">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 nopadding">
                            <h2 class="k-title-text">پربازدیدترین ها</h2>
                        </div>
                    </div>
                    <?php
                    $pvid_most_viewed_args = array(
                        'posts_per_page'    => '5',
                        'post_type'         => $h->config['peopleVideosPostType'],
                        'meta_key'          => 'nava_post_views_count',
                        'orderby'           => 'meta_value_num',
                        'order'             => 'DESC',
                        'data_query'        => array(
                            array(
                                'before'    => '1 week ago'
                            )
                        )
                    );
                    $pvid_most_viewed_q = new WP_Query( $pvid_most_viewed_args );
                    if ($pvid_most_viewed_q->have_posts()):
                        while($pvid_most_viewed_q->have_posts()):
                            $pvid_most_viewed_q->the_post();
                            ?>
                            <div class="best-people-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    the_post_thumbnail( 'nava_image_m', array('class' => 'img-responsive wp-post-image', 'alt' => get_the_title() ))
                                    ?>
                                    <div class="best-people-itemdesc">
                                        <h4 class="k-s-title"><?php the_title(); ?></h4>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </aside>
        </div>
    </div>
</section>
<?php
get_footer();
?>
