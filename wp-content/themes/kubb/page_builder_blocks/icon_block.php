<?php

class AQ_Icon_Column_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Icon & Number Block',
			'size' => 'span3',
			'block_description' => 'Use to add Text<br />with an icon top.'
		);
		
		//create the block
		parent::__construct('aq_icon_column_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'text' => '7518',
			'icon' => 'budicon-video-2'
		);
		
		$icon_options = ebor_picons();
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);

		$selected = $icon;
	?>
		
		<p class="tab-desc description">
			<label for="<?php echo 'aq_blocks['.$block_id.'][icon]'; ?>">
				Icon (Required)
				<div class="cf">
					<div class="icon-selector-render"></div>
					<select class="icon-selector" id="<?php echo $block_id .'_icon'; ?>" name="<?php echo 'aq_blocks['.$block_id.'][icon]'; ?>">
						<?php
							foreach($icon_options as $key=>$value) {
								echo '<option value="'.$key.'" '.selected( $selected, $key, false ).' data-icon="'.$key.'">'.htmlspecialchars($value).'</option>';
							}
						?>
					</select>
				</div>
			</label>
		<p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Number
				<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Fact
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<div class="text-center services-2 facts">
			<div class="col-wrapper">
				
				<?php 
					if(!( $icon == 'none' ))
						echo '<div class="icon-border bm15"> <i class="'. $icon .'"></i> </div>';
						
					if($text)
						echo '<h4>'. htmlspecialchars_decode($text) .'</h4>';
						
					if($title)
						echo wpautop(do_shortcode(htmlspecialchars_decode($title)));
				?>
			
			</div>
		</div>
	
	<?php		
	}//end block
	
}//end class