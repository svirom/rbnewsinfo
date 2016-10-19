<?php get_header(); ?>
<!--Category Planning-->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">
				<?php $planning_query = new WP_Query( 'category_name=planning&showposts=6'); ?>
				<?php if ($planning_query->have_posts()) : while ($planning_query->have_posts()) : $planning_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 category_p'); ?>>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<div class="post_meta">
						Опубл.: <span><?php the_time('j M Y'); ?></span>, Категория: <?php the_category(', '); ?>
					</div>
					<?php the_post_thumbnail(); ?>
					<?php the_excerpt(); ?>
				</article>
				<?php endwhile; else: ?>
					<p class="error-404"><?php _e("В этой категории еще нет записей") ?></p>
				<?php endif; ?>
				<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				<!--<?php //the_posts_pagination(); ?>-->
				<?php wp_reset_postdata(); ?>
			</div>
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">		
				<?php get_sidebar('left'); ?>
			</div>
		</div>
<?php get_footer(); ?>