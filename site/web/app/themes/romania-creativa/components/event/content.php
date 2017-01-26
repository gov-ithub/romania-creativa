<?php
/**
 * Template part for displaying events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rocreativa
 * @since 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<?php if ( get_the_post_thumbnail() ) : ?>
	<figure class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'rocreativa-featured-image' ); ?>
		</a>
		<?php if ( get_the_post_thumbnail_caption() ) : ?>
		<figcaption class="wp-caption-text"><?php the_post_thumbnail_caption(); ?></figcaption>
		<?php endif; ?>
	</figure><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rocreativa' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'rocreativa' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer"><?php
		if ( is_singular() )
			edit_post_link( __( 'Edit', 'rocreativa' ) );
	?></footer>

</article><!-- #post-## -->
