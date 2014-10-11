<?php

class AQ_Sharing_Buttons_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Sharing Buttons',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-font"></i>',
			'block_description' => 'Use to add Social<br />Sharing Buttons to page.',
			'resizable' => false
		);
		
		//create the block
		parent::__construct('aq_sharing_buttons_block', $block_options);
	}
	
	function block($instance) {
	
		get_template_part('inc/content','sharing');
		
	}//end block
	
}//end class