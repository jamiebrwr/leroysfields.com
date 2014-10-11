<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
	
	if ( $attachments ) : 
?>

	<div class="divide25"></div>
	
	<div class="container">
	
		<ul class="basic-gallery text-center">
		
			<?php 
				foreach( $attachments as $ID ){
					$attachment = get_post($ID);
					
					echo '<li>' . wp_get_attachment_image( $attachment->ID, 'full' ) . '</li>';
				}
			?>
		
		</ul>
	
	</div>

<?php 
	endif;