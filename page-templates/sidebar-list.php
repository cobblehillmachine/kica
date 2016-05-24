<?php
/**
 * Template Name: Sidebar List
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="mid-cont mobile-mid-cont">
	<div class="one-column-cont standard first-row">
		<div class="column">
			<h2><?php the_field("heading_1"); ?></h2>
			<?php the_content(); ?>

		</div>
	</div>
	<div class="sidebar-content standard">
		<div class="sidebar-content-1">
		<?php if (is_page('130')) { ?>
			<hr class="mobile">
			<h3>Categories</h3>
			 <?php wp_list_categories('orderby=name&exclude=14,15,16,17,24&hide_empty=0&title_li='); ?>
		<?php }  else {?>
			<?php the_field("sidebar_content_1"); ?>
		<?php } ?>
		</div>
	</div>



<?php if (is_page('130')) { ?>
 	<?php
	 $sticky = get_option( 'sticky_posts' );
	 
	 $sticky_args = array(
	    'post_type' => 'announcement',
	    'post__in'  => $sticky
	);
	$args = array('post_type' => 'announcement', 'posts_per_page' => '-1', 'order_by' => 'post_date', 'order' => 'DESC', 'post__not_in' => $sticky);
		 	
// 	echo get_announcements($sticky_args);
	 echo get_announcements($args);
	 	
	 	
	 	
	 	
	 	
	 	
 	?>
<?php } ?>
</div>
<?php $second_row = get_field('text_column_2');
if ($second_row) { ?>
<hr>
<div class="mid-cont">
	<div class="one-column-cont second-row">
		<div class="column">
			<h2><?php the_field("heading_2"); ?></h2>
			<p><?php the_field("text_column_2"); ?></p>
		</div>
	</div>
	<div class="sidebar-content">
		<div class="sidebar-content-1"><?php the_field("sidebar_content_2"); ?></div>
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




<?php endwhile; wp_reset_query(); ?>
<?php get_footer();	?>