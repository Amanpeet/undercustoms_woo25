<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package undercustomz
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function undercustomz_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'undercustomz_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function undercustomz_woocommerce_scripts() {
	wp_enqueue_style( 'undercustomz-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'undercustomz-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'undercustomz_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function undercustomz_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'undercustomz_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function undercustomz_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'undercustomz_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'undercustomz_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function undercustomz_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'undercustomz_woocommerce_wrapper_before' );

if ( ! function_exists( 'undercustomz_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function undercustomz_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'undercustomz_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'undercustomz_woocommerce_header_cart' ) ) {
			undercustomz_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'undercustomz_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function undercustomz_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		undercustomz_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'undercustomz_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'undercustomz_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function undercustomz_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'undercustomz' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'undercustomz' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'undercustomz_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function undercustomz_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php undercustomz_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * TWEAKS
 */


/**
 * Display Woocommerce sidebar
 *
 * @return void
 */
function undercustomz_register_woocommerce_sidebar() {
  register_sidebar( array(
    'name'          => 'WooCommerce Sidebar',
    'id'            => 'woocommerce-sidebar',
    'description'   => 'This sidebar will only appear on WooCommerce pages.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'undercustomz_register_woocommerce_sidebar' );

//replace sidebar
function undercustomz_replace_woocommerce_sidebar() {
  if ( is_woocommerce() ) {
    if ( is_active_sidebar( 'woocommerce-sidebar' ) ) {
      dynamic_sidebar( 'woocommerce-sidebar' );
    }
  }
}
add_action( 'woocommerce_sidebar', 'undercustomz_replace_woocommerce_sidebar' );


// Change the OnSale Badge Text
function undercustomz_woo_sale_flash() {
	return '<span class="onsale">' . esc_html__( 'Sale', 'text_domain' ) . '</span>';
}
// add_filter( 'woocommerce_sale_flash', 'undercustomz_woo_sale_flash' );


// Change the Number of Displayed Related Products
function undercustomz_woo_related_posts_per_page( $args ) {
  $args['posts_per_page'] = 4;
  return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'undercustomz_woo_related_posts_per_page' );


// Change the Product Gallery Thumbnail Columns
function undercustomz_woo_product_thumbnails_columns() {
  return 4;
}
// add_action( 'woocommerce_product_thumbnails_columns', 'undercustomz_woo_product_thumbnails_columns' );


//Change number or products per row
function undercustomz_woo_shop_columns( $columns ) {
	return 3;
}
// add_filter( 'loop_shop_columns', 'undercustomz_woo_shop_columns' );


// Add correct body class for shop columns
// ENABLE THIS IF 4 PRODUCTS PER ROW
function undercustomz_woo_shop_columns_body_class( $classes ) {
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		$classes[] = 'columns-4';
	}
	return $classes;
}
// add_filter( 'body_class', 'undercustomz_woo_shop_columns_body_class' );


// Change number of products that are displayed per page (shop page)
function undercustomz_woo_posts_per_page( $cols ) {
  return 20;
}
// add_filter( 'loop_shop_per_page', 'undercustomz_woo_posts_per_page' );


// Change the Next & Previous Pagination Arrows
function undercustomz_woo_pagination_args( $args ) {
  $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
  $args['next_text'] = '<i class="fa fa-angle-right"></i>';
  return $args;
}
// add_filter( 'woocommerce_pagination_args', 'undercustomz_woo_pagination_args' );

