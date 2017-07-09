<!--HomeMusic-->
<section class="k-music">
    <div class="container">
        <div class="row">
<!--          <div class="banner col-md-12">-->
<!--              <a target="_blank" href="http://www.rocoland.com/?utm_source=nava&utm_medium=banner&utm_campaign=fasttest">-->
<!--                <img style="-->
<!--    width: initial;-->
<!--    max-width: 728px;-->
<!--    margin: 0 auto;-->
<!--    display: block;-->
<!--" src="/wp-content/themes/nava/img/banner-full1.gif" alt="تبلیغ">-->
<!--              </a>-->
<!--          </div>-->
            <div class="owl-k-music col-md-12">
                <?php echo nava_title_row('جدیدترین های موسیقی', home_url('music'),'','مشاهده بیشتر', true, 'h2', "white"); ?>
                <div id="owl-k-music" class="owl-carousel ">
                    <?php
                    $music_args = array(
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'post_type'         => 'music',
                        'posts_per_page'    => '10',
                        'meta_query'        => array(
                            array(
                                'key'       => 'homeFeature',
                                'value'     => '1',
                                'compare'   => '='
                            )
                        )
                    );
                    $music_query = new WP_Query( $music_args );
                    if ($music_query->have_posts()):
                        while($music_query->have_posts()):
                            $music_query->the_post();
                            $post_id = get_the_ID();
                            $music_meta = get_post_meta($post_id);
                            ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo get_the_post_thumbnail( $post_id, 'nava_music_thumbnail', 
									array( 
											'class'  => 'img-responsive',
											'alt'    => $music_meta['musicName'][0] . ' ' . implode('، ',get_artist_name_by_id($music_meta['gArtistName'])) 
										) 
									);
									?>
                                    <div>
                                        <?php if (!empty($music_meta['musicName'])): ?><h3><?php echo $music_meta['musicName'][0]; ?></h3><?php endif; ?>
                                        <?php if (!empty($music_meta['gArtistName'])): ?><h4><?php echo implode('، ',get_artist_name_by_id($music_meta['gArtistName'])); ?></h4><?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--HomeMusic-->
