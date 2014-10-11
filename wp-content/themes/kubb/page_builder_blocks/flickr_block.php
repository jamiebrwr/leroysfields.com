<?php

class AQ_Flickr_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Flickr Feed',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-font"></i>',
			'block_description' => 'Use to add Text,<br />HTML or shortcodes.'
		);
		
		//create the block
		parent::__construct('aq_flickr_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'username' => 'urbanshots',
			'id' => '51789731@N07',
			'pppage' => '15'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<code>IMPORTANT NOTE:</code> This is the Flickr block, it will grab your latest Flickr images. For this to work, the block requires you enter a numeric ID in the correct field. Please grab your numeric Flickr ID from here: <a href="http://idgettr.com/" target="_blank">http://idgettr.com/</a>
		</p>
		
		<hr />
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('username') ?>">
				Username <code>REQUIRED</code>
				<?php echo aq_field_input('username', $block_id, $username, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('id') ?>">
				Numeric ID <code>REQUIRED</code>
				<?php echo aq_field_input('id', $block_id, $id, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Amount of images to grab <code>REQUIRED</code>
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
			
				<?php if( $title ) : ?>
					<div class="section-title text-center">
						<h3><?php echo htmlspecialchars_decode($title); ?></h3>
					</div>
				<?php endif; ?>
				
				<div class="swiper-wrapper flickr-wrapper"> 
				
					<a class="arrow-left" href="#"></a> 
					<a class="arrow-right" href="#"></a>
					
					<div class="swiper-container flickr">
						<div class="swiper flickr-feed"> </div>
					</div>
				
				</div>
				
				<div class="divide40"></div>
				
				<div class="text-center"> 
					<a href="https://www.flickr.com/photos/<?php echo $username; ?>/" target="_blank" class="btn"><i class="icon-s-flickr"></i><?php _e('Flickr Page','kubb'); ?></a> 
				</div>
		
		<script type="text/javascript">
			/*-----------------------------------------------------------------------------------*/
			/*	FLICKR
			/*-----------------------------------------------------------------------------------*/	
			jQuery(document).ready(function($){
				jQuery('.flickr-feed').dcFlickr({
					limit: <?php echo $pppage; ?>, 
					q: { 
						id: '<?php echo $id; ?>',
						lang: 'en-us',
						format: 'json',
						jsoncallback: '?'
					},
					onLoad: function(){
						jQuery('.swiper-container.flickr').each(function(){
							
							jQuery(this).swiper({
								grabCursor: true,
								slidesPerView: 'auto',
								wrapperClass: 'swiper',
								slideClass: 'item'
							});
							
							var $swipers = jQuery(this);
							
							$swipers.siblings('.arrow-left').click(function(e){
								e.preventDefault();
								$swipers.data('swiper').swipePrev();
							});
							
							$swipers.siblings('.arrow-right').click(function(e){
								e.preventDefault();
								$swipers.data('swiper').swipeNext();
							});
						
						});
					}
				});
			});	
		</script>
		
	<?php
	}//end block
	
}//end class