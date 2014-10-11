<?php

class AQ_Portfolio_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Portfolio',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add your portfolio items<br />straight to the page.'
		);
		parent::__construct('aq_portfolio_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'wpautop' => '',
			'type' => 'full-portfolio',
			'pppage' => '999',
			'filter' => 'all'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'portfolio-category'
		); 
			
		$filter_options = get_categories( $args );
		
		$portfolio_types = array(
			'portfolio-full' => 'Fullscreen Grid',
			'portfolio-fix' => 'Masonry Grid',
			'portfolio-full-lightbox' => 'Fullscreen Grid Lightbox',
			'portfolio-fix-lightbox' => 'Masonry Grid Lightbox',
		);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('type') ?>">
				Portfolio Style
				<?php echo aq_field_select('type', $block_id, $portfolio_types, $type) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Load how many items? 999 for all. <code>Note: The Portfolio is not Paged</code>
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show a specific portfolio category?
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$query_args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'portfolio-category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$portfolio_query = new WP_Query( $query_args );

		if( $type == 'portfolio-fix' || $type == 'portfolio-fix-lightbox' ) :
	?>
		
			<div class="grid-portfolio fix-portfolio">
			
				<?php get_template_part('inc/content','filters'); ?>
				
				<div class="container inner">
				  <ul class="items">
				  
				    <?php 
				    	if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
				    		
				    		/**
				    		 * Get blog posts by blog layout.
				    		 */
				    		get_template_part('loop/content', $type );
				    	
				    	endwhile;	
				    	else : 
				    		
				    		/**
				    		 * Display no posts message if none are found.
				    		 */
				    		get_template_part('loop/content','none');
				    		
				    	endif;
				    	wp_reset_query();
				    ?>
				
				  </ul><!-- /.items --> 
				</div>
			
			</div><!-- /.portfolio -->
			
	<?php
		elseif( $type == 'portfolio-full' || $type == 'portfolio-full-lightbox' ) :
	?>
	
			<div class="grid-portfolio full-portfolio">
			
				<?php get_template_part('inc/content','filters'); ?>
				
				<ul class="items">
				
					<?php 
						if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
							
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', $type );
						
						endwhile;	
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
						wp_reset_query();
					?>
				
				</ul><!-- /.items --> 
			
			</div><!-- /.portfolio -->
			
	<?php	
		endif;
		
	}//end block
	
}//end class