<?php
/**
 * Template Name: جستجو
 */
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
<section class="k-central">
    <div class="container">
        <div class="row">
            <div class="m-search-header clearfix">

                <div class="search-box-inner col-xs-12">
                  <div class="search-box-color">

                <div class="m-advsearch col-xs-12">
                    <h2 class="k-title-text"><i class="fa fa-search-plus" aria-hidden="true"></i>  جستجوی پیشرفته</h2>

                </div>
                <div class="m-search-box col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
                    <?php
                    if ( isset($_POST['search']) && !empty($_POST['search']) ) {
                        $post_types = array();
                        $search_word 	= $_POST['search'];
                        if (isset($_POST['sAll']) && $_POST['sAll'] == 'on') {
                            $post_query     = nava_get_search_query( 'post'      , 6,  $search_word );
                            $wiki_query     = nava_get_search_query( 'wiki'      , 6,  $search_word );
                            $music_query    = nava_get_search_query( 'music'     , 8,  $search_word );
                            $tv_query       = nava_get_search_query( 'tv'        , 8,  $search_word );
                            $navagram_query = nava_get_search_query( 'navagram'  , 8,  $search_word );
                            $gallery_query  = nava_get_search_query( 'gallery'   , 4,  $search_word );
                            $concert_query  = nava_get_search_query( 'concert'   , 4,  $search_word );

                        } else {

                            if (isset($_POST['sNews']) && $_POST['sNews'] == 'on') {
                                $post_query     = nava_get_search_query( 'post'      , '6',  $search_word );
                            }
                            if (isset($_POST['sArtist']) && $_POST['sArtist'] == 'on') {
                                $wiki_query     = nava_get_search_query( 'wiki'      , '6',  $search_word );
                            }
                            if (isset($_POST['sMusic']) && $_POST['sMusic'] == 'on') {
                                $music_query    = nava_get_search_query( 'music'     , '8',  $search_word );
                            }
                            if (isset($_POST['sTv']) && $_POST['sTv'] == 'on') {
                                $tv_query       = nava_get_search_query( 'tv'        , '6',  $search_word );
                            }
                            if (isset($_POST['sNavagram']) && $_POST['sNavagram'] == 'on') {
                                $navagram_query = nava_get_search_query( 'navagram'  , '6',  $search_word );
                            }
                            if (isset($_POST['sGallery']) && $_POST['sGallery'] == 'on') {
                                $gallery_query  = nava_get_search_query( 'gallery'   , '6',  $search_word );
                            }
                            if (isset($_POST['sConcert']) && $_POST['sConcert'] == 'on') {
                                $concert_query  = nava_get_search_query( 'concert'   , '6',  $search_word );
                            }
                        }
                    } else {
                        $errors[] = 'جهت جستجو در یک بخش عبارت مورد جستجوی خود را وارد نمایید.';
                    }
                    // print_r($_POST);
                    // print_r($args);
                    if (isset($_POST['search']) && !empty($_POST['search'])):
                    ?>
                    <span>عبارت جستجو شده  <strong><?php echo htmlentities(esc_attr($_POST['search'])); ?></strong></span>
                    <?php endif;
                    if( !empty($errors) ): ?>
                    <span>
                        <?php
                        foreach($errors as $error) {
                            echo $error . "<br />";
                        }
                        ?>
                    </span>
                    <?php endif; ?>
                    <form method="POST" action="<?php  echo home_url('find');
//					if (count($_POST) >= 5) {
//						echo home_url('find');
//					} else {
//						echo home_url('finds');
//					}
					 ?>" class="m-search-form col-md-12 col-sm-12 col-xs-12 col-lg-12">
<!--						<div class="hide">-->
<!--						--><?php //
//						echo count($_POST);
//						print_r($_POST); ?>
<!--						</div>-->
                        <div class="m-search-div">
                            <p class="input_box">
                                <input type="text" value="<?php echo (isset($_POST['search']) && !empty($_POST['search'])) ? strip_tags(esc_attr($_POST['search'])) : '' ; ?>" placeholder="عبارت مورد نظر خود را جستجو کنید ..." name="search" id="search">
