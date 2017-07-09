<?php global $h; ?>
<aside class="side col-md-3 col-sm-12 col-xs-12 col-lg-3" id="myScrollspy" >
    <div class="best-People-video k-side-box col-sm-12">
        <div class="row nopadding k-title-row">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 nopadding">
                <h2 class="k-title-text">پربازدیدترین ها</h2>
            </div>
        </div>
        <?php
        $pvid_most_viewed_args = array(
            'posts_per_page'    => '5',
            'post_type'         => $h->config['peopleVideosPostType'],
            'meta_key'          => 'nava_post_views_count',
            'orderby'           => 'meta_value_num',
            'order'             => 'DESC',
            'data_query'        => array(
                array(
                    'before'    => '1 week ago'
                )
            )
        );
        $pvid_most_viewed_q = new WP_Query( $pvid_most_viewed_args );
        if ($pvid_most_viewed_q->have_posts()):
            while($pvid_most_viewed_q->have_posts()):
                $pvid_most_viewed_q->the_post();
                ?>
                <div class="best-people-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        the_post_thumbnail( 'nava_image_m', array('class' => 'img-responsive wp-post-image', 'alt' => get_the_title() ))
                        ?>
                        <div class="best-people-itemdesc">
                            <h4 class="k-s-title"><?php the_title(); ?></h4>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</aside>