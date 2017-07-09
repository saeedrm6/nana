<div class="container">
    <?php
    echo nava_title_row('نقد و بررسی', home_url('reviews'), '', 'مشاهده بیشتر', true,'h2', 'white');
    ?>
    <div class="k-review-box">
        <div class="row">
            <?php
            $review_args = array(
                'order'             => 'DESC',
                'orderby'           => 'date',
                'posts_per_page'    => '4',
                'post_type'         => 'reviews',
                'meta_query'        => array(
                    array(
                        'key'       => 'homeFeature',
                        'value'     => '1',
                        'compare'   => '='
                    )
                )
            );

            $review_query = new WP_Query( $review_args );
            if ($review_query->have_posts()):
                while($review_query->have_posts()):
                    $review_query->the_post();
                    $review_metas = get_post_meta(get_the_ID());
                    if (!empty( $review_metas['reviewSupTitle']) && isset( $review_metas['reviewSupTitle'])) {
                        $review_sup_title = esc_attr($review_metas['reviewSupTitle'][0]);
                    }

                    $review_nava_rating = calc_rating($review_metas, 'nava');
                    ?>
                    <div class="k-news-item col-md-3 col-sm-6">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'nava_image_m', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                            <div class="k-b-itemdesc">
                                <?php if ($review_nava_rating != 0): ?>
                                    <div class="k-rate circle" data-value="<?php echo $review_nava_rating/10 ?>">
                                        <strong><?php echo $review_nava_rating; ?></strong>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($review_sup_title)): ?><p class="k-b-uptitle"><?php echo $review_sup_title; ?></p><?php endif; ?>
                                <h4 class="k-b-title"><?php the_title(); ?></h4>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>