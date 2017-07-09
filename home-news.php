<div class="row">
    <div class="k-news col-md-8 col-xs-12">
      <div class="row">
<!--        <div class="banner col-md-12">-->
<!--            <a target="_blank" href="https://goo.gl/w7wwdi">-->
<!--              <img src="/wp-content/themes/nava/img/banner/novincharm-main.gif" alt="تبلیغ">-->
<!--            </a>-->
<!--        </div>-->
      </div>
        <div class="row">

            <?php
            $post_args = array(
                'posts_per_page'        => '11',
                'order'                 => 'DESC',
                'orderby'               => 'date',
                'post__not_in'          => $GLOBALS['post_not_in'],
                'category__not_in'      => array(198),
                'meta_query'        => array(
                    array(
                        'key'       => 'homeFeature',
                        'value'     => '1',
                        'compare'   => '='
                    )
                )
            );
            $post_query = new WP_Query( $post_args );
            if ($post_query->have_posts()):
                $i = true;
                while($post_query->have_posts()):
                    $post_query->the_post();
                    $post_id = get_the_ID();
                    $supTitle = esc_attr(get_post_meta($post_id, 'postSupTitle', true));
                    ?>
                    <article class="k-news-item <?php
                    if($i == true) {
                        echo 'first-item col-md-12';
                    } else {
                        echo 'col-sm-6';
                    } ?> ">
                        <div class="k-img-over">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if ($i == true) {
                                    echo get_the_post_thumbnail($post_id, 'nava_image_l', array('class' => 'img-responsive', 'alt' => get_the_title(), 'title' => get_the_title()));
                                } else {
                                    echo get_the_post_thumbnail($post_id, 'nava_image_m', array('class' => 'img-responsive', 'alt' => get_the_title(), 'title' => get_the_title()));
                                }
                                ?>

                            </a>
                        </div>
                        <div class="k-b-itemdesc">
                            <?php if(!empty($supTitle)): ?><p class="k-b-uptitle"><?php echo $supTitle; ?></p><?php endif; ?>
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="k-b-title"><?php the_title(); ?></h2>
                            </a>
                            <p class="k-b-intro"><?php the_excerpt(); ?></p>
                            <time class="k-time" datetime="<?php echo date('Y-m-d H:i:s', get_the_time('U')); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' قبل'; ?></time>
                            <a href="<?php the_permalink(); ?>"  class="more black mbtn">ادامه خبر <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
                        </div>
                    </article>
                    <?php
                    $i = false;
                endwhile;
            endif;
            ?>
        </div>
    </div>
	<aside class="side col-md-4" >
    <?php if ( is_active_sidebar( 'home-widget-area' ) ) : ?>
        <?php dynamic_sidebar( 'home-widget-area' ); ?>
    <?php endif; ?>
</aside>

</div>
