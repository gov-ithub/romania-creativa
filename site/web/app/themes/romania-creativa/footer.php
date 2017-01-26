<?php
/**
 * Footer template
 *
 * @package rocreativa
 * @since 0.1
 */

?>

		</div><!-- #content -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer">

		<?php
		get_template_part( 'components/footer/footer', 'widgets' );
		?>
		
		<div class="wrap meta-wrap">
			
			<?php get_template_part( 'components/footer/site', 'branding' ); ?>
			
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php _e( 'Footer Links Menu', 'rocreativa' ); ?>">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-links-menu',
						'depth'          => 1,
					) );
				?>
			</nav><!-- .footer-navigation -->
			<?php endif; ?>
			
			<?php get_template_part( 'components/footer/site', 'meta' ); ?>
			
		</div><!-- .wrap -->

		<?php
			get_template_part( 'components/footer/site', 'info' );
		?>
		
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>