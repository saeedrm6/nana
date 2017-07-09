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
<section class="k-central">
    <div class="container">
        <div class="row">
            <div class="k-news col-md-8 col-sm-12 col-xs-12 col-lg-8 nopadding">
                <?php
                $args = array(
                    'posts_per_page'    => '8',
                    'post_type'         => 'review',
                    'orderby'           => 'date',
                    'order'             => 'DESC'
                );
                $q = new WP_Query( $args );
                if ($q->have_posts()):
                    while($q->have_posts()):
                        $q->the_post();
                        $post_meta = get_post_meta( get_the_ID() );
                ?>
                <article class="k-news-item col-md-6 col-sm-6 col-xs-12 col-lg-6 ">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')); ?>
                    </a>
                    <div class="k-b-itemdesc">
                        <?php
                        $review = 0;
                        $reviewCount = 0;
                        if (!empty($post_meta['reviewNavaAll'][0])) {
                            $review += $post_meta['reviewNavaAll'][0];
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaTuning'][0])) {
                            $review += $post_meta['reviewNavaTuning'][0];
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaMusic'][0])) {
                            $review += $post_meta['reviewNavaMusic'][0];
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaMix'][0])) {
                            $review += $post_meta['reviewNavaMix'][0];
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaComposer'][0])) {
                            $review += $post_meta['reviewNavaComposer'][0];
                            $reviewCount++;
                        }
                        $result = $review / $reviewCount;
                        ?>
                        <div class="k-rate circle" data-value="<?php echo (!empty($result)) ? $result/10 : ''; ?>">
                            <canvas width="80" height="80"></canvas>
                            <strong><?php echo (!empty($result)) ? $result : '' ;  ?></strong>
                        </div>
                        <?php if (!empty($post_meta['reviewSupTitle'][0])): ?><p class="k-b-uptitle"><?php echo esc_attr($post_meta['reviewSupTitle'][0]); ?></p><?php endif; ?>
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
                ?>
                <?php echo do_shortcode('[pagination]') ?>
            </div>
            <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4 nopadding" id="myScrollspy" >
            <div class="m-banner nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <img src="img/news/insta-banner.gif" />
            </div>
            <div class="m-banner nopadding col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <img src="img/news/news-banner.gif" />
            </div>
            <?php
            if (is_active_sidebar('single-simple-widget-area')) {
                dynamic_sidebar('single-simple-widget-area');
            }
            ?>
        </aside>
        </div>
    </div>
</section>
<?php
get_footer();
?>
