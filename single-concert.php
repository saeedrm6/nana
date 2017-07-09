<?php
get_header();
global $post;
$post_id = $post->ID;
if (have_posts()):
    while(have_posts()):
        the_post();
        $p_id = get_the_ID();
		echo "<!-- mfunc" . nava_set_post_views($p_id) . "--><!-- /mfunc -->";
        $post_meta = get_post_meta($p_id);
        $artist = get_artist_by_id($post_meta['gArtistName']);
        $artist_meta = get_post_meta($artist->ID);
?>

<div class="concert-top-inner" style="background-image:url('<?php echo get_the_post_thumbnail_url($p_id,'full'); ?>')">
    <h1><?php the_title(); ?></h1>
    <div class="k-concert-counter-inner">
        <?php
        $concert_stat = nava_check_event($post_meta['concertStartDate'][0], $post_meta['concertEndDate'][0],
            $post_meta['concertStartTime'][0], $post_meta['concertEndTime'][0]);
        switch($concert_stat) {
            case 0: {
                echo '<h3>زمان باقی مانده تا شروع کنسرت</h3><div id="defaultCountdown"></div>';
                break;
            }
            case 1: {
                echo "<h3>زمان باقی مانده تا پایان کنسرت</h3><div id=\"defaultCountdown\"></div>";
                break;
            }
            case 2: {
                echo "<h3>این کنسرت به پایان رسیده است</h3>";
                break;
            }
        }
        ?>

    </div>
    <?php //echo get_the_post_thumbnail($artist->ID, 'nava_music_thumbnail', array('class' => 'artist-concert img-responsive')); ?>
</div>
<section class="k-central">
    <div class="container">
        <div class=" col-md-8 nopadding-right">
            <div class="concert-desc-inner">
                <div class="concert-specs">
                    <?php if ( !empty($artist->post_title) ): ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-user" aria-hidden="true"></i> هنرمند: </span>
                        <span><a href="<?php echo get_the_permalink($post_meta['gArtistName'][0]); ?>"><?php echo $artist->post_title; ?></a></span>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['concertPlaceName'])): ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> مکان:  </span>
                        <span><?php echo $post_meta['concertPlaceName'][0] ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['concertStartDate'])): ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-calendar" aria-hidden="true"></i> تاریخ: </span>
                        <span><?php
                            if (!empty($post_meta['concertStartDate'][0]) && $post_meta['concertStartDate'][0] != $post_meta['concertEndDate'][0]) {
                                echo $post_meta['concertStartDate'][0];
                            } else {
                                echo $post_meta['concertStartDate'][0];
                            }
                            if (!empty(!empty($post_meta['concertEndDate'][0]) && $post_meta['concertStartDate'][0] != $post_meta['concertEndDate'][0])) {
                                echo ' الی ' . $post_meta['concertEndDate'][0];
                            }


