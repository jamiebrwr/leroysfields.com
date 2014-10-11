<?php 
	get_header(); 
	
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
	
	echo ebor_page_title( 'Posts by: ' . $author->display_name );
	
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