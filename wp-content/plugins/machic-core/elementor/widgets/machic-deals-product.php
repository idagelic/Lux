<?php

namespace Elementor;

class Machic_Deals_Product_Widget extends Widget_Base {
    use Machic_Helper;

    public function get_name() {
        return 'machic-deals-product';
    }
    public function get_title() {
        return 'Deals Product (K)';
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
				'label' => esc_html__( 'Content', 'machic-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Latest Deals',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'machic-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic-core' )
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'machic' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 2
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
		
		$this->add_control( 'btn_heading',
            [
                'label' => esc_html__( 'BUTTON', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'btn_color',
           [
               'label' => esc_html__( 'Button Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .btn' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'btn_hvrcolor',
           [
               'label' => esc_html__( 'Button Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .btn' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .btn , {{WRAPPER}} .btn.link i',
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
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

		
		$output .= '<div class="site-module product-deals-module">';
		$output .= '<div class="module-header no-border">';
		$output .= '<h4 class="entry-title">'.machic_sanitize_data($settings['title']).'</h4>';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
		$output .= '</div>';
		$output .= '<div class="module-wrapper">';
		$output .= '<div class="products list-style row">';
			  
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				$imageresize = machic_resize( $image_src, 304, 173, true, true, true );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$managestock = $product->managing_stock();
				$stock_text = $product->get_availability();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'machic_wishlist_button', '0' );
				$compare = get_theme_mod( 'machic_compare_button', '0' );
				$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				$total_sales = $product->get_total_sales();
				$stock_quantity = $product->get_stock_quantity();

				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
				$output .= '<div class="col col-12 col-lg-6">';
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper">';
				$output .= '<div class="product-content">';
				$output .= '<div class="thumbnail-wrapper">';
				if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
				$percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
				$output .= '<div class="product-badges"><span class="badge onsale">'.$percentage.'%</span></div>';
				} elseif( $product->is_on_sale() && $product->get_regular_price() ) {
				$percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
				$output .= '<div class="product-badges"><span class="badge onsale">'.$percentage.'%</span></div>';
				}
				$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';
				$output .= '<img src="'.machic_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
				$output .= '</a>';
				$output .= '</div>';
				$output .= '<div class="content-wrapper">';
				$output .= '<h3 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				if($ratingcount){
				$output .= '<div class="product-rating">';
				$output .= $rating;
				$output .= '<div class="count-rating">'.esc_html($ratingcount).' <span class="rating-text">Ratings</span></div>';
				$output .= '</div>';
				}
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span>';
				if($managestock && $stock_quantity > 0) {
				$output .= '<div class="product-offer-count">';
				$output .= '<div class="product-progress"><span style="width: '.esc_attr($progress_percentage).'%;"></span></div>';
				$output .= '<div class="product-count-detail">';
				$output .= '<div class="available">'.esc_html__('Available:','machic-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
				$output .= '<div class="sold">'.esc_html__('Sold:','machic-core').' <strong>'.esc_html($total_sales).'</strong></div>';
				$output .= '</div>';
				$output .= '</div>';
				}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';

			endwhile;
		}
		wp_reset_postdata();
		
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		echo $output;
	}

}
