(function ($) {
  "use strict";
	
	$(document).ready(function() {
		
		$(document).on('click', 'input.klbicon-picker', function(event){
			event.preventDefault(); 
			$(this).closest('.machic-field-iconfield').find('.klb-iconsholder-wrapper').slideToggle();
		});
		
		
		$(document).on('click', '.klb-iconbox', function(event){	
			$(this).closest('.machic-field-iconfield').find('input.klbicon-picker').val($(this).find('i').attr('class'));
			$(this).closest('.machic-field-iconfield').find('.klb-iconsholder-wrapper').slideToggle();
		});
		
		
		var klbicon = 'klbth-icon-mail klbth-icon-heart-empty klbth-icon-star klbth-icon-star-empty klbth-icon-star-half klbth-icon-heart-1 klbth-icon-video klbth-icon-picture klbth-icon-videocam klbth-icon-camera-1 klbth-icon-bookmark klbth-icon-trash-empty klbth-icon-right-dir klbth-icon-left-dir klbth-icon-up-dir klbth-icon-down-dir klbth-icon-left-arrow klbth-icon-user-1 klbth-icon-shipment klbth-icon-ev-plug klbth-icon-multi-window klbth-icon-on-rounded klbth-icon-off-rounded klbth-icon-settings-profiles klbth-icon-settings klbth-icon-system-restart klbth-icon-calculator klbth-icon-cpu klbth-icon-calendar klbth-icon-hd klbth-icon-hdr klbth-icon-panorama-enlarge klbth-icon-panorama-reduce klbth-icon-video-camera klbth-icon-fx klbth-icon-expand klbth-icon-enlarge klbth-icon-camera-2 klbth-icon-activity klbth-icon-bookmark-empty klbth-icon-nav-arrow-up klbth-icon-nav-arrow-right klbth-icon-nav-arrow-left klbth-icon-music-1 klbth-icon-iris-scan klbth-icon-voice klbth-icon-home klbth-icon-home-simple-door klbth-icon-box klbth-icon-vr-symbol klbth-icon-printing-page klbth-icon-modern-tv klbth-icon-modern-tv-4k klbth-icon-hard-drive klbth-icon-computer klbth-icon-chromecast klbth-icon-ar-symbol klbth-icon-apple-imac-2021 klbth-icon-4k-display klbth-icon-electronics-transister klbth-icon-electronics-chip klbth-icon-ruler-combine klbth-icon-copy klbth-icon-data-transfer-both klbth-icon-phone klbth-icon-mail-opened klbth-icon-large-suitcase klbth-icon-bag klbth-icon-small-shop-alt klbth-icon-shop klbth-icon-percentage klbth-icon-stats-square-down klbth-icon-upload klbth-icon-trash klbth-icon-refresh klbth-icon-share-ios klbth-icon-question-mark klbth-icon-plus klbth-icon-minus klbth-icon-menu-scale klbth-icon-eye-off klbth-icon-check klbth-icon-cancel klbth-icon-download klbth-icon-log-out klbth-icon-profile-circled klbth-icon-shopping-bag-alt klbth-icon-home-alt-slim-horiz klbth-icon-precision-tool klbth-icon-eye-empty klbth-icon-message klbth-icon-clock-outline klbth-icon-check-circled-outline klbth-icon-view-grid klbth-icon-list klbth-icon-filter klbth-icon-globe klbth-icon-credit-card klbth-icon-box-iso klbth-icon-delivery-box-3 klbth-icon-shopping-bag-arrow-up klbth-icon-data-transfer-up klbth-icon-menu klbth-icon-navigator-alt klbth-icon-suggestion klbth-icon-pin-alt klbth-icon-repeat klbth-icon-repeat-1 klbth-icon-heart klbth-icon-user klbth-icon-simple-cart klbth-icon-shopping-bag klbth-icon-nav-arrow-down klbth-icon-search klbth-icon-grid klbth-icon-discount34 klbth-icon-headphones-1 klbth-icon-delivery-truck3 klbth-icon-earth-grid-symbol klbth-icon-ticket klbth-icon-movie-tickets klbth-icon-cinema klbth-icon-payment-security klbth-icon-cutting-with-a-scissor-on-broken-line klbth-icon-delivery-return klbth-icon-box-1 klbth-icon-download-1 klbth-icon-shopping-bag-3 klbth-icon-clock klbth-icon-right-arrow klbth-icon-star-1 klbth-icon-delivery-box-1 klbth-icon-fast-delivery klbth-icon-delivered klbth-icon-discount-black klbth-icon-discount klbth-icon-delivery-truck klbth-icon-source_icons_more-horiz klbth-icon-shop-1 klbth-icon-shopping-cart klbth-icon-credit-card-2 klbth-icon-24-hours klbth-icon-delivery-1 klbth-icon-delivery-man-1 klbth-icon-delivery-truck-1 klbth-icon-invoice klbth-icon-operator-1 klbth-icon-operator klbth-icon-package-1 klbth-icon-package-2 klbth-icon-package-5 klbth-icon-package klbth-icon-worldwide klbth-icon-chat klbth-icon-clockwise klbth-icon-umbrella klbth-icon-quality klbth-icon-shield klbth-icon-ship klbth-icon-stopclock-1 klbth-icon-package-29 klbth-icon-battery klbth-icon-server klbth-icon-chip klbth-icon-gameboy klbth-icon-sd-card klbth-icon-socket-1 klbth-icon-ipod klbth-icon-usb klbth-icon-air-conditioner klbth-icon-cable klbth-icon-remote klbth-icon-controller klbth-icon-projector klbth-icon-power-bank klbth-icon-mouse klbth-icon-micro-sd klbth-icon-play-station klbth-icon-tamagotchi klbth-icon-web-camera klbth-icon-hard-disk klbth-icon-camcorder klbth-icon-screen klbth-icon-smartphone klbth-icon-laptop klbth-icon-pc klbth-icon-battery-1 klbth-icon-virtual-reality klbth-icon-headphones klbth-icon-camera klbth-icon-printer klbth-icon-tablet klbth-icon-loudspeaker klbth-icon-socket klbth-icon-fan klbth-icon-fuse klbth-icon-plug klbth-icon-calculator-1 klbth-icon-smartwatch klbth-icon-router klbth-icon-dvd-player klbth-icon-hair-dryer klbth-icon-keyboard klbth-icon-cctv klbth-icon-gps klbth-icon-router-1 klbth-icon-fax klbth-icon-timer klbth-icon-radio klbth-icon-microphone klbth-icon-walkie-talkie klbth-icon-left-open-big klbth-icon-right-open-big klbth-icon-up-open-big klbth-icon-down-open-big klbth-icon-right-open klbth-icon-left-open klbth-icon-down-open klbth-icon-up-open klbth-icon-bookmark-empty-1 klbth-icon-twitter klbth-icon-facebook klbth-icon-github-circled klbth-icon-gplus klbth-icon-linkedin klbth-icon-angle-left klbth-icon-angle-right klbth-icon-angle-up klbth-icon-angle-down klbth-icon-quote-left klbth-icon-quote-right klbth-icon-code klbth-icon-star-half-alt klbth-icon-unlink klbth-icon-maxcdn klbth-icon-youtube klbth-icon-xing klbth-icon-youtube-play klbth-icon-stackoverflow klbth-icon-instagram klbth-icon-tumblr klbth-icon-windows klbth-icon-dribbble klbth-icon-skype klbth-icon-foursquare klbth-icon-vkontakte klbth-icon-slack klbth-icon-wordpress klbth-icon-openid klbth-icon-google klbth-icon-stumbleupon klbth-icon-digg klbth-icon-behance klbth-icon-deviantart klbth-icon-soundcloud klbth-icon-vine klbth-icon-git klbth-icon-twitch klbth-icon-paypal klbth-icon-gwallet klbth-icon-cc-visa klbth-icon-cc-mastercard klbth-icon-cc-discover klbth-icon-cc-amex klbth-icon-cc-paypal klbth-icon-cc-stripe klbth-icon-trash-1 klbth-icon-forumbee klbth-icon-skyatlas klbth-icon-pinterest klbth-icon-whatsapp klbth-icon-tripadvisor klbth-icon-odnoklassniki',
			klbiconArray = klbicon.split(' '); // creating array

		// This loop will add icons inside BOX
		for (var i = 0; i < klbiconArray.length; i++) {
			$(".klb-iconsholder").append('<div class="klb-iconbox"><p class="icon"><i class="' + klbiconArray[i] + '"></i>'+klbiconArray[i]+'</p></div>');
		}

		var timeout;
		$("input.iconsearch").on("keyup", function() {
			if(timeout) {
				clearTimeout(timeout);
			}
			
			var value = this.value.toLowerCase().trim();
			var iconbox = $(this).closest('.machic-field-iconfield').find('.klb-iconbox');
			timeout = setTimeout(function() {
			  $(iconbox).show().filter(function() {
				return $(this).text().toLowerCase().trim().indexOf(value) == -1;
			  }).hide();
			}, 500);
		});

	});

})(jQuery);
