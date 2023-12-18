<?php

/**s
 * functions.php
 * @package WordPress
 * @subpackage Machic
 * @since Machic 1.0
 * 
 */

add_action( 'wp_enqueue_scripts', 'machic_enqueue_styles', 99 );
function machic_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_style_add_data( 'parent-style', 'rtl', 'replace' );
}


function display_vat_included_text($price_html, $product) {   
    global $woocommerce_loop; 
    if (is_product() && !$woocommerce_loop['name'] == 'related') {
        $price_html .= '<div class="id-lp-30-text"> U cijenu je uključen PDV </div>';
    }
    return $price_html;
}

// add_filter('woocommerce_get_price_html', 'display_vat_included_text', 10, 2);

function custom_translate_text($translated_text, $text, $domain) {
    $translations = array(
        'All Departments' => 'Sve kategorije',
    );

    if ($domain === 'machic' || $domain === 'machic-core') {
        foreach ($translations as $search_string => $replace_string) {
            $translated_text = str_replace($search_string, $replace_string, $translated_text);
        }
    }
    
    return $translated_text;
}
add_filter('gettext', 'custom_translate_text', 20, 3);

?>