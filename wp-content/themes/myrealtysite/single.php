<?php get_header(); ?>
<!--Single Post    -->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">
				<?php
				if ( in_category(array('planning', 'planning')) ) { 		
					include 'single-planning.php';
				} else {
					include 'single-regular.php';
				}?>	
			</div>
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">		
				<?php get_sidebar('left'); ?>
			</div>
		</div>
<?php get_footer(); ?>
