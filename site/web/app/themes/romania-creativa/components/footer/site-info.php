<?php
/**
 * Displays footer site info
 *
 * @package rocreativa
 * @since 0.1
 */

?>
<div class="site-info">
	<div class="wrap">
		<div class="copyright-text">
		<?php
			$site_link = sprintf( '<a href="%s">%s</a>', home_url( '/' ), get_bloginfo( 'name', 'display' ) );
			printf( __( 'Copyright © %d %s', 'rocreativa' ), date( 'Y' ), $site_link );
		?>
		</div>
	</div><!-- .wrap -->
</div><!-- .site-info -->
