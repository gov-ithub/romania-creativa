<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rocreativa
 * @since 0.1
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="page-description">', '</div>' );
			?>
		</header><!-- .page-header -->
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