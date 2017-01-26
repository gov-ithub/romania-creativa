<?php
/**
 * Displays the default navigation for single posts
 *
 * @package rocreativa
 * @since 0.1
 */

the_post_navigation( array(
	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous post', 'rocreativa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Read next:', 'rocreativa' ) . '</span> <span class="nav-title">%title</span>',
	'next_text' => '<span class="screen-reader-text">' . __( 'Next post', 'rocreativa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous:', 'rocreativa' ) . '</span> <span class="nav-title">%title</span>',
) );