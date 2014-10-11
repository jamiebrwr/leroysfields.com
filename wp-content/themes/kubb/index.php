<?php 
	get_header(); 
	
	echo ebor_page_title( get_option('blog_title','Our Journal'), get_option('blog_header_image') );
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper', 'start'); 
	
		/**
		 * Get blog layout
		 */
		get_template_part('loop/loop', get_option('blog_layout','bloggrid') ); 
	
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper', 'end'); 
	
	get_footer();