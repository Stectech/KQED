// @codekit-prepend "bower_components/jquery/dist/jquery.min.js";
// @codekit-prepend "jquery.flexslider-min.js";
// @codekit-prepend "jquery.fancybox-min.js";

$(document).ready(function() {


	//======= Cascade-Boxes =======//
	$('.cascadeboxes-wrapper .single-box').click(function(){

		var $el = $(this);
		var $val = $(this).attr('data-counter');

		$(".details, .details-v2").slideUp(300);


		if($el.hasClass('active')){

			$('.cascadeboxes-wrapper .single-box').find('i').removeClass('active');
			$('.cascadeboxes-wrapper .single-box').find('.inactive-overlay').fadeOut();
			$el.removeClass('active');
			$(".details[data-counter="+$val+"], .details-v2[data-counter="+$val+"]").slideUp(300);


		} else{

			$el.toggleClass('active');
			$el.find('i').addClass('active');
			$el.find('.inactive-overlay').fadeOut(300);

			$el.siblings().find('.inactive-overlay').fadeIn(300);
			$el.siblings().find('i').removeClass('active');
			$el.siblings().removeClass('active');

			$(".details[data-counter="+$val+"], .details-v2[data-counter="+$val+"]").slideToggle(300);

		}
		
	});


	//======= The Future page's slider =======//
	$('#future-slider').flexslider({
		animation: "slide",
		controlNav: true,
		directionNav: false,

		start: function(){
			var textSide = $('.innerslider-wrapper #future-slider ul li .text-side').innerHeight();
			var imgSide = $('.innerslider-wrapper #future-slider ul li .image-side').height();

			if ($(window).width() >= 767) {
				$('.innerslider-wrapper #future-slider ul li .text-side').innerHeight(imgSide);
			}
			$(window).resize(function() {

				var imgSideLive = $('.innerslider-wrapper #future-slider ul li .image-side').innerHeight();

				if ($(window).width() >= 767) {
					$('.innerslider-wrapper #future-slider ul li .text-side').innerHeight(imgSideLive);
				}
			});
		}

	});


	//Video Lightbox
	$('.lightbox').fancybox();


});