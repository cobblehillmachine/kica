<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); $classes = get_body_class();
if (in_array('category_events',$classes)) {?>
	<div class="sidebar-content categories mobile-mid-cont">
		<div class="sidebar-content-1">
			<h3>Announcements Categories</h3>
			<?php echo get_the_category_list(); ?>
		</div>
	</div>
	<hr class="mobile">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="mid-cont mobile-mid-cont announcement">
		<div class="single-announcement">
			<span class="kepler-bold-italic"><?php echo get_the_date("n/j/Y"); ?></span>
			<h2 class="announcement-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<h3>Posted In <?php echo the_category(", "); ?></h3>
			<?php the_content(); ?>
		</div>

	</div>
	<hr>
	<?php endwhile; wp_reset_query(); ?>

<?php } else { ?>

	<hr class="mobile">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="mid-cont mobile-mid-cont announcement" >
		<div class="single-announcement single-event">
			<span class="kepler-bold-italic"><?php echo get_the_date("n/j/Y"); ?></span>
			<h2 class="announcement-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		</div>

	</div>
	<hr class="events-archive">
	<?php endwhile; wp_reset_query(); ?>
<?php } ?>

<?php get_footer();