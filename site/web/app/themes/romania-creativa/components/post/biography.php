<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="author-info">

	<div class="author-description">
		<div class="author-avatar">
			<?php
				echo get_avatar( get_the_author_meta( 'user_email' ), 48 );
			?>
		</div><!-- .author-avatar -->
		<h2 class="author-title"><span class="author-heading"><?php _e( 'Author:', 'rocreativa' ); ?></span> <?php echo get_the_author(); ?></h2>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'rocreativa' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->
