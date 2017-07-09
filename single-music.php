<?php
get_header();
global $post;
$post_id = $post->ID;
$GLOBALS['post_not_in'][] = $post_id;
$artist_name = '';
$music_name = '';
$music_image_thumb = '';
?>
<!--central-->

<?php

if (have_posts()):
    echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
    while(have_posts()):
        the_post();
        $post_id = get_the_ID();

        $music_meta = get_post_meta($post_id);
        //print_r($music_meta);
        $artist_meta = get_artist_by_id($music_meta['gArtistName']);
        //print_r($artist_meta);
        $artists_names = get_artist_name_by_id( $music_meta['gArtistName'] );
        $main_artist_link = get_the_permalink( $music_meta['gArtistName'][0] );
		$one_artist_name = $artists_names;

		if (!empty($artists_names)) {
			$temp = get_artist_name_by_id($music_meta['gArtistNameOther']);

			if (!empty($temp) && isset($temp) && count($temp) >= 1) {
				foreach($temp as $t) {
					$artists_names[] = $t;
				}
			}
		}

        $artist_name = implode(' و ', $artists_names);
        $music_image_thumb = get_the_post_thumbnail(get_the_ID(),'nava_music_xs', array('class' => 'img-responsive', 'alt' => get_the_title($post_id)));
        $music_name = $music_meta['musicName'][0];

if (isset($music_meta['musicFile']) && !empty($music_meta['musicFile'])) {

	$music_file_urls = array_unique($music_meta['musicFile']);
//     echo "<div class='hide'>";
//    print_r($music_file_urls);
//    echo "</div>";
	foreach($music_file_urls as $file) {
		$temp2[] = $file;
	}

//    echo "<div class='hide'>";
//    print_r($temp2);
//    echo "</div>";
	$music_file_urls = $temp2;
	// print_r($music_file_urls);

    $audio_96  = get_attachment_by_id($music_file_urls[3]);
	$audio_128 = get_attachment_by_id($music_file_urls[2]);
    $audio_192 = get_attachment_by_id($music_file_urls[1]);
    $audio_320 = get_attachment_by_id($music_file_urls[0]);

	
	
//    echo "<div class='hide'>";
//    print_r($music_file_urls);
//    print_r($temp2);
//    print_r($music_meta);
//	 print_r($audio_128);
//	 print_r($audio_96);
//	 print_r($audio_192);
//	 print_r($audio_320);
//    echo "</div>";


}
?>
<div class="fullpage-music" style="background-color: <?php echo (!empty($music_meta['musicBackColor'][0])) ? $music_meta['musicBackColor'][0] : '#DC2827'; ?>;">
    <div id="particles-js"></div>
    <div class="full-music-items">
        <div class="container music-full-container">
            <div class="music-cover col-sm-6">
                <?php the_post_thumbnail('nava_music_l', array('class' => 'img-responsive', 'alt' => get_the_title($post_id))); ?>
            </div>
            <div class="music-description col-sm-6">
                <h1><a href="<?php echo $main_artist_link; ?>"><?php echo $artist_name; ?></a>&nbsp;-&nbsp;<?php echo $music_name ?></h1>
                <?php
                echo do_shortcode("[click_like post_id='".$post_id."']");

                ?>

                <div class="music-content">
                    <div class="artist">
                        <span class="k-label"><?php  echo (!empty(count($artists_names) > 1)) ? 'هنرمندان:' : 'هنرمند:';  ?></span>
                        <h3 class="k-result"><?php echo implode(' و ', $artists_names); ?></h3>
                    </div>
                    <?php if (!empty($music_meta['musicMusician'][0])): ?>
                    <div class="musicby">
                        <span class="k-label">آهنگساز:</span>
                        <h3 class="k-result"><?php echo $music_meta['musicMusician'][0]; ?></h3>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($music_meta['musicRegulator'][0])): ?>
                    <div class="arrengment">
                        <span class="k-label">تنظیم کننده:</span>
                        <h3 class="k-result"><?php echo $music_meta['musicRegulator'][0]; ?></h3>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($music_meta['musicSongwriter'][0])): ?>
                    <div class="song-writer">
                        <span class="k-label">ترانه سرا:</span>
                        <h3 class="k-result"><?php echo $music_meta['musicSongwriter'][0]; ?></h3>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($music_meta['musicMixAndMaster'][0])): ?>
                        <div class="song-writer">
                            <span class="k-label">میکس و مسترینگ:</span>
                            <h3 class="k-result"><?php echo $music_meta['musicMixAndMaster'][0]; ?></h3>
                        </div>
                    <?php endif; ?>
                    <?php
					$music_terms = wp_get_post_terms($post_id, 'musics');
					if(!empty($music_terms)): ?>
                    <div class="genre">
                        <span class="k-label">سبک:</span>
                        <h3 class="k-result"><?php
							//print_r(get_post_meta($post_id));
							$primary_cat_id=get_post_meta($post_id,'_yoast_wpseo_primary_musics',true);
							//echo $primary_cat_id;
							if($primary_cat_id) {
							   $music_cat = get_term($primary_cat_id, 'music-tag');
							   if(isset($music_cat->name)) {
								   echo "<a href='".get_term_link($music_cat->term_id, 'musics')."' >".$music_cat->name."</a>";
							   }
							}
                            //echo $post_id;

                            //print_r($music_terms);
                            // foreach($music_terms as $cat) {
                                // echo "<a href='".get_term_link($cat->term_id, 'musics')."' >".$cat->name."</a>";
                            // }
                            ?></h3>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="music-btns">
                    <div class="lyric-btn">
                        <a href="#music-lyric"><span>متن ترانه</span> <i aria-hidden="true" class="fa fa-sort-desc"></i></a>
                    </div>

