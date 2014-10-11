<?php 
	/*
	Template Name: Default Template No Title
	*/
	get_header(); 
	the_post();
	
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