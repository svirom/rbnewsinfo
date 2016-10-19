<?php get_header(); ?>
<!--Home Page-->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">		
				<?php echo do_shortcode("[metaslider id=19]"); ?>
				<div class="row">
	<!-- The Main Loop -->
					<?php global $the_query; ?>
					<?php $the_query = new WP_Query('showposts=4'); ?>
					<?php if ( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php if (in_category('planning') && is_home() ) continue; ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 home_height'); ?>>
						<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						<div class="post_meta">
							Опубл.: <span><?php the_time('j M Y'); ?></span>, Автор: <span><?php the_author_link(); ?></span>, Категория: <?php the_category(', '); ?>
						</div>
						<?php the_post_thumbnail(); ?>
						<?php the_excerpt(); ?>
					</article>
					<?php endwhile; else: ?>
					<p class="error-404"><?php _e("В этой категории еще нет записей") ?></p>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
	<!-- -End Loop-->				
				</div>
				<div class="row button_more">
					<a href="/blog" class="btn btn-primary btn-lg floating" role="button"><i class="fa fa-angle-double-down" aria-hidden="true"></i> Больше статей <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">
				<?php get_sidebar('left'); ?>
			</div>
		</div>
<?php get_footer(); ?>