<div class="row">
<div class="k-wold-news col-md-8">
    <?php echo nava_title_row('موسیقی جهان',home_url('/news/world')); ?>
    <div class="row">
        <?php
        $wm_args = array(
            'order'             => 'DESC',
            'orderby'           => 'date',
            'category_name'     => 'world',
            'posts_per_page'    => '6',
            'meta_query'        => array(
                array(
                    'key'       => 'homeFeature',
                    'value'     => '1',
                    'compare'   => '='
                )
            ),
        );
        $wm_query = new WP_Query( $wm_args );
        if ($wm_query->have_posts()):
            while($wm_query->have_posts()):
                $wm_query->the_post();
                $wm_sup_title = get_post_meta(get_the_ID(),'postSupTitle', true);
                ?>
                <article class="k-news-item col-md-6 col-sm-6 col-xs-12 ">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')); ?>
                    </a>
                    <div class="k-b-itemdesc">
                        <p class="k-b-uptitle"><?php echo esc_attr($wm_sup_title); ?></p>
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
    </div>
</div>
<aside class="side col-md-4" id="myScrollspy" >
    <?php if ( is_active_sidebar( 'home-down-widget-area' ) ) : ?>
        <?php dynamic_sidebar( 'home-down-widget-area' ); ?>
    <?php endif; ?>
</aside>
</div>