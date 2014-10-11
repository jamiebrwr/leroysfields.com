<?php

class AQ_Portfolio_Post_Carousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Post Images Carousel',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a carousel of<br />portfolio post images.'
		);
		parent::__construct('aq_portfolio_post_carousel_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '999',
			'filter' => '',
			'background' => 'black-wrapper'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => -1
		); 
			
		$filter_options = get_posts( $args );
		
		$background_options = array(
			'light-wrapper' => 'Light Background',
			'dark-wrapper' => 'Dark Background',
			'black-wrapper' => 'Black Background'
		);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Amount of Images to load? <code>999 for all</code>
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Load gallery images from which portfolio post?
				<?php echo ebor_portfolio_post_select('filter', $block_id, $filter_options, $filter) ?>
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
		
		$i = 0;
		$term = get_post( $filter );
		$attachments = get_post_meta( $term->ID, '_ebor_portfolio_gallery_list', true );
	?>
		
		<section  id="<?php echo $term->post_name; ?>" class="<?php echo $background; ?> inner ebor-portfolio-carousel" data-title="<?php echo $term->post_title; ?>">
			<div class="swiper-wrapper"> 
			
			<a class="arrow-left" href="#"></a> 
			<a class="arrow-right" href="#"></a>
			
			<div class="swiper-container gallery">
				<div class="swiper">

					<div class="item the-category-details"> 
					
						<?php echo wp_get_attachment_image($attachments[0],'portfolio-carousel-leader'); ?>
						
						<div class="details">
							<div class="content">
								<div class="wrap">
									<div class="text">
									
										<?php echo '<h2>' . $term->post_title . '</h2>'; ?>
										
										<div class="info">
											<?php echo wpautop(do_shortcode(htmlspecialchars_decode($term->post_content))); ?>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					
					</div>
					
					<?php 
						foreach( $attachments as $ID ) :
						$i++;
						if( $i > $pppage )
							break;
							
						$attachment = get_post($ID); 
					?>
					
						<div class="item"> 
							<?php 
								echo wp_get_attachment_image($attachment->ID,'portfolio-carousel'); 
								
								if( $attachment->post_excerpt )
									echo '<span class="caption">'. $attachment->post_excerpt .'</span>';
							?>
						</div>
							
					<?php endforeach; ?>
				
				</div>
			</div>
			
			</div>
		</section>
			
	<?php	
	}//end block
	
}//end class