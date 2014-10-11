<?php 
	get_header(); 
	
	echo ebor_page_title( get_queried_object()->name );
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper', 'start'); 
?>
	
	<div class="row">
	  
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			
				get_template_part('loop/content','team');
				echo '<div class="divide40"></div>';
			
			endwhile;
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part('loop/content','none');
				
			endif;
		?>
	  
	</div>
	
<?php	
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper', 'end');
	
	get_footer();