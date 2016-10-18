<!-- Category Plannig -->		
<?php while ( have_posts() ) : the_post(); ?>
	<article>
		<?php the_title( '<h1>', '</h1>' ); ?>

		<?php the_content(); ?>
		<div class="post_tags">
			<span>Теги:</span>
			<div class="tags_inner">
				<?php the_tags('', '', '<br />'); ?>
			</div>
		</div>


				
	</article>
<?php endwhile; ?>

	

