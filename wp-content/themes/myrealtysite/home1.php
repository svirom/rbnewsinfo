<?php get_header(); ?>
<!--Home Page-->
		<div class="main_outer">	
			<div class="main_content">
				<div class="content_wrapper">
					
<?php echo do_shortcode("[metaslider id=19]"); ?>

<?php global $the_query; ?>
<?php $the_query = new WP_Query('category_name=blog&showposts=3'); ?>
<?php if ( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="post_meta">
			Опубликовано: <span><?php the_time('j M Y'); ?></span>, Автор: <span><?php the_author_link(); ?></span>, Категория: <?php the_category(', '); ?>
		</div>
		<?php the_post_thumbnail(); ?>
		<?php the_content(); ?>
	</article>	
<?php endwhile; else: ?>
	<p class="error-404"><?php _e("В этой категории еще нет записей") ?></p>
<?php endif; ?>

<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

<?php wp_reset_postdata(); ?>
				</div>
			</div>

			<?php get_sidebar('left'); ?>
			<?php get_sidebar('right'); ?>
			
		</div>

<?php get_footer(); ?>