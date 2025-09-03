<?php
/**
 * Template part for items in blog or category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

?>

<div class="card blog-item h-100 bg-white shadow-cardxx">
  <a class="d-block" href="<?php the_permalink() ?>">
    <?php if ( has_post_thumbnail() ) { ?>
      <?php
        $thumb_img = get_the_post_thumbnail_url(get_the_ID());
        $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
      ?>
      <img class="card-img-top" src="<?php echo $thumb_img; ?>" alt="<?php echo $alt_text; ?>">
    <?php } else { ?>
      <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg" alt="placeholder image">
    <?php } ?>
    <div class="card-body p-4">
      <!-- <h5> <?php //the_category( ', ' ); ?> </h5>    -->
      <h5 class="card-title"> <strong><?php the_title(); ?></strong> </h5>
      <p class="card-text"><?php echo excerpt(20); ?></p>
      <!-- <a class="btn btn-primary btn-sm" href="<?php the_permalink() ?>">Read More</a> -->
    </div>
  </a>
</div>

