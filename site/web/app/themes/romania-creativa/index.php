<?php
/**
 * Main template
 *
 * @package rocreativa
 * @since 0.1
 */

get_header(); ?>

<div class="wrap">

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
		<header class="page-header">
			<h2 class="page-title"><?php _e( 'Posts', 'rocreativa' ); ?></h2>
		</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'components/post/content', get_post_type() );

			endwhile;
			
			/* Pagination */
			get_template_part( 'components/navigation/pagination', get_post_type() );

		else :

			get_template_part( 'components/post/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
		if ( rocreativa_has_sidebar() )
			get_sidebar();
	?>

</div><!-- .wrap -->

<?php get_footer(); ?>