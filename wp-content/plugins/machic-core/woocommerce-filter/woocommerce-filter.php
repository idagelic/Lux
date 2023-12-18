<?php

/*************************************************
## Machic Get options
*************************************************/
function machic_ft(){	
	$getft  = isset( $_GET['ft'] ) ? $_GET['ft'] : '';

	return esc_html($getft);
}

/*************************************************
## Scripts
*************************************************/
function machic_custom_scripts() {
	wp_register_style( 'klb-widget-product-categories',   plugins_url( 'widgets/product-categories/css/widget-product-categories.css', __FILE__ ), false, '1.0');
	wp_style_add_data( 'klb-widget-product-categories', 'rtl', 'replace' );	
	wp_register_script( 'klb-widget-product-categories',  plugins_url( 'widgets/product-categories/js/widget-product-categories.js', __FILE__ ), true );
	wp_register_style( 'klb-remove-filter',   plugins_url( 'grid-list/css/remove-filter.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'machic_custom_scripts' );


/* Product Categories Widget */
require_once( __DIR__ . '/widgets/product-categories/widget-product-categories.php');

/* Product Status Widget */
require_once( __DIR__ . '/widgets/product-status/widget-product-status.php');

/* Grid List View */
require_once( __DIR__ . '/grid-list/grid-list-view.php' );

/* Mobile Filter */
require_once( __DIR__ . '/mobile-filter/mobile-filter.php' );

/* Load More */
require_once( __DIR__ . '/load-more/load-more.php' );

/* Product Data Tabs*/
require_once( __DIR__ . '/product-data/product-data-video.php' );

/* Image Zoom */
require_once( __DIR__ . '/image-zoom/image-zoom.php' );

/* Single Ajax */
if(get_theme_mod('machic_shop_single_ajax_addtocart') == 1){
	require_once( __DIR__ . '/single-ajax/single-ajax.php' );
}

/* Product360 View */
if(get_theme_mod('machic_shop_single_product360',0) == 1){
	require_once( __DIR__ . '/product360/product360.php' );
}

/* Notice Ajax */
if(get_theme_mod('machic_shop_notice_ajax_addtocart',0) == 1 || machic_ft() == 'notice_ajax'){
	require_once( __DIR__ . '/notice-ajax/notice-ajax.php' );
}

/* Recently Viewed */
if(get_theme_mod('machic_recently_viewed_products',0) == 1){
	require_once( __DIR__ . '/recently-viewed/recently-viewed.php' );
}

/* Min/Max Quantity */
if(get_theme_mod('machic_min_max_quantity',0) == 1){
	require_once( __DIR__ . '/minmax-quantity/minmax-quantity.php' );
}

/* Min Amount */
if(get_theme_mod('machic_min_order_amount_toggle',0) == 1){
	require_once( __DIR__ . '/min-amount/min-amount.php' );
}

/* Side Cart */
if(get_theme_mod('machic_header_mini_cart_type',0) == 'sidecart'){
	require_once( __DIR__ . '/side-cart/side-cart.php' );
}

/* Buy Now Single */
if(get_theme_mod('machic_shop_single_buy_now',0) == 1 || machic_ft() == 'buynow'){
	require_once( __DIR__ . '/buy-now/buy-now.php' );
}

/* Back to top */
if(get_theme_mod('machic_scroll_to_top',0) == 1){
	require_once( __DIR__ . '/back-to-top/back-to-top.php' );
}

/* Registration Fields */
if(get_theme_mod('machic_registration_first_name') == 'visible' || get_theme_mod('machic_registration_last_name') == 'visible' || get_theme_mod('machic_registration_billing_company') == 'visible' || get_theme_mod('machic_registration_billing_phone') == 'visible'){
	require_once( __DIR__ . '/registration-fields/registration-fields.php' );
}

/* Attribute Swatches */
if(get_theme_mod('machic_attribute_swatches',0) == 1){
	require_once( __DIR__ . '/swatches/swatches.php' );
}

/* Free Shipping */
if(get_theme_mod('machic_free_shipping',0) == 1){
	require_once( __DIR__ . '/shipping-progress-bar/free-shipping.php' );
}

/* Remove All button */
if(get_theme_mod('machic_remove_all_button',0) == 1){
	require_once( __DIR__ . '/remove-all/remove-all.php' );
}

/* Sticky Single Cart */
if(get_theme_mod('machic_single_sticky_cart',0) == 1 || machic_ft() == 'stickycart'){
	require_once( __DIR__ . '/sticky-single-cart/sticky-single-cart.php' );
}

/* Ajax Login */
if(get_theme_mod('machic_ajax_login_form',0) == 1){
	require_once( __DIR__ . '/ajax-login/ajax-login.php' );
}

/* Ajax Search */
if(get_theme_mod('machic_ajax_search_form',0) == 1){
	require_once( __DIR__ . '/ajax-search/ajax-search.php' );
}

/* Product Badge */
if(get_theme_mod('machic_product_badge_tab', 0) == 1){
	require_once( __DIR__ . '/product-badge/product-badge.php' );
}

/* Compare */
if(get_theme_mod( 'machic_compare_button', '0' ) == 1 && !function_exists('woosc_init')){
	require_once( __DIR__ . '/compare/compare.php' );
}

/* Wishlist */
if(get_theme_mod('machic_wishlist_button', 0) == 1 && !function_exists('run_tinv_wishlist')){
	require_once( __DIR__ . '/wishlist/wishlist.php' );
}

/*************************************************
## Machic Stock Status
*************************************************/ 
function machic_stock_status(){
	$stock_status  = isset( $_GET['stock_status'] ) ? $_GET['stock_status'] : '';

	if($stock_status == 'instock'){
		return $stock_status;
	}
}

/*************************************************
## Machic on Sale
*************************************************/ 
function machic_on_sale(){
	$on_sale  = isset( $_GET['on_sale'] ) ? $_GET['on_sale'] : '';

	if($on_sale == 'onsale'){
		return $on_sale;
	}
}

/*************************************************
## Machic GET Cat URL
*************************************************/ 
function machic_get_cat_url($termid){
	global $wp;
	if ( '' === get_option( 'permalink_structure' ) ) {
		$link = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
	} else {
		$link = preg_replace( '%\/page/[0-9]+%', '', add_query_arg( null, null ) );
	}

	if(isset($_GET['filter_cat'])){
		$explode_old = explode(',',$_GET['filter_cat']);
		$explode_termid = explode(',',$termid);
		
		if(in_array($termid, $explode_old)){
			$data = array_diff( $explode_old, $explode_termid);
			$checkbox = 'checked';
		} else {
			$data = array_merge($explode_termid , $explode_old);
		}
	} else {
		$data = array($termid);
	}
	
	$dataimplode = implode(',',$data);
	
	if(empty($dataimplode)){
		$link = remove_query_arg('filter_cat',$link);
	} else {
		$link = add_query_arg('filter_cat',implode(',',$data),$link);
	}
	
	return $link;
}

/*************************************************
## Machic Remove Filter
*************************************************/ 
add_action('klb_before_products','machic_remove_klb_filter');
function machic_remove_klb_filter(){
	
	$output = '';

	wp_enqueue_style( 'klb-remove-filter');

	$_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
    $min_price = isset( $_GET['min_price'] ) ? wc_clean( $_GET['min_price'] ) : 0; 
    $max_price = isset( $_GET['max_price'] ) ? wc_clean( $_GET['max_price'] ) : 0; 

	if(! empty( $_chosen_attributes ) || isset($_GET['filter_cat']) || 0 < $min_price || 0 < $max_price || machic_stock_status() == 'instock' || machic_on_sale() == 'onsale'){

		global $wp;
	
		if ( '' === get_option( 'permalink_structure' ) ) {
			$baselink = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
		} else {
			$baselink = preg_replace( '%\/page/[0-9]+%', '',  add_query_arg( null, null )  );
		}

		$output .= '<ul class="remove-filter">';
		
		$output .= '<li><a href="'.esc_url(remove_query_arg(array_keys($_GET))).'" class="remove-filter-element clear-all">'.esc_html__( 'Clear filters', 'machic-core' ).'</a></li>';

		if ( ! empty( $_chosen_attributes ) ) {
			foreach ( $_chosen_attributes as $taxonomy => $data ) {
				foreach ( $data['terms'] as $term_slug ) {
					$term = get_term_by( 'slug', $term_slug, $taxonomy );
					
					$filter_name    = 'filter_' . wc_attribute_taxonomy_slug( $taxonomy );
					$explode_old = explode(',',$_GET[$filter_name]);
					$explode_termid = explode(',',$term->slug);
					$klbdata = array_diff( $explode_old, $explode_termid);
					$klbdataimplode = implode(',',$klbdata);
					
					if(empty($klbdataimplode)){
						$link = remove_query_arg($filter_name);
					} else {
						$link = add_query_arg($filter_name,implode(',',$klbdata),$baselink );
					}

					$output .= '<li><a href="'.esc_url($link).'" class="remove-filter-element attributes">'.esc_html($term->name).'</a></li>';

				}
			}
		}

		if(machic_stock_status() == 'instock'){
		$output .= '<li><a href="'.esc_url(remove_query_arg('stock_status')).'" class="remove-filter-element stock_status">'.esc_html__('In Stock','machic-core').'</a></li>';
		}
		
		if(machic_on_sale() == 'onsale'){
		$output .= '<li><a href="'.esc_url(remove_query_arg('on_sale')).'" class="remove-filter-element on_sale">'.esc_html__('On Sale','machic-core').'</a></li>';
		}

		if($min_price){
		$output .= '<li><a href="'.esc_url(remove_query_arg('min_price')).'" class="remove-filter-element min_price">' . sprintf( __( 'Min %s', 'woocommerce' ), wc_price( $min_price ) ) . '</a></li>';
		}
		
		if($max_price){
		$output .= '<li><a href="'.esc_url(remove_query_arg('max_price')).'" class="remove-filter-element max_price">' . sprintf( __( 'Max %s', 'woocommerce' ), wc_price( $max_price ) ) . '</a></li>';
		}
		
		if(isset($_GET['filter_cat'])){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => false,
				'parent'    => 0,
				'include' 	=> explode(',',$_GET['filter_cat']),
			) );
			
			foreach ( $terms as $term ) {
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				$output .= '<li><a href="'.esc_url( machic_get_cat_url($term->term_id) ).'" class="remove-filter-element product_cat" id="'.esc_attr($term->term_id).'">'.esc_html($term->name).'</a></li>';
				if($term_children){
					foreach($term_children as $child){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						if(in_array($childterm->term_id, explode(',',$_GET['filter_cat']))){ 
							$output .= '<li><a href="'.esc_url( machic_get_cat_url($childterm->term_id) ).'" class="remove-filter-element product_cat" id="'.esc_attr($childterm->term_id).'">'.esc_html($childterm->name).'</a></li>';
						}
					}
				}
			}
		
		}
		
		$output .= '</ul>';
	}
	
	echo $output;
}

/*************************************************
## Machic Product Query
*************************************************/ 
function machic_product_query( $q ){
	if(machic_stock_status() == 'instock'){
		$q->set( 'meta_query', array (
			array(
				'meta_key' 	=> '_stock_status',
				'value' 	=> 'instock',
			)
		));
	}
	
	if(machic_on_sale() == 'onsale'){
		$q->set ( 'post__in', wc_get_product_ids_on_sale() );
	}

}
add_action( 'woocommerce_product_query', 'machic_product_query', 10, 2 );


/*************************************************
## Machic Product Tax Query
*************************************************/ 
function machic_woocommerce_product_query_tax_query( $tax_query, $instance ) {
	
	if(isset($_GET['filter_cat'])){
		if(!empty($_GET['filter_cat'])){
			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field' 	=> 'id',
				'terms' 	=> explode(',',$_GET['filter_cat']),
			);
		}
	}
			
	if(isset($_GET['featured'])){
		if(!empty($_GET['featured'])){
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field' 	=> 'name',
				'terms'    => array( 'featured' ),
				'operator' => 'IN',
			);
		}
	}
	
	
	
	
    return $tax_query; 
}; 
add_filter( 'woocommerce_product_query_tax_query', 'machic_woocommerce_product_query_tax_query', 10, 2 );