<!--                                <label for="search">عبارت مورد نظر خود را جستجو کنید</label>-->
                                <button type="submit" name="submit">جستجو</button>
                            </p>
                        </div>
                        <div class="m-checkbox col-xs-12 col-xs-6">
                            <div class="squaredThree">
                                <input type="checkbox" id="squaredAll" name="sAll" <?php
                                if (!isset($_POST['search']) && !isset($_POST['sAll'])) {
                                    echo 'checked';
                                } elseif (isset($_POST['sAll']) && $_POST['sAll'] == 'on') {
                                    echo 'checked';
                                } else {
                                    echo '';
                                }
                                ?>>
                                <label for="squaredAll"></label>
                                <span>همه</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredOne" name="sNews" <?php
                                    echo (isset($_POST['sNews']) && $_POST['sNews'] == 'on') ? 'checked' : '';
									
                                ?>>
                                <label for="squaredOne"></label>
                                <span>مطالب</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredTwo" name="sArtist" <?php
                                echo (isset($_POST['sArtist']) && $_POST['sArtist'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredTwo"></label>
                                <span>هنرمندان</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredThree" name="sMusic" <?php
                                echo (isset($_POST['sMusic']) && $_POST['sMusic'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredThree"></label>
                                <span>آهنگ‌ها</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredFour" name="sTv" <?php
                                echo (isset($_POST['sTv']) && $_POST['sTv'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredFour"></label>
                                <span>ویدیوها</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredFive" name="sNavagram" <?php
                                echo (isset($_POST['sNavagram']) && $_POST['sNavagram'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredFive"></label>
                                <span>نواگرام</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredSix" name="sGallery" <?php
                                echo (isset($_POST['sGallery']) && $_POST['sGallery'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredSix"></label>
                                <span>گالری</span>
                            </div>
                            <div class="squaredThree">

                                <input type="checkbox" id="squaredSeven" name="sConcert" <?php
                                echo (isset($_POST['sConcert']) && $_POST['sConcert'] == 'on') ? 'checked' : '';
                                ?>>
                                <label for="squaredSeven"></label>
                                <span>کنسرت</span>
                            </div>
                        </div>
                    </form>
                </div>

                </div>
                </div>


            </div>
            <div class="search-result col-xs-12">

                <?php
				if (isset($post_query) && $post_query != false):
				?>
                <div class="k-news">
                    <?php
                    echo nava_search_title_row('مطالب' , 'fa-file-text-o');
                    while($post_query->have_posts()):
                        $post_query->the_post();
                        $supTitle = get_post_meta(get_the_ID(), 'postSupTitle', true);
                    ?>
                    <article class="k-news-item col-md-4 col-sm-6">
                      <div class="k-img-over">
                        <a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                        </a>
                      </div>
                        <div class="k-b-itemdesc">
                            <?php if (!empty($supTitle)): ?><p class="k-b-uptitle"><?php echo $supTitle ?></p><?php endif; ?>
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="k-b-title"><?php the_title(); ?></h4>
                            </a>
                            <p class="k-b-intro"><?php the_excerpt(); ?></p>
                            <time class="k-time" datetime="<?php echo date('Y-m-d H:i:s', get_the_time('U')); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' قبل'; ?></time>
                            <a href="<?php the_permalink(); ?>" class="kbtn black">ادامه خبر</a>
                        </div>
                    </article>
                    <?php
                    endwhile;
                    echo nava_search_archive_btn( home_url('finds'), $_POST['search'], 'post')
                    ?>
                </div>
                <?php
                endif;
				wp_reset_query();
                if (isset($wiki_query) && $wiki_query != false):
				$avatar_color = 0;
				?>
                <div class="s-wiki-wrap">
                    <?php
                    echo nava_search_title_row('هنرمندان','fa-star-o');

                    while($wiki_query->have_posts()):
                        $wiki_query->the_post();
                    ?>
                    <div class="col-md-2 col-sm-3">
                        <a href="<?php the_permalink(); ?>">
							<?php 
							$wiki_image = get_the_post_thumbnail_url(get_the_ID(), 'nava_music_m', array('class' => ''));
							//echo $wiki_image;
							?>
							<img src="<?php 
							if (!empty($wiki_image)) {
								echo $wiki_image;
							} else {
								echo THEME_IMAGES . 'avatar'.$avatar_color.'.jpg';
								if ($avatar_color == 5) {
									$avatar_color = 0;
								}
								$avatar_color++;
							}
							
							?>" class="img-responsive" />
                            <?php //the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')); ?>
                        </a>
                        <div class="k-b-itemdesc">
                            <p><?php the_title(); ?></p>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'wiki');
                    ?>
                </div>
                <?php
                endif;
				wp_reset_query();
                if (isset($music_query) && $music_query != false): ?>
                <div class="s-music-wrap">
                    <?php
                    echo nava_search_title_row('موسیقی','fa-headphones');

                    while($music_query->have_posts()):
                        $music_query->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta($post_id);
                        $artists = get_artist_name_by_id($post_meta['gArtistName'][0]);
                    ?>
                    <div class="k-music-item col-md-3 col-sm-6 nopadding-right">
                        <a href="<?php the_permalink($post_id); ?>">
                            <?php echo get_the_post_thumbnail($post_id, 'nava_music_m', array('class' => 'img-responsive')); ?>
                            <div>
                                <?php if (!empty($post_meta['musicName'])): ?><h3><?php echo $post_meta['musicName'][0]; ?></h3><?php endif; ?>
                                <?php if (!empty($artists)): ?><h4><?php echo implode('،', $artists); ?></h4><?php endif; ?>
                            </div>
                            <div class="shadow"></div>
                        </a>
                    </div>
                    <?php
                    endwhile;
                    echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'music');
                    ?>
                </div>
                <?php
				endif;
				wp_reset_query();
                if (isset($tv_query) && $tv_query != false):
                ?>
                <div class="s-tv-wrap">
                    <?php
                    echo nava_search_title_row('ویدیوها','fa-film');

                    while($tv_query->have_posts()):
                        $tv_query->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta($post_id);
                        if (!empty($post_meta['gArtistName']) && isset($post_meta['gArtistName'])) {
                            $artists = get_artist_name_by_id($post_meta['gArtistName'][0]);
                        }
                    ?>
                    <div class="k-music-item col-md-3 col-sm-6 col-xs-12 col-lg-3 ">
                        <a href="<?php the_permalink($post_id); ?>">
                            <?php echo get_the_post_thumbnail( $post_id, 'nava_music_', array('class' => 'img-responsive') ) ?>
                            <div>
                                <h3><?php echo get_the_title($post_id) ?></h3>
                            </div>
                        </a>
                    </div>
                    <?php
                    endwhile;
                    echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'tv');
                    ?>
                </div>
                <?php
				endif;
				wp_reset_query();

				if (isset($navagram_query) && $navagram_query != false): ?>
                <div class="k-news">
                    <?php
                    echo nava_search_title_row('نواگرام','fa-instagram');
                    while($navagram_query->have_posts()):
                        $navagram_query->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta($post_id);
						if (!empty($post_meta['gArtistName'])) {
							$artist = get_artist_by_id($post_meta['gArtistName'][0]);
						}

                    ?>
                    <article class="k-news-item col-md-3 col-sm-6 col-xs-12 col-lg-3 ">
                        <div class="m-news-box">
                            <a class="m-news-item" href="<?php the_permalink($post_id); ?>"
                               style="background-image: url('<?php echo get_the_post_thumbnail_url($post_id, 'nava_music_m') ?>');"></a>
                            <div class="k-b-itemdesc">
                                <div class="m-circle-img">
                                    <a href="<?php the_permalink($post_id); ?>">
										<?php if (!empty($post_meta['gArtistName'])): ?>
                                        <div class="m-navagram-circle">
                                            <?php echo get_the_post_thumbnail($post_meta['gArtistName'][0], 'nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                        </div>
										<?php endif; ?>

										<?php if (!empty($artist)): ?>
                                        <div class="m-navagram-span">
                                            <span><?php echo $artist->post_title; ?></span>
                                        </div>
										<?php endif; ?>
                                    </a>
                                </div>
                                <a href="<?php the_permalink($post_id); ?>">
                                    <h4 class="k-b-title"><?php the_title(); ?></h4>
                                </a>
                                <p class="k-b-intro"><?php the_excerpt(); ?></p>
                                <time class="conc-date col-md-6 nopadding" datetime="<?php the_date('Y-m-d H:i:s') ?>">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></time>
                                <a href="<?php the_permalink(); ?>" class="kbtn black">ادامه ...</a>
                            </div>
                        </div>
                    </article>
                    <?php
                    endwhile;
                    echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'navagram');
                    ?>
                </div>
                <?php
				endif;
				wp_reset_query();
				if (isset($gallery_query) && $gallery_query != false): ?>
                <div class="gallery-container">
                    <?php
                    echo nava_search_title_row('گالری','fa-camera');
                    while($gallery_query->have_posts()):
                        $gallery_query->the_post();
                        $post_meta = get_post_meta(get_the_ID());
                    ?>
                    <div class="item col-md-3 col-sm-6">
                        <a href="<?php the_permalink(); ?>">
                            <div class="gallery-item-image">
                                <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                            </div>
                            <div class="gallery-item-desc">
                                <div class="gallery-desc-hide">
                                    <h2><?php the_title(); ?></h2>
                                    <time datetime="<?php the_date('Y-m-d H:i:s'); ?>"><?php echo get_the_date(); ?></time>
                                    <p class="photographer">عکاس : <?php
										$user_meta = get_user_meta($post_meta['galleryPhotographer'][0]);
                                        echo (!empty($user_meta['first_name'][0])) ? $user_meta['first_name'][0] : '';
                                        echo ' ';
                                        echo (!empty($user_meta['last_name'][0])) ? $user_meta['last_name'][0] : '';
                                        ?>
									</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile;
                    echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'gallery');
                    ?>
                </div>
                <?php endif;
                wp_reset_query();
                if (isset($concert_query) && $concert_query != false): ?>
                <div class="concert-wrap">
                <?php
                echo nava_search_title_row('کنسرت','fa-music');
                    while($concert_query->have_posts()):
                        $concert_query->the_post();
                        $concert_metas = get_post_meta(get_the_ID());
                ?>
                <div class="k-concert-item concert-small col-md-3 col-sm-6 col-xs-12 ">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgoverlay">
                            <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="k-concert-item-cont">
                            <div class="k-concert-desc">
                                <?php if (!empty($concert_metas['gArtistName'])): ?><h4 class="conc-name"><?php echo implode('، ', get_artist_name_by_id($concert_metas['gArtistName'])); ?></h4><?php endif; ?>
                                <?php if (!empty($concert_metas['concertPlaceName'])): ?><span class="conc-location"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $concert_metas['concertPlaceName'][0] ?></span><?php endif; ?>
                                <?php if (!empty($concert_metas['concertStartDate'])): ?><div class="conc-date col-md-6"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $concert_metas['concertStartDate'][0]; ?></div><?php endif; ?>
                                <?php if (!empty($concert_metas['concertStartTime'])): ?><div class="conc-time col-md-6"> <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;ساعت<?php echo $concert_metas['concertStartTime'][0] ?></div><?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    endwhile;
                echo nava_search_archive_btn(home_url('finds'), $_POST['search'], 'concert')
                ?>
                    </div>
                    <?php
                endif; ?>
            </div>
            <?php

                // Don't print empty markup if there's only one page.
//                if ( $q->max_num_pages < 2 ) {
//                    return;
//                }
//
//                $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
//                $pagenum_link = html_entity_decode( get_pagenum_link() );
//                $query_args   = array();
//                $url_parts    = explode( '?', $pagenum_link );
//
//                if ( isset( $url_parts[1] ) ) {
//                    wp_parse_str( $url_parts[1], $query_args );
//                }
//
//                $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
//                $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
//
//                $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
//                $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
//
//
//                // Set up paginated links.
//                $links = paginate_links( array(
//                    'base'     => $pagenum_link,
//                    'format'   => $format,
//                    'total'    => $q->max_num_pages,
//                    'current'  => $paged,
//                    'mid_size' => 3,
//                    'add_args' => array_map( 'urlencode', $query_args ),
//                    'prev_text' => __( '<i class="fa fa-chevron-right"></i> قبلی', 'nava' ),
//                    'next_text' => __( 'بعدی <i class="fa fa-chevron-left"></i> ', 'nava' ),
//                    'type'      => 'array',
//
//                ) );
//
//
//
//                if( is_array( $links ) ) {
//                    $pagination  = '<ul class="pagination">';
//                    $pagination .= "<li><a href='".esc_url( get_pagenum_link( 1 ) )."' class='eb-pager__fast-first-link'><i class='fa fa-fast-forward'></i></a></li>";
//                    foreach ( $links as $page_key => $page) {
//                        $pagination .= "<li>$page</li>";
//                    }
//                    $pagination .= "<li><a href='".esc_url( get_pagenum_link( $q->max_num_pages ) )."' class='eb-pager__fast-first-link'><i class='fa fa-fast-backward'></i></a></li>";
//                    $pagination .= '</ul>';
//                    echo $pagination;
//                }
//                ?>
            </div>
    </div>
</section>
<?php
get_footer();
?>
