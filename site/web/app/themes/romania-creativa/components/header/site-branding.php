<?php
/**
 * Displays header site branding
 *
 * @package rocreativa
 * @since 0.1
 */

?>
<div class="site-branding">
	<div class="wrap">

		<div class="site-branding-text">
		
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/rocreativa-logo.png" width="364" height="57" alt="<?php bloginfo( 'name' ); ?>"/>
			</a></h1>

		</div><!-- .site-branding-text -->

	</div><!-- .wrap -->
</div><!-- .site-branding -->