/*************************************************
## Machic Current Page URL
*************************************************/ 
add_filter( 'woocommerce_widget_get_current_page_url', 'machic_current_page_url', 10, 2 );
function machic_current_page_url( $link, $that ){
	if ( isset( $_GET['filter_cat'] ) ) {
		$link = add_query_arg( 'filter_cat', wc_clean( wp_unslash( $_GET['filter_cat'] ) ), $link );
	}

	if ( isset( $_GET['shop_view'] ) ) {
		$link = add_query_arg( 'shop_view', wc_clean( wp_unslash( $_GET['shop_view'] ) ), $link );
	}

	if ( isset( $_GET['on_sale'] ) ) {
		$link = add_query_arg( 'on_sale', wc_clean( wp_unslash( $_GET['on_sale'] ) ), $link );
	}
	
	if ( isset( $_GET['stock_status'] ) ) {
		$link = add_query_arg( 'stock_status', wc_clean( wp_unslash( $_GET['stock_status'] ) ), $link );
	}

	if ( isset( $_GET['ft'] ) ) {
		$link = add_query_arg( 'ft', wc_clean( wp_unslash( $_GET['ft'] ) ), $link );
	}

	if ( isset( $_GET['column'] ) ) {
		$link = add_query_arg( 'column', wc_clean( wp_unslash( $_GET['column'] ) ), $link );
	}
	
	if ( isset( $_GET['perpage'] ) ) {
		$link = add_query_arg( 'perpage', wc_clean( wp_unslash( $_GET['perpage'] ) ), $link );
	}
	
	return $link;
}

