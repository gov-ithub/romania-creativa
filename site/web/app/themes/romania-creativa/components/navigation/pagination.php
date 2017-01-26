<?php
/**
 * Displays posts pagination
 *
 * @package rocreativa
 * @since 0.1
 */

the_posts_pagination( array(
	'prev_text' => __( 'Previous', 'rocreativa' ),
	'next_text' => __( 'Next', 'rocreativa' ),
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rocreativa' ) . ' </span>',
) );