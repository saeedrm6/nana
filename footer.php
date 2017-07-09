<!--footer-->
<footer>
    <div class="container">

        <div class="footerlinks col-md-6 col-sm-6 col-xs-12 col-lg-6">
          <h3> <i class="fa fa-chevron-left" aria-hidden="true"></i> نوا </h3>
          <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <?php wp_nav_menu(array('menu' => 'footer-col1')); ?>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <?php wp_nav_menu(array('menu' => 'footer-col2')); ?>
          </div>
        </div>
        <div class="footerlinks col-md-3 col-sm-6 col-xs-12 col-lg-3">
            <h3> <i class="fa fa-chevron-left" aria-hidden="true"></i> دسترسی سریع </h3>
            <?php wp_nav_menu(array('menu' => 'footer-col3')) ?>
        </div>

        <div class="footerlinks socialfooter col-md-3 col-sm-12 col-xs-12 col-lg-3">
		<img src="/wp-content/themes/nava/img/footer-logo.png" alt="رسانه نوا">
            <ul class="socialnetlinks">

                <li>
                    <a href="https://www.linkedin.com/company/nava-ir"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="http://twitter.com/navanews"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="http://telegram.me/navair"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="http://instagram.com/nava.ir"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
            </ul>
            <ul class="mobapplinks">
                <li class="app">
                    <a  href="#">
                        <i class="fa fa-android" aria-hidden="true"></i>
                        دانلود اپلیکیشن اندروید
                    </a>
                </li>
                <li class="app">
                    <a  href="#">
                        <i class="fa fa-apple" aria-hidden="true"></i>
                        اپلیکیشن IOS به زودی
                    </a>
                </li>
            </ul>
        </div>
        <div class="copyright col-md-12 col-sm-12 col-xs-12 col-lg-12">
          کلیه حقوق مادی و معنوی برای <a href="/">رسانه نوا </a> محفوظ است
        </div>
    </div>

</footer>
<!--footer-->

<!--lightbox-overlay-->
<div class="lightbox-overlay">
    <i class="fa fa-times" aria-hidden="true"></i>
</div>
<!--lightbox-overlay-->

<!--login-lightbox-->
<!--<div class="loginbox hide">-->
<!--    <h3>ورود به وب سایت</h3>-->
<!--    <div class="login-social">-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-facebook-square" aria-hidden="true"></i>-->
<!--        </a>-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-twitter-square" aria-hidden="true"></i>-->
<!--        </a>-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-linkedin-square" aria-hidden="true"></i>-->
<!--        </a>-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-google-plus-square" aria-hidden="true"></i>-->
<!--        </a>-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-instagram" aria-hidden="true"></i>-->
<!--        </a>-->
<!--        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">-->
<!--            <i class="fa fa-windows" aria-hidden="true"></i>-->
<!--        </a>-->
<!--    </div>-->
<!--    <form class="col-md-12 col-sm-12 col-xs-12 col-lg-12">-->
<!--        <input class="col-md-12 col-sm-12 col-xs-12 col-lg-12" type="text" placeholder="نام کاربری">-->
<!--        <input class="col-md-12 col-sm-12 col-xs-12 col-lg-12" type="password" placeholder="کلمه عبور">-->
<!--        <div class="formgroup remember">-->
<!--            <label>مرا به خاطر بسپار</label>-->
<!--            <input type="checkbox" name="remember" value="">-->
<!--        </div>-->
<!--        <input class="kbtn white col-md-12 col-sm-12 col-xs-12 col-lg-12" type="submit" value="ورود">-->
<!--        <div class="formgroup loglinks">-->
<!--            <a class="col-md-4 col-sm-6 col-xs-6 col-lg-4" href="#">فراموشی کلمه عبور</a>-->
<!--            <a class="col-md-4 col-sm-6 col-xs-6 col-lg-4" href="#">فراموشی نام کاربری</a>-->
<!--            <a class="col-md-4 col-sm-12 col-xs-12 col-lg-4" href="#">عضویت در وب سایت</a>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--login-lightbox-->

