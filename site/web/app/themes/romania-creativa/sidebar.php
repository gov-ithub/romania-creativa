<?php
/**
 * Default sidebar template
 *
 * @package rocreativa
 * @since 0.1
 */

// Check if we have widgets
if ( !is_active_sidebar( 'sidebar-1' ) )
	return;

?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
