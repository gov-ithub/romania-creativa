<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rocreativa
 * @since 0.1
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
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
			
			// If this is a multi author site, show the author biography
			if ( is_multi_author() && post_type_supports( get_post_type(), 'author' ) ) :
				get_template_part( 'components/post/biography' );
			endif;
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

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

<?php

// Get the post categories
$categories 	= wp_get_post_terms( get_the_id(), 'category' );
$category_ids = array();

// Get all the category IDs
foreach ($categories as $category) {
	$category_ids[] = $category->term_id;
}

// Query for posts
$args = array(
	'category__in' 			=> $category_ids,
	'post__not_in' 			=> array( get_the_id() ),
	'post_type' 				=> 'case_study',
	'posts_per_page'		=> 3,
	'caller_get_posts' 	=> 1
);
$studies = new WP_Query( $args );

if ( $studies->have_posts() ):

?>


<div id="related">
<div class="wrap">

	<section class="section related-studies">
		<div class="separator"></div>
		<div class="section-subtitle"><?php _e( 'Mai multe cazuri de succes', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php 
			printf(
				__( 'Cazuri de succes din %s', 'rocreativa' ),
				$categories[0]->name
			); ?></h1>
		
		<div class="case-list">
		<?php
			while ( $studies->have_posts() ) :
				$studies->the_post();
				get_template_part( 'components/case_study/content', 'featured' );
			endwhile;
		?>
		</div><!-- .case-list -->
		
	</section>

</div><!-- .wrap -->
</div><!-- #related -->

<?php
endif;// have_posts
?>

<?php get_footer(); ?>