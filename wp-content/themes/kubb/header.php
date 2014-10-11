<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="body-wrapper">

  <div class="navbar">
    <div class="navbar-header">
      <div class="container">
      
        <div class="basic-wrapper"> 
        
        	<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
        		<i class='icon-menu-1'></i>
        	</a> 
        	
        	<a class="navbar-brand" href="<?php echo home_url(); ?>">
        		<?php 
        			if( get_option('custom_logo') ){
        				echo '<img src="'. get_option('custom_logo') .'" alt="" data-src="'. get_option('custom_logo') .'" data-ret="'. get_option('custom_logo_retina') .'" class="retina" />';
        			} else {
        				echo bloginfo('title');
        				echo '<br /><small>';
        				echo bloginfo('description');
        				echo '</small>';
        			}
        		?>
        	</a> 
        	
        </div>
        
        <div class="collapse navbar-collapse pull-right">
          
			<?php
				if ( has_nav_menu( 'primary' ) ){
				    wp_nav_menu( 
				    	array(
					        'theme_location'    => 'primary',
					        'depth'             => 3,
					        'container'         => false,
					        'container_class'   => false,
					        'menu_class'        => 'nav navbar-nav',
					        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					        'walker'            => new ebor_bootstrap_navwalker()
				        )
				    );
					    
				} else {
					echo '<a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a>';
				}
			
				if( get_option("header_social_link_1") )
					get_template_part('loop/loop','socialheader');
			?>
          
        </div>
        
      </div><!--/.container-->
    </div><!--/.nav-collapse --> 
  </div><!--/.navbar -->