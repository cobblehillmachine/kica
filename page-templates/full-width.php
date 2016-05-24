<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class='mid-cont mobile-mid-cont'>
	<div class="full-width-cont">

		<?php the_content(); ?>

		<?php if ( is_page('70')) { ?>
		<div class="responsive-container">
			<script type="text/javascript"
src="http://www.earthcam.com/js/embed.php?type=h264&vid=6320.flv&w=auto&company=Kiawah%20Island%20Community%20Association&timezone=America/New_York&metar=KCHS&ecn=1">
</script>
		</div>
		<?php } ?>
		<?php if ( is_page('72')) { ?>

			<form id="js-get-directions">
			  <ul>
			    <li><input type="text" id="js-address" placeholder="Insert an address and press search&hellip;" /></li>
          <li><button type="submit">Search</button></li>
			  </ul>
			</form>

			<div id="map-canvas"></div>
		<?php } ?>
	</div>
</div>

<?php $bottom_value = get_field('bottom_content');
if ($bottom_value) { ?>
<div class="bottom-wrapper">
	<div class="bottom-cont mid-cont mobile-mid-cont">
		<h2><?php the_field("bottom_content_header"); ?></h2>
		<div class="bottom-content-1"><?php the_field("bottom_content"); ?></div>
	</div>
</div>
<?php } ?>

<?php endwhile; wp_reset_query(); ?>
<?php get_footer();
