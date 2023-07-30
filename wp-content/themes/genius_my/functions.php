<?php
/**
 * genius_my functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package genius_my
 */

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}

function show_menu_slugs()
{
  $menus = get_terms('nav_menu');
  echo '<pre>';
  foreach ($menus as $menu) {
    echo 'Menu Name: ' . $menu->name . ' | Menu Slug: ' . $menu->slug . '<br>';
  }
  echo '</pre>';
}
add_action('wp_footer', 'show_menu_slugs');

function genius_my_register_menus()
{
  // добавит в админку новую локацию для меню
  register_nav_menus(
    array(
      'header_nav' => 'Header navigation my location',
      'footer_nav' => 'Footer navigation',
    )
  );
}

add_action('after_setup_theme', 'genius_my_register_menus', 0);

function genius_my_body_class($classes)
{
  if (is_front_page()) {
    $classes[] = 'main_class';
  } else {
    $classes[] = 'main_extra_class';
  }

  return $classes;
}

add_filter('body_class', 'genius_my_body_class');

function genius_my_enqueue_scripts()
{
  echo get_template_directory_uri() . '/assets/css/general.css';

  // register регистрирует скрипт или стиль
  // wp_register_script
  // но не подключает
  // подключить можно позже где-то в php
  // шаблоне
  // либо сразу указівать wp_enqueue_script,
  // или wp_enqueue_style без wp_register
  wp_register_style('genius_my_general', get_template_directory_uri() . "/assets/css/general.css?a=" . generateRandomString(), array(), '1.0', 'all');

  wp_enqueue_style('genius_my_general');

  // тут можно задавать условия когда грузить скрипт
  // if (is_singular()) {
  // true - вывести в footer
  wp_enqueue_script('genius_my_script', get_template_directory_uri() . "/assets/js/script.js?a=" . generateRandomString(), array('jquery'), '1.0', true);
  // }

  // в wp есть много скриптов которые уже зарегистрированы
  // но не подключены
  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  wp_enqueue_script('thickbox');
}

add_action('wp_enqueue_scripts', 'genius_my_enqueue_scripts');

function genius_my_show_meta()
{
  echo "<meta name='author' content='BORODKO'>";
}

add_action('wp_head', 'genius_my_show_meta');

function genius_my_show_test()
{
  echo "Hello";
}

// 10 приоритет, чем больше тем первее отобразится
add_action('wp_footer', 'genius_my_show_test', 10);

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function genius_my_setup()
{
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on genius_my, use a find and replace
   * to change 'genius_my' to the name of your theme in all the template files.
   */
  // поддержка многоязычности
  load_theme_textdomain('genius_my', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support('title-tag');

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'genius_my'),
    )
  );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'genius_my_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
}
add_action('after_setup_theme', 'genius_my_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function genius_my_content_width()
{
  $GLOBALS['content_width'] = apply_filters('genius_my_content_width', 640);
}
add_action('after_setup_theme', 'genius_my_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function genius_my_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'genius_my'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'genius_my'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action('widgets_init', 'genius_my_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function genius_my_scripts()
{
  // wp_enqueue_style('genius_my-style', get_stylesheet_uri(), array(), _S_VERSION);
  // wp_style_add_data('genius_my-style', 'rtl', 'replace');

  // wp_enqueue_script('genius_my-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'genius_my_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

// вместо создания файла searchform.php
// можно сделать функцию и поцепить на hook
// function custom_search($form){
//   $form = "test";

//   return $form;
// }
// add_filter('get_search_form', 'custom_search');

function genius_my_register_post_type()
{
  $args = array(
    'label' => esc_html__('Cars','genius_my'),
    'labels' => array(
      'menu_name' => esc_html__('Cars','genius_my'),
      'name'          => __('Cars', 'genius_my'),
			'singular_name' => __('Car', 'genius_my'),
    ),

    //тут так-же указана поддержка post-formats
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'post-formats'),
    'public' => true, //показывать или спрятанный post type
    
    'menu_icon' => 'dashicons-airplane',

    //переделать пермалинку на https://$домен/genius/cars
    'rewrite' => array('slug' => 'cars'),

    //активировать gutenberg редактор для car
    'show_in_rest' => true,

    'has_archive' => true,
  );
  register_post_type('car', $args);
}

add_action('init', 'genius_my_register_post_type');

// так добавить поддержку post-formats в page
// add_post_type_support( 'page', 'post-formats' );

add_action( 'after_setup_theme', 'genius_my_posts_formats', 11 );
function genius_my_posts_formats(){
 add_theme_support( 'post-formats', array(
    'aside',
    'audio',
    'chat',
    'gallery',
    'image',
    'link',
    'quote',
    'status',
    'video',
    ) );
}

// после переключения темы обновить пермалинки для кастомного поста
function genius_my_rewrite_rules(){
  genius_my_register_post_type();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'genius_my_rewrite_rules');
