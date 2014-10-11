<?php
	$format = get_post_format();
	
	/**
	* Get Wrapper Start - Uses get_template_part for simple child themeing.
	*/
	get_template_part('inc/wrapper','start'); 
?>

	<div class="no-sidebar">
	
		<div class="blog-posts classic-blog">
			<div class="post bordered format-image">
			
				<?php
					if( 'post' == get_post_type() ){
						echo '<div class="navigation text-center">';
						previous_post_link('%link', "<i class='icon-left-open'></i>" );
						next_post_link('%link', "<i class='icon-right-open'></i>" ); 
						echo '</div><div class="clearfix"></div>';
					}
					
					the_title('<h1 class="post-title text-center">', '</h1>');
					get_template_part('inc/content', 'meta');
					get_template_part('postformats/format', $format); 
					
					if( get_option('blog_social','1') == 1 )
						get_template_part('inc/content', 'sharing'); 
				?>
				
				<div class="post-content">
					<?php 
						the_content();
						wp_link_pages();
						the_tags('<div class="meta tags">',', ','</div>'); 
					?>
				</div>
			
			</div><!-- /.post --> 
		</div><!-- /.blog-posts -->
		
		<?php
			if( get_option('blog_author','1') == 1 )
				get_template_part('inc/content','author');
			
			if( comments_open() )
				comments_template();
		?>
	
	</div>
    
<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end');