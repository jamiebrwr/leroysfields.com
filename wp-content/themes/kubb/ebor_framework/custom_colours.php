<?php 
	add_action('wp_head','ebor_custom_colours', 20);
	function ebor_custom_colours(){
		
		$highlight = get_option('highlight_colour','#28b8d8');
		$highlightrgb = ebor_hex2rgb( $highlight );
		$highlight_hover = get_option('highlight_hover_colour','#00a1c4');
		$dark_wrapper = get_option('wrapper_background_dark', '#f2f2f2');
		$header_bg = ebor_hex2rgb( get_option('header_bg', '#151515') );
		$header_dropdown_bg = get_option('header_dropdown_bg', '#414141');
		$footer_bg = get_option('footer_bg', '#232323');
		$sub_footer_bg = get_option('sub_footer_bg', '#1e1e1e');
		$black_wrapper = get_option('wrapper_background_black','#272727');
?>
	
<style type="text/css">
	
	/**
	 * Woo
	 */
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content {
	    background: rgba(<?php echo $highlightrgb; ?>,0.15);
	}
	
	/**
	 * Wrappers
	 */
	.light-wrapper {
		background: #<?php echo get_background_color(); ?>;
	}
	.dark-wrapper {
		background: <?php echo $dark_wrapper; ?>;
	}
	.black-wrapper {
		background: <?php echo $black_wrapper; ?>;
	}
	
	/**
	 * Footer
	 */
	.footer.widget-footer {
		background: <?php echo $footer_bg; ?>;
	}
	
	.sub-footer {
		background: <?php echo $sub_footer_bg; ?>;
	}
	
	.navbar-header {
	    background: rgba(<?php echo $header_bg; ?>,0.75);
	}
	
	.navbar.fixed .navbar-header,
	.navbar .dropdown-menu,
	.navbar.fixed .dropdown-menu {
	    background: rgba(<?php echo $header_bg; ?>,0.9);
	}
	
	.tp-loader.spinner0,
	#fancybox-loading div {
	    border-left: 3px solid rgba(<?php echo $highlightrgb; ?>,.15) !important;
	    border-right: 3px solid rgba(<?php echo $highlightrgb; ?>,.15) !important;
	    border-bottom: 3px solid rgba(<?php echo $highlightrgb; ?>,.15) !important;
	    border-top: 3px solid rgba(<?php echo $highlightrgb; ?>,.8) !important;
	}
	a,
	footer .post-list li .meta h6 a:hover {
	    color: <?php echo $highlight; ?>;
	}
	.navigation a {
	    color: <?php echo $highlight; ?> !important;
	    border: 1px solid <?php echo $highlight; ?> !important;
	}
	.navigation a:hover {
	    background: <?php echo $highlight_hover; ?> !important;
	    border: 1px solid <?php echo $highlight_hover; ?> !important;
	}
	.colored,
	.woocommerce-tabs ul.tabs li.active {
	    color: <?php echo $highlight; ?>
	}
	.color-wrapper,
	.ebor-count,
	.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range,
	.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
	.woocommerce .button,
	.added_to_cart,
	.woocommerce .button,
	span.price,
	.woocommerce div.product p.price  {
	    background: <?php echo $highlight; ?>;
	}
	.color-wrapper:hover {
	    background: <?php echo $highlight_hover; ?>;
	}
	.post-title a:hover {
	    color: <?php echo $highlight; ?>
	}
	ul.circled li:before,
	ul.circled li:before, .post-content ul li:before, aside ul li:before {
	    color: <?php echo $highlight; ?>;
	}
	blockquote {
	    background: <?php echo $highlight; ?>;
	}
	.footer a:hover {
	    color: <?php echo $highlight; ?>
	}
	.nav > li > a:hover {
	    color: <?php echo $highlight; ?>;
	}
	.nav > li.current > a {
	    color: <?php echo $highlight; ?>;
	}
	.navbar .nav .open > a,
	.navbar .nav .open > a:hover,
	.navbar .nav .open > a:focus {
	    color: <?php echo $highlight; ?>;
	}
	.navbar .dropdown-menu > li > a:hover,
	.navbar .dropdown-menu > li > a:focus,
	.navbar .dropdown-submenu:hover > a,
	.navbar .dropdown-submenu:focus > a,
	.navbar .dropdown-menu > .active > a,
	.navbar .dropdown-menu > .active > a:hover,
	.navbar .dropdown-menu > .active > a:focus {
	    color: <?php echo $highlight; ?>;
	}
	.btn,
	.parallax .btn-submit,
	.btn-submit,
	input[type="submit"] {
	    background: <?php echo $highlight; ?>;
	}
	.btn:hover,
	.btn:focus,
	.btn:active,
	.btn.active,
	.parallax .btn-submit:hover,
	input[type="submit"]:focus,
	input[type="submit"]:hover,
	.woocommerce .button:hover,
	.added_to_cart:hover,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
	    background: <?php echo $highlight_hover; ?>;
	}
	.black-wrapper .btn:hover {
	    border: 1px solid <?php echo $highlight; ?>;
	    color: <?php echo $highlight; ?> !important;
	    background: none;
	}
	.meta a:hover,
	.footer-meta a:hover {
	    color: <?php echo $highlight; ?>
	}
	.more {
	    border-bottom: 1px solid <?php echo $highlight; ?>
	}
	.tooltip-inner {
	    background-color: <?php echo $highlight; ?>;
	}
	.tooltip.top .tooltip-arrow,
	.tooltip.top-left .tooltip-arrow,
	.tooltip.top-right .tooltip-arrow {
	    border-top-color: <?php echo $highlight; ?>
	}
	.tooltip.right .tooltip-arrow {
	    border-right-color: <?php echo $highlight; ?>
	}
	.tooltip.left .tooltip-arrow {
	    border-left-color: <?php echo $highlight; ?>
	}
	.tooltip.bottom .tooltip-arrow,
	.tooltip.bottom-left .tooltip-arrow,
	.tooltip.bottom-right .tooltip-arrow {
	    border-bottom-color: <?php echo $highlight; ?>
	}
	figure a .text-overlay {
	    background: <?php echo $highlight; ?>;
	    background: rgba(<?php echo $highlightrgb; ?>,0.90);
	}
	.icon-overlay a .icn-more {
	    background: <?php echo $highlight; ?>;
	    background: rgba(<?php echo $highlightrgb; ?>,0.93);
	}
	.filter ul li a:hover,
	.filter ul li.current a,
	.filter ul li a.active {
	    color: <?php echo $highlight; ?>
	}
	.panel-title > a:hover {
	    color: <?php echo $highlight; ?>
	}
	.progress-list li em {
	    color: <?php echo $highlight; ?>;
	}
	.progress.plain {
	    border: 1px solid <?php echo $highlight; ?>;
	}
	.progress.plain .bar {
	    background: <?php echo $highlight; ?>;
	}
	.tp-caption a {
	    color: <?php echo $highlight; ?>
	}
	.services-1 .icon i.icn {
	    color: <?php echo $highlight; ?>;
	}
	.services-2 i {
	    color: <?php echo $highlight; ?>;
	}
	.tabs-top .tab a:hover,
	.tabs-top .tab.active a {
	    color: <?php echo $highlight; ?>
	}
	.pagination ul > li > a,
	.pagination ul > li > span {
	    background: <?php echo $highlight; ?>;
	}
	.pagination ul > li > a:hover,
	.pagination ul > li > a:focus,
	.pagination ul > .active > a,
	.pagination ul > .active > span {
	    background: <?php echo $highlight_hover; ?>;
	}
	.sidebox a:hover,
	#comments .info h2 a:hover,
	#comments a.reply-link:hover,
	.pricing .plan h4 span {
	    color: <?php echo $highlight; ?>
	}
	@media (max-width: 767px) { 
		.navbar-nav > li > a,
		.navbar-nav > li > a:focus {
		    color: <?php echo $highlight; ?>
		}
		.navbar.fixed .navbar-header,
		.navbar .navbar-header,
		.navbar.fixed .navbar-header {
			background: rgba(<?php echo $header_bg; ?>,0.94);
		}
		.navbar .dropdown-menu,
		.navbar.fixed .dropdown-menu {
			background: none;
		}
	}
	
	<?php echo get_option('custom_css'); ?>
	
</style>
	
<?php }

add_action('login_head','ebor_custom_admin');
function ebor_custom_admin(){
	if( get_option('custom_login_logo') )
		echo '<style type="text/css">
				.login h1 a { 
					background-image: url("'.get_option('custom_login_logo').'"); 
					background-size: auto 80px;
					width: 100%; 
				} 
			</style>';
}