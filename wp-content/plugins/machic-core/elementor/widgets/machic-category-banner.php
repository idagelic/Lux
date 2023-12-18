<?php

namespace Elementor;

class Machic_Category_Banner_Widget extends Widget_Base {
    use Machic_Helper;
	
    public function get_name() {
        return 'machic-category-banner';
    }
    public function get_title() {
        return 'Category Banner (K)';
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
                'default' => 'NEW PRODUCTS',
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
				'default' => '3',
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
                'label' => esc_html__( 'Posts Per Page', 'machic' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 6
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
		
		$this->end_controls_section();


		$this->start_controls_section(
			'banner_section',
			[
				'label' => esc_html__( 'Banner', 'machic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/category-banner.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'machic' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'banner_title',
            [
                'label' => esc_html__( 'Banner Title', 'machic-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Galaxy A46',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'banner_subtitle',
            [
                'label' => esc_html__( 'Banner Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Don\'t miss the last opportunity.',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );

        $this->add_control( 'banner_second_subtitle',
            [
                'label' => esc_html__( 'Banner Second Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Samsung Phone',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );		
		
        $this->add_control( 'banner_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' )
            ]
        );
		
        $this->add_control( 'banner_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'machic-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic-core' )
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
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-header .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-header .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-header .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .module-header .btn' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'btn_hvrcolor',
           [
               'label' => esc_html__( 'Button Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .btn:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .module-header .btn' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-header .btn , {{WRAPPER}} .btn.link i',
            ]
        );
		
		$this->add_control( 'category_title_heading',
            [
                'label' => esc_html__( 'CATEGORY TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'category_title_color',
           [
               'label' => esc_html__( 'Category Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .categories-list .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_title_hvrcolor',
           [
               'label' => esc_html__( 'Category Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .categories-list .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .categories-list .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_title_text_shadow',
				'selector' => '{{WRAPPER}} .categories-list .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .categories-list .entry-title',
				
            ]
        );
		
		$this->add_control( 'category_subtitle_heading',
            [
                'label' => esc_html__( 'CATEGORY SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'category_subtitle_color',
           [
               'label' => esc_html__( 'Category Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .categories-list ul li a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Category Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .categories-list ul li a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .categories-list ul li a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .categories-list ul li a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .categories-list ul li a',
				
            ]
        );
		
		$this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('banner_styling',
            [
                'label' => esc_html__( ' Banner', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'banner_container_padding',
            [
                'label' => esc_html__( 'Padding', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->add_responsive_control( 'banner_widget_alignment',
            [
                'label' => esc_html__( 'Alignment', 'machic-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper ' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'banner_image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'banner_css_filters',
				'selector' => '{{WRAPPER}} .banner-image img',
			]
		);
		
		$this->add_control( 'banner_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'banner_title_color',
           [
               'label' => esc_html__( 'Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'banner_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_title_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-title',
				
            ]
        );
		
		$this->add_control( 'banner_subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'banner_subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-description ' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'banner_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-description' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-description',
            ]
        );
		
		$this->add_control( 'banner_second_subtitle_heading',
            [
                'label' => esc_html__( 'SECOND SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'banner_second_subtitle_color',
           [
               'label' => esc_html__( 'Second Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-subtitle ' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'banner_second_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-subtitle',
            ]
        );
		
		$this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('banner_btn_styling',
            [
                'label' => esc_html__( ' Banner Button Style', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'banner_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .banner-content-wrapper .entry-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'banner_btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-button .btn '
            ]
        );
		
		$this->add_control( 'banner_btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-button .btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_control( 'banner_btn_color',
            [
                'label' => esc_html__( 'Color', 'machic-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-button .btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'banner_btn_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-button .btn ',
            ]
        );
        
		$this->add_responsive_control( 'banner_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-content-wrapper .entry-button .btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'banner_btn_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-content-wrapper .entry-button .btn',
            ]
        );
       
		

		$this->end_controls_section();

		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		$bannertarget = $settings['banner_btn_link']['is_external'] ? ' target="_blank"' : '';
		$bannernofollow = $settings['banner_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			'parent'    => 0,
			'include'   => $settings['cat_filter'],
			'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		) );


		
		$term_children = get_term_children( implode(' ',$settings['cat_filter']), 'product_cat' );
		$catlink = get_term_link( intval(implode(' ',$settings['cat_filter'])), 'product_cat' );
		$term = get_term( implode(' ',$settings['cat_filter']), 'product_cat' );
		$term_name = isset($term->name) ? $term->name : '';

		$output .= '<div class="site-module products-category-module style-1">';
			  
		if($settings['title']){
		$output .= '<div class="module-header">';
		$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
		$output .= '</div>';
		}
		
		$output .= '<div class="module-wrapper">';
		
		$output .= '<div class="module-column">';
		$output .= '<div class="product-category-detail">';
		$output .= '<div class="category-banner">';
		$output .= '<div class="banner dark align-top">';
		$output .= '<div class="banner-content">';
		$output .= '<div class="banner-content-wrapper">';
		$output .= '<h6 class="entry-subtitle style-2">'.esc_html($settings['banner_second_subtitle']).'</h6>';
		$output .= '<h3 class="entry-title">'.machic_sanitize_data($settings['banner_title']).'</h3>';
		$output .= '<div class="entry-description">';
		$output .= '<p>'.esc_html($settings['banner_subtitle']).'</p>';
		$output .= '</div><!-- entry-description -->';
		$output .= '<div class="entry-button">';
		$output .= '<a href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn small rounded link-color">'.esc_html($settings['banner_btn_title']).'</a>';
		$output .= '</div><!-- entry-button -->';
		$output .= '</div><!-- banner-content-wrapper -->';
		$output .= '</div><!-- banner-content -->';
		$output .= '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt=""></div>';
		$output .= '<a href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
		$output .= '</div><!-- banner -->';
		$output .= '</div><!-- category-banner -->';
		$output .= '<div class="categories-list">';
		$output .= '<h4 class="entry-title">'.esc_html($term_name).'</h4>';
		if($term_children){
			$count = 0;
			
			$output .= '<ul>';
			foreach($term_children as $child){
				if($count < 5){
				$childterm = get_term_by( 'id', $child, 'product_cat' );
				
				$output .= '<li><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).' <span class="count">( '.esc_html($childterm->count).' )</span></a></li>';
				}

				
				$count++;
			}
			
			
			$output .= '</ul>';
		}


		$output .= '</div><!-- categories-list -->';
		$output .= '</div><!-- product-category-detail -->';
		$output .= '</div><!-- module-column -->';

		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
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
		
		$output .= '<div class="module-column">';
		$output .= '<div class="products column-'.esc_attr($settings['column']).' mobile-'.esc_attr($settings['mobile_column']).'">';


		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;

				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= machic_product_type1();
				$output .= '</div>';
				
			endwhile;
		}
		wp_reset_postdata();


		$output .= '</div><!-- products -->';
		$output .= '</div><!-- column -->';
		$output .= '</div><!-- module-wrapper -->';
		$output .= '</div><!-- site-module -->';

		echo $output;

		
	}

}
