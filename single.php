<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package undercustomz
 */

get_header();
?>

<main id="primary" class="site-main">

  <div class="titlemon bg-light pb-3" style="background-image: none;">
    <div class="container">
      <div class="text-start">
        <h1 class="entry-title text-dark mb-0"><small> <?php echo get_the_title(); ?> </small></h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-light pt-4">
    <div class="container">
      <div class="row">

        <div class="col-md col-lg page-contentxxx">

          <!-- <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
            <?php //get_sidebar(); ?>
          </div> -->

          <?php
          while ( have_posts() ) :
            the_post();
            ?>
              <div class="card card-body p-4">
                <?php
                  // get_template_part( 'template-parts/content', get_post_type() );
                  get_template_part( 'template-parts/content', 'singlepost' );
                  // the_content();
                ?>
              </div>

              <div class="post-nav">
                <?php the_post_navigation(); ?>
              </div>

              <div class="post-comments mt-4">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
                ?>
              </div>
            <?php
          endwhile; // End of the loop.
          ?>
        </div>

      </div>

      <div class="post-extras py-5">
        <div class="section-title">
          <h4 class="mb-0"> Related Posts </h4>
          <span class="line"></span>
        </div>
        <?php get_template_part( 'template-parts/content', 'related' ); ?>
      </div>

    </div>
  </section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
