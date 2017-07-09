<?php
get_header();
global $post;
$post_id = $post
?>
        <section class="k-central col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div class="container k-web ">
                <div class="k-news col-md-8 col-sm-12 col-xs-12 col-lg-8 nopadding">
                    <div class="col-md-12 col-xs-12">
                        <div class="author-wrapper">
                            <div class="autor-img col-md-2">
                                <?php echo get_wp_user_avatar(get_the_author_meta('id'), 'medium'); ?>

                            </div>
                            <div class="author-bio col-md-10">
                                <h4><?php echo get_the_author(); ?></h4>
                                <div class="author-detail">
                                    <div class="m-social-network">
                                        <?php

                                        $user_facebook  = esc_attr(get_user_meta(get_the_author_meta('id'), 'facebook', true));
                                        $user_twitter   = esc_attr(get_user_meta(get_the_author_meta('id'), 'twitter', true));
                                        $user_instagram = esc_attr(get_user_meta(get_the_author_meta('id'), 'userInstagram', true));
                                        $user_telegram  = esc_attr(get_user_meta(get_the_author_meta('id'), 'userTelegram', true));
                                        $user_email     = esc_attr(get_the_author_meta('user_email'));
                                        $user_gplus     = esc_attr(get_user_meta(get_the_author_meta('id'), 'google', true));
                                        $user_linkedin  = esc_attr(get_user_meta(get_the_author_meta('id'), 'userLinkedIn', true));

                                        if (!empty($user_facebook)) {
                                            echo '<a class="bf-hover" target="_blank" href="'.$user_facebook.'"><i class="fa fa-facebook"></i></a>';
                                        }
                                        if (!empty($user_twitter)) {
                                            echo '<a  class="twitter-hover" target="_blank"  href="'.$user_twitter.'"><i class="fa fa-twitter"></i></a>';
                                        }
                                        if (!empty($user_instagram)) {
                                            echo '<a class="instagram-hover" target="_blank" href="'.$user_instagram.'"><i class="fa fa-instagram"></i></a>';
                                        }
                                        if (!empty($user_telegram)) {
                                            echo '<a class="telegram-hover" target="_blank" href="'.$user_telegram.'"><i class="fa fa-paper-plane"></i></a>';
                                        }
                                        if (!empty($user_gplus)) {
                                            echo '<a class="google-hover" target="_blank" href="'.$user_gplus.'"><i class="fa fa-google-plus"></i></a>';
                                        }

                                        if (!empty($user_linkedin)) {
                                            echo '<a class="linkdin-hover" target="_blank" href="'.$user_linkedin.'"><i class="fa fa-linkedin"></i></a>';
                                        }

                                        if (!empty($user_email)) {
                                            echo '<a class="email-hover" target="_blank" href="mailto:'.$user_email.'"><i class="fa fa-envelope-o"></i></a>';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="bio text-justify">
                                    <?php echo get_the_author_meta('description') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
if (have_posts()):
    while (have_posts()):
        the_post();
        $p_id = get_the_ID();
        $post_meta = get_post_meta($p_id);
        ?>
                    <article class="k-news-item col-sm-6 ">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('nava_image_m', array('class' => 'img-responsive')) ?>
                        </a>
                        <div class="k-b-itemdesc">
                            <p class="k-b-uptitle"><?php echo !empty($post_meta['postSupTitle'][0]) ? esc_attr($post_meta['postSupTitle'][0]) : ''; ?></p>
                            <h4 class="k-b-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<div class="auhor-desc-wrap">
                            <p class="k-b-intro">
                                <?php the_excerpt(); ?>
                            </p>
</div>
                            <p>
                                <time class="k-time" datetime="<?php echo date('Y-m-d H:i:s', get_the_time('U')); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' قبل'; ?></time>
                                <a class="kbtn black" href="<?php the_permalink(); ?>">ادامه خبر</a></p>
                        </div>
                    </article>
        <?php
    endwhile;
endif;
?>

                    <?php echo do_shortcode("[pagination]"); ?>
                </div>
                <aside class="side col-md-4 col-sm-12 col-xs-12 col-lg-4" id="myScrollspy" >
                    <?php if ( is_active_sidebar( 'category-simple-widget-area' ) ) : ?>
                        <?php dynamic_sidebar( 'category-simple-widget-area' ); ?>
                    <?php endif; ?>
                </aside>
            </div>
        </section>

<?php
get_footer();
?>