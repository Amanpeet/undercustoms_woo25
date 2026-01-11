<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

get_header();
?>

<div id="frontpage" class="frontpage-area">

  <section id="hero" class="hero-section">
    <?php get_template_part('template-parts/content', 'homepageslider'); ?>
  </section>

  <section id="banner" class="banner-section">
    <video class="banner-video" playsinline autoplay muted loop poster="<?php echo site_url(); ?>/wp-content/uploads/2026/01/diamonds.jpg">
      <source src="<?php echo site_url(); ?>/wp-content/uploads/uploads/2026/01/diamonds.mp4" type="video/mp4">
    </video>
    <div class="container">
      <div class="banner-text text-center">
        <h1> Brilliance Reimagined <br> <span>Ethical. Elegant. Eternal.</span> </h1>
        <p> Discover the beauty of lab-grown diamonds - real diamonds crafted with science, sustainability, and soul.  </p>
        <a class="btn btn-primary" href="#"> SHOP NOW </a>
      </div>
    </div>
  </section>

  <section class="common-section bg-transparent p-0">
    <div class="container">
      <div class="row g-0 justify-content-center">

        <div class="col-md-4 col-lg-4">
          <div class="h-100 text-center bg-primary">
            <img class="p-3" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/icon1.png" alt="items1" width="250">
            <div class="p-4">
              <h4 class="text-dark font-light mb-3"> New Arrivals </h4>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4">
          <div class="h-100 text-center bg-dark">
            <img class="p-3" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/icon2.png" alt="items2" width="250">
            <div class="p-4">
              <h4 class="text-white font-light mb-3"> Best Sellers </h4>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4">
          <div class="h-100 text-center bg-secondary">
            <img class="p-3" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/icon3.png" alt="items3" width="250">
            <div class="p-4">
              <h4 class="text-dark font-light mb-3"> Clearance Sale </h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="common-section bg-transparent border-topxx">
    <div class="container py-4">
      <div class="row" data-aos="fade-up">

        <div class="col-md col-lg pe-lg-5">
          <div class="section-title pt-3">
            <h6 class="text-color"> About us  </h6>
            <h3> We are Undercustomz Shop </h3>
            <span class="line"></span>
          </div>
          <p class="bigp">Eco-friendly paper containers and boxes designed for food service, produce, and catering crafted to meet today's environmental and safety standards. Manufactured to meet U.S. food safety and regulatory standards. Suitable for hot and cold foods, fresh produce, takeout, and catering. </p>
          <ul class="list-unstyled bigp">
            <li class="mb-2"> <i class="fa fa-coffee fa-fw fa-2x text-primary"></i> <strong>100% Organic Material </strong></li>
            <li class="mb-2"> <i class="fa fa-recycle fa-fw fa-2x text-primary"></i> <strong>Recycle Friendly</strong> </li>
            <li class="mb-2"> <i class="fa fa-check-circle fa-fw fa-2x text-primary"></i> <strong>High Quality Items</strong> </li>
          </ul>
          <div class="pt-2 mb-4">
            <a class="btn btn-color" href="<?php echo site_url(); ?>/about/"> Know More </a>
          </div>
        </div>

        <div class="col-md-4 col-lg-5">
          <img class="w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about.jpg" alt="">
        </div>

      </div>
    </div>
  </section>

  <section class="common-section bg-white border-topxx">
    <div class="container pb-4">
      <div class="section-title text-center mb-4">
        <h6 class="text-color"> Our Products </h6>
        <h3><strong> Shop Now </strong></h3>
        <span class="line"></span>
      </div>

      <div class="row">
        <!-- woocommerce loop -->
        <?php
        // The tax query
        $tax_query[] = array(
          'taxonomy' => 'product_visibility',
          'field' => 'name',
          'terms' => 'featured',
          'operator' => 'IN', // or 'NOT IN' to exclude feature products
        );
        // The query
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'posts_per_page' => 12,
          'orderby' => 'rand',
          'order' => 'ASC',
          // 'tax_query'      => $tax_query, //only if using above tax query
          // 'product_cat'    => 'shoes',
          // 'product_tag' 	 => 'fashion',
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
          while ($loop->have_posts()):
            $loop->the_post();
            ?>
            <div class="col-sm-6 col-md-3 mb-4">
              <div class="card product-card h-100">
                <a href="<?php echo get_permalink(); ?>"><img class="card-img-top zoom-this" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" /></a>
                <div class="card-body text-center d-nonex">
                  <h6 class="card-title"><a href="<?php echo get_permalink(); ?>"><strong><?php echo $product->get_title(); ?></strong></a></h6>
                </div>
              </div>
            </div>
            <?php
          endwhile;
        } else {
          echo __('No products found');
        }
        wp_reset_postdata();
        ?>

      </div>

      <div class="text-center pt-5">
        <a class="btn btn-dark" href="<?php echo site_url(); ?>/shop/"> View All Products </a>
      </div>

    </div>
  </section>

  <section class="common-section bg-ghost border-topxx" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/bg-how.jpg'); background-size: cover;">
    <div class="container py-5">
      <div class="section-title text-center mb-4">
        <h6 class="text-color"> PROCESS </h6>
        <h3> How to Order </h3>
        <span class="line"></span>
      </div>
      <div class="row g-4 g-lg-5x justify-content-center" data-aos="fade-up">

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon mb-3">
              <i class="fa fa-check-to-slot fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-2"><small class="d-block opacity-25">Step 1</small> Choose Products  </h5>
              <p class="card-text text-muted">Select Products of your interest. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon mb-3">
              <i class="fa fa-file-alt fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-2"><small class="d-block opacity-25">Step 2</small> Fill Up Form </h5>
              <p class="card-text text-muted"> Send your contact info to us. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon mb-3">
              <i class="fa fa-headset fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-2"><small class="d-block opacity-25">Step 3</small> We'll Call You </h5>
              <p class="card-text text-muted"> We will contact you shortly. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon mb-3">
              <i class="fa fa-boxes fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-2"><small class="d-block opacity-25">Step 4</small> Finalize Order </h5>
              <p class="card-text text-muted"> Receive Order after finalization. </p>
            </div>
          </div>
        </div>

      </div>
      <!-- <div class="text-center mt-5">
        <a class="btn btn-color" href="<?php echo site_url(); ?>/services/"> Know More </a>
      </div> -->
    </div>
  </section>

  <section class="common-section bg-white border-topxx">
    <div class="container py-5">
      <div class="row">

        <div class="col-lg-4">
          <div class="section-title pt-lg-4">
            <h6 class="text-color"> Top Quality </h6>
            <h3> Eco-Friendly Items </h3>
            <span class="line"></span>
          </div>
          <p class="bigpx"> Our packaging solutions combine durability, food safety, and environmental responsibility without compromising performance. </p>
          <ul class="list-unstyled bigp">
            <li> <i class="fa fa-check-circle"></i> Eco-Friendly Materials </li>
            <li> <i class="fa fa-check-circle"></i> Food-Safe & Compliant </li>
            <li> <i class="fa fa-check-circle"></i> Versatile Product Range </li>
          </ul>
          <div class="pt-3 mb-4">
            <a class="btn btn-color" href="<?php echo site_url(); ?>/contact/"> Get Quote </a>
          </div>
        </div>

        <div class="col-lg-1">
          <!-- spacer -->
        </div>

        <div class="col-lg pe-lg-5">
          <div class="section-titlexx pt-lg-4">
            <h4 class="mb-4"> Black Containers </h4>
            <div class="row">
              <!-- woocommerce loop -->
              <?php
              // The query
              $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'rand',
                'order' => 'ASC',
                'product_cat' => 'black-containers',
              );
              $loop = new WP_Query($args);
              if ($loop->have_posts()) {
                while ($loop->have_posts()):
                  $loop->the_post();
                  ?>
                  <div class="card product-card border-0 mb-4">
                    <div class="row align-items-center">
                      <div class="col-4">
                        <a href="<?php echo get_permalink(); ?>"><img class="rounded-3 w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" /></a>
                      </div>
                      <div class="col-8">
                        <div class="card-bodyx">
                          <h6 class="card-title"><a href="<?php echo get_permalink(); ?>"><?php echo $product->get_title(); ?></a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                endwhile;
              } else {
                echo __('No products found');
              }
              wp_reset_postdata();
              ?>

            </div>
          </div>
        </div>

        <div class="col-lg pe-lg-5">
          <div class="section-titlexx pt-lg-4">
            <h4 class="mb-4"> Clear Containers </h4>
            <div class="row">
              <!-- woocommerce loop -->
              <?php
              // The query
              $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'rand',
                'order' => 'ASC',
                'product_cat' => 'clear-containers',
              );
              $loop = new WP_Query($args);
              if ($loop->have_posts()) {
                while ($loop->have_posts()):
                  $loop->the_post();
                  ?>
                  <div class="card product-card border-0 mb-4">
                    <div class="row align-items-center">
                      <div class="col-4">
                        <a href="<?php echo get_permalink(); ?>"><img class="rounded-3 w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" /></a>
                      </div>
                      <div class="col-8 ">
                        <div class="card-bodyx">
                          <h6 class="card-title"><a href="<?php echo get_permalink(); ?>"><?php echo $product->get_title(); ?></a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                endwhile;
              } else {
                echo __('No products found');
              }
              wp_reset_postdata();
              ?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="common-section bg-dark border-topxx" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/bg-why.jpg'); background-size: cover;">
    <div class="container py-4">
      <div class="section-title mb-3 text-center">
        <h6 class="text-light"> WHY US </h6>
        <h3 class="text-white"><strong> Why people choose us? </strong></h3>
        <span class="line"></span>
      </div>

      <div class="row text-center">
        <div class="col-md-3">

          <div class="why-item p-4 mb-4">
            <div class="card-icon p-3">
              <i class="fa fa-boxes fa-4x text-accent"></i>
            </div>
            <div class="card-body">
              <h2 class="text-white"> 399+ </h2>
              <p class="lead text-light"> Products </p>
            </div>
          </div>

        </div>
        <div class="col-md-3">

          <div class="why-item p-4 mb-4">
            <div class="card-icon p-3">
              <i class="fa fa-list fa-4x text-accent"></i>
            </div>
            <div class="card-body">
              <h2 class="text-white"> 29+ </h2>
              <p class="lead text-light"> Categories </p>
            </div>
          </div>

        </div>
        <div class="col-md-3">

          <div class="why-item p-4 mb-4">
            <div class="card-icon p-3">
              <i class="fa fa-calendar-alt fa-4x text-accent"></i>
            </div>
            <div class="card-body">
              <h2 class="text-white"> 12+ </h2>
              <p class="lead text-light"> Years Experience </p>
            </div>
          </div>

        </div>
        <div class="col-md-3">

          <div class="why-item p-4 mb-4">
            <div class="card-icon p-3">
              <i class="fa fa-plane-circle-check fa-4x text-accent"></i>
            </div>
            <div class="card-body">
              <h2 class="text-white"> 83+ </h2>
              <p class="lead text-light"> Imports </p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <section class="common-section bg-ghost border-top">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-6 pr-md-5" data-aos="fade-right">
          <div class="section-title mb-2">
            <h6 class="text-primary">Contact us</h6>
            <h3><strong>Get in Touch</strong> </h3>
            <span class="line"></span>
          </div>
          <p class="bigp">We realize the value of your time. Please email us or contact us via the following methods below to get a guaranteed reply from us.</p>
          <p class="bigp">
            <strong>Write us</strong> <br>
            <?php $email_mod = ( !empty(get_theme_mod('undercustomz_contact_info_email')) ) ? get_theme_mod('undercustomz_contact_info_email') : 'Set Email in theme options' ; ?>
            <i class="fa fa-envelope"></i> <?php echo $email_mod; ?>
          </p>
          <p class="bigp">
            <strong>Call us</strong> <br>
            <?php $phone_mod = ( !empty(get_theme_mod('undercustomz_contact_info_phone')) ) ? get_theme_mod('undercustomz_contact_info_phone') : 'Set Phone in theme options' ; ?>
            <i class="fa fa-phone"></i> <?php echo $phone_mod; ?>
          </p>
        </div>
        <div class="col-md-6" data-aos="fade-left">
          <div class="card shadow-card">
            <div class="card-body homepage-form p-4">
              <h5>Write to us </h5>
              <?php echo do_shortcode('[fluentform id="1"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="common-section bg-gradient border-topxx">
    <div class="container py-4">
      <div class="row">

        <div class="col-md-5 pe-lg-5">
          <div class="section-title text-white mb-4">
            <h6 class="text-light"> Testimonials </h6>
            <h3> What our Customers say </h3>
            <span class="line"></span>
            <p class="bigp">Eco-friendly paper containers and boxes designed for food service, produce, and catering crafted to meet today's environmental and safety standards. </p>
            <a class="btn btn-light" href="<?php echo site_url(); ?>/testimonials/"> Read More </a>
          </div>
        </div>

        <div class="col-md-7 ps-lg-5 px-4" data-aos="fade-up">
          <!-- Slider main container -->
          <div id="owl-uno" class="owl-carousel">
            <!-- custom post loop -->
            <?php
              $args = array(
                'posts_per_page' => 6,
                'post_type'      => 'site_testimonials',
                'orderby'        => 'date',
                'order'          => 'DESC',
                );
            ?>
            <?php query_posts($args); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="owl-item">
                <div class="card testimonial-card">
                  <div class="card-icon text-center pt-4">
                    <?php if ( has_post_thumbnail() ) { ?>
                      <?php
                        $thumb_img = get_the_post_thumbnail_url(get_the_ID());
                        $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                      ?>
                      <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo $thumb_img; ?>" alt="<?php echo $alt_text; ?>">
                    <?php } else { ?>
                      <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/img/user.jpg" alt="user image">
                    <?php } ?>
                    <span class="quoty"><i class="fa fa-quote-left"></i></span>
                  </div>
                  <div class="card-body text-center">
                    <!-- <p class="card-text"> <?php //echo the_content(); ?> </p> -->
                    <p class="card-text px-4"> <?php echo excerpt(100); ?> </p>
                    <h6 class="card-title mt-4 mb-3"> <strong><?php the_title(); ?></strong> </h6>
                  </div>
                </div>
              </div>
            <?php endwhile; endif; ?>

          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="common-section bg-light border-top">
    <div class="container py-4">
      <div class="section-title text-center mb-4">
        <h6 class="text-primary">Updates</h6>
        <h3> Latest Blogs </h3>
        <span class="line"></span>
      </div>
      <div class="blog-posts">
        <div class="row g-lg-5" data-aos="fade-up">
          <?php
          // TO SHOW THE PAGE CONTENTS
          $args = array(
            'posts_per_page' => 3,
            // 'category_name' => 'exercises',
            'orderby' => 'date',
            'order' => 'DESC'
          );
          query_posts($args);
          while (have_posts()) : the_post();
            ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <?php get_template_part('template-parts/content', 'item'); ?>
            </div>
            <?php
          endwhile;
          wp_reset_query();
          ?>
        </div>
      </div>
      <div class="text-center pt-2">
        <a class="btn btn-dark" href="<?php echo site_url(); ?>/blog/"> View More </a>
      </div>
    </div>
  </section>


</div>

<?php
get_footer();
