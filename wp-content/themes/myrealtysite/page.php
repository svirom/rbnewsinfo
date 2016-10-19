<?php 
/*
Template Name: Standard Page
*/
get_header(); ?>
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">
				<article>
					<?php the_title( '<h1>', '</h1>' ); ?>       
					<?php the_post(); ?>
					<?php the_content(); ?>
				</article>		
			</div>
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">		
				<?php get_sidebar('left'); ?>
			</div>
		</div>
<?php get_footer(); ?>