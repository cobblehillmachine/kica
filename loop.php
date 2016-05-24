<?php
/**
* @package WordPress
* @subpackage themename
*/
?>


<?php if( have_posts() ){ // START THE LOOP. IF THERE ARE POSTS

  while ( have_posts() ) : the_post();  // THEN LOOP THROUGH THEM

  if( is_search() ){
    $title = ucfirst( str_replace( '-', ' ', $post->post_type ) );
    $title = $title.': '.get_the_title( $post->ID );
  } else {
    $title = get_the_title( $post->ID );
  } ?>

<article class="announcement-wrapper" role="article">
  <hr>
  <div class="single-announcement list">
    <header class="post-header">

      <div class="kepler-bold-italic">
          <?php echo get_the_date( 'm/d/Y', $id );?>
      </div>
      <h2 class="blog-title" role="heading">
        <a href="<?php the_permalink(); ?>" title="Read more of <?php the_title(); ?>"><?php echo $title; ?></a>
      </h2>

      <h3>Posted In <?php the_category( ', ' );?></h3>

      </header>

      <div class="entry summary">
        <?php wpautop(the_content()); ?>
      </div>
  </div>

</article>



<?php endwhile; // END LOOP

}  // END LOOP CONDITIONAL

  if (  $wp_query->max_num_pages > 1 ) : ?>
  <nav class="post-nav" role="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Posts', 'themename' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer Posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
  </nav>
  <?php endif; ?>