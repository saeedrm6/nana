<?php
get_header();
global $post;
$post_id = $post->ID;
?>
<?php
if (have_posts()):
echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
    while(have_posts()):
        the_post();
        $p_id = get_the_ID();
        $post_meta = get_post_meta($p_id);
        if (!empty($post_meta['gArtistName'])) {
            $artist_names = implode('، ',get_artist_name_by_id($post_meta['gArtistName']));
        }
?>
<section class="m-review-cover clearfix">
    <div class="m-img-back"
	style='background-image:url("<?php if (!empty($post_meta['reviewAlbumImage'][0]) && get_attachment_by_id($post_meta['reviewAlbumImage'][0])->guid) { echo get_attachment_by_id($post_meta['reviewAlbumImage'][0])->guid; } else { echo THEME_IMAGES . 'rv2.jpg'; } ?>")'>
        <div class="me-img-over-back"></div>
        <div class="container">
            <div class="row">
                <div class="m-review-img m-section-margin">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <?php the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')); ?>
                    </div>
                    <div class="m-caption-review col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if (!empty($post_meta['reviewSupTitle'])): ?><h3 class="m-red-title"><?php echo $post_meta['reviewSupTitle'][0]; ?></h3><?php endif; ?>
                            <h1><?php the_title(); ?></h1>
                            <div class=""><?php 
							
							$post_content = get_post_field('post_content', $p_id);
							$post_extended = get_extended($post_content);
							echo $post_extended['main'];
							
							?></div>
                        </div>

                        <ul class="specs col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <?php
                            if (!empty($post_meta['reviewAlbumName'])):
                            ?>
                            <li>
                                <span class="spec-title">نام آلبوم:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewAlbumName'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php
                            if (isset($artist_names)):
                            ?>
                            <li>
                                <span class="spec-title">نام <?php echo (!empty($post_meta['gArtistName']) && count($post_meta['gArtistName']) > 1 ) ? 'هنرمندان' : 'هنرمند' ;  ?>:</span>
                                <span class="spec-value"><?php echo $artist_names ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($post_meta['reviewMusician'])): ?>
                            <li>
                                <span class="spec-title">آهنگساز:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewMusician'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($post_meta['reviewRegulator'])): ?>
                            <li>
                                <span class="spec-title">تنظیم کننده:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewRegulator'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($post_meta['reviewMixAndMaster'])): ?>
                            <li>
                                <span class="spec-title">میکس و مستر:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewMixAndMaster'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php  if (!empty($post_meta['reviewNavaPublish'])): ?>
                            <li>
                                <span class="spec-title">سال انتشار:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewNavaPublish'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($post_meta['reviewNavaSongWriter'])): ?>
                            <li>
                                <span class="spec-title">ترانه سرا:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewNavaSongWriter'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($post_meta['reviewNavaPublisher'])): ?>
                            <li>
                                <span class="spec-title">ناشر:</span>
                                <span class="spec-value"><?php echo $post_meta['reviewNavaPublisher'][0]; ?></span>
                            </li>
                            <?php endif; ?>
                            <?php

                            $review_terms = get_the_terms($p_id, 'review');
                            if (!empty($review_terms)): ?>
                            <li>
                                <span class="spec-title">سبک:</span>
                                <a href="<?php echo get_term_link($review_terms[0]->term_id, 'review'); ?>"><span class="spec-value"><?php echo $review_terms[0]->name; ?></span></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <div class="k-review-rating col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <?php
                                $review = 0;
                                $reviewCount = 0;
                                if (!empty($post_meta['reviewNavaAll'][0])) {
                                    $review += $post_meta['reviewNavaAll'][0];
                                    $reviewCount++;
                                }
                                if (!empty($post_meta['reviewNavaTuning'][0])) {
                                    $review += $post_meta['reviewNavaTuning'][0];
                                    $reviewCount++;
                                }
                                if (!empty($post_meta['reviewNavaMusic'][0])) {
                                    $review += $post_meta['reviewNavaMusic'][0];
                                    $reviewCount++;
                                }
                                if (!empty($post_meta['reviewNavaMix'][0])) {
                                    $review += $post_meta['reviewNavaMix'][0];
                                    $reviewCount++;
                                }
                                if (!empty($post_meta['reviewNavaComposer'][0])) {
                                    $review += $post_meta['reviewNavaComposer'][0];
                                    $reviewCount++;
                                }
								if ($reviewCount != 0) {
									$result = $review / $reviewCount;
								}
                                if ( !empty($result) ):
                                ?>
                                <div class="k-rate circle circle-rating" data-value="<?php echo $result/10 ; ?>">
                                    <canvas width="80" height="80"></canvas>
                                    <canvas width="80" height="80"></canvas>
                                    <strong><?php echo $result; ?></strong>
                                </div>
                                <h5 class="rating--total">مجموع رای نوا</h5>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="">
                                <?php
                                $user_result = $review_obj->get_post_total_avg_result($p_id);
                                if ( !empty($user_result) ):
                                    ?>
                                    <div id="reviewTotalResult" class="k-rate circle circle-rating" data-value="<?php echo esc_attr(number_format($user_result/10, 1)); ?>">
                                        <canvas width="80" height="80"></canvas>
                                        <canvas width="80" height="80"></canvas>
                                        <strong><?php echo esc_attr(number_format($user_result, 1)); ?></strong>
                                    </div>

                                <?php else: ?>
                                    <div id="reviewTotalResult" class="k-rate circle circle-rating" data-value="0">
                                        <canvas width="80" height="80"></canvas>
                                        <canvas width="80" height="80"></canvas>
                                        <strong>0.0</strong>
                                    </div>
                                <?php endif; ?>
                                <h5 class="rating--total">مجموع رای کاربر</h5>
                                <br>
                                <a href="#" class="kbtn white ratebtn">ثبت رای</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<div class="container m-margin-container">
            <div class="row">
                <!-- Review Inner-->
                <section class="clearfix col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <article id="review-inner-page" class="m-innernews-item rating nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="k-b-itemdesc">
                            <?php if (!empty($post_meta['reviewSupTitle'])): ?><p class="k-b-uptitle"><?php echo $post_meta['reviewSupTitle'][0]; ?></p><?php endif; ?>
                            <a href="#">
                                <h4 class="k-b-title"><?php the_title(); ?></h4>
                            </a>
                            <p class="k-b-intro">
                                <?php the_content(); ?>
                            </p>

                            <div class="m-circle-writer">
                                <div class="m-innernews-circle">
									 <?php echo get_wp_user_avatar(get_the_author_meta('user_email'), '50'); ?>
                                    <span><?php the_author_posts_link(); ?></span>
                                </div>
                                <div class="m-innernews-span k-news-item">
                                    <time datetime="<?php the_date('Y-m-d H:i:s'); ?>"
                                          class="conc-date col-md-6 col-sm-12 col-xs-12 col-lg-6 nopadding"><i
                                            class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?>
                                    </time>
                                </div>
                                <?php echo do_shortcode("[mmt_social class='m-social-network col-md-6 col-lg-6 col-sm-12 col-xs-12 nopadding']"); ?>
                            </div>
                            <div class="row nopadding m-tag">
                                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                    <?php
                                    the_terms(get_the_ID(), 'review-tag', '','','');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    
                    <section class="k-comment clearfix">
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
                    </section>
                </section>
                <!-- Review Inner content-->

                <!-- Review Inner Side-->
                <aside class="side nopadding-top col-md-4 col-sm-4 col-xs-12 col-lg-4 clearfix">
                    <?php
                    if (is_active_sidebar('reviews-single-widget-area')) {
                        dynamic_sidebar('reviews-single-widget-area');
                    }
                    ?>
                </aside>
                <!-- Review Inner side-->
            </div>
        </div>
