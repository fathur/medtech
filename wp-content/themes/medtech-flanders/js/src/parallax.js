
$(function() {

	// Parallax header content
	$('.header-content .circle').parallax({
		speed: 0.7,
		axis: 'y' 
	});

	$('.header-content .image').parallax({
		speed: 0.4,
		axis: 'y'
	});

	$('.header-slider .layer-1').parallax({
		speed: 0.5,
		axis: 'y' 
	});

	$('.header-slider .layer-2').parallax({
		speed: 0.8,
		axis: 'y' 
	});
});


/**
 * Check height header slider in home
 */
/*$(window).on('resize', function() {
	var height = 0;
	var imgHeight = $('.header-slider .carousel-inner > .item > img');

	imgHeight.each(function(i) {

		if (this.height() > height) {
			height = this.height();
		};
	});

	if (height < 565) {

		$('.header-slider .carousel').height(height);

	} else {
		
		$('.header-slider .carousel').height(565);

	}
});
*/