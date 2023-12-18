<?php

namespace Elementor;

class Machic_Icon_List_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-icon-list';
    }
    public function get_title() {
        return 'Icon List (K)';
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
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'machic-core' ),
				'label_off' => esc_html__( 'No', 'machic-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'machic-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klbth-icon-box-1',
                'description'=> 'You can add icon code. for example: klbth-icon-box-1',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
       $repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'pleaceholder' => esc_html__( 'Enter the title', 'machic-core' ),
                'default' => 'International Shipment',
                'label_block' => true,
            ]
        );

       $repeater->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'machic-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'machic-core' ),
                'default' => 'Your orders are shipped seamlessly between countries',
            ]
        );
		
        $this->add_control( 'icon_items',
            [
                'label' => esc_html__( 'Icon Items', 'machic-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'switcher_icon' => 'yes',
						'custom_icon' => 'klbth-icon-box-1',
						'title' => 'International Shipment',
                        'desc' => 'Your orders are shipped seamlessly between countries',
                    ],
                    [
						'switcher_icon' => 'yes',
						'custom_icon' => 'klbth-icon-delivery-return',
						'title' => 'Extended 45 day returns',
                        'desc' => 'You have the right to return your orders within 45 days.',
                    ],
                    [
						'switcher_icon' => 'yes',
						'custom_icon' => 'klbth-icon-payment-security',
						'title' => 'Secure Payment',
                        'desc' => 'Your payments are secure with our private security network.',
                    ],

                ]
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
		
		$this->end_controls_section();
		$this->start_controls_section('machic_styling',
            [
                'label' => esc_html__( ' Style', 'machic-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'machic-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .icon i' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .icon i' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .icon i:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .icon i' => 'opacity: {{VALUE}};'],
				
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
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .text p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .text p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .text p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .text p',
				
            ]
        );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if ( $settings['icon_items'] ) {
			echo '<div class="widget widget_klb_iconboxes">';
			echo '<div class="widget-body">';
			echo '<div class="iconboxes-widget">';

			foreach($settings['icon_items'] as $item){
				echo '<div class="item">';
				echo '<div class="icon">';
				if($item['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
				}  
				echo '</div>';
				echo '<div class="text">';
				echo '<h5 class="entry-title">'.esc_html($item['title']).'</h5>';
				echo '<p>'.machic_sanitize_data($item['desc']).'</p>';
				
				echo '</div>';
				echo '</div>';
			}

			echo '</div><!-- iconboxes -->';
			echo '</div><!-- widget-body -->';
			echo '</div>';
		}
		
	}

}
