<?php $headersearch = get_theme_mod('machic_header_search','0'); ?>
<?php if($headersearch == 1){ ?>
	<div class="header-form site-search">
		<?php if(machic_page_settings('page_header_type') == 'type2' || get_theme_mod('machic_header_type') == 'type2' || machic_page_settings('page_header_type') == 'type4' || get_theme_mod('machic_header_type') == 'type4') { ?>
			<span><?php esc_html_e('What are you looking for ?','machic'); ?></span>
		<?php } ?>
		<?php echo machic_header_product_search(); ?>
	</div><!-- site-search -->
<?php } ?>