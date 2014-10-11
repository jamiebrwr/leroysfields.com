<?php 
	global $post;
	
	$attachments = get_post_meta( $post->ID, '_ebor_gallery_images', true );
	$before = '';
	$after = '';
	
	if(!( is_single() )){
		$before = '<a href="'. get_permalink() .'"><div class="text-overlay"><div class="info">'. get_option('blog_read_more', 'Read More') .'</div></div>';
		$after = '</a>';
	}
	
	if ( $attachments ) : 
	
	foreach( $attachments as $attachment ) :
?>

	<figure class="full">
		<?php 
			echo $before;
			echo wp_get_attachment_image($attachment, 'large'); 
			echo $after;
		?>
	</figure>

<?php 
	endforeach;
	
	endif;