<?php
/**
 * Template Name: One Column with Side Content
 */

get_header(); the_post();

$side1_value = get_field('sidebar_content_1', $post->ID );
$side2_value = get_field( 'sidebar_content_2', $post->ID );

$classes = get_body_class();?>

<div class="mid-cont">

	<div class="one-column-cont standard mobile-mid-cont">
		<h2><?php the_field("heading"); ?></h2>
		<?php the_content(); ?>
	</div>

	<?php if (in_array('single-event',$classes)) {?>
		<div class="sidebar-content standard mobile-mid-cont">
			<div class="sidebar-content-1">
				<h3>Upcoming Events</h3>
				<?php echo do_shortcode('[events_list limit="5"]<p>#_EVENTDATES: #_EVENTLINK</p>[/events_list]') ?>
			</div>
		</div>
	<?php } ?>

<?php if ($side1_value) {?>
<div class="sidebar-content standard mobile-mid-cont">
	<hr class="mobile">
	<div class="sidebar-content-1"><?php the_field("sidebar_content_1"); ?></div>
<?php } ?>

<?php if ($side2_value) { ?>
	<hr class="desktop">
	<hr class="mobile">
	<div class="sidebar-content-2"><?php the_field("sidebar_content_2"); ?></div>
<?php } ?>

</div>
</div>

<?php if (is_page('15')) {?>
<hr class="news">
<div class="main-subpage-ctas wide-cont">
	<div class="tiles">
		<?php
		$page = get_the_ID();
		query_posts( array( 'post_type' => 'page', 'post_parent' => $page, 'orderby' => 'menu_order', 'order' => 'ASC') ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<a href="<?php the_permalink(); ?>">
			<div class="tile">

				<div class="thumbnail"><?php the_post_thumbnail("full") ?></div>
				<h3 class="franklin-gothic-demi">Learn About...</h3>
				<h4><?php the_title(); ?></h4>
				<div class="cta-plus" >
	        		<div class="plus-sign-wrapper">
		        		<img src="<?php echo get_template_directory_uri(); ?>/images/cta-plus-sign-sprite.gif">
		        	</div>
		        </div>

			</div>
			</a>
		<?php endwhile; wp_reset_query(); ?>
	</div>
</div>
<?php } ?>


<?php $bottom_value = get_field('bottom_content');

if ($bottom_value) { ?>
<div class="bottom-wrapper">
	<div class="bottom-cont mid-cont mobile-mid-cont">
		<h2><?php the_field("bottom_content_header"); ?></h2>
		<div class="bottom-content-1"><?php the_field("bottom_content"); ?></div>
	</div>
</div>
<?php } ?>


<?php get_footer();	?>