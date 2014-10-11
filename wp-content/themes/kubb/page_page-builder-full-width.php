<?php 
	/*
	Template Name: Page Builder Full Width
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
	
	$url = get_post_meta($post->ID, '_ebor_header_image', 1);
	
	echo ebor_page_title( get_the_title(), $url );
?>

	<div class="row post-content">
	
		<?php the_content(); ?>
	
	</div>

<?php 	
	get_footer();