<?php
/**
 * Wedding Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wedding_Theme
 */

if ( ! defined( '_WEDDING_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_WEDDING_VERSION', wp_get_theme()->get('Version') );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wedding_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wedding Theme, use a find and replace
		* to change 'wedding-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wedding-theme', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'Header Menu', 'wedding-theme' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'wedding-theme' ),
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

}
add_action( 'after_setup_theme', 'wedding_theme_setup' );


/**
 * Enqueue scripts and styles.
 */
function wedding_theme_scripts() {

	wp_enqueue_style( 'wedding-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), _WEDDING_VERSION, 'all' ); // style.css

    wp_enqueue_script('wedding-theme-js', get_stylesheet_directory_uri() . '/js/core.min.js', array('jquery'), _WEDDING_VERSION, 'all'); // js

    wp_enqueue_script('wedding-theme-ts', get_stylesheet_directory_uri() . '/js/corets.min.js', array('jquery'), _WEDDING_VERSION, 'all'); // ts

}
add_action( 'wp_enqueue_scripts', 'wedding_theme_scripts' );

// PHP file imports
$wedding_includes = array(
    '/plugins.php'
);


foreach ( $wedding_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
