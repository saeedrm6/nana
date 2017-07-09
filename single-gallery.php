<?php
get_header();
?>
<?php
if (have_posts()):
    while(have_posts()):
        the_post();
		echo "<!-- mfunc" . nava_set_post_views(get_the_ID()) . "--><!-- /mfunc -->";
        $meta = get_post_meta(get_the_ID());
        $user_meta = get_user_meta($meta['galleryPhotographer'][0]);
?>
<div class="gallery">
    <div class="gallery-desc">
        <div class="container">
            <div class="gallery-title col-md-8 col-sm-8 col-xs-12 col-lg-8">
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="photographer col-md-4 col-sm-4 col-xs-12 col-lg-4">
                <?php echo get_wp_user_avatar($meta['galleryPhotographer'][0], '50'); ?>
                <span><?php
                    echo (!empty($user_meta['first_name'][0])) ? $user_meta['first_name'][0] : '';
                    echo ' ';
                    echo (!empty($user_meta['last_name'][0])) ? $user_meta['last_name'][0] : '';
                    ?></span>
            </div>
        </div>
    </div>
    <?php

    ?>
    <div class="demo-gallery">
        <?php echo do_shortcode('[navaGallery]'); ?>
    </div>

</div>
<?php
    endwhile;
endif;
?>
<div class="gallery-desc">
    <div class="container">
        
    </div>
</div>
<?php
get_footer();
?>