<!--search-lightbox-->
<div class="searchbox container">
    <h3>جستجو کنید <i class="fa fa-search" aria-hidden="true"></i></h3>
    <form method="POST" action="<?php echo home_url('find') ?>" class="col-xs-12">
        <input type="hidden" name="sAll" value="on" />
        <input class="col-sm-9 col-xs-12" type="text" name="search" placeholder="عبارت مورد نظر خود را وارد کنید">
        <input class="kbtn white col-sm-3 col-xs-12" type="submit" name="submit" value="جستجو">
    </form>
</div>
<!--search-lightbox-->
<script type="application/ld+json">{
    "@context": "http://schema.org",
    "@type": "EntertainmentBusiness",
    "image": "http://nava.ir/wp-content/uploads/2017/04/nava.png",
    "priceRange": "IRR",
    "telephone": "02143067",
    "name": "\u0631\u0633\u0627\u0646\u0647 \u0646\u0648\u0627",
    "logo": "http://nava.ir/wp-content/uploads/2017/04/nava.jpg",
    "description": "\u00ab\u0646\u0648\u0627\u00bb \u0628\u0647 \u0639\u0646\u0648\u0627\u0646 \u0631\u0633\u0627\u0646\u0647\u200c\u06cc \u0645\u062a\u0641\u0627\u0648\u062a \u0645\u0648\u0633\u06cc\u0642\u06cc\u060c \u062f\u0631 \u0648\u0627\u067e\u0633\u06cc\u0646 \u0631\u0648\u0632\u0647\u0627\u06cc \u0632\u0645\u0633\u062a\u0627\u0646 1394 \u0628\u0627 \u0634\u0645\u0627\u0631\u0647 \u0645\u062c\u0648\u0632 77755 \u0627\u0632 \u0627\u0645\u0648\u0631 \u0645\u0637\u0628\u0648\u0639\u0627\u062a \u0648 \u0627\u0637\u0644\u0627\u0639\u200c\u0631\u0633\u0627\u0646\u06cc \u0648\u0632\u0627\u0631\u062a \u0641\u0631\u0647\u0646\u06af \u0648 \u0627\u0631\u0634\u0627\u062f \u0627\u0633\u0644\u0627\u0645\u06cc\u060c \u062a\u0627\u0633\u06cc\u0633 \u0634\u062f. \u0631\u0633\u0627\u0646\u0647 \u00ab\u0646\u0648\u0627\u00bb \u0628\u0627 \u0647\u062f\u0641 \u062a\u0631\u0648\u06cc\u062c \u0641\u0631\u0647\u0646\u06af \u0648 \u062a\u0648\u0633\u0639\u0647 \u0645\u0648\u0633\u06cc\u0642\u06cc \u0641\u0639\u0627\u0644\u06cc\u062a \u062e\u0648\u062f \u0631\u0627 \u0622\u063a\u0627\u0632 \u06a9\u0631\u062f\u0647 \u0627\u0633\u062a. \r\n\u0628\u0627 \u062a\u0648\u062c\u0647 \u0628\u0647 \u0646\u06cc\u0627\u0632 \u0631\u0648\u0632 \u0627\u0641\u0632\u0648\u0646 \u062c\u0627\u0645\u0639\u0647 \u0628\u0631\u0627\u06cc \u0627\u06cc\u062c\u0627\u062f \u0627\u0631\u062a\u0628\u0627\u0637\u0627\u062a \u0628\u0635\u0631\u06cc\u060c \u0627\u06cc\u0646 \u0631\u0633\u0627\u0646\u0647 \u0639\u0644\u0627\u0648\u0647 \u0628\u0631 \u067e\u0648\u0634\u0634 \u0645\u062a\u0646\u06cc \u0627\u062e\u0628\u0627\u0631\u060c \u0628\u0631\u0627\u06cc \u0627\u0648\u0644\u06cc\u0646 \u0628\u0627\u0631 \u062f\u0631 \u062d\u0648\u0632\u0647 \u0628\u0631\u0646\u0627\u0645\u0647 \u0633\u0627\u0632\u06cc \u0648\u06cc\u062f\u06cc\u0648\u06cc\u06cc \u06af\u0627\u0645\u200c\u0647\u0627\u06cc \u0645\u062b\u0628\u062a\u06cc \u0628\u0631\u062f\u0627\u0634\u062a\u0647 \u0648 \u0628\u0647 \u0639\u0646\u0648\u0627\u0646 \u0646\u062e\u0633\u062a\u06cc\u0646 \u0648 \u062d\u0631\u0641\u0647\u200c\u0627\u06cc \u062a\u0631\u06cc\u0646 \u0631\u0633\u0627\u0646\u0647\u200c\u06cc \u0648\u06cc\u062f\u06cc\u0648\u06cc\u06cc \u0645\u0648\u0633\u06cc\u0642\u06cc \u062f\u0631 \u0627\u06cc\u0631\u0627\u0646 \u0634\u0646\u0627\u062e\u062a\u0647 \u0645\u06cc\u200c\u0634\u0648\u062f.",
    "openingHours": [
        "Tuesday\t        10AM\u20136PM",
        "Wednesday\t10AM\u20136PM",
        "Thursday\t        Closed",
        "Friday\t        Closed",
        "Saturday\t       10AM\u20136PM",
        "Sunday            10AM\u20136PM",
        "Monday           10AM\u20136PM"
    ],
    "geo": {
        "@type": "GeoCoordinates",
        "longitude": "35.7211889",
        "latitude": "51.3911955"
    },
    "url": "http://nava.ir",
    "sameAs": [
        "https://www.facebook.com/navamedia",
        "http://twitter.com/navanews",
        "http://instagram.com/nava.ir",
        "https://www.linkedin.com/company/nava-ir",
        "https://plus.google.com/+navair1"
    ],
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+9821-430-67",
        "contactType": "Technical Support",
        "email": "contact@nava.ir",
        "contactOption": "",
        "areaServed": "Iran, Islamic Republic of",
        "availableLanguage": "English,Persian"
    },
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "Iran, Islamic Republic of",
        "addressLocality": "Tehran",
        "addressRegion": "Tehran",
        "postalCode": null,
        "streetAddress": null
    }
}</script>
<?php wp_footer(); ?>

