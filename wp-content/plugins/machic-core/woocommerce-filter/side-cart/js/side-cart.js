(function ($) {
  "use strict";
	
	$(document).ready(function() {
      const button = document.querySelectorAll( '.cart-button' );
	  const siteOverlay = $( '.site-overlay' );
	  
      if ( button !== null ) {
        for( var i = 0; i < button.length; i++ ) {
          const self = button[i];

          const cartSide = document.querySelector( '.cart-widget-side' );
          const close = cartSide.querySelector( '.cart-side-close' );

		  var tl = gsap.timeline( { paused: true, reversed: true } );
		  tl.set( cartSide, {
			autoAlpha: 1
		  }).to( cartSide, .5, {
			x:0,
					ease: 'power4.inOut'
		  }).to( siteOverlay, .5, {
			autoAlpha: 1,
			ease: 'power4.inOut'
		  }, "-=.5");
		  
          self.addEventListener( 'click', (e) => {
            e.preventDefault();
			siteOverlay.addClass( 'active' );
			tl.reversed() ? tl.play() : tl.reverse();
          });

          close.addEventListener( 'click', (e) => {
            e.preventDefault();
            tl.reverse();
          });
		  
		  $('.site-overlay').on( 'click', function(e) {
			e.preventDefault();
			tl.reverse();
			setTimeout( function() {
			 $('.site-overlay').removeClass( 'active' );
			}, 1000);
		  });
		  
        }
      }
	  
	  $('.cart-dropdown').remove();
	  
	});

})(jQuery);
