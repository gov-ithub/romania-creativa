<?php
/**
 * Search form template
 *
 * @package rocreativa
 * @since 0.1
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) );

?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'rocreativa' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'rocreativa' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><span><?php echo _x( 'Search', 'submit button', 'rocreativa' ); ?></span></button>
</form>