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
        'Search your favorite product...' => 'Pretraži proizvode',
        'All Departments' => 'Sve kategorije',
        'In Stock' => 'Dostupno',
        'Out of stock' => 'Nedostupno',
        'Recently Viewed Products' => 'Nedavno pregledani proizvodi',
        'On Sale' => 'Na akciji',
        'Site Navigation' => 'Podstranice',
        'Filter Products' => 'Filtriraj proizvode',
        'Sort by' => 'Poredaj',
        'Go to homepage' => 'Povratak na naslovnicu',
        'Home' => 'Naslovnica',
        'Store' => 'Proizvodi',
        'Categories' => 'Kategorije',
        'Search' => 'Pretraži',
        'Wishlist' => 'Želje',
        'Account' => 'Račun',
        'Remains until the end of the offer' => 'Do kraja akcije!',
        /* Woo */
        'No products in the cart' => 'Košarica je prazna',
        'Your order' => 'Vaša narudžba',
        'Return to shop' => 'Vrati se u trgovinu',
        'Coupon code' => 'Kupon kod',
        'Show' => 'Prikaži',
        'Remove All' => 'Ukloni sve',
        'Cart Updated' => 'Košarica ažurirana',
        'View cart' => 'Vidi košaricu',
        'No results found for' => 'Nema rezultata za',
        'Clear filters' => 'Ukloni filtere',
        'Total' => 'Ukupno',
        'Items' => 'proizvoda', // TODO: check!
        'Your cart is currently empty' => 'Košarica je prazna',
        'Related products' => 'Povezani proizvodi',
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