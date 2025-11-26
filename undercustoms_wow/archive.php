<?php
/**
 * The template for displaying archive pages
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
      <h1 class="entry-title"> <?php the_archive_title(); ?> </h1>
      <?php the_archive_description( '<p class="archive-description">', '</p>' ); ?>
    </div>
  </div>
</div>

<section class="page-section bg-ghost">
  <div class="container py-4">
    <div class="row">

      <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
        <?php get_sidebar(); ?>
      </div>

      <div class="col-md col-lg page-content">
        <?php
          /* Start the Loop */
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
              /*
              * Include the Post-Type-specific template for the content.
              * If you want to override this in a child theme, then include a file
              * called content-___.php (where ___ is the Post Type name) and that will be used instead.
              */
              get_template_part( 'template-parts/content', get_post_type() );
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
