<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package kqed
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function kqed_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'kqed_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function kqed_jetpack_setup
add_action( 'after_setup_theme', 'kqed_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function kqed_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function kqed_infinite_scroll_render
