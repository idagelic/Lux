<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'machic_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'machic' ),
		esc_attr__( 'You can customize the shop settings.', 'machic' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'machic' ),
		esc_attr__( 'You can customize the blog settings.', 'machic' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'machic' ),
		esc_attr__( 'You can customize the header settings.', 'machic' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'machic' ),
		esc_attr__( 'You can customize the main color.', 'machic' ),
	),

	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'machic-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'machic-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'machic' ),
		esc_attr__( 'You can customize the map settings.', 'machic' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'machic' ),
		esc_attr__( 'You can customize the footer settings.', 'machic' ),
	),

	'newsletter_settings' => array (
		esc_attr__( 'Newsletter Settings', 'machic-core' ),
		esc_attr__( 'You can customize the Newsletter Popup settings.', 'machic-core' ),
	),

	'gdpr_settings' => array (
		esc_attr__( 'GDPR Settings', 'machic-core' ),
		esc_attr__( 'You can customize the GDPR settings.', 'machic-core' ),
	),

	'maintenance_settings' => array (
		esc_attr__( 'Maintenance Settings', 'machic-core' ),
		esc_attr__( 'You can customize the Maintenance settings.', 'machic-core' ),
	),

);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'machic_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function machic_customizer_add_field ( $args ) {
	Kirki::add_field(
		'machic_customizer',
		$args
	);
}

	/*====== Header ==================================================================================*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'machic_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'machic' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'machic' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'machic' ),
				esc_attr__( 'You can customize the logo which is on header..', 'machic' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'machic' ),
				esc_attr__( 'You can customize the header.', 'machic' )
			),
			
			'header_product_tab' => array(
				esc_attr__( 'Header Products Tab', 'machic' ),
				esc_attr__( 'You can customize the header products tab.', 'machic' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'machic' ),
				esc_attr__( 'You can customize the loader.', 'machic' )
			),
			
			'header1_style' => array(
				esc_attr__( 'Header 1 Style', 'machic' ),
				esc_attr__( 'You can customize the style.', 'machic' )
			),
			
			'header2_style' => array(
				esc_attr__( 'Header 2 Style', 'machic' ),
				esc_attr__( 'You can customize the style.', 'machic' )
			),
			
			'header3_style' => array(
				esc_attr__( 'Header 3 Style', 'machic' ),
				esc_attr__( 'You can customize the style.', 'machic' )
			),
			
			'header4_style' => array(
				esc_attr__( 'Header 4 Style', 'machic' ),
				esc_attr__( 'You can customize the style.', 'machic' )
			),
			
			'header_mobile_sidebar_menu_style' => array(
				esc_attr__( 'Mobile Sidebar Menu Style', 'machic-core' ),
				esc_attr__( 'You can customize the style.', 'machic-core' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'machic_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'machic_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_logo',
				'label' => esc_attr__( 'Logo', 'machic' ),
				'description' => esc_attr__( 'You can upload a logo.', 'machic' ),
				'section' => 'machic_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo White ======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_logo_white',
				'label' => esc_attr__( 'Logo White', 'machic' ),
				'description' => esc_attr__( 'You can upload a logo.', 'machic' ),
				'section' => 'machic_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'machic' ),
				'description' => esc_attr__( 'You can set logo as text.', 'machic' ),
				'section' => 'machic_header_logo_section',
				'default' => 'Machic',
			)
		);
		
		/*====== Logo Size ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'machic_logo_size',
				'label'       => esc_html__( 'Logo Size', 'machic-core' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'machic-core' ),
				'section'     => 'machic_header_logo_section',
				'default'     => 171,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 400,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-brand a img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Mobil Logo Size ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'machic_mobil_logo_size',
				'label'       => esc_html__( 'Mobile Logo Size', 'machic-core' ),
				'description' => esc_attr__( 'You can set size of the mobil logo.', 'machic-core' ),
				'section'     => 'machic_header_logo_section',
				'default'     => 135,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-mobile .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Sidebar Logo Size ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'machic_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Logo Size', 'machic-core' ),
				'description' => esc_attr__( 'You can set size of the sidebar logo.', 'machic-core' ),
				'section'     => 'machic_header_logo_section',
				'default'     => 115,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-offcanvas-header .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		machic_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'machic_header_type',
			'label'       => esc_html__( 'Header Type', 'machic-core' ),
			'section'     => 'machic_header_general_section',
			'default'     => 'type-1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'machic-core' ),
				'type2' => esc_attr__( 'Type 2', 'machic-core' ),
				'type3' => esc_attr__( 'Type 3', 'machic-core' ),
				'type4' => esc_attr__( 'Type 4', 'machic-core' ),
			),
			) 
		);

		/*====== Mobile Sticky Header Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_mobile_sticky_header',
				'label' => esc_attr__( 'Mobile Sticky Header', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'machic-core' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_search',
				'label' => esc_attr__( 'Header Search', 'machic' ),
				'description' => esc_attr__( 'You can choose status of the search on the header.', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Search Form ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_ajax_search_form',
				'label' => esc_attr__( 'Ajax Search Form', 'machic-core' ),
				'description' => esc_attr__( 'Enable ajax search form for the header search.', 'machic-core' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Cart Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_cart',
				'label' => esc_attr__( 'Header Cart', 'machic' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Mini Cart Type ======*/
		machic_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'machic_header_mini_cart_type',
			'label'       => esc_html__( 'Mini Cart Type', 'machic-core' ),
			'section'     => 'machic_header_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'slider' => esc_attr__( 'Slider', 'machic-core' ),
				'sidecart' => esc_attr__( 'Side Cart', 'machic-core' ),
				'default' => esc_attr__( 'Default', 'machic-core' ),
			),
			'required' => array(
				array(
				  'setting'  => 'machic_header_cart',
				  'operator' => '==',
				  'value'    => '1',
				),
			),
			) 
		);
		
		/*====== Header Mini Cart Notice ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_mini_cart_notice',
				'label' => esc_attr__( 'Mini Cart Notice', 'machic-core' ),
				'description' => esc_attr__( 'You can add a text for the mini cart.', 'machic-core' ),
				'section' => 'machic_header_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_header_cart',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		
		
		/*====== Header Account Icon ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_account',
				'label' => esc_attr__( 'Account Icon / Login', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable User Login/Signup on the header.', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Wishlist  ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_wishlist',
				'label' => esc_attr__( 'Wishlist', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable wishlist on the header.', 'machic-core' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Sidebar ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_sidebar',
				'label' => esc_attr__( 'Sidebar Menu', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Menu', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);

		/*====== Header Sidebar Collapse ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_sidebar_collapse',
				'label' => esc_attr__( 'Disable Collapse on Frontpage', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Collapse on Home Page.', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_header_sidebar',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Header Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_top_header',
				'label' => esc_attr__( 'Top Header', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable the top header.', 'machic' ),
				'section' => 'machic_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_products_tab',
				'label' => esc_attr__( 'Products Tab', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable Products Tab', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Button Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_products_button_title',
				'label' => esc_attr__( 'Button Title', 'machic' ),
				'description' => esc_attr__( 'You can add a text for the button.', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => 'Super Discount',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Button Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_products_button_subtitle',
				'label' => esc_attr__( 'Button Subtitle', 'machic' ),
				'description' => esc_attr__( 'You can add a subtitle for the button.', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => 'Only this weekend',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_products_tab_title',
				'label' => esc_attr__( 'Tab Title', 'machic' ),
				'description' => esc_attr__( 'You can add a title for the tab.', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => 'Items on sale this week',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_products_tab_subtitle',
				'label' => esc_attr__( 'Tab Subtitle', 'machic' ),
				'description' => esc_attr__( 'You can add a subtitle for the tab.', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => 'Top picks this week. Up to 50% off the best selling products.',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab On Sale ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_products_tab_on_sale',
				'label' => esc_attr__( 'On Sale Products?', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Featured ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_products_tab_featured',
				'label' => esc_attr__( 'Featured Products?', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Best Selling ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_header_products_tab_best_selling',
				'label' => esc_attr__( 'Best Selling Products?', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Post count ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_header_products_tab_post_count',
				'label' => esc_attr__( 'Posts Count', 'machic' ),
				'section' => 'machic_header_product_tab_section',
				'default' => '6',
				'required' => array(
					array(
					  'setting'  => 'machic_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Button Title Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_products_tab_bg_color',
				'label' => esc_attr__( 'Products Tab Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header_product_tab_section',
			)
		);
		
		/*====== Header Products Tab Title Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_tab_title_color',
				'label' => esc_attr__( 'Tab Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header_product_tab_section',
			)
		);
		
		/*====== Header Products Tab Title Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_tab_title_hvrcolor',
				'label' => esc_attr__( 'Tab Title Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header_product_tab_section',
			)
		);
		
		/*====== Header Products Tab Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_tab_subtitle_color',
				'label' => esc_attr__( 'Tab Subtitle Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header_product_tab_section',
			)
		);
		
		/*====== Header Products Tab Subtitle Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_tab_subtitle_hvrcolor',
				'label' => esc_attr__( 'Tab Subtitle Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header_product_tab_section',
			)
		);

		/*====== PreLoader Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_preloader',
				'label' => esc_attr__( 'Enable Loader', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'machic' ),
				'section' => 'machic_header_preloader_section',
				'default' => '0',
			)
		);
		
		/*====== Top Header1 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header1_top_bg_color',
				'label' => esc_attr__( 'Top Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Top Header1 Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_top_color',
				'label' => esc_attr__( 'Top Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Top Header1 Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header1_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header1_bg_color',
				'label' => esc_attr__( 'Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Search Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'machic_header1_search_bg_color',
				'label' => esc_attr__( 'Header Search Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Search Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header1_search_font_color',
				'label' => esc_attr__( 'Header Search Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_font_color',
				'label' => esc_attr__( 'Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header1_font_hvrcolor',
				'label' => esc_attr__( 'Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Submenu Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header1_sub_title_font_color',
				'label' => esc_attr__( 'Header Submenu Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a icon color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Counter Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header1_counter_bg_color',
				'label' => esc_attr__( 'Header Counter Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a counter background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Sidebar Menu Main Title Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f7f8f9',
				'settings' => 'machic_header1_sidebar_title_bg',
				'label' => esc_attr__( 'Sidebar Title Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*======Header1  Sidebar Menu Main Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_sidebar_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Sidebar Menu Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header1_sidebar_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Sidebar Menu Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ec',
				'settings' => 'machic_header1_sidebar_brdrcolor',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*======  Header1 Sidebar Menu Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_sidebar_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Header1 Sidebar Menu Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header1_sidebar_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*======  Header1 Sidebar Menu Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header1_sidebar_subtitle_font_color',
				'label' => esc_attr__( 'Sidebar Menu Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a  font color.', 'machic-core' ),
				'section' => 'machic_header1_style_section',
			)
		);
		
		/*====== Top Header Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header1_top_header_size',
				'label'       => esc_attr__( 'Top Header Typography', 'machic-core' ),
				'section'     => 'machic_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .header-type1 .header-top ',
					],
				],
			)
		);
		
		/*====== Header Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header1_main_size',
				'label'       => esc_attr__( 'Header Typography', 'machic-core' ),
				'section'     => 'machic_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .header-type1 .site-menu.primary a ',
					],
				],
			)
		);
		
		/*====== Sidebar Menu Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header1_sidebar_size',
				'label'       => esc_attr__( 'Sidebar Menu Typography', 'machic-core' ),
				'section'     => 'machic_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.header-type1 .site-departments .departments-menu a',
					],
				],
			)
		);
		
		/*====== Top Header2 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header2_top_bg_color',
				'label' => esc_attr__( 'Top Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Top Header2 Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_top_color',
				'label' => esc_attr__( 'Top Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Top Header2 Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header2_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header2_bg_color',
				'label' => esc_attr__( 'Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Search Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'machic_header2_search_bg_color',
				'label' => esc_attr__( 'Header Search Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Search Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header2_search_font_color',
				'label' => esc_attr__( 'Header Search Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_font_color',
				'label' => esc_attr__( 'Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_font_hvrcolor',
				'label' => esc_attr__( 'Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Submenu Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_sub_title_font_color',
				'label' => esc_attr__( 'Header Submenu Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a icon color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Counter Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header2_counter_bg_color',
				'label' => esc_attr__( 'Header Counter Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a counter background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Search Column  Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'machic_header2_search_column_bg_color',
				'label' => esc_attr__( 'Header Search Column Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Search Column  Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_search_column_font_color',
				'label' => esc_attr__( 'Header Search Column Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Search Column Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_search_column_font_hvrcolor',
				'label' => esc_attr__( 'Header Search Column Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Sidebar Menu Main Title Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'machic_header2_sidebar_title_bg',
				'label' => esc_attr__( 'Sidebar Title Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*======Header2 Sidebar Menu Main Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_sidebar_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Sidebar Menu Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header2_sidebar_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Sidebar Menu Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ec',
				'settings' => 'machic_header2_sidebar_brdrcolor',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*======  Header2 Sidebar Menu Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_sidebar_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*====== Header2 Sidebar Menu Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header2_sidebar_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*======  Header2 Sidebar Menu Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header2_sidebar_subtitle_font_color',
				'label' => esc_attr__( 'Sidebar Menu Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a  font color.', 'machic-core' ),
				'section' => 'machic_header2_style_section',
			)
		);
		
		/*======Header2 Top Header Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header2_top_header_size',
				'label'       => esc_attr__( 'Top Header Typography', 'machic-core' ),
				'section'     => 'machic_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .klb-type2 .header-top ',
					],
				],
			)
		);
		
		/*====== Header2 Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header2_main_size',
				'label'       => esc_attr__( 'Header Typography', 'machic-core' ),
				'section'     => 'machic_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .klb-type2 .site-menu.primary a ',
					],
				],
			)
		);
		
		/*====== Header2 Sidebar Menu Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header2_sidebar_size',
				'label'       => esc_attr__( 'Sidebar Menu Typography', 'machic-core' ),
				'section'     => 'machic_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.klb-type2 .site-departments .departments-menu a',
					],
				],
			)
		);
		
		/*====== Top Header3 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#031424',
				'settings' => 'machic_header3_top_bg_color',
				'label' => esc_attr__( 'Top Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Top Header3 Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header3_top_color',
				'label' => esc_attr__( 'Top Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Top Header3 Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header3_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Top Header3 Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_subtitle_top_color',
				'label' => esc_attr__( 'Top Header Subtitle Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Top Header3 Subtitle Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header3_subtitle_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Subtitle Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#031424',
				'settings' => 'machic_header3_bg_color',
				'label' => esc_attr__( 'Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Mobile Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header3_mobile_bg_color',
				'label' => esc_attr__( 'Header Mobile Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Search Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header3_search_bg_color',
				'label' => esc_attr__( 'Header Search Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Search Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_search_font_color',
				'label' => esc_attr__( 'Header Search Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header3_font_color',
				'label' => esc_attr__( 'Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header3_font_hvrcolor',
				'label' => esc_attr__( 'Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Submenu Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header3_sub_title_font_color',
				'label' => esc_attr__( 'Header Submenu Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Submenu Subtitle Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_sub_subtitle_font_color',
				'label' => esc_attr__( 'Header Submenu Subtitle Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Submenu Subtitle Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header3_sub_subtitle_font_hvrcolor',
				'label' => esc_attr__( 'Header Submenu Subtitle Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header3_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a icon color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Counter Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header3_counter_bg_color',
				'label' => esc_attr__( 'Header Counter Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a counter background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Sidebar Menu Main Title Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header3_sidebar_title_bg',
				'label' => esc_attr__( 'Sidebar Title Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*======Header3  Sidebar Menu Main Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_sidebar_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Sidebar Menu Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header3_sidebar_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Sidebar Menu Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ec',
				'settings' => 'machic_header3_sidebar_brdrcolor',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*======  Header3 Sidebar Menu Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_sidebar_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Sidebar Menu Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header3_sidebar_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*======  Header3 Sidebar Menu Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header3_sidebar_subtitle_font_color',
				'label' => esc_attr__( 'Sidebar Menu Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a  font color.', 'machic-core' ),
				'section' => 'machic_header3_style_section',
			)
		);
		
		/*====== Header3 Top Header Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header3_top_header_size',
				'label'       => esc_attr__( 'Top Header Typography', 'machic-core' ),
				'section'     => 'machic_header3_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .header-type3 .header-top ',
					],
				],
			)
		);
		
		/*====== Header3 Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header3_main_size',
				'label'       => esc_attr__( 'Header Typography', 'machic-core' ),
				'section'     => 'machic_header3_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .header-type3 .site-menu.primary a ',
					],
				],
			)
		);
		
		/*====== Header3 Sidebar Menu Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header3_sidebar_size',
				'label'       => esc_attr__( 'Sidebar Menu Typography', 'machic-core' ),
				'section'     => 'machic_header3_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.header-type3 .site-departments .departments-menu a',
					],
				],
			)
		);
		
		/*====== Top Header4 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#031424',
				'settings' => 'machic_header4_top_bg_color',
				'label' => esc_attr__( 'Top Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Top Header4 Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_top_color',
				'label' => esc_attr__( 'Top Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Top Header4 Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header4_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Top Header4 Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_subtitle_top_color',
				'label' => esc_attr__( 'Top Header Subtitle Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Top Header4 Subtitle Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header4_subtitle_top_hvrcolor',
				'label' => esc_attr__( 'Top Header Subtitle Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#031424',
				'settings' => 'machic_header4_bg_color',
				'label' => esc_attr__( 'Header Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Mobile Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_mobile_bg_color',
				'label' => esc_attr__( 'Header Mobile Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Search Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'machic_header4_search_bg_color',
				'label' => esc_attr__( 'Header Search Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Search Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_search_font_color',
				'label' => esc_attr__( 'Header Search Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_font_color',
				'label' => esc_attr__( 'Header Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header4_font_hvrcolor',
				'label' => esc_attr__( 'Header Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Submenu Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sub_title_font_color',
				'label' => esc_attr__( 'Header Submenu Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Submenu Subtitle Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sub_subtitle_font_color',
				'label' => esc_attr__( 'Header Submenu Subtitle Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Submenu Subtitle Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sub_subtitle_font_hvrcolor',
				'label' => esc_attr__( 'Header Submenu Subtitle Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a icon color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Counter Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_header4_counter_bg_color',
				'label' => esc_attr__( 'Header Counter Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a counter background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Search Column  Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'machic_header4_search_column_bg_color',
				'label' => esc_attr__( 'Header Search Column Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Search Column  Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_search_column_font_color',
				'label' => esc_attr__( 'Header Search Column Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Search Column Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_search_column_font_hvrcolor',
				'label' => esc_attr__( 'Header Search Column Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font hover color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Sidebar Menu Main Title Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffc21f',
				'settings' => 'machic_header4_sidebar_title_bg',
				'label' => esc_attr__( 'Sidebar Title Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*======Header4 Sidebar Menu Main Title Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sidebar_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Sidebar Menu Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_header4_sidebar_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Sidebar Menu Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ec',
				'settings' => 'machic_header4_sidebar_brdrcolor',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*======  Header4 Sidebar Menu Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sidebar_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*====== Header4 Sidebar Menu Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_header4_sidebar_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*======  Header4 Sidebar Menu Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_header4_sidebar_subtitle_font_color',
				'label' => esc_attr__( 'Sidebar Menu Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a  font color.', 'machic-core' ),
				'section' => 'machic_header4_style_section',
			)
		);
		
		/*======Header4 Top Header Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header4_top_header_size',
				'label'       => esc_attr__( 'Top Header Typography', 'machic-core' ),
				'section'     => 'machic_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .klb-type4 .header-top ',
					],
				],
			)
		);
		
		/*====== Header4 Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header4_main_size',
				'label'       => esc_attr__( 'Header Typography', 'machic-core' ),
				'section'     => 'machic_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .klb-type4 .site-menu.primary a ',
					],
				],
			)
		);
		
		/*====== Header4 Sidebar Menu Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_header4_sidebar_size',
				'label'       => esc_attr__( 'Sidebar Menu Typography', 'machic-core' ),
				'section'     => 'machic_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.klb-type4 .site-departments .departments-menu a',
					],
				],
			)
		);

	/*====== Mobile Sidebar Menu Style ======*/	
	
		/*======  Mobile Sidebar Menu Top Background ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#031624',
				'settings' => 'machic_mobile_sidebar_menu_top_bg',
				'label' => esc_attr__( 'Mobile Sidebar Menu Top Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a background-color.', 'machic-core' ),
				'section' => 'machic_header_mobile_sidebar_menu_style_section',
			)
		);
		
		/*======  Mobile Sidebar Menu Background ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_mobile_sidebar_menu_bg',
				'label' => esc_attr__( 'Mobile Sidebar Menu Background', 'machic-core' ),
				'description' => esc_attr__( 'You can set a background-color.', 'machic-core' ),
				'section' => 'machic_header_mobile_sidebar_menu_style_section',
			)
		);
		
		/*======  Mobile Sidebar Menu Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_mobile_sidebar_menu_color',
				'label' => esc_attr__( 'Mobile Sidebar Menu Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header_mobile_sidebar_menu_style_section',
			)
		);
		
		/*======  Mobile Sidebar Menu Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ef',
				'settings' => 'machic_mobile_sidebar_menu_brdrcolor',
				'label' => esc_attr__( 'Mobile Sidebar Menu Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'machic-core' ),
				'section' => 'machic_header_mobile_sidebar_menu_style_section',
			)
		);
		
		/*======  Mobile Sidebar Menu Copyright Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_mobile_sidebar_menu_copyright_color',
				'label' => esc_attr__( 'Mobile Sidebar Menu Copyright Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a font-color.', 'machic-core' ),
				'section' => 'machic_header_mobile_sidebar_menu_style_section',
			)
		);
	
		

	/*====== SHOP ====================================================================================*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'machic_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'machic-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'machic-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'machic-core' ),
				esc_attr__( 'You can customize shop settings.', 'machic-core' )
			),
			
			'shop_single' => array(
				esc_attr__( 'Product Detail', 'machic-core' ),
				esc_attr__( 'You can customize the product single settings.', 'machic-core' )
			),
			
			'shop_banner' => array(
				esc_attr__( 'Banner', 'machic-core' ),
				esc_attr__( 'You can customize the banner.', 'machic-core' )
			),
			
			'mobile_menu' => array(
				esc_attr__( 'Mobile Bottom Menu Style ', 'machic-core' ),
				esc_attr__( 'You can customize the mobile menu.', 'machic-core' )
			),

			'my_account' => array(
				esc_attr__( 'My Account', 'machic-core' ),
				esc_attr__( 'You can customize the my account page.', 'machic-core' )
			),

			'free_shipping_bar' => array(
				esc_attr__( 'Free Shipping Bar ', 'machic-core' ),
				esc_attr__( 'You can customize the free shipping bar settings.', 'machic-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'machic_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'machic_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		machic_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'machic_shop_layout',
				'label' => esc_attr__( 'Layout', 'machic' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'machic' ),
					'full-width' => esc_attr__( 'Full Width', 'machic' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'machic' ),
				),
			)
		);

		/*====== Shop Width ======*/
		machic_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'machic_shop_width',
				'label' => esc_attr__( 'Shop Page Width', 'machic' ),
				'description' => esc_attr__( 'You can choose a layout for the shop page.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => 'boxed',
				'choices' => array(
					'boxed' => esc_attr__( 'Boxed', 'machic' ),
					'wide' => esc_attr__( 'Wide', 'machic' ),
				),
			)
		);

		machic_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'machic_product_box_type',
			'label'       => esc_html__( 'Shop Product Box Type', 'machic-core' ),
			'section'     => 'machic_shop_general_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'machic-core' ),
				'type2' => esc_attr__( 'Type 2', 'machic-core' ),
				'type3' => esc_attr__( 'Type 3', 'machic-core' ),
				'type4' => esc_attr__( 'Type 4', 'machic-core' ),
			),
			) 
		);

		machic_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'machic_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'machic-core' ),
			'section'     => 'machic_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'machic-core' ),
				'loadmore' => esc_attr__( 'Load More', 'machic-core' ),
				'infinite' => esc_attr__( 'Infinite', 'machic-core' ),
			),
			) 
		);

		/*====== Product Box Gallery Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_product_box_gallery',
				'label' => esc_attr__( 'Product Gallery', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable gallery on the product box.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Ajax on Shop Page ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Recently Viewed Products ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Grid-List Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Perpage Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_perpage_view',
				'label' => esc_attr__( 'Perpage View', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable perpage view on shop page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Atrribute Swatches ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Quick View Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'machic' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Page ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_wishlist_page',
				'label' => esc_attr__( 'Select a Wishlist Page', 'machic-core' ),
				'description' => esc_attr__( 'You can select a wishlist page. [klbwl_list]', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'machic_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		
		/*====== Shop Compare Toggle  ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_compare_button',
				'label' => esc_attr__( 'Compare', 'machic' ),
				'description' => esc_attr__( 'You can choose status of the compare button.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Compare Page ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_compare_page',
				'label' => esc_attr__( 'Select a Compare Page', 'machic-core' ),
				'description' => esc_attr__( 'You can select a compare page. [klbcp_list]', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'machic_compare_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Ajax Notice Shop ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Notice', 'machic' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Badge Tab ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_product_badge_tab',
				'label' => esc_attr__( 'Product Badge Tab', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of the product badge tab.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Remove All Button ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_remove_all_button',
				'label' => esc_attr__( 'Remove All Button in cart page', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of the remove all button.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu Edit Toggle======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'machic' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		machic_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'machic_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'machic-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'machic_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'machic' ),
						'description' => esc_attr__( 'You can select a type', 'machic' ),
						'default' => 'default',
						'choices' => array(
							'default' => esc_attr__( 'Default', 'machic-core' ),
							'search' => esc_attr__( 'Search', 'machic-core' ),
							'filter' => esc_attr__( 'Filter', 'machic-core' ),
							'category' => esc_attr__( 'category', 'machic-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'machic' ),
						'description' => esc_attr__( 'You can set an icon. for example; "store"', 'machic' ),
					),
					'mobile_menu_text' => array(
						'type' => 'text',
						'label' => esc_attr__( ' Text', 'machic' ),
						'description' => esc_attr__( 'You can enter a text.', 'machic' ),
					),
					'mobile_menu_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'machic-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'machic-core' ),
					),
				),
				
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'machic-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Stock Quantity ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'machic' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'machic' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Min/Max Quantity ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'machic-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Category Description ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'machic-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Min Order Amount ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'machic-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'machic-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Image Size ======*/
		machic_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'machic_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'machic-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'machic-core' ),
				'section' => 'machic_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);

		/*====== Shop Single Image Column ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'machic_shop_single_image_column',
				'label'       => esc_html__( 'Image Column', 'machic-core' ),
				'section'     => 'machic_shop_single_section',
				'default'     => 6,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 3,
					'max'  => 12,
					'step' => 1,
				],
			)
		);

		/*====== Shop Single Image Zoom  ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Ajax Add To Cart ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*======  Sticky Single Cart ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Single Cart ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Product360 View ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Order on WhatsApp ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Move Review Tab ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'machic' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Buy Now Single ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'machic-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'machic' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Shop Single Social Share ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_shop_social_share',
				'label' => esc_attr__( 'Social Share (Product Detail)', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Social Share ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'machic_shop_single_share',
				'section'     => 'machic_shop_single_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin', 'whatsapp'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'machic-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'machic-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'machic-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'machic-core' ),
					'whatsapp'  => esc_html__( 'Whatsapp', 	'machic-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'machic_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Gallery Columns ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_shop_single_gallery_columns',
				'label' => esc_attr__( 'Gallery Columns', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '7',
				'choices' => array(
					'8' => esc_attr__( '8 Columns', 'machic' ),
					'7' => esc_attr__( '7 Columns', 'machic' ),
					'6' => esc_attr__( '6 Columns', 'machic' ),
					'5' => esc_attr__( '5 Columns', 'machic' ),
					'4' => esc_attr__( '4 Columns', 'machic' ),
					'3' => esc_attr__( '3 Columns', 'machic' ),
					'2' => esc_attr__( '2 Columns', 'machic' ),
				),
			)
		);

		/*====== Product Related Post Column ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'machic' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'machic' ),
				'section' => 'machic_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'machic' ),
					'5' => esc_attr__( '5 Columns', 'machic' ),
					'4' => esc_attr__( '4 Columns', 'machic' ),
					'3' => esc_attr__( '3 Columns', 'machic' ),
					'2' => esc_attr__( '2 Columns', 'machic' ),
				),
			)
		);

		/*====== Re-Order Product Detail ======*/
		machic_customizer_add_field (
			array(
				'type' => 'sortable',
				'settings' => 'machic_shop_single_reorder',
				'label' => esc_attr__( 'Re-order Product Summary', 'machic-core' ),
				'description' => esc_attr__( 'Please save the changes and refresh the page once. Live preview is not available for the option.', 'machic-core' ),
				'section' => 'machic_shop_single_section',
				'default'     => [
					'woocommerce_template_single_title',
					'woocommerce_template_single_rating',
					'woocommerce_template_single_price',
					'woocommerce_template_single_add_to_cart',
					'machic_people_added_in_cart',
					'woocommerce_template_single_meta',
					'machic_social_share',
					'woocommerce_template_single_excerpt',
				],
				'choices'     => [
					'woocommerce_template_single_title' => esc_html__( 'Title', 'machic-core' ),
					'woocommerce_template_single_rating' => esc_html__( 'Rating', 'machic-core' ),
					'woocommerce_template_single_price' => esc_html__( 'Price', 'machic-core' ),
					'woocommerce_template_single_add_to_cart' => esc_html__( 'Add to Cart', 'machic-core' ),
					'machic_people_added_in_cart' => esc_html__( 'People Added', 'machic-core' ),
					'woocommerce_template_single_meta' => esc_html__( 'Meta', 'machic-core' ),
					'machic_social_share' => esc_html__( 'Share', 'kirki' ),
					'woocommerce_template_single_excerpt' => esc_html__( 'Excerpt', 'machic-core' ),
					'machic_product_stock_progress_bar' => esc_html__( 'Progress Bar', 'machic-core' ),
					'machic_product_time_countdown' => esc_html__( 'Time Countdown', 'machic-core' ),
				],
			)
		);
		
		/*====== Shop Top Banner Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_shop_top_banner_title',
				'label' => esc_attr__( 'Set Title', 'machic-core' ),
				'description' => esc_attr__( 'You can set a title.', 'machic-core' ),
				'section' => 'machic_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Top Banner Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_shop_top_banner_subtitle',
				'label' => esc_attr__( 'Set Subtitle', 'machic-core' ),
				'description' => esc_attr__( 'You can set a subtitle.', 'machic-core' ),
				'section' => 'machic_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Top Banner Desc ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_shop_top_banner_desc',
				'label' => esc_attr__( 'Description', 'machic-core' ),
				'description' => esc_attr__( 'Add a description.', 'machic-core' ),
				'section' => 'machic_shop_banner_section',
				'default' => '',
			)
		);

		/*====== Shop Top Banner Button Text ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_shop_top_banner_button_text',
				'label' => esc_attr__( 'Button Text', 'machic-core' ),
				'description' => esc_attr__( 'Set a text for the button', 'machic-core' ),
				'section' => 'machic_shop_banner_section',
				'default' => 'Shop',
			)
		);

		/*====== Shop Top Banner URL ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_shop_top_banner_button_url',
				'label' => esc_attr__( 'Button URL', 'machic-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'machic-core' ),
				'section' => 'machic_shop_banner_section',
				'default' => '#',
			)
		);
		

		/*====== Banner Repeater 3 Columns ======*/
		add_action( 'init', function() {
			machic_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'machic_shop_banner_module',
					'label' => esc_attr__( 'Shop Banner', 'machic-core' ),
					'description' => esc_attr__( 'You can set banner.', 'machic-core' ),
					'section' => 'machic_shop_banner_section',
					'fields' => array(
						
						'banner_image' =>  array(
							'type' => 'image',
							'label' => esc_attr__( 'Image', 'machic-core' ),
							'description' => esc_attr__( 'You can upload an image.', 'machic-core' ),
						),
						
						'banner_title' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Title', 'machic-core' ),
							'description' => esc_attr__( 'You can set a title.', 'machic-core' ),
						),
						
						'banner_subtitle' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Subtitle', 'machic-core' ),
							'description' => esc_attr__( 'You can set a subtitle.', 'machic-core' ),
						),
			
						'banner_desc' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Description', 'machic-core' ),
							'description' => esc_attr__( 'Add a description.', 'machic-core' ),
						),
						
						'banner_regular_price' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Regular Price', 'machic-core' ),
							'description' => esc_attr__( 'Add a regular price.', 'machic-core' ),
						),
						
						'banner_sale_price' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Sale Price', 'machic-core' ),
							'description' => esc_attr__( 'Add a sale price.', 'machic-core' ),
						),
						
						'banner_url' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set URL', 'machic-core' ),
							'description' => esc_attr__( 'Set an url for the banner', 'machic-core' ),
						),
					),
				)
			);
		} );
		
		/*======  Mobile Menu Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a Background.', 'machic-core' ),
				'section' => 'machic_mobile_menu_section',
			)
		);
		
		/*======  Mobile Menu Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_mobile_menu_icon_color',
				'label' => esc_attr__( 'Mobile Menu Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color.', 'machic-core' ),
				'section' => 'machic_mobile_menu_section',
			)
		);
		
		/*======  Mobile Menu Icon Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_mobile_menu_icon_hvrcolor',
				'label' => esc_attr__( 'Mobile Menu Icon Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color.', 'machic-core' ),
				'section' => 'machic_mobile_menu_section',
			)
		);
		
		/*======  Mobile Menu Font Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_mobile_menu_color',
				'label' => esc_attr__( 'Mobile Menu Font Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color.', 'machic-core' ),
				'section' => 'machic_mobile_menu_section',
			)
		);
		
		/*======  Mobile Menu Font Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_mobile_menu_hvr_color',
				'label' => esc_attr__( 'Mobile Menu Font Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color.', 'machic-core' ),
				'section' => 'machic_mobile_menu_section',
			)
		);
		
		/*====== Mobile Menu Font Style ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_mobile_menu_size',
				'label'       => esc_attr__( 'Mobile Menu Font Style', 'machic-core' ),
				'section'     => 'machic_mobile_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '9px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.mobile-bottom-menu .mobile-menu ul li a span',
					],
				],		
			)
		);
		
		/*====== My Account Layouts ======*/
		machic_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'machic_my_account_layout',
				'label' => esc_attr__( 'Layout', 'machic-core' ),
				'description' => esc_attr__( 'You can choose a layout for the login form.', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => 'default',
				'choices' => array(
					'default' => esc_attr__( 'Default', 'machic-core' ),
					'logintab' => esc_attr__( 'Login Tab', 'machic-core' ),
				),
			)
		);

		/*====== Registration Form First Name ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_registration_first_name',
				'label' => esc_attr__( 'Register - First Name', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'machic-core' ),
					'visible' => esc_attr__( 'Visible', 'machic-core' ),
					'optional' => esc_attr__( 'Optional', 'machic-core' ),
				),
			)
		);
		
		/*====== Registration Form Last Name ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_registration_last_name',
				'label' => esc_attr__( 'Register - Last Name', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'machic-core' ),
					'visible' => esc_attr__( 'Visible', 'machic-core' ),
					'optional' => esc_attr__( 'Optional', 'machic-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Company ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_registration_billing_company',
				'label' => esc_attr__( 'Register - Billing Company', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'machic-core' ),
					'visible' => esc_attr__( 'Visible', 'machic-core' ),
					'optional' => esc_attr__( 'Optional', 'machic-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Phone ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_registration_billing_phone',
				'label' => esc_attr__( 'Register - Billing Phone', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'machic-core' ),
					'visible' => esc_attr__( 'Visible', 'machic-core' ),
					'optional' => esc_attr__( 'Optional', 'machic-core' ),
				),
			)
		);

		/*====== Ajax Login-Register ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_ajax_login_form',
				'label' => esc_attr__( 'Activate Ajax for Login Form', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => '0',
			)
		);


		/*====== Redirect URL After Login ======*/
		machic_customizer_add_field (
			array(
				'type' => 'url',
				'settings' => 'machic_redirect_url_after_login',
				'label' => esc_attr__( 'Redirect URL After Login', 'machic-core' ),
				'section' => 'machic_my_account_section',
				'default' => '',
			)
		);

	/*====== Free Shipping Settings =======================================================*/
	
		/*====== Free Shipping ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_free_shipping',
				'label' => esc_attr__( 'Free shipping bar', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => '0',
			)
		);
		
		/*====== Free Shipping Goal Amount ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shipping_progress_bar_amount',
				'label' => esc_attr__( 'Goal Amount', 'machic-core' ),
				'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => '100',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Cart Page ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_card_page',
				'label' => esc_attr__( 'Cart page', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Mini cart ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_mini_cart',
				'label' => esc_attr__( 'Mini cart', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Checkout page ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_checkout',
				'label' => esc_attr__( 'Checkout page', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Initial ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_initial',
				'label' => esc_attr__( 'Initial Message', 'machic-core' ),
				'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => 'Add [remainder] to cart and get free shipping!',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Success ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_success',
				'label' => esc_attr__( 'Success message', 'machic-core' ),
				'description' => esc_attr__( 'Message to show after reaching 100%.', 'machic-core' ),
				'section' => 'machic_free_shipping_bar_section',
				'default' => 'Your order qualifies for free shipping!',
				'required' => array(
					array(
					  'setting'  => 'machic_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

	/*====== Blog Settings =======================================================*/
		/*====== Layouts ======*/
		
		machic_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'machic_blog_layout',
				'label' => esc_attr__( 'Layout', 'machic' ),
				'description' => esc_attr__( 'You can choose a layout.', 'machic' ),
				'section' => 'machic_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'machic' ),
					'full-width' => esc_attr__( 'Full Width', 'machic' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'machic' ),
				),
			)
		);
		
		/*====== Main color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'machic_main_color',
				'label' => esc_attr__( 'Main Color', 'machic' ),
				'description' => esc_attr__( 'You can customize the main color.', 'machic' ),
				'section' => 'machic_main_color_section',
			)
		);

		/*====== Secondary color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_second_color',
				'label' => esc_attr__( 'Second Color', 'machic' ),
				'description' => esc_attr__( 'You can customize the secondary color.', 'machic' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Link======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#0070dc',
				'settings' => 'machic_color_link',
				'label' => esc_attr__( 'Color Link', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color link.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Shop Button======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#00a046',
				'settings' => 'machic_color_shop_button',
				'label' => esc_attr__( 'Color Shop Button', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color shop button.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Shop Button Active======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#037535',
				'settings' => 'machic_color_shop_button_active',
				'label' => esc_attr__( 'Color Shop Button Active', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color shop button.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Danger ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef262c',
				'settings' => 'machic_color_danger',
				'label' => esc_attr__( 'Color Danger', 'machic' ),
				'description' => esc_attr__( 'You can customize the color danger.', 'machic' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Warning======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ff5c00',
				'settings' => 'machic_color_warning',
				'label' => esc_attr__( 'Color Warning', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color warning.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Success======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#00a046',
				'settings' => 'machic_color_success',
				'label' => esc_attr__( 'Color Success', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color success.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);
		
		/*====== Color Light======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f2f3f5',
				'settings' => 'machic_color_light',
				'label' => esc_attr__( 'Color Light', 'machic-core' ),
				'description' => esc_attr__( 'You can customize the color light.', 'machic-core' ),
				'section' => 'machic_main_color_section',
			)
		);

	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'machic_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'machic-core' ),
				'section'     => 'machic_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'machic-core' ),
				'choices'     => machic_get_elementorTemplates('section'),
				
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			machic_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'machic_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'machic-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'machic-core' ),
					'section' => 'machic_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'machic-core' ),
							'description' => esc_html__( 'Set a category', 'machic-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'machic_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'machic-core' ),
						),
						
						'machic_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
						),
						
						'machic_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
						),
						
						'machic_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
						),
						
						'machic_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
						),
						
						'machic_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'machic-core' ),
							'choices'     => machic_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );

		/*====== Map Settings ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'machic' ),
				'description' => esc_attr__( 'Add your google map api key', 'machic' ),
				'section' => 'machic_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'machic_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'machic' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'machic' ),
			)
		);

		$sections = array (
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'machic' ),
				esc_attr__( 'You can customize the subscribe area.', 'machic' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'machic' ),
				esc_attr__( 'You can customize the footer settings.', 'machic-core' )
			),
			
			'footer_style' => array(
				esc_attr__( 'Footer Style', 'machic-core' ),
				esc_attr__( 'You can customize the footer settings.', 'machic-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'machic_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'machic_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Subcribe Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section.', 'machic' ),
				'section' => 'machic_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subcribe FORM ID======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'machic' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'machic' ),
				'section' => 'machic_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'machic' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'machic' ),
				'section' => 'machic_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_footer_subscribe_subtitle',
				'label' => esc_attr__( 'Subtitle', 'machic' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'machic' ),
				'section' => 'machic_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#041e42',
				'settings' => 'machic_subscribe_bg',
				'label' => esc_attr__( 'Subscribe Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Title Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_subscribe_title_color',
				'label' => esc_attr__( 'Subscribe Title Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Title Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_subscribe_title_hvrcolor',
				'label' => esc_attr__( 'Subscribe Title Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_subscribe_subtitle_color',
				'label' => esc_attr__( 'Subscribe Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Subtitle Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_subscribe_subtitle_hvrcolor',
				'label' => esc_attr__( 'Subscribe Subtitle Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Subtitle Strong Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_subscribe_subtitle_strong_color',
				'label' => esc_attr__( 'Subscribe Subtitle Strong Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Subtitle Strong Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ffbd27',
				'settings' => 'machic_subscribe_subtitle_strong_hvrcolor',
				'label' => esc_attr__( 'Subscribe Subtitle Strong Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Title Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_subscribe_title_size',
				'label'       => esc_attr__( 'Subscribe Title Typography', 'machic-core' ),
				'section'     => 'machic_footer_subscribe_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '22px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-newsletter .site-newsletter .entry-title',
					],
				],		
			)
		);
		
		/*====== Subscribe  Subtitle Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_subscribe_subtitle_size',
				'label'       => esc_attr__( 'Subscribe Subtitle Typography', 'machic-core' ),
				'section'     => 'machic_footer_subscribe_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-newsletter .site-newsletter .entry-description',
					],
				],		
			)
		);

		/*====== Footer Social List ======*/
		machic_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'machic_footer_social_list',
				'label' => esc_attr__( 'Social List', 'machic-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'machic-core' ),
				'section' => 'machic_footer_general_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'machic-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'machic-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'machic-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'machic-core' ),
					),

				),
			)
		);
		
		/*====== Footer Tags Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_footer_tags_toggle',
				'label' => esc_attr__( 'Footer Tags', 'machic' ),
				'description' => esc_attr__( 'Disable or Enable the products tags.', 'machic' ),
				'section' => 'machic_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== Back to top  ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_scroll_to_top',
				'label' => esc_attr__( 'Back To Top Button', 'machic' ),
				'section' => 'machic_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== Copyright ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_copyright',
				'label' => esc_attr__( 'Copyright', 'machic' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'machic' ),
				'section' => 'machic_footer_general_section',
				'default' => '',
			)
		);
		
		/*====== Payment Image ======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_footer_payment_image',
				'label' => esc_attr__( 'Payment Image', 'machic' ),
				'description' => esc_attr__( 'You can upload an image.', 'machic' ),
				'section' => 'machic_footer_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);

		/*====== Payment Image URL ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_footer_payment_image_url',
				'label' => esc_attr__( 'Set Payment URL', 'machic-core' ),
				'description' => esc_attr__( 'Set an url for the payment image', 'machic-core' ),
				'section' => 'machic_footer_general_section',
				'default' => '#',
			)
		);

		/*====== Footer Column ======*/
		machic_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'machic_footer_column',
				'label' => esc_attr__( 'Footer Column', 'machic' ),
				'description' => esc_attr__( 'You can set footer column.', 'machic' ),
				'section' => 'machic_footer_general_section',
				'default' => '5columns',
				'choices' => array(
					'5columns' => esc_attr__( '5 Columns', 'machic' ),
					'4columns' => esc_attr__( '4 Columns', 'machic' ),
					'3columns' => esc_attr__( '3 Columns', 'machic' ),
				),
			)
		);
		
		/*====== Footer Widget Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f7f8f9',
				'settings' => 'machic_featured_widget_bg_color',
				'label' => esc_attr__( 'Footer Widget Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Widget Title Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_featured_widget_title_color',
				'label' => esc_attr__( 'Footer Widget Title Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Widget Title Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_featured_widget_title_hvrcolor',
				'label' => esc_attr__( 'Footer Widget Title Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Widget Subtitle Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_featured_widget_subtitle_color',
				'label' => esc_attr__( 'Footer Widget Subtitle Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Widget Subtitle Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_featured_widget_subtitle_hvrcolor',
				'label' => esc_attr__( 'Footer Widget Subtitle Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_featured_bg_color',
				'label' => esc_attr__( 'Footer Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Border Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e8ec',
				'settings' => 'machic_featured_border_color',
				'label' => esc_attr__( 'Footer Border Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Social Icon Background Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#d1d6dd',
				'settings' => 'machic_footer_social_icon_bg',
				'label' => esc_attr__( 'Footer Social Icon Background Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Social Icon Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'machic_footer_social_icon_color',
				'label' => esc_attr__( 'Footer Social Icon Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Tags Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_featured_tags_color',
				'label' => esc_attr__( 'Footer Tags Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Tags Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#021523',
				'settings' => 'machic_featured_tags_hvrcolor',
				'label' => esc_attr__( 'Footer Tags Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Copyright Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_featured_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Copyright Hover Color ======*/
		machic_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#818ea0',
				'settings' => 'machic_featured_copyright_hvrcolor',
				'label' => esc_attr__( 'Footer Copyright Hover Color', 'machic-core' ),
				'description' => esc_attr__( 'You can set a color for  Color.', 'machic-core' ),
				'section' => 'machic_footer_style_section',
			)
		);
		
		/*====== Footer Tags Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_footer_tags_size',
				'label'       => esc_attr__( 'Footer Tags Typography', 'machic-core' ),
				'section'     => 'machic_footer_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-details .site-details .tags li a ',
					],
				],
			)
		);
		
		/*====== Footer Copyright Typography ======*/
		machic_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'machic_footer_copyright_size',
				'label'       => esc_attr__( 'Footer Copyright Typography', 'machic-core' ),
				'section'     => 'machic_footer_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-copyright .site-copyright',
					],
				],
			)
		);
		
		
		/*====== Newsletter Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_newsletter_popup_toggle',
				'label' => esc_attr__( 'Enable Newsletter', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of Newsletter Popup.', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Newsletter Type ======*/
		machic_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'machic_newsletter_type',
				'label' => esc_attr__( 'Newsletter Type', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'machic-core' ),
					'type2' => esc_attr__( 'Type 2', 'machic-core' ),
					'type3' => esc_attr__( 'Type 3', 'machic-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Image ======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_newsletter_image',
				'label' => esc_attr__( 'Image', 'machic-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),

				'active_callback' => [
					[
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'machic_newsletter_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],

			)
		);
		
		
		/*====== Newsletter Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_newsletter_popup_title',
				'label' => esc_attr__( 'Newsletter Title', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => 'Subscribe To Newsletter',
				'required' => array(
					array(
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_newsletter_popup_subtitle',
				'label' => esc_attr__( 'Newsletter Subtitle', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => 'Subscribe to the Machic mailing list to receive updates on new arrivals, special offers and our promotions.',
				'required' => array(
					array(
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_newsletter_popup_formid',
				'label' => esc_attr__( 'Newsletter Form Id.', 'machic-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup Expire Date ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_newsletter_popup_expire_date',
				'label' => esc_attr__( 'Newsletter Expire Date', 'machic-core' ),
				'section' => 'machic_newsletter_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'machic_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== GDPR Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_gdpr_toggle',
				'label' => esc_attr__( 'Enable GDPR', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of GDPR.', 'machic-core' ),
				'section' => 'machic_gdpr_settings_section',
				'default' => '0',
			)
		);

		/*====== GDPR Image======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_gdpr_image',
				'label' => esc_attr__( 'Image', 'machic-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'machic-core' ),
				'section' => 'machic_gdpr_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'machic_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Text ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_gdpr_text',
				'label' => esc_attr__( 'GDPR Text', 'machic-core' ),
				'section' => 'machic_gdpr_settings_section',
				'default' => 'In order to provide you a personalized shopping experience, our site uses cookies. <br><a href="#">cookie policy</a>.',
				'required' => array(
					array(
					  'setting'  => 'machic_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Expire Date ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_gdpr_expire_date',
				'label' => esc_attr__( 'GDPR Expire Date', 'machic-core' ),
				'section' => 'machic_gdpr_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'machic_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Button Text ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_gdpr_button_text',
				'label' => esc_attr__( 'GDPR Button Text', 'machic-core' ),
				'section' => 'machic_gdpr_settings_section',
				'default' => 'Accept Cookies',
				'required' => array(
					array(
					  'setting'  => 'machic_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Maintenance Toggle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'machic_maintenance_toggle',
				'label' => esc_attr__( 'Enable Maintenance Mode', 'machic-core' ),
				'description' => esc_attr__( 'You can choose status of Maintenance.', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Maintenance Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_maintenance_title',
				'label' => esc_attr__( 'Title', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'default' => 'Coming',
				'active_callback' => [
					[
					  'setting'  => 'machic_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);

		/*====== Maintenance Second Title ======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_maintenance_second_title',
				'label' => esc_attr__( 'Second Title', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'default' => 'Soon',
				'active_callback' => [
					[
					  'setting'  => 'machic_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Subtitle ======*/
		machic_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'machic_maintenance_subtitle',
				'label' => esc_attr__( 'Subtitle', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'default' => 'Get ready! Something really cool is coming!',
				'active_callback' => [
					[
					  'setting'  => 'machic_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Mailchimp FORM ID======*/
		machic_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'machic_maintenance_mailchimp_formid',
				'label' => esc_attr__( 'Mailchimp Form Id.', 'machic-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'machic_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Image ======*/
		machic_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'machic_maintenance_image',
				'label' => esc_attr__( 'Background Image', 'machic-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'machic-core' ),
				'section' => 'machic_maintenance_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),
				'active_callback' => [
					[
					  'setting'  => 'machic_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],

			)
		);