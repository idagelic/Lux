<?php 
/*************************************************
## Machic Typography
*************************************************/

function machic_custom_styling() { ?>

<style type="text/css">
<?php if (get_theme_mod( 'machic_mobile_sticky_header',0 ) == 1) { ?>
@media(max-width:64rem){
	header.sticky-header {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		background: #fff;
	}	
}
<?php } ?>


<?php if (get_theme_mod( 'machic_mobile_single_sticky_cart',0 ) == 1) { ?>
@media(max-width:64rem){
	.single .single-product-wrapper .product-type-simple form.cart {
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
	}

	.single .single-product-wrapper .woocommerce-variation-add-to-cart {
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
    	width: 100%;
		flex-wrap: wrap;
	}
}
<?php } ?>


<?php if (get_theme_mod( 'machic_main_color' )) { ?>
:root {
    --color-primary: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_second_color' )) { ?>
:root {
    --color-secondary: <?php echo esc_attr(get_theme_mod( 'machic_second_color' ) ); ?>;
}
.site-header .header-addons-icon .button-count ,
.site-footer .footer-newsletter .site-newsletter .subscribe-form button{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_second_color' ) ); ?> ;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_link' )) { ?>
:root {
    --color-link: <?php echo esc_attr(get_theme_mod( 'machic_color_link' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_shop_button' )) { ?>
:root {
	--color-shop-button: <?php echo esc_attr(get_theme_mod( 'machic_color_shop_button' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_shop_button_active' )) { ?>
:root {
	--color-shop-button-active: <?php echo esc_attr(get_theme_mod( 'machic_color_shop_button_active' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_danger' )) { ?>
:root {
	--color-theme-danger: <?php echo esc_attr(get_theme_mod( 'machic_color_danger' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_warning' )) { ?>
:root {
	--color-theme-warning: <?php echo esc_attr(get_theme_mod( 'machic_color_warning' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_success' )) { ?>
:root {
	--color-theme-success: <?php echo esc_attr(get_theme_mod( 'machic_color_success' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'machic_color_light' )) { ?>
:root {
	--color-theme-light: <?php echo esc_attr(get_theme_mod( 'machic_color_light' ) ); ?>;
}
<?php } ?>

.header-type1 .header-top   {
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_top_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_top_color' ) ); ?>;
}

.header-type1 .header-top .site-menu .menu .sub-menu a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header1_top_color' ) ); ?>;
}

.header-type1 .header-top .site-menu .menu > li > a:hover:hover , .header-type1 .header-top .site-menu .menu .sub-menu a:hover ,
.header-type1 .header-top .site-menu .menu > li.menu-item-has-children:hover > a {
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_top_hvrcolor' ) ); ?>;
}

.header-type1 .header-main , .header-type1 .header-nav,
.header-type1 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_bg_color' ) ); ?>;
}

.header-type1 .header-addons-text .primary-text , .header-type1 .site-menu.primary .menu > li > a ,
.header-type1 .header-nav .site-menu .menu .sub-menu a , .header-type1 .header-addons-text .sub-text ,
.header-type1 .header-nav .site-menu .menu > .menu-item.current-menu-item > a ,
.header-type1 .discount-products .discount-banner-text .small-text,
.header-type1 .discount-products .discount-banner-text .main-text ,
.header-type1 .discount-products .discount-banner-arrow{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_font_color' ) ); ?>;
}

.header-type1 .header-nav .site-menu .menu > li > a:hover , .header-type1 .header-nav .site-menu .menu .sub-menu a:hover , 
.header-type1 .header-nav .site-menu .menu > li.menu-item-has-children:hover > a ,
.header-type1 .header-nav .site-menu .menu .sub-menu .menu-item-has-children:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_font_hvrcolor' ) ); ?>;
}

.header-type1 .header-addons-icon{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_icon_color' ) ); ?>;
}

.header-type1 .header-nav .site-menu .menu .mega-menu .sub-menu .menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sub_title_font_color' ) ); ?>;
}

.header-type1 .header-addons-icon .button-count{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_counter_bg_color' ) ); ?>;
}

.header-type1 .site-departments.large .site-departments-wrapper > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_title_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_title_font_color' ) ); ?>;
}

.header-type1 .site-departments .departments-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_font_color' ) ); ?>;
}

.header-type1 .site-departments .departments-menu > li > a:hover , .header-type1 .site-departments .departments-menu .sub-menu a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_font_hvrcolor' ) ); ?>;
}

.header-type1 .site-departments .departments-menu > li + li{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_brdrcolor' ) ); ?>;
}

.header-type1 .site-departments .departments-menu .sub-menu li.menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_sidebar_subtitle_font_color' ) ); ?>;
}

.header-type1 .header-main .input-search-button button{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_search_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'machic_header1_search_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header1_search_font_color' ) ); ?>;
}

.klb-type2 .header-top {
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_top_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_top_color' ) ); ?>;
}

.klb-type2 .header-top .site-menu .menu .sub-menu a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header2_top_color' ) ); ?>;
}

.klb-type2 .header-top .site-menu .menu > li > a:hover ,
.klb-type2 .header-top .site-menu .menu .sub-menu a:hover ,
.klb-type2 .header-top .site-menu .menu > li.menu-item-has-children:hover > a {
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_top_hvrcolor' ) ); ?>;
}

.klb-type2 .header-main,
.klb-type2 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_bg_color' ) ); ?>;
}

.klb-type2 .header-addons-text .primary-text, .klb-type2 .header-main .site-menu.primary .menu > li > a,
.klb-type2 .header-main .site-menu.horizontal .menu .sub-menu a, .klb-type2 .header-addons-text .sub-text {
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_font_color' ) ); ?>;
}

.klb-type2 .header-main .site-menu.primary .menu > li > a:hover , 
.klb-type2 .header-main .site-menu.horizontal .menu .sub-menu a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_font_hvrcolor' ) ); ?>;
}

.klb-type2 .header-main .header-addons-icon{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_icon_color' ) ); ?>;
}

.klb-type2 .header-addons-icon .button-count{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_counter_bg_color' ) ); ?>;
}

.klb-type2 .header-search-column{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_column_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_column_font_color' ) ); ?>;
}

.klb-type2 .header-search-column .site-search > span:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_column_font_hvrcolor' ) ); ?>;
}

.klb-type2 .site-menu.horizontal .menu .mega-menu > .sub-menu > .menu-item > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sub_title_font_color' ) ); ?>;
}

.klb-type2 .site-departments.large .site-departments-wrapper > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_title_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_title_font_color' ) ); ?>;
}

.klb-type2 .site-departments .departments-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_font_color' ) ); ?>;
}

.klb-type2 .site-departments .departments-menu > li > a:hover ,
.klb-type2 .site-departments .departments-menu .sub-menu a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_font_hvrcolor' ) ); ?>;
}

.klb-type2 .site-departments .departments-menu > li + li{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_brdrcolor' ) ); ?>;
}

.klb-type2 .site-departments .departments-menu .sub-menu li.menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_sidebar_subtitle_font_color' ) ); ?>;
}

