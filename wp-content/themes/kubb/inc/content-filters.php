<?php 
	$cats = get_categories('taxonomy=portfolio-category'); 
?>

<div class="filter dark-wrapper container">
  <ul>
    <li><a class="active" href="#" data-filter="*"><?php _e('All','kubb'); ?></a></li>
    <?php 
    	foreach ($cats as $cat){
    		echo '<li><a href="#" data-filter=".' . $cat->slug . '">' . $cat->name . '</a></li>';
    	} 
    ?>
  </ul>
</div><!-- /filter -->