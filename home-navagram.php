<div class="container">
  <?php //echo nava_title_row('', home_url('navagram'), '', 'مشاهده بیشتر', false, 'h2', 'white'); ?>
    <div class="row">

        <div class="m-navagram-wrapper col-md-12">
            <div class="m-navagram-container">
                <div class="m-navagram-in">
                    <h2 class="title-block col-md-8 col-sm-10 col-xs-12" data-title="NAVAGRAM">
                        نواگرام
                        <span class="navagram-subtitle hidden-xs">(در شبکه های اجتماعی هنرمندان چه می گذرد)</span>

                        <span class="entry-title-wrap">
                            <span class="entry-big-text">NAVAGRAM</span>
                        </span>
                    </h2>
                    <a href="http://nava.ir/navagram" class="more pull-left white">مشاهده بیشتر <i class="fa fa-chevron-circle-left"></i></a>

                <div class="col-md-6 col-xs-12 nopadding">
                    <?php
                    $navagram_args = array(
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'post_type'         => 'navagram',
                        'posts_per_page'    => '3'
                    );
                    $navagram_query = new WP_Query( $navagram_args );
                    if ($navagram_query->have_posts()):
                        $first = true;
                    while($navagram_query->have_posts()):
                    $navagram_query->the_post();
                    $navagram_metas = get_post_meta(get_the_ID(), 'gArtistName');
                    $artist = get_artist_by_id($navagram_metas);
                    ?>
                        <div class="col-xs-12 mb30 <?php if ($first == true) {echo 'col-md-12 '; $first = false;} else { echo 'col-md-6'; } ?>">
                            <a class="m-navagram-item" href="<?php the_permalink(); ?>">
                                <div class="navagram-img">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'nava_image_l'); ?>
                                    <div class="m-navagram-caption">
                                        <div class="meta-holder">
                                            <a href="#" class="author-image">
                                                <?php echo get_the_post_thumbnail($artist->ID, 'nava_image_xs', array('class' => 'avatar','alt' => $artist->post_title)) ?>
                                            </a>
                                            <div class="meta">
                                                <span class="author"><?php echo $artist->post_title; ?></span>
                                            </div>
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <?php
                    endwhile;
                    endif;
                    ?>
                </div>
                <div class="col-md-6 col-xs-12 nopadding">
                    <div class="col-md-6 col-xs-12 nopadding">
                    <?php
                    $navagram_args = array(
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'post_type'         => 'navagram',
                        'posts_per_page'    => '2',
                        'offset'            => '3'
                    );
                    $navagram_query = new WP_Query( $navagram_args );
                    if ($navagram_query->have_posts()):
                    $first = true;
                    while($navagram_query->have_posts()):
                    $navagram_query->the_post();
                    $navagram_metas = get_post_meta(get_the_ID(), 'gArtistName');
                    $artist = get_artist_by_id($navagram_metas);
                    ?>
                        <div class="col-md-12 col-xs-12 mb30">
                            <a class="m-navagram-item" href="<?php the_permalink(); ?>">
                                <div class="navagram-img">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'nava_image_m'); ?>
                                    <div class="m-navagram-caption">
                                        <div class="meta-holder">
                                            <a href="#" class="author-image">
                                                <?php echo get_the_post_thumbnail($artist->ID, 'nava_image_xs', array('class' => 'avatar','alt' => $artist->post_title)) ?>
                                            </a>
                                            <div class="meta">
                                                <span class="author"><?php echo $artist->post_title; ?></span>
                                            </div>
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    endwhile;
                    endif;
                    ?>
                    </div>
                    <?php
                    $navagram_args = array(
                        'order'             => 'DESC',
                        'orderby'           => 'date',
                        'post_type'         => 'navagram',
                        'posts_per_page'    => '1',
                        'offset'            => '5'
                    );
                    $navagram_query = new WP_Query( $navagram_args );
                    if ($navagram_query->have_posts()):
                    $first = true;
                    while($navagram_query->have_posts()):
                    $navagram_query->the_post();
                    $navagram_metas = get_post_meta(get_the_ID(), 'gArtistName');
                    $artist = get_artist_by_id($navagram_metas);
                    ?>
                        <div class="col-md-6 col-xs-12 ">
                            <a class="m-navagram-item" href="<?php the_permalink(); ?>">
                                <div class="navagram-img navagram-img-last">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'nava_image_l'); ?>
                                    <div class="m-navagram-caption">
                                        <div class="meta-holder">
                                            <a href="#" class="author-image">
                                                <?php echo get_the_post_thumbnail($artist->ID, 'nava_image_xs', array('class' => 'avatar','alt' => $artist->post_title)) ?>
                                            </a>
                                            <div class="meta">
                                                <span class="author"><?php echo $artist->post_title; ?></span>
                                            </div>
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
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
            </div>
        </div>
    </div>
</div>
