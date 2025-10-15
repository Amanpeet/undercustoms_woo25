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
        <h1 class="entry-title"> <?php woocommerce_page_title(); ?> </h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-light py-5 woocustoms-archive">
    <div class="container">
      <div class="row">

        <div class="col-md-3 col-lg-3 sidebar pe-lg-4">
          <?php get_sidebar(); ?>
        </div>

        <div class="col-md col-lg page-contentxxx">
          <?php woocommerce_content(); ?>
        </div>

      </div>
    </div>
  </section>
</main><!-- #main -->

<?php
get_footer();
