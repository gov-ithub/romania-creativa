<?php
/**
 * Default category sidebar template
 *
 * @package rocreativa
 * @since 0.1
 */

$color 		= get_term_meta( get_queried_object_id(), 'color', true );

if ( empty($color) ) {
	$color = '#000';
}

?>

<aside id="secondary" class="widget-area">
	
	<section class="widget widget_statistics" style="background-color: <?php echo esc_attr( $color ); ?>">
		<h2 class="widget-title"><?php _e( 'Statistici', 'rocreativa' ); ?></h2>
		
		<?php if ( $sidebar_intro = get_field( 'sidebar_intro', 'category_' . get_queried_object_id() ) ) : ?>
		<div class="intro"><?php echo $sidebar_intro; ?></div>
		<?php endif; ?>
		
		<?php if( have_rows('sidebar_list', 'category_' . get_queried_object_id()) ): ?>
		<span class="list-separator"></span>
		<ul class="list">
			
			<?php while ( have_rows('sidebar_list', 'category_' . get_queried_object_id()) ) : the_row(); ?>
			<li><?php the_sub_field('text'); ?></li>
			<?php endwhile; ?>
			
		</ul>
		<?php endif; ?>
		
	</section><!-- .widget_statistics -->
	
	<?php 
		$docs = get_field('sidebar_docs', 'category_' . get_queried_object_id());
		if ($docs): 
	?>
	
	<section class="widget widget_docs">
		<h2 class="widget-title"><?php _e( 'Documente', 'rocreativa' ); ?></h2>
		<ul>
		<?php foreach( $docs as $doc ): ?>
		<li>
			<a href="<?php echo $doc['url']; ?>">
				<span><?php
					
					if ( $doc['caption'] ) {
						echo $doc['caption'];
					} else {
						echo $doc['filename'];
					}
					
				?></span>
			</a>
		</li>
		<?php endforeach; ?>
		</ul>
	</section><!-- .widget_docs -->
	
	<?php
		endif;
	?>
	
</aside><!-- #secondary -->
