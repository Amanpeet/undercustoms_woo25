<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<main id="primary" class="site-main">

  <!-- <div class="titlemon">
    <div class="container">
      <div class="text-start">
        <h1 class="entry-title"> <?php woocommerce_page_title(); ?> </h1>
      </div>
    </div>
  </div> -->

  <section class="page-section bg-light py-5 woocustoms-single">
    <div class="container">
      <div class="row">

        <div class="col-md col-lg page-content py-4">
          <?php woocommerce_content(); ?>
        </div>

        <!-- <div class="col-md-3 col-lg-3 sidebar pe-lg-5">
          <?php //get_sidebar(); ?>
        </div> -->

      </div>
    </div>
  </section>
</main><!-- #main -->


<?php
get_footer( 'shop' );
