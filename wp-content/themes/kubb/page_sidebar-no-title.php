<?php 
	/*
	Template Name: Default Template No Title With Sidebar
	*/
	
	get_header(); 
	the_post();
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper','start');
?>

	<div class="row">
	
		<div class="col-sm-8">
			<?php 
				the_content();
				wp_link_pages();
			?>
		</div>
		
		<?php get_sidebar('page'); ?>
	
	</div>
	
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();