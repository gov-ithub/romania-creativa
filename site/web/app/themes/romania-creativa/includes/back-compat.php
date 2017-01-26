<?php
/**
 * Backwards compatibility functionality
 *
 * Prevents this theme from running on unsupported WordPress versions
 *
 * @package rocreativa
 * @since 0.1
 */

/**
 * Prevent switching on unsupported versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 0.1
 */

add_action( 'after_switch_theme', 'rocreativa_back_compat_switch_theme' );

function rocreativa_back_compat_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'rocreativa_back_compat_upgrade_notice' );
}


/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * this theme on unsupported WordPress versions.
 *
 * @since 0.1
 *
 * @global string $wp_version WordPress version.
 */

function rocreativa_back_compat_upgrade_notice() {
	$message = sprintf( __( 'This theme requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'rocreativa' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}


/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.6.
 *
 * @since 0.1
 *
 * @global string $wp_version WordPress version.
 */

add_action( 'load-customize.php', 'rocreativa_back_compat_customize' );

function rocreativa_back_compat_customize() {
	wp_die( sprintf( __( 'This theme requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'rocreativa' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}


/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.6.
 *
 * @since 0.1
 *
 * @global string $wp_version WordPress version.
 */

add_action( 'template_redirect', 'rocreativa_back_compat_preview' );

function rocreativa_back_compat_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'This theme requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'rocreativa' ), $GLOBALS['wp_version'] ) );
	}
}
