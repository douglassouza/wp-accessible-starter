<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WP_Bootstrap_Starter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_accessible_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'wp_accessible_starter_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wp_accessible_starter_pingback_header() {
	echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
}
add_action( 'wp_head', 'wp_accessible_starter_pingback_header' );


function fixbug_accessibility( $content ) {
	$content = str_replace('<p></p>', '', $content);
	$content = str_replace('<ul></ul>', '', $content);
	if(is_page()) {
		$content = str_replace('class="wp-block-group"', 'tabindex= "0" class="wp-block-group"', $content);
		$content = str_replace('class="wp-block-group ', 'tabindex= "0" class="wp-block-group ', $content);
		$content = str_replace('class="wp-block-cover"', 'tabindex= "0" class="wp-block-cover"', $content);
    	$content = str_replace('class="wp-block-cover ', 'tabindex= "0" class="wp-block-cover ', $content);
	}
    $content = str_replace('<p role="status" aria-live="polite" aria-atomic="true"></p>', '<p role="status" aria-live="polite" aria-atomic="true">Formulario</p>', $content);
    return $content;
}
add_filter( 'the_content', 'fixbug_accessibility', 99 );
