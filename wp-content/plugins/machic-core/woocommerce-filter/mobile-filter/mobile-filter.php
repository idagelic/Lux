<?php
/*************************************************
* Mobile Filter
*************************************************/

add_filter( 'body_class','machic_body_classes_mobile_bottom_menu' );
function machic_body_classes_mobile_bottom_menu( $classes ) {
 
	$mobilebottommenu = get_theme_mod('machic_mobile_bottom_menu','0');
	if($mobilebottommenu == '1'){
        $classes[] = 'klb-bottom-menu';
    }

    return $classes;
     
}

add_action('wp_footer', 'machic_mobile_filter'); 
function machic_mobile_filter() { 

	$mobilebottommenu = get_theme_mod('machic_mobile_bottom_menu','0');
	if($mobilebottommenu == '1'){

?>

	<?php if(get_theme_mod('machic_header_search',0) == 1){ ?>
		<div class="klb-mobile-search">
			<div class="header-form site-search">
				<?php echo machic_header_product_search(); ?>
			</div>
		</div>
	<?php } ?>

	<?php $edittoggle = get_theme_mod('machic_mobile_bottom_menu_edit_toggle','0'); ?>
	<?php if($edittoggle == '1'){ ?>
		<div class="mobile-bottom-menu">
			<div class="mobile-bottom-menu-wrapper">
				<nav class="mobile-menu">
					<ul>
						<?php $editrepeater = get_theme_mod('machic_mobile_bottom_menu_edit'); ?>
						
						<?php foreach($editrepeater as $e){ ?>
							<?php if($e['mobile_menu_type'] == 'filter'){ ?>
								<?php if(is_shop()){ ?>
									<li>
										<a href="#" class="filter-button">
											<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
											<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
										</a>
									</li>
								<?php } ?>
							<?php } elseif($e['mobile_menu_type'] == 'search'){ ?>
								<li>
									<a href="#" class="search">
										<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
										<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
									</a>
								</li>
							<?php } elseif($e['mobile_menu_type'] == 'category'){ ?>
								<?php if(!is_shop()){ ?>
									<li class="menu-item">
										<a href="#" class="categories">
											<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
											<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
										</a>
									</li>
								<?php } ?>
							<?php } else { ?>
								<li>
									<a href="<?php echo esc_url($e['mobile_menu_url']); ?>" class="user">
										<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
										<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</nav><!-- header-mobile-nav -->
			</div><!-- mobile-nav-wrapper -->
		</div><!-- mobile-nav-wrapper -->
	<?php } else { ?>
		<div class="mobile-bottom-menu">
			<div class="mobile-bottom-menu-wrapper">
				<nav class="mobile-menu">
					<ul>
						<li>
							<?php if(!is_shop()){ ?>
								<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="store">
									<i class="klbth-icon-shop"></i>
									<span><?php esc_html_e('Store','machic-core'); ?></span>
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="store">
									<i class="klbth-icon-home"></i>
									<span><?php esc_html_e('Home','machic-core'); ?></span>
								</a>
							<?php } ?>
						</li>

						<?php if(is_shop()){ ?>
							<li>
								<a href="#" class="filter-button">
									<i class="klbth-icon-filter"></i>
									<span><?php esc_html_e('Filter','machic-core'); ?></span>
								</a>
							</li>
						<?php } ?>

						<li>
							<a href="#" class="search">
								<i class="klbth-icon-search"></i>
								<span><?php esc_html_e('Search','machic-core'); ?></span>
							</a>
						</li>
						
						<?php if ( function_exists( 'tinv_url_wishlist_default' ) ) { ?>
							<li>
								<a href="<?php echo tinv_url_wishlist_default(); ?>" class="wishlist">
									<i class="klbth-icon-heart"></i>
									<span><?php esc_html_e('Wishlist','machic-core'); ?></span>
								</a>
							</li>
						<?php } ?>
						
						<li>
							<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="user">
								<i class="klbth-icon-user-1"></i>
								<span><?php esc_html_e('Account','machic-core'); ?></span>
							</a>
						</li>

						<?php $sidebarmenu = get_theme_mod('machic_header_sidebar','0'); ?>
						<?php if($sidebarmenu == '1'){ ?>
							<?php if(!is_shop()){ ?>
								<li class="menu-item">
									<a href="#" class="categories">
										<i class="klbth-icon-menu-scale"></i>
										<span><?php esc_html_e('Categories','machic-core'); ?></span>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
				</nav><!-- header-mobile-nav -->
			</div><!-- mobile-nav-wrapper -->
		</div><!-- mobile-nav-wrapper -->
	<?php } ?>
	
<?php }

    
}