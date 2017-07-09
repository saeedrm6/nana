<?php
$GLOBALS['post_not_in'] = array();
get_header() ?>
<?php
get_template_part('home', 'slider');
get_template_part('home', 'music');
get_template_part('home', 'tv');
?>
<section class="k-central">
    <div class="container">
        <?php
        get_template_part('home', 'news');
        ?>
    </div>
    <div class="container-fluid k-review">
        <?php
        get_template_part('home', 'reviews');
        ?>
    </div>
    <div class="container">
        <?php
        get_template_part('home', 'concert');
        ?>
    </div>
    <div class="container-fluid m-navagram">
        <?php
        get_template_part('home', 'navagram');
        ?>
    </div>
    <div class="container">
        <?php
        get_template_part('home', 'worldNews');
        ?>
    </div>
</section>
<!--central-->
<?php get_footer(); ?>
