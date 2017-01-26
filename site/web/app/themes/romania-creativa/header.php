<?php
/**
 * Header template
 *
 * @package rocreativa
 * @since 0.1
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rocreativa' ); ?></a>

	<header id="masthead" class="site-header">
		
		<div class="screen-wrap">
		
		<?php get_template_part( 'components/header/site', 'branding' ); ?>
		
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'components/navigation/menu', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>
		
		</div>
	
		<div class="coloured-separator"></div>
	
	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">