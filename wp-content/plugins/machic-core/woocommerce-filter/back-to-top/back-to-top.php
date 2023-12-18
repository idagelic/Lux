<?php
/*************************************************
## Scripts
*************************************************/
function machic_back_to_top_scripts() {
	wp_enqueue_script( 'klb-back-to-top',   plugins_url( 'js/back-to-top.js', __FILE__ ), false, '1.0');
	wp_enqueue_style( 'klb-back-to-top',    plugins_url( 'css/back-to-top.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'machic_back_to_top_scripts' );

// **********************************************************************//
// ! Back to top 
// **********************************************************************//

add_action( 'wp_footer', 'machic_back_top_btn' );

if( ! function_exists( 'machic_back_top_btn' ) ) {
	function machic_back_top_btn() {

		?>
		<a href="#" class="scrollToTop" aria-label="<?php esc_html_e( 'Scroll to top button', 'machic-core' ); ?>"><i class="klbth-icon-nav-arrow-up"></i></a>
		<?php
	}
}