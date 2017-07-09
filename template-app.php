<?php
/**
Template Name:قالب اپلیکیشن
*/
get_header(); ?>



<style>
footer{
margin:0;
}
body{
	background-image:url(<?php echo THEME_IMAGES ?>cover.jpg);
	background-size: cover;
	background-attachment: fixed;
}
</style>

	<div class="app">

			<div class="container">
				<div class="row">
					<div class="app-desc col-md-7 col-xs-12 col-sm-7 col-lg-7">
    <p>رسانه نوا پس از گذشت حدود ۱ سال فعالیت مستمر به عنوان مرجع استریم و دانلود آهنگ و فعالترین رسانه خبری موسیقی در ایران اکنون افتخار معرفی نسخه اپلیکیشن تحت پلتفرم اندروید خود را دارد.</p>
    <p>شما اکنون میتوانید علاوه بر دسترسی به نسخه واکنش گرا (ریسپانسیو) این رسانه از اپلیکیشن اختصاصی نوا نیز استفاده کنید. همراه نوا باشید.</p>
    <p>برخی از امکانات اپلیکیشن نوا :</p>
    <ul>
        <li>جستجو در بزرگترین آرشیو موسیقی ایران</li>
        <li>شنیدن و دانلود موسیقی</li>
        <li>امکان ایجاد لیست پخش (playlist)</li>
        <li>تماشای ویدیوها گزارش کنسرت ها و اجرای زنده هنرمندان</li>
        <li>دسترسی به آرشیو اخبار موسیقی ایران با قابلیت جستجو</li>
    </ul>
    <p><a class="kbtn white" href="/ApplicationDroid/checkmyapp.php?version=1.2.0"> دانلود اپلیکیشن اندروید نوا</a>
    </p>
					</div>
					<div class="app-slider col-md-5 col-xs-12 col-sm-5 col-lg-5">
						<div class="app-slider-box">
							<div id="owl-k-app" class="owl-carousel ">
				        <div class="item">
				            <img src="<?php echo THEME_IMAGES ?>1.jpg">
				        </div>
								<div class="item">
				            <img src="<?php echo THEME_IMAGES ?>2.jpg">
				        </div>
								<div class="item">
				            <img src="<?php echo THEME_IMAGES ?>3.jpg">
				        </div>
								<div class="item">
				            <img src="<?php echo THEME_IMAGES ?>4.jpg">
				        </div>
				    	</div>
						</div>
					</div>
				</div>
			</div>

	</div>


<?php get_footer(); ?>
