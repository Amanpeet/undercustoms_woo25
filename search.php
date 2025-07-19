<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

        <!-- <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
          <?php //get_sidebar(); ?>
        </div> -->

        <div class="col-md col-lg page-content">
          <?php if ( have_posts() ) : ?>

            <header class="page-header">
              <h3 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'undercustomz' ), '<span>' . get_search_query() . '</span>' );
                ?>
              </h3>
            </header><!-- .page-header -->

            <?php
            /* Start the Loop */
            while ( have_posts() ) :
              the_post();

              /**
               * Run the loop for the search to output the results.
               * If you want to overload this in a child theme then include a file
               * called content-search.php and that will be used instead.
               */
              get_template_part( 'template-parts/content', 'search' );

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
get_sidebar();
get_footer();
