<?php

class AQ_Instagram_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Instagram Feed',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-font"></i>',
			'block_description' => 'Use to add Text,<br />HTML or shortcodes.'
		);
		
		//create the block
		parent::__construct('aq_instagram_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'username' => 'urbanshots',
			'pppage' => '15',
			'id' => '1215763826',
			'token' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<code>IMPORTANT NOTE:</code> This is the Instagram block, it will grab your latest Instagram images. For this to work, the block requires you enter a numeric ID in the correct field, and also an access token in the correct field. Please grab your numeric Instagram ID & Access Token from here: <a href="https://instagram.com/oauth/authorize/?client_id=467ede5a6b9b48ae8e03f4e2582aeeb3&redirect_uri=http://instafeedjs.com&response_type=token" target="_blank">Get User ID & Token</a>
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
			<label for="<?php echo $this->get_field_id('token') ?>">
				Access Token <code>REQUIRED</code>
				<?php echo aq_field_input('token', $block_id, $token, $size = 'full') ?>
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
		
		<div class="black-wrapper">
			<div class="inner">
			
				<?php if( $title ) : ?>
					<div class="section-title text-center">
						<h3><?php echo htmlspecialchars_decode($title); ?></h3>
					</div>
				<?php endif; ?>
				
				<div class="swiper-wrapper"> 
				
					<a class="arrow-left" href="#"></a> 
					<a class="arrow-right" href="#"></a>
					
					<div class="swiper-container instagram">
						<div id="instafeed" class="swiper"> </div>
					</div>
				
				</div>
				
				<div class="divide40"></div>
				
				<div class="text-center"> 
					<a href="http://instagram.com/<?php echo $username; ?>" target="_blank" class="btn"><i class="icon-s-instagram"></i><?php _e('Instagram Page','kubb'); ?></a> 
				</div>
			
			</div><!-- /.inner --> 
		</div><!-- /.black-wrapper -->
		
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var instagramFeed = new Instafeed({
					get: 'user',
					userId: <?php echo $id; ?>,
					accessToken: '<?php echo $token; ?>',
					limit: <?php echo $pppage; ?>,
					resolution: 'low_resolution',
					template: '<div class="item"><figure><img src="{{image}}" /><a href="{{link}}" class="ins-link" target="_blank"><i class="icon-link"></i></a></figure></div>',
					after: function () {    
						jQuery('.swiper-container.instagram').each(function(){
							jQuery(this).swiper({
								grabCursor: true,
								slidesPerView: 'auto',
								wrapperClass: 'swiper',
								slideClass: 'item',
								offsetPxBefore: 15,
								offsetPxAfter: 15
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
				
				jQuery('#instafeed').each(function() {
					instagramFeed.run();
				});
			});
		</script>
		
	<?php
	}//end block
	
}//end class