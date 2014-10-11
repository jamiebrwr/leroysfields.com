<?php 
	get_header(); 

	echo ebor_page_title( get_queried_object()->name );
	
	get_template_part('loop/loop', get_option('portfolio_layout','portfolio-full'));

	get_footer();