<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="search-results-cont">

	<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); 
				
				get_template_part( 'content', 'search' ); ?>
				
			<?php endwhile; ?>

		<?php else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
	?>
</div>

<?php get_footer(); ?>
