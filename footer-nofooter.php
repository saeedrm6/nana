<!--lightbox-overlay-->
<div class="lightbox-overlay">
    <i class="fa fa-times" aria-hidden="true"></i>
</div>
<!--lightbox-overlay-->

<!--login-lightbox-->
<div class="loginbox">
    <h3>ورود به وب سایت</h3>
    <div class="login-social">
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-facebook-square" aria-hidden="true"></i>
        </a>
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
        </a>
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        </a>
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-google-plus-square" aria-hidden="true"></i>
        </a>
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a class="col-md-2 col-sm-2 col-xs-4 col-lg-2" href="#">
            <i class="fa fa-windows" aria-hidden="true"></i>
        </a>
    </div>
    <form class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <input class="col-md-12 col-sm-12 col-xs-12 col-lg-12" type="text" placeholder="نام کاربری">
        <input class="col-md-12 col-sm-12 col-xs-12 col-lg-12" type="password" placeholder="کلمه عبور">
        <div class="formgroup remember">
            <label>مرا به خاطر بسپار</label>
            <input type="checkbox" name="remember" value="">
        </div>
        <input class="kbtn white col-md-12 col-sm-12 col-xs-12 col-lg-12" type="submit" value="ورود">
        <div class="formgroup loglinks">
            <a class="col-md-4 col-sm-6 col-xs-6 col-lg-4" href="#">فراموشی کلمه عبور</a>
            <a class="col-md-4 col-sm-6 col-xs-6 col-lg-4" href="#">فراموشی نام کاربری</a>
            <a class="col-md-4 col-sm-12 col-xs-12 col-lg-4" href="#">عضویت در وب سایت</a>
        </div>
    </form>
</div>
<!--login-lightbox-->

<!--search-lightbox-->
<div class="searchbox container">
    <h3>جستجو کنید <i class="fa fa-search" aria-hidden="true"></i></h3>
    <form class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <input class="col-md-9 col-sm-9 col-xs-12 col-lg-9" type="text" placeholder="عبارت مورد نظر خود را وارد کنید">
        <input class="kbtn white col-md-3 col-sm-3 col-xs-12 col-lg-3" type="submit" value="جستجو">
    </form>
</div>
<!--search-lightbox-->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($){
        $('.mep-playlist').mediaelementplayer({
            plugins: ['flash'],
            features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'current', 'progress', 'duration', 'volume', 'playlist'],
            audioVolume: "vertical", // just like video player
            shuffle: false,
            loop: false,
            success: function(mediaElement, domObject) {

                mediaElement.addEventListener('canplay', function() {
                    // Player is ready
                    mediaElement.play();
                }, false);

            },
            error: function() {
                //alert('Error setting media!');
            }
        });
        $(".video-player").mediaelementplayer({
            plugins: ['flash'],
            features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'current', 'progress', 'duration', 'volume', 'playlist'],
            audioVolume: "vertical", // just like video player
            shuffle: false,
            loop: false,
            success: function(mediaElement, domObject) {

                mediaElement.addEventListener('canplay', function() {
                    // Player is ready
                    mediaElement.play();
                }, false);

            },
            error: function() {
                //alert('Error setting media!');
            }
        });

        //alert($(document).find("[rel='next']").attr('href'));
    });

    if (jQuery("#lightgallery").length) {
        lightGallery(document.getElementById('lightgallery'));
    }

</script>
</body>
</html>
