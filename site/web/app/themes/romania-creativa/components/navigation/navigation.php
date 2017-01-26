<?php
/**
 * Displays single post navigation
 *
 * @package rocreativa
 * @since 0.1
 */

the_post_navigation( array(
	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'rocreativa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous:', 'rocreativa' ) . '</span> <span class="nav-title">%title</span>',
	'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'rocreativa' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next:', 'rocreativa' ) . '</span> <span class="nav-title">%title</span>',
) );