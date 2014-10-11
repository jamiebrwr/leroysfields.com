<?php

class AQ_Polaroid_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Polaroid',
			'size' => 'span4',
			'block_icon' => '<i class="fa fa-camera"></i>',
			'block_description' => 'Use to add an Image<br />block to the page.'
		);
		parent::__construct('aq_polaroid_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'image' => '',
			'text' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', true) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				Upload Image
				<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Link Image? Enter URL here.
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
		
		<div class="bordered text-center">
		
			<?php
				if( $image ){
					
					if( $link )
						echo '<a href="'. esc_url($link) .'">';
						
					echo '<figure><img src="'. esc_url($image) .'" alt="'. $title .'" /></figure>';
						
					if( $link )
						echo '</a>';
				}
				
				if($title)
					echo '<h3>' . $title . '</h3>';
					
				echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
			?>
		
		</div>
		
	<?php
	}//end block
	
}//end class