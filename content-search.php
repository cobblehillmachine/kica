<?php
/**
 * The template for displaying a post as search results
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div class="search-result-wrapper <?php echo get_post_type() ?>">
	<a href="<?php the_permalink(); ?>">
		<div class="search-result mobile-mid-cont">
			<h2 class="kepler-italic"><?php the_title(); ?></h2>
			<p><?php echo (get_the_excerpt()); ?></p>
			<p class="button-wrapper"><a class=" button keep-reading" href="<?php the_permalink(); ?>">Continue Reading</a></p>
		</div>
	</a>
	<hr>
</div>

