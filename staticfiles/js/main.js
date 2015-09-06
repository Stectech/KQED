// @codekit-prepend "bower_components/jquery/dist/jquery.min.js";
// @codekit-prepend "jquery.flexslider-min.js";
// @codekit-prepend "jquery.fancybox-min.js";
// @codekit-prepend "jquery.waypoints.min.js";
// @codekit-prepend "inview.min.js";

$(document).ready(function() {

	//======= The Future page's slider =======//
	var $opacity = 0.99;
	$('.intro-slider').flexslider({
		animation: "fade",
		controlNav: true,
		slideshowSpeed: 3000,
		animationSpeed: 600, 
		directionNav: false,
		animationLoop: false,
		before: function(){
			$opacity = $opacity - .13;
			$('.intro-overlay').css('background-color', "rgba(0, 0, 0, "+$opacity+")");
		},
		end: function(){
			$('.skip-btn').fadeOut();
		}
	});


	$(".skip-btn").click(function () {    
		$('.intro-slider').flexslider(6);
		$('.intro-overlay').css('background-color', "rgba(0, 0, 0, .2)");

		return false;
	});

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

	//============== ProgressIntro-Section ==============//
	var $detNo = $(this).attr('data-counter'), 
	$imgNo = $('.progressintro-wrapper .backgrounds-wrapper img').attr('data-img'),

	$pWrapper = $('.progressintro-wrapper .items-wrapper'),
	$pLi = $('.progressintro-wrapper .items-wrapper ul li'),
	$pCloseBtn = $('.progressintro-wrapper .items-wrapper ul li a img');


	//Rollover event
	$('.progressintro-wrapper .items-wrapper ul li').on('mouseover', function() {
		var $detNo = $(this).attr('data-counter');
		$(".progressintro-wrapper .backgrounds-wrapper img").removeClass('active-image');

		$(".progressintro-wrapper .backgrounds-wrapper img[data-counter="+$detNo+"]").addClass('active-image');
	});


	//Click event
	$pLi.click(function() {

		$('.progressintro-wrapper').toggleClass('active');
		$detNo = $(this).attr('data-counter');


		if($(this).hasClass('active-item')){
			
			$pLi.removeClass('active-item nonactive-item');
			$pCloseBtn.removeClass('activated');
			$(".progressintro-wrapper .additionalinfo-wrapper .single-box").removeClass('opened');
			$pWrapper.removeClass('opened');
			$(".progressintro-wrapper .additionalinfo-wrapper .single-box .more-info").removeClass('opened');
			
			return false;

		}

		if ($($pLi.siblings().hasClass('active-item'))) {

			$(".progressintro-wrapper .additionalinfo-wrapper .single-box .more-info").removeClass('opened');
			$pLi.removeClass('active-item nonactive-item');
			$(this).addClass('active-item');
			$(this).siblings().addClass('nonactive-item');

			$pCloseBtn.removeClass('activated');
			$(this).find('.close-btn').addClass('activated');

			$(".progressintro-wrapper .additionalinfo-wrapper .single-box").removeClass('opened');
			$(".progressintro-wrapper .additionalinfo-wrapper .single-box[data-counter="+$detNo+"]").addClass('opened');

			$pWrapper.addClass('opened');

		} 

		return false;
	});

	
	//More-Info
	$(".progressintro-wrapper .additionalinfo-wrapper .single-box .moreinfo-trigger").click(function(){
		$(this).parents().find('.more-info').addClass('opened');

		return false;
	});

	$(".progressintro-wrapper .additionalinfo-wrapper .single-box .moreinfo-back-trigger").click(function(){
		$(this).parents('.more-info').removeClass('opened');

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










