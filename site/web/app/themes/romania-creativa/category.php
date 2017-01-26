<?php
/**
 * Category template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rocreativa
 * @since 0.1
 */

$color 		= get_term_meta( get_queried_object_id(), 'color', true );

if ( empty($color) ) {
	$color = 'inherit';
}

get_header(); ?>

<div class="wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title" style="color: ' . $color . ';">', '</h1>' );
					the_archive_description( '<div class="page-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>
		
<?php

// check if the repeater field has rows of data
if( have_rows('fapte_cifre', 'category_' . get_queried_object_id() ) ): ?>

	<div class="separator"></div>
	
	<div class="section-subtitle"><?php _e( 'Fapte si cifre', 'rocreativa' ); ?></div>
	<h1 class="section-title"><?php _e( 'Fapte si cifre', 'rocreativa' ); ?></h1>

	<div class="fact-list">
<?php
	// loop through the rows of data
	while ( have_rows('fapte_cifre', 'category_' . get_queried_object_id() ) ) : the_row();
?>
	<article class="hentry fact">
		<h1 class="entry-title"><?php the_sub_field('title'); ?></h1>
		<div class="entry-content"><?php the_sub_field('content'); ?></div>
		<?php
			if ( get_sub_field( 'source' ) ) : ?>
			<a class="source" <?php if ( get_sub_field( 'source_link' ) ) : ?> href="<?php the_sub_field( 'source_link' ); ?>" target="_blank" <?php endif; ?>>
				<span class="meta-label"><?php _e( 'Source:', 'rocreativa' ); ?></span>
				<span class="name"><?php the_sub_field( 'source' ); ?></span>
				<?php if ( get_sub_field( 'source_meta' ) ) : ?>
				<span class="meta-mdash">&mdash;</span>
				<span class="meta"><?php the_sub_field( 'source_meta' ); ?></span>
				<?php endif; ?>
			</a>
		<?php endif; ?>
	</article>

<?php
	endwhile;
?>
		</div><!-- .fact-list -->
<?php
	
endif;

?>


		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
		if ( rocreativa_has_sidebar() )
			get_sidebar( 'category' );
	?>

</div><!-- .wrap -->


<?php
// Query for case studies and show them if we have any
$args = array(
	'category__in' 		=> array( get_queried_object_id() ),
	'post_type' 			=> 'case_study',
	'posts_per_page' 	=> 3,
);

$studies = new WP_Query( $args );
if ( $studies->have_posts() ) :

?>

<section class="casestudies-area">
<div class="wrap">
	
	<div class="separator"></div>
	
	<div class="section-subtitle"><?php _e( 'Cazuri de succes', 'rocreativa' ); ?></div>
	<h1 class="section-title"><?php _e( 'Cazuri de succes', 'rocreativa' ); ?></h1>

	<div class="case-list">
	<?php
		while ( $studies->have_posts() ) :
			$studies->the_post();
			get_template_part( 'components/case_study/content', 'featured' );
		endwhile;
	?>
	</div><!-- .case-list -->

</div><!-- .wrap -->
</section><!-- .casestudies-area -->

<?php
endif;

// Restore the original query
wp_reset_query();
?>


<?php
// Query for contacts and show them if we have any
$args = array(
	#'category__in' 		=> array( get_queried_object_id() ),
	'post_type' 			=> 'contact',
	'posts_per_page' 	=> 3,
);

$contacts = new WP_Query( $args );
#if ( $contacts->have_posts() ) :

?>

<section class="contacts-area">
<div class="wrap">
	
	<div class="separator"></div>
	
	<div class="section-subtitle"><?php _e( 'Contacte', 'rocreativa' ); ?></div>
	<h1 class="section-title"><?php _e( 'Contacte', 'rocreativa' ); ?></h1>

	<div class="contact-list">
	<?php
		while ( $contacts->have_posts() ) :
			$contacts->the_post();
			get_template_part( 'components/contact/content', 'featured' );
		endwhile;
	?>
	</div>

</div><!-- .wrap -->
</section><!-- .contacts-area -->

<?php
#endif;

// Restore the original query
wp_reset_query();
?>


<?php get_footer(); ?>