<script>
    jQuery(document).ready(function($){
        <?php if (is_singular('music')): ?>
        $('.mep-playlist').mediaelementplayer({

            features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack',  'current', 'progress', 'duration', 'volume'],
            audioVolume: "vertical", // just like video player
            shuffle: false,
            loop: false,
			pauseOtherPlayers: true,

            success: function(mediaElement, domObject) {
				if (isMobileDevice() == false) {
					if ($(".mejs-playpause-button").hasClass('mejs-play')) {
						$(".mejs-playpause-button").removeClass('mejs-play');
						$(".mejs-playpause-button").addClass('mejs-pause');
					}
				}
				mediaElement.play();
                mediaElement.addEventListener('canplay', function() {
                    // Player is ready

					// if (isMobileDevice == true) {
						// $('[aria-label="Play"]').click();
					// }
                }, false);

            },
            error: function() {
                //alert('Error setting media!');
                alert('خطا در هنگام پخش موزیک لطفا برای بخش موزیک بعدا تلاش نمایید.');
            }
        });
        <?php endif; ?>

        //, 'contextmenu' ,
        <?php if (is_singular('tv')|| is_singular('tube')): ?>
        $("#mej-player").mediaelementplayer({
            features: ['playlistfeature',  'playpause',   'current', 'progress', 'duration', 'volume', 'fullscreen'],
            audioVolume: "vertical", // just like video player
            pauseOtherPlayers: true,
            alwaysShowControls: true,

            success: function(mediaElement, domObject) {

                code = '<div class="dropup  mejs-button"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">انتخاب کیفیت پخش ویدیو <i class="fa fa-cog" ></i></button> <ul class="dropdown-menu"> <li><a href="#" class="dropdown-link" id="play-hd">720p</a></li> <li><a href="#" class="dropdown-link" id="play-sd">480p</a></li> <li><a href="#" class="dropdown-link" id="play-mobile">320p</a></li> </ul> </div>';
                $( ".mejs-fullscreen-button"  ).before( code );


                if (isMobileDevice() == false) {
                    if ($(".mejs-playpause-button").hasClass('mejs-play')) {
                        $(".mejs-playpause-button").removeClass('mejs-play');
                        $(".mejs-playpause-button").addClass('mejs-pause');
                    }
                }
                $('.mejs-playpause-button').removeClass('mejs-pause').addClass('mejs-play');

                //console.log($( ".mejs-volume-button"  ).get());

                //mediaElement.play();
                mediaElement.addEventListener('canplay', function() {
                    // Player is ready
                    //alert('x');

                    // if (isMobileDevice == true) {
                    // $('[aria-label="Play"]').click();
                    // }
                }, false);

            },
            error: function() {
                alert('خطا در هنگام پخش ویدیو لطفا برای بخش ویدیو بعدا تلاش نمایید.');
            }
        });
        var playerId = $('#mej-player').closest('.mejs-container').attr('id');
        // or $('#mediaplayer').closest('.mejs-container').attr('id') in "legacy" stylesheet

        var player = mejs.players[playerId];


        function playVideoByQuality($quality_attr) {
            if ($("#mej-player").attr($quality_attr) != '') {
                hdLink = $("#mej-player").attr($quality_attr);
                time = player.getCurrentTime();
                player.pause();
                player.setSrc(hdLink);
                player.media.load();
                player.setCurrentTime(time);
                player.play();
            }
        }

        $(document).on('click',"#play-hd", function() {
            console.log('play hd');
            playVideoByQuality('data-video-hd');
        });
        $(document).on('click',"#play-sd", function() {
            playVideoByQuality('data-video-sd');
        });
        $(document).on('click',"#play-mobile", function() {
            playVideoByQuality('data-video-mobile');
        });
        
        <?php endif; ?>
        //alert($(document).find("[rel='next']").attr('href'));
    });

    if (jQuery("#lightgallery").length) {
        lightGallery(document.getElementById('lightgallery'));
    }

	///if (jQuery(".gallery").length) {
	//	lightGallery($('.gallery').get());
	//}

    <?php if (is_singular('concert')): ?>
    jQuery(document).ready(function($) {
        if ($("#concertMap").length) {
            var map = new google.maps.Map(document.getElementById(event_map['append_to']), {
                zoom:parseInt(event_map['zoom']),
                center: new google.maps.LatLng(parseFloat(event_map['longitude']), parseFloat(event_map['latitude'])),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            });

            var infowindow = new google.maps.InfoWindow();

            var marker;

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(event_map['longitude']), parseFloat(event_map['latitude'])),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker) {
                return function() {
                    infowindow.setContent(event_map['title'] + "<br />" + event_map['country'] + '، ' + event_map['city']);
                    infowindow.open(map, marker);
                }
            })(marker));
        }
    });
    <?php endif; ?>
    <?php if (is_archive('tube')): ?>

    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin: 10,
            loop: true,
            autoWidth: true,
            items: 4,
            rtl: true
        })
    });

    <?php endif; ?>
</script>

<?php if (is_singular('music')):
global $post;
$like = new ClickLike();
$like_count = $like->get_likes_count($post->ID);
$like_result = $like->get_rating_result($post->ID);
if (!empty($like_count)):
?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Product",
  "aggregateRating": {
    "@type": "AggregateRating",
	"bestRating": "5",
    "ratingValue": <?php echo $like_result ?>,
    "reviewCount": <?php echo $like_count ?>
  },
  "description": "<?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);  ?>",
  "name": "<?php echo $post->post_title ?>",
  "image": "<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>"
}
</script>

<?php
endif;
 endif; ?>
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74649100-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
