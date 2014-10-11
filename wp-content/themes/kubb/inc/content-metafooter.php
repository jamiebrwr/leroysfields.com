<div class="footer-meta"> 
	<a href="<?php the_permalink(); ?>" class="more pull-left">
		<?php echo get_option('blog_continue', 'Continue Reading'); ?>
	</a> 
	<span class="like pull-right">
		<?php 
			if( function_exists('zilla_likes') )
				zilla_likes(); 
		?>
	</span> 
</div>