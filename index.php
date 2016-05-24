<?php
/**
* @package WordPress
* @subpackage themename
*/
$blog_id = get_option('page_for_posts'); get_header(); ?>

<div class="mid-cont mobile-mid-cont">
	<div class="amenities-head-block first-row">
		<div class="column">
			<h2><?php echo get_the_title($blog_id); ?></h2>
			<?php $post = get_post( $blog_id ); ?>
			<p>
				<?php echo $post->post_content; ?>
			</p>
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


<?php $post = get_post( $blog_id ); $post->post_content; ?>
<?php get_template_part( 'loop', 'index' ); ?>
</div>
<?php $second_row = get_field('text_column_2');
if ($second_row) { ?>
<hr>
<div class="mid-cont">
	<div class="one-column-cont">
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

<?php get_footer(); ?>