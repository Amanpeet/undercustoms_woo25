<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
        <h1 class="entry-title"> <?php //echo get_the_title(); ?> Blog </h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-ghost">
    <div class="container py-4">
      <div class="row">

        <!-- <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
          <?php //get_sidebar(); ?>
        </div> -->

        <div class="col-md col-lg-10 mx-auto page-content">
          <?php
            if ( have_posts() ) :

              /* Start the Loop */
              while ( have_posts() ) :
                the_post();

                /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                // get_template_part( 'template-parts/content', get_post_type() );
                get_template_part( 'template-parts/content', 'blogpost' );

              endwhile;

              the_posts_navigation();

            else :

              get_template_part( 'template-parts/content', 'none' );

            endif;
          ?>
        </div>

      </div>
    </div>
  </section>



</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
