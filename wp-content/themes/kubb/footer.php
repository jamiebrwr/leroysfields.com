<footer class="footer black-wrapper widget-footer">

	<?php if( is_active_sidebar('footer1') ) : ?>
		<div class="container inner">
			<div class="row">
			
				<?php 
					/**
					 * Get footer widgets depending on active columns
					 */
					get_template_part('inc/content','footerwidgets'); 
				?>
			
			</div><!-- /.row --> 
		</div><!-- .container -->
	<?php endif; ?>
	
	<div class="sub-footer">
	    <div class="container">
	    
			<div class="pull-left">
				<?php echo wpautop(htmlspecialchars_decode(get_option('copyright', 'Configure this message in "appearance" => "customize"'))); ?>
			</div>
			
			<?php
				if( get_option("footer_social_link_1") )
					get_template_part('loop/loop','socialfooter');
			?>
	    
	    </div>
	</div>

</footer><!-- /footer --> 
  
</div><!-- /.body-wrapper --> 

<?php wp_footer(); ?>
</body>
</html>