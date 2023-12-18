<?php

namespace Elementor;

class Machic_Text_Banner2_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-text-banner2';
    }
    public function get_title() {
        return 'Text Banner 2 (K)';
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

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Shop and <strong>Save Big on Hottest</strong> Products',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'machic' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Don\'t miss this special opportunity today.',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'machic' )
            ]
        );
		
        $this->add_control( 'price_text',
            [
                'label' => esc_html__( 'Price Text', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'from',
                'pleaceholder' => esc_html__( 'Add the price text.', 'machic' )
            ]
        );
		
        $this->add_control( 'price',
            [
                'label' => esc_html__( 'Price', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '$79.00',
                'pleaceholder' => esc_html__( 'Add a price.', 'machic' )
            ]
        );

        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic' )
            ]
        );
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'machic' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic' )
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
		
		$this->add_control( 'background_color',
           [
               'label' => esc_html__( 'Background Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-wrapper ' => 'background-color: {{VALUE}} !important ;']
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
               'selectors' => ['{{WRAPPER}} .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_bg_color',
           [
               'label' => esc_html__( 'Second Title Background Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title strong' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_bg_hvrcolor',
           [
               'label' => esc_html__( 'Second Title Background Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title strong:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_color',
           [
               'label' => esc_html__( 'Second Title Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title strong' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_hvrcolor',
           [
               'label' => esc_html__( 'Second Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title strong:hover' => 'color: {{VALUE}};']
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
               'selectors' => ['{{WRAPPER}} .banner-details p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvr_color',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-details p:hover ' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .banner-details p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-details p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-details p',
            ]
        );
		
		$this->add_control( 'price_text_heading',
            [
                'label' => esc_html__( 'PRICE TEXT', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'price_text_color',
           [
               'label' => esc_html__( 'Price Text Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'price_text_hvrcolor',
           [
               'label' => esc_html__( 'Price Text Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'price_text_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-price' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_text_shadow',
				'selector' => '{{WRAPPER}} .banner-price',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_text_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-price',
            ]
        );
		
		$this->add_control( 'price_heading',
            [
                'label' => esc_html__( 'PRICE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'price_color',
           [
               'label' => esc_html__( 'Price Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price span' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'price_hvrcolor',
           [
               'label' => esc_html__( 'Price Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-price span:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_responsive_control( 'price_size',
            [
                'label' => esc_html__( 'Price Size', 'machic-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .banner-price span' => 'font-size: {{SIZE}}px;' ],
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
                'selectors' => ['{{WRAPPER}}  .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .btn '
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
                'selectors' => ['{{WRAPPER}}  .btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}}  .btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}}  .btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}}  .btn',
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
                'selectors' => ['{{WRAPPER}}  .btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'machic-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}}  .btn:hover',
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		echo '<div class="site-module module-banner-text">';
		echo '<div class="banner-wrapper" style="background-color: #f5f5f7;">';
		echo '<div class="banner-inner">';
		echo '<h4 class="entry-title">'.machic_sanitize_data($settings['title']).'</h4>';
		echo '<div class="banner-details">';
		echo '<div class="banner-price">'.esc_html($settings['price_text']).' <span>'.esc_html($settings['price']).'</span>';
		echo '</div><!-- banner-price -->';
		echo '<p>'.esc_html($settings['subtitle']).'</p>';
		echo '</div><!-- banner-details -->';
		echo '<div class="banner-button">';
		echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn small rounded link-color">'.esc_html($settings['btn_title']).'</a>';
		echo '</div>';
		echo '</div><!-- banner-inner -->';
		echo '</div>';
		echo '</div>';
		
	}

}
