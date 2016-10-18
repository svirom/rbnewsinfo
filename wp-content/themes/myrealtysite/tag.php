<?php
/*
Template Name: tag
*/
?>

<?php get_header(); ?>
<!---Tag page-->

<div class="main_outer">	
	<div class="main_content">
		<div class="content_wrapper">

			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="post_meta">
					Опубликовано: <span><?php the_time('j M Y'); ?>
				</div>
			<?php the_excerpt(); ?>
			</article>
			<?php endwhile; ?>
			<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
			<article>
				<h2>Список всех тегов:</h2>
					<div class="post_tags">
					<?php wp_tag_cloud('number=50'); ?>
					</div>
			</article>	
		</div>
	</div>
			<?php get_sidebar('left'); ?>
			<?php get_sidebar('right'); ?>		
</div>

<?php get_footer(); ?>