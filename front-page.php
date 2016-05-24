<?php get_header(); ?>

<div id="home-cont">
	<div class="mid-cont mobile-mid-cont" >
		<h2 class="span8"><?php the_field("tagline") ?></h2>
		<p class="span8"><?php the_field("body") ?></p>
	</div>
</div>
<div class='tiles wider-cont home-page'>
	<?php query_posts( array( 'post_type' => 'page', 'post__in' => array( 70, 130, 62, 74, 96 ), 'orderby' => 'post__in', 'order' => 'ASC') ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<a href="<?php the_permalink(); ?>">
		<div class="tile">

			<div class="thumbnail"><?php the_post_thumbnail("full"); ?></div>
			<h3 class="franklin-gothic-demi"><?php the_field('heading_for_homepage_cta'); ?></h3>
        	<h4><?php the_field('text_for_homepage_cta'); ?> </h4>
        	<div class="cta-plus" >
        		<div class="plus-sign-wrapper">
	        		<img src="<?php echo get_template_directory_uri(); ?>/images/cta-plus-sign-sprite.gif">
	        	</div>
	        </div>

    	</div>
 	 </a>
  <?php endwhile; wp_reset_query(); ?>
</div>

<?php get_footer(); ?>