.klb-type2 .header-search-column .input-search-button button{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header2_search_font_color' ) ); ?>;
}

.header-type3 .header-top   {
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_top_bg_color' ) ); ?>;
}

.header-type3 .header-top .site-menu .menu > li > a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header3_top_color' ) ); ?>;
}

.header-type3 .header-top .site-menu .menu > li > a:hover , 
.header-type3 .header-top .site-menu .menu > li.menu-item-has-children:hover > a
{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_top_hvrcolor' ) ); ?>;
}

.header-type3 .header-top .site-menu .menu .sub-menu a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header3_subtitle_top_color' ) ); ?>;
}

.header-type3  .header-top .site-menu .menu .sub-menu a:hover{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header3_subtitle_top_hvrcolor' ) ); ?>;
}

.header-type3 .header-main , .header-type3  .header-nav{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_bg_color' ) ); ?>;
}

.header-type3 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_mobile_bg_color' ) ); ?>;
}

.header-type3 .header-addons-text , .header-type3 .header-nav .site-menu .menu > li > a , 
.header-type3 .header-nav .site-menu .menu > .menu-item.current-menu-item > a ,
.header-type3 .discount-products .discount-banner-text .small-text,
.header-type3 .discount-products .discount-banner-text .main-text ,
.header-type3 .discount-products .discount-banner-arrow{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_font_color' ) ); ?>;
}
.header-type3 .header-nav .site-menu .menu > li.menu-item-has-children:hover > a , 
.header-type3 .header-nav  .site-menu .menu > li > a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_font_hvrcolor' ) ); ?>;
}

