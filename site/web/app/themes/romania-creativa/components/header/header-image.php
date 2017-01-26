<?php
/**
 * Displays header image
 *
 * @package rocreativa
 * @since 0.1
 */

?>
<div class="custom-header">

	<div class="custom-header-image">
		<?php the_custom_header_markup(); ?>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
