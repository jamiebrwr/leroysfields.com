<div class="meta text-center">
	<span class="date"><?php the_time( get_option('date_format') ); ?></span>
	<span class="categories"><?php the_category(', '); ?></span> 
	<?php if( is_single() ) : ?>
		<span class="like">
			<?php 
				if( function_exists('zilla_likes') )
					zilla_likes(); 
			?>
		</span>
	<?php endif; ?>
</div>