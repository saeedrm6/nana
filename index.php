<?php get_header() ?>
<!-- news breadcrumb-->
<section class="m-breadcrumbs clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
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
<!-- news breadcrumb-->


<!--central-->
<section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container">
        <div class="k-news col-md-8 col-sm-12 col-xs-12 col-lg-8 nopadding-right">
            <?php
wp_reset_query();
            if (have_posts()):
                while(have_posts()):
                    the_post();
                    $supTitle = get_post_meta(get_the_ID(), 'postSupTitle', true);
                    ?>
                    <article class="k-news-item col-md-6 col-sm-6 col-xs-12 col-lg-6 nopadding-right">
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
            endif;

            echo do_shortcode("[pagination]");

            ?>
        </div>
        <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4 nopadding" id="myScrollspy" >
            <div class="m-banner nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <img src="img/news/insta-banner.gif" />
            </div>
            <div class="m-banner nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <img src="img/news/news-banner.gif" />
            </div>
            <?php if ( is_active_sidebar( 'single-simple-widget-area' ) ) : ?>
                <?php dynamic_sidebar( 'single-simple-widget-area' ); ?>
            <?php endif; ?>
        </aside>
    </div>
</section>
<!--central-->
<h1>SALAM</h1>

<?php get_footer(); ?>
