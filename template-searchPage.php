<?php
/**
 * Template Name: صفحه بندی جستجو
 */
ob_start();
get_header(); ?>

<section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
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
                      $tv_query       = nava_get_search_query( 'tv'        , 6,  $search_word );
                      $navagram_query = nava_get_search_query( 'navagram'  , 6,  $search_word );
                      $gallery_query  = nava_get_search_query( 'gallery'   , 6,  $search_word );
                      $concert_query  = nava_get_search_query( 'concert'   , 6,  $search_word );
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
              <form method="POST" action="<?php echo home_url('find');
//					if (count($_POST) >= 5) {
//						echo home_url('find');
//					} else {
//						echo home_url('finds');
//					}
					 ?>" class="m-search-form col-md-12 col-sm-12 col-xs-12 col-lg-12">
                  <input type="hidden" name="t" value="">
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


            <?php
			//print_r($_GET);
            $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
            if (!empty($_POST['search']) && isset($_POST['search'])) {
				//print_r($_GET);
				//echo 'y';
				//wp_die();
                $postType = '';
                if (!empty($_POST['t']) && isset($_POST['t'])) {
					//echo 'x';
					//wp_die();
                    $postType = get_post_type_val($_POST['t'], 'string');
                }

				$q = nava_get_search_query($postType, '12', $_POST['search'], $paged);	

                
                if (empty($q)) {
					//echo '1';
					//wp_die();
                    wp_redirect(home_url('find'));
                    ob_end_flush();
                }
            } else {
				//echo '2';
				//wp_die();
                wp_redirect(home_url('find'));
                ob_end_flush();
            }
            if (!empty($q) &&  $q->have_posts() && $postType == 'post'):
                echo '<div class="k-news col-xs-12">';
                while($q->have_posts()):
                    $q->the_post();
                    $supTitle = get_post_meta(get_the_ID(), 'postSupTitle', true);
                    ?>
                    <article class="k-news-item col-md-4 col-sm-6">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('nava_image_l', array('class' => 'img-responsive')); ?>
                        </a>
                        <div class="k-b-itemdesc">
                            <p class="k-b-uptitle"><?php echo $supTitle; ?></p>
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
                echo '</div>';
            elseif(!empty($q) && $q->have_posts() && $postType == 'wiki'): ?>
                <div class="s-wiki-wrap col-xs-12">
                    <?php
                    while($q->have_posts()):
                        $q->the_post();
                        ?>
                        <div class="col-md-2 col-sm-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')); ?>
                            </a>
                            <div class="k-b-itemdesc">
                                <p><?php the_title(); ?></p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
            <?php
            elseif(!empty($q) && $q->have_posts() && $postType == 'music'):
            ?>
            <div class="s-music-wrap col-xs-12">
                <?php

                while($q->have_posts()):
                    $q->the_post();
                    $post_id = get_the_ID();
                    $post_meta = get_post_meta($post_id);
                    $artists = get_artist_name_by_id($post_meta['gArtistName'][0]);
                    ?>
                    <div class="k-music-item nopadding-right col-md-3 col-sm-6">
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
                ?>
            </div>
            <?php
            elseif(!empty($q) &&  $q->have_posts() && $postType == 'tv'):
            ?>
            <div class="s-tv-wrap col-xs-12">
                    <?php

                    while($q->have_posts()):
                        $q->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta($post_id);
                        if (isset($post_meta['gArtistName']) && !empty($post_meta['gArtistName'])) {
                            $artists = get_artist_name_by_id($post_meta['gArtistName'][0]);
                        }
                        ?>
                        <div class="k-music-item nopadding-right col-md-3 col-sm-6 col-xs-12 col-lg-3 nopadding-right">
                            <a href="<?php the_permalink($post_id); ?>">
                                <?php echo get_the_post_thumbnail( $post_id, 'nava_music_', array('class' => 'img-responsive') ) ?>
                                <div>
                                    <?php if (!empty($post_meta['musicName'])): ?><h3><?php echo $post_meta['musicName'][0]; ?></h3><?php endif; ?>
                                    <?php if (!empty($artists)): ?><h4><?php echo implode('، ',$artists); ?></h4><?php endif; ?>
                                </div>
                                <div class="shadow"></div>
                            </a>
                        </div>
                    <?php
                    endwhile;
                    ?>
            </div>
            <?php
            elseif(!empty($q) &&  $q->have_posts() && $postType == 'navagram'):
            ?>
            <div class="k-news col-xs-12">
                    <?php

                    while($q->have_posts()):
                        $q->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta($post_id);
                        $artist = get_artist_by_id($post_meta['gArtistName'][0]);
                        ?>
                        <article class="k-news-item col-md-3 col-sm-6 col-xs-12 col-lg-3 ">
                            <div class="m-news-box">
                                <a class="m-news-item" href="<?php the_permalink($post_id); ?>"
                                   style="background-image: url('<?php echo get_the_post_thumbnail_url($post_id, 'nava_music_m') ?>');"></a>
                                <div class="k-b-itemdesc">
                                    <div class="m-circle-img">
                                        <a href="<?php the_permalink($post_id); ?>">
                                            <div class="m-navagram-circle">
                                                <?php echo get_the_post_thumbnail($post_meta['gArtistName'][0], 'nava_music_thumbnail', array('class' => 'img-responsive')) ?>
                                            </div>
                                            <div class="m-navagram-span">
                                                <span><?php echo $artist->post_title; ?></span>
                                            </div>
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
                    ?>
                </div>
            <?php
            elseif(!empty($q) &&  $q->have_posts() && $postType == 'gallery'):
            ?>
            <div class="gallery-container col-xs-12">
                    <?php
                    while($q->have_posts()):
                        $q->the_post();
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
                                            echo (!empty($user_meta['first_name'][0])) ? $user_meta['first_name'][0] : '';
                                            echo ' ';
                                            echo (!empty($user_meta['last_name'][0])) ? $user_meta['last_name'][0] : '';
                                            ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php
            elseif(!empty($q) &&  $q->have_posts() && $postType == 'concert'):
                while($q->have_posts()):
                    $q->the_post();
                $concert_metas = get_post_meta(get_the_ID());
                ?>
                <div class="k-concert-item concert-small col-xs-4 ">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgoverlay">
                            <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="k-concert-item-cont">
                            <div class="k-concert-desc">
                                <h4 class="conc-name"><?php echo (!empty($concert_metas['gArtistName'])) ? implode('، ', get_artist_name_by_id($concert_metas['gArtistName'])) : '' ; ?></h4>
                                <span class="conc-location"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $concert_metas['concertPlaceName'][0] ?></span>
                                <div class="conc-date col-md-6"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $concert_metas['concertStartDate'][0]; ?></div>
                                <div class="conc-time col-md-6"> <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;ساعت<?php echo $concert_metas['concertStartTime'][0] ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                endwhile;
			else:
			//var_dump( $postType);
				//wp_die();
                //wp_redirect(home_url('find'));
            endif;
            echo nava_search_pagination($q, $paged);
            ?>
        </div>
      </div>
</section>


<?php
ob_end_flush();
get_footer(); ?>
