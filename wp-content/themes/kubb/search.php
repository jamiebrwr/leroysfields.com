<?php
	/**
	 * search.php
	 * The searched post loop in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	global $wp_query;
	$total_results = $wp_query->found_posts;
	( $total_results == '1' ) ? $items = __('Item','kubb') : $items = __('Items','kubb'); 
	
	echo ebor_page_title( sprintf( __('Your Search For','kubb') . ': <em>%s</em>, ' . __( 'returned:', 'kubb' ) . ' <em>%s %s</em> ', get_search_query(), $total_results, $items) );
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start');

		/**
		 * Get blog layout
		 */
		get_template_part('loop/loop', get_option('blog_layout','bloggrid') ); 

	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();