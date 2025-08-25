<?php
/**
 * Template Name: Testimonials Page
 *
 * This is the template that displays full width page without sidebar
 *
 * @package undercustomz
 */

get_header(); ?>

<main id="primary" class="site-main">

  <div class="titlemon">
    <div class="container">
      <div class="text-center">
        <h1 class="entry-title"> <?php echo get_the_title(); ?> </h1>
      </div>
    </div>
  </div>

  <section class="common-section bg-light">
    <div class="container">
      <div class="mb-4 bigp">
        <?php
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'page' );
          endwhile; // End of the loop.
        ?>
      </div>

      <div class="mb-5 mx-auto" style="max-width: 1000px;">
        <!-- custom post loop -->
        <?php
          $args = array(
            'posts_per_page' => 99,
            'post_type'      => 'site_testimonials',
            'orderby'        => 'date',
            'order'          => 'DESC',
          );
        ?>
        <?php query_posts($args); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="card testimonial-card mb-5">
            <div class="card-icon text-center pt-4 pb-0">
              <?php if ( has_post_thumbnail() ) { ?>
                <?php
                  $thumb_img = get_the_post_thumbnail_url(get_the_ID());
                  $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                ?>
                <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo $thumb_img; ?>" alt="<?php echo $alt_text; ?>">
              <?php } else { ?>
                <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/img/user.jpg" alt="user image">
              <?php } ?>
              <span class="quoty"><i class="fa fa-2x fa-quote-left"></i></span>
            </div>
            <div class="card-body text-center">
              <!-- <p class="card-text"> <?php //echo the_content(); ?> </p> -->
              <p class="card-text"> <?php echo get_the_content(); ?> </p>
              <h6 class="card-title mt-4 mb-3"> <strong><?php the_title(); ?></strong> </h6>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>

    </div>
  </section>

  <!-- DISPLAY CALLTO SECTION -->
  <?php get_template_part('template-parts/content', 'callto-section'); ?>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
