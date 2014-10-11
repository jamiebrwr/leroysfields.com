<?php

class AQ_Portfolio_Preview_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Portfolio Preview',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Preview some Portfolio items<br />straight to the page.'
		);
		parent::__construct('aq_portfolio_preview_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'pppage' => '999',
			'filter' => 'all',
			'url' => '',
			'button_text' => ''
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
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title <code>Optional</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content <code>Optional</code>
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', true) ?>
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
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('url') ?>">
				Button URL <code>Optional</code>
				<?php echo aq_field_input('url', $block_id, $url, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('button_text') ?>">
				Button Text <code>Optional</code>
				<?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
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
	?>
	
		<div class="black-wrapper inner">
			
			<div class="container bm20">
				<?php
					if( $title )
						echo '<div class="section-title text-center bm15"><h3>'. htmlspecialchars_decode($title) .'</h3></div>';
			
					if( $text )
						echo '<div class="text-center">'. wpautop(do_shortcode(htmlspecialchars_decode($text))) .'</div>';
				?>
			</div>
	
			<div class="grid-portfolio full-portfolio">
				<ul class="items">
				
					<?php 
						if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
							
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', 'portfolio-full' );
						
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
			
			<?php if( $url ) : ?>
				<div class="divide30"></div>
				
				<div class="text-center"> 
					<a href="<?php echo esc_url( $url ); ?>" class="btn"><?php echo htmlspecialchars_decode($button_text); ?></a> 
				</div>
			<?php endif; ?>
			
		</div>
	
	<?php	
	}//end block
	
}//end class