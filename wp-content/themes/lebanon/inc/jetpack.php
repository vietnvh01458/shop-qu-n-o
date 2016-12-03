<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Lebanon
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function lebanon_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'lebanon_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function lebanon_jetpack_setup
add_action( 'after_setup_theme', 'lebanon_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function lebanon_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function lebanon_infinite_scroll_render