//                            $concert_start_date = explode('/',$post_meta['concertStartDate'][0]);
//                            $jdate = new MMTJDF();
//
//                            if (!empty($post_meta['concertStartDate'])) {
//                                $start_date = explode('/', esc_attr($post_meta['concertStartDate'][0]));
//                                $g_start_date = $jdate->jalali_to_gregorian($start_date[0], $start_date[1], $start_date[2], "/");
//                                $timestamp_start = strtotime($g_start_date);
//                                $start_date = explode('/', $g_start_date);
//                                //$jalali_start_date = implode('/', $jdate->gregorian_to_jalali($start_date[0], $start_date[1], $start_date[2], "/"));
//                            }
//
//                            if (!empty($post_meta['concertEndDate'])) {
//                                $end_date = explode('/', esc_attr($post_meta['concertEndDate'][0]));
//                                $g_end_date = $jdate->jalali_to_gregorian($end_date[0], $end_date[1], $end_date[2], "/");
//                                $timestamp_end = strtotime($g_end_date);
//                                $end_date = explode('/', $g_end_date);
//                                //$jalali_end_date = implode('/', $jdate->gregorian_to_jalali($end_date[0], $end_date[1], $end_date[2], "/"));
//                            }
//
//                            $now = date("Y/m/d");
//                            $now = strtotime($now);
//                            $count_down_date = '';
//                            $count_down_time = '';
//                            $ended_event = false;
//                            if ($timestamp_start > $now) {
//                                //echo "<h3>زمان باقی مانده تا شروع رویداد</h3>";
//                                $count_down_date = $start_date;
//                                $start_date = esc_attr($post_meta['concertStartTime'][0]);
//                                $count_down_time = explode(':', $start_date);
//                            } elseif ($now >= $timestamp_start && $now <= $timestamp_end) {
//                                //echo "<h3>زمان باقی مانده تا پایان رویداد</h3>";
//                                $count_down_date = $end_date;
//                                $start_date = esc_attr($post_meta['concertEndTime'][0]);
//                                $count_down_time = explode(':', $start_date);
//                            } elseif ($now > $timestamp_end) {
//                                //echo "<h3 style='margin-bottom: 80px;'>این رویداد به پایان رسیده است</h3>";
//                                $count_down_date = array('0000', '00', '00');
//                                $count_down_time = array('00', '00', '00');
//                                $ended_event = true;
//                            }
//
//
//                            $date = $jdate->jalali_to_gregorian($concert_start_date[0], $concert_start_date[1], $concert_start_date[2]);
//
//                            if ($ended_event == false) {
//                                wp_localize_script(
//                                    'nava-script',
//                                    'navaObject',
//                                    array(
//                                        'year'  => $count_down_date[0],
//                                        'month' => $count_down_date[1],
//                                        'day'   => $count_down_date[2],
//                                        'hour'  => $count_down_time[0],
//                                        'min'   => $count_down_time[1],
//                                        'sec'   => '00'
//                                    )
//                                );
//                            }
                            ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> سانس: </span>
                        <span><?php echo (!empty($post_meta['concertStartTime'])) ? $post_meta['concertStartTime'][0] : ''; ?> الی <?php echo (!empty($post_meta['concertEndTime'])) ?  $post_meta['concertEndTime'][0] : ''; ?></span>
                    </div>
                    <?php if (!empty($post_meta['concertPhone'])): ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-phone" aria-hidden="true"></i> تماس: </span>
                        <span><?php echo $post_meta['concertPhone'][0]; ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($post_meta['concertWebsite'])): ?>
                    <div class="conc-specs-inner conc-artist">
                        <span><i class="fa fa-globe" aria-hidden="true"></i> تهیه بلیط: </span>
                        <span><a href="<?php echo $post_meta['concertWebsite'][0]; ?>" rel="nofollow"><?php echo $post_meta['concertWebsite'][0]; ?></a></span>
                    </div>
                    <?php endif; ?>
                    <div class="conc-specs-inner conc-artist">
                        <p>
                            <?php the_content(); ?>
                        </p>
                    </div>
                </div>
                <div class="concert-map" id="concertMap" style="width: 100%; height: 440px;">
                </div>
            </div>
            <section class="k-comment clearfix">
                <header class="k-comment-header">
                    <h2><span class="icon icon-bubbles3"></span><?php comments_number( 'بدون دیدگاه', 'یک دیدگاه', '% دیدگاه' ); ?></h2>
                </header>
                <div class="k-comment-body">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template('/inc/comments.php');
                    }
                    ?>
                </div>
            </section>
        </div>
        <aside class="side col-md-4 nopadding">
            <?php
            if (is_active_sidebar('concert-widget-area')) {
                dynamic_sidebar('concert-widget-area');
            }
            ?>
        </aside>

    </div>
</section>

<?php
        wp_reset_query();
if (!isset($post_meta['concertIsPhysical']) || $post_meta['concertIsPhysical'][0] != 1):
    $localize = array(
        'append_to'     => "concertMap",
        'title'         => get_the_title()
    );
    $localize['longitude'] = (!empty($post_meta['concertLong']) && isset($post_meta['concertLong'])) ? $post_meta['concertLong'][0] : '' ;
    $localize['latitude'] = (!empty($post_meta['concertLat']) && isset($post_meta['concertLat'])) ? $post_meta['concertLat'][0] : '' ;
    $localize['zoom'] = (!empty($post_meta['concertZoom']) && isset($post_meta['concertZoom'])) ? $post_meta['concertZoom'][0] : '' ;
    $localize['country'] = (!empty($post_meta['concertCountry']) && isset($post_meta['concertCountry'])) ? $post_meta['concertCountry'][0] : '';
    $localize['city'] = (!empty($post_meta['concertCity']) && isset($post_meta['concertCity'])) ? $post_meta['concertCountry'][0] : '';

    $local_script = wp_localize_script(
        'nava-google-map',
        'event_map',
        $localize
    );
endif;
    endwhile;
endif;
get_footer();
?>
