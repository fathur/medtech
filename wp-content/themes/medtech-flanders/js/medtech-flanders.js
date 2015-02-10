// jquery.parallax.js
// @weblinc, @jsantell, (c) 2012

(function( $ ) {
    $.fn.parallax = function ( userSettings ) {
        var options = $.extend( {}, $.fn.parallax.defaults, userSettings );

        return this.each(function () {


            var $this   = $(this),
                isX     = options.axis === 'x',
                origPos = ( $this.css( 'background-position' ) || '' ).split(' '),
                origX   = $this.css( 'background-position-x' ) || origPos[ 0 ],
                origY   = $this.css( 'background-position-y' ) || origPos[ 1 ],
                dist    = function () {
                    var s = -$( window )[ isX ? 'scrollLeft' : 'scrollTop' ]();
                    return s;
                },
                offsetY;

            if (origY.slice(-2) == 'px') {
                offsetY = parseInt(origY);
            } else {
                offsetY = 0;
            };

            console.log(origY.slice(-2));


            $this
                .css( 'background-attachment', 'fixed' )
                .addClass( 'inview' );

            $this.bind('inview', function ( e, visible ) {
                $this[ visible ? 'addClass' : 'removeClass' ]( 'inview' );
            });

            $( window ).bind( 'scroll', function () {
                if ( !$this.hasClass( 'inview' )) { return; }


                var xPos = isX ? ( dist() * options.speed ) + 'px' : origX,
                    yPos = isX ? origY : offsetY + ( dist() * options.speed ) + 'px';

                $this.css( 'background-position', xPos + ' ' + yPos );
            });
        });
    };

    $.fn.parallax.defaults = {
        start: 0,
       // stop: $( document ).height(),
        speed: 1,
        axis: 'x'
    };

})( jQuery );

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