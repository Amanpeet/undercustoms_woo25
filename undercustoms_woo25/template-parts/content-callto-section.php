<?php
/**
 * Template part for displaying callto contact section in pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

?>

<section class="common-section services-section" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/contact-bg.jpg'); background-size: cover;">
  <div class="container py-5">
    <div class="section-title text-whitex mb-4 text-white">
      <h2 class="font-light">Get in Touch Now!</h2>
      <p class="bigp m-0 mb-4">Schedule a time to talk with us now, or fill up <br> the form below to get reply from us. </p>
      <a id="callto_modal" class="btn btn-primary" href="<?php echo site_url(); ?>/contact/"> <i class="fa fa-paper-plane"></i> Contact us</a>
    </div>
  </div>
</section>

