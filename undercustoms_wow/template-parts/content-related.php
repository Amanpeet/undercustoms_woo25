<?php
/**
 * Template part for displaying related random posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

?>

<div class="related-posts">
  <div class="row g-lg-5">
    <?php
      // TO SHOW THE PAGE CONTENTS
      $args = array(
        'posts_per_page' => 3,
        // 'category_name' => 'general',
        'orderby' => 'rand',
        'order' => 'DESC'
      );
      // Replace query_posts($args);
      $related_q = new WP_Query( $args );
      if ( $related_q->have_posts() ) {
        while ( $related_q->have_posts() ) {
          $related_q->the_post();
          // existing loop output
          ?>
            <div class="col-md-4">
              <?php get_template_part('template-parts/content', 'item'); ?>
            </div>
          <?php
        }
        wp_reset_postdata();
      }
    ?>
  </div>
</div>