.header-type3 .header-nav .site-menu .menu .mega-menu .sub-menu .menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sub_title_font_color' ) ); ?>;
}

.header-type3 .header-nav .site-menu .menu .sub-menu a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sub_subtitle_font_color' ) ); ?>;
}

.header-type3 .header-nav .site-menu .menu .sub-menu a:hover ,
.header-type3  .header-nav .site-menu .menu .sub-menu .menu-item-has-children:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sub_subtitle_font_hvrcolor' ) ); ?>;
}

.header-type3 .header-addons-icon{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_icon_color' ) ); ?>;
}

.header-type3 .header-addons-icon .button-count{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_counter_bg_color' ) ); ?>;
}

.header-type3 .site-departments.large .site-departments-wrapper > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_title_bg' ) ); ?> !important;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_title_font_color' ) ); ?>;
}

.header-type3 .site-departments .departments-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_font_color' ) ); ?>;
}

.header-type3 .site-departments .departments-menu > li > a:hover ,
 .header-type3 .site-departments .departments-menu .sub-menu a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_font_hvrcolor' ) ); ?>;
}

.header-type3 .site-departments .departments-menu > li + li{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_brdrcolor' ) ); ?>;
}

.header-type3 .site-departments .departments-menu .sub-menu li.menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_sidebar_subtitle_font_color' ) ); ?>;
}

.header-type3 .header-main .input-search-button button{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_search_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'machic_header3_search_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header3_search_font_color' ) ); ?>;
}

.klb-type4 .header-top   {
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_top_bg_color' ) ); ?>;
}

.klb-type4 .header-top .site-menu .menu > li > a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header4_top_color' ) ); ?>;
}

.klb-type4 .header-top .site-menu .menu > li > a:hover , 
.klb-type4 .header-top .site-menu .menu > li.menu-item-has-children:hover > a ,
{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_top_hvrcolor' ) ); ?>;
}

.klb-type4 .header-top .site-menu .menu .sub-menu a{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header4_subtitle_top_color' ) ); ?>;
}

.klb-type4  .header-top .site-menu .menu .sub-menu a:hover{
	 color: <?php echo esc_attr(get_theme_mod( 'machic_header4_subtitle_top_hvrcolor' ) ); ?>;
}

.klb-type4 .header-main{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_bg_color' ) ); ?>;
}

.klb-type4 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_mobile_bg_color' ) ); ?>;
}

.klb-type4 .header-addons-text .primary-text, .klb-type4 .header-main .site-menu.primary .menu > li > a,
.klb-type4 .header-addons-text .sub-text {
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_font_color' ) ); ?>;
}

.klb-type4 .custom-color-dark .site-menu .menu > li.menu-item-has-children:hover > a ,
.klb-type4  .custom-color-dark .site-menu .menu > li > a:hover
{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_font_hvrcolor' ) ); ?>;
}

.klb-type4 .header-main .header-addons-icon{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_icon_color' ) ); ?>;
}

.klb-type4 .header-addons-icon .button-count{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_counter_bg_color' ) ); ?>;
}

.klb-type4 .header-search-column .input-search-button button{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_font_color' ) ); ?>;
}

.klb-type4 .header-search-column{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_column_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_column_font_color' ) ); ?>;
}

.klb-type4 .header-search-column .site-search > span:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_search_column_font_hvrcolor' ) ); ?>;
}

.klb-type4 .site-departments.large .site-departments-wrapper > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_title_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_title_font_color' ) ); ?>;
}

