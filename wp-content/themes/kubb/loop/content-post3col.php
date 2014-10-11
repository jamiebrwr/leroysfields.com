<div class="col-sm-4 col">
	<div class="post bordered">
	
		<?php 
			the_title('<h3 class="post-title text-center"><a href="'. get_permalink() .'">', '</a></h3>'); 
			get_template_part('inc/content','meta');
		?>
	
		<figure class="full">
			<a href="<?php the_permalink(); ?>">
			  <div class="text-overlay">
			    <div class="info">
			    	<?php echo get_option('blog_read_more', 'Read More'); ?>
			    </div>
			  </div>
			  <?php the_post_thumbnail('index'); ?>
			</a>
		</figure>
	
		<div class="post-content">
		
			<?php 
				the_excerpt(); 
				get_template_part('inc/content','metafooter');
			?>
		
		</div>
	
	</div><!-- /.post --> 
</div><!-- /col -->