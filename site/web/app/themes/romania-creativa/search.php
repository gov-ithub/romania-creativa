<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package rocreativa
 * @since 0.1
 */

get_header(); ?>

<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'rocreativa' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'rocreativa' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
		
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'components/post/content', 'excerpt' );

			endwhile;

			/* Pagination */
			get_template_part( 'components/navigation/pagination', get_post_type() );

		else : ?>

			<div class="no-results"><p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rocreativa' ); ?></p></div>
			<?php
				get_search_form();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
		if ( rocreativa_has_sidebar() )
			get_sidebar();
	?>

</div><!-- .wrap -->

<?php get_footer();
