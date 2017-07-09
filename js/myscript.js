/*mainpage reviews script*/
$('.k-rate.circle').circleProgress({
  size:80,
  fill: {gradient: ['#ff1e41', '#ff5f43']}
});

/*main page main slider*/
$('#owl-k-slider').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4,
        }
    }
});

/*main page music carousel*/
$('#owl-k-music').owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:false,
    dots:true,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }

  });
    /*
    onDragged: function() {
        setCenter();
    },
    onRefreshed: function() {
      setCenter();
    },
    onDrag: function() {
      setCenter();
    },
    onTranslate: function() {
      setCenter(true);
    }
});
function setCenter($auto = false) {
  elms = $('#owl-k-music .owl-stage').find('.active').get();
  $('#owl-k-music .owl-stage').find('div').removeClass('center');
  $i = ($auto) ? 3 : 2;
  $(elms[$i]).addClass('center');
}
$(document).ready(function() {
setCenter();
});*/


/*inner page music carousel*/
$('#owl-k-music-inner').owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:false,
    loop:true,
    margin:0,
    nav:false,
    dots:true,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },

        600:{
            items:1,
        },
        1000:{
            items:1,
        }
    }

  });

  $('.owl-k-music-row').owlCarousel({
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:false,
      loop:true,
      margin:7.5,
      nav:false,
      dots:true,
      loop:true,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },

          600:{
              items:3,
          },
          1000:{
              items:4,
          }
      }

    });

    $('.owl-k-music-row-inner').owlCarousel({
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        loop:true,
        margin:120,
        nav:false,
        dots:true,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },

            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }

      });
/*countdown*/
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	$('#defaultCountdown').countdown({until: austDay});
  $('#defaultCountdown').countdown($.countdown.regionalOptions['fa']);
	$('#year').text(austDay.getFullYear());
});

/*Menu Mobile*/

function myFunction() {
  var x = document.getElementById("myNavbar");
  if (x.className === "topnav") {
      x.className += " responsible";
  } else {
      x.className = "topnav";
  }
}



/*Back to Top*/
$(document).ready(function(){
      $('body').append('<div id="toTop" class="btn"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>');
    	$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});


/*Search Module*/

$(".searchbtn").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.searchbox').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.searchbox').css('display','none');
});

/*login Module*/

$(".loginbtn").click(function(){
    $('.lightbox-overlay').css('display','block');
    $('.loginbox').css('display','block');
});

$(".lightbox-overlay").click(function(){
    $('.lightbox-overlay').css('display','none');
    $('.loginbox').css('display','none');
});

/*Tooltip*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

/*Anchor Smooth Move*/
$(document).on('click', 'a', function(event){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top - 200
    }, 2000);
});
