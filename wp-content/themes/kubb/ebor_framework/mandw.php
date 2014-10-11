<?php

//REGISTER CUSTOM MENUS
function register_ebor_menus() {
  register_nav_menus( 
  	array(
  		'primary' => __( 'Standard Navigation', 'kubb' ),
  	) 
  );
}
add_action( 'init', 'register_ebor_menus' );

//REGISTER SIDEBARS
function ebor_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Blog Sidebar', 'kubb' ),
			'description' => __( 'Widgets to be displayed in the blog sidebar.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="section-title"><h3 class="widget-title">',
			'after_title' => '</h3></div>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page With Sidebar, Sidebar', 'kubb' ),
			'description' => __( 'Widgets to be displayed in the page with sidebar, sidebar.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="section-title"><h3 class="widget-title">',
			'after_title' => '</h3></div>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'shop',
			'name' => __( 'Shop Sidebar', 'kubb' ),
			'description' => __( 'Widgets to be displayed in the shop sidebar.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="section-title"><h3 class="widget-title">',
			'after_title' => '</h3></div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'footer1',
			'name' => __( 'Footer Column 1', 'kubb' ),
			'description' => __( 'If this is set, your footer will be 1 column', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer2',
			'name' => __( 'Footer Column 2', 'kubb' ),
			'description' => __( 'If this & column 1 are set, your footer will be 2 columns.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	
	register_sidebar(
		array(
			'id' => 'footer3',
			'name' => __( 'Footer Column 3', 'kubb' ),
			'description' => __( 'If this & column 1 & column 2 are set, your footer will be 3 columns.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer4',
			'name' => __( 'Footer Column 4', 'kubb' ),
			'description' => __( 'If this & column 1 & column 2 & column 3 are set, your footer will be 4 columns.', 'kubb' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
}
add_action( 'widgets_init', 'ebor_register_sidebars' );