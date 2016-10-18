<?php get_header(); ?>
<!--Category    -->
		<div class="main_outer">	
			<div class="main_content">
				<div class="content_wrapper">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="post_meta">
			Опубликовано: <span><?php the_time('j M Y'); ?></span>, Автор: <?php the_author_link(); ?>, Категория: <?php the_category(', '); ?>, Комментарии: <span class="comm"><?php comments_popup_link('0', '1', '%'); ?></span>
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
			</div>

			<?php get_sidebar('left'); ?>
			
		</div>

<?php get_footer(); ?>