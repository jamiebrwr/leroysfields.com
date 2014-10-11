<?php

class AQ_Portfolio_Carousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Portfolio Carousel',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a carousel of<br />portfolio posts to the page.'
		);
		parent::__construct('aq_portfolio_carousel_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'background' => 'black-wrapper'
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
		
		$background_options = array(
			'light-wrapper' => 'Light Background',
			'dark-wrapper' => 'Dark Background',
			'black-wrapper' => 'Black Background'
		);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Post amount to show
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show a specific portfolio category?
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('background') ?>">
				Background Style
				<?php echo aq_field_select('background', $block_id, $background_options, $background) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		/**
		 * Build the main query
		 */
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
		
		/**
		 * Quick cheeky second query to grab the first image in the portfolio category.
		 */
		$query_args['posts_per_page'] = 1;
		$thumb_query = new WP_Query( $query_args );
		
		$term = get_term( $filter, 'portfolio-category');
	?>
		
		<section  id="<?php echo $term->slug; ?>" class="<?php echo $background; ?> inner ebor-portfolio-carousel" data-title="<?php echo $term->name; ?>">
			<div class="swiper-wrapper"> 
			
			<a class="arrow-left" href="#"></a> 
			<a class="arrow-right" href="#"></a>
			
			<div class="swiper-container gallery">
				<div class="swiper">
				
					<?php 
						if(!( $filter == 'all' )) : 
					?>
						<div class="item the-category-details"> 
						
							<?php 
								if ( $thumb_query->have_posts() ){ 
									$thumb_query->the_post();
									the_post_thumbnail('portfolio-carousel-leader');
								}
								wp_reset_query();
							?>
							
							<div class="details">
								<div class="content">
									<div class="wrap">
										<div class="text">
										
											<?php echo '<h2>' . $term->name . '</h2>'; ?>
											
											<div class="info">
												<?php echo wpautop(do_shortcode(htmlspecialchars_decode($term->description))); ?>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						
						</div>
					<?php endif; ?>
					
					<?php 
						if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
					?>
					
							<div class="item"> 
								<?php the_post_thumbnail('portfolio-carousel'); ?>
								<a href="<?php the_permalink(); ?>" class="ins-link"><i class="icon-link"></i></a>
							</div>
							
					<?php
						endwhile;
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
						wp_reset_query();
					?>
				
				</div>
			</div>
			
			</div>
		</section>
			
	<?php	
	}//end block
	
}//end class