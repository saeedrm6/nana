<?php
$GLOBALS['post_not_in'] = array();
get_header();
global $post;
$post_id = $post->ID;
?>
<?php
if (have_posts()):
    echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
    $artist_id = 0;
    $artist_name = '';
    $artist_age = 0;
	$artist_dead = false;
	$artist_death_date = 0;
    $artist_home_town = '';
    $bio = '';
    while(have_posts()):
        the_post();
        $p_id = get_the_ID();
        $post_meta = get_post_meta($p_id);
        $artist_id = $p_id;
        if (!empty($post_meta['artistAge'])) {
            $artist_age = $post_meta['artistAge'];
        }
        if (!empty($post_meta['artistHomeTown'])) {
            $artist_home_town = $post_meta['artistHomeTown'];
        }
		
		if (!empty($post_meta['artistDead']) && $post_meta['artistDead'][0] == 1) {
		
			$artist_dead = true;
			$artist_death_date = $post_meta['artistDeathDate'][0];
		}
        $artist_name = get_the_title();
        $bio = get_the_content();
?>
<section class="m-artist-cover clearfix"
         style="background-image: url('<?php if (!empty($post_meta['artistProfile'])) { echo get_attachment_by_id($post_meta['artistProfile'][0])->guid; } else { echo THEME_IMAGES . 'bg-11.jpg'; } ?>');">
    <div class="container">
        <div class="m-artist-img">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 pull-right">
                <?php
                $profile_image = get_the_post_thumbnail_url($post_id);
                if (!empty($profile_image)) {
                    the_post_thumbnail('nava_music_m', array(
                        'class'     => 'img-responsive'
                    ));
                } else {
                    echo '<img src="' . THEME_IMAGES . 'wiki.jpg' . '" />';
                }

                 ?>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                <h2><?php the_title(); ?></h2>
                <div class="m-social-networks">
                    <?php if (!empty($post_meta['artistFacebook'])): ?>
                        <a href="<?php echo $post_meta['artistFacebook'][0]; ?>">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['artistInstagram'])): ?>
                        <a href="<?php echo $post_meta['artistInstagram'][0]; ?>">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['artistTelegram'])): ?>
                        <a href="<?php echo $post_meta['artistTelegram'][0]; ?>">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['artistTwitter'])): ?>
                        <a href="<?php echo $post_meta['artistTwitter'][0]; ?>">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endwhile;
