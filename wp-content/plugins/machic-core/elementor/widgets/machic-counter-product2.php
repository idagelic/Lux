<?php

namespace Elementor;

class Machic_Counter_Product2_Widget extends Widget_Base {
    use Machic_Helper;

    public function get_name() {
        return 'machic-counter-product2';
    }
    public function get_title() {
        return 'Counter Product 2 (K)';
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
                'label' => esc_html__( 'Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Special Offer',
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
                'default' => 1
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
                'label' => esc_html__( 'Content', 'machic-core' ),
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
                'selectors' => ['{{WRAPPER}} .entry-title' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-title',
				
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
			
		$output .= '<div class="products special-offer-product">';

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
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( 'most-commented', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper">';
				$output .= '<div class="product-content">';
				$output .= '<div class="special-counter">';
				$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
				if($sale_price_dates_to){
				$output .= '<div class="product-countdown">';
				$output .= '<div class="countdown-text">'.esc_html__('Remains until the end of the offer','machic-core').'</div>';
				$output .= '<div class="countdown" data-date="'.esc_attr($sale_price_dates_to).'" data-text="'.esc_attr__('Expired','machic-core').'">';
				$output .= '<div class="count-item days"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item hours"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item minutes"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item second"></div>';
				$output .= '</div><!-- countdown -->';
				$output .= '</div><!-- product-countdown -->';
				}
				$output .= '</div><!-- special-counter -->';
				$output .= '<div class="thumbnail-wrapper">';
				$output .= machic_sale_percentage();
				$output .= '<a href="'.get_permalink().'"><img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';
				$output .= '<div class="product-buttons">';

				ob_start();
				do_action('machic_wishlist_action');
				$output .= ob_get_clean();
				
				if($product->is_featured()){
				$output .= '<a href="'.esc_url(add_query_arg('featured','yes',wc_get_page_permalink( 'shop' ))).'" class="most-comments">';
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.002 512.002"><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="236.938" y1="458.428" x2="236.938" y2="-71.182" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffcf95"/><stop offset=".427" stop-color="#ffc954"/><stop offset="1" stop-color="#ffc200"/></linearGradient><path d="M274.84 23.212l67.722 137.218 151.429 22.004c17.232 2.503 24.112 23.68 11.644 35.835L396.058 325.077l25.867 150.817c2.944 17.162-15.07 30.25-30.482 22.147L256 426.835l-135.442 71.206c-15.412 8.102-33.426-4.985-30.482-22.147l25.867-150.817L6.367 218.268c-12.469-12.155-5.588-33.33 11.644-35.835l151.429-22.004 67.721-137.217c7.707-15.615 29.972-15.615 37.679 0z" fill="url(#a)"/><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="361.338" y1="390.131" x2="201.238" y2="390.131" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M342.56 160.43L274.84 23.212c-3.853-7.807-11.346-11.711-18.839-11.711V271.29l86.559-110.86z" fill="url(#b)"/><linearGradient id="c" gradientUnits="userSpaceOnUse" x1="388.687" y1="144.838" x2="346.287" y2="353.638" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M396.058 325.077l109.575-106.81c6.151-5.996 7.586-14.185 5.399-21.247L256 271.289l140.058 53.788z" fill="url(#c)"/><linearGradient id="d" gradientUnits="userSpaceOnUse" x1="183.098" y1="35.109" x2="349.158" y2="201.169" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M413.63 496.393L256 271.289v155.546l135.442 71.206c7.734 4.066 16.121 2.794 22.188-1.648z" fill="url(#d)"/><linearGradient id="e" gradientUnits="userSpaceOnUse" x1="64.678" y1="245.108" x2="187.078" y2="142.708" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M256 271.289l-140.058 53.788-25.866 150.817c-1.467 8.55 2.271 16.087 8.294 20.499L256 271.289z" fill="url(#e)"/><linearGradient id="f" gradientUnits="userSpaceOnUse" x1="156.433" y1="414.02" x2="106.833" y2="273.22" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M.968 197.021L256 271.289l-86.56-110.86-151.429 22.005C9.28 183.702 3.214 189.767.968 197.021z" fill="url(#f)"/><linearGradient id="g" gradientUnits="userSpaceOnUse" x1="343.14" y1="399.316" x2="-21.26" y2="244.116" gradientTransform="matrix(1.0667 0 0 -1.0667 3.267 557.535)"><stop offset="0" stop-color="#ffc200" stop-opacity="0"/><stop offset=".203" stop-color="#fb0" stop-opacity=".203"/><stop offset=".499" stop-color="#ffa700" stop-opacity=".499"/><stop offset=".852" stop-color="#f80" stop-opacity=".852"/><stop offset="1" stop-color="#ff7800"/></linearGradient><path d="M115.943 325.077L6.367 218.268c-6.151-5.996-7.586-14.185-5.399-21.247L256 271.289l-140.057 53.788z" fill="url(#g)"/></svg>';
				$output .= '</a>';
				}
				
				ob_start();
				$output .= do_action('machic_compare_action');
				$output .= ob_get_clean();
				
				if($quickview == '1'){
				$output .= '<a data-product_id="'.$product->get_id().'" class="detail-bnt quickview animated"><i class="klbth-icon-eye-empty"></i></a>';
				}
				
				$output .= '</div><!-- product-buttons -->';
				$output .= '</div><!-- thumbnail-wrapper -->';
				$output .= '<div class="content-wrapper">';
															
				if($ratingcount){
				$output .= '<div class="product-rating">';
				$output .= $rating;
				$output .= '<div class="count-rating">'.esc_html($ratingcount).' <span class="rating-text">Ratings</span></div>';
				$output .= '</div>';
				}
																
				$output .= '<h3 class="product-title"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h3>';
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span><!-- price -->';
				$output .= '<div class="product-meta">';
				if(machic_shipping_class_name()){
				$output .= '<div class="product-message color-light">'.machic_shipping_class_name().'</div>';
				}
				$output .= '</div><!-- product-meta -->';
				if($managestock && $stock_quantity > 0) {
				$output .= '<div class="product-offer-count">';
				$output .= '<div class="product-progress"><span style="width: '.esc_attr($progress_percentage).'%;"></span></div>';
				$output .= '<div class="product-count-detail">';
				$output .= '<div class="available">'.esc_html__('Available:','machic-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
				$output .= '<div class="sold">'.esc_html__('Sold:','machic-core').' <strong>'.esc_html($total_sales).'</strong></div>';
				$output .= '</div><!-- product-count-detail -->';
				$output .= '</div><!-- product-offer-count -->';
				}
				$output .= '</div><!-- content-wrapper -->';
				$output .= '</div><!-- product-content -->';
				$output .= '</div><!-- product-wrapper -->';
				$output .= '</div><!-- product -->';

			endwhile;
		}
		wp_reset_postdata();


		$output .= '</div>';
		
		echo $output;
	}

}
