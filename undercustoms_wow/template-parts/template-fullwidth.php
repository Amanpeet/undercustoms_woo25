<?php
/**
 * Template Name: Full-width (no sidebar)
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
        <h1 class="entry-title"> <?php the_title(); ?> </h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-ghost">
    <div class="container py-4">
      <div class="row">

        <div class="col-md col-lg page-content">
          <?php
            while ( have_posts() ) : the_post();
              the_content();
            endwhile; // End of the loop.
          ?>
        </div>

      </div>
    </div>
  </section>

  <!-- Output custom html -->
  <?php Undercustoms_Custom_HTML_Field::output(); ?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
