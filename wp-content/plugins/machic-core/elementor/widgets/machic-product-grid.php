<?php

namespace Elementor;

class Machic_Product_Grid_Widget extends Widget_Base {
    use Machic_Helper;

    public function get_name() {
        return 'machic-product-grid';
    }
    public function get_title() {
        return 'Product Grid (K)';
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
		
		$this->add_control( 'product_type',
			[
				'label' => esc_html__( 'Product Type', 'machic' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'machic' ),
					'type1'	  => esc_html__( 'Type 1', 'machic' ),
					'type2'	  => esc_html__( 'Type 2', 'machic' ),
					'type3'	  => esc_html__( 'Type 3', 'machic' ),
					'type4'	  => esc_html__( 'Type 4', 'machic' ),
					'type5'	  => esc_html__( 'Type 5', 'machic' ),
				],
			]
		);
		
		$this->add_control( 'disable_hover',
			[
				'label' => esc_html__( 'Disable Hover?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Best Sellers',
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'2' 	  => esc_html__( '2 Columns', 'machic-core' ),
					'3'		  => esc_html__( '3 Columns', 'machic-core' ),
					'4'		  => esc_html__( '4 Columns', 'machic-core' ),
					'5'		  => esc_html__( '5 Columns', 'machic-core' ),
					'6'		  => esc_html__( '6 Columns', 'machic-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'1' 	  => esc_html__( '1 Column', 'machic-core' ),
					'2'		  => esc_html__( '2 Columns', 'machic-core' ),
				],
			]
		);

        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'machic-core' ),
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
                'label' => esc_html__( 'Include Post', 'machic-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'machic-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'machic-core' ),
                    'DESC' => esc_html__( 'Descending', 'machic-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'machic-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'machic-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'machic-core' ),
                    'rand' => esc_html__( 'Random', 'machic-core' ),
                    'date' => esc_html__( 'Date', 'machic-core' ),
                    'title' => esc_html__( 'Title', 'machic-core' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->end_controls_section();


		/* Countdown Start*/
		$this->start_controls_section(
			'countdown_section',
			[
				'label' => esc_html__( 'Countdown', 'machic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'countdown',
			[
				'label' => esc_html__( 'Countdown', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'machic-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2022/03/14',
				'picker_options' => ['enableTime' => false],
				'condition' => ['countdown' => 'true']
			]
		);
		
        $this->add_control( 'countdown_title',
            [
                'label' => esc_html__( 'Countdown Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Remains until the end of the offer',
                'description'=> 'Add a text for the countdown.',
				'label_block' => true,
				'condition' => ['countdown' => 'true']
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
		
		$this->add_control( 'countdown_heading',
            [
                'label' => esc_html__( 'COUNTDOWN', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'countdown_title_color',
           [
               'label' => esc_html__( 'Countdown Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown-text' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'countdown_title_hvrcolor',
           [
               'label' => esc_html__( 'Countdown Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .countdown-text:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'countdown_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .countdown-text ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'countdown_text_shadow',
				'selector' => '{{WRAPPER}} .countdown-text',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'countdown_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .countdown-text',
				
            ]
        );
		
		$this->add_control( 'dua_date_heading',
            [
                'label' => esc_html__( 'DUE DATE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'dua_date_bgcolor',
           [
               'label' => esc_html__( 'Due Date Background Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-countdown .count-item' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'dua_date_bghvrcolor',
           [
               'label' => esc_html__( 'Due Date Background Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-countdown .count-item:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'dua_date_color',
           [
               'label' => esc_html__( 'Due Date Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-countdown .count-item' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'dua_date_hvrcolor',
           [
               'label' => esc_html__( 'Due Date Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-countdown .count-item:hover' => 'color: {{VALUE}};']
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
	
		$args['klb_special_query'] = true;
	
		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

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
		
		$hovereffect = $settings['disable_hover'] == 'true' ? 'disable-hover' : '';
	

		$output .= '<div class="site-module products-module">';
		
		if($settings['title']){
			$output .= '<div class="module-header">';
			$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
			
			if($settings['countdown'] == 'true'){
				$date = date_create($settings['due_date']);
				$output .= '<div class="product-countdown">';
				$output .= '<div class="countdown" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','machic-core').'">';
				$output .= '<div class="count-item days"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item hours"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item minutes"></div>';
				$output .= '<span>:</span>';
				$output .= '<div class="count-item second"></div>';
				$output .= '</div><!-- countdown -->';
				$output .= '<div class="countdown-text">'.esc_html($settings['countdown_title']).'</div>';
				$output .= '</div>';
			}
			
			$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
			$output .= '</div>';
		}
		
		$output .= '<div class="module-wrapper">';
		$output .= '<div class="products column-'.esc_attr($settings['column']).' mobile-'.esc_attr($settings['mobile_column']).' '.esc_attr($hovereffect).' total-'.esc_attr($settings['post_count']).'">';
		
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				if($settings['product_type'] == 'type5'){
				$output .= machic_product_type5();
				} elseif($settings['product_type'] == 'type4'){
				$output .= machic_product_type4();
				} elseif($settings['product_type'] == 'type3'){
				$output .= machic_product_type3();
				} elseif($settings['product_type'] == 'type2'){
				$output .= machic_product_type2();
				} else {
				$output .= machic_product_type1();
				}
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
