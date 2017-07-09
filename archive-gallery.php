<?php
get_header();
?>
<style>
    body{
        background-color: #333;
    }
</style>
<div class="fullpage-gallery-carousel">
    <div class="owl-carousel ">
        <div class="item">
            <img src="<?php echo THEME_IMAGES ?>video/1.jpg">
        </div>
    </div>
    <div class="gallery-search">
        <form class="" method="POST" action="<?php echo home_url('finds'); ?>" >
            <h3>جستجوی آلبوم عکس</h3>
            <input type="hidden" name="sGallery" value='on'>
			<input type="hidden" name="t" value='6'>
            <input type="text" class="col-md-9 col-sm-9 col-xs-12 col-lg-9" name="search" placeholder="عبارت مورد نظر خود را وارد کنید" >
            <input type="submit" class="kbtn white col-md-3 col-sm-3 col-xs-12 col-lg-3" name="submit" value="جستجو">
        </form>
    </div>
</div>
<section class="k-central k-central-gallery">
<div class="container">
    <div class="gallery-container">
        <div class="col-md-12">
            <?php
            $gallery_args = array(
                'posts_per_page'    => '12',
                'post_type'         => 'gallery',
                'orderby'           => 'date',
                'order'             => 'DESC',
            );
            $gallery_q = new WP_Query( $gallery_args );
            if (have_posts()):
                while(have_posts()):
                    the_post();
                    $post_meta = get_post_meta(get_the_ID());
                    $user = get_user_meta($post_meta['galleryPhotographer'][0]);
					
            ?>
            <div class="item col-md-3 col-xs-12 col-sm-6 col-lg-3 ">
                <a href="<?php the_permalink(); ?>">
                    <div class="gallery-item-image">
                        <?php the_post_thumbnail( 'nava_image_m', array('class' => 'img-responsive') ); ?>
                    </div>
                    <div class="gallery-item-desc">
                        <div class="gallery-desc-hide">
                            <h2><?php the_title(); ?></h2>
                            <time datetime="<?php the_date('Y-m-d H:i:s') ?>"><?php echo get_the_date() ?></time>
                            <p class="photographer"><?php
                                echo (!empty($user['first_name'][0])) ? esc_attr($user['first_name'][0]) : '';
                                echo ' ';
                                echo (!empty($user['last_name'][0])) ? esc_attr($user['last_name'][0]) : '';
                            ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
            endif;
            echo do_shortcode("[pagination]");
            ?>
        </div>
    </div>
</div>
</section>
<?php
get_footer();
?>