endif;
?>
<div class="container m-whole-container">
    <div class="row">
        <section class="clearfix col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <?php
			wp_reset_query();
            $artist_music_args = array(
                'posts_per_page'    => '8',
                'post_type'         => 'music',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'meta_query'        => array(
                    array(
                        'key'       => 'gArtistName',
                        'value'     => $artist_id,
                        'compare'   => '='
                    )
                )
            );
            $artist_music_q = new WP_Query( $artist_music_args );
            if ($artist_music_q->have_posts()):
			
            ?>
            <div class="m-artist-box">
                <div class="owl-k-news">
                    <?php echo nava_search_archive_left_btn(home_url('finds'), $artist_name, 'music', 'موسیقی'); ?>
                    <div id="owl-k-music-artist" class="owl-carousel">
                        <?php
                            while($artist_music_q->have_posts()):
                                $artist_music_q->the_post();
								$music_meta = get_post_meta(get_the_ID());
                        ?>
                        <div class="item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'nava_music_m', array( 'class' => 'img-responsive' ) ); ?>
                                <div>
                                    <h3><?php echo (!empty($music_meta['musicName'][0])) ? $music_meta['musicName'][0] : '' ; ?></h3>
                                    <h4><?php //echo (!empty($music_meta['gArtistName'])) ? implode('، ', get_artist_name_by_id($music_meta['gArtistName'])) : ''; ?></h4>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php
            endif;
			wp_reset_query();
            $artist_news_args = array(
                'posts_per_page'    => '8',
                'orderby'           => 'date',
                'order'             => 'DESC',
				'post_type'			=> 'post',
                'meta_query'        => array(
                    array(
                        'key'       => 'gArtistName',
                        'value'     => $artist_id,
                        'compare'   => '='
                    )
                )
            );
            $artist_news_q = new WP_Query( $artist_news_args );

            if ($artist_news_q->have_posts()):
            ?>
            <div class="m-artist-box">
                <div class="owl-k-news">
                    <?php echo nava_search_archive_left_btn(home_url('finds'), $artist_name, 'post', 'خبر و گزارش'); ?>
                    <div id="owl-k-news-artist" class="owl-carousel owl-k-news-artist">
                        <?php
                            while($artist_news_q->have_posts()):
                                $artist_news_q->the_post();
								$news_meta = get_post_meta(get_the_ID());
                        ?>
                        <div class="item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'nava_image_m', array( 'class' => 'img-responsive' ) ); ?>
                                <div>
                                    <h4><?php if (!empty($news_meta['postSupTitle'])) { echo $news_meta['postSupTitle'][0]; }; ?></h4>
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            endif;
            wp_reset_query();
            $artist_review_args = array(
                'posts_per_page'    => '8',
                'orderby'           => 'date',
                'post_type'         => 'reviews',
                'order'             => 'DESC',
                'meta_query'        => array(
                    array(
                        'key'       => 'gArtistName',
                        'value'     => $artist_id,
                        'compare'   => '='
                    )
                )
            );
            $artist_review_q = new WP_Query( $artist_review_args );
            if ($artist_review_q->have_posts()):
            ?>
            <div class="m-artist-box">
                <div class="owl-k-news">
                    <?php echo nava_search_archive_left_btn(home_url('finds'), $artist_name, 'reviews', 'نقد و بررسی ها'); ?>
                    <div id="owl-k-reviews-artist" class="owl-carousel owl-k-news-artist">
                        <?php
                        while($artist_review_q->have_posts()):
                            $artist_review_q->the_post();
                            ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'nava_music_m', array( 'class' => 'img-responsive' ) ); ?>
                                    <div>
                                        <h3><?php echo (!empty($music_meta['musicName'][0])) ? $music_meta['musicName'][0] : '' ; ?></h3>
                                        <h4><?php echo (!empty($music_meta['gArtistName'])) ? implode('، ', get_artist_name_by_id($music_meta['gArtistName'])) : ''; ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            endif;
			wp_reset_query();
			//echo $artist_id;
			
            $artist_navagram_args = array(
                'posts_per_page'    => '8',
                'orderby'           => 'date',
                'post_type'         => 'navagram',
                'order'             => 'DESC',
                'meta_query'        => array(
                    array(
                        'key'       => 'gArtistName',
                        'value'     => $artist_id,
                        'compare'   => '='
                    )
                )
            );
            $artist_navagram_q = new WP_Query( $artist_navagram_args );
			//echo $artist_navagram_q->post_count;
            if ($artist_navagram_q->have_posts()):
            ?>
            <div class="m-artist-box">
                <div class="owl-k-news">
                    <?php echo nava_search_archive_left_btn(home_url('finds'), $artist_name, 'navagram', 'نواگرام'); ?>
                    <div id="owl-k-navagram-artist" class="owl-carousel owl-k-news-artist">
                        <?php
                        while($artist_navagram_q->have_posts()):
                            $artist_navagram_q->the_post();
							//$music_meta = get_post_meta(get_the_ID());
                        ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'nava_music_m', array( 'class' => 'img-responsive' ) ); ?>
                                    <div>
                                        <h4><?php //echo (!empty($music_meta['musicName'])) ? $music_meta['musicName'][0] : '' ; ?></h4>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
                endif;
            ?>
            <?php
			wp_reset_query();
            $artist_tv_args = array(
                'posts_per_page'    => '8',
                'orderby'           => 'date',
                'post_type'         => 'tv',
                'order'             => 'DESC',
                'meta_query'        => array(
                    array(
                        'key'       => 'gArtistName',
                        'value'     => $artist_id,
                        'compare'   => '='
                    )
                )
            );
            $artist_tv_q = new WP_Query( $artist_tv_args );
            if ($artist_tv_q->have_posts()):
            ?>
            <div class="m-artist-box">
                <div class="owl-k-video">
                    <?php echo nava_search_archive_left_btn(home_url('finds'), $artist_name, 'tv', 'ویدیوها'); ?>
                    <div id="owl-k-video-artist" class="owl-carousel owl-k-news-artist">
                        <?php
                        while($artist_tv_q->have_posts()):
                            $artist_tv_q->the_post();
                        ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'nava_image_m', array( 'class' => 'img-responsive' ) ); ?>
                                    <div>
                                        <h3><?php //echo (!empty($music_meta['musicName'][0])) ? $music_meta['musicName'][0] : '' ; ?></h3>
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <?php
                endif;
            ?>
        </section>
        <aside class="m-inner-side col-md-4 col-sm-4 col-xs-12 col-lg-4 clearfix" >
            <div class="m-biography k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <div class="m-padding-row">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <h2 class="k-title-text">بیوگرافی <?php echo $artist_name; ?></h2>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <ul class="list-group">
                            <li class="m-list-group-item">نام: <?php echo $artist_name; ?></li>
                            <?php if (!empty($artist_home_town)): ?><li class="m-list-group-item">شهر محل تولد: <?php echo $artist_home_town[0]; ?></li><?php endif; ?>
                            <?php
                            $cat = new WPSEO_Primary_Term('wikinode', $post_id);
                            $prime_cat = $cat->get_primary_term();
                            $primary_term_name = get_term_field('name', $prime_cat, 'wikinode');
                                if (!empty($prime_cat)):
                                    ?>
                            <li class="m-list-group-item"><?php

                                $term = $terms[0]->name;

                                echo '<a href="' . get_term_link($prime_cat, 'wikinode') . '">' . $primary_term_name . '</a>';
                                endif; ?>
                                </li>

                            <?php if (!empty($artist_age)): ?><li class="m-list-group-item">تاریخ تولد: <?php
							echo $artist_age[0];
							if ($artist_dead) {
								echo '<br />'.' تاریخ فوت ' . $artist_death_date;
							}
							//echo calc_age($artist_age[0]); ?></li><?php endif; ?>
                        </ul>
                        <p class="m-bio"><?php echo $bio; ?></p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
<?php
get_footer();
?>
