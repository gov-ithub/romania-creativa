<?php
/**
 * Displays footer widgets
 *
 * @package rocreativa
 * @since 0.1
 */

// Check if we have widgets
if ( !is_active_sidebar( 'sidebar-2' ) )
	return;

?>

<aside class="footer-widgets">
	<div class="wrap">
	<?php
	if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
		<div class="footer-widgets-1">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	<?php } ?>
	</div><!-- .wrap -->
</aside><!-- .footer-widgets -->
