<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package undercustomz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- favicon -->
  <link rel="icon" type="image/png" href="<?php echo get_site_icon_url( '512', get_stylesheet_directory_uri() . "/img/favicon.png", 0 ); ?>">

  <!-- extra stylesheets -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/aos.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.min.css" rel="stylesheet">

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@100..900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <div id="site" class="site <?php echo (is_front_page() ? " frontpage " : " otherpage "); ?>">

    <header id="site-header" class="site-header">

      <div class="header-topbar">
        <div class="container-fluid px-lg-5 py-2">
          <div class="row">

            <div class="col-12 col-lg-6 d-none d-lg-block">
              <div class="social-menu list-inline ">
                <?php if ( has_nav_menu( 'menu-social' ) ) { wp_nav_menu( array('theme_location' => 'menu-social') ); } ?>
              </div>
            </div>

            <div class="col-12 col-lg-6 text-end">
              <div class="contact-info d-inline-block pe-4">
                <?php $phone_mod = ( !empty(get_theme_mod('undercustomz_contact_info_phone')) ) ? get_theme_mod('undercustomz_contact_info_phone') : '+1 123 456 7890' ; ?>
                <i class="fa fa-phone"></i> <a href="tel:<?php echo $phone_mod; ?>"><?php echo $phone_mod; ?></a>
              </div>
              <div class="contact-info d-inline-block">
                <?php $email_mod = ( !empty(get_theme_mod('undercustomz_contact_info_email')) ) ? get_theme_mod('undercustomz_contact_info_email') : 'youremail@mail.com' ; ?>
                <i class="fa fa-envelope"></i> <a href="mailto:<?php echo $email_mod; ?>"><?php echo $email_mod; ?></a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="header-main">
        <div class="container-fluid px-lg-5 py-2">
          <div class="row no-gutters">

            <div class="col-12 col-lg-auto order-1 order-lg-1">
              <div class="site-branding">
                <?php
                if (has_custom_logo()) :
                  $logo_img = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                  $logo_img = $logo_img[0];
                else :
                  $logo_img = get_stylesheet_directory_uri() . "/img/logo.png";
                endif;
                ?>
                <a class="logo" href="<?php echo site_url(); ?>">
                  <img src="<?php echo $logo_img; ?>" alt="">
                  <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt=""> -->
                </a>
                <!-- <h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h2> -->
                <!-- <p class="site-tagline"><?php echo get_bloginfo('description', 'display'); ?></p> -->
              </div>
            </div>

            <div class="col-12 col-lg order-2 order-lg-2">
              <nav id="site-navigation" class="navbar navbar-expand-md navbar-light justify-content-end">
                <div class="containerxxx">
                  <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                  <div class="collapse navbar-collapse" id="main-menu">
                    <?php
                      wp_nav_menu(array(
                        'theme_location' => 'menu-primary',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                      ));
                    ?>
                  </div>
                </div>
              </nav>
            </div>

            <div class="col-12 col-lg-auto order-3 order-lg-3">
              <div class="pt-2 text-end">
                <button id="search_btn" class="btn btn-default search-toggler" type="button"> <i class="fa fa-search"></i> </button>
                <a class="btn btn-primary" href="<?php echo site_url(); ?>/contact/">Contact</a>
                <div class="woo-cart-box d-inline-block">
                  <?php if ( class_exists( 'WooCommerce' ) ) { undercustomz_woocommerce_header_cart(); } ?>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

      <div id="search">
        <span class="close"></span>
        <?php //echo get_search_form( $echo ); ?>
        <form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>">
          <div class="input-group">
            <input type="search" class="search-field" placeholder="Search..." value="" name="s">
            <span class="input-group-btn"><button type="submit" class="search-btn"> <i class="fa fa-search"></i> </button></span>
          </div>
        </form>
      </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">