<!--                    <div class="add-playlist-btn">-->
<!--                        <a data-placement="bottom" data-toggle="tooltip" href="#" title="افزودن به لیست پخش"><i aria-hidden="true" class="fa fa-heart-o"></i></a>-->
<!--                    </div>-->

                    <div class="dropdown dlbt">
                        <button class="dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
 دانلود آهنگ&nbsp;<?php echo $music_name ?>
                            <i aria-hidden="true" class="fa fa-sort-desc"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
							<?php if (!empty($audio_128)): ?>
                            <li role="presentation"><a role="menuitem" download="<?php echo $audio_128->post_excerpt; ?>" tabindex="-1" href="<?php echo $audio_128->guid; ?>"><i aria-hidden="true" class="fa fa-download"></i> دانلود با کیفیت 128</a></li>
							<?php endif; 
							if (!empty($audio_128)): ?>
                            <li role="presentation"><a role="menuitem" download="<?php echo $audio_192->post_excerpt; ?>" tabindex="-1" href="<?php echo $audio_192->guid; ?>"><i aria-hidden="true" class="fa fa-download"></i> دانلود با کیفیت 192</a></li>
							<?php 
							endif;
							if (!empty($audio_320)): ?>
                            <li role="presentation"><a role="menuitem" download="<?php echo $audio_320->post_excerpt; ?>" tabindex="-1" href="<?php echo $audio_320->guid; ?>"><i aria-hidden="true" class="fa fa-download"></i> دانلود با کیفیت 320</a></li>
							<?php endif; ?>
                        </ul>
                    </div>

                    <!--
                    
                    <div class="download-btn">
                        <a data-placement="bottom" data-toggle="tooltip" href="<?php echo $audio_128->guid; ?>" title="دانلود"> <i aria-hidden="true" class="fa fa-download"></i> 128 </a>
                    </div>

                    
                    ?>
                    <div class="download-btn">
                        <a data-placement="bottom" data-toggle="tooltip" href="<?php echo $audio_320->guid; ?>" title="دانلود"> <i aria-hidden="true" class="fa fa-download"></i> 320 </a>
                    </div>
                    <?php
                    //endif;
                    ?>

                    -->


                </div>
            </div>
        </div>
    </div>
</div>
<section class="k-central k-central-music">
    <div class="container">
