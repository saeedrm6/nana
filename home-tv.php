<section class="m-tv-video nomargin">
    <div class="container ">
        <div class="">
            <div class="mtv-video-wrap">
            <div class="col-md-12 col-xs-12">
                <?php echo nava_title_row('ویدیوها', home_url('tv'), '', 'مشاهده بیشتر', false, 'h2', 'red'); ?>
            </div>

            <?php
            $tv_args = array(
                'order'             => 'DESC',
                'orderby'           => 'date',
                'posts_per_page'    => '1',
                'post_type'         => 'tv',
                'meta_query'        => array(
                    array(
                        'key'       => 'homeFeature',
                        'value'     => '1',
                        'compare'   => '='
                    )
                )
            );
            $tv_query = new WP_Query($tv_args);
            if ($tv_query->have_posts()):
                $i = 0;
                $first = true;
            while($tv_query->have_posts()):
                $tv_query->the_post();
                $post_id = get_the_ID();
                $video_sup_title = get_post_meta($post_id, 'videoSupTitle', true);
                ?>
                <div class="col-md-6 nopadding-left">
                    <div class="m-tv-video-item m-tv-video-big">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail(
                                $post_id,
                                'nava_image_m',
                                array(
                                    'class' => 'img-responsive',
                                    'alt'   => get_the_title()
                                )
                            ); ?>

                            <div class="m-tv-video-itemdesc">
                                <?php if (!empty($video_sup_title)): ?><h4><?php echo $video_sup_title; ?></h4><?php endif; ?>
                                <h3 class="k-s-title"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                        $i++;
                    endwhile;
                endif
                ?>
                <div class="col-md-6 nopadding-left">
                    <?php
                    $tv_args = array(
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'posts_per_page'    => '4',
                        'post_type'         => 'tv',
                        'offset'            => '1',
                        'meta_query'        => array(
                            array(
                                'key'       => 'homeFeature',
                                'value'     => '1',
                                'compare'   => '='
                            )
                        )
                    );
                    $tv_query = new WP_Query($tv_args);
                    if ($tv_query->have_posts()):
                        $i = 0;
                        $first = true;
                        while($tv_query->have_posts()):
                            $tv_query->the_post();
                            $post_id = get_the_ID();
                            $video_sup_title = get_post_meta($post_id, 'videoSupTitle', true);
                            ?>
                    <div class="col-md-6 col-xs-12">
                        <div class="m-tv-video-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(
                                    $post_id,
                                    'nava_image_m',
                                    array(
                                        'class' => 'img-responsive',
                                        'alt'   => get_the_title()
                                    )
                                ); ?>
                                <div class="m-tv-video-itemdesc">
                                    <?php if (!empty($video_sup_title)): ?><h4><?php echo $video_sup_title; ?></h4><?php endif; ?>
                                    <h3 class="k-s-title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $i++;
                    endwhile;
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>