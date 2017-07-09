<?php

/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class Nava_Admin {
    /**
     * Option key, and option page slug
     * @var string
     */
    protected $key = 'nava_options';
    /**
     * Options page metabox id
     * @var string
     */
    protected $metabox_id = 'nava_option_metabox';
    /**
     * Options Page title
     * @var string
     */
    protected $title = '';
    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';
    /**
     * Holds an instance of the object
     *
     * @var Nava_Admin
     */
    protected static $instance = null;
    /**
     * Returns the running object
     *
     * @return Nava_Admin
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
            self::$instance->hooks();
        }
        return self::$instance;
    }
    /**
     * Constructor
     * @since 0.1.0
     */
    protected function __construct() {
        // Set our title
        $this->title = __( 'تنظیمات قالب', 'nava' );
    }
    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
    }
    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }
    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
        // Include CMB CSS in the head to avoid FOUC
        add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
    }
    /**
     * Admin page markup. Mostly handled by CMB2
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb2-options-page <?php echo $this->key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
        </div>
        <?php
    }
    /**
     * Add the options metabox to the array of metaboxes
     * @since  0.1.0
     */
    function add_options_page_metabox() {
        // hook in our save notices
        add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
        $cmb = new_cmb2_box( array(
            'id'         => $this->metabox_id,
            'hookup'     => false,
            'cmb_styles' => false,
            'show_on'    => array(
                // These are important, don't remove
                'key'   => 'options-page',
                'value' => array( $this->key, )
            ),
        ) );
        // Set our CMB2 fields
        $group_field_id = $cmb->add_field( array(
            'id'          => 'header_section',
            'type'        => 'group',
             'repeatable'  => false, // use false if you want non-repeatable group.
            'options'     => array(
                'group_title'   => "تنظیمات هدر", // since version 1.1.4, {#} gets replaced by row number
                'closed'     => true,
            ),
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'header_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $group_field_id, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 60*468 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'header_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $group_field_id, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک را فعال کنید',
            'id'   => 'header_check_javasript',
            'type' => 'checkbox',
        ) );
        $cmb->add_group_field( $group_field_id, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'header_javascript',
            'type' => 'textarea'
        ) );

        $cmb->add_field( array(
            'name' => '------------------------------------------------------------',
            'type' => 'title',
            'id'   => 'dassssh'
        ) );

        $cmb->add_field( array(
            'name' => 'بنر های صفحه اصلی',
            'type' => 'title',
            'id'   => 'nava_home_banner'
        ) );

        $homebanner = $cmb->add_field( array(
            'id'          => 'home_banner',
            'type'        => 'group',
            'repeatable'  => false,
            'options'     => array(
                'group_title'   => "بنر میانه صفحه اصلی",
                'closed'     => true,
            ),
        ) );
        $cmb->add_group_field( $homebanner, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'home_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $homebanner, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 60*940 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'home_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $homebanner, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک را فعال کنید',
            'id'   => 'home_check_javasript',
            'type' => 'checkbox',
        ) );
        $cmb->add_group_field( $homebanner, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'home_javascript',
            'type' => 'textarea'
        ) );

        $homearticlebanner = $cmb->add_field( array(
            'id'          => 'home_article_banner',
            'type'        => 'group',
            'repeatable'  => false,
            'options'     => array(
                'group_title'   => "بنر بالای بست ها",
                'closed'     => true,
            ),
        ) );
        $cmb->add_group_field( $homearticlebanner, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'home_article_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $homearticlebanner, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 90*728 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'home_article_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $homearticlebanner, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک را فعال کنید',
            'id'   => 'home_article_check_javasript',
            'type' => 'checkbox',
        ) );
        $cmb->add_group_field( $homearticlebanner, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'home_article_javascript',
            'type' => 'textarea'
        ) );

        $homesidebar_group = $cmb->add_field( array(
            'id'          => 'homesidebar_group',
            'type'        => 'group',
            'description' => '',
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => "بنر سایدبار صفحه اصلی {#}",
                'add_button'    => "افزودن بنر سایدبار صفحه اصلی جدید",
                'remove_button' => "حذف بنر سایدبار صفحه اصلی",
                'sortable'      => true, // beta
                'closed'         => true,
            ),
        ) );
        $cmb->add_group_field( $homesidebar_group, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'homesidebar_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $homesidebar_group, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 60*300 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'homesidebar_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $homesidebar_group, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک مربوطه را فعال کنید',
            'id'   => 'homesidebar_check_javasript',
            'type' => 'radio_inline',
            'options' => array(
                'yes' => __( 'بله', 'cmb2' ),
                'no'   => __( 'خیر', 'cmb2' ),
            ),
            'default' => 'no',
        ) );
        $cmb->add_group_field( $homesidebar_group, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'homesidebar_javascript',
            'type' => 'textarea'
        ) );

        $cmb->add_field( array(
            'name' => '------------------------------------------------------------',
            'type' => 'title',
            'id'   => 'dasssh'
        ) );

        $cmb->add_field( array(
            'name' => 'بنر سایدبار صفحات مشترک',
            'type' => 'title',
            'id'   => 'commonsidebar'
        ) );
        $sidebar_group = $cmb->add_field( array(
            'id'          => 'sidebar_group',
            'type'        => 'group',
            'description' => '',
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => "بنر سایدبار صفحات مشترک {#}",
                'add_button'    => "افزودن بنر سایدبار صفحات مشترک جدید",
                'remove_button' => "حذف بنر",
                'sortable'      => true, // beta
                'closed'         => true,
            ),
        ) );
        $cmb->add_group_field( $sidebar_group, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'sidebar_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $sidebar_group, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 60*300 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'sidebar_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $sidebar_group, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک مربوطه را فعال کنید',
            'id'   => 'sidebar_check_javasript',
            'type' => 'radio_inline',
            'options' => array(
                'yes' => __( 'بله', 'cmb2' ),
                'no'   => __( 'خیر', 'cmb2' ),
            ),
            'default' => 'no',
        ) );
        $cmb->add_group_field( $sidebar_group, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'sidebar_javascript',
            'type' => 'textarea'
        ) );

        $cmb->add_field( array(
            'name' => '------------------------------------------------------------',
            'type' => 'title',
            'id'   => 'dasssssh'
        ) );

        $cmb->add_field( array(
            'name' => 'بنر پست های اخبار',
            'type' => 'title',
            'id'   => 'newbanners'
        ) );
        $singlepost = $cmb->add_field( array(
            'id'          => 'singlepost',
            'type'        => 'group',
            'description' => '',
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => "بنر 728 پس از نویسنده - شماره {#}",
                'add_button'    => "افزودن بنر سایدبار صفحات مشترک جدید",
                'remove_button' => "حذف بنر",
                'sortable'      => true, // beta
                'closed'         => true,
            ),
        ) );
        $cmb->add_group_field( $singlepost, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'singlepost_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $singlepost, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 90*728 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'singlepost_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $singlepost, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک مربوطه را فعال کنید',
            'id'   => 'singlepost_check_javasript',
            'type' => 'radio_inline',
            'options' => array(
                'yes' => __( 'بله', 'cmb2' ),
                'no'   => __( 'خیر', 'cmb2' ),
            ),
            'default' => 'no',
        ) );
        $cmb->add_group_field( $singlepost, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'singlepost_javascript',
            'type' => 'textarea'
        ) );

        $singlepost_after = $cmb->add_field( array(
            'id'          => 'singlepost_after',
            'type'        => 'group',
            'repeatable'  => false, // use false if you want non-repeatable group.
            'options'     => array(
                'group_title'   => "بنر 728 پس از مطالب مرتبط", // since version 1.1.4, {#} gets replaced by row number
                'closed'     => true,
            ),
        ) );

        $cmb->add_group_field( $singlepost_after, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'singlepost_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $singlepost_after, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 90*728 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'singlepost_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );

        $cmb->add_group_field( $singlepost_after, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک مربوطه را فعال کنید',
            'id'   => 'singlepost_check_javasript',
            'type' => 'radio_inline',
            'options' => array(
                'yes' => __( 'بله', 'cmb2' ),
                'no'   => __( 'خیر', 'cmb2' ),
            ),
            'default' => 'no',
        ) );
        $cmb->add_group_field( $singlepost_after, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'singlepost_javascript',
            'type' => 'textarea'
        ) );

        $cmb->add_field( array(
            'name' => '------------------------------------------------------------',
            'type' => 'title',
            'id'   => 'dassssssh'
        ) );

        $cmb->add_field( array(
            'name' => 'بنر صفحه موسیقی',
            'type' => 'title',
            'id'   => 'musicbanners'
        ) );

        $musicarchive = $cmb->add_field( array(
            'id'          => 'archivemusic',
            'type'        => 'group',
            'description' => '',
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => "بنر 728  - شماره {#}",
                'add_button'    => "افزودن بنر جدید در صفحه موسیقی",
                'remove_button' => "حذف بنر",
                'sortable'      => true, // beta
                'closed'         => true,
            ),
        ) );
        $cmb->add_group_field( $musicarchive, array(
            'name' => 'لینک تبلیغ',
            'id'   => 'music_url_link',
            'type' => 'text_url',
            'default' => '#',
            'desc' => 'درصورتی که از کد جاوا اسکریپت میخواهید استفاده نمایید این فیلد را بصورت # پیش فرض بگذارید',
        ) );
        $cmb->add_group_field( $musicarchive, array(
            'name'    => 'عکس بنر',
            'desc'    => 'بنر خود را با سایز 90*728 آپلود نمایید  /  در صورتی که از کد جاوا اسکریپت استفاده می نمایید این فیلد را خالی بگذارید',
            'id'      => 'music_baner_img',
            'type'    => 'file',
            // Optional:
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'آپلود بنر' // Change upload button text. Default: "Add or Upload File"
            ),
        ) );
        $cmb->add_group_field( $musicarchive, array(
            'name' => 'جاوا اسکریپت ؟',
            'desc' => 'در صورتی که میخواهید از کد جاوا اسکری‍ت استفاده نمایید چک مربوطه را فعال کنید',
            'id'   => 'music_check_javasript',
            'type' => 'radio_inline',
            'options' => array(
                'yes' => __( 'بله', 'cmb2' ),
                'no'   => __( 'خیر', 'cmb2' ),
            ),
            'default' => 'no',
        ) );
        $cmb->add_group_field( $musicarchive, array(
            'name' => 'کد جاوا اسکریپت',
            'id' => 'music_javascript',
            'type' => 'textarea'
        ) );


    }
    /**
     * Register settings notices for display
     *
     * @since  0.1.0
     * @param  int   $object_id Option key
     * @param  array $updated   Array of updated fields
     * @return void
     */
    public function settings_notices( $object_id, $updated ) {
        if ( $object_id !== $this->key || empty( $updated ) ) {
            return;
        }
        add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'nava' ), 'updated' );
        settings_errors( $this->key . '-notices' );
    }
    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {
        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }
        throw new Exception( 'Invalid property: ' . $field );
    }
}
/**
 * Helper function to get/return the Nava_Admin object
 * @since  0.1.0
 * @return Nava_Admin object
 */
function nava_admin() {
    return Nava_Admin::get_instance();
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function nava_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( nava_admin()->key, $key, $default );
    }
    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( nava_admin()->key, $default );
    $val = $default;
    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }
    return $val;
}
// Get it started
nava_admin();