<?php
    endwhile;
endif;
?>

<article class="m-innernews-item ratebox nopadding">
    <div class="k-b-itemdesc">
        <div id="preloader" class="review-loading hide">
            <div id="status"></div>
        </div>
        <form class="register-form" action="" method="post">
            <input type="hidden" name="review_nonce" id="voteNonce" value="<?php echo wp_create_nonce('review_nonce'); ?>" />
            <input type="hidden" name="review_id" id="postId" value="<?php echo $post_id ?>">

            <div class="rating-header row">
                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3"><h3><i class="fa fa-sliders" aria-hidden="true"></i> امتیاز دهی</h3></div>
                <div class="col-md-9 col-sm-9 col-xs-12 col-lg-9 text-left nopadding-left"></div>
            </div>
            <div class="rating-wraper col-md-12">
                <?php
                if (is_user_logged_in()):
                    global $post;
                    $user_review = $review_obj->get_user_vote($post_id,get_current_user_id());

                    if (!empty($user_review)) {
                        echo '<h4>شما قبلا رای خود را ثبت کرده اید میانگین آرای ثبت شده را می توانید مشاهده کنید.</h4>';
                    }

                    $review_options = $review_obj->review_options;
                    for($i = 0; $i < count($review_options) ; $i++):
                        ?>

                        <div class="row rating-bar">
                            <div class="rating-row col-md-12 col-xs-12 nopadding">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3 nopadding-right dir-rtl"><span class="rating-title"><?php echo $review_options[$i]; ?></span></div>
                                <div class="col-md-9 col-sm-9 col-xs-12 col-lg-9 text-left <?php echo (!empty($user_review)) ? 'rating-line' : '';  ?>" id="rating-hover">
                                    <div id="rating-box">
                                        <?php if (!empty($user_review)): ?>
                                            <div class="rate-number rate-number<?php echo $i+1; ?>"><?php echo number_format($review_obj->vote_option_total_avg($post_id,$i+1), 1); ?></div>
                                        <?php else: ?>
                                            <div class="rate-number rate-number<?php echo $i+1; ?>">
                                                <?php echo number_format($review_obj->vote_option_total_avg($post_id,$i+1), 1); ?>
                                            </div>
                                            <input id="ex<?php echo $i+1 ?>" class="x review-input" name="review_opt<?php echo $i+1 ?>" data-slider-id='ex<?php echo $i+1 ?>Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <h4>برای ثبت رای باید ابتدا وارد شوید.</h4>


                            <div class="pull-right col-md-6 col-xs-12 nopadding-right">
                                <a class="a-register col-md-12 text-center" href="<?php echo home_url($h->config['registerSlug']) . '?redirect_to=' . urlencode(get_the_permalink($post_id)); ?>">ثبت نام</a>
                            </div>
                            <div class="pull-right col-md-6 col-xs-12 nopadding-left">
                                <a class="a-register col-md-12 text-center" href="<?php echo home_url($h->config['loginSlug']) . '?redirect_to=' . urlencode(get_the_permalink($post_id)); ?>">ورود</a>
                            </div>

                <?php endif; ?>
            </div>
            <div class="col-md-12 col-xs-12 text-center k-web">
            <?php if (empty($user_review) && is_user_logged_in()): ?>
                <button id="submitReview" class="kbtn white col-md-3 col-xs-12" name="review_submit">ثبت رای</button>
            <?php endif; ?>
            </div>
        </form>
    </div>
</article>

<!--Rate-lightbox-->

<?php
get_footer();
?>
