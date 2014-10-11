<?php
	/**
	 * 404.php
	 * Error Page in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	echo ebor_page_title( 'Uh Oh, 404' );
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="whoopsie-daisy-wrapper">
		<h3><a href="<?php echo home_url(); ?>"><?php _e('&larr; Head Home','kubb'); ?></a></h3>
	</div>

<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();