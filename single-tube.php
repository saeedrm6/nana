<?php
get_header();
global $h;
?>

<!--central-->
<section class="people-video-inner k-central k-central-video col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container video-container k-web">

        <div class="row">
            <?php
            $post_id = '';
            if (have_posts()):
                while(have_posts()):
                    the_post();
                    $post_id = get_the_ID();

                    $profile_id = get_post_meta(get_the_ID(), 'mmt_pvid_profile_id', true);

                    $original_video_id  = get_post_meta($post_id, 'mmt_pvid_fileid', true);
                    $sd_video_id = get_post_meta($post_id, 'mmt_pvid_fileid_sd', true);
                    $mobile_video_id = get_post_meta($post_id, 'mmt_pvid_fileid_mobile', true);

                    $original_video = get_attachment_by_id($original_video_id);
                    $sd_video = get_attachment_by_id($sd_video_id);
                    $mobile_video =  get_attachment_by_id($mobile_video_id);

                    $profile_meta = get_post_meta($profile_id);
                    $profile_image = get_the_post_thumbnail($profile_id, 'nava_music_m');
                ?>
            <div class="tv-box-items nava-video-player col-md-9 col-sm-12 col-xs-12 col-lg-9 nopadding dir-rtl">
                <div class="col-md-12  people-video-cover">
                    <div class="players single-pvid-video" style="position: relative;
        height: 540px;">
                        <div  itemscope="" itemtype="http://schema.org/Video">
                            <video id="mej-player" class="video-player2"
                                   controls="controls"
                                   preload="none"
                                   width="100%"
                                   height="540px"
                                   data-video-sd="<?php        echo ( !empty($sd_video->guid) ) ? $sd_video->guid : '';  ?>"
                                   data-video-mobile="<?php    echo ( !empty($sd_video->guid) ) ? $sd_video->guid : '';  ?>"
                                   data-video-hd="<?php        echo ( !empty($original_video->guid)) ? $original_video->guid : ''; ?>"
                                   poster="<?php echo get_the_post_thumbnail_url($post_id, 'full') ?>">

                                <?php if (!empty($sd_video)): ?><source src="<?php echo $sd_video->guid; ?>" title="<?php the_title(); ?>"><?php endif; ?>

                            </video>
                        </div>
                    </div>
                </div>
                <div class="videodesc col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="videodesc-innerbox">
                        <div class="desc col-md-9 col-xs-12 col-sm-12 col-lg-9">
                            <h4><?php the_title(); ?></h4>
                            <div class="user-img col-md-12 col-xs-12 nopadding">
                                <div class="col-md-2 col-xs-4 nopadding-right">
                                    <?php if (empty($profile_image)): ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/register.jpg">
                                    <?php else: ?>
                                    <?php echo $profile_image; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-10 col-xs-8">
                                    <h6><?php echo $profile_meta['mmt_user_full_name'][0]; ?></h6>
                                    <div class="col-xs-12 nopadding">
                                        <div class="m-innernews-span k-news-item">
                                            <time itemprop="datePublished" datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>" class="conc-date  nopadding"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_date(); ?></time>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                        <form method="POST" action="<?php echo home_url($h->config['myVideosSlug']); ?>">
                                            <button name="profile-video" value="<?php echo $profile_id+91313; ?>" class="kbtn fullred">
                                                <i class="fa fa-youtube-play fa-lg" aria-hidden="true"></i> مشاهده سایر ویدیوهای این کاربر
                                            </button>
<!--                                            <button type="button" class="btn btn-default">-->
<!--                                                <span class="badge">17</span>-->
<!--                                            </button>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 k-web nopadding-right">
                                <p>
                                    <?php
                                    the_content();
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="downloadbtns col-md-3 col-xs-12 col-sm-12 col-lg-3">
                            <a href="<?php echo $original_video->guid; ?>" class="kbtn black">دانلود با کیفیت بالا <span>HD</span></a>
                            <a href="<?php echo $mobile_video->guid; ?>" class="kbtn black">دانلود با کیفیت پایین <span>SD</span></a>
                            <a href="<?php echo $sd_video->guid; ?>" class="kbtn black">دانلود با کیفیت موبایل <span>Mobile</span></a>
                        </div>

                        <div class="col-md-12 col-xs-12 datail-footer nopadding">
                            <?php echo do_shortcode("[mmt_social class='m-social-network col-md-6 col-lg-6 col-sm-12 col-xs-12 nopadding']"); ?>
                            <div class="col-xs-6 people-view">
                                <span><?php echo nava_get_post_views(get_the_ID()); ?> بازدید</span>
                            </div>
                        </div>
                        <div class="col-xs-12 m-tag">
                            <div class="col-md-6 col-xs-12 nopadding">
                                <?php
                                the_terms(get_the_ID(), $h->config['peopleVideosTag'], '','','');
                                ?>
                            </div>
<!--                            <div class="rating col-md-6 col-xs-12 nopadding">-->
<!--                                <div class="music-rating text-left">-->
<!--                                    <div class="stars">-->
<!--                                        <form action="">-->
<!--                                            <input class="star star-5" id="star-5" name="star" type="radio"> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" name="star" type="radio"> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" name="star" type="radio"> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" name="star" type="radio"> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" name="star" type="radio"> <label class="star star-1" for="star-1"></label>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                else:
                ?>
                <h1>محتوایی جهت نمایش وجود ندارد</h1>
                <?php
                endif;
                ?>
                <section class="col-md-12">
                    <div class="people-video-container">
                        <div class="row k-title-row">
                            <div class="col-md-6 col-xs-8 col-sm-8 col-lg-6 text-right">
                                <h2 class="k-title-text">ویدئوهای مرتبط</h2>
                                <span class="k-title-line"></span>
                            </div>
                        </div>
                        <?php
                        $i = 0;

                        $tube_related_q = get_related_posts($post_id, '4', array($post_id), $h->config['peopleVideosPostType'],$orderby = 'rand', $taxonomy = $h->config['peopleVideoCategory']);
                        if ($tube_related_q->have_posts()):
                            while($tube_related_q->have_posts()):
                                $tube_related_q->the_post();
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
                            endwhile;
                        endif;
                        ?>
                    </div>
                </section>
                <section class="col-md-12  clearfix">
                    <div class="k-comment k-web clearfix">
                        <header class="k-comment-header">
                            <h2><span class="icon icon-bubbles3"></span><?php comments_number( 'بدون دیدگاه', 'یک دیدگاه', '% دیدگاه' ); ?></h2>
                        </header>
                        <div class="k-comment-body">
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template('/inc/comments.php');
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>

            <?php get_template_part('template', 'pvid-aside'); ?>
        </div>
    </div>
</section>
<!--central-->

<?php
get_footer();
?>

