<?php

namespace Elementor;

class Machic_Counter_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-counter';
    }
    public function get_title() {
        return 'Counter (K)';
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
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'machic-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2022/03/14',
				'picker_options' => ['enableTime' => false],
			]
		);
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'machic-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Affordable shopping during the cool hours! <a href="#">10% extra discount</a> for your...',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Remains until the end of the offer',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
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
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter-content p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter-content p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_desc_color',
           [
               'label' => esc_html__( 'Second Description Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter-content a' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_desc_hvrcolor',
           [
               'label' => esc_html__( 'Second Description Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter-content a:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .counter-content p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .counter-content p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .counter-content p',
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
               'selectors' => ['{{WRAPPER}} .countdown-text' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown-text:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .countdown-text' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .countdown-text',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .countdown-text',
            ]
        );
	

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		$date = date_create($settings['due_date']);
		
		
		echo '<div class="site-module module-counter-text">';
		echo '<div class="module-wrapper">';
		echo '<div class="counter-content">';
		echo '<p>'.$settings['desc'].'</p>';
		echo '</div><!-- counter-content -->';
		echo '<div class="product-countdown">';
		echo '<div class="countdown" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired','machic-core').'">';
		echo '<div class="count-item days"></div>';
		echo '<span>:</span>';
		echo '<div class="count-item hours"></div>';
		echo '<span>:</span>';
		echo '<div class="count-item minutes"></div>';
		echo '<span>:</span>';
		echo '<div class="count-item second"></div>';
		echo '</div><!-- countdown -->';
		echo '<div class="countdown-text">'.esc_html($settings['subtitle']).'</div>';
		echo '</div><!-- product-countdown -->';
		echo '</div><!-- module-wrapper -->';
		echo '</div><!-- site-module -->';

	}

}
