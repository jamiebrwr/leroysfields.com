<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_gallery_images', true );
	
	if ( $attachments ) : 
?>

<div class="post-gallery-wrapper">
	<ul class="post-gallery">
	
		<?php foreach( $attachments as $attachment ) : ?>
		
		<li>
			<figure>
				<a href="<?php echo wp_get_attachment_url($attachment, 'full'); ?>" class="fancybox-media" data-rel="gallery">
					<div class="text-overlay">
						<div class="info"><?php echo get_option('blog_view_larger','View Larger'); ?></div>
					</div>
					<?php echo wp_get_attachment_image($attachment,'medium'); ?>
				</a>
			</figure>
		</li>
		
		<?php endforeach; ?>
	
	</ul>
</div>

<?php 
	endif;