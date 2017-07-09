<?php
$GLOBALS['post_not_in'] = array();
get_header();
global $post;
$post_id = $post->ID;
?>
<!-- Inner news content -->

<?php

$artist_ids = array();
$is_note = false;
if (have_posts()):
while (have_posts()):
the_post();
$post_meta = get_post_meta(get_the_ID());
    $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(),'full');
    $cats = get_the_category(get_the_ID());

    foreach($cats as $cat) {
        if ($cat->slug == 'notes') {
            $is_note = true;
        }
    }
    if ($is_note == true):
?>
<section class="m-review-cover clearfix ">
    <div class="m-img-back" style='background:url(<?php echo $post_thumbnail; ?>);background-size: cover;'>
        <div class="m-img-back-cover">
        <!--     <img src="img/reviews/img1.jpg"> -->
        <!--     <div class="m-whiteshadow"></div> -->
        <div class="container">
            <div class="m-note-span">
                <h3 class="m-red-title"><?php echo (!empty($post_meta['postSupTitle'][0])) ? $post_meta['postSupTitle'][0] : ''; ?></h3>
                <span><?php the_title(); ?></span>
            </div>
            <div class="row">
                <div class="m-writer-box col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
                    <div class="m-circle-img-note">

                        <div class="m-note-circle">
                            <?php echo get_wp_user_avatar($meta['galleryPhotographer'][0], '150'); ?>
                        </div>
                        <div class="m-note-writer">
                            <span itemprop="author"><?php the_author_link(); ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
    <?php
        endif;
