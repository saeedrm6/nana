<?php
$article_banner = nava_get_option('home_article_banner');
$article_banner = $article_banner[0];
?>

<div class="col-md-12 no-padding">
    <div class="banner728">
        <?php
        if (isset($center_banner['home_article_check_javasript'])){ ?>
            <?php echo $center_banner['home_article_javascript'];  ?>
        <?php } elseif(isset($article_banner['home_article_url_link']) and $article_banner['home_article_url_link'] != '#') {
        ?>
        <a target="_blank" href="<?php echo $article_banner['home_article_home_article_url_link'] ?>">
            <img src="<?php echo $article_banner['home_article_baner_img'];  ?>">
        </a>
            <?php
        }else{

        }
        ?>
    </div>
</div>
<div class="clearfix"></div>