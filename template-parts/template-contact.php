<?php
/**
 * Template Name: Contact Us
 *
 * This is the template that displays full width page without sidebar
 *
 * @package undercustomz
 */

get_header(); ?>

<main id="primary" class="site-main">

  <div class="titlemon">
    <div class="container">
      <div class="text-center">
        <h1 class="entry-title"> <?php echo get_the_title(); ?> </h1>
      </div>
    </div>
  </div>

  <section class="common-section bg-light">
    <div class="container">
      <div class="row g-lg-5">

        <div class="col-md-6">
          <div class="card card-body h-100">
            <h5> <strong>Reach us</strong> </h5>
            <p>We realize the value of your time. Please email us or contact us via the following methods below to get a guaranteed reply from us.</p>

            <h5 class="card-title"> <i class="fa fa-phone"></i> <strong>Phone</strong></h5>
            <?php $phone_mod = ( !empty(get_theme_mod('undercustomz_contact_info_phone')) ) ? get_theme_mod('undercustomz_contact_info_phone') : 'Set Phone in Customize' ; ?>
            <p class="card-text mb-4"> <a href="tel:<?php echo $phone_mod; ?>"><?php echo $phone_mod; ?></a> </p>

            <h5 class="card-title"> <i class="fa fa-envelope"></i> <strong>Email</strong></h5>
            <?php $email_mod = ( !empty(get_theme_mod('undercustomz_contact_info_email')) ) ? get_theme_mod('undercustomz_contact_info_email') : 'Set Email in Customize' ; ?>
            <p class="card-text"> <a href="mailto:<?php echo $email_mod; ?>"><?php echo $email_mod; ?></a> </p>

            <h5 class="card-title"> <i class="fa fa-map-marker"></i> <strong>Address</strong></h5>
            <?php $address_mod = ( !empty(get_theme_mod('undercustomz_contact_info_address')) ) ? get_theme_mod('undercustomz_contact_info_address') : 'Set Address in Customize' ; ?>
            <p class="card-text"> <?php echo $address_mod; ?> </p>

          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-body h-100">
            <h5> <strong>Get in Touch For Business Enquiry Or Support</strong> </h5>
            <?php $contact_form_mod = ( !empty(get_theme_mod('undercustomz_contact_info_contact_form')) ) ? get_theme_mod('undercustomz_contact_info_contact_form') : 'Set  Shortcode in Customize' ; ?>
            <?php echo do_shortcode($contact_form_mod); ?>
            <?php //echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="maps" class="common-section pt-0 bg-light">
    <div class="container">
      <div class="map mb-5">
        <h5> <i class="fa fa-map-marker"></i> <strong>Location</strong> </h5>
        <div class="img-thumbnail">
          <?php $contact_map = ( !empty(get_theme_mod('undercustomz_contact_info_map_iframe')) ) ? get_theme_mod('undercustomz_contact_info_map_iframe') : 'Set Address in theme options' ; ?>
          <?php echo $contact_map; ?>
        </div>
        <!-- <iframe src="xxx" frameborder="0" style="width: 100%; height: 400px; border:1px solid #ccc; display:block;" allowfullscreen></iframe> -->
      </div>
    </div>
  </section>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
