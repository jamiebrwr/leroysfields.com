<div class="grid-portfolio full-portfolio">

	<?php 
		if(!( is_tax() ))
			get_template_part('inc/content','filters'); 
	?>
	
	<ul class="items">
	
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				
				/**
				 * Get blog posts by blog layout.
				 */
				get_template_part('loop/content', 'portfolio-full');
			
			endwhile;	
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part('loop/content','none');
				
			endif;
		?>
	
	</ul><!-- /.items --> 

</div><!-- /.portfolio -->