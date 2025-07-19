<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package undercustomz
 */

?>

</div><!-- #content -->

<!-- footer -->
<footer id="site-footer" class="site-footer">
  <div class="footer-top py-5">
    <div class="container">

      <div class="row">
        <div class="col-md-6 col-lg-4 pe-lg-5">
          <div class="footer-logo">
            <?php
            if (has_custom_logo()) :
              $logo_img = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
              $logo_img = $logo_img[0];
            else :
              $logo_img = get_stylesheet_directory_uri() . "/img/logo-wht.png";
            endif;
            ?>
            <a class="logo" href="<?php echo site_url(); ?>">
              <!-- <img src="<?php echo $logo_img; ?>" alt=""> -->
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-wht.png" alt="">
            </a>
          </div>
          <div class="footer-text pt-4">
            <?php $footer_text_mod = ( !empty(get_theme_mod('undercustomz_footer_area_text')) ) ? get_theme_mod('undercustomz_footer_area_text') : 'Set Footer Text in Customize' ; ?>
            <p> <?php echo $footer_text_mod; ?> </p>
          </div>
          <div class="social-menu pt-3">
            <?php if ( has_nav_menu( 'menu-social' ) ) { wp_nav_menu( array('theme_location' => 'menu-social', 'menu_class' => 'list-inline') ); } ?>
          </div>
        </div>

        <div class="col-md-6 col-lg-2">
          <h5 class="footer-title">Browse</h5>
          <div class="footer-menu">
            <?php if ( has_nav_menu( 'menu-footer' ) ) { wp_nav_menu( array('theme_location' => 'menu-footer', 'menu_class' => 'list-unstyled') ); } ?>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 ps-lg-5">
          <h5 class="footer-title">Services</h5>
          <div class="footer-menu">
            <?php if ( has_nav_menu( 'menu-footer-alt' ) ) { wp_nav_menu( array('theme_location' => 'menu-footer-alt', 'menu_class' => 'list-unstyled') ); } ?>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 ps-lg-5">
          <h5 class="footer-title">Get in Touch</h5>
          <div class="footer-text">
            <?php $phone_mod = ( !empty(get_theme_mod('undercustomz_contact_info_phone')) ) ? get_theme_mod('undercustomz_contact_info_phone') : 'Set Phone in Customize' ; ?>
            <?php $email_mod = ( !empty(get_theme_mod('undercustomz_contact_info_email')) ) ? get_theme_mod('undercustomz_contact_info_email') : 'Set Email in Customize' ; ?>
            <?php $address_mod = ( !empty(get_theme_mod('undercustomz_contact_info_address')) ) ? get_theme_mod('undercustomz_contact_info_address') : 'Set Address in Customize' ; ?>
            <ul class="list-unstyled">
              <li><a href="tel:<?php echo $phone_mod; ?>"> <i class="fa fa-phone"></i> <?php echo $phone_mod; ?></a></li>
              <li><a href="mailto:<?php echo $email_mod; ?>"> <i class="fa fa-envelope"></i> <?php echo $email_mod; ?></a></li>
              <li><i class="fa fa-map-marker"></i> <?php echo $address_mod; ?></li>
            </ul>
          </div>
        </div>

        <!-- <div class="col-md-6 col-lg-3">
          <h5 class="footer-title">GET REPLY FROM US</h5>
          <div class="footer-text">
            <p class="mb-0"> <small>LEAVE US YOUR EMAIL FOR EXCLUSIVE NEWS.</small> </p>
            <div class="newsletter-form pt-2">
              <?php //$newsletter_mod = ( !empty(get_theme_mod('undercustomz_newsletter_form')) ) ? get_theme_mod('undercustomz_newsletter_form') : 'Set  Shortcode in Customize' ; ?>
              <?php //echo do_shortcode($newsletter_mod); ?>
              <?php //echo do_shortcode('[contact-form-7 id="30" title="Newsletter form 1"]'); ?>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row py-4">
        <div class="col-lg-6">
          <p class=""> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All Rights Reserved. </p>
        </div>
        <div class="col-lg-6">
          <p class="text-end"> Designed by <a href="http://intiger.com" target="_blank">Intiger Web</a>. </p>
          <div class="copyrights-text">
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>

</div> <!-- #site -->

<!-- Popup Modal -->
<div class="modal fade" id="popupModal1" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Get Reply from us</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="popup-form pt-2 px-lg-5">
          <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- sidebar -->
<!-- <div class="fixed-note">
<div class="note-item">
  <a href="#" title="Email" target="_blank"> <i class="fa fa-envelope"></i> </a>
</div>
<div class="note-item">
  <a href="#" title="Call" target="_blank"> <i class="fa fa-phone"></i> </a>
</div>
<div class="note-item">
  <a href="#" title="WhatsApp" target="_blank"> <i class="fab fa-whatsapp"></i> </a>
</div>
<div class="note-item">
  <a href="#" title="Facebook" target="_blank"> <i class="fab fa-facebook"></i> </a>
</div>
<div class="note-item">
  <a href="#" title="Linkedin" target="_blank"> <i class="fab fa-linkedin"></i> </a>
</div>
<div class="note-item">
  <a href="#" title="Twitter" target="_blank"> <i class="fab fa-twitter"></i> </a>
</div>
</div> -->

<!-- back to top -->
<div class="back-to-top"> <i class="fa fa-chevron-up"></i> </div>

<!-- Final Scripts -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/aos.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fontawesome.all.min.js" async></script>

<script>
jQuery(document).ready(function( $ ) { //noconflicts
  console.log('footer js initilized.');

  //animate on scroll
  AOS.init();

  //STICKY TOPBAR
  $(window).scroll(function(){
    // The total height of the jumbotron
    var scrollTop = $('.header-topbar').outerHeight(true);
    var barHeight=$('.header-main').outerHeight(true);
    // If the user scrolls down
    if($(window).scrollTop() >= scrollTop) {
      // Fix to top
      $( ".header-main" ).addClass( "header-fixed-top" );
      $("body").css("padding-top",barHeight);
    }
    // If the user scrolls back up
    if($(window).scrollTop() < scrollTop){
      // Undo
      $( ".header-main" ).removeClass( "header-fixed-top" );
      $("body").css("padding-top","0px");
    }
  });

  //show popup
  <?php if(is_front_page()){ ?>
    setTimeout(function(){
      // $('#popupModal1').modal('show');
    }, 2000);
  <?php } ?>

  //launch popup
  $(".pop_modal").on("click", function(e){
    e.preventDefault();
    var myModal = new bootstrap.Modal(document.getElementById('popupModal1'));
    myModal.show();
  });

  // Bootstrap menu on hover
  $("#site-navigation .nav.navbar-nav > li ul li.dropdown > a").addClass('dropdown-toggle');
  const $dropdown = $(".dropdown");
  const $dropdownMenu = $(".dropdown-menu");
  $(window).on("load resize", function() {
    if (this.matchMedia("(min-width: 768px)").matches) {
      $dropdown.hover(
        function() {
          const $this = $(this);
          $this.addClass('show');
          $this.children($dropdownMenu).addClass('show');
        },
        function() {
          const $this = $(this);
          $this.removeClass('show');
          $this.children($dropdownMenu).removeClass('show');
        }
      );
    } else {
      $dropdown.off("mouseenter mouseleave");
    }
  });


});
</script>

<?php wp_footer(); ?>
</body>
</html>