/*************************************************
## Machic Column options
*************************************************/
function machic_get_column_option(){	
	$getopt  = isset( $_GET['column'] ) ? $_GET['column'] : '';

	return esc_html($getopt);
}

if(machic_get_column_option()){
	add_filter('loop_shop_columns', 'loop_columns', 999);
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return machic_get_column_option(); // 3 products per row
		}
	}
}

/*************************************************
## Machic Perpage options
*************************************************/
function machic_get_perpage_option(){	
	$getopt  = isset( $_GET['perpage'] ) ? $_GET['perpage'] : '';

	return esc_html($getopt);
}

if(machic_get_perpage_option()){
	add_filter( 'loop_shop_per_page', 'machic_loop_shop_per_page', 20 );
	function machic_loop_shop_per_page( $cols ) {
	  $cols = machic_get_perpage_option();
	  return $cols;
	}
}

/*************************************************
## Machic Order on WhatsApp
*************************************************/
if(get_theme_mod('machic_shop_single_orderonwhatsapp', 0) == 1 || machic_ft() == 'orderonwhatsapp'){
	add_action('woocommerce_single_product_summary', 'machic_order_on_whatsapp', 30);
	function machic_order_on_whatsapp(){
		$number = get_theme_mod('machic_shop_single_whatsapp_number');
		
		echo '<div class="orderon-whatsapp">';
		echo '<a href="https://wa.me/'.esc_attr($number).'?text='.get_the_title().' '.get_permalink().'" class="button button-primary">'.esc_html__('Order on WhatsApp','machic-core').'</a>';
		echo '</div>';
	}
}

