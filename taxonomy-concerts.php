<?php
get_header();
?>
<div class="concert-top">
    <h1>کنسرت ها</h1>
</div>
<section class="k-central k-central-concert nopadding">
    <div class="container concert-container">
        <?php
        $args = array(
            'posts_per_page'    => '10',
            'post_type'         => 'concert',
            'orderby'           => 'date',
            'order'             => 'DESC'
        );
        $q = new WP_Query( $args );
        if ($q->have_posts()):
            while($q->have_posts()):
                $q->the_post();
                $post_id = get_the_ID();
                $post_meta = get_post_meta($post_id);
                $artist = get_artist_by_id($post_meta['gArtistName']);
                $thumb = get_the_post_thumbnail($artist->ID, 'nava_music_thumbnail', array('class' => 'img-responsive'));
                ?>
                <div class="k-concert-box col-md-12 col-sm-6 col-lg-12">
                    <div class="concert-innerbox">
                        <div class="concert-time col-md-2">
                            <time datetime="<?php the_date('Y-m-d H:i:s'); ?>">
                                <?php
                                //                        $jdate = new MMTJDF();
                                //                        $year = get_the_date('Y');
                                //                        $month = get_the_date('m');
                                //                        $day = get_the_date('d');
                                //                        $date = $jdate->gregorian_to_jalali($year, $month, $day);

                                $startDate = $post_meta['concertStartDate'];
                                if (!empty($startDate)) {
                                    $startDate = explode('/', $post_meta['concertStartDate'][0]);
                                }

                                ?>
                                <span><?php echo $startDate[2] ?></span> <span><?php echo jalali_name_by_number($startDate[1]); ?> <?php echo $startDate[0]; ?></span>
                            </time>
                        </div>
                        <div class="concert-desc col-md-5">
                            <a class="col-md-5" href="<?php the_permalink(); ?>">
                                <figure>
                                    <?php echo $thumb; ?>
                                </figure>
                            </a>
                            <h2 class="title col-md-7"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="concert-intro col-md-7"><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                        if (isset($post_meta['concertPlaceName']) && !empty($post_meta['concertPlaceName'])):
                            ?>
                            <div class="concert-location col-md-3">
                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span class="concert-intro"><?php echo $post_meta['concertPlaceName'][0] ?></span>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="concert-info col-md-2">
                            <a href="<?php the_permalink(); ?>" class="kbtn black">اطلاعات کنسرت</a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        endif;

        echo do_shortcode('[pagination]');

        ?>

    </div>
</section>
<?php
get_footer();
?>
