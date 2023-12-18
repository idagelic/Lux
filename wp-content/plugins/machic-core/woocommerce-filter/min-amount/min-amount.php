<?php

/*************************************************
## Set a minimum order amount for checkout
*************************************************/

add_action( 'woocommerce_checkout_process', 'machic_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'machic_minimum_order_amount' );
 
function machic_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = get_theme_mod('machic_min_order_amount_value',5020);

    if ( WC()->cart->total < $minimum ) {

        if( is_cart() ) {

            wc_print_notice( 
                sprintf( esc_html__('Your current order total is %s - you must have an order with a minimum of %s to place your order ', 'machic-core') , 
                    wc_price( WC()->cart->total ), 
                    wc_price( $minimum )
                ), 'error' 
            );

        } else {

            wc_add_notice( 
                sprintf( esc_html__('Your current order total is %s - you must have an order with a minimum of %s to place your order', 'machic-core') , 
                    wc_price( WC()->cart->total ), 
                    wc_price( $minimum )
                ), 'error' 
            );

        }
    }
}