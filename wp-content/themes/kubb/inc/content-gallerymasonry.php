<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
	
	if ( $attachments ) : 
?>

	<div class="divide25"></div>
	
	<div class="container">
	
		<div class="grid-portfolio fix-portfolio">
			<ul class="items">
				
				<?php 
					foreach( $attachments as $ID ):
						$attachment = get_post($ID);
				?>
						
					<li class="item thumb conceptual">
					
						<figure>
							<a href="<?php echo wp_get_attachment_url( $attachment->ID, 'full' ); ?>" class="fancybox-media" data-rel="portfolio" data-title-id="title-<?php echo $attachment->ID; ?>">
								<div class="text-overlay">
									<div class="info"><?php echo $attachment->post_title; ?></div>
								</div>
								<?php echo wp_get_attachment_image( $attachment->ID, 'portfolio-carousel' ); ?>
							</a>
						</figure>
						
						<div id="title-<?php echo $attachment->ID ?>" class="info hidden">
							<h2><?php echo $attachment->post_title; ?></h2>
							<div class="fancybody"><?php echo $attachment->post_excerpt; ?></div>
						</div>
			
					</li>
				
				<?php
					endforeach;
				?>
			
			</ul><!-- /.items --> 
		</div><!-- /.portfolio --> 
	
	</div>

<?php 
	endif;