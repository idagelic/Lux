<?php

namespace Elementor;

class Machic_Product_Categories_Widget extends Widget_Base {
    use Machic_Helper;
	
    public function get_name() {
        return 'machic-product-categories';
    }
    public function get_title() {
        return 'Product Categories (K)';
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
		
		$this->add_control( 'category_type',
			[
				'label' => esc_html__( 'Category Type', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'machic-core' ),
					'grid'	      => esc_html__( 'Grid', 'machic-core' ),
					'carousel'	  => esc_html__( 'Carousel', 'machic-core' ),
				],
			]
		);


		$this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab('cat_include_tab',
            [ 'label' => esc_html__( 'Include Category', 'machic-core' ) ]
        );
       
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Include Category', 'machic-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_include_tab 
		
        $this->start_controls_tab( 'cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'machic-core' ) ]
        );
		
        $this->add_control( 'exclude_category',
            [
                'label' => esc_html__( 'Exclude Category', 'machic-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
       
		$this->end_controls_tab(); // cat_exclude_tab

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
		$this->add_control( 'carousel_column',
			[
				'label' => esc_html__( 'Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'2' 	  => esc_html__( '2 Columns', 'machic-core' ),
					'3'		  => esc_html__( '3 Columns', 'machic-core' ),
					'4'		  => esc_html__( '4 Columns', 'machic-core' ),
					'5'		  => esc_html__( '5 Columns', 'machic-core' ),
					'6'		  => esc_html__( '6 Columns', 'machic-core' ),
					'7'		  => esc_html__( '7 Columns', 'machic-core' ),
					'8'		  => esc_html__( '8 Columns', 'machic-core' ),
				],
				'condition' => ['category_type' => 'carousel']
			]
		);
		
		$this->add_control( 'carousel_mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'1' 	  => esc_html__( '1 Column', 'machic-core' ),
					'2'		  => esc_html__( '2 Columns', 'machic-core' ),
				],
				'condition' => ['category_type' => 'carousel']
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
				'condition' => ['category_type' => 'carousel']
			]
		);
		
        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'chakta' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => ['category_type' => 'carousel']
			]
		);

		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'shopwise' ),
					'6' 	  => esc_html__( '2 Columns', 'shopwise' ),
					'4'		  => esc_html__( '3 Columns', 'shopwise' ),
				],
				'condition' => ['category_type' => ['select-type','grid']]
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
                'default' => 'ASC'
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
                'default' => 'menu_order',
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
               'selectors' => ['{{WRAPPER}} .category-name a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_title_hvrcolor',
           [
               'label' => esc_html__( 'Category Title Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .category-name a:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .category-name a' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_title_text_shadow',
				'selector' => '{{WRAPPER}} .category-name a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_title_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .category-name a',
				
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
               'selectors' => ['{{WRAPPER}} .category-detail ul li a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Category Subtitle Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .category-detail ul li a:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .category-detail ul li a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .category-detail ul li a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_subtitle_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .category-detail ul li a',
				
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
               'selectors' => ['{{WRAPPER}} .category-detail .btn.link' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'btn_hvrcolor',
           [
               'label' => esc_html__( 'Button Hover Color', 'machic-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .category-detail .btn.link:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .category-detail .btn.link' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .category-detail .btn.link',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'machic-core' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .category-detail .btn.link , {{WRAPPER}} .category-detail .btn.link i',
            ]
        );
		
		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if($settings['cat_filter'] || $settings['exclude_category']){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		}


		if($settings['category_type'] == 'carousel'){
			echo '<div class="site-module module-category-list style-3">';
			echo '<div class="module-wrapper">';
			echo '<div class="swiper-container" data-items="'.esc_attr($settings['carousel_column']).'" data-mobileitems="'.esc_attr($settings['carousel_mobile_column']).'" data-tabletitems="3" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-effect="slide" data-direction="horizontal" data-loop="true" data-speed="1000" data-spacebetween="60" >';
			echo '<div class="swiper-wrapper">';
				foreach ( $terms as $term ) {
					
					$term_data = get_option('taxonomy_'.$term->term_id);
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					$term_children = get_term_children( $term->term_id, 'product_cat' );
					
					echo '<div class="swiper-slide">';
					echo '<div class="category-item">';
					echo '<a href="'.esc_url(get_term_link( $term )).'">';
					echo '<div class="category-image">';
					if($image){
						echo '<img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'">';
					}
					echo '</div>';
					echo '<div class="category-detail">';
					echo '<h3 class="category-name">'.esc_html($term->name).'</h3>';
					echo '<span>'.esc_html($term->count).' Products</span>';
					echo '</div><!-- category-detail -->';
					echo '</a>';
					echo '</div><!-- category-item -->';
					echo '</div><!-- swiper-slide -->';
				}
									
									
			echo '</div><!-- swiper-wrapper -->';
				
			if($settings['arrows'] == 'true'){
				echo '<div class="swiper-button-prev"></div>';
				echo '<div class="swiper-button-next"></div>';
			}
			
			echo '</div><!-- swiper-container -->';

			echo '</div><!-- module-wrapper -->';
			echo '</div><!-- site-module -->';

		} else {
			echo '<div class="row">';
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				
				echo '<div class="klb-product-category col col-12 col-lg-'.esc_attr($settings['column']).'">';
				echo '<div class="site-module module-category-list style-1">';
				if($image){
				echo '<div class="category-image"><a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a></div>';
				}
				echo '<div class="category-detail">';
				echo '<h3 class="category-name"><a href="'.esc_url(get_term_link( $term )).'">'.esc_html($term->name).'</a></h3>';
				if($term_children){
					$count = 0;
					echo '<ul>';
					foreach($term_children as $child){
						if($count < 4){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						
						echo '<li><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).'</a></li>';
						}
						
						$count++;
					}
					echo '</ul>';
				}
				echo '<a href="'.esc_url(get_term_link( $term )).'" class="btn link">'.esc_html__('All','machic').' '.esc_html($term->name).' <i class="klbth-icon-right-arrow"></i></a>';
				echo '</div><!-- category-detail -->';
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
		
	}

}
