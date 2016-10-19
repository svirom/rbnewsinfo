<?php get_header(); ?>
<!--404 Page-->
		<div class="row main_outer">	
			<div class="col-sm-8 col-sm-push-4 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3 main_content">	            
            	<p class="error-404"><?php _e("Запрашиваемая Вами страница не найдена. Попробуйте другой вариант") ?></p>      	                        	
			</div> 
			<div class="col-sm-4 col-sm-pull-8 col-md-4 col-md-pull-8 col-lg-3 col-lg-pull-9">
				<?php get_sidebar('left'); ?>
			</div>
		</div> 
<?php get_footer(); ?>
