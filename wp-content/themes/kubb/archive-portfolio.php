<?php 
	get_header(); 
?>
	
	<div class="offset"></div>
	
<?php	
	get_template_part('loop/loop', get_option('portfolio_layout','portfolio-full'));

	get_footer();