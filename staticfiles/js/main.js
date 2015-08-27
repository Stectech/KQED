// @codekit-prepend "bower_components/jquery/dist/jquery.min.js";

$(document).ready(function() {
	//======= Cascade-Boxes =======//

	$('.cascadeboxes-wrapper .single-box').click(function(){

		var $el = $(this);
		var $val = $(this).attr('data-counter');

		$(".details").slideUp(300);


		if($el.hasClass('active')){

			$('.cascadeboxes-wrapper .single-box').find('i').removeClass('active');
			$('.cascadeboxes-wrapper .single-box').find('.inactive-overlay').fadeOut();
			$el.removeClass('active');
			$(".details[data-counter="+$val+"]").slideUp(300);


		} else{

			$el.toggleClass('active');
			$el.find('i').addClass('active');
			$el.find('.inactive-overlay').fadeOut(300);

			$el.siblings().find('.inactive-overlay').fadeIn(300);
			$el.siblings().find('i').removeClass('active');
			$el.siblings().removeClass('active');

			$(".details[data-counter="+$val+"]").slideToggle(300);

		}
		

	});



});