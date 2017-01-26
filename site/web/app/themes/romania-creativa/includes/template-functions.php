<?php
/**
 * Template functions
 *
 * @package rocreativa
 * @since 0.1
 */

/**
 * Checks if the current template has a sidebar
 *
 * @return bool
 */

if ( !function_exists( 'rocreativa_has_sidebar' ) ) :
function rocreativa_has_sidebar() {
	return apply_filters( 'rocreativa_has_sidebar',
		is_active_sidebar( 'sidebar-1' )
		&& !is_404()
		&& !is_page_template( 'wide.php' )
		&& !is_singular( 'case_study' )
	);
}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( !function_exists( 'rocreativa_body_classes' ) ) :
function rocreativa_body_classes( $classes ) {
	
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'rocreativa-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( rocreativa_has_sidebar() ) {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
endif;

add_filter( 'body_class', 'rocreativa_body_classes' );


/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the current post.
 * @return array
 */
 
if ( !function_exists( 'rocreativa_post_class' ) ) :
function rocreativa_post_class( $classes ) {

	return $classes;
}
endif;

add_filter( 'post_class', 'rocreativa_post_class' );


/**
 * Finds out if blog has more than one category.
 *
 * @return bool
 */

function rocreativa_is_categorized_blog() {
	
	if ( false === ( $nonempty_categories = get_transient( 'nonempty_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$nonempty_categories = get_categories( array('hide_empty' => 1) );

		// Count the number of categories that are attached to the posts
		$nonempty_categories = count( $nonempty_categories );

		set_transient( 'nonempty_categories', $nonempty_categories );
	}

	if ( '1' != $nonempty_categories ) // This blog has more than one category
		return true;
		
	// This blog has only one category
	return false;
}

/**
 * Flush out the transients used in rocreativa_is_categorized_blog
 */

function rocreativa_nonempty_categories_transient_flusher() {
	
	delete_transient( 'nonempty_categories' );
}

add_action( 'edit_category', 'rocreativa_nonempty_categories_transient_flusher' );
add_action( 'save_post',  'rocreativa_nonempty_categories_transient_flusher' );
