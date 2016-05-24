<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); the_post(); ?>

<div class='mid-cont mobile-mid-cont'>
  <div class="main-subpage-cont">

      <h2><?php the_field("heading"); ?></h2>
      <?php
      $column_2 = get_field("column_2_text");
      if( $column_2) { ?>
        <div class="column-1"><?php the_content(); ?></div>
        <div class="column-2"><?php the_field("column_2_text"); ?></div>
        <?php } else { ?>
          <div class="column"><?php the_content(); ?></div>
          <?php } ?>
        <?php  ?>

      </div>
    </div>

<?php get_footer(); ?>