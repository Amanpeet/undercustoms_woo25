<?php
/**
 * undercustomz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package undercustomz
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function undercustomz_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on undercustomz, use a find and replace
		* to change 'undercustomz' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'undercustomz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary', 'undercustomz' ),
			'menu-footer' => esc_html__( 'Footer', 'undercustomz' ),
			'menu-footer-alt' => esc_html__( 'Footer Alt', 'undercustomz' ),
			'menu-social' => esc_html__( 'Social', 'undercustomz' ),
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
			'undercustomz_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'undercustomz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function undercustomz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'undercustomz_content_width', 640 );
}
add_action( 'after_setup_theme', 'undercustomz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function undercustomz_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'undercustomz' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'undercustomz' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'undercustomz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function undercustomz_scripts() {
  // stylesheets
  wp_enqueue_style( 'undercustomz-bootstrap5css', get_template_directory_uri() . '/css/bootstrap.min.css',false,'5.0.1','all');
	wp_enqueue_style( 'undercustomz-style', get_stylesheet_uri(), array(), _S_VERSION );

  // scripts
  wp_enqueue_script('jquery');
	// wp_enqueue_script( 'undercustomz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'undercustomz-bootstrap5js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'undercustomz_scripts' );

/**
 * Register Custom Navigation Walker
 */
function register_bootstrap5_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap5-navwalker.php';
}
add_action( 'after_setup_theme', 'register_bootstrap5_navwalker' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Limit for excerpt
 * use echo excerpt(30)
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_content(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/**
 * Add class to post nav buttons
 */
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
function post_link_attributes($output) {
  $code = 'class="btn btn-dark mt-4"';
  return str_replace('<a href=', '<a '.$code.' href=', $output);
}

