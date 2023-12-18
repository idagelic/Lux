<?php

/*************************************************
## Scripts
*************************************************/
function machic_side_cart_scripts() {
	wp_enqueue_style( 'klb-side-cart',   plugins_url( 'css/side-cart.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-side-cart',   plugins_url( 'js/side-cart.js', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'machic_side_cart_scripts' );

if ( ! function_exists( 'machic_side_cart' ) ) {
	function machic_side_cart(){
		?>
			<div class="cart-widget-side">
				<div class="site-scroll">
					<div class="cart-side-header">
						<div class="cart-side-title"><?php esc_html_e('Shopping Cart', 'machic-core'); ?></div>
						<div class="cart-side-close"><i class="klbth-icon-cancel"></i></div>
					</div><!-- cart-side-header -->
					<div class="cart-side-body">
						<div class="fl-mini-cart-content">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div><!-- cart-side-body -->
				</div><!-- site-scroll -->
			</div><!-- cart-widget-side -->
		<?php 
	}
}
add_action('wp_footer', 'machic_side_cart');