/*************************************************
## Move Review Tab outsite of tab
*************************************************/
if(get_theme_mod('machic_shop_single_review_tab_move', 0) == 1 || machic_ft() == 'movereviewtab'){
	add_action( 'woocommerce_after_single_product_summary', 'machic_move_review_tab', 5 );
	function machic_move_review_tab(){
	  comments_template();
	}

	add_filter( 'woocommerce_product_tabs', 'machic_remove_product_tabs', 98 );
	function machic_remove_product_tabs( $tabs ){
		unset( $tabs['reviews'] );

		return $tabs;
	}
}

/*************************************************
## Hide Other Shipping Methods if Free shipping is available
*************************************************/
function machic_hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is available.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}
	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it is available
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}
	return $rates;
}
add_filter( 'woocommerce_package_rates', 'machic_hide_shipping_when_free_is_available', 10, 2 );


/*************************************************
## Redirect URL After Login
*************************************************/
add_filter('woocommerce_login_redirect', 'machic_myaccount_redirect_after_login');
function machic_myaccount_redirect_after_login($redirect_to) {
	if(get_theme_mod('machic_redirect_url_after_login')){
		return esc_url(get_theme_mod('machic_redirect_url_after_login'));
	} else {
		return wc_get_page_permalink( 'myaccount' );	
	}
}

/*************************************************
## Product Stock Progress Bar
*************************************************/
function machic_product_stock_progress_bar(){
	global $product;
	$managestock = $product->managing_stock();
	$total_sales = $product->get_total_sales();
	$stock_quantity = $product->get_stock_quantity();
		
	$output = '';

	if($managestock && $stock_quantity > 0) {

		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100));

		$output .= '<div class="klb-stock-progress-bar">';
		$output .= '<div class="product-pcs">';
		$output .= '<div class="sold">'.esc_html__('Sold:','machic-core').' <strong>'.esc_html($total_sales).'</strong></div>';
		$output .= '<div class="available">'.esc_html__('Available:','machic-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
		$output .= '</div>';
		$output .= '<div class="product-progress">';
		$output .= '<span class="progress" style="width: '.$progress_percentage.'%;"></span>';
		$output .= '</div><!-- product-progress -->';
		$output .= '</div><!-- product-count -->';
	}
	
	echo $output;
		
}

/*************************************************
## Product Time Countdown
*************************************************/
function machic_product_time_countdown(){		
	$id = get_the_ID();
	$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		
	$output = '';

	if($sale_price_dates_to){
		wp_enqueue_script( 'machic-counter');
		$output .= '<div class="klb-product-time-countdown product-expired">';
		$output .= '<div class="countdown" data-date="'.esc_attr($sale_price_dates_to).'">';
		$output .= '<div class="count-item days"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item hours"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item minutes"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item second"></div>';
		$output .= '</div><!-- countdown -->';
		$output .= '<div class="expired-text">'.esc_html__('Remains until the end of the offer','machic-core').'</div>';
		$output .= '</div><!-- product-expired -->';
	}
	
	echo $output;
}