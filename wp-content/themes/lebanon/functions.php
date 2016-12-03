<?php
/**
 * Lebanon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lebanon
 */

if ( ! function_exists( 'lebanon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lebanon_setup() {
    
    
        if( !defined( 'LEBANON_VERSION' ) ) :
            define('LEBANON_VERSION', '1.0.7');
        endif;
    
        
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lebanon, use a find and replace
	 * to change 'lebanon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lebanon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
        add_theme_support('woocommerce');
        add_editor_style('');
        add_theme_support( 'custom-colors');
        
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'lebanon' ),
		'footer' => esc_html__( 'Footer Menu', 'lebanon' ),
            
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
                'gallery',
	) );

        add_theme_support( 'custom-logo' );

}
endif; // lebanon_setup
add_action( 'after_setup_theme', 'lebanon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lebanon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lebanon_content_width', 640 );
}
add_action( 'after_setup_theme', 'lebanon_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */

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
 * Load the theme functions
 */
require get_template_directory() . '/inc/lebanon.php';

require get_template_directory() . '/inc/tgm.php';