<!--      <div class="banner ">-->
<!--          <a target="_blank" href="http://fastclick.co/a.aspx?Task=Click&ZoneID=1928&CampaignID=2441&AdvertiserID=212&BannerID=916&SiteID=58​">-->
<!--            <img src="/wp-content/themes/nava/img/banner/alibaba-music.gif">-->
<!--          </a>-->
<!--      </div>-->
        <?php
            include_once "ads-themplate/centeral-home-ads.php";
        ?>
    </div>
    <div class="container music-container">
      <div class="row">
		<?php
		//echo $artist_meta->ID;
		//print_r(get_post($artist_meta->ID));
		$musics = get_related_posts_by_artist_id($artist_meta->ID, 'music', 8, $GLOBALS['post_not_in'], false);
		//echo $musics->post_count;
		//print_r($musics);
        if (!empty($musics)):
		if ($musics->have_posts()):
		?>
        <div class="k-music-this-artist col-md-12">
            <div class="k-music-containers">
                <?php echo nava_search_archive_left_btn(home_url('finds'), get_the_title($artist_meta->ID), 'music', 'از همین هنرمند') ?>
                <div class="k-music-row-inner">
                  <div class="row">
                    <?php

                        while($musics->have_posts()):
                            $musics->the_post();
                            $related_meta = get_post_meta(get_the_ID());
                    ?>
                    <div class="item col-sm-3">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                        echo $thumb = get_the_post_thumbnail(get_the_ID(),'nava_music_m', array('class' => 'img-responsive'));
                        ?>
                            </a>
                        <div class="cd">
                            <?php echo $thumb ?>
                            <span class="cdcircle"></span>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <h3>
                                <span>
                                    <?php
                                    if (!empty($related_meta['musicName'][0])) {
                                        echo $related_meta['musicName'][0];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </span>
                            </h3>
                            <h4>
                                <span><?php
                                    if (!empty($related_meta['gArtistName'])) {
                                        echo implode('، ', get_artist_name_by_id($related_meta['gArtistName']));
                                    } else {
                                        echo  '';
                                    }
                                    ?></span>
                            </h4>
                        </a>
                    </div>
                    <?php
                        endwhile;

                    ?>
                    </div>
                </div>
            </div>

        </div>
		<?php
			endif; endif;
		?>

    <aside class="side col-md-4 col-lg-4">
        <div class="k-music-lyrics k-side-box" id="music-lyric">
            <div class="k-title-row clearfix">
                <h2 class="k-title-text">متن آهنگ <?php echo $music_meta['musicName'][0]; ?> از <?php echo $artist_name ?></h2>
            </div>
            <div class="music-lyric" id="music-lyric">
                <?php
                wp_reset_query();
                the_content(); ?>
            </div>
        </div>
        <?php
            include_once "ads-themplate/sidebar-ads.php";
        ?>
    </aside>

        <div class="col-md-8">
            <section class="music-excerpt k-comment">
                <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);  ?></p>
            </section>
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
        </div>




          </div>

    </div>
</section>
<div class="player music-player">
    <div class="container">
        <div class="artist">
            <?php
            echo !empty($music_image_thumb) ? $music_image_thumb : '' ;
            ?>
            <h2><?php echo !empty($music_name) ? $music_name : '' ; ?></h2>
            <br>
            <h3><?php if(!empty($one_artist_name)) { foreach($one_artist_name as $x) { echo $x; } } else {  echo ''; } ?></h3>
        </div>
        <audio     class="mep-playlist"
                   data-showplaylist="false"
                   width="400"
                   controls="controls"
                   preload="auto">
            <?php if (!empty($audio_128)): ?><source type="audio/mpeg" src="<?php echo $audio_128->guid; ?>" title="پخش کیفیت 128 آهنگ <?php echo $music_name  ?>" data-poster="" /><?php endif; ?>
            <?php if (!empty($audio_192) && 1==0): ?><source type="audio/mpeg" src="<?php echo $audio_192->guid; ?>" title="پخش کیفیت 192 آهنگ <?php echo $music_name  ?>" data-poster="" /><?php endif; ?>
            <?php if (!empty($audio_96) && 1==0): ?><source type="audio/mpeg" src="<?php echo $audio_96->guid; ?>" title="پخش کیفیت 96 آهنگ <?php echo $music_name  ?>" data-poster="" /><?php endif; ?>
            <?php if (!empty($audio_320) && 1==0): ?><source type="audio/mpeg" src="<?php echo $audio_320->guid; ?>" title="پخش کیفیت 320 آهنگ <?php echo $music_name  ?>" data-poster="" /><?php endif; ?>
        </audio>
    </div>
</div>
<?php
    wp_reset_query();
endwhile;
endif;
?>
<!--central-->

<?php get_footer() ?>
