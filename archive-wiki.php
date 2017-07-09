<?php
get_header();
?>
<section class="wiki-box">
<div class="container-fluid">
    <div class="row">
        <!-- Artists filter-->
        <aside class="m-side col-sm-3 nopadding">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle m-navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav nav-pills nav-stacked navbar-nav">
                    <?php
                    $terms = get_terms(
                        array(
                            'hide_empty'    => false,
                            'taxonomy'      => 'wikinode',
                            'orderby'       => 'date',
                            'order'         => 'DESC'
                        )
                    );
                    if (!empty($terms)):
                        foreach($terms as $term):
                    ?>
                    <li><a href="<?php echo get_term_link($term->term_id, 'wikinode'); ?>" ><?php echo $term->name; ?></a></li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </aside>
        <section class="alphabet-search-box clearfix col-lg-9 col-md-9 col-sm-9 col-xs-12 nopadding">
		
            <div class="m-alphabet">
                <a class="search-a-z" href="#">
                    <span>جستجو بر اساس حروف الفبا</span>
                    <span class="icon-wrap">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
            <?php
            // $arg = array(
                // 'posts_per_page'    => '20',
                // 'post_type'         => 'wiki',
                // 'orderby'           => 'date',
                // 'order'             => 'DESC'
            // );
            // $q = new WP_Query( $arg );
            if (have_posts()):
				$avatar_color = 0;
                while(have_posts()):
                    the_post();
                    $post_id = get_the_ID();
//                    $post_meta = get_post_meta( $post_id );
            ?>
            <div class="m-portfolio col-lg-3 col-md-3 col-sm-3 col-xs-12 nopadding">
                <div class="m-portfolio-wrapper">
                    <?php
                    $profile_image = get_the_post_thumbnail_url($post_id);
                    if (!empty($profile_image)) {
                        the_post_thumbnail('nava_music_m', array(
                            'class'     => 'img-responsive'
                        ));
                    } else {
						//$random_number = mt_rand(0, 5);
                        echo '<img src="' . THEME_IMAGES . 'avatar'.$avatar_color.'.jpg' . '" />';
						if ($avatar_color == 5) {
							$avatar_color = 0;
						}
						$avatar_color++;
                    }
                    ?>
                    <div class="m-label">
                        <a href="<?php the_permalink(); ?>" class="m-label-text">
                            <div class="m-text-title">
                                <?php the_title(); ?>
                            </div>
                        </a>
                        <div class="m-label-bg"></div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            endif;
            echo do_shortcode('[pagination]');
            ?>
        </section>
        <!-- Artist images -->
    </div>
</div>
</section>


<form action="<?php echo home_url('swiki'); ?>" method="post" class="AlphabetSub" style="display:none;">
	<a href="<?php echo home_url('wiki'); ?>" class="Alphabeticality AlllS" >همه</a>
	<input type="submit" name="search" value="آ" class="Alphabeticality" />
	<input type="submit" name="search" value="ا" class="Alphabeticality" />
	<input type="submit" name="search" value="ب" class="Alphabeticality" />
	<input type="submit" name="search" value="پ" class="Alphabeticality" />
	<input type="submit" name="search" value="ت" class="Alphabeticality" />
	<input type="submit" name="search" value="ث" class="Alphabeticality" />
	<input type="submit" name="search" value="ج" class="Alphabeticality" />
	<input type="submit" name="search" value="چ" class="Alphabeticality" />
	<input type="submit" name="search" value="ح" class="Alphabeticality" />
	<input type="submit" name="search" value="خ" class="Alphabeticality" />
	<input type="submit" name="search" value="د" class="Alphabeticality" />
	<input type="submit" name="search" value="ذ" class="Alphabeticality" />
	<input type="submit" name="search" value="ر" class="Alphabeticality" />
	<input type="submit" name="search" value="ز" class="Alphabeticality" />
	<input type="submit" name="search" value="ژ" class="Alphabeticality" />
	<input type="submit" name="search" value="س" class="Alphabeticality" />
	<input type="submit" name="search" value="ش" class="Alphabeticality" />
	<input type="submit" name="search" value="ص" class="Alphabeticality" />
	<input type="submit" name="search" value="ض" class="Alphabeticality" />
	<input type="submit" name="search" value="ط" class="Alphabeticality" />
	<input type="submit" name="search" value="ظ" class="Alphabeticality" />
	<input type="submit" name="search" value="ع" class="Alphabeticality" />
	<input type="submit" name="search" value="غ" class="Alphabeticality" />
	<input type="submit" name="search" value="ق" class="Alphabeticality" />
	<input type="submit" name="search" value="ک" class="Alphabeticality" />
	<input type="submit" name="search" value="گ" class="Alphabeticality" />
	<input type="submit" name="search" value="ل" class="Alphabeticality" />
	<input type="submit" name="search" value="م" class="Alphabeticality" />
	<input type="submit" name="search" value="ن" class="Alphabeticality" />
	<input type="submit" name="search" value="و" class="Alphabeticality" />
	<input type="submit" name="search" value="ه" class="Alphabeticality" />
	<input type="submit" name="search" value="ی" class="Alphabeticality" />
</form>


<?php
get_footer();
?>
