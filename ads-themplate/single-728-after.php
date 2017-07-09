<?php
$single_after = nava_get_option('singlepost_after');
$single_after = $single_after[0];
?>
<div class="banner col-md-12 nopadding">
    <?php
        if ($single_after['singlepost_check_javasript']=='yes'){
            echo $single_after['singlepost_javascript'];
        }elseif(isset($single_after['singlepost_url_link']) && $single_after['singlepost_url_link']!='#'){ ?>
            <a target="_blank" href="<?php echo $single_after['singlepost_url_link']; ?>">
                <img src="<?php echo $single_after['singlepost_baner_img'];  ?>">
            </a>
        <?php } else{

        }
    ?>
</div>
