<?php 
	/**
	* single-team.php
	*/
	get_header(); 
	the_post();
	
	/**
	* Get the title image
	*/
	$url = get_post_meta($post->ID, '_ebor_header_image', 1);
	
	/**
	* Call the page title markup, insert title & image URL
	* ebor_page_title() lives in /ebor_framework/theme_functions.php
	*/
	echo ebor_page_title( get_the_title(), $url );
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper','start'); 
?>

	<div class="no-sidebar">
	
		<div class="blog-posts classic-blog">
			<div class="post bordered format-image">
			
				<?php the_title('<h1 class="post-title text-center">', '</h1>'); ?>
				
				<div class="meta text-center">
					<?php echo get_post_meta( $post->ID, '_ebor_the_job_title', true ); ?>
				</div>
				
				<figure class="full">
					<?php the_post_thumbnail('full'); ?>
				</figure>
				
				<div class="post-content">
					<?php 
						the_content();
						wp_link_pages();
						the_tags('<div class="meta tags">',', ','</div>'); 
					?>
				</div>
			
			</div><!-- /.post --> 
		</div><!-- /.blog-posts -->
	
	</div>
    
<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end');

	get_footer();