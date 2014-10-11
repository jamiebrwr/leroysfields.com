<?php 
	/*
	Template Name: Page Builder Full Width No Title
	*/
	
	/**
	 * page_builder.php
	 * The page builder template for Kubb
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();
?>

	<div class="row post-content">
	
		<?php the_content(); ?>
	
	</div>

<?php 	
	get_footer();