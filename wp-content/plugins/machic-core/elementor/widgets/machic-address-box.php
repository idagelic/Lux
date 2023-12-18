<?php

namespace Elementor;

class Machic_Address_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-address-box';
    }
    public function get_title() {
        return 'Address Box (K)';
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

        $this->add_control( 'country',
            [
                'label' => esc_html__( 'Country', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'United States',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'country_subtitle',
            [
                'label' => esc_html__( 'Country Subtitle', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'United States Office',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'address',
            [
                'label' => esc_html__( 'Address', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '205 Middle Road, 2nd Floor, New York',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'phone',
            [
                'label' => esc_html__( 'phone', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '+02 1234 567 88',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'email',
            [
                'label' => esc_html__( 'Email', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'info@example.com',
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
		
		$this->add_responsive_control( 'widget_alignment',
            [
                'label' => esc_html__( 'Alignment', 'machic-core' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .address-detail' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'country_heading',
            [
                'label' => esc_html__( 'COUNTRY', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'country_color',
           [
               'label' => esc_html__( 'Country Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .country' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'country_hvrcolor',
           [
               'label' => esc_html__( 'Country Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .country:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'country_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .country ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'country_text_shadow',
				'selector' => '{{WRAPPER}} .country',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'country_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .country',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'COUNTRY SUBTITLE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Country Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .address-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Country Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .address-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .address-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .address-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .address-title',
				
            ]
        );
		
		$this->add_control( 'address_heading',
            [
                'label' => esc_html__( 'ADDRESS', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'address_color',
           [
               'label' => esc_html__( 'Address Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .address' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'address_hvrcolor',
           [
               'label' => esc_html__( 'Address Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .address:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'address_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .address ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'address_text_shadow',
				'selector' => '{{WRAPPER}} .address',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'address_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .address',
				
            ]
        );
		
		$this->add_control( 'phone_heading',
            [
                'label' => esc_html__( 'PHONE', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'phone_color',
           [
               'label' => esc_html__( 'Phone Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .phone a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'phone_hvrcolor',
           [
               'label' => esc_html__( 'Phone Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .phone a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'phone_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .phone a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'phone_text_shadow',
				'selector' => '{{WRAPPER}} .phone a ',
			]
		);
		
		$this->add_control( 'email_heading',
            [
                'label' => esc_html__( 'EMAIL', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'email_color',
           [
               'label' => esc_html__( 'Email Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .email a ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'email_hvrcolor',
           [
               'label' => esc_html__( 'Email Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .email a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'email_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .email a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'email_text_shadow',
				'selector' => '{{WRAPPER}} .email a ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'email_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .email a ',
				
            ]
        );

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="address-detail">';
		echo '<span class="country">'.esc_html($settings['country']).'</span>';
		echo '<h5 class="address-title">'.esc_html($settings['country_subtitle']).'</h5>';
		echo '<p class="address">'.esc_html($settings['address']).'</p>';
		echo '<p class="phone"><a href="tel:'.esc_attr($settings['phone']).'">'.esc_html($settings['phone']).'</a></p>';
		echo '<p class="email"><a href="mailto:'.esc_attr($settings['email']).'">'.esc_html($settings['email']).'</a></p>';
		echo '</div><!-- address-detail -->';

	}

}
