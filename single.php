<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont announcement">
	<div class="single-page">
		<span class="kepler-bold-italic"><?php echo get_the_date("n/j/Y"); ?></span>
		<h2 class="announcement-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<h3>Posted In <?php echo the_category(", "); ?></h3>
		<?php the_content(); ?>
	</div>
	<!--
<div class="sidebar-content">

		<div class="sidebar-content-1">
			<h3>Categories</h3>
			<?php echo get_the_category_list(); ?>
		</div>
	</div>
-->
</div>
<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
