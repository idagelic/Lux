<?php

namespace Elementor;

class Machic_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'machic-home-slider';
    }
    public function get_title() {
        return 'Home Slider (K)';
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
		
		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'machic' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'machic' ),
					'type1'	  => esc_html__( 'Type 1', 'machic' ),
					'type2'	  => esc_html__( 'Type 2', 'machic' ),
				],
			]
		);		

		$this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'machic-core' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$defaultbg = plugins_url( 'images/home-slider.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'machic' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'slider_offer',
            [
                'label' => esc_html__( 'Item Offer', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Weekend Discount',
                'pleaceholder' => esc_html__( 'Add an offer for the item.', 'machic-core' )
            ]
        );

        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Item Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Enchance Your',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'machic-core' )
            ]
        );
		
        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Item Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Entertainment',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'machic-core' )
            ]
        );
		
        $repeater->add_control( 'slider_second_subtitle',
            [
                'label' => esc_html__( 'Item Second Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Last call for up to <strong>%20</strong> off!',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'machic-core' )
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' )
            ]
        );
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'machic-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic-core' )
            ]
        );
		
        $this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'machic-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Enchance Your',
                        'slider_subtitle' => 'Entertainment',
                        'slider_second_subtitle' => 'Last call for up to <strong>%20</strong> off!',
                        'slider_offer' => 'Weekend Discount',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Enchance Your',
                        'slider_subtitle' => 'Entertainment',
                        'slider_second_subtitle' => 'Last call for up to <strong>%20</strong> off!',
                        'slider_offer' => 'Weekend Discount',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Enchance Your',
                        'slider_subtitle' => 'Entertainment',
                        'slider_second_subtitle' => 'Last call for up to <strong>%20</strong> off!',
                        'slider_offer' => 'Weekend Discount',
                        'slider_btn_title' => 'Shop Now',
                        'slider_btn_link' => '#',
                    ],

                ]
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
		
		$this->add_responsive_control( 'container_padding',
            [
                'label' => esc_html__( 'Padding', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-content , {{WRAPPER}} banner-content-wrapper ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->add_responsive_control( 'widget_alignment',
            [
                'label' => esc_html__( 'Alignment', 'machic-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .banner-content' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .banner-image img',
			]
		);
		
		$this->add_control( 'offer_title_heading',
            [
                'label' => esc_html__( 'OFFER TITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'offer_bgcolor',
           [
               'label' => esc_html__( 'Offer Background Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner .entry-subtitle' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'offer_hvrbgcolor',
           [
               'label' => esc_html__( 'Offer Background Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .banner .entry-subtitle:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'offer_title_color',
           [
               'label' => esc_html__( 'Offer Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner .entry-subtitle' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'offer_title_hvrcolor',
           [
               'label' => esc_html__( 'Offer Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .banner .entry-subtitle:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'offer_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'offer_title_text_shadow',
				'selector' => '{{WRAPPER}} .banner .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'offer_title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner .entry-subtitle',
				
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
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content .entry-title strong' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content .entry-title strong:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content .entry-title strong' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content .entry-title strong',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content .entry-title strong',
            ]
        );
		
		$this->add_control( 'second_subtitle_heading',
            [
                'label' => esc_html__( 'SECOND SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'second_subtitle_color',
           [
               'label' => esc_html__( 'Second Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content .entry-description' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Second Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-content .entry-description:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'per_cent_color',
           [
               'label' => esc_html__( 'Per Cent Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description strong' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'per_cent_hvrcolor',
           [
               'label' => esc_html__( 'Per Cent Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description strong:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-content .entry-description' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content .entry-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-content .entry-description',
            ]
        );
		
		$this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('machic_nav_styling',
            [
                'label' => esc_html__( ' Nav Style', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
       
	    $this->start_controls_tabs( 'slider_nav_tabs');
        $this->start_controls_tab( 'slider_nav_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'machic-core' ) ]
        );
        
		$this->add_control( 'nav_clr',
           [
               'label' => esc_html__( 'Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .swiper-button-next , .swiper-button-prev' => 'color: {{VALUE}};']
           ]
        );
				
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .swiper-button-next , .swiper-button-prev ',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .swiper-button-next , .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->add_control( 'nav_size',
            [
                'label' => esc_html__( ' Size', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .swiper-button-next , .swiper-button-prev' => 'height: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .swiper-button-next , .swiper-button-prev',
                'separator' => 'before'
            ]
        );
		
		$this->add_control( 'home_slider_prev_heading',
            [
                'label' => __( 'PREV POSITION', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .swiper-button-prev' => 'left:{{SIZE}}%;' ],
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .swiper-button-prev' => 'top:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_control( 'home_slider_next_heading',
            [
                'label' => __( 'NEXT POSITION', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .swiper-button-next' => 'left:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .swiper-button-next' => 'top:{{SIZE}}%;' ],
            ]
        );
       
	    $this->end_controls_tab();
        $this->start_controls_tab( 'slider_nav_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'machic-core' ) ]
        );
       
	    $this->add_control( 'nav_hvrclr',
            [
               'label' => esc_html__( 'Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .swiper-button-next:hover , .swiper-button-prev:hover' => 'color: {{VALUE}};'
               ]
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_hvr_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .swiper-button-next:hover , .swiper-button-prev:hover',
                'separator' => 'before'
            ]
        );
		
		$this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .entry-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-button .btn '
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
                'selectors' => ['{{WRAPPER}} .entry-button .btn' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->start_controls_tabs('btn_tabs');
        $this->start_controls_tab( 'btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'machic-core' ) ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'machic-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-button .btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .entry-button .btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .entry-button .btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .entry-button .btn',
            ]
        );
       
		$this->end_controls_tab();
        $this->start_controls_tab('btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'machic-core' ) ]
        );
       
	    $this->add_control( 'btn_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'machic-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-button .btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .entry-button .btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .entry-button .btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .entry-button .btn:hover',
            ]
        );
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['slider_items'] ) {

			if($settings['slider_type']== 'type2'){
				$type = 'full-width';
			}else{
				$type = '';
			}

			echo '<div class="site-module slider-module '.esc_attr($type).'">';
			echo '<div class="swiper-container" data-effect="slide" data-direction="horizontal" data-loop="true" data-speed="1000" data-spacebetween="0" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-items="1" data-mobileitems="1" data-tabletitems="1">';
			echo '<div class="swiper-wrapper">';
			
			foreach ( $settings['slider_items'] as $item ) {
				$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="swiper-slide">';
				echo '<div class="banner dark align-center large">';
				echo '<div class="banner-content">';
				echo '<div class="banner-content-wrapper">';
				if($item['slider_offer']){
				echo '<h6 class="entry-subtitle style-3">'.esc_html($item['slider_offer']).'</h6>';
				}
				echo '<h3 class="entry-title">'.esc_html($item['slider_title']).' <strong>'.esc_html($item['slider_subtitle']).'</strong></h3>';
				echo '<div class="entry-description">';
				echo '<p>'.machic_sanitize_data($item['slider_second_subtitle']).'</p>';
				echo '</div>';
				if($item['slider_btn_title']){
				echo '<div class="entry-button">';
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="btn small rounded link-color" '.esc_attr($target.$nofollow).'>'.esc_html($item['slider_btn_title']).'</a>';
				echo '</div>';
				}
				echo '</div>';
				echo '</div>';
				echo '<div class="banner-image"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider"></div>';
				echo '<a class="overlay-link" href="'.esc_url($item['slider_btn_link']['url']).'"></a>';
				echo '</div>';
				echo '</div>';
			}
			
			echo '</div>';
			
			if($settings['dots'] == 'true'){
			echo '<div class="swiper-pagination"></div>';
			}
			
			if($settings['arrows'] == 'true'){
			echo '<div class="swiper-button-prev"></div>';
			echo '<div class="swiper-button-next"></div>';
			}
			
			echo '</div>';
			echo '</div>';

		}
	}

}

