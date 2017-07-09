<?php
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
<section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <div class="container">
        <div class="k-news">
            <?php
            if (have_posts()):
                while(have_posts()):
                    the_post();
                    //$post_meta = get_post_meta(get_the_ID());
                    ?>
                    <div class="k-video-item col-md-3 col-sm-6 col-xs-12 col-lg-3 nopadding-right">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')) ?>
                            <div>
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="shadow"></div>
                        </a>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
            <?php

            echo do_shortcode("[pagination]"); 
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
