<?php
/**
 * Template Name: Main Subpage
 */

get_header(); ?>
<?php if (is_page(13)) {?>
	<div class='mid-cont mobile-mid-cont'>
	<div class="main-subpage-cont">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_field("heading"); ?></h2>
			<div class="columnize"><?php the_content(); ?></div>
		<?php endwhile; wp_reset_query(); ?>
		
	</div>
</div>
<?php } else {?>
<div class='mid-cont mobile-mid-cont'>
	<div class="main-subpage-cont">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_field("heading"); ?></h2>
			<?php 
			$column_2 = get_field("column_2_text");
			if( $column_2) { ?>
				<div class="column-1"><?php the_content(); ?></div>
				<div class="column-2"><?php the_field("column_2_text"); ?></div>
			<?php } else { ?>
				<div class="column"><?php the_content(); ?></div>
			<?php } ?>	
		<?php endwhile; wp_reset_query(); ?>
		
	</div>
</div>
<?php } ?>

<div class="main-subpage-ctas wide-cont">
	<div class="tiles">
		<?php 
		$page = get_the_ID();
		query_posts( array( 'post_type' => 'page', 'post_parent' => $page, 'orderby' => 'menu_order', 'order' => 'ASC', 'post__not_in' => array( 680 )) ); ?>
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


<?php get_footer();	?>