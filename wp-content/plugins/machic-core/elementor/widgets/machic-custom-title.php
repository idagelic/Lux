<?php

namespace Elementor;

class Machic_Custom_Title_Widget extends Widget_Base {

    public function get_name() {
        return 'machic-custom-title';
    }
    public function get_title() {
        return 'Custom Title (K)';
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
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'machic-core' ),
					'type1'	  => esc_html__( 'Type 1', 'machic-core' ),
					'type2'	  => esc_html__( 'Type 2', 'machic-core' ),
					'type3'	  => esc_html__( 'Type 3', 'machic-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Best Sellers',
                'pleaceholder' => esc_html__( 'Set a title.', 'machic' ),
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'machic' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Subtitle here',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'machic' ),
				'condition' => ['title_type' => ['type2','type3']]
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'machic' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'description here',
                'pleaceholder' => esc_html__( 'Set a description.', 'machic' ),
				'condition' => ['title_type' => ['type2','type3']]
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' ),
				'condition' => ['title_type' => ['type1','select-type']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'machic-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'machic-core' ),
				'condition' => ['title_type' => ['type1','select-type']]
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
                'selectors' => ['{{WRAPPER}} .site-module' => 'text-align: {{VALUE}};'],
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
				'condition' => ['title_type' => ['type2' , 'type3']]
                
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
				'condition' => ['title_type' => ['type2' , 'type3']]
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' , 'type3']]
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' , 'type3']]
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
                'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'opacity: {{VALUE}};'],
				'condition' => ['title_type' => ['type2' , 'type3']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
				'condition' => ['title_type' => ['type2' , 'type3']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-subtitle',
				'condition' => ['title_type' => ['type2' , 'type3']]
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type2' , 'type3']]
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-content p ' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' , 'type3']]
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-content p:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2' , 'type3']]
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
                'selectors' => ['{{WRAPPER}} .entry-content p' => 'opacity: {{VALUE}};'],
				'condition' => ['title_type' => ['type2' , 'type3']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-content p',
				'condition' => ['title_type' => ['type2' , 'type3']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-content p',
				'condition' => ['title_type' => ['type2' , 'type3']]
            ]
        );
		
		$this->add_control( 'btn_heading',
            [
                'label' => esc_html__( 'BUTTON', 'machic-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type1' , 'select-type' ]]
            ]
        );
		
		$this->add_control( 'btn_color',
           [
               'label' => esc_html__( 'Button Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .btn' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1' , 'select-type' ]]
           ]
        );
		
		$this->add_control( 'btn_hvrcolor',
           [
               'label' => esc_html__( 'Button Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .btn:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1' , 'select-type' ]]
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
				'condition' => ['title_type' => ['type1' , 'select-type' ]]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .btn',
				'condition' => ['title_type' => ['type1' , 'select-type' ]]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .btn , {{WRAPPER}} .btn.link i',
				'condition' => ['title_type' => ['type1' , 'select-type' ]]
            ]
        );

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
			
		$output = '';
		
		if($settings['title_type'] == 'type3'){
			echo '<div class="site-module module-title small">';
			echo '<h4 class="entry-subtitle">'.esc_html($settings['subtitle']).'</h4>';
			echo '<h1 class="entry-title">'.esc_html($settings['title']).'</h1>';
			if($settings['desc']){
			echo '<div class="entry-content">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div><!-- entry-content -->';
			}
			echo '</div><!-- site-module -->';
		}elseif($settings['title_type'] == 'type2'){
			echo '<div class="site-module module-title">';
			echo '<h4 class="entry-subtitle">'.esc_html($settings['subtitle']).'</h4>';
			echo '<h1 class="entry-title">'.esc_html($settings['title']).'</h1>';
			echo '<div class="entry-content">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div><!-- entry-content -->';
			echo '</div><!-- site-module -->';
		} else {
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			echo '<div class="site-module klb-custom-title">';
			echo '<div class="module-header">';
			echo '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
			echo '</div><!-- module-header -->';
			echo '</div>';
		}

	}

}
