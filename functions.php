<?php
/**
 * Junto Theme functions and definitions
 *
 * @package Junto Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'junto_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function junto_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Junto Theme, use a find and replace
	 * to change 'junto-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'junto-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'junto-theme' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'junto_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // junto_theme_setup
add_action( 'after_setup_theme', 'junto_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function junto_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'junto-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'junto_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function junto_theme_scripts() {
	wp_enqueue_style( 'junto-theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_script( 'junto-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'junto-theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true );

	wp_enqueue_script( 'junto-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'junto_theme_scripts' );

/**
 * Admin scripts
 */
add_action( 'admin_enqueue_scripts', 'polis_admin_enqueue_scripts' );
function polis_admin_enqueue_scripts(){
	// Remove Open Sans
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );

	// Theme admin scripts
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'source-sans', get_stylesheet_directory_uri() . '/css/source-sans.css', false, '1.0.0' );
	wp_enqueue_style( 'style-admin', get_stylesheet_directory_uri() . '/css/style-admin.css', false, '1.0.0' );
	wp_enqueue_style( 'rev-slider', get_stylesheet_directory_uri() . '/css/rev-slider.css', false, '1.0.0' );
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * ACF
 */
define( 'ACF_LITE' , false );
require get_template_directory() . '/inc/advanced-custom-fields/acf.php';
require get_template_directory() . '/inc/acf-options-page/acf-options-page.php';
require get_template_directory() . '/inc/acf-fields.php';