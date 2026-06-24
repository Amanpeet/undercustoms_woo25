<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package undercustomz
 */

get_header();
?>

<main id="primary" class="site-main">

  <div class="titlemon">
    <div class="container">
      <div class="text-center">
        <h1 class="entry-title"> 404, Not Found! </h1>
      </div>
    </div>
  </div>

  <section class="page-section bg-light">
    <div class="container text-center py-4">

      <header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'undercustomz' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'undercustomz' ); ?></p>
				<?php get_search_form(); ?>
			</div>

    </div>
  </section>

</main><!-- #main -->

<?php
get_footer();
