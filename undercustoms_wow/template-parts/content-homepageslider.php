<?php
/**
 * Template part for Home Page Slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package undercustomz
 */

// echo "<pre>";
// var_dump(get_theme_mod('undercustomz_slider_repeater'));
// echo "</pre>";

// Function to output slides on the frontend
undercustoms_output_home_slider(); //execute function
if ( ! function_exists( 'undercustoms_output_home_slider' ) ) {
  function undercustoms_output_home_slider() {

    $slides_json = get_theme_mod('undercustomz_slider_repeater', json_encode([]));
    $slides = json_decode($slides_json, true);

    if (empty($slides) || !is_array($slides)) return;

    $first_slide = true;
    $slider_num = 1;
    $first_dot = true;
    $dot_num = 0;

    /* foreach ($slides as $slide) {
      $image = esc_url($slide['image'] ?? '');
      $caption = esc_html($slide['caption'] ?? '');

      if (!$image) continue;

      $active_class = $first ? ' active' : '';
      $first = false;
      $slider_num++;
      $dot_num++;

      echo '<div class="slider-item' . $active_class . '">';
      echo '<img src="' . $image . '" alt="">';
      if ($caption) {
        echo '<div class="slider-caption">' . $caption . '</div>';
      }
      echo '</div>';
    } */

    ?>

      <div class="hero-slider">
        <div id="carouselHomePageSlider" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
          <div class="carousel-indicators">
            <?php
              foreach ($slides as $slide) {
                $active_class = $first_dot ? ' active' : '';
                echo '<button type="button" data-bs-target="#carouselHomePageSlider" class="' . $active_class . '" data-bs-slide-to="' . $dot_num . '"></button>';
                $first_dot = false;
                $dot_num++;
              }
            ?>
          </div>
          <div class="carousel-inner">

            <?php
              foreach ($slides as $slide) {
                $image = esc_url($slide['image'] ?? '');
                $caption = $slide['caption'] ?? '';
                $caption = wp_kses_post($caption);

                if (!$image) continue;

                $active_class = $first_slide ? ' active' : '';
                $first_slide = false;
                $slider_num++;

                // echo '<div class="slider-item' . $active_class . '">';
                // echo '<img src="' . $image . '" alt="">';
                // if ($caption) {
                //   echo '<div class="slider-caption">' . $caption . '</div>';
                // }
                // echo '</div>';
                ?>
                  <div class="carousel-item <?php echo $active_class; ?>">
                    <img src="<?php echo (!empty($image)) ? $image : get_template_directory_uri() . '/img/default.jpg'; ?>" alt="slide <?php echo $slider_num; ?>">
                    <div class="carousel-caption">
                      <div class="container">
                        <div class="caption-box">
                          <?php echo (!empty($caption)) ? $caption : ""; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            ?>

            <!-- <div class="carousel-item active">
              <img src="<?php //echo get_template_directory_uri() . '/img/slide1.jpg'; ?>" alt="">
              <div class="carousel-caption">
                <div class="container">
                  <div class="caption-box">
                    <h4> Caption Title </h4>
                    <h2> Jumbo Title </h2>
                    <p class="mx-0"> Details about the Title and More. </p>
                    <a href="#" class="btn popModal">Know More</a>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
          <div class="carousel-controls">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePageSlider" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePageSlider" data-bs-slide="next">
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

    <?php

  }
}

// call undercustoms_output_home_slider() wherever needed
