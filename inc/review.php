<?php

class MMTReview {

    private $table_name = '';
    private static $instance;
    public $wp_errors;
    public $review_options = array(
        0   => 'صدای هنرمند',
        1   => 'تنظیم قطعات',
        2   => 'ملودی و آهنگسازی',
        3   => 'میکس و مستر',
        4   => 'ترانه ها'
    );

    public static function get_instance() {
        if (empty(self::$instance)) {
            self::$instance = new MMTReview();
        }
        return self::$instance;
    }

    function __construct()
    {
        global $wpdb;
        $this->wp_errors = new WP_Error();
        if (is_user_logged_in()) {
            add_action("wp_ajax_save_review_rating", array($this, "save_review_rating"));
            add_action("wp_ajax_nopriv_save_review_rating", array($this, "save_review_rating"));
        }



        $this->table_name = $wpdb->prefix . 'review_rating';

        $r1 = $wpdb->get_results("SHOW TABLES LIKE '" . $this->table_name . "'");
        if ($r1 == false) {
            add_action( 'init', array($this, "install_review_rating_table"));
        }
    }


    public function save_review_rating() {

        $errors = array();
        if (!is_user_logged_in()) {
            $errors[] = 'برای ثبت امتیاز ابتدا وارد سایت شوید.';
            echo json_encode($errors);exit;
        }

        $userid = get_current_user_id();
        $postid = (int)$_POST['post_id'];

        if ($this->user_already_voted($postid, $userid)) {
            $errors[] = 'شما قبلا برای این مطلب امتیاز ثبت کرده اید.';
            echo json_encode($errors);exit;
        }

        $ip = $this->get_ip_address();
        if ($ip == '::1') {
            $ip = '127.0.0.1';
        }

        $vars = array();
        for($i = 0 ; $i < count($this->review_options) ; $i++) {
            $var = (isset($_POST['review_opt'.(int)($i+1)]) && !empty($_POST['review_opt'.(int)($i+1)]))
                ? esc_attr($_POST['review_opt'.(int)($i+1)]) : '';
            $vars[] = $var;
            if ( empty($var) ) {
                $errors[] = array($this->review_options[$i] . ' انتخاب نشده است.') ;
            }
        }

        if (empty($errors)) {
            for($i = 0 ; $i < count($this->review_options) ; $i++) {
                $var = esc_attr($_POST['review_opt' . (int)($i + 1)]);

                $inserted = $this->add_vote_to_db(
                    array(
                        'userid'    => $userid,
                        'postid'    => $postid,
                        'opt'       => $i + 1,
                        'value'     => esc_sql($var),
                        'ip'        => sanitize_text_field($ip)
                    )
                );
                if ($inserted) {
                    continue;
                } else {
                    break;
                }
            }

            echo json_encode( $this->get_post_options_avg_result($postid) );
            exit();
        } else {
            echo json_encode( $errors );
            exit();
        }

    }


    /**
     * This function gets total average result for a post with a given specific option
     *
     * @param string $option
     * @param $review_id
     * @return int
     */
    public function vote_option_total_avg($review_id, $option) {
        $sql_text = 'SELECT AVG(value) as avg FROM ' . $this->table_name . ' WHERE opt = %d AND postid = %d';
        global $wpdb;
        $sql = $wpdb->prepare($sql_text, $option, $review_id);
        $result = $wpdb->get_results( $sql );
        if (!empty($result)) {
            return $result[0]->avg;
        }
        return '0.0';
    }



    /**
     * This function will get a query and returns a result from database if exists
     *
     * @param $query
     * @return array|bool|null|object
     */
    public function get_query_results($query) {
        global $wpdb;
        $result = $wpdb->get_results($query);
        if (!empty($result)) {
            return $result;
        }
        return false;
    }


    /**
     * This function will get total average result of all options for a specific post
     *
     * @param $postid
     * @return int
     */
    public function get_post_total_avg_result($postid) {
        global $wpdb;
        $sql_text =  'SELECT AVG(value) as avg FROM ' . $this->table_name . ' WHERE postid = %d';
        $sql = $wpdb->prepare($sql_text, $postid);
        $result = $wpdb->get_results($sql);
        if (!empty($result)) {
            return $result[0]->avg;
        }
        return '0.0';
    }


    /**
     * This function will get total average result of each option separately for a specific post
     *
     * @param $postid
     * @return bool|array|object
     */
    public function get_post_options_avg_result($postid) {

        $sql = "SELECT postid, opt, COUNT(value) AS total,
            (SELECT AVG(value) FROM " . $this->table_name .
            " AS g2 WHERE g2.postid = ".(int)$postid." and g1.opt = g2.opt) AS avg FROM " . $this->table_name .
            " AS g1 WHERE g1.postid = ".(int)$postid."  GROUP BY g1.opt";
        
        return $this->get_query_results($sql);
    }

    /**
     * This function will get user specific votes for a post
     *
     * @param $postid
     * @param $userid
     * @return array|bool|null|object
     */
    public function get_user_vote($postid, $userid) {
        $sql = 'SELECT * FROM ' . $this->table_name . ' WHERE userid=' . (int)$userid . ' AND postid=' . (int)$postid;
        return $this->get_query_results($sql);
    }


    /**
     * Checks to see if this user has voted for a specific post
     *
     * @param $postid
     * @param $userid
     * @return bool
     */
    public function user_already_voted($postid, $userid) {
        $r = $this->get_user_vote($postid, $userid);
        if (!empty($r)) {
            return true;
        }
        return false;
    }


    /**
     * Gets current user ip address
     *
     * @return bool|string
     */
    public function get_ip_address()
    {
        $keys = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR');
        foreach ($keys as $key) {
            if (array_key_exists($key, $_SERVER) == true) {
                if (is_array($_SERVER[$key])) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        $ip = trim($ip); // just to be safe

                        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                            return $ip;
                        }
                    }
                } else {
                    $ip = trim($_SERVER[$key]); // just to be safe
//                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return false;
    }

    /**
     * inserts a single vote as single record to the database
     *
     * @param $insertData
     * @return false|int
     */
    public function add_vote_to_db($insertData) {
        global $wpdb;
        $inserted = $wpdb->insert($this->table_name, $insertData);
        return $inserted;
    }

    /**
     * Installs votes table if not exists
     */
    public function install_review_rating_table() {
        global $wpdb;
        $sql = "CREATE TABLE $this->table_name  (
            id          INT(11) NOT NULL AUTO_INCREMENT,
            postid      INT(11) NOT NULL,
            userid      INT(11) NOT NULL,
            opt         INT(3) NOT NULL,
            value       INT(3) NOT NULL,
            create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            ip          VARCHAR(16) NOT NULL,
            PRIMARY KEY (id)
        ) " . $wpdb->get_charset_collate();
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}