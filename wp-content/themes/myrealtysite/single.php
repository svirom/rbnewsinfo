<?php get_header(); ?>
<!--Single-post    -->
		<div class="row main_outer">	
			<div class="main_content">
				<div class="content_wrapper">			

<?php
if ( in_category(array('planning', 'planning')) ) { 		
	include 'single-planning.php';
} else {
	include 'single-regular.php';
}
?>
			
				</div>
			</div>

			<?php get_sidebar('left'); ?>
			
		</div>

<?php get_footer(); ?>
