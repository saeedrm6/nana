<!Doctype html><!--[if IE 8]>
<html class="ie8"  <?php language_attributes() ?>><![endif]-->
<!--[if IE 9]>
<html class="ie9"  <?php language_attributes() ?>><![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes() ?>>
<head>
    <link rel="icon"
          type="image/png"
          href="<?php echo THEME_IMAGES ?>favico.png">
    <link rel="shortcut icon" href="<?php echo THEME_IMAGES ?>favico.ico" type="image/x-icon" />
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale=1, maximu-scale=1, user-scalable=no">


    <title>
        <?php wp_title(''); ?>
    </title>
	<?php
	global $post;
	$post_id = $post->ID;
	if (is_singular()):
	?>
	<?php
	$tags = get_object_taxonomies( $post->post_type , 'names' );

?>
<?php 
//echo wpseo_metadesc;
function nava_yoast_display_description( $str ) {
	global $post;
	$post_id = $post->ID;
	$p = get_post($post_id);
	$p = preg_split( '/<!--more(.*?)?-->/', $p->post_content );

	// Output part before <!--more--> tag
	$post_excerpt = trim(strip_tags($p[0])); 
	
	if (!empty($str)) {
		return $str;
	} else {
		return $post_excerpt;
	}
	return $str.',yoast';
}
add_filter( 'wpseo_metadesc', 'nava_yoast_display_description', 10, 1 );
?>

<meta name="keywords" content="<?php

$posttags = get_the_terms($post_id, $tags[1]);

if ($posttags) {
	$post_tags = array();
  foreach($posttags as $tag) {
    $post_tags[] = $tag->name;
  }
  echo implode(',', $post_tags);
}
?>"/>
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('k-body'); ?>>
<!--header-->
<header class="k-header clearfix">
    <div class="k-up">
      <div class="container">
        <div class="banner banner-468">
<!--             <a target="_blank" href="http://fastclick.co/a.aspx?Task=Click&ZoneID=2552&CampaignID=3372&AdvertiserID=436&BannerID=1378&SiteID=58">
              <img src="/wp-content/themes/nava/img/banner/airasa468-60.gif">
            </a> -->
        </div>
      </div>
    </div>
    <div class="k-down">
        <nav class="navbar" data-spy="affix" data-offset-top="80">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="resbutt navbar-toggle"  onclick="myFunction()">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="searchbtn-ul">
                      <li class="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></li>
                    </ul>


                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img class="logo" alt="نوا" src="<?php echo THEME_IMAGES ?>logo.png">
                        <span>خانه ستارگان موسیقی</span>
                    </a>
                </div>
			    <div class="topnav" id="myNavbar">
				<ul class="nav navbar-nav">
				  <li class=""><a href="<?php echo home_url(); ?>">خانه</a></li>
				  <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">نوا<span class="caret"></span></a>
					<div class="dropdown-menu container">
					  <div class="col-md-3 col-sm-3 col-list">
						<a class="menu-col-head" href="<?php echo home_url('news') ?>">اخبار</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col11',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>
					  <div class="col-md-3 col-sm-3 col-list">
						<a class="menu-col-head" href="<?php echo home_url('story') ?>">گزارش</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col12',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>
					  <div class="col-md-3 col-sm-3 col-list">
              <a class="menu-col-head" href="#">سایر مطالب</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col13',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>

            <div class="col-md-3 col-sm-3 col-list">
              <a class="menu-col-head" href="#">مدیا</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col14',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>

					  <div class="col-md-3 col-sm-3 col-list">
					  </div>
					</div>
				  </li>
				  <li><a href="<?php echo home_url('wiki'); ?>">هنرمندان</a></li>
          <li><a href="<?php echo home_url('tv'); ?>">ویدیو</a></li>
          <li><a href="<?php echo home_url('music'); ?>">موسیقی</a></li>
          <!--<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">مدیا<span class="caret"></span></a>
					<div class="dropdown-menu container">
					  <div class="col-md-2 col-list">
						<a class="menu-col-head" href="#">نوا تی وی</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col21',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>
					  <div class="col-md-2 col-list">
						<a class="menu-col-head" href="#">موسیقی</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col22',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>
					  <div class="col-md-2 col-list">
						<a class="menu-col-head" href="#">تصاویر</a>
						<?php
							wp_nav_menu(array(
								'menu'          => 'header-nav-col23',
								'menu_class'    => 'nav navbar-nav',
								'walker' => new wp_bootstrap_navwalker()
							));
						?>
					  </div>

					</div>
        </li>-->
				  <li><a href="<?php echo home_url('about-us'); ?>">درباره ما</a></li>
          <li><a href="<?php echo home_url('contact'); ?>">تماس با ما</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
                    <?php if (!is_user_logged_in()): ?>
                <li class="me-header-login"><a href="<?php echo home_url() .'/register?redirect_to=' . urlencode(get_current_page_url()); ?>">عضویت</a></li>
                    <li class="h-sep me-header-login">/</li>
				  <li class="me-header-login"><a href="<?php echo home_url() .'/login?redirect_to=' . urlencode(get_current_page_url()); ?>">ورود</a></li>
                        <?php else: ?>
                        <li class="me-header-login"><a href="<?php echo home_url() .'/dashboard'; ?>">حساب کاربری</a></li>
                        <li class="h-sep me-header-login">/</li>
                        <li class="me-header-login"><a href="<?php echo wp_logout_url(get_current_page_url()) ?>&logout">خروج</a></li>
                    <?php endif; ?>
<!--				  <li class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></li>-->
				  <li class="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></li>
				</ul>
			  </div>
            </div>
        </nav>
    </div>
</header>
<!--header-->
