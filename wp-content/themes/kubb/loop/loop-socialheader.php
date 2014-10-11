<?php $protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); ?>

<ul class="social pull-right">
	<?php 
		if( function_exists('ebor_cart_icon') )
			echo ebor_cart_icon();
			
		for( $i = 0; $i < 5; $i++ ){
			if( get_option("header_social_link_$i") ) {
				echo '<li><a href="' . esc_url(get_option("header_social_link_$i"), $protocols) . '" target="_blank">
						  <i class="icon-s-' . get_option("header_social_$i") . '"></i>
					  </a></li>';
			}
		} 
	?>
</ul>