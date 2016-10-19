<?php get_header(); ?>
<!--Index Page-->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">		
	<!-- The Main Loop -->
				<?php $the_query = new WP_Query( 'category_name=blog&showposts=4'); ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6'); ?>>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<div class="post_meta">
						Опубл.: <span><?php the_time('j M Y'); ?></span>, Автор: <span><?php the_author_link(); ?></span>, Категория: <?php the_category(', '); ?>
					</div>
					<?php the_post_thumbnail(); ?>
					<?php the_content(); ?>
				</article>	
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
	<!-- -End Loop-->				
			</div>
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">
				<?php get_sidebar('left'); ?>
			</div>
		</div>
<?php get_footer(); ?>