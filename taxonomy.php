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
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <ul class="m-links">
                    <?php
					$category = get_category( get_query_var( 'cat' ) );
					if (!empty($category->category_parent)) {
						//$current_cat = get_category('')
						$category = get_category($category->category_parent);
						$current_cat = $category->slug;
					} else {
						$current_cat = $category->slug;
					}

                    //print_r($category);
					//print_r($cats);
                    // news category
                    $cat = get_category_by_slug($current_cat);
                    $sub_cats = get_term_children($cat->term_id, 'category');
                    echo '<li><a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a></li>';
                    foreach($sub_cats as $cat) {
                        $category = get_term($cat);
                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
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
      <div class="row">
        <div class="k-news col-md-8 col-sm-12 col-xs-12 col-lg-8">
          <div class="row">
            <?php

            if (have_posts()):
                while(have_posts()):
                    the_post();
                    $supTitle = get_post_meta(get_the_ID(), 'postSupTitle', true);
            ?>
            <article class="k-news-item col-md-6 col-sm-6 col-xs-12 col-lg-6 ">
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
                    <a href="<?php the_permalink(); ?>" class="kbtn black">ادامه </a>
                </div>
            </article>
            <?php
                endwhile;
            endif;

            echo do_shortcode("[pagination]");

            ?>

<!--            <div class="m-pagination">-->
<!--                <ul class="pagination">-->
<!--                    <li class="disabled"><a di href="#">ابتدا &laquo;</a></li>-->
<!--                    <li class="previous disabled"><a href="#">&rarr; قبلی</a></li>-->
<!--                    <li class="active"><a href="#">1</a></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li class="disabled"><a href="#">...</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li class="next"><a href="#">بعدی &larr;</a></li>-->
<!--                    <li><a href="#"> &raquo;  انتها</a></li>-->
<!--                </ul>-->
<!--            </div>-->
</div>
        </div>

        <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4" id="myScrollspy" >
            <?php if ( is_active_sidebar( 'category-simple-widget-area' ) ) : ?>
                <?php dynamic_sidebar( 'category-simple-widget-area' ); ?>
            <?php endif; ?>
        </aside>

        </div>

    </div>
</section>
<!--central-->
<?php get_footer(); ?>
