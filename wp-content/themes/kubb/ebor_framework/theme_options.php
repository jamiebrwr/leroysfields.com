<?php 

add_action('customize_register', 'ebor_theme_customize');
function ebor_theme_customize($wp_customize) {

/* Remove the WordPress background image control. */
$wp_customize->remove_control( 'background_image' );

require_once('theme_options_classes.php');

/* Add our custom background image control. */
$wp_customize->add_control( new JT_Customize_Control_Background_Image( $wp_customize ) );

$social_options = array(
    'pinterest'=> 'Pinterest',
    'rss'=> 'RSS',
    'facebook'=> 'Facebook',
    'twitter'=> 'Twitter',
    'flickr'=> 'Flickr',
    'dribbble'=> 'Dribbble',
    'behance'=> 'Behance',
    'linkedin'=> 'LinkedIn',
    'vimeo'=> 'Vimeo',
    'youtube'=> 'Youtube',
    'skype'=> 'Skype',
    'tumblr'=> 'Tumblr',
    'delicious'=> 'Delicious',
    '500px'=> '500px',
    'grooveshark'=> 'Grooveshark',
    'forrst'=> 'Forrst',
    'digg'=> 'Digg',
    'blogger'=> 'Blogger',
    'klout'=> 'Klout',
    'dropbox'=> 'Dropbox',
    'github'=> 'Github',
    'songkick'=> 'Singkick',
    'posterous'=> 'Posterous',
    'appnet'=> 'Appnet',
    'gplus'=> 'Google Plus',
    'stumbleupon'=> 'Stumbleupon',
    'lastfm'=> 'LastFM',
    'spotify'=> 'Spotify',
    'instagram'=> 'Instagram',
    'evernote'=> 'Evernote',
    'paypal'=> 'Paypal',
    'picasa'=> 'Picasa',
    'soundcloud'=> 'Soundcloud',
);

$icon_options = ebor_picons();

/**
 * Ebor Framework
 * Login Section
 * @since version 1.0
 * @author TommusRhodus
 */

/**
 * Create Header Section
 */
$wp_customize->add_section( 'custom_login_section', array(
	'title'          => 'wp-login.php Logo',
	'priority'       => 29,
) );

/**
 * Custom Logo Default
 */
$wp_customize->add_setting('custom_login_logo', array(
    'default'  => '',
    'type' => 'option'

));

/**
 * Custom Logo Control
 */
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_login_logo', array(
    'label'    => __('Custom Login Logo Upload', 'ebor_starter'),
    'section'  => 'custom_login_section',
    'priority'       => 1
)));

/**
 * END LOGIN LOGO SECTION
 */
 

/**
 * Create site settings section
 * @author TommusRhodus
 * @package loom
 * @since 1.0.0
 */
$wp_customize->add_section( 'demo_data', array(
	'title'          => 'Import Demo Data',
	'priority'       => 1,
) );

/**
 * Demo Data Defaults
 */
$wp_customize->add_setting( 'import', array(
    'default'        => ''
) );

/**
 * Demo Data Control
 */
$wp_customize->add_control( new Demo_Import_control( $wp_customize, 'import', array(
    'label'   => __('Import Demo Data', 'kubb'),
    'section' => 'demo_data',
    'settings'   => 'import',
    'priority' => 1,
) ) );

/**
 * END DEMO DATA SECTION
 */


///////////////////////////////////////
//     BLOG SECTION                 //
/////////////////////////////////////
	
//CREATE CUSTOM STYLING SUBSECTION
$wp_customize->add_section( 'blog_settings', array(
	'title'          => 'Blog Settings',
	'priority'       => 35,
) );

$wp_customize->add_setting('blog_header_image', array(
    'default'  => '',
    'type' => 'option'
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'blog_header_image', array(
    'label' => __('Blog Index Header Background Image', 'kubb'),
    'section' => 'blog_settings',
    'priority'  => 2
)));

//comments TITLE
$wp_customize->add_setting( 'blog_title', array(
    'default'        => 'Our Journal',
    'type' => 'option'
) );

