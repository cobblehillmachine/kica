<?php
/**
 * Template Name: Two Column
 */

get_header(); ?>

<?php if (is_page(18)) { ?>
<div class="mid-cont mobile-mid-cont">
	<div class="two-column-cont">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_field("heading"); ?></h2>		
			<div class="columnize"><?php the_content(); ?></div>
					
		<?php endwhile; wp_reset_query(); ?>

	</div>

</div>

<?php } else { ?>
<div class="mid-cont mobile-mid-cont">
	<div class="two-column-cont">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_field("heading"); ?></h2>		
			<div class="col2 first"><?php the_content(); ?></div>
			<div class="col2"><?php the_field("column_2"); ?></div>
		<?php endwhile; wp_reset_query(); ?>

	</div>

</div>

<?php } ?>
<?php $bottom_value = get_field('bottom_content');
if ($bottom_value) { ?>
<div class="bottom-wrapper">
	<div class="bottom-cont mid-cont">
		<h2><?php the_field("bottom_content_header"); ?></h2>
		<div class="bottom-content-1"><?php the_field("bottom_content"); ?></div>
	</div>
</div>
<?php } ?>


<?php get_footer();	?>