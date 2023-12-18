<?php

namespace Elementor;

class Machic_Banner_Box2_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-banner-box2';
    }
    public function get_title() {
        return 'Banner Box 2 (K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'box_type',
			[
				'label' => esc_html__( 'Box Type', 'machic' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'machic' ),
					'type1'	  => esc_html__( 'Type 1', 'machic' ),
					'type2'	  => esc_html__( 'Type 2', 'machic' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-box2.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'machic' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Home Speaker',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'chakta' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Maecenas non erat',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'chakta' )
            ]
        );
		
        $this->add_control( 'second_subtitle',
            [
                'label' => esc_html__( 'Second Subtitle', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Weekend Discount',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'chakta' )
            ]
        );
		
        $this->add_control( 'regular_price',
            [
                'label' => esc_html__( 'Regular Price', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$399.00',
                'pleaceholder' => esc_html__( 'Add a price.', 'chakta' )
            ]
        );
		
        $this->add_control( 'sale_price',
            [
                'label' => esc_html__( 'Sale Price', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$299.00',
                'pleaceholder' => esc_html__( 'Add a sale price.', 'chakta' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
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
                'selectors' => ['{{WRAPPER}} .banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
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
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .entry-description p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-description p',
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
               'selectors' => ['{{WRAPPER}} .banner-price-content p' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .banner-price-content p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-price-content p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-price-content p',
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
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		$type = $settings['box_type'] == 'type2' ? 'small' : '';
		
		echo '<div class="site-module banner-module">';
		echo '<div class="module-wrapper">';
		echo '<div class="banner dark align-center price-banner '.esc_attr($type).'">';
		echo '<div class="banner-content">';
		echo '<div class="banner-content-wrapper">';
		echo '<div class="entry-description">';
		echo '<p>'.esc_html($settings['subtitle']).'</p>';
		echo '</div><!-- entry-description -->';
		echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
		echo '<div class="banner-price-content">';
		echo '<p>'.esc_html($settings['second_subtitle']).'</p>';
		echo '<span class="price">';
		echo '<del aria-hidden="true">';
		echo '<span class="woocommerce-Price-amount amount"><bdi>'.esc_html($settings['regular_price']).'</bdi></span>';
		echo '</del>';
		echo '<ins>';
		echo '<span class="woocommerce-Price-amount amount"><bdi>'.esc_html($settings['sale_price']).'</bdi></span>';
		echo '</ins>';
		echo '</span><!-- price -->';
		echo '</div><!-- banner-price-content -->';
		echo '</div><!-- banner-content-wrapper -->';
		echo '</div><!-- banner-content -->';
		echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt="banner"></div>';
		echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
		echo '</div><!-- banner -->';
		echo '</div><!-- module-wrapper -->';
		echo '</div>';

	}

}
