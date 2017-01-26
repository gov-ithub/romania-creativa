<?php
/**
 * Template part for displaying featured case studies
 *
 * @package rocreativa
 * @since 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study-featured' ); ?>>

	<?php if ( get_the_post_thumbnail() ) : ?>
	<figure class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'rocreativa-case-study-featured' ); ?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<?php
				$categories = get_the_category();
				$category 	= $categories[0];
				
				$color 			= get_term_meta( $category->term_id, 'color', true );
			?>
			<span class="category" style="background-color: <?php echo esc_attr( $color ); ?>"><?php echo $category->name; ?></span>
		</a>
	</figure><!-- .post-thumbnail -->
	<?php endif; ?>

</article><!-- #post-## -->
