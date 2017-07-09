<?php

/** Register sidebars */
function nava_inner_simple_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('ساید بار صفحه داخلی ساده', 'nava'),
            'id' => 'single-simple-widget-area',
            'description'   => __('برای سایدبار ابزارک های صفحه داخلی ساده', 'nava'),
            'before_title'  => '',
            'after_title'   => '',
            'before_widget'  => '',
            'after_widget'   => ''
        )
    );
    register_sidebar(
        array(
            'name' => __('ساید بار دسته بندی ساده', 'nava'),
            'id' => 'category-simple-widget-area',
            'description'   => __('برای سایدبار ابزارک های صفحه دسته بندی ساده', 'nava'),
            'before_title'  => '',
            'after_title'   => '',
            'before_widget'  => '',
            'after_widget'   => ''
        )
    );
}

add_action('widgets_init', 'nava_inner_simple_widgets_init');


function nava_home_widgets_init()
{
    register_sidebar(array(
        'name' => __('ساید بار صفحه اصلی یا خانه بالا', 'nava'),
        'id' => 'home-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه اصلی و خانه وب سایت', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));
    register_sidebar(array(
        'name' => __('ساید بار صفحه اصلی یا خانه پایین', 'nava'),
        'id' => 'home-down-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه اصلی و خانه وب سایت', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));
}

add_action('widgets_init', 'nava_home_widgets_init');

