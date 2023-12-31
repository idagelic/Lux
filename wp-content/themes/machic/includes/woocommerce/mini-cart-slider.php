<div class="cart-slider swiper-container klb-mini-cart" data-effect="slide" data-direction="vertical" data-loop="false" data-speed="1000" data-spacebetween="0" data-autoplay="false" data-autospeed="300" data-items="2" data-mobileitems="2" data-tabletitems="2">
	<div class="swiper-wrapper">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<div class="swiper-slide">
					<div class="product woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="product-wrapper">
							<div class="product-content">
								<div class="thumbnail-wrapper">
									<?php if ( empty( $product_permalink ) ) : ?>
										<?php echo machic_sanitize_data($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $product_permalink ); ?>">
											<?php echo machic_sanitize_data($thumbnail); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</a>
									<?php endif; ?>
								</div><!-- thumbnail-wrapper -->
								<div class="content-wrapper">
									<h3 class="product-title"><a href="<?php echo esc_url($product_permalink); ?>"><?php echo esc_html($product_name); ?></a></h3>
									<div class="entry-price">
										
										<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</div>
									
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="klbth-icon-cancel"></i></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											/* translators: %s is the product name */
											esc_attr( sprintf( __( 'Remove %s from cart', 'machic' ), wp_strip_all_tags( $product_name ) ) ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
									?>
									
									<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div><!-- content-wrapper -->
							</div><!-- product-content -->
						</div><!-- product-wrapper -->
					</div><!-- product -->
				</div><!-- swiper-slide -->
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div>