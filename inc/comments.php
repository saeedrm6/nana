<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
    'author' =>
        '<div class="form-group clearfix"><div class=""><label for="author" class="control-label hide">'. __("نام", "nava") .
        '<span class="k-required">*</span>' .
        '</label><input type="text" id="author" name="author" class="form-control" placeholder="نام (اجباری)" value="' . esc_attr( $commenter['comment_author'] ) .
        '" ' . $aria_req . ' /></div>',

    'email' =>
        '<div class=""><label for="email" class="control-label hide">' . __("پست الکترونیکی",'nava') .
        '<span class="k-required">*</span>'. '</label>' .
        '<input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" class="form-control" placeholder="پست الکترونیکی (اجباری)" ' . $aria_req . '></div>',
    'url' =>
        '<div class="">
        <label for="url" class="control-label hide">' . __( 'وب سایت ', 'domainreference' ) . '</label>' .
        '<input id="url" name="url" type="text" class="form-control" placeholder="وب سایت" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '"  /></div></div>',
);
$comments_args = array(
    'fields'            =>  $fields,
    'comment_field'     => '<div class="form-group clearfix"><div class="">
                                    <label for="comment" class="hide">' . _x( '', 'noun' ) . ' <span class="k-required">*</span></label>
                                    <textarea class="form-control" name="comment" id="comment" aria-required="true" placeholder="پیام شما *"></textarea>
                                </div></div>',
    'title_reply'       => '',
    'class_form'        => 'comment-form form clearfix',
    'id_submit'         => 'submit',
    'class_submit'      => 'kbtn black',
    'name_submit'       => 'submit',
    'label_submit'      => __( 'ارسال دیدگاه' ),
    'title_reply_to'    => __( 'ارسال پاسخ برای %s' ),
    'cancel_reply_link' => __( 'لغو پاسخ' ),
    'format'            => 'html',
    'comment_notes_before' => '<div class="k-comment-form-desc"><div class="row"><div class="col-xs-12"></div></div></div>',
    'must_log_in' => '<p class="must-log-in">' .
        sprintf(
            __( 'برای ارسال دیدگاه ابتدا باید  <a href="%s">logged in</a> .' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

    'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'شما با نام <a href="%1$s">%2$s</a> وارد شده اید. <a href="%3$s" title="Log out of this account">خروج از حساب</a>' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',
);

comment_form( $comments_args );
wp_list_comments(
    array(
        'callback' => 'nava_comment_list'
    )
);

function nava_comment_list($comment, $args, $depth) {
    wp_reset_query();
    $GLOBALS['comment'] = $comment;
    global $post;
    //echo $post->ID;
    ?>
    <?php $comment_id = get_comment_ID(); ?>
    <div <?php comment_class("k-comment-row clearfix"); ?> id="comment-<?php comment_ID(); ?>">
        <div class="col-xs-4 col-md-3 col-lg-2">
            <div class="k-comment-author">
                <div class="k-comment-author-img">
                    <?php
                    $args["force_display"] = true;
                    if (validate_gravatar(get_comment_author($comment_id))) {
                        echo get_avatar( get_comment_author_email($comment_id), array(92, 92), '', get_comment_author($comment_id) , $args );
                    } else {
                        echo "<img src='".THEME_IMAGES."default-gravatar.png' alt'".get_comment_author($comment_id)."' />";
                    }
                    ?>
                </div>
                <div class="k-commnet-reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'پاسخ دادن', 'nava' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
        </div>
        <div class="col-xs-8 col-md-9 col-lg-10">
            <div class="k-comment-text">
                <h4 class="k-comment-author-name"><span><?php comment_author(); ?></span></h4>
                <p><?php comment_text(); ?></p>
            </div>
        </div>
    </div>
    <?php
}







paginate_comments_links( array('prev_text' => '&lsaquo; قبلی', 'next_text' => 'بعدی &rsaquo;'));