.klb-type4 .site-departments .departments-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_font_color' ) ); ?>;
}

.klb-type4 .site-departments .departments-menu > li > a:hover ,
.klb-type4 .site-departments .departments-menu .sub-menu a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_font_hvrcolor' ) ); ?>;
}

.klb-type4 .site-departments .departments-menu > li + li{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_brdrcolor' ) ); ?>;
}

.klb-type4 .site-departments .departments-menu .sub-menu li.menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sidebar_subtitle_font_color' ) ); ?>;
}

.klb-type4 .site-menu.horizontal .menu .mega-menu > .sub-menu > .menu-item > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sub_title_font_color' ) ); ?>;
}

.klb-type4 .custom-color-dark.header-main .site-menu .sub-menu a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sub_subtitle_font_color' ) ); ?>;
}

.klb-type4 .custom-color-dark.header-main .site-menu .menu .sub-menu a:hover ,
.klb-type4  .custom-color-dark.header-main .site-menu .menu .sub-menu .menu-item-has-children:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_header4_sub_subtitle_font_hvrcolor' ) ); ?>;
}

.discount-products .discount-products-header h4.entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'machic_tab_title_color' ) ); ?>;
}

.discount-products .discount-products-header h4.entry-title:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_tab_title_hvrcolor' ) ); ?>;
}

.site-header .discount-products-header p{
	color: <?php echo esc_attr(get_theme_mod( 'machic_tab_subtitle_color' ) ); ?>;
}

.site-header .discount-products-header p:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_tab_subtitle_hvrcolor' ) ); ?>;
}

.site-footer .footer-newsletter{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_bg' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_title_color' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-title:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_title_hvrcolor' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-description p{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_subtitle_color' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-description p:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_subtitle_hvrcolor' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-description p strong{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_subtitle_strong_color' ) ); ?>;
}

.site-footer .footer-newsletter .site-newsletter .entry-description p strong:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_subscribe_subtitle_strong_hvrcolor' ) ); ?>;
}

.site-footer .footer-widgets{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_featured_widget_bg_color' ) ); ?>;
}

.site-footer .footer-widgets .widget-title{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_widget_title_color' ) ); ?>;
}

.site-footer .footer-widgets .widget-title:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_widget_title_hvrcolor' ) ); ?>;
}

.site-footer .footer-widgets .widget ul li a,
.site-footer .footer-widgets .widget,
.site-footer .footer-widgets .widget a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_widget_subtitle_color' ) ); ?>;
}

.site-footer .footer-widgets .widget ul li a:hover,
.site-footer .footer-widgets .widget a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_widget_subtitle_hvrcolor' ) ); ?>;
}

.site-footer .footer-copyright .site-copyright,
.site-footer .footer-copyright .site-copyright a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_copyright_color' ) ); ?>;
}

.site-footer .footer-copyright .site-copyright:hover,
.site-footer .footer-copyright .site-copyright:a{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_copyright_hvrcolor' ) ); ?>;
}

.site-footer .footer-details .site-details .tags li a ,
.site-footer .footer-details .site-details .tags li::after{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_tags_color' ) ); ?>;
}

.site-footer .footer-details .site-details .tags li a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_featured_tags_hvrcolor' ) ); ?>;
}

.footer-details , .footer-copyright{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_featured_bg_color' ) ); ?>;
}

.footer-details .site-social ul li a{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_footer_social_icon_bg' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'machic_footer_social_icon_color' ) ); ?>;
}

.site-footer .footer-row.bordered .container{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_featured_border_color' ) ); ?>;
}

.site-header .discount-products .discount-items{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_products_tab_bg_color' ) ); ?>;
}

.mobile-bottom-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_menu_bg_color' ) ); ?>;
}
.mobile-bottom-menu .mobile-menu ul li a i{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_menu_icon_color' ) ); ?>;
}

.mobile-bottom-menu .mobile-menu ul li a i:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_menu_icon_hvrcolor' ) ); ?>;
}

.mobile-bottom-menu .mobile-menu ul li a span{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_menu_color' ) ); ?>;
}

