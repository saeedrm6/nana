<?php get_header(); ?>
    <div class="m-top-music-landing">
    <section class="k-central">
        <div class="container">
            <div class="row">
                <div class="k-music-featured m-margin-container" id="k-music-featured">
                    <div class="k-music-back">
                        <div  class="owl-carousel owl-k-music-row">
                        <?php
                        $feature_query = get_featured_musics(8, 0);
                        if ($feature_query->have_posts()):
                            while($feature_query->have_posts()):
                                $feature_query->the_post();
                                $music_meta = get_post_meta(get_the_ID());
                                if (!empty($music_meta['musicBackColor']) || isset($music_meta['musicBackColor'])) {
                                    $backColor = esc_attr($music_meta['musicBackColor'][0]);
                                } else {
                                    $backColor = '#dc2827';
                                }

                        ?>
                            <div class="item" id="item1" style="
                            background: <?php echo $backColor; ?>;
                            background: -moz-linear-gradient(top,  <?php echo $backColor; ?> 0%, #000 100%);
                            background: -webkit-linear-gradient(top,  <?php echo $backColor; ?> 0%,#000 100%);
                            background: linear-gradient(to bottom,  <?php echo $backColor; ?> 0%,#000 100%);
                            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $backColor; ?>', endColorstr='#000',GradientType=0 );
                            ">
                                <figure class="effect-phoebe">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')) ?>
                                    </a>
                                    <figcaption>
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php echo (!empty($music_meta['musicName'][0])) ? esc_attr($music_meta['musicName'][0]) : '' ; ?></h2>
                                            <h3><?php echo (!empty($music_meta['gArtistName'])) ? implode('، ', get_artist_name_by_id($music_meta['gArtistName'])) : ''; ?></h3>
                                        </a>
                                    </figcaption>
                                </figure>
                            </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="m-margin-container container">
                  <div class="row">
                        <div class="k-genres">
                            <div class="col-md-3 col-xs-12 col-sm-3 pop">
                                <a href="<?php echo home_url('musics/pop'); ?>">
                                    <h2>پاپ</h2>
                                    <h3>POP</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 rock">
                                <a href="<?php echo home_url('musics/rock'); ?>">
                                    <h2>راک</h2>
                                    <h3>ROCK</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 traditional">
                                <a href="<?php echo home_url('musics/traditional'); ?>">
                                    <h2>سنتی</h2>
                                    <h3>TRADITIONAL</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 fusion">
                                <a href="<?php echo home_url('musics/fusion'); ?>">
                                    <h2>تلفیقی</h2>
                                    <h3>FUSION</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 electronic">
                                <a href="<?php echo home_url('musics/electronic'); ?>">
                                    <h2>الکترونیک</h2>
                                    <h3>ELECTRONIC</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 jazz">
                                <a href="<?php echo home_url('musics/jazz'); ?>">
                                    <h2>جز</h2>
                                    <h3>JAZZ</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 religious">
                                <a href="<?php echo home_url('musics/religious'); ?>">
                                    <h2>مذهبی</h2>
                                    <h3>RELIGIOUS</h3>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-3 folk">
                                <a href="<?php echo home_url('musics/folk'); ?>">
                                    <h2>محلی</h2>
                                    <h3>FOLK</h3>
                                </a>
                            </div>
                        </div>
                    <div class="col-md-8">
						<?php
									wp_reset_query();
                                    $hot_args = array(
                                        'posts_per_page'    => '12',
                                        'order'             => 'DESC',
                                        'post_type'         => 'music',
                                        'meta_key'          => 'nava_post_views_count',
                                        'orderby'           => 'meta_value_num',
                                        'date_query'        => array(
                                            array(
                                                'after' => '1 week ago'
                                            )
                                        )
                                    );
                                    $hot_query = new WP_Query($hot_args);
									//print_r($hot_query->post_count);
                                    if ($hot_query->have_posts()):
						?>
                        <div class="k-music-containers hot" id="m-music-containers">

                            <div class="k-music-back">
								<?php echo nava_title_row('داغ ترین ها', '#', 'fa-diamond','', true); ?>
                                <div  class="owl-carousel owl-k-music-row">
                                    <?php

                                    while($hot_query->have_posts()):
                                    $hot_query->the_post();
                                    $post_meta = get_post_meta(get_the_ID());
                                    ?>
                                    <div class="item">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                            <div>
                                                <?php if (!empty($music_slider_meta['musicName'])): ?>
												<h3><?php echo $music_slider_meta['musicName'][0]; ?></h3>
												<?php endif; ?>
												<?php if (!empty($music_slider_meta['gArtistName'])): ?>
                                                <h4><?php echo implode('، ', get_artist_name_by_id($music_slider_meta['gArtistName'])); ?></h4>
												<?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>
                                </div>
                            </div>
                        </div>
						<?php endif; ?>
						<?php
								wp_reset_query();
                                $last_args = array(
                                    'posts_per_page'    => '12',
                                    'order'             => 'DESC',
                                    'orderby'           => 'date',
                                    'post_type'         => 'music',

                                );
                                $last_query = new WP_Query( $last_args );
                                if (have_posts()):
						?>
                        <div class="k-music-containers">
							<?php echo nava_title_row('دانلود آهنگ جدید', home_url('#'), '', '', '', 'h1'); ?>
                            <div class="new">
                                <?php

                                    while(have_posts()):
                                        the_post();
                                        $post_meta = get_post_meta(get_the_ID());
                                        ?>
                                        <div class="item col-md-3 col-xs-12 col-sm-4 col-lg-3">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                                <div>
                                                    <?php if (!empty($post_meta['musicName'])): ?>
													<h3><?php echo esc_attr($post_meta['musicName'][0]); ?></h3>
													<?php endif; ?>
													<?php if (!empty($post_meta['gArtistName'])): ?>
                                                    <h4><?php echo implode('، ', get_artist_name_by_id($post_meta['gArtistName'])); ?></h4>
													<?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
									echo do_shortcode('[pagination]');
                                ?>
                            </div>
                        </div>
						<?php endif; ?>
                        
						<?php
								wp_reset_query();
                                $playlist_args = array(
                                    'posts_per_page'    => '12',
                                    'order'             => 'DESC',
                                    'orderby'           => 'date',
                                    'post_type'         => 'playlist'
                                );
                                $playlist_query = new WP_Query( $playlist_args );
                                if ($playlist_query->have_posts()):
								?>
                        <div class="k-music-containers" id="playlist">
							<?php echo nava_title_row('پلی لیست نوا', home_url('playlist'), 'fa-caret-square-o-right'); ?>
                            <div  class="owl-carousel owl-k-music-row">
                                <?php
                                    while($playlist_query->have_posts()):
                                        $playlist_query->the_post();
                                        $post_meta = get_post_meta(get_the_ID());
                                        ?>
                                        <div class="item">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                                <div>
                                                    <?php if (!empty($post_meta['playlistName'][0])): ?>
													<h3><?php echo esc_attr($post_meta['playlistName'][0]); ?></h3>
													<?php endif; ?>
													<?php if (!empty($post_meta['playlistName'])): ?>
                                                    <h4><?php echo implode('، ', get_artist_name_by_id($post_meta['playlistName'])); ?></h4>
													<?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;

                                ?>
                            </div>
                        </div>

						<?php
						endif;
								wp_reset_query();
                                $soundtrack_args = array(
                                    'posts_per_page'    => '12',
                                    'order'             => 'DESC',
                                    'orderby'           => 'date',
                                    'post_type'         => 'soundtrack'
                                );
                                $soundtrack_query = new WP_Query( $soundtrack_args );
                                if ($soundtrack_query->have_posts()):
							?>
                        <div class="k-music-containers">
							<?php echo nava_title_row('موسیقی فیلم', home_url('soundtrack'), 'fa-film'); ?>
                            <div  class="owl-carousel owl-k-music-row">
                                <?php
                                    while($soundtrack_query->have_posts()):
                                        $soundtrack_query->the_post();
                                        $post_meta = get_post_meta(get_the_ID());
                                        ?>
                                        <div class="item">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                                <div>
													<?php if (!empty($post_meta['playlistName'][0])): ?>
                                                    <h3><?php echo esc_attr($post_meta['playlistName'][0]); ?></h3>
													<?php endif; ?>
													<?php if (!empty($post_meta['playlistName'])): ?>
                                                    <h4><?php echo implode('، ', get_artist_name_by_id($post_meta['playlistName'])); ?></h4>
													<?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;

                                ?>
                            </div>
                        </div>
						<?php
						endif;
                                ?>
                    </div>
                    <aside class="side col-md-4 " id="myScrollspy" >
                        <?php if (is_active_sidebar('music-widget-area')) : ?>
                            <?php dynamic_sidebar('music-widget-area'); ?>
                        <?php endif; ?>
                    </aside>
                  </div>
                </div>

        </div>
    </section>
<?php get_footer(); ?>
