<?php
$GLOBALS['post_not_in'] = array();
get_header();
?>

<div class="fullpage-video-carousel">
    <div id="owl-k-video-slider" class="owl-carousel">
        <?php
        $slider_args = array(
            'posts_per_page'    => '3',
            'order'             => 'DESC',
            'orderby'           => 'date',
            'post_type'         => 'tv',
            'meta_query'        => array(
                array(
                    'key'       => 'tvFeature',
                    'value'     => '1',
                    'compare'   => '='
                )
            )
        );
        $slider_q = new WP_Query( $slider_args );

        if ($slider_q->have_posts()):
            while($slider_q->have_posts()):
                $slider_q->the_post();
                $GLOBALS['post_not_in'][] = get_the_ID();
        ?>
        <div class="item">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('nava_image_xl'); ?>
            </a>
            <div class="video-overlay">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>"><i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp; تماشا کنید</a>
            </div>
        </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<section class="k-central k-central-video col-md-12 col-xs-12 col-sm-12 col-lg-12 nopadding">
    <div class="container video-container">
        <?php
        $programs_args = array(
            'posts_per_page'    => '8',
            'order'             => 'DESC',
            'orderby'           => 'date',
            'post_type'         => 'tv',
            
			        'tax_query'         => array(
        array(
        'taxonomy'  => 'videos',
        'field'     => 'slug',
        'terms'     => array('programs')
        )
        )
			
        );
        $programs_q = new WP_Query( $programs_args );
        if ($programs_q->have_posts()):
        ?>
        <div class="tv-programs tv-box-items col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <?php echo nava_title_row('برنامه ها', home_url('videos/programs'), '', 'آرشیو', true); ?>
<?php
                while($programs_q->have_posts()):
                    $programs_q->the_post();
                    $GLOBALS['post_not_in'][] = get_the_ID();
                    $post_views = nava_get_post_views(get_the_ID());
					$post_meta = get_post_meta(get_the_ID());

            ?>
            <div class="item col-md-3 col-xs-12 col-sm-2 col-lg-3 ">
                <div class="tv-item-image">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('nava_images_m', array('class' => 'img-responsive')); ?>
                    </a>
                </div>
                <div class="tv-item-desc">
				<h3><?php echo (!empty($post_meta['videoSupTitle'])) ? esc_attr($post_meta['videoSupTitle'][0]) : ''; ?></h3>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <time datetime="<?php the_date('Y-m-d H:i:s') ?>"><?php the_date(); ?></time>
                    <span class="views"><?php echo esc_attr($post_views); ?> </span>
<!--                    <span class="category">برنامه ها | </span>-->
                </div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
        <?php
        endif;
        $clips_args = array(
        'posts_per_page'    => '8',
        'order'             => 'DESC',
        'orderby'           => 'date',
        'post_type'         => 'tv',
        
        'tax_query'         => array(
        array(
        'taxonomy'  => 'videos',
        'field'     => 'slug',
        'terms'     => array('clips')
        )
        )
        );
        $clips_q = new WP_Query( $clips_args );
        if ($clips_q->have_posts()): ?>
        <div class="tv-music-video tv-box-items">
            <?php echo nava_title_row('موزیک ویدیوها', home_url('videos/clips'), '', 'آرشیو');
            while($clips_q->have_posts()):
                $clips_q->the_post();
                $post_views = nava_get_post_views(get_the_ID());
                $GLOBALS['post_not_in'][] = get_the_ID();
				$post_meta = get_post_meta(get_the_ID());
            ?>
            <div class="item col-md-3 col-xs-12 col-sm-2 col-lg-3 ">
                <div class="tv-item-image">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('nava_images_m', array('class' => 'img-responsive')); ?>
                    </a>
                </div>
                <div class="tv-item-desc">
					<h3><?php echo (!empty($post_meta['videoSupTitle'])) ? esc_attr($post_meta['videoSupTitle'][0]) : ''; ?></h3>
					
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <time datetime="<?php the_date('Y-m-d H:i:s') ?>"><?php the_date(); ?></time>
                    <span class="views"><?php echo esc_attr($post_views) ?> </span>
                    <!--                    <span class="category">برنامه ها | </span>-->
                </div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
        <?php
        endif;
        $live_args = array(
            'posts_per_page'    => '8',
            'order'             => 'DESC',
            'orderby'           => 'date',
            'post_type'         => 'tv',
            
            'tax_query'         => array(
                array(
                    'taxonomy'  => 'videos',
                    'field'     => 'slug',
                    'terms'     => array('live')
                )
            )
        );
        $live_q = new WP_Query( $live_args );
        if ($live_q->have_posts()):
        ?>
        <div class="tv-liveshow tv-box-items">
            <?php
            echo nava_title_row('اجرای زنده', home_url('videos/live'), '', 'آرشیو');
                while($live_q->have_posts()):
                    $live_q->the_post();
                    $post_views = nava_get_post_views(get_the_ID());
                    $GLOBALS['post_not_in'][] = get_the_ID();

            ?>
            <div class="item col-md-3 col-xs-12 col-sm-2 col-lg-3 ">
                <div class="tv-item-image">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('nava_images_m', array('class' => 'img-responsive')); ?>
                    </a>
                </div>
                <div class="tv-item-desc">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <time datetime="<?php the_date('Y-m-d H:i:s') ?>"><?php the_date(); ?></time>
                    <span class="views"><?php echo esc_attr($post_views); ?> </span>
                    <!--                    <span class="category">برنامه ها | </span>-->
                </div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
?>
