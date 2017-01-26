<?php
/**
 * Displays top navigation menu
 *
 * @package rocreativa
 * @since 0.1
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php _e( 'Top Menu', 'rocreativa' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php _e( 'Menu', 'rocreativa' ); ?></button>
	<?php wp_nav_menu( array(
		'theme_location' 	=> 'top',
		'menu_id' 				=> 'top-menu',
		'container' 			=> '',
		'depth' 					=> 0,
	) ); ?>
</nav><!-- #site-navigation -->
