<?php get_header(); ?>
<!--Index Page-->
		<div class="main_outer">	
			<div class="main_content">
				<div class="content_wrapper">
					
<!-- The Main Loop -->
<?php $the_query = new WP_Query( 'category_name=blog&showposts=3'); ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="post_meta">
			Опубликовано: <span><?php the_time('j M Y'); ?></span>, Автор: <span><?php the_author_link(); ?></span>, Категория: <?php the_category(', '); ?>
		</div>
		<?php the_post_thumbnail(); ?>
		<?php the_content(); ?>
	</article>	
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<!-- -End Loop-->				
				</div>
			</div>

			<?php get_sidebar('left'); ?>
			
		</div>

<?php get_footer(); ?>