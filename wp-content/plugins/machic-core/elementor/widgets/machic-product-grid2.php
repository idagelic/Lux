<?php

namespace Elementor;

class Machic_Product_Grid2_Widget extends Widget_Base {
    use Machic_Helper;

    public function get_name() {
        return 'machic-product-grid2';
    }
    public function get_title() {
        return 'Product Grid 2 (K)';
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
		
		$this->add_control( 'product_type',
			[
				'label' => esc_html__( 'Product Type', 'machic' ),
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
		
		$this->add_control( 'disable_hover',
			[
				'label' => esc_html__( 'Disable Hover?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Best Sellers',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'machic-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'machic-core' )
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'2' 	  => esc_html__( '2 Columns', 'machic-core' ),
					'3'		  => esc_html__( '3 Columns', 'machic-core' ),
					'4'		  => esc_html__( '4 Columns', 'machic-core' ),
					'5'		  => esc_html__( '5 Columns', 'machic-core' ),
					'6'		  => esc_html__( '6 Columns', 'machic-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'machic-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'machic-core' ),
					'1' 	  => esc_html__( '1 Column', 'machic-core' ),
					'2'		  => esc_html__( '2 Columns', 'machic-core' ),
				],
			]
		);

        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'machic-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'machic-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => 'all',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'machic-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->machic_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'machic-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'machic-core' ),
                    'DESC' => esc_html__( 'Descending', 'machic-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'machic-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'machic-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'machic-core' ),
                    'rand' => esc_html__( 'Random', 'machic-core' ),
                    'date' => esc_html__( 'Date', 'machic-core' ),
                    'title' => esc_html__( 'Title', 'machic-core' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'machic-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'machic-core' ),
				'label_off' => esc_html__( 'False', 'machic-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
	
		$args['klb_special_query'] = true;
	
		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
		
		$hovereffect = $settings['disable_hover'] == 'true' ? 'disable-hover' : '';
	
		$output .= '<div class="site-module">';
		
		if($settings['title']){
			$output .= '<div class="module-header">';
			$output .= '<h4 class="entry-title">'.esc_html($settings['title']).'</h4>';
			$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link">'.esc_html($settings['btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
			$output .= '</div>';
		}
		
		$output .= '<div class="module-wrapper">';
		

		
		$output .= '<div class="row align-items-center">';
		

		$count = 1;
		$leftcolumn = $settings['post_count']/2;
		$rightcolumn = $leftcolumn + 1; 
		
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				if($count == 1){
				$output .= '<div class="col col-12 col-lg-4 list-products spacing">';
				$output .= '<div class="products products list-style column-1 mobile-1">';
				}
				
				if($count == $rightcolumn){
				$output .= '<div class="col col-12 col-lg-4 list-products spacing">';
				$output .= '<div class="products products list-style column-1 mobile-1">';
				}
				
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				if($settings['product_type'] == 'type5'){
				$output .= machic_product_type5();
				} elseif($settings['product_type'] == 'type4'){
				$output .= machic_product_type4();
				} elseif($settings['product_type'] == 'type3'){
				$output .= machic_product_type3();
				} elseif($settings['product_type'] == 'type2'){
				$output .= machic_product_type2();
				} else {
				$output .= machic_product_type1();
				}
				$output .= '</div>';
			
			
			
				if($count == $leftcolumn){
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="col col-12 col-lg-4 products column-1 mobile-1">';
				$output .= '<div class="products special-offer-product">';
				$output .= '<div class="product most-commented">';
				
				$output .= machic_product_type_counter();
					
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				}
				
				
				if($count == $settings['post_count']){
				$output .= '</div>';
				$output .= '</div>';
				}
				
				$count++;
				
			endwhile;
		}
		wp_reset_postdata();
			

		
		$output .= '</div><!--row-->';

		
		$output .= '</div>';
		$output .= '</div>';



		echo $output;
	}

}