endwhile;
endif;
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
<div class="container m-margin-container">
    <div class="row">
        <!-- Artists images-->
        <section class="clearfix col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php
			$artist_ids = array();
            if (have_posts()):
                echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
				//echo nava_get_post_views($post_id);
                $post_id = '';
                while (have_posts()):
                    the_post();
                    $post_id = get_the_ID();
                    $post_meta = get_post_meta(get_the_ID());
					if (!empty($post_meta['gArtistName']) && isset($post_meta['gArtistName'])) {
					$artist_ids = $post_meta['gArtistName'];
					}
                    $GLOBALS['post_not_in'][] = get_the_ID();
					$post_gallery = get_post_gallery($post_id);
					//print_r($post_gallery);
					$content = strip_shortcode_gallery( get_the_content($post_id) );

					$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );


                    ?>
                    <article class="m-innernews-item nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12" itemscope itemtype="http://schema.org/Article">
                        <?php
                        if ($is_note == false) {
                            the_post_thumbnail('nava_image_l', array('class' => 'img-responsive m-bigimg-innernews', 'itemprop' => 'thumbnailUrl', 'alt' => get_the_title()));
                        }
                        ?>
                        <div class="k-b-itemdesc">
                            <h3 class="k-b-uptitle" itemprop="alternateName"><?php echo (!empty($post_meta['postSupTitle'][0])) ? $post_meta['postSupTitle'][0] : ''; ?></h3>
                            <h1 class="k-b-title" itemprop="name"><?php the_title(); ?></h1>
							<div itemprop="description">
                            <p class="k-b-intro" >
                                <?php
								echo $content;
                                echo "<div class='demo-gallery'>";
								echo nava_show_gallery_image_urls($post_id, true);
                                echo "</div>"
								?>

                            </p>
                            </div>
                            <div class="m-circle-writer">
                                <div class="m-innernews-circle">
									<?php echo get_wp_user_avatar($meta['galleryPhotographer'][0], '50'); ?>
                                    <span itemprop="author"><?php the_author_posts_link(); ?></span>
                                </div>
                                <div class="m-innernews-span k-news-item">
                                    <time itemprop="datePublished" datetime="<?php the_date('Y-m-d H:i:s'); ?>"
                                          class="conc-date  nopadding"><i
                                            class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date() . ' - ' . get_the_time() ; ?>
                                    </time>
                                </div>
                                <?php echo do_shortcode("[mmt_social class='m-social-network col-md-6 col-lg-6 col-sm-12 col-xs-12 nopadding']"); ?>
                            </div>
                            <div class="row nopadding m-tag">
                                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" itemprop="keywords">
                                    <?php
										the_tags('', '', '');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
            wp_reset_query();
            endif;
            include_once "ads-themplate/single-728.php";
            ?>

            <article class="m-innernews-related m-innernews-item nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="m-owl-newsinner">
                    <div class="row nopadding k-title-row">

                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <h2 class="m-title-related"><i class="fa fa-link" aria-hidden="true"></i> مطالب مرتبط</h2>
                        </div>

                    </div>

                    <div id="m-owl-newsinner" class="owl-carousel">
                        <?php

						if (is_array($artist_ids) == false || count($artist_ids) < 2) {
							$artist_ids = $artist_ids[0];
						}
						$artist_related = get_related_posts_by_artist_id($artist_ids, 'post', 4, $GLOBALS['post_not_in']);
						
						//echo $artist_related->post_count;
						//echo $artist_related->post_count;
						if (empty($artist_related)) {
							$q = get_related_posts($post_id, 12, $GLOBALS['post_not_in']);
							$new_q = $q->posts;
						} elseif ($artist_related->post_count <= 4) {
							$q = get_related_posts($post_id, 8, $GLOBALS['post_not_in']);
							$new_q = array_merge($artist_related->posts, $q->posts);
						} else {
							$new_q = $artist_related;
						}
						//print_r($new_q);
						//echo count($new_q);
						//wp_die();
                        if (count($new_q) > 0):
                            foreach ($new_q as $p):
								$post_id = $p->ID;
								$post_meta = get_post_meta($post_id);
								if (!empty( $post_meta['postSupTitle']) && isset( $post_meta['postSupTitle'])) {
                                $related_sup_title = $post_meta['postSupTitle'][0];
								} else {
									$related_sup_title = '';
								}
								//$artist_id = get_post_meta('gArtistName');

                                ?>
                                <div class="item">
                                    <a href="<?php echo get_the_permalink($post_id); ?>">
                                        <?php echo get_the_post_thumbnail($post_id, 'nava_image_m', array('class' => 'img-responsive')) ?>
                                        <div class="k-s-itemdesc">
                                            <?php if (isset($related_sup_title) && !empty($related_sup_title)): ?><h3 class="m-red-title"><?php echo $related_sup_title; ?></h3><?php endif; ?>
                                            <h4><?php echo get_the_title($post_id); ?></h4>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endforeach;
                        wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>
            </article>
            <?php
                include_once "ads-themplate/single-728-after.php";
            ?>

            <article class="col-md-12 col-sm-12 col-xs-12 col-lg-12 nopadding">
                <div class="m-owl-newsinner2">
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 nopadding">
                        <div class=" m-owl-imgs">
                            <div class="m-music-inner clearfix">
                                <?php
                                $video_args = array(
                                    'posts_per_page'    => '4',
                                    'order'             => 'DESC',
                                    'orderby'           => 'date',
                                    'post_type'         => 'music',
                                );
                                $video_query = new WP_Query($video_args);
                                if ($video_query->have_posts()):
                                    while($video_query->have_posts()):
                                        $video_query->the_post();
										$music_meta = get_post_meta(get_the_ID());

                                ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="movie_thumb_wrapper">
                                  <span class="movie_thumb">
                                      <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                                  </span>
                                  <span class="movie-details">
                                    <span class="movie_title">
                                        <?php
										if (!empty($music_meta['musicName']) && isset($music_meta['musicName'])) {
											//echo $music_meta['musicName'][0];
											the_title();
										} else {
											the_title();
										}
										?>
                                    </span>
                                    <span class="play-btn">
                                        <i class="fa fa-play" aria-hidden="true"></i>  در نوا گوش کنید
                                    </span>
                                  </span>
                                </a>
                                <?php
                                    endwhile;
                                wp_reset_query();
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="nava-logo-wrapper col-md-2 col-lg-2 col-sm-2 col-xs-12 nopadding">
                        <div class="m-music-lastbox nopadding text-center">
                            <a href="<?php echo home_url('music') ?>"><img src="<?php echo THEME_IMAGES ?>logo.png"></a>
                            <div>در نوا موزیک دانلود کنید و گوش دهید.</div>
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
        <!--MinaN Inner news content-->

        <!--MinaN Artists filter-->
        <aside class="side nopadding-top col-md-4 col-sm-12 col-xs-12 col-lg-4 clearfix">


            <?php if (is_active_sidebar('single-simple-widget-area')) : ?>
                <?php
                include_once "ads-themplate/sidebar-ads.php";
                dynamic_sidebar('single-simple-widget-area'); ?>
            <?php endif; ?>

        </aside>
        <!-- Artists filter-->
    </div>
</div>
<!-- End Inner news content -->
<?php get_footer(); ?>
