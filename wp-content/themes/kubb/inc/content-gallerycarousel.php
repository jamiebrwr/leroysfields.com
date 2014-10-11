<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
	
	if ( $attachments ) : 
?>

	<div class="divide25"></div>
			
	<div class="swiper-wrapper"> 
	
		<a class="arrow-left" href="#"></a> 
		<a class="arrow-right" href="#"></a>
		
		<div class="swiper-container gallery">
			<div class="swiper">
				
				<?php 
					foreach( $attachments as $ID ){
						$attachment = get_post($ID);
						$image = wp_get_attachment_image_src( $attachment->ID, 'full' );
						
						echo '<div class="item">' . wp_get_attachment_image( $attachment->ID, 'full' );
						
						if( $attachment->post_excerpt )
							echo '<span class="caption">'. $attachment->post_excerpt .'</span>';
							
						echo '<a href="'. $image[0] .'" class="ins-link fancybox-media" rel="portfolio"><i class="icon-search"></i></a></div>';
					}
				 ?>
	
			</div>
		</div>
		
	</div>

<?php 
	endif;