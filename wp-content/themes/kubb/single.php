<?php 

/**
 * single.php
 */
get_header(); 
the_post();
( is_active_sidebar('primary') && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' ) ? $sidebar = 'sidebar' : $sidebar = '';

/**
 * Get the title image
 */
$url = get_post_meta($post->ID, '_ebor_header_image', 1);

/**
 * Call the page title markup, insert title & image URL
 * ebor_page_title() lives in /ebor_framework/theme_functions.php
 */
echo ebor_page_title( get_the_title(), $url );

get_template_part('loop/content', 'blog-single' . $sidebar); 

get_footer();