<!--<pre style="direction: ltr;" class="text-left text-info">-->
<?php
//    var_dump(nava_get_option('header_section'));
    $header_setting = nava_get_option('header_section');
    $header_setting = $header_setting[0];
?>
<!--</pre>-->
<?php
//    echo $header_setting[0]['header_url_link'];
    if (isset($header_setting['header_check_javasript'])){ ?>
        <div class="banner banner-468">
                <?php echo $header_setting['header_javascript'];  ?>
        </div>
    <?php }else { ?>
        <div class="banner banner-468">
            <a target="_blank" href="<?php echo $header_setting['header_url_link'] ?>">
                <img src="<?php echo $header_setting['header_baner_img'];  ?>">
            </a>
        </div>
    <?php
    }
?>
<!--<div class="banner banner-468">-->
<!--    <a target="_blank" href="http://fastclick.co/a.aspx?Task=Click&ZoneID=2552&CampaignID=3372&AdvertiserID=436&BannerID=1378&SiteID=58">-->
<!--        <img src="--><?php //echo THEME_URL?><!--/img/banner/airasa468-60.gif">-->
<!--    </a>-->
<!--</div>-->