//commentstitle
$wp_customize->add_control( 'blog_title', array(
    'label' => __('Blog Page Title', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 1,
) );

//blog layout
$wp_customize->add_setting('blog_layout', array(
    'default' => 'bloggrid',
    'type' => 'option'
));

//blog layout
$wp_customize->add_control( 'blog_layout', array(
    'label'   => __('Choose layout for Blog.', 'kubb'),
    'section' => 'blog_settings',
    'type'    => 'select',
    'priority' => 4,
    'choices' => array(
        'bloggrid' => 'Grid Blog',
        'bloggridsidebar' => 'Grid Blog Sidebar',
        'blogclassic' => 'Classic Feed Blog',
        'blogclassicsidebar' => 'Classic Feed Blog Sidebar',
    ),
));

//comments TITLE
$wp_customize->add_setting( 'comments_title', array(
    'default'        => 'Would you like to share your thoughts?',
    'type' => 'option'
) );

//commentstitle
$wp_customize->add_control( 'comments_title', array(
    'label' => __('Comments Title', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 5,
) );

//comments subTITLE
$wp_customize->add_setting( 'comments_subtitle', array(
    'default'        => 'Your email address will not be published. Required fields are marked *',
    'type' => 'option'
) );

//comments subtitle
$wp_customize->add_control( 'comments_subtitle', array(
    'label' => __('Comments Sub-title', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 5,
) );

//blog continue
$wp_customize->add_setting( 'blog_continue', array(
    'default'        => 'Continue Reading',
    'type' => 'option'
) );

//blog continue
$wp_customize->add_control( 'blog_continue', array(
    'label' => __('Blog "Continue Reading" Text', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog read more
$wp_customize->add_setting( 'blog_read_more', array(
    'default'        => 'Read More',
    'type' => 'option'
) );

//blog read more
$wp_customize->add_control( 'blog_read_more', array(
    'label' => __('Blog "Read More" Text', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog view larger
$wp_customize->add_setting( 'blog_view_larger', array(
    'default'        => 'View Larger',
    'type' => 'option'
) );

//blog view larger
$wp_customize->add_control( 'blog_view_larger', array(
    'label' => __('Blog "View Larger" Text', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog continue
$wp_customize->add_setting( 'author_details_title', array(
    'default'        => 'About the author',
    'type' => 'option'
) );

//blog continue
$wp_customize->add_control( 'author_details_title', array(
    'label' => __('SINGLE - Author Details Title', 'kubb'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog social
$wp_customize->add_setting( 'blog_social', array(
    'default' => 1,
    'type' => 'option'
) );

//blog social
$wp_customize->add_control( 'blog_social', array(
    'label' => __('META - SINGLE - Show Social Sharing Buttons?', 'kubb'),
    'type' => 'checkbox',
    'section' => 'blog_settings',
    'priority'       => 13,
) );

//blog author
$wp_customize->add_setting( 'blog_author', array(
    'default' => 1,
    'type' => 'option'
) );

//blog author
$wp_customize->add_control( 'blog_author', array(
    'label' => __('META - SINGLE - Show post author details?', 'kubb'),
    'type' => 'checkbox',
    'section' => 'blog_settings',
    'priority'       => 13,
) );
	
	
///////////////////////////////////////
//     PORTFOLIO SECTION            //
/////////////////////////////////////
	
//CREATE CUSTOM STYLING SUBSECTION
$wp_customize->add_section( 'portfolio_settings', array(
	'title'          => 'Portfolio Settings',
	'priority'       => 36,
) ); 

//blog layout
$wp_customize->add_setting('portfolio_layout', array(
    'default' => 'portfolio-full',
    'type' => 'option'
));

//blog layout
$wp_customize->add_control( 'portfolio_layout', array(
    'label'   => __('Choose layout for Portfolio Archives.', 'kubb'),
    'section' => 'portfolio_settings',
    'type'    => 'select',
    'priority' => 1,
    'choices'    => array(
        'portfolio-full' => 'Fullscreen Grid',
        'portfolio-fix' => 'Masonry Grid',
        'portfolio-full-lightbox' => 'Fullscreen Grid Lightbox',
        'portfolio-fix-lightbox' => 'Masonry Grid Lightbox',
        'portfolio-carousel' => 'Image Carousel',
    ),
));

/**
 * Create colors section
 * @author TommusRhodus
 * @package loom
 * @since 1.0.0
 */

/**
 * highlight settings
 */
$wp_customize->add_setting('highlight_colour', array(
    'default'           => '#28b8d8',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * highlight controls
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_colour', array(
    'label'    => __('Key Colour (Highlight)', 'kubb'),
    'section'  => 'colors',
    'priority' => 100,
)));

/**
 * highlight hover settings
 */
$wp_customize->add_setting('highlight_hover_colour', array(
    'default'           => '#00a1c4',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * highlight hover controls
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_hover_colour', array(
    'label'    => __('Key Colour (Highlight Hover)', 'kubb'),
    'section'  => 'colors',
    'priority' => 105,
)));

/**
 * wrapper dark settings
 */
$wp_customize->add_setting('wrapper_background_dark', array(
    'default'           => '#f2f2f2',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * wrapper dark control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrapper_background_dark', array(
    'label'    => __('Background Color (Darker)', 'kubb'),
    'section'  => 'colors',
    'priority' => 25,
)));

/**
 * wrapper black settings
 */
$wp_customize->add_setting('wrapper_background_black', array(
    'default'           => '#272727',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * wrapper black control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrapper_background_black', array(
    'label'    => __('Background Color (Darkest)', 'kubb'),
    'section'  => 'colors',
    'priority' => 25,
)));

/**
 * header background settings
 */
$wp_customize->add_setting('header_bg', array(
    'default'           => '#151515',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * header background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg', array(
    'label'    => __('Header Background Color', 'kubb'),
    'section'  => 'colors',
    'priority' => 120,
)));

/**
 * footer background settings
 */
$wp_customize->add_setting('footer_bg', array(
    'default'           => '#232323',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * footer background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg', array(
    'label'    => __('GLOBAL - Main Footer Background', 'kubb'),
    'section'  => 'colors',
    'priority' => 130,
)));

/**
 * sub footer background settings
 */
$wp_customize->add_setting('sub_footer_bg', array(
    'default'           => '#1e1e1e',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * sub footer background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_footer_bg', array(
    'label'    => __('GLOBAL - Sub Footer Background', 'kubb'),
    'section'  => 'colors',
    'priority' => 135,
)));

/**
 *  END COLOURS SECTION
 */


///////////////////////////////////////
//     CUSTOM LOGO SECTION          //
/////////////////////////////////////
	
//CREATE CUSTOM LOGO SUBSECTION
$wp_customize->add_section( 'custom_logo_section', array(
	'title'          => 'Header Settings & Logo',
	'priority'       => 30,
) );

//CUSTOM LOGO SETTINGS
$wp_customize->add_setting('custom_logo', array(
    'default'  => get_template_directory_uri() . '/style/images/logo.png',
    'type' => 'option'

));

//CUSTOM LOGO
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
    'label'    => __('Custom Logo Upload', 'kubb'),
    'section'  => 'custom_logo_section',
    'priority'       => 1
)));

//CUSTOM RETINA LOGO SETTINGS
$wp_customize->add_setting('custom_logo_retina', array(
    'default'  => get_template_directory_uri() . '/style/images/logo@2x.png',
    'type' => 'option'

));

//CUSTOM RETINA LOGO
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo_retina', array(
    'label'    => __('Retina Logo - Needs @2x on the file e.g logo@2x.png', 'kubb'),
    'section'  => 'custom_logo_section',
    'priority'       => 1
)));

//logo alt text
$wp_customize->add_setting( 'custom_logo_alt_text', array(
    'default'        => 'Alt Text',
    'type' => 'option'
) );

//logo alt text
$wp_customize->add_control( 'custom_logo_alt_text', array(
    'label' => __('Custom Logo Alt Text', 'kubb'),
    'type' => 'text',
    'section' => 'custom_logo_section',
) );

for( $i = 1; $i < 5; $i++ ){
	$wp_customize->add_setting("header_social_$i", array(
	    'default' => 'pinterest',
	    'type' => 'option'
	));
	
	$wp_customize->add_control( "header_social_$i", array(
	    'label'   => __("header Social Icon $i", 'elise'),
	    'section' => 'custom_logo_section',
	    'type'    => 'select',
	    'priority' => 10 + $i + $i,
	    'choices'    => $social_options
	));
	
	$wp_customize->add_setting( "header_social_link_$i", array(
	    'default'        => '',
	    'type' => 'option'
	) );
	
	$wp_customize->add_control( "header_social_link_$i", array(
	    'label' => __("header Social Link $i", 'elise'),
	    'type' => 'text',
	    'section' => 'custom_logo_section',
	    'priority' => 11 + $i + $i,
	) );
}

/**
 * Ebor Framework
 * Custom Favicons
 * @since version 1.0
 * @author TommusRhodus
 */
 
 /**
  * Create the Favicon Section
  */
 $wp_customize->add_section( 'favicon_settings', array(
 	'title'          => 'Favicons',
 	'priority'       => 30,
 ) );

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('custom_favicon', array(
	'default' => '',
	'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'custom_favicon', array(
	'label'    => __('Custom Favicon Upload', 'ebor_starter'),
	'section'  => 'favicon_settings',
	'settings' => 'custom_favicon',
	'priority'       => 21,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('mobile_favicon', array(
    'default' => '',
    'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'mobile_favicon', array(
    'label'    => __('Non-Retina Mobile Favicon Upload', 'ebor_starter'),
    'section'  => 'favicon_settings',
    'settings' => 'mobile_favicon',
    'priority'       => 22,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('72_favicon', array(
    'default' => '',
    'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '72_favicon', array(
    'label'    => __('iPad Favicon (72x72px)', 'ebor_starter'),
    'section'  => 'favicon_settings',
    'settings' => '72_favicon',
    'priority'       => 23,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('114_favicon', array(
   'default' => '',
   'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '114_favicon', array(
   'label'    => __('Retina iPhone Favicon (114x114px)', 'ebor_starter'),
   'section'  => 'favicon_settings',
   'settings' => '114_favicon',
   'priority'       => 24,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('144_favicon', array(
	'default' => '',
	'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '144_favicon', array(
	'label'    => __('Retina iPad Favicon (144x144px)', 'ebor_starter'),
	'section'  => 'favicon_settings',
	'settings' => '144_favicon',
	'priority'       => 25,
)));

///////////////////////////////////////
//     CUSTOM CSS SECTION           //
/////////////////////////////////////

//CREATE CUSTOM CSS SUBSECTION
$wp_customize->add_section( 'custom_css_section', array(
	'title'          => 'Custom CSS',
	'priority'       => 200,
) ); 
      
$wp_customize->add_setting( 'custom_css', array(
  'default'        => '',
  'type'           => 'option',
) );

$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'custom_css', array(
  'label'   => __('Custom CSS', 'kubb'),
  'section' => 'custom_css_section',
  'settings'   => 'custom_css',
) ) );


///////////////////////////////////////
//     FOOTER SETTINGS             //
/////////////////////////////////////
	
//CREATE CUSTOM CSS SUBSECTION
$wp_customize->add_section( 'footer_section', array(
	'title'          => 'Footer Settings',
	'priority'       => 40,
) );

//copyright text
$wp_customize->add_setting( 'copyright', array(
    'default'        => 'Configure this message in "Appearance" => "Customise" => "Footer"',
    'type' => 'option'
) );

//copyright text
$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'copyright', array(
    'label'   => __('SubFooter Copyright Text', 'kubb'),
    'section' => 'footer_section',
    'settings'   => 'copyright',
    'priority' => 1,
) ) );

for( $i = 1; $i < 8; $i++ ){
	$wp_customize->add_setting("footer_social_$i", array(
	    'default' => 'pinterest',
	    'type' => 'option'
	));
	
	$wp_customize->add_control( "footer_social_$i", array(
	    'label'   => __("Footer Social Icon $i", 'elise'),
	    'section' => 'footer_section',
	    'type'    => 'select',
	    'priority' => 10 + $i + $i,
	    'choices'    => $social_options
	));
	
	$wp_customize->add_setting( "footer_social_link_$i", array(
	    'default'        => '',
	    'type' => 'option'
	) );
	
	$wp_customize->add_control( "footer_social_link_$i", array(
	    'label' => __("Footer Social Link $i", 'elise'),
	    'type' => 'text',
	    'section' => 'footer_section',
	    'priority' => 11 + $i + $i,
	) );
}
      	
}