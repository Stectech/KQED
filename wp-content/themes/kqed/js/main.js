// @codekit-prepend "bower_components/jquery/dist/jquery.min.js";
// @codekit-prepend "jquery.flexslider-min.js";
// @codekit-prepend "jquery.fancybox-min.js";
// @codekit-prepend "jquery.waypoints.min.js";
// @codekit-prepend "inview.min.js";

$(document).ready(function() {


	//======= Cascade-Boxes =======//
	$('.cascadeboxes-wrapper .single-box').click(function(){

		var $el = $(this), 
		$val = $(this).attr('data-counter');

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


	//Lightbox Video
	$('.lightbox').fancybox();

	//======= ProgressIntro-Section =======//
	var $detNo = $(this).attr('data-counter'), 
	$imgNo = $('.progressintro-wrapper .backgrounds-wrapper img').attr('data-img'),

	$pWrapper = $('.progressintro-wrapper .items-wrapper'),
	$pLi = $('.progressintro-wrapper .items-wrapper ul li'),
	$pCloseBtn = $('.progressintro-wrapper .items-wrapper ul li a img');


	//Rollover
	$('.progressintro-wrapper .items-wrapper ul li').on('mouseover', function() {
		var $detNo = $(this).attr('data-counter');
		$(".progressintro-wrapper .backgrounds-wrapper img").removeClass('active-image');

		$(".progressintro-wrapper .backgrounds-wrapper img[data-counter="+$detNo+"]").addClass('active-image');
	});


	//Click
	$pLi.click(function() {

		$pLi.removeClass('active-image nonactive-item');

		$pWrapper.toggleClass('opened');
		$(this).find('img').toggleClass('opened');

		$(".progressintro-wrapper .additionalinfo-wrapper .single-box[data-counter="+$detNo+"]").addClass('opened');


		//List Effect
		$(this).addClass('active-image');
		$(this).siblings().addClass('nonactive-item');


		//Initial State
		if (!$pWrapper.hasClass('opened')) {

			$pLi.removeClass('active-image nonactive-item');
			$pCloseBtn.removeClass('opened');

		}

		return false;
	});


	//======= Video =======//
	var inview = new Waypoint.Inview({
		element: $('.atf-section video')[0],
		enter: function(direction) {
			$('.atf-section video')[0].play(); 
		},
		exited: function(direction) {
			$('.atf-section video')[0].pause(); 
		}
	});


});











