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
    $shell = 'C:\xampp\htdocs\ffmpeg\ffmpeg.exe -y -i ' . $input . ' -codec:a libmp3lame -q:a '.$size.' '.$output;
    shell_exec($shell);
}

function ffmpeg_video($input, $output,$size, $audio_size = '128k', $video_bitrate = '1000k' , $format = 'mp4') {

    $shell = 'C:\xampp\htdocs\ffmpeg\ffmpeg.exe -y -i ' . $input . ' -f '.$format.' -framerate 24 -codec:v libx264 -profile:v high -preset slower -b:v '.$video_bitrate.' -vf scale=' . $size . ' -threads 0 -codec:a libmp3lame -b:a ' . $audio_size . ' ' .  $output;
//    $shell = 'C:\xampp\htdocs\ffmpeg\ffmpeg.exe -i ' . $input . ' -f '.$format.' -codec:v libx264 -profile:v high -preset slower -b:v '.$video_bitrate.' -vf scale=' . $video_size . ' -threads 0 -codec:a libmp3lame -b:a ' . $audio_size . ' ' .  $output . '  > /dev/null 2>/dev/null &  echo $!';
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
        $file_path = substr(ABSPATH, 0, -1) . '\\' . $file_url_parts[4] . '\\' . $file_url_parts[3] . '\\' . $file_url_parts[2] . '\\' . $file_url_parts[1] . '\\';
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
            'post_type'         => $post_type,
            'post_author'       => $post_author,
            'post_status'       => $post_status,
            'post_parent'       => $post_parent
        );

        $post_meta_ids = array();
        $post_meta_ids[] = $attachment_id;

        // generate 192k audio file
        $audio192_file_path = $file_path . $file_name . '-192' . $file_extension;
        $audio192_file_url  = $file_url  . $file_name . '-192' . $file_extension;
        echo $audio192_file_path;

        ffmpeg_audio( $file_path . $file_full_name, $audio192_file_path, '2' );

        if (file_exists($audio192_file_path)) {
            $temp = $attachment_array;
            $temp['post_title'] = $post_title . '-192';
            $temp['guid']       = $audio192_file_url;

            // insert attachment to database
            $inserted = wp_insert_attachment(
                $temp,
                $post_title . '-192' . $file_extension
            );

            // generate attachment meta date and then save them into database
            $generated_meta = wp_generate_attachment_metadata( $inserted, $audio192_file_path );

            wp_update_attachment_metadata( $inserted,  $generated_meta );

            if (!empty($inserted)) {
                $post_meta_ids[] = $inserted;
            } else {
                $errors[] = '192 bit rate not inserted';
            }
        }

        // generate 128k audio file
        $audio128_file_path = $file_path . $file_name . '-128' . $file_extension;
        $audio128_file_url  = $file_url  . $file_name . '-128' . $file_extension;
        ffmpeg_audio( $file_path . $file_full_name, $audio128_file_path, '5' );
        if (file_exists($audio128_file_path)) {
            $temp = $attachment_array;
            $temp['post_title']  = $post_title . '-128';
            $temp['guid']        = $audio128_file_url;

            // insert attachment to database
            $inserted = wp_insert_attachment(
                $temp,
                $post_title . '-128' . $file_extension
            );

            // generate attachment meta date and then save them into database
            $generated_meta = wp_generate_attachment_metadata( $inserted, $audio128_file_path );
            wp_update_attachment_metadata( $inserted,  $generated_meta );

            if (!empty($inserted)) {
                $post_meta_ids[] = $inserted;;
            } else {
                $errors[] = '128 bit rate not inserted';
            }
        }


        // generate 96k audio file
        $audio96_file_path = $file_path . $file_name . '-96' . $file_extension;
        $audio96_file_url  = $file_url  . $file_name . '-96' . $file_extension;
        ffmpeg_audio( $file_path . $file_full_name, $audio96_file_path, '8'  );
        if (file_exists($audio96_file_path)) {
            $temp = $attachment_array;
            $temp['post_title'] = $post_title . '-96';
            $temp['guid']       = $audio96_file_url;

            // insert attachment to database
            $inserted = wp_insert_attachment(
                $temp,
                $post_title . '-96' . $file_extension
            );

            // generate attachment meta date and then save them into database
            $generated_meta = wp_generate_attachment_metadata( $inserted, $audio96_file_path );
            wp_update_attachment_metadata( $inserted,  $generated_meta );

            if (!empty($inserted)) {
                $post_meta_ids[] = $inserted;
            } else {
                $errors[] = '96 bit rate not inserted';
            }
        }

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

    $file_path = substr(ABSPATH, 0, -1) . '\\' . $file_url_parts[4] . '\\' . $file_url_parts[3] . '\\' . $file_url_parts[2] . '\\' . $file_url_parts[1] . '\\';

    if (file_exists($file_path.$file_full_name)) {

        $remote_path = substr(ABSPATH, 0, -1) . '\\..\\nava-videos\\' . $file_full_name;

        $is_copied = copy($file_path.$file_full_name, $remote_path);
        if ($is_copied) {
            $remote_url = 'http://localhost/nava-videos/' . $file_full_name;
            return wp_update_post(
                array(
                    'ID'                => $ID,
                    'post_excerpt'      => $remote_url
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

    $moved_file = nava_move_uploaded_file($file);

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
        $file_remote_url = 'http://localhost/nava-videos/';
        $file_remote_path = substr(ABSPATH, 0, -1) . '\\..\\nava-videos\\';

        // file path without file name
        $file_path = substr(ABSPATH, 0, -1) . '\\' . $file_url_parts[4] . '\\' . $file_url_parts[3] . '\\' . $file_url_parts[2] . '\\' . $file_url_parts[1] . '\\';
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
            'post_type'         => $post_type,
            'post_author'       => $post_author,
            'post_status'       => $post_status,
        );

        $post_meta_ids = array();
        $post_meta_ids[] = $attachment_id;

        // generates HD quality if the uploaded video file is Full HD
        if (isset($post_meta['isVideoFullHD'][0]) && !empty($post_meta['isVideoFullHD'][0])) {
            // generate 1080 video file if allowed
            $video_HD_file_path = $file_path . $file_name . '-HD' . $file_extension;
            $video_HD_file_url = $file_url . $file_name . '-HD' . $file_extension;

            ffmpeg_video($file_path . $file_full_name, $video_HD_file_path, '1280:-2', '2', '1280k');

            if (file_exists($video_HD_file_path)) {
                $temp = $attachment_array;
                $temp['post_title'] = $post_title . '-HD';
                $temp['guid'] = $video_HD_file_url;
                $temp['post_excerpt'] = $file_remote_url . $file_name . '-HD' . $file_extension;

                // insert attachment to database
                $inserted = wp_insert_attachment(
                    $temp,
                    $post_title . '-HD' . $file_extension
                );

                // generate attachment meta date and then save them into database
                $generated_meta = wp_generate_attachment_metadata($inserted, $video_HD_file_path);

                wp_update_attachment_metadata($inserted, $generated_meta);

                if (!empty($inserted)) {
                    $post_meta_ids[] = $inserted;
                    $is_copied = copy($file_path.$file_full_name, $file_remote_path . $post_title . '-HD' . $file_extension);
                    if (!$is_copied) {
                        $errors[] = 'HD video file was not copied to remote path';
                    }
                } else {
                    $errors[] = 'HD video not inserted';
                }
            }
        }


        // generate SD video file
        $video_SD_file_path = $file_path . $file_name . '-SD' . $file_extension;
        $video_SD_file_url  = $file_url  . $file_name . '-SD' . $file_extension;
        ffmpeg_video( $file_path . $file_full_name,$video_SD_file_path,'720:-2', '5', '819k' );
        if (file_exists($video_SD_file_path)) {
            $temp = $attachment_array;
            $temp['post_title'] = $post_title . '-SD';
            $temp['guid']       = $video_SD_file_url;
            $temp['post_excerpt'] = $file_remote_url . $file_name . '-SD' . $file_extension;

            // insert attachment to database
            $inserted = wp_insert_attachment(
                $temp,
                $post_title . '-SD' . $file_extension
            );

            // generate attachment meta date and then save them into database
            $generated_meta = wp_generate_attachment_metadata( $inserted, $video_SD_file_path );
            wp_update_attachment_metadata( $inserted,  $generated_meta );

            if (!empty($inserted)) {
                $post_meta_ids[] = $inserted;
                $is_copied = copy($video_SD_file_path, $file_remote_path . $post_title . '-SD' . $file_extension);
                if (!$is_copied) {
                    $errors[] = 'SD video file was not copied to remote path';
                }
            } else {
                $errors[] = 'video SD not inserted';
            }
        }


        // generate mobile video file
        $video_mobile_file_path = $file_path . $file_name . '-mobile' . $file_extension;
        $video_mobile_file_url  = $file_url  . $file_name . '-mobile' . $file_extension;
        ffmpeg_video( $file_path . $file_full_name, $video_mobile_file_path, $video_mobile_file_path, '320:-2', '7', '410'  );
        if (file_exists($video_mobile_file_path)) {
            $temp = $attachment_array;
            $temp['post_title']     = $post_title . '-mobile';
            $temp['guid']           = $video_mobile_file_url;
            $temp['post_excerpt']   = $file_remote_url . $file_name . '-mobile' . $file_extension;

            // insert attachment to database
            $inserted = wp_insert_attachment(
                $temp,
                $post_title . '-mobile' . $file_extension
            );

            // generate attachment meta date and then save them into database
            $generated_meta = wp_generate_attachment_metadata( $inserted, $video_mobile_file_path );
            wp_update_attachment_metadata( $inserted,  $generated_meta );

            if (!empty($inserted)) {
                $post_meta_ids[] = $inserted;
                $is_copied = copy($video_mobile_file_path, $file_remote_path . $post_title . '-mobile' . $file_extension);
                if (!$is_copied) {
                    $errors[] = 'mobile video file was not copied to remote path';
                }
            } else {
                $errors[] = 'video mobile not inserted';
            }
        }

        print_r($post_meta_ids);
        //wp_die();
        if (empty($errors)) {
            foreach($post_meta_ids as $post_meta_id) {
                $updated = add_post_meta($post_id, 'videoFile', $post_meta_id);
                if ($updated == false) {
                    $errors[] = 'video post meta not updated';
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

add_action( 'wp_ajax_nopriv_video_status', 'ajax_video_status' );
add_action( 'wp_ajax_video_status', 'ajax_video_status' );

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