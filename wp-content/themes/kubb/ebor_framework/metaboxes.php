<?php
  
function ebor_custom_metaboxes( $meta_boxes ) {
	$prefix = '_ebor_'; // Prefix for all fields
	
	$social_options = array(
		array('name' => 'Pinterest', 'value' => 'pinterest'),
		array('name' => 'RSS', 'value' => 'rss'),
		array('name' => 'Facebook', 'value' => 'facebook'),
		array('name' => 'Twitter', 'value' => 'twitter'),
		array('name' => 'Flickr', 'value' => 'flickr'),
		array('name' => 'Dribbble', 'value' => 'dribbble'),
		array('name' => 'Behance', 'value' => 'behance'),
		array('name' => 'linkedIn', 'value' => 'linkedin'),
		array('name' => 'Vimeo', 'value' => 'vimeo'),
		array('name' => 'Youtube', 'value' => 'youtube'),
		array('name' => 'Skype', 'value' => 'skype'),
		array('name' => 'Tumblr', 'value' => 'tumblr'),
		array('name' => 'Delicious', 'value' => 'delicious'),
		array('name' => '500px', 'value' => '500px'),
		array('name' => 'Grooveshark', 'value' => 'grooveshark'),
		array('name' => 'Forrst', 'value' => 'forrst'),
		array('name' => 'Digg', 'value' => 'digg'),
		array('name' => 'Blogger', 'value' => 'blogger'),
		array('name' => 'Klout', 'value' => 'klout'),
		array('name' => 'Dropbox', 'value' => 'dropbox'),
		array('name' => 'Github', 'value' => 'github'),
		array('name' => 'Songkick', 'value' => 'singkick'),
		array('name' => 'Posterous', 'value' => 'posterous'),
		array('name' => 'Appnet', 'value' => 'appnet'),
		array('name' => 'Google Plus', 'value' => 'gplus'),
		array('name' => 'Stumbleupon', 'value' => 'stumbleupon'),
		array('name' => 'LastFM', 'value' => 'lastfm'),
		array('name' => 'Spotify', 'value' => 'spotify'),
		array('name' => 'Instagram', 'value' => 'instagram'),
		array('name' => 'Evernote', 'value' => 'evernote'),
		array('name' => 'Paypal', 'value' => 'paypal'),
		array('name' => 'Picasa', 'value' => 'picasa'),
		array('name' => 'Soundcloud', 'value' => 'soundcloud')
	);
	
	$portfolio_layouts = array(
		array('name' => 'Image Carousel', 'value' => 'carousel'),
		array('name' => 'Masonry Gallery', 'value' => 'masonry'),
		array('name' => 'Image Feed', 'value' => 'images'),
		array('name' => 'Fullscreen Slider', 'value' => 'slider'),
	);
	
	$meta_boxes[] = array(
		'id' => 'all_metabox',
		'title' => __('Header Background', 'kubb'),
		'pages' => array('post', 'portfolio', 'page', 'team'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Header Background Image',
				'desc' => 'Recommended size 1600x300px, any size can be used, the theme will resize accordingly. Try to keep this under 100kb.',
				'id' => $prefix . 'header_image',
				'type' => 'file',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PORTFOLIO POST TYPE /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'portfolio_metabox',
		'title' => __('Image Gallery Settings', 'kubb'),
		'pages' => array('portfolio'), // post type
		'context' => 'side',
		'priority' => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Post Style',
				'desc' => '',
				'id' => $prefix . 'post_colour',
				'type' => 'radio',
				'options' => array(
					array('name' => 'Light', 'value' => 'light-wrapper'),
					array('name' => 'Dark', 'value' => 'dark-wrapper'),
					array('name' => 'Black', 'value' => 'black-wrapper'),
				),
				'std' => 'black-wrapper'
			),
			array(
				'name' => 'Post Gallery Layout',
				'desc' => '',
				'id' => $prefix . 'layout_checkbox',
				'type' => 'radio',
				'options' => $portfolio_layouts,
				'std' => 'carousel'
			),
			array(
				'name' => 'Upload Gallery Images',
				'desc' => 'Min Height 550px, Max 1400px, Drag & Drop to Reorder',
				'id' => $prefix . 'portfolio_gallery_list',
				'type' => 'pw_gallery',
				'sanitization_cb' => 'pw_gallery_field_sanitise',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR TEAM MEMBERS      ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'team_metabox',
		'title' => __('The Job Title', 'kubb'),
		'pages' => array('team'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Job Title', 'kubb'),
				'desc' => '(Optional) Enter a Job Title for this Team Member',
				'id'   => $prefix . 'the_job_title',
				'type' => 'text',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR POSTS             ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'post_metabox',
		'title' => __('The Post Sidebar', 'kubb'),
		'pages' => array('post'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Disable Post Sidebar','kubb'),
				'desc' => __("Check to disable the sidebar on this post.", 'kubb'),
				'id'   => $prefix . 'disable_sidebar',
				'type' => 'checkbox',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR SOCIAL            ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'social_metabox',
		'title' => __('Post Social Details', 'kubb'),
		'pages' => array('team', 'user'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Social Icon 1',
				'desc' => 'What icon would you like for this team members first social profile?',
				'id' => $prefix . 'team_social_icon_1',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 1', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_1_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 2',
				'desc' => 'What icon would you like for this team members second social profile?',
				'id' => $prefix . 'team_social_icon_2',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 2', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_2_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 3',
				'desc' => 'What icon would you like for this team members third social profile?',
				'id' => $prefix . 'team_social_icon_3',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 3', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 3 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_3_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 4',
				'desc' => 'What icon would you like for this team members fourth social profile?',
				'id' => $prefix . 'team_social_icon_4',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 4', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 4 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_4_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 5',
				'desc' => 'What icon would you like for this team members fifth social profile?',
				'id' => $prefix . 'team_social_icon_5',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 5', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 5 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_5_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 6',
				'desc' => 'What icon would you like for this team members sixth social profile?',
				'id' => $prefix . 'team_social_icon_6',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 6', 'kubb'),
				'desc' => __("Enter the URL for Social Icon 6 e.g www.google.com", 'kubb'),
				'id'   => $prefix . 'team_social_icon_6_url',
				'type' => 'text',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR CLIENTS /////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'clients_metabox',
		'title' => __('Client URL', 'kubb'),
		'pages' => array('client'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('URL for this client (optional)', 'kubb'),
				'desc' => __("Enter a URL for this client, if left blank, client logo will open into a lightbox.", 'kubb'),
				'id'   => $prefix . 'client_url',
				'type' => 'text',
			),
		),
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR GALLERY POST FORMAT /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'gallery_metabox',
		'title' => __('The Gallery', 'kubb'),
		'pages' => array('post'), // post type
		'context' => 'side',
		'priority' => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Upload Gallery Images',
				'desc' => 'These are used for the "Gallery" & "Image" Post Formats and will be output to your post accordingly.',
				'id' => $prefix . 'gallery_images',
				'type' => 'pw_gallery',
				'sanitization_cb' => 'pw_gallery_field_sanitise',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR VIDEO POST FORMAT ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => __('The Video Link', 'kubb'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_1',
				'type' => 'textarea_code',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_2',
				'type' => 'textarea_code',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_3',
				'type' => 'textarea_code',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_4',
				'type' => 'textarea_code',
			),
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_5',
				'type' => 'textarea_code',
			),
		)
	);


	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'ebor_custom_metaboxes' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}
?>