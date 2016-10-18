<!-- Regular Post    -->
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="post_meta">
			Опубликовано: <span><?php the_time('j M Y'); ?></span>, Автор: <span><?php the_author_link(); ?></span>, Категория: <?php the_category(', '); ?>, Комментарии: <span class="comm"><?php comments_popup_link('0', '1', '%'); ?></span>
		</div>
		<script type="text/javascript">(function() {
  			if (window.pluso)if (typeof window.pluso.start == "function") return;
 			 if (window.ifpluso==undefined) { window.ifpluso = 1;
   			 var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
   			 s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
   			 s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
   			 var h=d[g]('body')[0];
   			 h.appendChild(s);
 			 }})();
		</script>
		<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=01" data-services="facebook,vkontakte,twitter,google,email,print">
		</div>
		<?php the_post_thumbnail(); ?>

		<?php the_content(); ?>
		<div class="post_tags">
			<span>Теги:</span>
			<div class="tags_inner">
				<?php the_tags('', '', '<br />'); ?>
			</div>
		</div>


		
		<?php if ( comments_open() || get_comments_number() ) : 
				comments_template();
		endif; ?>			
	</article>

<?php setPostViews(get_the_ID()); ?>	
<?php endwhile; ?>

		

