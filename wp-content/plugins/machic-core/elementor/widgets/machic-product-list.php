<?php

namespace Elementor;

class Machic_Product_List_Widget extends Widget_Base {
    use Machic_Helper;

    public function get_name() {
        return 'machic-product-list';
    }
    public function get_title() {
        return 'Product List (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'machic' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'machic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Trending Products',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'machic' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 4
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'machic' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'machic' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'machic' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'machic' ),
                    'DESC' => esc_html__( 'Descending', 'machic' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'machic' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'machic' ),
                    'menu_order' => esc_html__( 'Menu Order', 'machic' ),
                    'rand' => esc_html__( 'Random', 'machic' ),
                    'date' => esc_html__( 'Date', 'machic' ),
                    'title' => esc_html__( 'Title', 'machic' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'machic' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic' ),
				'label_off' => esc_html__( 'False', 'machic' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'machic' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic' ),
				'label_off' => esc_html__( 'False', 'machic' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'machic' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic' ),
				'label_off' => esc_html__( 'False', 'machic' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
		
		$this->end_controls_section();
		$this->start_controls_section('machic_styling',
            [
                'label' => esc_html__( 'Style', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'widget_alignment',
            [
                'label' => esc_html__( 'Alignment', 'machic-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .widget-title ' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'machic-core' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'machic-core' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'machic-core' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .widget-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .widget-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .widget-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .widget-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .widget-title',
				
            ]
        );
		
		$this->add_control( 'product_title_heading',
            [
                'label' => esc_html__( 'PRODUCT TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'product_title_color',
           [
               'label' => esc_html__( 'Product Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-title a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_hvrcolor',
           [
               'label' => esc_html__( 'Product Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-title a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .product-title a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'product_title_text_shadow',
				'selector' => '{{WRAPPER}} .product-title a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .product-title a',
				
            ]
        );
		
		$this->add_control( 'regular_price_heading',
            [
                'label' => esc_html__( 'REGULAR PRICE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'regular_price_color',
           [
               'label' => esc_html__( 'Regular Price Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .price del' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'regular_price_size',
            [
                'label' => esc_html__( 'Regular Price Size', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .price del' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'regular_price_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .price del' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'regular_price_text_shadow',
				'selector' => '{{WRAPPER}} .price del',
			]
		);
		
		$this->add_control( 'sale_price_heading',
            [
                'label' => esc_html__( 'SALE PRICE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'sale_price_color',
           [
               'label' => esc_html__( 'Sale Price Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .price ins' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'sale_price_size',
            [
                'label' => esc_html__( 'Sale Price Size', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .price ins' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'sale_price_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .price ins' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sale_price_text_shadow',
				'selector' => '{{WRAPPER}} .price ins',
			]
		);
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
	
		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
	
		$output .= '<div class="widget widget_klb_products_list">';
		$output .= '<h4 class="widget-title">'.esc_html($settings['title']).'</h4>';
		$output .= '<div class="widget-body">';
		$output .= '<div class="products column-1 mobile-1">';

		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$stock_text = $product->get_availability();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'machic_wishlist_button', '0' );
				$compare = get_theme_mod( 'machic_compare_button', '0' );
				$quickview = get_theme_mod( 'machic_quick_view_button', '0' );
				$managestock = $product->managing_stock();
				$total_sales = $product->get_total_sales();
				$stock_quantity = $product->get_stock_quantity();
				$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
			
				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper">';
				$output .= '<div class="product-content">';
				$output .= '<div class="thumbnail-wrapper">';
				$output .= '<a href="'.get_permalink().'"><img src="'.machic_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';
				$output .= '</div><!-- thumbnail-wrapper -->';
				$output .= '<div class="content-wrapper">';
				$output .= '<h3 class="product-title"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h3>';
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span><!-- price -->';
				$output .= '</div><!-- content-wrapper -->';
				$output .= '</div><!-- product-content -->';
				$output .= '</div><!-- product-wrapper -->';
				$output .= '</div>';

			endwhile;
		}
		wp_reset_postdata();

		$output .= '</div><!-- products -->';
		$output .= '</div><!-- widget-body -->';
		$output .= '</div>';

			
		echo $output;
	}

}
