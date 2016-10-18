<?php 
/*
Template Name: Standard Page
*/
get_header(); ?>

		<div class="main_outer">	
			<div class="main_content">
				<div class="content_wrapper">
					
					<article>
						<?php the_title( '<h1>', '</h1>' ); ?>       
						<?php the_post(); ?>
						<?php the_content(); ?>
					</article>		
				</div>
			</div>

			<?php get_sidebar('left'); ?>
			
		</div>

<?php get_footer(); ?>