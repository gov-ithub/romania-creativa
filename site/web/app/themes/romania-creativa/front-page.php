<?php
/**
 * Front page template
 *
 * @package rocreativa
 * @since 0.1
 */

get_header(); ?>


<div id="hero">
<div class="wrap">

	<section class="section jumbotron theme-black">
		<h1 class="section-title"><?php _e( 'The First Map of Romanian Cultural and Creative Industries', 'rocreativa' ); ?></h1>
		<div class="section-content">
			<a class="btn large" href="#"><?php _e( 'Intră în comunitate', 'rocreativa' ); ?></a>
		</div>
	</section><!-- .jumbotron -->

</div><!-- .wrap -->
</div><!-- #hero -->


<div id="categories">
<div class="wrap">

	<section class="section categories">
		<div class="section-subtitle"><?php _e( 'Romania Creativă', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Industrii creative', 'rocreativa' ); ?></h1>
		
		<ul class="category-list">
		<?php
			$categories = get_terms( 'category', array(
				'hide_empty' 		=> true,
				'hierarchical' 	=> false,
			) );
			
			foreach ( $categories as $category ) :
				$color 		= get_term_meta( $category->term_id, 'color', true );
				$image_id = get_term_meta( $category->term_id, 'image', true );
				
				if ( empty($color) ) {
					$color = '#000';
				}
				
		?>
		
			<li class="category">
				<a class="title" href="<?php echo get_term_link( $category ); ?>" style="background-color: <?php echo esc_attr( $color ); ?>"><span class="separator"></span><span class="name"><?php echo $category->name; ?></span></a>
				
				<div class="details">
					
					<div class="intro">
						<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); /* category-icon */ ?>
						<div class="name"><?php echo $category->name; ?></div>
						<div class="description"><?php echo wpautop( $category->description ); ?></div>
						
						<?php
							// Query for case studies and show them if we have any
							$args = array(
								'category__in' 		=> array( $category->term_id ),
								'post_type' 			=> 'case_study',
								'posts_per_page' 	=> 3,
							);
							
							$studies = new WP_Query( $args );
							if ( $studies->have_posts() ) :
						
						?>
						<div class="section-subtitle"><?php _e( 'Cazuri de success', 'rocreativa' ); ?></div>
						<ul class="casestudies" style="color: <?php echo esc_attr( $color ); ?>">
							<?php while ( $studies->have_posts() ) : $studies->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></li>
							<?php endwhile; ?>
						</ul><!-- .casestudies -->
						<?php
							endif;
							
							// Restore the original query
							wp_reset_query();
						?>
						
					</div><!-- .intro -->
					
					<div class="stats" style="background-color: <?php echo esc_attr( $color ); ?>">
						<div class="section-subtitle"><?php _e( 'Fapte și cifre', 'rocreativa' ); ?></div>
						<div class="section-content">
							<div class="description"><?php echo wpautop( $category->description ); ?></div>
							<a class="btn outline" href="<?php echo get_term_link( $category ); ?>"><?php _e( 'Află mai multe', 'rocreativa' ); ?></a>
						</div>
					</div><!-- .stats -->
					
				</div><!-- .details -->
			</li>
		
		<?php
			endforeach;
		?>
		</ul><!-- .category-list -->
		
		<div class="category-info"></div><!-- .category-info -->
			
	</section><!-- .categories -->

</div><!-- .wrap -->
</div><!-- #categories -->


