<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

get_header();
?>

<main id="primary" class="site-main">

  <div class="titlemon">
    <div class="container">
      <div class="text-center">
        <h1 class="entry-title"> <?php echo get_the_title(); ?> </h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-ghost">
    <div class="container py-4">
      <div class="row">

        <!-- <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
          <?php //get_sidebar(); ?>
        </div> -->

        <div class="col-md col-lg page-content">
          <?php
          while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'page' );
            // If comments are open or we have at least one comment, load up the comment template.
            // if ( comments_open() || get_comments_number() ) :
            //   comments_template();
            // endif;
          endwhile; // End of the loop.
          ?>
        </div>

      </div>
    </div>
  </section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
