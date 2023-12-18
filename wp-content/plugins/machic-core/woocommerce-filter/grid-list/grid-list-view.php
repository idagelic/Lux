<?php 
/*************************************************
* Catalog Ordering
*************************************************/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); 
add_action( 'klb_catalog_ordering', 'woocommerce_catalog_ordering', 30 ); 

add_action( 'woocommerce_before_shop_loop', 'machic_catalog_ordering_start', 30 );
function machic_catalog_ordering_start(){
?>

	<div class="before-shop-loop">
		<div class="row sidebar-left">
			<div class="col col-12 col-lg-9 content-column">
				
				<div class="filter-button hide-desktop">
					<a href="#">
						<i class="klbth-icon-filter"></i>
						<?php esc_html_e('Filter Products','machic-core'); ?>
					</a>
				</div>
				<div class="filter-wrapper">
					<div class="sorting-product">
						<!-- For get orderby from loop -->
						<?php do_action('klb_catalog_ordering'); ?>
					</div>
					
					<!-- For perpage option-->
					<?php if(get_theme_mod('machic_perpage_view','0') == '1'){ ?>
						<?php $perpage = isset($_GET['perpage']) ? $_GET['perpage'] : ''; ?>
						<?php $defaultperpage = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page(); ?>
						<?php $options = array($defaultperpage,$defaultperpage*2,$defaultperpage*3,$defaultperpage*4); ?>
						<div class="sorting-product hide-mobile">
							<span><?php esc_html_e('Show:','machic-core'); ?></span>
							<form class="woocommerce-ordering product-filter products-per-page" method="get">
								<?php if (machic_get_body_class('machic-ajax-shop-on')) { ?>
									<select name="perpage" class="perpage showing filterSelect" data-class="select-filter-perpage">
								<?php } else { ?>
									<select name="perpage" class="perpage showing filterSelect" data-class="select-filter-perpage" onchange="this.form.submit()">
								<?php } ?>
										<?php for( $i=0; $i<count($options); $i++ ) { ?>
										<option value="<?php echo esc_attr($options[$i]); ?>" <?php echo esc_attr($perpage == $options[$i] ? 'selected="selected"' : ''); ?>><?php echo esc_html($options[$i]); ?> <?php esc_html_e('Items','machic-core'); ?></option>
										<?php } ?>
								</select>
								<?php wc_query_string_form_fields( null, array( 'perpage', 'submit', 'paged', 'product-page' ) ); ?>
							</form>
						</div>

					<?php } ?>
					
					<?php if(get_theme_mod('machic_grid_list_view','0') == '1'){ ?>
						<div class="product-views-buttons hide-mobile">
							<?php if(machic_shop_view() == 'list_view') { ?>
								<a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_html_e('Grid Products','machic-core'); ?>"><i class="klbth-icon-view-grid"></i></a>
								<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_html_e('List Products','machic-core'); ?>"><i class="klbth-icon-list"></i></a>
							<?php } else { ?>
								<a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_html_e('Grid Products','machic-core'); ?>"><i class="klbth-icon-view-grid"></i></a>
								<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_html_e('List Products','machic-core'); ?>"><i class="klbth-icon-list"></i></a>
							<?php } ?>
						</div><!-- product-views-buttons -->
					<?php } ?>
				</div><!-- filter-wrapper -->
				
				<?php if( get_theme_mod( 'machic_shop_layout' ) == 'full-width' || machic_get_option() == 'full-width') { ?>
					<div class="filter-desktop-button dropdown hide-mobile">
						<a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="klbth-icon-filter"></i>
							<?php esc_html_e('Filter Products','machic-core'); ?>
						</a>
						<div class="filter-holder dropdown-menu">
							<div class="filter-holder-wrapper">
								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div><!-- filter-holder-wrapper -->
						</div><!-- filter-holder -->
					</div><!-- filter-button -->
				<?php } ?>
			</div><!-- col -->
			<div class="col col-12 col-lg-3 sidebar-column hide-mobile">
				<?php add_action( 'machic_result_count', 'woocommerce_result_count', 20 ); ?>
				<?php do_action('machic_result_count'); ?>
			</div><!-- col -->
		</div><!-- row -->
	</div>

<?php

}