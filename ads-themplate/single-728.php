<?php
$single_banner = nava_get_option('singlepost');
foreach ($single_banner as $item) {
    ?>
    <div class="banner col-md-12 nopadding">
        <?php
        if (isset($item['singlepost_check_javasript']) && $item['singlepost_check_javasript']=='yes') {
            echo $item['singlepost_javascript'];
        }elseif(isset($item['singlepost_url_link']) && $item['singlepost_url_link'] != '#'){ ?>
            <a target="_blank" href="<?php echo $item['singlepost_url_link'] ?>">
                <img src="<?php echo $item['singlepost_baner_img'];  ?>">
            </a>
        <?php }else{

        }
        ?>
    </div>
    <?php
}
?>