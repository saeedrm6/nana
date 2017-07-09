<?php
get_header();
global $post;
$post_id = $post->ID;
echo "<!-- mfunc" . nava_set_post_views($post_id) . "--><!-- /mfunc -->";
?>
<?php
if (have_posts()):
    while(have_posts()):
        the_post();
        $p_id = get_the_ID();
        $post_meta = get_post_meta($p_id);
		$vide_post_metas = array_unique($post_meta['videoFile']);
		
		
		
		foreach($vide_post_metas as $video) {
			$t[] = $video;
		}
		$vide_post_metas = $t;

        if (isset($vide_post_metas) && !empty($vide_post_metas)) {
            if (!empty($vide_post_metas[0]) && isset($vide_post_metas[0])) {
                $video_hd = get_attachment_by_id($vide_post_metas[0]);
            }
            if (!empty($vide_post_metas[1]) && isset($vide_post_metas[1])) {
                $video_sd = get_attachment_by_id($vide_post_metas[1]);
            }
            if (!empty($vide_post_metas[2]) && isset($vide_post_metas[2])) {
                $video_mobile = get_attachment_by_id($vide_post_metas[2]);
            }
        }

?>
<div class="nava-video-player">
    <div class="hide">
        <div class="button-dropdown">
            <span href="#" class="fa fa-cog button btn-large btn-create"></span>
                <ul class="dropdown">
                  <li><a href="#" class="dropdown-link" id="play-hd">720p</a></li>
                  <li><a href="#" class="dropdown-link" id="play-sd">480p</a></li>
                  <li><a href="#" class="dropdown-link" id="play-mobile">320p</a></li>
                </ul>
        </div>
    </div>
    <div class="players" style="position: relative;
        height: 640px;">
        <div  itemscope="" itemtype="http://schema.org/Video">
        <video id="mej-player" class="video-player2"
                controls="controls"
                preload="none"
                width="100%"
                height="640px"
                data-video-sd="<?php        echo ( !empty($video_sd->guid) ) ? $video_sd->guid : '';          ?>"
                data-video-mobile="<?php    echo ( !empty($video_mobile->guid) ) ? $video_mobile->guid : '';  ?>"
                data-video-hd="<?php        echo ( !empty($video_hd->guid)) ? $video_hd->guid : '';          ?>"

                poster="<?php echo get_the_post_thumbnail_url($p_id, 'nava_image_xl') ?>">

            <?php if (!empty($video_sd)): ?><source src="<?php echo $video_sd->guid; ?>" title="<?php the_title(); ?>"><?php endif; ?>

        </video>
    </div>
    </div>
</div>
        <?php
            echo "<br><br>";
            include_once "ads-themplate/centeral-home-ads.php";
        ?>
<section class="k-central k-central-video col-md-12 col-xs-12 col-sm-12 col-lg-12 nopadding">
    <div class="container video-container">

        <div class="videodesc col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div class="videodesc-innerbox">
                <div class="desc col-md-9 col-xs-12 col-sm-12 col-lg-9">
                    <h1><?php the_title(); ?></h1>
                    <div class="me-video-desc">
                    <?php the_content(); ?>
                    </div>
                </div>
                <div class="downloadbtns col-md-3 col-xs-12 col-sm-12 col-lg-3">
                    <?php if(!empty($video_hd) && isset($video_hd)): ?><a href="<?php echo $video_hd->guid ?>" class="kbtn black">دانلود با کیفیت بالا <span>HD</span></a><?php endif; ?>
                    <?php if(!empty($video_sd) && isset($video_sd)): ?><a href="<?php echo $video_sd->guid ?>" class="kbtn black">دانلود با کیفیت پایین <span>SD</span></a><?php endif; ?>
					<?php if(!empty($video_mobile) && isset($video_mobile)): ?><a href="<?php echo $video_mobile->guid ?>" class="kbtn black">دانلود با کیفیت پایین <span>Mobile</span></a><?php endif; ?>
                </div>
            </div>
        </div>

            <?php
			$video_terms = get_the_terms($post_id, 'videos');
			
            $rel_video_args = array(
                'posts_per_page'    => '8',
                'order'             => 'DESC',
                'orderby'           => 'rand',
                'post_type'         => 'tv',
                'post__not_in'      => array($p_id),
				'tax_query'			=> array(
						array(
							'taxonomy'	=> 'videos',
							'terms'		=> $video_terms[0]->term_id,
							'field'		=> 'id'
						)
				)
            );

            $rel_videos_q = new WP_Query( $rel_video_args );
            if ($rel_videos_q->have_posts()):
                ?>
            <div class="tv-box-items tv-box-items-inner  col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="tv-box-inner">
                <?php
                    while($rel_videos_q->have_posts()):
                        $rel_videos_q->the_post();
                ?>
                <div class="item col-md-3 col-xs-12 col-sm-3 col-lg-3 ">
                    <div class="tv-item-image">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                        the_post_thumbnail('nava_image_m', array('class' => 'img-responsive'))
                        ?>
                        </a>
                    </div>
                    <div class="tv-item-desc">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
                <?php
                    endwhile;
                ?>
              </div>
            </div>
            <?php 
			endif; 
			?>

        <div class="col-md-8">
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

        <aside class="side col-md-4 col-lg-4">
            <?php
            include_once "ads-themplate/sidebar-ads.php";
            if (is_active_sidebar('tv-widget-area')) {
                dynamic_sidebar('tv-widget-area');
            }
            ?>
        </aside>
    </div>
</section>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();
?>
