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

  <section id="hero" class="hero-section border-bottom">
    <div class="hero-slider">
      <div id="carouselHeroSlider" class="carousel slide carousel-fade carousel-darkxx" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselHeroSlider" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#carouselHeroSlider" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselHeroSlider" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#carouselHeroSlider" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">

          <!-- <div class="carousel-item active">
            <img src="<?php echo get_template_directory_uri() . '/img/slide1.jpg'; ?>" alt="">
            <div class="carousel-caption">
              <div class="container">
                <div class="caption-box">
                  <h4> Business Consulting </h4>
                  <h2> Making Your Business Idea Come True </h2>
                  <p class="mx-0"> Incubating with prudence — risk taking and pragmatism blended beautifully. </p>
                  <a href="#" class="btn popModal">Get Quote</a>
                </div>
              </div>
            </div>
          </div> -->

          <div class="carousel-item active">
            <img src="<?php echo (!empty(get_theme_mod('undercustomz_slider1_image'))) ? get_theme_mod('undercustomz_slider1_image') : get_template_directory_uri() . '/img/default.jpg'; ?>" alt="">
            <div class="carousel-caption">
              <div class="container">
                <div class="caption-box">
                  <?php echo get_theme_mod('undercustomz_slider1_caption'); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="<?php echo (!empty(get_theme_mod('undercustomz_slider2_image'))) ? get_theme_mod('undercustomz_slider2_image') : get_template_directory_uri() . '/img/default.jpg'; ?>" alt="">
            <div class="carousel-caption">
              <div class="container">
                <div class="caption-box">
                  <?php echo get_theme_mod('undercustomz_slider2_caption'); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="<?php echo (!empty(get_theme_mod('undercustomz_slider3_image'))) ? get_theme_mod('undercustomz_slider3_image') : get_template_directory_uri() . '/img/default.jpg'; ?>" alt="">
            <div class="carousel-caption">
              <div class="container">
                <div class="caption-box">
                  <?php echo get_theme_mod('undercustomz_slider3_caption'); ?>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="carousel-controls">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselHeroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="carousel-overlay">
          <div class="container">
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="common-section bg-white border-topxx">
    <div class="container py-4">
      <div class="row" data-aos="fade-up">
        <div class="col-md-4 col-lg-5">
          <img class="img-thumbnail w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about.jpg" alt="">
        </div>

        <div class="col-md col-lg ps-lg-5">
          <div class="section-title pt-3">
            <h6 class="text-color"> WHO WE ARE  </h6>
            <h3> Professional and Dedicated Consulting Experts. </h3>
            <span class="line"></span>
          </div>
          <p class="bigp">undercustomz was incorporated with a vision of providing what should have been a primary offering by most consulting firms, Quality resources / deliverables, the attribute which has been lost by many in a race towards profitability & headcounts. We still retain it. undercustomz has been assisting clients big or small, that are serious about increasing profits and decreasing costs using practical technology solutions suiting client requisites.  </p>
          <ul class="list-unstyled bigp">
            <li> <i class="fa fa-check-circle text-success"></i> Beguiled and demoralized. </li>
            <li> <i class="fa fa-check-circle text-success"></i> Handle all trouble of work. </li>
            <li> <i class="fa fa-check-circle text-success"></i> Dedicated consulting solutions. </li>
          </ul>
          <div class="pt-2 mb-4">
            <a class="btn btn-primary" href="<?php echo site_url(); ?>/about/"> Know More </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="common-section bg-gradient border-top">
    <div class="container py-5">
      <div class="row" data-aos="fade-up">
        <div class="col-md col-lg ps-lg-5">
          <div class="section-title text-white pt-lg-4">
            <h6 class="text-light"> What is </h6>
            <h3> Virtual Accounting </h3>
            <!-- <span class="line"></span> -->
          </div>
          <p class="bigpx text-white"> A provision of accounting services to a business enterprise through the means of IT enabled devices is referred to as Virtual Accounting. As against traditional hiring of an Accounting Staff in your own office, professional accounting and bookkeeping requirements can be mitigated at a much-reduced cost through the Virtual Accounting system.  </p>
          <ul class="list-unstyled bigpx text-white">
            <li> <i class="fa fa-check-circle text-success"></i> Accounts Payable and Receivable Management </li>
            <li> <i class="fa fa-check-circle text-success"></i> Cash Flow Handling and Budgeting </li>
            <li> <i class="fa fa-check-circle text-success"></i> Financial Ratio Calculation and Evaluation </li>
            <li> <i class="fa fa-check-circle text-success"></i> Banks and Credit Card Reconciliation </li>
            <li> <i class="fa fa-check-circle text-success"></i> and so much more... </li>
          </ul>
          <div class="pt-2 mb-4">
            <a class="btn btn-dark" href="<?php echo site_url(); ?>/virtual-accounting/"> Know More </a>
          </div>
        </div>
        <div class="col-md-4 col-lg-5">
          <img class="img-thumbnail w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="common-section bg-white border-top" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/bg-light.jpg'); background-size: cover;">
    <div class="container py-0">
      <div class="row g-5 pt-4">

        <div class="col-md-5 col-lg-5 pt-5 pe-lg-5">
          <div class="section-title pt-lg-5 mt-lg-5">
            <h6 class="text-color"> WHAT WE DO </h6>
            <h3><strong> Many Years of Experience in Consulting Services. </strong></h3>
            <span class="line"></span>
            <p> Unlike traditional consulting firms, undercustomz has dissolved seamlessly within our clients culture, we have become an integral part of their process. We have not lost a single client in the last years. </p>
            <a class="btn btn-primary" href="<?php echo site_url(); ?>/services/"> View More </a>
          </div>
        </div>

        <div class="col-md-7 col-lg-7 ps-lg-5">
          <div class="row">
            <div class="col-md-6">

              <div class="card shadow-card p-4 mb-4">
                <div class="card-icon px-4">
                  <i class="fa fa-star fa-3x text-color"></i>
                </div>
                <div class="card-body">
                  <h4 class="card-title"> Enterprise Mobility </h4>
                  <p class="card-text">undercustomz has been assisting clients big or small, that are serious about increasing profits.  </p>
                </div>
              </div>

              <div class="card shadow-card p-4 mb-4">
                <div class="card-icon px-4">
                  <i class="fa fa-star fa-3x text-color"></i>
                </div>
                <div class="card-body">
                  <h4 class="card-title"> Enterprise / Web Portal </h4>
                  <p class="card-text"> undercustomz has been assisting clients big or small, that are serious about decreasing costs.  </p>
                </div>
              </div>

            </div>
            <div class="col-md-6 pt-5">

              <div class="card shadow-card p-4 mb-4 mt-lg-5">
                <div class="card-icon px-4">
                  <i class="fa fa-star fa-3x text-color"></i>
                </div>
                <div class="card-body">
                  <h4 class="card-title"> Microsoft Dynamics </h4>
                  <p class="card-text">undercustomz has been assisting clients big or small, that are serious about decreasing costs.  </p>
                </div>
              </div>

              <div class="card shadow-card p-4 mb-4">
                <div class="card-icon px-4">
                  <i class="fa fa-star fa-3x text-color"></i>
                </div>
                <div class="card-body">
                  <h4 class="card-title"> Ecommerce & Storefronts </h4>
                  <p class="card-text"> undercustomz has been assisting clients big or small, that are serious about decreasing costs.  </p>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="common-section bg-ghost border-top">
    <div class="container py-5">
      <div class="section-title text-center mb-4">
        <h6 class="text-color"> WORK PROCESS </h6>
        <h3> How undercustomz works? </h3>
        <span class="line"></span>
      </div>
      <div class="row g-4 g-lg-5x justify-content-center" data-aos="fade-up">

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon">
              <i class="fa fa-handshake fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-3"><span class="d-block opacity-25">1.</span> Make Discovery Call </h5>
              <p class="card-text text-muted">Meet with our sales consultant to determine our customized solutions to your problems.   </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon">
              <i class="fa fa-book fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-3"><span class="d-block opacity-25">2.</span> Prepare Documentation </h5>
              <p class="card-text text-muted"> Post setting initial goals, we follow strong documentation involving drafts.   </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon">
              <i class="fa fa-user-tie fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-3"><span class="d-block opacity-25">3.</span> Choosing the Plan </h5>
              <p class="card-text text-muted"> We select the best suitable accountant for the Business Enterprise.  </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="cardx shadow-cardx p-4x text-center h-100">
            <div class="card-icon px-4 iconmon">
              <i class="fa fa-file-contract fa-3x text-color"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title mb-3"><span class="d-block opacity-25">4.</span> Enjoy Profits </h5>
              <p class="card-text text-muted">We have developed a web-based and mobile application based IT enabled platform. </p>
            </div>
          </div>
        </div>

      </div>
      <!-- <div class="text-center mt-5">
        <a class="btn btn-primary" href="<?php echo site_url(); ?>/services/"> Know More </a>
      </div> -->
    </div>
  </section>

  <section class="common-section bg-light border-top">
    <div class="container py-5">
      <div class="section-title text-center mb-4">
        <h6 class="text-color"> FAQ </h6>
        <h3> Frequently Asked Questions </h3>
        <span class="line"></span>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-lg-6">

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion1">
                  1.	What is the process of preparing Books of Accounts at undercustomz?
                </button>
              </h2>
              <div id="accordion1" class="accordion-collapse collapse">
                <div class="accordion-body">
                  The Specialised accountant at undercustomz will prepare and maintain the books of accounts for your business with the data provided by the customer.
                  All the customer needs is to provide the documents and data so that it can be entered in the Accounting software.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion2">
                  2.	How do I provide the documents for Accounting?
                </button>
              </h2>
              <div id="accordion2" class="accordion-collapse collapse">
                <div class="accordion-body">
                  You can provide us the documents either by: <br>
                  1.	Scanning the documents and uploading it on to the Customer Portal from your computer/ laptop with the user id provided to you. <br>
                  2.	Clicking the picture of the documents from your smartphone and uploading it directly through the undercustomz Mobile application.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion3">
                  3.	What documents are needed for Accounting?
                </button>
              </h2>
              <div id="accordion3" class="accordion-collapse collapse">
                <div class="accordion-body">
                  The requirement of the documents depend upon the nature of business and after detailed discussion on the business processes.
                  The general documents that are required include the below: <br>
                  1.	Sale Invoices <br>
                  2.	Purchase Bills <br>
                  3.	Bills for expenses and utilities <br>
                  4.	Bank and loan account statements <br>
                  5.	Cheque counter foils <br>
                  6.	Petty cash book <br>
                  7.	Salary sheets, etc. <br>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion4">
                  4.	How can I get the desired reports or ledger accounts required to review?
                </button>
              </h2>
              <div id="accordion4" class="accordion-collapse collapse">
                <div class="accordion-body">
                  The customer has the option to send Request for reports from the Customer portal. The detail of reports can either be selected from the options available on the portal such as Balance Sheet, Profit & Loss account, Ledger account statements, etc., or it can be customised depending on the requirement. <br>
                  Further, the customer has the option to directly pull the reports from the accounting software through the access provided to them.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion5">
                  5.	How does a customer resolve any service related queries?
                </button>
              </h2>
              <div id="accordion5" class="accordion-collapse collapse">
                <div class="accordion-body">
                  24*7 customer support is available to the customer for any service related queries. <br>
                  The customer can raise a ticket on the Customer portal and the same is resolved within 2 working days time limit. <br>
                  Further, the customer has the option to Email or Video Call the dedicated Manager to get the queries resolved instantly. <br>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-6">

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion6">
                  6.	What does online Accounting and Bookkeeping services mean?
                </button>
              </h2>
              <div id="accordion6" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Online Accounting and Bookkeeping services means transferring the overall management of your finance, accounting, and bookkeeping requirements to a third-party professional firm for maintenance with value added services such as accuracy and professional data management, transparency, no office visit hassles with seamless accounting.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion7">
                  7.	Why is Accounting and bookkeeping important for my Business?
                </button>
              </h2>
              <div id="accordion7" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Accounting is called the language of business.  It is important as it keeps a systematic record of the organization's financial information. It enables the users to assess the performance of a company over a period of time.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion8">
                  8.	What additional services do I get from undercustomz?
                </button>
              </h2>
              <div id="accordion8" class="accordion-collapse collapse">
                <div class="accordion-body">
                  We provide a one stop comprehensive solution to business enterprises for  management of all their financial compliance requirements. <br>
                  We provide following services along with the Accounting and Bookkeeping services with no additional costs: <br>
                  a.	GST returns preparation and filings on periodic basis. <br>
                  b.	Income Tax returns filing and compliances. <br>
                  c.	Consultations on any matters related to corporate laws and tax compliances. <br>
                  d.	Three layer checking of the financial data by the professionals before delivery to the customer.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion9">
                  9.	How do you ensure the confidentiality of data shared with you?
                </button>
              </h2>
              <div id="accordion9" class="accordion-collapse collapse">
                <div class="accordion-body">
                  We enter into the confidentiality agreement with the customer to maintain the confidentiality and security of the customer data at all the time.
                </div>
              </div>
            </div>
          </div>

          <div class="accordion faq-alt mb-4 mx-2">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion10">
                  10.	Is there any way to appraise the performance of the services?
                </button>
              </h2>
              <div id="accordion10" class="accordion-collapse collapse">
                <div class="accordion-body">
                  We have the system of Quarterly Rating of services by the Customer wherein we get the input from the customer to rate our services based on their experience.
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="common-section bg-white border-top">
    <div class="container-fluid px-lg-5 py-4">
      <div class="section-title text-center mb-4">
        <h6 class="text-primary"> Gallery </h6>
        <h3> Projects Gallery </h3>
        <span class="line"></span>
      </div>
      <div class="text-center px-4">
        <!-- <p>content being uploaded...</p> -->

        <div id="owl-quad" class="owl-carousel">
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
          <div class="item">
            <img class="p-2" src="<?php echo get_stylesheet_directory_uri(); ?>/img/default.jpg">
          </div>
        </div>
      </div>
      <div class="text-center py-4">
        <a class="btn btn-dark" href="<?php echo site_url(); ?>/gallery/"> View Gallery </a>
      </div>

    </div>
  </section>

  <section class="common-section bg-gradient border-topxx">
    <div class="container py-4">
      <div class="row">

        <div class="col-md-5 pe-lg-5">
          <div class="section-title text-white mb-4">
            <h6 class="text-light"> Testimonials </h6>
            <h2> Our Satisfied <br> Clients </h2>
            <!-- <span class="line"></span> -->
            <p class="bigp">Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit magnam unde blanditiis, reiciendis repellendus minus sed culpa autem necessitatibus voluptatibus excepturi. </p>
            <a class="btn btn-light" href="<?php echo site_url(); ?>/testimonials/"> Read More </a>
          </div>
        </div>

        <div class="col-md-7 ps-lg-5 px-4" data-aos="fade-up">
          <!-- Slider main container -->
          <div id="owl-duo" class="owl-carousel">
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
                    <p class="card-text"> <?php echo excerpt(100); ?> </p>
                    <h6 class="card-title mt-4 mb-3"> <strong><?php the_title(); ?></strong> </h6>
                  </div>
                </div>
              </div>
            <?php endwhile; endif; ?>

            <div class="owl-item">
              <div class="card testimonial-card">
                <div class="card-icon text-center pt-4">
                  <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/img/user.jpg" alt="">
                  <span class="quoty"><i class="fa fa-quote-left"></i></span>
                </div>
                <div class="card-body text-center">
                  <p class="card-text"> Appropriate communication protocols between both the teams are defined to facilitate a harmonious collaboration and working environment. </p>
                  <h6 class="card-title mt-4 mb-3"> <strong>Sandeep Thakur</strong> </h6>
                </div>
              </div>
            </div>

            <div class="owl-item">
              <div class="card testimonial-card">
                <div class="card-icon text-center pt-4">
                  <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/img/user.jpg" alt="">
                  <span class="quoty"><i class="fa fa-quote-left"></i></span>
                </div>
                <div class="card-body text-center">
                  <p class="card-text"> Appropriate communication protocols between both the teams are defined to facilitate a harmonious collaboration and working environment. </p>
                  <h6 class="card-title mt-4 mb-3"> <strong>Sandeep Thakur</strong> </h6>
                </div>
              </div>
            </div>

            <div class="owl-item">
              <div class="card testimonial-card">
                <div class="card-icon text-center pt-4">
                  <img class="img-thumbnail rounded-circle mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/img/user.jpg" alt="">
                  <span class="quoty"><i class="fa fa-quote-left"></i></span>
                </div>
                <div class="card-body text-center">
                  <p class="card-text"> Appropriate communication protocols between both the teams are defined to facilitate a harmonious collaboration and working environment. </p>
                  <h6 class="card-title mt-4 mb-3"> <strong>Sandeep Thakur</strong> </h6>
                </div>
              </div>
            </div>

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

  <section class="common-section bg-white border-top">
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
          <div class="card h-100">
            <div class="card-body homepage-form">
              <h5>Write to us </h5>
              <?php echo do_shortcode('[contact-form-7 id="44d6862" title="Homepage form 1"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<?php
get_footer();
