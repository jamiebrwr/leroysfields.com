<?php 
	get_header(); 
	the_post();
	
	$layout = get_post_meta($post->ID, '_ebor_layout_checkbox', 1);
	$colour = get_post_meta($post->ID, '_ebor_post_colour', 1);
	
	/**
	 * If the layout for this post isn't the fullscreen slider:
	 * Grab page title, content above gallery images
	 */
	if(!( $layout == 'slider' )):
	
	/**
	 * Get the title image
	 */
	$url = get_post_meta($post->ID, '_ebor_header_image', 1);
	
	/**
	 * Call the page title markup, insert title & image URL
	 * ebor_page_title() lives in /ebor_framework/theme_functions.php
	 */
	echo ebor_page_title( get_the_title(), $url );
?>
	
	<div  class="filter dark-wrapper container">
		<?php
			echo '<div class="navigation">';
			next_post_link('%link', "<i class='icon-left-open'></i>" ); 
			previous_post_link('%link', "<i class='icon-right-open'></i>" );
			echo '</div><div class="clearfix"></div>';
		?>
	</div>
	
	<div class="<?php echo $colour; ?> inner">
	
		<div class="container">
			<?php
				the_content();
				wp_link_pages();
			?>
		</div>
		
		<?php get_template_part('inc/content','gallery' . $layout ); ?>
	
	</div>

<?php 
	else :
	
	/**
	 * Else if this post layout is set to the fullscreen slider.
	 */
	get_template_part('inc/content','gallery' . $layout );
?>
	
	<div class="<?php echo $colour; ?> inner">
	
		<div class="container">
			<?php
				the_content();
				wp_link_pages();
				
				echo '<div class="navigation">';
				previous_post_link('%link', "<i class='icon-left-open'></i>" );
				next_post_link('%link', "<i class='icon-right-open'></i>" ); 
				echo '</div><div class="clearfix"></div>';
			?>
		</div>
	
	</div>
	
<?php
	endif;
	
	get_footer();