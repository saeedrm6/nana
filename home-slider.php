<!--Slider-->
<!--<section class="k-slider clearfix">-->
<!--    <div class="container-fluid">-->

<section class="clearfix nomargin">
            <div class="container-fluid nopadding">
                <div class="accordion">
                    <ul>
                        <?php
                        $query = home_slider_query();

                        if ($query->have_posts()) {
                        while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();
                        $thumbnail = get_the_post_thumbnail_url($post_id, 'nava_image_l');
                        //echo get_post_type($post_id);
                        ?>
                        <li class="slider-item <?php if (get_post_type() == 'tv') { echo 'slider-item-video'; } ?>" style="background-image: url('<?php echo $thumbnail; ?>')">
                            <div>
                                <a href="<?php the_permalink(); ?>" class="sliderLink">
                                    <?php
                                    switch (get_post_type()) {
                                        case 'reviews':
                                            $cat = nava_get_post_term($post_id, 'reviews', 'review');
                                            break;
                                        case 'tv':
                                            $cat = nava_get_post_term($post_id, 'tv', 'videos');
                                            break;
                                        default:
                                            $cat = nava_get_post_term($post_id, 'post');
                                    }
                                    if (!empty($cat->name)):
                                        ?>
                                        <h4 class="slider-itemcat"><span><?php echo $cat->name; ?></span></h4>
                                        <?php
                                    endif;
                                    ?>

                                    <h2 class="slider-itemtitle"><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </li>
                            <?php
                        }
                        } else {
                            echo '<h1>No posts</h1>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
<!--    </div>-->
<!--</section>-->
<!--Slider-->
