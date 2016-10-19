<?php get_header(); ?>
<!--Search Page-->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<div class="post_meta">
						Опубл.: <span><?php the_time('j M Y'); ?></span>, Автор: <?php the_author_link(); ?>, Категория: <?php the_category(', '); ?>
					</div>
					<?php the_excerpt(); ?>
				</article>
				<?php endwhile; ?>
				<?php else : ?>
					<p class="error-404"><?php _e("По Вашему запросу ничего не найдено. Попробуйте другой вариант") ?></p>
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