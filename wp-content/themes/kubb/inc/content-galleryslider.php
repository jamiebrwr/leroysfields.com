<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
	
	if ( $attachments ) : 
?>
	
	<div class="fullscreenbanner-container revolution">
		<div class="fullscreenbanner">
			<ul>
			
				<?php 
					foreach( $attachments as $ID ){
						$attachment = get_post($ID);
						
						echo '<li data-transition="fade">' . wp_get_attachment_image( $attachment->ID, 'full' ) . '</li>';
					}
				 ?>

			</ul>
			<div class="tp-bannertimer tp-bottom"></div>
		</div><!-- /.fullscreenbanner --> 
	</div><!-- /.fullscreenbanner-container -->

<?php 
	endif;