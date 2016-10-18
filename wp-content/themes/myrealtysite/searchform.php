<div class="menu_search">
	<form action="<?php echo home_url( '/' ); ?>" method="get">
		<input type="search" name="s" class="search" value="<?php the_search_query(); ?>" placeholder="Найти"></input>
		<button type="submit" name="submit" class="submit pull-right" value=""><i class=" fa fa-arrow-right"></i></button>
	</form>
</div>