<?php
/**
 * Template part for displaying contacts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rocreativa
 * @since 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner">
	
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
			<?php the_post_thumbnail( 'rocreativa-thumbnail-contact' ); ?>
		</a>
	</figure><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-summary">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-summary -->

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->

	</div>
</article><!-- #post-## -->
