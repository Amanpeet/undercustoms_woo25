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
    query_posts($args);
    while (have_posts()) : the_post();
      ?>
      <div class="col-md-4">
        <?php
        get_template_part('template-parts/content', 'item');
        ?>
      </div>
      <?php
    endwhile;
    wp_reset_query();
    ?>
  </div>
</div>
