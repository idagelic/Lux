<?php

namespace Elementor;

class Machic_Banner_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-banner-box';
    }
    public function get_title() {
        return 'Banner Box (K)';
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
					'type3'	  => esc_html__( 'Type 3', 'machic' ),
					'type4'	  => esc_html__( 'Type 4', 'machic' ),
					'type5'	  => esc_html__( 'Type 5', 'machic' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-box.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'machic' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Home Speaker',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Don\'t miss the last opportunity.',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_subtitle',
            [
                'label' => esc_html__( 'Second Subtitle', 'machic' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Weekend Discount',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );

		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' ),
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
		
		$this->add_control( 'second_subtitle_bgcolor',
           [
               'label' => esc_html__( 'Second Subtitle Background Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'background-color: {{VALUE}};'],
			   'condition' => ['box_type' => ['type4']]
           ]
        );
		
		$this->add_control( 'second_subtitle_color',
           [
               'label' => esc_html__( 'Second Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-subtitle',
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
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'machic' ),
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
       
		
		
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		$type = $settings['box_type'] == 'type2' ? 'x1' : '';
		
		
		if($settings['box_type'] == 'type5'){
			echo '<div class="site-module banner-module">';
			echo '<div class="module-wrapper">';
			echo '<div class="banner light align-center medium x1">';
			echo '<div class="banner-content">';
			echo '<div class="banner-content-wrapper">';
			echo '<h6 class="entry-subtitle style-2">'.esc_html($settings['second_subtitle']).'</h6>';
			echo '<h3 class="entry-title">'.machic_sanitize_data($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div>';
			echo '<div class="entry-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn small rounded link-color">'.esc_html($settings['btn_title']).'</a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt="'.esc_attr($settings['title']).'"></div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		
		} elseif($settings['box_type'] == 'type4'){
			echo '<div class="site-module banner-module">';
			echo '<div class="module-wrapper">';
			echo '<div class="banner dark align-center xlarge x1">';
			echo '<div class="banner-content">';
			echo '<div class="banner-content-wrapper">';
			echo '<h6 class="entry-subtitle style-3">'.esc_html($settings['second_subtitle']).'</h6>';
			echo '<h3 class="entry-title">'.machic_sanitize_data($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div>';
			echo '<div class="entry-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn small rounded link-color">'.esc_html($settings['btn_title']).'</a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt="'.esc_attr($settings['title']).'"></div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}elseif($settings['box_type'] == 'type3'){
			echo '<div class="widget">';
			echo '<div class="widget-body">';
			echo '<div class="banner dark align-top medium vertical">';
			echo '<div class="banner-content">';
			echo '<div class="banner-content-wrapper">';
			echo '<h6 class="entry-subtitle style-2">'.esc_html($settings['second_subtitle']).'</h6>';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div><!-- entry-description -->';
			echo '<div class="entry-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn small rounded link-color">'.esc_html($settings['btn_title']).'</a>';
			}
			echo '</div><!-- entry-button -->';
			echo '</div><!-- banner-content-wrapper -->';
			echo '</div><!-- banner-content -->';
			echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt="'.esc_attr($settings['title']).'"></div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div><!-- banner -->';
			echo '</div><!-- widget-body -->';
			echo '</div>';
		} else {
			echo '<div class="site-module banner-module">';
			echo '<div class="module-wrapper">';
			echo '<div class="banner dark align-center medium bordered '.esc_attr($type).'">';
			echo '<div class="banner-content">';
			echo '<div class="banner-content-wrapper">';
			echo '<h6 class="entry-subtitle style-2">'.esc_html($settings['second_subtitle']).'</h6>';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div>';
			echo '<div class="entry-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" class="btn small rounded link-color">'.esc_html($settings['btn_title']).'</a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'" alt="'.esc_attr($settings['title']).'"></div>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}

	}

}