function nava_widgets_init() {
    register_sidebar(array(
        'name' => __('سایدبار صفحه موسیقی', 'nava'),
        'id' => 'music-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه موسیقی', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه گالری', 'nava'),
        'id' => 'gallery-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه گالری', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه نوا تی وی', 'nava'),
        'id' => 'tv-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه ویدیوها', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه مطالب و اخبار', 'nava'),
        'id' => 'news-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه مطالب و اخبار', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه نواگرام', 'nava'),
        'id' => 'navagram-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه نواگرام', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه نقد و بررسی', 'nava'),
        'id' => 'reviews-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه نقد و بررسی', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه داخلی نقد و بررسی', 'nava'),
        'id' => 'reviews-single-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه داخلی نقد و بررسی', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه هنرمندان', 'nava'),
        'id' => 'artists-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه هنرمندان', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

    register_sidebar(array(
        'name' => __('سایدبار صفحه کنسرت ها', 'nava'),
        'id' => 'concert-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه کنسرت ها', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));

}
add_action( 'widgets_init', 'nava_widgets_init' );

function nava_music_widget_init()
{
    register_sidebar(array(
        'name' => __('ساید بار صفحه موسیقی', 'nava'),
        'id' => 'music-widget-area',
        'description' => __('برای سایدبار ابزارک های صفحه موسیقی وب سایت', 'nava'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget'  => '',
        'after_widget'   => ''
    ));
}
add_action('widgets_init', 'nava_music_widget_init');

/** End register sidebars */

/** Register the widgets */
add_action('widgets_init', function () {
    // this widget is to display small
    register_widget('nava_tab_widget');
    register_widget('nava_notes_widget');
    register_widget('nava_category_widget');
    register_widget('nava_top10_music_widget');
    register_widget('nava_concert_widget');
    register_widget('nava_reviews_widget');
});

/** End register the widgets */

/** Nava tab widget most viewed base on month - week - day */
class nava_tab_widget extends WP_Widget
{

    public function __construct()
    {

        // stl -> small thumb row
        parent::__construct(
            'nava_tab_widget',
            __('تب های نمایش پربازدیدترین ها', 'nava'),
            array(
                'classname' => 'nava_tw_widget aside-block-rows',
                'description' => __('نمایش پربازدیدترین ها براساس هفته، ماه و اخیر به صورت تب', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');

    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {

        extract($args);

        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
        }

        if (isset($instance['tab1_title'])) {
            $tab1_title     = strip_tags($instance['tab1_title']);
        }
        if (isset($instance['tab2_title'])) {
            $tab2_title     = strip_tags($instance['tab2_title']);
        }
        if (isset($instance['tab3_title'])) {
            $tab3_title     = strip_tags($instance['tab3_title']);
        }
        if (isset($instance['count'])) {
            $tab_count      = strip_tags($instance['count']);
        }
        if (isset($instance['tab1_id'])) {
            $tab1_id        = strip_tags($instance['tab1_id']);
        }
        if (isset($instance['tab2_id'])) {
            $tab2_id        = strip_tags($instance['tab2_id']);
        }
        if (isset($instance['tab3_id'])) {
            $tab3_id        = strip_tags($instance['tab3_id']);
        }
        if(isset($instance['tab1_days'])) {
            $tab1_days      = strip_tags($instance['tab1_days']);
        }
        if (isset($instance['tab2_days'])) {
            $tab2_days      = strip_tags($instance['tab2_days']);
        }
        if (isset($instance['tab3_days'])) {
            $tab3_days      = strip_tags($instance['tab3_days']);
        }
		$offset_top     = $instance['offset_top'];
        $offset_bottom  = $instance['offset_bottom'];


        echo $before_widget;
		        echo '<div class="';
        echo (!empty($wrap_class)) ? $wrap_class : '';
        echo ' k-views k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12" ';
        if ($offset_bottom != '' && $offset_top != ''):
            echo 'data-spy="affix" data-offset-top="' . $offset_top . '" data-offset-bottom="' . $offset_bottom . '"';
        endif;
        echo '>';
        ?>
        <ul class="nav nav-tabs" role="tablist">
            <?php if (!empty($tab1_title) && isset($tab1_title)): ?>
            <li role="presentation" class="active col-md-4 col-xs-12 col-sm-4 col-lg-4 nopadding">
                <a data-toggle="tab" href="#<?php echo $tab1_id; ?>" role="tab" aria-controls="<?php echo $tab1_id; ?>"><?php echo $tab1_title; ?></a>
            </li>
            <?php endif; ?>
            <?php if (!empty($tab2_title) && isset($tab2_title)): ?>
            <li role="presentation" class="col-xs-12 col-sm-4 col-lg-4 nopadding">
                <a data-toggle="tab" href="#<?php echo $tab2_id; ?>" role="tab" aria-controls="<?php echo $tab2_id; ?>"><?php echo $tab2_title; ?></a>
            </li>
            <?php endif; ?>
            <?php if (!empty($tab3_title) && isset($tab3_title)): ?>
            <li role="presentation" class="col-xs-12 col-sm-4 col-lg-4 nopadding">
                <a data-toggle="tab" href="#<?php echo $tab3_id; ?>" role="tab" aria-controls="<?php echo $tab3_id; ?>"><?php echo $tab3_title; ?></a>
            </li>
            <?php endif; ?>
        </ul>
        <?php

        if (!empty($tab1_title) && isset($tab1_title)):
        ?>
        <div class="tab-content">
            <div id="<?php echo $tab1_id; ?>" role="tabpanel" class="tab-pane fade active in">
                <?php
                $tab1_args = array(
                    'order'             => 'DESC',
                    'posts_per_page'    => $tab_count,
                    'meta_key'          => 'nava_post_views_count',
                    'orderby'           => 'meta_value_num'
                );
				add_filter('posts_where', 'filter_1_days_ago');
                $tab1_q = new WP_Query( $tab1_args );
				remove_filter('posts_where', 'filter_1_days_ago');
                if ($tab1_q->have_posts()):
                    while($tab1_q->have_posts()):
                        $tab1_q->the_post();
                        $post_meta = get_post_meta(get_the_ID(), 'postSupTitle', true);
                ?>
                <div class="k-s-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail( get_the_ID(), 'nava_image_s', array('class' => 'img-responsive', 'alt' => get_the_title()) ); ?>
                        <div class="k-s-itemdesc">
                            <!--<p class="k-s-uptitle"><?php //echo $post_meta; ?></p>-->
                            <h3 class="k-s-title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>


        </div>
        <?php
        endif;

        if (!empty($tab2_title) && isset($tab2_title)):
        ?>
        <div class="tab-content">
            <div id="<?php echo $tab2_id; ?>" role="tabpanel" class="tab-pane fade">
                <?php
                $tab2_args = array(
                    'order'             => 'DESC',
                    'posts_per_page'    => $tab_count,
                    'meta_key'          => 'nava_post_views_count',
                    'orderby'           => 'meta_value_num'
                );
				add_filter('posts_where', 'filter_7_days_ago');
                $tab2_q = new WP_Query( $tab2_args );
				remove_filter('posts_where', 'filter_7_days_ago');
                if ($tab2_q->have_posts()):
                    while($tab2_q->have_posts()):
                        $tab2_q->the_post();
                        $post_meta = get_post_meta(get_the_ID(), 'postSupTitle', true);
                        ?>
                        <div class="k-s-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(get_the_ID(),'nava_image_s', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                                <div class="k-s-itemdesc">
                                    <!--<p class="k-s-uptitle"><?php // echo $post_meta; ?></p>-->
                                    <h3 class="k-s-title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <?php
        endif;

        if (!empty($tab3_title) && isset($tab3_title)):
        ?>
        <div class="tab-content">
            <div id="<?php echo $tab3_id; ?>" role="tabpanel" class="tab-pane fade">
                <?php
                $tab3_args = array(
                    'order'             => 'DESC',
                    'posts_per_page'    => $tab_count,
                    'meta_key'          => 'nava_post_views_count',
                    'orderby'           => 'meta_value_num',
                );
				add_filter('posts_where', 'filter_30_days_ago');
                $tab3_q = new WP_Query( $tab3_args );
				remove_filter('posts_where', 'filter_30_days_ago');
                if ($tab3_q->have_posts()):
                    while($tab3_q->have_posts()):
                        $tab3_q->the_post();
                        $post_meta = get_post_meta(get_the_ID(), 'postSupTitle', true);
                        ?>
                        <div class="k-s-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(get_the_ID(),'nava_image_s', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
                                <div class="k-s-itemdesc">
                                    <!--<p class="k-s-uptitle"><?php //echo $post_meta; ?></p>-->
                                    <h3 class="k-s-title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <?php
        endif;
        echo "</div>";
        echo $after_widget;

    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title']          = apply_filters('widget_title', $new_instance['title']);

        $instance['tab1_title']     = strip_tags($new_instance['tab1_title']);
        $instance['tab2_title']     = strip_tags($new_instance['tab2_title']);
        $instance['tab3_title']     = strip_tags($new_instance['tab3_title']);

        $instance['count']      = strip_tags($new_instance['count']);
        $instance['tab1_id']        = strip_tags($new_instance['tab1_id']);
        $instance['tab2_id']        = strip_tags($new_instance['tab2_id']);
        $instance['tab3_id']        = strip_tags($new_instance['tab3_id']);

        $instance['tab1_days']      = strip_tags($new_instance['tab1_days']);
        $instance['tab2_days']      = strip_tags($new_instance['tab2_days']);
        $instance['tab3_days']      = strip_tags($new_instance['tab3_days']);
        $instance['offset_top']     = strip_tags($new_instance['offset_top']);
        $instance['offset_bottom']  = strip_tags($new_instance['offset_bottom']);


        return $instance;

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
        }

        if (isset($instance['tab1_title'])) {
            $tab1_title     = strip_tags($instance['tab1_title']);
        }
        if (isset($instance['tab2_title'])) {
            $tab2_title     = strip_tags($instance['tab2_title']);
        }
        if (isset($instance['tab3_title'])) {
            $tab3_title     = strip_tags($instance['tab3_title']);
        }
        if (isset($instance['count'])) {
            $tab_count      = strip_tags($instance['count']);
        }
        if (isset($instance['tab1_id'])) {
            $tab1_id        = strip_tags($instance['tab1_id']);
        }
        if (isset($instance['tab2_id'])) {
            $tab2_id        = strip_tags($instance['tab2_id']);
        }
        if (isset($instance['tab3_id'])) {
            $tab3_id        = strip_tags($instance['tab3_id']);
        }
        if(isset($instance['tab1_days'])) {
            $tab1_days      = strip_tags($instance['tab1_days']);
        }
        if (isset($instance['tab2_days'])) {
            $tab2_days      = strip_tags($instance['tab2_days']);
        }
        if (isset($instance['tab3_days'])) {
            $tab3_days      = strip_tags($instance['tab3_days']);
        }
        if (!empty($instance['offset_top']) && isset($instance['offset_top'])) {
            $offset_top = esc_attr($instance['offset_top']);
        }
        if (!empty($instance['offset_bottom']) && isset($instance['offset_bottom'])) {
            $offset_bottom = esc_attr($instance['offset_bottom']);
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo (!empty($title)) ? $title : '' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab1_title'); ?>"><?php _e('عنوان تب اول'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab1_title'); ?>"
                   name="<?php echo $this->get_field_name('tab1_title'); ?>" type="text"
                   value="<?php echo (!empty($tab1_title)) ? $tab1_title : 'پر بازدید اخیر' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab2_title'); ?>"><?php _e('عنوان تب دوم'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab2_title'); ?>"
                   name="<?php echo $this->get_field_name('tab2_title'); ?>" type="text"
                   value="<?php echo (!empty($tab2_title)) ? $tab2_title : 'پر بازدید هفته' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab3_title'); ?>"><?php _e('عنوان تب سوم'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab3_title'); ?>"
                   name="<?php echo $this->get_field_name('tab3_title'); ?>" type="text"
                   value="<?php echo (!empty($tab3_title)) ? $tab3_title : 'پر بازدید ماه' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab1_id'); ?>"><?php _e('شناسه تب اول (لاتین)'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab1_id'); ?>"
                   name="<?php echo $this->get_field_name('tab1_id'); ?>" type="text"
                   value="<?php echo (!empty($tab1_id)) ? $tab1_id : 'tab1' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab2_id'); ?>"><?php _e('شناسه تب دوم (لاتین)'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab2_id'); ?>"
                   name="<?php echo $this->get_field_name('tab2_id'); ?>" type="text"
                   value="<?php echo (!empty($tab2_id)) ? $tab2_id : 'tab2' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab3_id'); ?>"><?php _e('شناسه تب سوم (لاتین)'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tab3_id'); ?>"
                   name="<?php echo $this->get_field_name('tab3_id'); ?>" type="text"
                   value="<?php echo (!empty($tab3_id)) ? $tab3_id : 'tab3' ; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($tab_count) ? $tab_count : '4'; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab1_days'); ?>"><?php _e('تعداد روزهای نمایش مطلب تب اول'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('tab1_days'); ?>"
                   name="<?php echo $this->get_field_name('tab1_days'); ?>" type="number"
                   value="<?php echo !empty($tab1_days) ? $tab1_days : '2'; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab2_days'); ?>"><?php _e('تعداد روزهای نمایش مطلب تب دوم'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('tab2_days'); ?>"
                   name="<?php echo $this->get_field_name('tab2_days'); ?>" type="number"
                   value="<?php echo !empty($tab2_days) ? $tab2_days : '7'; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('tab3_days'); ?>"><?php _e('تعداد روزهای نمایش مطلب تب سوم'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('tab3_days'); ?>"
                   name="<?php echo $this->get_field_name('tab3_days'); ?>" type="number"
                   value="<?php echo !empty($tab3_days) ? $tab3_days : '30'; ?>"/>
        </p>
		        <p>
            <label for="<?php echo $this->get_field_id('offset_top'); ?>"><?php _e('آفست بالا: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_top'); ?>"
                   name="<?php echo $this->get_field_name('offset_top'); ?>" type="number"
                   value="<?php echo !empty($offset_top) ? $offset_top : '920'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_bottom'); ?>"><?php _e('آفست پایین: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_bottom'); ?>"
                   name="<?php echo $this->get_field_name('offset_bottom'); ?>" type="number"
                   value="<?php echo !empty($offset_bottom) ? $offset_bottom : '920'; ?>" />
        </p>


        <?php
    }
}
/** End */

/** NAVA notes widget */
class nava_notes_widget extends WP_Widget {

    public function __construct()
    {
        // stl -> small thumb row
        parent::__construct(
            'nava_notes_widget',
            __('ابزارک نمایش آخرین یادداشت ها', 'nava'),
            array(
                'classname' => 'nava_nw_widget aside-block-rows',
                'description' => __('نمایش آخرین یادداشت ها در سایدار به صورت ابزارک', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');
    }

    public function widget($args, $instance)
    {

        extract($args);

        $title          = apply_filters('widget_title', $instance['title']);
        $count          = $instance['count'];
        $more_link      = $instance['more_link'];
        $more_title     = $instance['more_title'];
        $icon_class     = $instance['icon_class'];
        $offset_top     = $instance['offset_top'];
        $offset_bottom  = $instance['offset_bottom'];

        $args = array(
            "posts_per_page"    => $count,
            "order"             => "DESC",
            'orderby'           => 'date',
            "category_name"     => 'notes',
        );
        echo '<div class="k-notes k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12" data-spy="affix" data-offset-top="'. $offset_top .'" data-offset-bottom="' . $offset_bottom . '">';
        echo '<div class="row nopadding k-title-row">
                  <div class="col-xs-12">
                    <h2 class="k-title-text">' . $title . '</h2>

                  </div>
            </div>';
        $query = new WP_Query( $args );
        if ($query->have_posts()):
            $first = true;
            $even_odd_class = 'even';
            while ($query->have_posts()):
                $query->the_post();
                $post_id = get_the_ID();
                $sup_title = get_post_meta($post_id, 'postSupTitle', true);
                echo '<div class="k-s-item ' . ($first == true) ? 'firstitem' : '' . '">
                      <a href="' . get_the_permalink() . '">';
                if ($first == true) {
                    echo get_the_post_thumbnail($post_id, 'nava_image_m', array('class' => 'img-responsive', 'alt' => get_the_title($post_id)));
                } else {
                    echo get_the_post_thumbnail($post_id, 'nava_image_s', array('class' => 'img-responsive', 'alt' => get_the_title($post_id)));
                }
                echo '<div class="k-s-itemdesc">
                      <p class="k-s-uptitle">'.esc_attr($sup_title).'</p>
                      <h3 class="k-s-title">'.get_the_title().'</h3>
                    </div>
                  </a>
                </div>';
                $first = false;
            endwhile;
        endif;

        echo "</div>";

        echo $after_widget;

    }

    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['count'] = strip_tags($new_instance['count']);
        $instance['more_link'] = strip_tags($new_instance['more_link']);
        $instance['more_title'] = strip_tags($new_instance['more_title']);
        $instance['icon_class'] = strip_tags($new_instance['icon_class']);
        $instance['offset_top']     = strip_tags($new_instance['offset_top']);
        $instance['offset_bottom']  = strip_tags($new_instance['offset_bottom']);

        return $instance;

    }

    public function form($instance)
    {

        if (!empty($instance['title']) && isset($instance['title'])) {
            $title = strip_tags(esc_attr($instance['title']));
        }
        if (!empty($instance['count']) && isset($instance['count'])) {
            $count = esc_attr($instance['count']);
        }
        if (!empty($instance['more_link']) && isset($instance['more_link'])) {
            $more_link = esc_url($instance['more_link']);
        }
        if (!empty($instance['more_title']) && isset($instance['more_title'])) {
            $more_title = esc_attr($instance['more_title']);
        }
        if (!empty($instance['icon_class']) && isset($instance['icon_class'])) {
            $icon_class = esc_attr($instance['icon_class']);
        }
        if (!empty($instance['offset_top']) && isset($instance['offset_top'])) {
            $offset_top = esc_attr($instance['offset_top']);
        }
        if (!empty($instance['offset_bottom']) && isset($instance['offset_bottom'])) {
            $offset_bottom = esc_attr($instance['offset_bottom']);
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php
            echo (!empty($title)) ? $title : 'یادداشت ها'; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('more_title'); ?>"><?php _e('عنوان مشاهده بیشتر'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('more_title'); ?>"
                   name="<?php echo $this->get_field_name('more_title'); ?>" type="text"
                   value="<?php echo (!empty($more_title)) ? $more_title : '' ; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('more_link'); ?>"><?php _e('لینک مشاهده بیشتر'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('more_link'); ?>"
                   name="<?php echo $this->get_field_name('more_link'); ?>" type="text"
                   value="<?php echo (!empty($more_link)) ? $more_link : '' ; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class'); ?>"><?php _e('کلاس آیکون'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>"
                   name="<?php echo $this->get_field_name('icon_class'); ?>" type="text"
                   value="<?php echo (!empty($icon_class)) ? $icon_class : '' ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد: '); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($count) ? $count : '6'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_top'); ?>"><?php _e('آفست بالا: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_top'); ?>"
                   name="<?php echo $this->get_field_name('offset_top'); ?>" type="number"
                   value="<?php echo !empty($offset_top) ? $offset_top : '920'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_bottom'); ?>"><?php _e('آفست پایین: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_bottom'); ?>"
                   name="<?php echo $this->get_field_name('offset_bottom'); ?>" type="number"
                   value="<?php echo !empty($offset_bottom) ? $offset_bottom : '920'; ?>" />
        </p>
        <?php
    }

}
/** End */

/** NAVA category row widget small image */
class nava_category_widget extends WP_Widget {
    public function __construct()
    {
        // stl -> small thumb row
        parent::__construct(
            'nava_category_widget',
            __('ابزارک نمایش آخرین مطالب یک دسته بندی', 'nava'),
            array(
                'classname' => 'nava_cw_widget aside-block-rows',
                'description' => __('نمایش آخرین های یک دسته بندی خاط در سایدار به صورت ابزارک', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');
    }

    public function widget($args, $instance)
    {

        extract($args);

        $title          = apply_filters('widget_title', $instance['title']);
        $count          = $instance['count'];
        $more_link      = $instance['more_link'];
        $more_title     = $instance['more_title'];
        $icon_class     = $instance['icon_class'];
        $category       = $instance['category'];
        $isFirstBig     = $instance['isFirstBig'] ? true : false;
        $wrap_class     = $instance['wrap_class'];
        $offset_top     = $instance['offset_top'];
        $offset_bottom  = $instance['offset_bottom'];

        $args = array(
            "posts_per_page"    => $count,
            "order"             => "DESC",
            'orderby'           => 'date',
            "category_name"     => strip_tags(esc_attr($category)),
        );
        echo '<div class="';
        echo (!empty($wrap_class)) ? $wrap_class : '';
        echo ' k-side-box col-md-12 col-sm-12 col-xs-12 col-lg-12" ';
        if ($offset_bottom != '' && $offset_top != ''):
            echo 'data-spy="affix" data-offset-top="' . $offset_top . '" data-offset-bottom="' . $offset_bottom . '"';
        endif;
        echo '>';
        echo '<div class="row nopadding k-title-row">
                  <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <h2 class="k-title-text">' . $title . '</h2>

                  </div>
            </div>';
        $query = new WP_Query( $args );
        if ($query->have_posts()):


            while ($query->have_posts()):
                $query->the_post();
                $post_id = get_the_ID();
                $sup_title = get_post_meta($post_id, 'postSupTitle', true);
                if ($isFirstBig == true) {
                    echo '<div class="k-s-item firstitem">
                      <a href="' . get_the_permalink() . '">';

                } else {
                    echo '<div class="k-s-item ">
                      <a href="' . get_the_permalink() . '">';

                }

                if ($isFirstBig == true) {
                    echo get_the_post_thumbnail($post_id, 'nava_image_m', array('class' => 'img-responsive', 'alt' => get_the_title() ));
                    $isFirstBig = false;
                } else {
                    echo get_the_post_thumbnail($post_id, 'nava_image_s', array('class' => 'img-responsive', 'alt' => get_the_title() ));
                }
                echo '<div class="k-s-itemdesc">
                      <p class="k-s-uptitle">'.esc_attr($sup_title).'</p>
                      <h3 class="k-s-title">'.get_the_title().'</h3>
                    </div>
                  </a>
                </div>';

            endwhile;
        endif;

        echo "</div>";

        echo $after_widget;

    }

    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title']          = strip_tags($new_instance['title']);
        $instance['count']          = strip_tags($new_instance['count']);
        $instance['more_link']      = strip_tags($new_instance['more_link']);
        $instance['more_title']     = strip_tags($new_instance['more_title']);
        $instance['icon_class']     = strip_tags($new_instance['icon_class']);
        $instance['category']       = strip_tags($new_instance['category']);
        $instance['offset_top']     = strip_tags($new_instance['offset_top']);
        $instance['offset_bottom']  = strip_tags($new_instance['offset_bottom']);
        $instance['isFirstBig']     = strip_tags($new_instance['isFirstBig']);
        $instance['wrap_class']     = strip_tags($new_instance['wrap_class']);


        return $instance;

    }

    public function form($instance)
    {

        if (!empty($instance['title']) && isset($instance['title'])) {
            $title = strip_tags(esc_attr($instance['title']));
        }
        if (!empty($instance['count']) && isset($instance['count'])) {
            $count = esc_attr($instance['count']);
        }
        if (!empty($instance['more_link']) && isset($instance['more_link'])) {
            $more_link = esc_url($instance['more_link']);
        }
        if (!empty($instance['more_title']) && isset($instance['more_title'])) {
            $more_title = esc_attr($instance['more_title']);
        }
        if (!empty($instance['icon_class']) && isset($instance['icon_class'])) {
            $icon_class = esc_attr($instance['icon_class']);
        }
        if (!empty($instance['category']) && isset($instance['category'])) {
            $category = esc_attr($instance['category']);
        }
        if (!empty($instance['offset_top']) && isset($instance['offset_top'])) {
            $offset_top = esc_attr($instance['offset_top']);
        }
        if (!empty($instance['offset_bottom']) && isset($instance['offset_bottom'])) {
            $offset_bottom = esc_attr($instance['offset_bottom']);
        }

        if (!empty($instance['wrap_class']) && isset($instance['wrap_class'])) {
            $wrap_class = esc_attr($instance['wrap_class']);
        }

        if (!empty($instance['isFirstBig']) && isset($instance['isFirstBig'])) {
            $isFirstBig = esc_attr($instance['isFirstBig']);
        } else {
            $isFirstBig = 'on';
        }


        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php
            echo (!empty($title)) ? $title : 'یادداشت ها'; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('more_title'); ?>"><?php _e('عنوان مشاهده بیشتر'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('more_title'); ?>"
                   name="<?php echo $this->get_field_name('more_title'); ?>" type="text"
                   value="<?php echo (!empty($more_title)) ? $more_title : '' ; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('more_link'); ?>"><?php _e('لینک مشاهده بیشتر'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('more_link'); ?>"
                   name="<?php echo $this->get_field_name('more_link'); ?>" type="text"
                   value="<?php echo (!empty($more_link)) ? $more_link : '' ; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class'); ?>"><?php _e('کلاس آیکون'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>"
                   name="<?php echo $this->get_field_name('icon_class'); ?>" type="text"
                   value="<?php echo (!empty($icon_class)) ? $icon_class : '' ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد: '); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($count) ? $count : '6'; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('دسته بندی: '); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>"
                   name="<?php echo $this->get_field_name('category'); ?>" type="text"
                   value="<?php echo !empty($category) ? $category : 'news'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_top'); ?>"><?php _e('آفست بالا: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_top'); ?>"
                   name="<?php echo $this->get_field_name('offset_top'); ?>" type="number"
                   value="<?php echo !empty($offset_top) ? $offset_top : ''; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_bottom'); ?>"><?php _e('آفست پایین: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_bottom'); ?>"
                   name="<?php echo $this->get_field_name('offset_bottom'); ?>" type="number"
                   value="<?php echo !empty($offset_bottom) ? $offset_bottom : ''; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('wrap_class'); ?>"><?php _e('کلاس اصلی: '); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('wrap_class'); ?>"
                   name="<?php echo $this->get_field_name('wrap_class'); ?>" type="text"
                   value="<?php echo !empty($wrap_class) ? $wrap_class : ''; ?>" />
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'isFirstBig' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'isFirstBig' ); ?>" name="<?php echo $this->get_field_name( 'isFirstBig' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'isFirstBig' ); ?>">اولین آیتم بزرگ باشد</label>
        </p>

        <?php
    }
}
/** End */

/** NAVA top 10 musics widget */
class nava_top10_music_widget extends WP_Widget {
    public function __construct()
    {
        // stl -> small thumb row
        parent::__construct(
            'nava_top10_music_widget',
            __('ابزارک نمایش 10 موسیقی برتر', 'nava'),
            array(
                'classname' => 'nava_t10_widget aside-block-rows',
                'description' => __('نمایش آخرین موسیقی های برتر از سوی کاربران', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');
    }
    public function widget($args, $instance)
    {

        extract($args);

        $title          = apply_filters('widget_title', $instance['title']);
        $count          = $instance['count'];
        $icon_class     = $instance['icon_class'];
        $offset_top     = $instance['offset_top'];
        $offset_bottom  = $instance['offset_bottom'];

        $args = array(
            "posts_per_page"    => $count,
            "order"             => "DESC",
            'orderby'           => 'date',
            "post_type"         => 'music'
        );
        echo '<div class="k-music-top10 k-notes k-side-box affix-top col-xs-12" data-spy="affix" data-offset-top="' . $offset_top . '" data-offset-bottom="' . $offset_bottom . '">';
        echo '<div class="k-title-row">

                <h2 class="k-title-text"><i class="fa ';
        echo (!empty($icon_class)) ? $icon_class : 'fa-star';
        echo '" aria-hidden="true"></i>  ' . $title . '</h2>
            </div>';
        echo '<div class="top10-items-box">';
        $query = get_most_viewd_musics( 10 );
		//print_r($query);

        if (count($query > 0)):
            $percent = 100;
            $count = 1;
            foreach ($query as $k => $v):
				$post_id = $v->post_id;
                $post_meta = get_post_meta($post_id);
                echo '<div class="top10-item"><a href="'.get_the_permalink($post_id).'">
                        <div class="top10-inneritem" style="width:'.$percent.'%;">
                        <div id="bar-';
                echo $count;
                echo '" class="bars">
                        ';
                echo get_the_post_thumbnail($post_id, 'nava_music_xs', array('class' => 'img-responsive', 'alt' => get_the_title($post_id)));
                echo    '<div><h3>';
                echo (!empty($post_meta["musicName"][0])) ? $post_meta["musicName"][0] : "" ;
                echo '</h3><h4>';
                echo (!empty($post_meta["gArtistName"])) ? implode("، ", get_artist_name_by_id($post_meta["gArtistName"])) : "";
                echo    '</h4></div>
                        </div>
                        </div></a>
                      </div>';
                $percent -= 5;
            $count++;
            endforeach;
        echo "</div>";
        endif;

        echo "</div>";

        echo $after_widget;

    }
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title']          = strip_tags($new_instance['title']);
        $instance['count']          = strip_tags($new_instance['count']);
        $instance['icon_class']     = strip_tags($new_instance['icon_class']);
        $instance['offset_top']     = strip_tags($new_instance['offset_top']);
        $instance['offset_bottom']  = strip_tags($new_instance['offset_bottom']);

        return $instance;

    }

    public function form($instance)
    {

        if (!empty($instance['title']) && isset($instance['title'])) {
            $title = strip_tags(esc_attr($instance['title']));
        }
        if (!empty($instance['count']) && isset($instance['count'])) {
            $count = esc_attr($instance['count']);
        }
        if (!empty($instance['icon_class']) && isset($instance['icon_class'])) {
            $icon_class = esc_attr($instance['icon_class']);
        }
        if (!empty($instance['offset_top']) && isset($instance['offset_top'])) {
            $offset_top = esc_attr($instance['offset_top']);
        }
        if (!empty($instance['offset_bottom']) && isset($instance['offset_bottom'])) {
            $offset_bottom = esc_attr($instance['offset_bottom']);
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php
            echo (!empty($title)) ? $title : '10 آهنگ برتر'; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class'); ?>"><?php _e('کلاس آیکون'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>"
                   name="<?php echo $this->get_field_name('icon_class'); ?>" type="text"
                   value="<?php echo (!empty($icon_class)) ? $icon_class : '' ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد: '); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($count) ? $count : '10'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_top'); ?>"><?php _e('آفست بالا: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_top'); ?>"
                   name="<?php echo $this->get_field_name('offset_top'); ?>" type="number"
                   value="<?php echo !empty($offset_top) ? $offset_top : '645'; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset_bottom'); ?>"><?php _e('آفست پایین: '); ?></label>
            <input class="medium-text" id="<?php echo $this->get_field_id('offset_bottom'); ?>"
                   name="<?php echo $this->get_field_name('offset_bottom'); ?>" type="number"
                   value="<?php echo !empty($offset_bottom) ? $offset_bottom : '495'; ?>" />
        </p>

        <?php
    }
}
/** End */
/** concert widgets */
class nava_concert_widget extends WP_Widget {
    public function __construct()
    {
        // stl -> small thumb row
        parent::__construct(
            'nava_concert_widget',
            __('ابزارک نمایش آخرین کنسرت ها', 'nava'),
            array(
                'classname' => 'nava_concert_widget aside-block-rows',
                'description' => __('نمایش آخرین کنسرت ها', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');
    }
    public function widget($args, $instance)
    {

        extract($args);

        $title          = apply_filters('widget_title', $instance['title']);
        $count          = $instance['count'];
        $icon_class     = $instance['icon_class'];

        global $post;

        $args = array(
            "posts_per_page"    => $count,
            "order"             => "DESC",
            'orderby'           => 'date',
            "post_type"         => 'concert',
            'post__not_in'      => array($post->ID)
        );
?>

        <?php
        echo '<div class="k-other-concert k-side-box">';
        echo '<div class="k-title-row">
                <h2 class="k-title-text">';

         if(!empty($icon_class)): echo '<i class="fa ';
        echo $icon_class;
        echo '" aria-hidden="true"></i>  ';
             endif;
         echo $title . '</h2>
            </div>';

        $query = new WP_Query( $args );
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
				$post_meta = get_post_meta(get_the_ID());
                echo '<div class="k-s-item">
<a href="'.get_the_permalink().'">';

                echo get_the_post_thumbnail(get_the_ID(), 'nava_image_s', array('class' => 'img-responsive'));
                echo '<div class="k-s-itemdesc">';
echo '<h4 class="k-s-title">'.get_the_title(get_the_ID()).'</h4>';
                echo '<time datetime="'.get_the_date("Y-m-d H:i:s").'">';
                echo '<span>'.$post_meta['concertPlaceName'][0].'</span>';
                echo '</time>';
                echo '</div>';
                echo '</a>
                  </div>';
            endwhile;

        endif;
        echo "</div>";
        echo "</div>";

        echo $after_widget;

    }
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title']          = strip_tags($new_instance['title']);
        $instance['count']          = strip_tags($new_instance['count']);
        $instance['icon_class']     = strip_tags($new_instance['icon_class']);

        return $instance;

    }

    public function form($instance)
    {

        if (!empty($instance['title']) && isset($instance['title'])) {
            $title = strip_tags(esc_attr($instance['title']));
        }
        if (!empty($instance['count']) && isset($instance['count'])) {
            $count = esc_attr($instance['count']);
        }
        if (!empty($instance['icon_class']) && isset($instance['icon_class'])) {
            $icon_class = esc_attr($instance['icon_class']);
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php
            echo (!empty($title)) ? $title : 'آخرین کنسرت ها'; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class'); ?>"><?php _e('کلاس آیکون'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>"
                   name="<?php echo $this->get_field_name('icon_class'); ?>" type="text"
                   value="<?php echo (!empty($icon_class)) ? $icon_class : '' ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد: '); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($count) ? $count : '10'; ?>" />
        </p>

        <?php
    }
}
/** End */
/** Reviews widget */
class nava_reviews_widget extends WP_Widget {
    public function __construct()
    {
        // stl -> small thumb row
        parent::__construct(
            'nava_reviews_widget',
            __('ابزارک نمایش آخرین نقد و بررسی ها', 'nava'),
            array(
                'classname' => 'nava_reviews_widget aside-block-rows',
                'description' => __('نمایش آخرین نقد و بررسی ها', 'nava')
            )
        );

        load_plugin_textdomain('nava', false, basename(dirname(__FILE__)) . '/languages');
    }
    public function widget($args, $instance)
    {

        extract($args);

        $title          = apply_filters('widget_title', $instance['title']);
        $count          = $instance['count'];
        $icon_class     = $instance['icon_class'];

        global $post;

        $args = array(
            "posts_per_page"    => $count,
            "order"             => "DESC",
            'orderby'           => 'date',
            "post_type"         => 'reviews',
            'post__not_in'      => array($post->ID)
        );
        ?>

        <?php
        echo '<div class="k-other-concert k-side-box">';
        echo '<div class="k-title-row">
                <h2 class="k-title-text">';

        if(!empty($icon_class)): echo '<i class="fa ';
            echo $icon_class;
            echo '" aria-hidden="true"></i>  ';
        endif;
        echo $title . '</h2>
            </div>';

        $query = new WP_Query( $args );
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $post_meta = get_post_meta(get_the_ID());
                echo '<div class="k-s-item">
                <a href="'.get_the_permalink().'">';
                echo get_the_post_thumbnail(get_the_ID(), 'nava_music_thumbnail', array('class' => 'img-responsive'));
                echo '<div class="k-s-itemdesc">';
                echo (!empty($post_meta['reviewSupTitle'])) ? '<h3 class="k-s-uptitle">'.$post_meta['reviewSupTitle'][0].'</h3>' : '';
                echo '<h4 class="k-s-title">'.get_the_title(get_the_ID()).'</h4>';
                echo '</div>';
                echo '</a>
                  </div>';
            endwhile;

        endif;
        echo "</div>";
        echo "</div>";

        echo $after_widget;

    }
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title']          = strip_tags($new_instance['title']);
        $instance['count']          = strip_tags($new_instance['count']);
        $instance['icon_class']     = strip_tags($new_instance['icon_class']);

        return $instance;

    }

    public function form($instance)
    {

        if (!empty($instance['title']) && isset($instance['title'])) {
            $title = strip_tags(esc_attr($instance['title']));
        }
        if (!empty($instance['count']) && isset($instance['count'])) {
            $count = esc_attr($instance['count']);
        }
        if (!empty($instance['icon_class']) && isset($instance['icon_class'])) {
            $icon_class = esc_attr($instance['icon_class']);
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php
            echo (!empty($title)) ? $title : 'آخرین نقدوبررسی ها'; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class'); ?>"><?php _e('کلاس آیکون'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>"
                   name="<?php echo $this->get_field_name('icon_class'); ?>" type="text"
                   value="<?php echo (!empty($icon_class)) ? $icon_class : '' ; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('تعداد: '); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number"
                   value="<?php echo !empty($count) ? $count : '10'; ?>" />
        </p>

        <?php
    }
}
/** End */
