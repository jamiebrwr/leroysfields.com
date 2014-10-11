<?php
	$format = get_post_format(); ;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('bordered'); ?>>

  	<?php 
  		the_title('<h2 class="post-title entry-title text-center"><a href="'. get_permalink() .'">', '</a></h2>');
  		get_template_part('inc/content','meta');
  		get_template_part('postformats/format', $format);
  	?>
  	
  	<div class="post-content">
  	
	  	<?php
	  		if( $format == 'chat' || $format == 'quote' ){
	  			the_content();
	  		} else {
	  			echo wpautop( wp_trim_words( get_the_content(), 40) );
	  		}
	  		
	  		get_template_part('inc/content','metafooter');
	  	?>
  	
	</div>

</div>