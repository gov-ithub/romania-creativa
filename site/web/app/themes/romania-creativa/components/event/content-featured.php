<?php
/**
 * Template part for displaying featured events
 *
 * @package rocreativa
 * @since 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'event-featured' ); ?>>
	
	<?php if ( get_the_post_thumbnail() ) : ?>
	<figure class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'rocreativa-event-featured' ); ?>
			<?php
				$categories = get_the_category();
				$category 	= $categories[0];
				
				$color 			= get_term_meta( $category->term_id, 'color', true );
			?>
			<span class="category" style="background-color: <?php echo esc_attr( $color ); ?>"><?php echo $category->name; ?></span>
			<header>
				<span class="event-date"><?php echo get_post_meta( get_the_id(), '_event_start_date', true ); ?></span>
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<span class="event-more"><?php _e( 'Vezi detalii <span class="rarr">&rarr;</span>', 'rocreativa' ); ?></span>
			</header>
		</a>
	</figure><!-- .post-thumbnail -->
	<?php endif; ?>

</article><!-- #post-## -->
