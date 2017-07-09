<?php
$center_banner = nava_get_option('home_banner');
$center_banner = $center_banner[0];
?>
<div class="container">
    <div id="centeral_ads">
        <div class="newbanner text-center banner-940">
            <?php
            if (isset($center_banner['home_check_javasript'])){ ?>
                <?php echo $center_banner['home_javascript'];  ?>
            <?php } elseif(isset($center_banner['home_url_link']) and $center_banner['home_url_link'] != '#') {
                ?>
                <a target="_blank" href="<?php echo $center_banner['home_url_link'] ?>">
                    <img class="img-responsive" src="<?php echo $center_banner['home_baner_img'];  ?>">
                </a>
                <?php
            }else{

            }
            ?>

        </div>
    </div>
</div>
<div class="clearfix"></div>