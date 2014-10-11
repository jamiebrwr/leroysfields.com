<?php

class AQ_Section_Title_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Section Title',
			'size' => 'span12',
			'block_icon' => '<i class="icon-picons-font"></i>',
			'block_description' => 'Use to add a title &<br />subtitle to the page.'
		);
		
		//create the block
		parent::__construct('aq_section_title_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'alt_title' => 0
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
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
			<label for="<?php echo $this->get_field_id('alt_title') ?>">
				Use alternate title style? (Larger)
				<?php echo aq_field_checkbox('alt_title', $block_id, $alt_title) ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		if( $alt_title == 0 ){
			echo '<div class="section-title text-center"><h3>'. htmlspecialchars_decode($title) .'</h3></div>';
		} else {
			echo '<div class="text-center"><p class="intro">'. htmlspecialchars_decode($title) .'</p></div>';
		}

		if( $text )
			echo '<div class="text-center">'. wpautop(do_shortcode(htmlspecialchars_decode($text))) .'</div><div class="divide50"></div>';
				
	}//end block
	
}//end class