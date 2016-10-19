<?php

// убрать непонятные ссылки для Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
 
// отключить вывод мета тэга "generator"
remove_action('wp_head', 'wp_generator');
 
// скрыть версию WordPress
function gb_hide_wp_ver()
{
    return '';
}
add_filter('the_generator','gb_hide_wp_ver');


//----------------------------Убираем версии скриптов-----------------

function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
//Это для скрытия версии скриптов
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
//Это для стилей
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

//---------------------------------------------------------------------


function css() {
  wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
  wp_enqueue_style( 'fa', get_stylesheet_directory_uri() . '/css/font-awesome.css' );
  wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'css' );

wp_enqueue_style( 'style', get_stylesheet_uri() );

function script_jquery() {
 	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery') );
  wp_enqueue_script( 'bootstrap_jquery', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'script_jquery' );

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

/*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
add_theme_support( 'html5', array(
  'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

  /*
   * Enable support for Post Formats.
   *
   */
add_theme_support( 'post-formats', array(
  'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
  ) );


//---------------------- Регистрируем меню ------------------------------
function theme_register_nav_menu() {
  register_nav_menu( 'primary', 'Main Menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

//-----------------------------------------------------------------------



//---------------------- Регистрируем сайдбары ---------------------------

function sidebar_left() {
    register_sidebar( array(
      'name' => 'Левый сайдбар',
      'id' => 'sidebar-left',
      'before_widget' => '<section class="widget %2$s">',
	    'after_widget'  => '</section>',
	    'before_title'  => '<h3>',
	    'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sidebar_left' );


function sidebar_footer() {
    register_sidebar( array(
      'name' => 'Нижний сайдбар',
      'id' => 'sidebar-footer',
      'before_widget' => '<section class="widget %2$s col-xs-6 col-sm-4 col-md-4 col-sm-push-2 col-md-push-3">',
	    'after_widget'  => '</section>',
	    'before_title'  => '<h3>',
	    'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sidebar_footer');



//-----------------------------------------------------------------------

//--------------Подключаем виджет Популярные статьи--------------------------
require_once (get_template_directory() . "/widgets/popular-posts.php");  
//---------------------------------------------------------------------------

//--------------Custom length of excerpt----------------------------------
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//--------------Custom length of excerpt----------------------------------

//-------------В посте Читать далее--------------------------------------
function new_excerpt_more($more) {
       global $post;
    return '</br><a href="'. get_permalink($post->ID) . '" class="btn btn-primary">Читать дальше <i class="fa fa-arrow-right"></i></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
//------------------------------------------------------------------------


//-------------------Облако тегов------------------------------------------
add_filter('widget_tag_cloud_args','set_tag_cloud_args');
function set_tag_cloud_args( $args ) {
  $args['number'] = 40;
  $args['largest'] = 22;
  $args['smallest'] = 11;
  $args['unit'] = 'px';
  return $args;
}
//-------------------------------------------------------------------------


//---------------Функция для счетчика популярных статей на виджет----------
function setPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}
 
function getPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
 
        return "0";
    }
 
    return $count;
}
//-------------------------------------------------------------------------


//-----------------Пагинация-----------------------------------------------
function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="col-sm-12 pagging">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}
//-------------------------------------------------------------------------


//------------ Избавление от ссылки ?replytocom ----------------------------
function reply_to_com( $link ) {
  return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );}
add_filter( 'comment_reply_link', 'reply_to_com' );
//------------ Избавление от ссылки ?replytocom ------------------------------

//------------- Древовидные комментарии (решение проблемы после ?replytocom) -----------------------------------
function scripts_styles() {
  global $wp_styles;
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );
//------------- древовидные комментарии -----------------------------------




?>