<?php
$sidebar_banner = nava_get_option('homesidebar_group');
foreach ($sidebar_banner as $item){ ?>
    <div class="col-md-12 no-padding">
        <div class="banner300">
            <?php
                if (isset($item['homesidebar_check_javasript']) && $item['homesidebar_check_javasript']=='yes') {
                    echo $item['homesidebar_javascript'];
                }elseif(isset($item['homesidebar_url_link']) && $item['homesidebar_url_link'] != '#'){ ?>
                    <a target="_blank" href="<?php echo $item['homesidebar_url_link'] ?>">
                        <img src="<?php echo $item['homesidebar_baner_img'];  ?>">
                    </a>
                    <?php }else{

                }
            ?>
        </div>
    </div>
    <?php
}
?>