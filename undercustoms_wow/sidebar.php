<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package undercustomz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

  <?php
    if ( class_exists( 'WooCommerce' ) ) {
      if ( is_woocommerce() || is_shop() || is_product_category() || is_product() ) {
        if ( is_active_sidebar( 'woocommerce-sidebar' ) ) {
          dynamic_sidebar( 'woocommerce-sidebar' );
        }
      } else {
        if ( is_active_sidebar( 'sidebar-1' ) ) {
          dynamic_sidebar( 'sidebar-1' );
        }
      }
    } else {
      dynamic_sidebar( 'sidebar-1' );
    }
  ?>
</aside><!-- #secondary -->