.mobile-bottom-menu .mobile-menu ul li a span:hover{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_menu_hvr_color' ) ); ?>;
}

.site-offcanvas{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_sidebar_menu_bg' ) ); ?>;
}

.site-offcanvas-header{
	background-color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_sidebar_menu_top_bg' ) ); ?>;
}

.site-offcanvas .site-menu .menu{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_sidebar_menu_color' ) ); ?>;
}

.site-offcanvas .site-menu + .site-menu{
	border-top-color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_sidebar_menu_brdrcolor' ) ); ?>;
}

.site-offcanvas .site-copyright{
	color: <?php echo esc_attr(get_theme_mod( 'machic_mobile_sidebar_menu_copyright_color' ) ); ?>;
}

<?php if(function_exists('dokan')){ ?>

	input[type='submit'].dokan-btn-theme,
	a.dokan-btn-theme,
	.dokan-btn-theme {
		background-color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
		border-color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	input[type='submit'].dokan-btn-theme .badge,
	a.dokan-btn-theme .badge,
	.dokan-btn-theme .badge {
		color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-announcement-uread {
		border: 1px solid <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?> !important;
	}
	.dokan-announcement-uread .dokan-annnouncement-date {
		background-color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?> !important;
	}
	.dokan-announcement-bg-uread {
		background-color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover {
		background: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover {
		background: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active {
		background: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-product-listing .dokan-product-listing-area table.product-listing-table td.post-status label.pending {
		background: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-title-alert,
	.product-edit-container .dokan-product-cat-alert {
		color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-less-price-alert {
		color: <?php echo esc_attr(get_theme_mod( 'machic_main_color' ) ); ?>;
	}
	.dokan-store-wrap {
	    margin-top: 3.5rem;
	}
	.dokan-widget-area ul {
	    list-style: none;
	    padding-left: 0;
	    font-size: .875rem;
	    font-weight: 400;
	}
	.dokan-widget-area ul li a {
	    text-decoration: none;
	    color: var(--color-text-lighter);
	    margin-bottom: .625rem;
	    display: inline-block;
	}
	form.dokan-store-products-ordeby:before, 
	form.dokan-store-products-ordeby:after {
		content: '';
		display: table;
		clear: both;
	}
	.dokan-store-products-filter-area .orderby-search {
	    width: auto;
	}
	input.search-store-products.dokan-btn-theme {
	    border-top-left-radius: 0;
	    border-bottom-left-radius: 0;
	}
	.dokan-pagination-container .dokan-pagination li a {
	    display: -webkit-inline-box;
	    display: -ms-inline-flexbox;
	    display: inline-flex;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    -webkit-box-pack: center;
	    -ms-flex-pack: center;
	    justify-content: center;
	    font-size: .875rem;
	    font-weight: 600;
	    width: 2.25rem;
	    height: 2.25rem;
	    border-radius: 50%;
	    color: currentColor;
	    text-decoration: none;
	    border: none;
	}
	.dokan-pagination-container .dokan-pagination li.active a {
	    color: #fff;
	    background-color: var(--color-secondary) !important;
	}
	.dokan-pagination-container .dokan-pagination li:last-child a, 
	.dokan-pagination-container .dokan-pagination li:first-child a {
	    width: auto;
	}

	.vendor-customer-registration label {
	    margin-right: 10px;
	}

	.woocommerce-mini-cart dl.variation {
	    display: none;
	}

	.product-name dl.variation {
	    display: none;
	}
	
	@media screen and (max-width: 64rem){
		.dokan-store-products-filter-area .orderby-search {
			width: 100% !important;
			margin-top: 10px;
		}
		
		body .dokan-store-products-filter-area {
			margin-bottom: 15px;
		}
	}

<?php } ?>

<?php if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
	if(is_vendor_dashboard()){	
} ?>

.woosc-popup, div#woosc-area {
    display: none;
}

.klb-mobile-search {display: none;}

.mobile-bottom-menu {display: none;}
	
<?php } ?>

</style>
<?php }
add_action('wp_head','machic_custom_styling');

?>