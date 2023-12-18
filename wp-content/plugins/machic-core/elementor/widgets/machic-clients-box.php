<?php

namespace Elementor;

class Machic_Clients_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-clients-box';
    }
    public function get_title() {
        return 'Clients Box (K)';
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


		$customimg = plugins_url( 'images/client.png', __DIR__ );
		$repeater = new Repeater();

        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'machic' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );
		
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Image Link', 'machic-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic-core' )
            ]
        );

        $this->add_control( 'client_items',
            [
                'label' => esc_html__( 'Client Items', 'machic' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
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
		
		$this->add_control( 'box_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .site-brands.opacity .brand-item img ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'machic-core' ),
                'selector' => '{{WRAPPER}} .site-brands.opacity .brand-item img ',
            ]
        );
        
		$this->add_responsive_control( 'box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'machic-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .site-brands.opacity .brand-item img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="site-module logos-module">';
		echo '<div class="module-body">';
		echo '<div class="site-brands column-6 opacity">';
		
		if ( $settings['client_items'] ) {
			foreach ( $settings['client_items'] as $item ) {
				$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="brand-item">';
				echo '<a href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'><img src="'.esc_url($item['image']['url']).'" alt="client"></a>';
				echo '</div>';

			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';

		
	}

}
