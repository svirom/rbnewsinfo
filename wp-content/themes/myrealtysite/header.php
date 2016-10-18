<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset');?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
?>
</title>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="main_wrapper" class="container-fluid">
		<header class="row main_header backgrnd" role="navigation">
			<div class="logo col-sm-4 col-md-4 col-lg-3">
				
				    
			
				<h1><a href="/index.php" alt="Logo"></a></h1>
			</div>
			<div class="col-sm-8 col-md-8 col-lg-7">
				<nav class="main_menu">
					<button id="menu_toggle"><span class="fa fa-bars fa-4x"></span>
					
					</button>
					<?php wp_nav_menu(array(
		                'menu' => 'Main Menu', 
		                'container' => '', 
		                'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>'
		            )); ?>  
				</nav>
			</div>
			<div class="hidden-xs hidden-sm hidden-md col-lg-2 pull-right"><?php get_search_form(); ?></div>
			<div id="back-to-top" class="floating">
				<a href="#top"><span></span></a>
			</div>
		</header>
