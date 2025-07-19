<?php
/**
 * Template part for items in blogpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

?>

<div class="card blogpost-item mb-5">
  <div class="row g-0">
    <div class="col-md-3">
      <a href="<?php the_permalink() ?>">
        <?php if ( has_post_thumbnail() ) { ?>
          <?php
            $thumb_img = get_the_post_thumbnail_url(get_the_ID());
            $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
          ?>
          <img class="card-img cover-img" src="<?php echo $thumb_img; ?>" alt="<?php echo $alt_text; ?>">
        <?php } else { ?>
          <img class="card-img cover-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg" alt="placeholder image">
        <?php } ?>
      </a>
    </div>
    <div class="col-md">
      <div class="card-body">
        <h6 class="card-category d-none"><?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          $cat_link = get_category_link( $categories[0]->term_id );
          $cat_name = $categories[0]->name;
          echo "<a href='$cat_link'>$cat_name</a>";
        }
        ?></h6>
        <h6 class="card-category"><strong><?php the_time('M j, Y') ?></strong></h6>
        <h4 class="card-title"><a href="<?php the_permalink() ?>" class="text-dark"><strong><?php the_title(); ?></strong></a></h4>
        <div class="card-text pl-4">
          <?php echo excerpt(12); ?>
          <!-- <a href="<?php the_permalink() ?>"><strong>Read More</strong></a> -->
        </div>
        <a class="btn btn-primary btn-sm mt-3" href="<?php the_permalink() ?>">Read More</a>
      </div>
    </div>
  </div>
</div>
