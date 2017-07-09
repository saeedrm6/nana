<?php
$archivemusic = nava_get_option('archivemusic');
foreach ($archivemusic as $item) { ?>
    <div class="banner col-md-12 nopadding">
        <?php
        if (isset($item['music_check_javasript']) && $item['music_check_javasript']=='yes') {
            echo $item['music_javascript'];
        }elseif(isset($item['music_url_link']) && $item['music_url_link'] != '#'){ ?>
            <a target="_blank" href="<?php echo $item['music_url_link'] ?>">
                <img src="<?php echo $item['music_baner_img'];  ?>">
            </a>
        <?php }else{

        }
        ?>
    </div>
<?php
}
?>