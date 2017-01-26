<?php
/**
 * Template tags
 *
 * @package rocreativa
 * @since 0.1
 */


/**
 * Display the entry title
 */

if ( !function_exists( 'rocreativa_entry_title' ) ) :
function rocreativa_entry_title() {
	
	if ( is_singular() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}

}
endif;

/**
 * Display the entry author
 */

if ( !function_exists( 'rocreativa_entry_author' ) ) :
function rocreativa_entry_author() {
	
	printf( '<div class="entry-author">%1$s<span class="screen-reader-text">%2$s</span> <a class="url fn n" href="%3$s">%4$s</a></div>',
		get_avatar( get_the_author_meta( 'user_email' ), 32 ),
		_x( 'Author:', 'Used before post author name.', 'rocreativa' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Display the entry date
 */

if ( !function_exists( 'rocreativa_entry_date' ) ) :
function rocreativa_entry_date() {
	
	$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<div class="entry-date"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></div>',
		_x( 'Posted on', 'Used before publish date.', 'rocreativa' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

/**
 * Display the post comments number
 */

if ( !function_exists( 'rocreativa_entry_comments_number' ) ) :
function rocreativa_entry_comments_number() {
	
	echo '<div class="entry-comments-number">';
	comments_number(
		__( 'No responses', 'rocreativa' ),
		__( '1 response', 'rocreativa' ),
		__( '% responses', 'rocreativa' )
	);
	echo '</div>';
}
endif;

/**
 * Display the post comments link
 */

if ( !function_exists( 'rocreativa_entry_comments_link' ) ) :
function rocreativa_entry_comments_link() {
	
	echo '<div class="entry-comments-link"><a href="' . get_comments_link() . '">';
	comments_number(
		__( 'No responses', 'rocreativa' ),
		__( '1 response', 'rocreativa' ),
		__( '% responses', 'rocreativa' )
	);
	echo '</a></div>';
}
endif;

/**
 * Display the entry categories
 */

if ( !function_exists( 'rocreativa_entry_categories' ) ) :
function rocreativa_entry_categories() {
	
	echo get_the_term_list( get_the_id(), 'category', '<div class="entry-categories">', ', ', '</div>' );
}
endif;

/**
 * Display the entry tags
 */

if ( !function_exists( 'rocreativa_entry_tags' ) ) :
function rocreativa_entry_tags() {
	
	echo get_the_term_list( get_the_id(), 'post_tag', '<div class="entry-tags">', ', ', '</div>' );
}
endif;
