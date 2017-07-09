<?php
get_header();
?>
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
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <ul class="m-links">
                    <?php
					$category = get_category( get_query_var( 'cat' ) );
					if (!empty($category->category_parent)) {
						//$current_cat = get_category('')
						$category = get_category($category->category_parent);
						if (!empty($category) && isset($category->slug)) {
						$current_cat = $category->slug;
						}
					} else {
						if (!empty($category->slug) && isset($category->slug)) {
							//print_r($category);
						$current_cat = $category->slug;
						}
					}

                    //print_r($category);
					//print_r($cats);
                    // news category
					if (!empty($current_cat) && isset($current_cat)) {
                    $cat = get_category_by_slug($current_cat);
                    $sub_cats = get_term_children($cat->term_id, 'category');
                    echo '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a></li>';
                    foreach($sub_cats as $cat) {
                        $category = get_term($cat);
                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                    }
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
            <div class="k-news col-md-8 col-sm-12 col-xs-12 col-lg-8">
              <div class="row">
                <?php
                $args = array(
                    'posts_per_page'    => '8',
                    'post_type'         => 'reviews',
                    'orderby'           => 'date',
                    'order'             => 'DESC'
                );
                $q = new WP_Query( $args );
                if (have_posts()):
                    while(have_posts()):
                        the_post();
                        $post_meta = get_post_meta( get_the_ID() );
                ?>
                <article class="k-news-item k-reviews-item col-md-6 col-sm-6 col-xs-12 col-lg-6 ">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('nava_music_m', array('class' => 'img-responsive')); ?>
                    </a>
                    <div class="k-b-itemdesc">
                        <?php
                        $review = 0;
                        $reviewCount = 0;
						$result = 0;
                        if (!empty($post_meta['reviewNavaAll'][0])) {
                            $review += esc_attr($post_meta['reviewNavaAll'][0]);
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaTuning'][0])) {
                            $review += esc_attr($post_meta['reviewNavaTuning'][0]);
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaMusic'][0])) {
                            $review += esc_attr($post_meta['reviewNavaMusic'][0]);
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaMix'][0])) {
                            $review += esc_attr($post_meta['reviewNavaMix'][0]);
                            $reviewCount++;
                        }
                        if (!empty($post_meta['reviewNavaComposer'][0])) {
                            $review += esc_attr($post_meta['reviewNavaComposer'][0]);
                            $reviewCount++;
                        }
						if ($reviewCount != 0) {
                        $result = $review / $reviewCount;
						}
						if (!empty($result)):
                        ?>
                        <div class="k-rate circle" data-value="<?php echo (!empty($result)) ? $result/10 : ''; ?>">
                            <canvas width="80" height="80"></canvas>
                            <strong><?php echo (!empty($result)) ? $result : '' ;  ?></strong>
                        </div>
						<?php endif; ?>
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
            </div>
            <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4" id="myScrollspy" >
            
            <?php
            if (is_active_sidebar('reviews-widget-area')) {
                dynamic_sidebar('reviews-widget-area');
            }
            ?>
        </aside>
        </div>
    </div>
</section>
<?php
get_footer();
?>
