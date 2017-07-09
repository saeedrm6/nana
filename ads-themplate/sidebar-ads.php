<?php
$sidebar_banner = nava_get_option('sidebar_group');
foreach ($sidebar_banner as $item) {
    ?>
    <div class="col-md-12 no-padding">
        <div class="banner300">
            <?php
            if (isset($item['sidebar_check_javasript']) && $item['sidebar_check_javasript']=='yes') {
                echo $item['sidebar_javascript'];
            }elseif(isset($item['sidebar_url_link']) && $item['sidebar_url_link'] != '#'){ ?>
                <a target="_blank" href="<?php echo $item['sidebar_url_link'] ?>">
                    <img src="<?php echo $item['sidebar_baner_img'];  ?>">
                </a>
            <?php }else{

            }
            ?>
        </div>
    </div>
    <?php
}
?>