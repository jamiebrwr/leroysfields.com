<?php 
	get_header(); 
	the_post();
	
	echo '<div class="woocommerce-offset"></div>';
	
	$url = get_post_meta($post->ID, '_ebor_header_image', 1);
	echo ebor_page_title( get_the_title(), $url );
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper','start'); 
	
		the_content();
		wp_link_pages();
	
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();