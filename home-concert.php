<div class="k-concert">
    <?php echo nava_title_row('کنسرت ها', home_url('concert'), '', 'مشاهده بیشتر', true, 'h2', "red"); ?>
    <div class="row">
        <?php
        $main_concert_args = array(
            'order'             => 'DESC',
            'orderby'           => 'date',
            'post_type'         => 'concert',
            'posts_per_page'    => '1',
            'meta_query'        => array(
                'relation'          => 'AND',
                array(
                    'key'           => 'homeFeature',
                    'value'         => '1',
                    'compare'       => '='
                ),
                array(
                    'key'           => 'concertFeature',
                    'value'         => '1',
                    'compare'       => '='
                )
            ),
        );


        $main_concert_query = new WP_Query( $main_concert_args );
        if ($main_concert_query->have_posts()):
            while($main_concert_query->have_posts()):
                $main_concert_query->the_post();
                $post_id = get_the_ID();
                $GLOBALS['concert_not_in'][] = $post_id;
                $main_concert_metas = get_post_meta($post_id);
//                $has_start = false;
//				$has_end = false;
// $jdate = new MMTJDF();
//				$startDate = $main_concert_metas['concertStartDate'];
//				if (!empty($startDate)) {
//					$has_start = true;
//					$start_date = explode('/', esc_attr($startDate[0]));
//					$g_start_date = $jdate->jalali_to_gregorian($start_date[0], $start_date[1], $start_date[2], "/");
//					$timestamp_start = strtotime($g_start_date);
//					$start_date = explode('/', $g_start_date);
//				}
//				$endDate = $main_concert_metas['concertEndDate'];
//				if (!empty($endDate)) {
//					$has_end = true;
//					$end_date = explode('/', esc_attr($endDate[0]));
//					$g_end_date = $jdate->jalali_to_gregorian($end_date[0], $end_date[1], $end_date[2], "/");
//					$timestamp_end = strtotime($g_end_date);
//					$end_date = explode('/', $g_end_date);
//				}
//				$startTime = $main_concert_metas['concertStartTime'];
//				$endTime = $main_concert_metas['concertEndTime'];
//				$now = date("Y/m/d");
//				$now = strtotime($now);
//				$count_down_date = '';
//				$count_down_time = '';
//				$ended_event = false;
//				if ($timestamp_start > $now) {
//					echo "";
//					$count_down_date = $start_date;
//					$start_date = esc_attr($startTime[0]);
//					$count_down_time = explode(':', $start_date);
//				} elseif ($now >= $timestamp_start && $now <= $timestamp_end) {
//					echo "";
//					$count_down_date = $end_date;
//					$start_date = esc_attr($endTime[0]);
//					$count_down_time = explode(':', $start_date);
//				} elseif ($now > $timestamp_end) {
//					echo "";
//					$count_down_date = array('0000', '00', '00');
//					$count_down_time = array('00', '00', '00');
//					$ended_event = true;
//				}
//
//
//				$date = $jdate->jalali_to_gregorian($concert_start_date[0], $concert_start_date[1], $concert_start_date[2]);
//
//				if ($ended_event == false) {
//					wp_localize_script(
//						'nava-script',
//						'navaObject',
//						array(
//							'year'  => $count_down_date[0],
//							'month' => $count_down_date[1],
//							'day'   => $count_down_date[2],
//							'hour'  => $count_down_time[0],
//							'min'   => $count_down_time[1],
//							'sec'   => '00'
//						)
//					);
//				}
				                // if (!empty($main_concert_metas['concertStartDate'])) {
                    // $has_start = true;
                    // $concert_start_date = explode('/',$main_concert_metas['concertStartDate'][0]);
                    // $jdate = new MMTJDF();
                    // $date = $jdate->jalali_to_gregorian($concert_start_date[0], $concert_start_date[1], $concert_start_date[2]);
                    // wp_localize_script(
                        // 'nava-script',
                        // 'navaObject',
                        // array(
                            // 'year'      => $date[0],
                            // 'month'     => $date[1],
                            // 'day'       => $date[2]
                        // )
                    // );
                // }
                ?>
                <div class="k-concert-item concert-big col-md-6 col-xs-12">
                    <div class="imgoverlay">
                        <a href="<?php the_permalink($post_id); ?>">
                            <?php echo get_the_post_thumbnail($post_id, 'nava_image_l', array('class' =>'img-responsive', 'alt' => get_the_title($post_id))); ?>
                        </a>
                        <div class="k-concert-counter">
                            <?php
                            $concert_stat = nava_check_event($main_concert_metas['concertStartDate'][0], $main_concert_metas['concertEndDate'][0],
                                $main_concert_metas['concertStartTime'][0], $main_concert_metas['concertEndTime'][0]);
                            switch($concert_stat) {
                                case 0: {
                                    //echo '<h5>زمان باقی مانده تا شروع کنسرت</h5><div id="defaultCountdown"></div>';
                                    echo '<div id="defaultCountdown"></div>';
                                    break;
                                }
                                case 1: {
                                    echo '<div id="defaultCountdown"></div>';
                                    //echo '<h5>کنسرت آغاز شده است زمان باقیمانده تا پایان</h5><div id="defaultCountdown"></div>';
                                    break;
                                }
                                case 2: {
                                    //echo "<h5>این کنسرت به پایان رسیده است</h5>";
                                    break;
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="k-concert-item-cont">
                        <div class="k-concert-btitle">
                            <div class="sec-right">
                                <span class="k-cal-icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <span class="k-next-concert">کنسرت بعدی</span>
                            </div>
                            <?php if (!empty($main_concert_metas['gArtistName'])): ?><div class="sec-left k-artist-concert"><?php echo implode('،', get_artist_name_by_id($main_concert_metas['gArtistName'])); ?></div><?php endif; ?>
                        </div>

                        <div class="k-concert-desc">
                            <?php
                            if (!empty($main_concert_metas['concertStartDate'])): ?>
                            <div class="conc-date col-md-3 col-xs-12 "><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $main_concert_metas['concertStartDate'][0]; ?></div>
                            <?php
                            endif;
                            if (!empty($main_concert_metas['concertStartTime'])):
                            ?>
                            <div class="conc-time col-md-3 col-xs-12 "><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;ساعت <?php echo $main_concert_metas['concertStartTime'][0]; ?></div>
                            <?php
                            endif;
                            if (!empty($main_concert_metas['concertPlaceName'])):
                            ?>
                            <div class="conc-location col-md-6 col-xs-12"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $main_concert_metas['concertPlaceName'][0]; ?></div>
                            <?php
                            endif;
                            ?>
                        </div>
                        <div class="k-concert-links">
                            <a class="kbtn gray half-marg sec-right" href="<?php the_permalink($post_id) ?>#map"><i class="fa fa-map-marker" aria-hidden="true"></i> مشاهده نقشه </a>
                            <a class="kbtn gray half-marg sec-left" href="<?php the_permalink($post_id) ?>#description"><i class="fa fa-info-circle" aria-hidden="true"></i> اطلاعات کنسرت</a>
                            <a class="kbtn gray full" href="<?php echo home_url('concert'); ?>">مشاهده لیست کنسرت ها</a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>

        <?php
        $concert_args = array(
            'order'             => 'DESC',
            'orderby'           => 'date',
            'post_type'         => 'concert',
            'posts_per_page'    => '4',
            'meta_query'        => array(
                array(
                    'key'       => 'homeFeature',
                    'value'     => '1',
                    'compare'   => '='
                )
            ),
            'post__not_in'      => $GLOBALS['concert_not_in']
        );
        $concert_query = new WP_Query( $concert_args );
        if ($concert_query->have_posts()):
            while($concert_query->have_posts()):
                $concert_query->the_post();
                $concert_metas = get_post_meta(get_the_ID());
                ?>
                <div class="k-concert-item concert-small col-md-3 col-sm-6 col-xs-12 ">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgoverlay">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'nava_image_m', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                        </div>
                        <div class="k-concert-item-cont">
                            <div class="k-concert-desc">
                                <?php
                                if (!empty($concert_metas['gArtistName'])): ?><h4 class="conc-name">
                                    <?php echo implode('، ', get_artist_name_by_id($concert_metas['gArtistName'])); ?></h4>
                                <?php
                                endif;
                                if (!empty($concert_metas['concertPlaceName'])): ?>
                                <span class="conc-location col-md-12"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $concert_metas['concertPlaceName'][0] ?></span>
                                <?php endif;
                                if (!empty($concert_metas['concertStartDate'])):
                                ?>
                                <div class="conc-date col-md-6 text-left pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $concert_metas['concertStartDate'][0]; ?></div>
                                <?php
                                endif;
                                 if (!empty($concert_metas['concertStartTime'])): ?>
                                <div class="conc-time col-md-6conc-time col-md-6 pull-right"> <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;ساعت<?php echo $concert_metas['concertStartTime'][0] ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