<div id="latest">
<div class="wrap">

	<section class="section events">
		<div class="separator"></div>
		<div class="section-subtitle"><?php _e( 'Evenimente', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Evenimente', 'rocreativa' ); ?></h1>
		
		<ul class="event-list">
		<?php
			// Query for case studies and show them if we have any
			$args = array(
				'post_type' 			=> 'event',
				'posts_per_page' 	=> 6,
			);
			
			$events = new WP_Query( $args );
			while ( $events->have_posts() ) : $events->the_post();
		?>
			<li><?php get_template_part( 'components/event/content', 'featured' ); ?></li>
		<?php
			endwhile;
		?>
		</ul><!-- .event-list -->
		
	</section><!-- .events -->

	<section class="section news">
		<div class="separator"></div>
		<div class="section-subtitle"><?php _e( 'Noutăți', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Noutati & Știri', 'rocreativa' ); ?></h1>
		
		<ul class="post-list">
			<?php
				while ( have_posts() ) : the_post();
			?>
			<li>
			<article <?php post_class(); ?>>
				<header class="entry-header">
				<?php
					rocreativa_entry_date();
					rocreativa_entry_title();
				?>
				</header>
				<div class="entry-summary"><?php the_excerpt(); ?></div>
			</article>
			</li>
			<?php
				endwhile;
			?>
		</ul><!-- .posts -->
		
	</section><!-- .news -->

</div><!-- .wrap -->
</div><!-- #latest -->


<?php
// Query for case studies and show them if we have any
$args = array(
	'post_type' 			=> 'case_study',
	'posts_per_page' 	=> 3,
);

$studies = new WP_Query( $args );
if ( $studies->have_posts() ) :

?>

<div id="casestudies">
<div class="wrap">

	<section class="section casestudies">
		<div class="section-subtitle"><?php _e( 'Cazuri de succes', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Cazuri de succes', 'rocreativa' ); ?></h1>
		
		<ul class="casestudy-list">
			<?php while ( $studies->have_posts() ) : $studies->the_post(); ?>
			<li><?php get_template_part( 'components/case_study/content', 'featured' ); ?></li>
			<?php endwhile; ?>
		</ul><!-- .casestudy-list -->
		
	</section><!-- .casestudies -->

</div><!-- .wrap -->
</div><!-- #casestudies -->


<?php
endif;

// Restore the original query
wp_reset_query();
?>


<div id="updates">
<div class="wrap">
	
	<section class="section jobs">
		<div class="section-subtitle"><?php _e( 'Job-uri', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Job-uri', 'rocreativa' ); ?></h1>
		
		<ul class="job-list">
		<?php
			// Query for case studies and show them if we have any
			$args = array(
				'post_type' 			=> 'job_listing',
				'posts_per_page' 	=> 7,
			);
			
			$studies = new WP_Query( $args );
			while ( $studies->have_posts() ) : $studies->the_post();
		?>
			<li>
			<article <?php post_class(); ?>>
			<a href="<?php the_permalink(); ?>">
				<span class="title"><?php the_title(); ?></span>
				<span class="meta-sep at">@</span>
				<span class="company-name"><?php echo get_post_meta( get_the_id(), '_company_name', true ); ?></span>
				<span class="meta-sep per">/</span>
				<span class="location"><?php echo get_post_meta( get_the_id(), '_job_location', true ); ?></span>
			</a>
			</article>
			</li>
		<?php
			endwhile;
		?>
		</ul><!-- .job-list -->
		
		<p class="more">
			<a class="btn outline" href="<?php echo get_permalink( get_option( 'job_manager_jobs_page_id' ) ) ?>"><?php _e( 'Vezi toate job-urile', 'rocreativa' ); ?></a>
		</p>
		
	</section><!-- .jobs -->

	<section class="section community">
		<div class="section-subtitle"><?php _e( 'Live feed', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( 'Comunitate', 'rocreativa' ); ?></h1>
		
		<ul class="activity-list">
		<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>
		<?php while ( bp_activities() ) : bp_the_activity(); ?>
		
		<?php locate_template( array( 'buddypress/activity/entry.php' ), true, false ); ?>
		
		<?php endwhile; ?>
		<?php endif; ?>
		</ul><!-- .activity-list -->
		
	</section><!-- .community -->
	
</div><!-- .wrap -->
</div><!-- #updates -->


<div id="join">
<div class="wrap">
	
	<section class="section join theme-black">
		<div class="section-subtitle"><?php _e( 'Alatura-te celor peste', 'rocreativa' ); ?></div>
		<h1 class="section-title"><?php _e( '210,270 Creativi Români', 'rocreativa' ); ?></h1>
		<div class="section-content">
			<a class="btn large" href="#"><?php _e( 'Intră în comunitate', 'rocreativa' ); ?></a>
		</div>
	</section><!-- .join -->
	
</div><!-- .wrap -->
</div><!-- #join -->


<div id="partners">
<div class="wrap">
	
	<section class="section partners">
		<h1 class="section-title"><?php _e( 'Parteneri', 'rocreativa' ); ?></h1>
	</section><!-- .partners -->
	
</div><!-- .wrap -->
</div><!-- #partners -->


<?php get_footer(); ?>