/* KLB Addons for Elementor v1.0 */

jQuery.noConflict();
!(function ($) {
	"use strict";

	
	/* CAROUSEL*/
	function klb_carousel($scope, $) {
      const container = document.querySelectorAll( '.swiper-container' );

      if ( container !== null ) {
        container.forEach( ( event ) => {
          const loader = '<svg xmlns="http://www.w3.org/2000/svg" class="spinner" width="50" height="50" viewBox="0 0 44 44"><circle class="spinner-path" cx="22" cy="22" r="20" fill="none" stroke-width="3"></circle></svg>';
          const sliderLoader = document.createElement( 'div' );
          sliderLoader.classList.add( 'slider-loader' );

          sliderLoader.innerHTML = loader;
          event.prepend( sliderLoader );

          const items = event.querySelectorAll( '.swiper-slide' );
          imagesLoaded( items, () => {
            event.classList.add( 'slider-loaded' );
          });

          // Slider options
          let direction = event.dataset.direction;
          let effect = event.dataset.effect;
          let loop = event.dataset.loop === 'true' ? true : false;

          let desktopItems = parseInt( event.dataset.items );
          let mobileItems = parseInt( event.dataset.mobileitems );
          let tabletItems = parseInt( event.dataset.tabletitems );
          let speed = parseInt( event.dataset.speed );
          let spaceBetween = parseInt( event.dataset.spacebetween );

          // Autoplay Option
          let autoplay = event.dataset.autoplay === 'true' ? true : false;
          let autospeed = parseInt( event.dataset.autospeed );
          let autoPlaySettings = false;

          if ( autoplay ) {
            autoPlaySettings = {
              delay: autospeed,
              pauseOnMouseEnter: true
            }
          }

          // Init slider
          const swiper = new Swiper( event, {
            // Optional parameters
            direction: direction,
            loop: loop,
            speed: speed,
            effect: effect,
            autoplay: autoPlaySettings,
            spaceBetween: spaceBetween,
          
            // If we need pagination
            pagination: {
              el: '.swiper-pagination',
              clickable: true
            },
          
            // Navigation arrows
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },

            // Breakpoints
            breakpoints: {
              320: {
                slidesPerView: 1
              },
              480: {
                slidesPerView: mobileItems
              },
              640: {
                slidesPerView: mobileItems
              },
              768: {
                slidesPerView: tabletItems
              },
              1024: {
                slidesPerView: tabletItems
              },
              1200: {
                slidesPerView: desktopItems
              },
              1280: {
                slidesPerView: desktopItems
              }
            }
          });
        });
      }
	}
	
	
	/* COUNTDOWN*/
	function klb_countdown($scope, $) {
      const countdown = document.querySelectorAll( '.countdown' );

      if ( countdown !== null ) {
        for ( var i = 0; i < countdown.length; i++ ) {
          const self = countdown[i];

          const countDate = self.dataset.date;
          const expired = self.dataset.text;
          let countDownDate = new Date( countDate ).getTime();

          const d = self.querySelector( '.days' );
          const h = self.querySelector( '.hours' );
          const m = self.querySelector( '.minutes' );
          const s = self.querySelector( '.second' );

          var x = setInterval(function() {

            var now = new Date().getTime();
  
            var distance = countDownDate - now;
  
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            d.innerHTML = ( '0' + days ).slice(-2);
            h.innerHTML = ( '0' + hours ).slice(-2);
            m.innerHTML = ( '0' + minutes ).slice(-2);
            s.innerHTML = ( '0' + seconds ).slice(-2);
  
            if (distance < 0) {
              clearInterval(x);
              console.log( 'expired' );
              self.innerHTML = '<div class="expired">' + expired + '</div>'
              /* document.getElementById("demo").innerHTML = expired; */
            }
          }, 1000);
        }
      }
	}
	
	
	/* PRODUCT HOVER*/
	function klb_product_hover($scope, $) {
      var product = $( '.products .product' );

      product.each( function(e) {
        var fadeBlock = $(this).find( '.product-footer' );
        var contentBlock = $(this).find( '.product-content-fade' );
        var outerHeight = 0;

        const parent = contentBlock.closest( '.product' );

        parent.addClass( 'custom-hover' );

        if ( fadeBlock.length ) {
          fadeBlock.each( function(e) {
            var self = $(this);
            outerHeight += self.outerHeight();

            contentBlock.css( 'marginBottom', -outerHeight );
          });
        }
      });
	}


    jQuery(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/machic-home-slider.default', klb_carousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-product-carousel.default', klb_carousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-counter-product.default', klb_countdown);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-counter-product2.default', klb_countdown);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-product-grid.default', klb_countdown);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-product-grid.default', klb_product_hover);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-counter.default', klb_countdown);
        elementorFrontend.hooks.addAction('frontend/element_ready/machic-product-list2.default', klb_countdown);

    });

})(jQuery);
