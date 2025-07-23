<?php
/**
 * undercustomz Theme Customizer
 *
 * @package undercustomz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function undercustomz_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

  if (isset($wp_customize->selective_refresh)) {
    $wp_customize->selective_refresh->add_partial(
      'blogname',
      array(
        'selector' => '.site-title a',
        'render_callback' => 'undercustomz_customize_partial_blogname',
      )
    );
    $wp_customize->selective_refresh->add_partial(
      'blogdescription',
      array(
        'selector' => '.site-description',
        'render_callback' => 'undercustomz_customize_partial_blogdescription',
      )
    );
  }
}
add_action('customize_register', 'undercustomz_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function undercustomz_customize_partial_blogname()
{
  bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function undercustomz_customize_partial_blogdescription()
{
  bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function undercustomz_customize_preview_js()
{
  wp_enqueue_script('undercustomz-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'undercustomz_customize_preview_js');




/**
 * Amanized customizer option for undercustoms
 */
function undercustoms_customize_register_contact_info($wp_customize)
{

  // $wp_customize->add_panel( 'undercustomz_contact_info_panel', array(
  //   'priority'       => 60,
  //   'capability'     => 'edit_theme_options',
  //   'theme_supports' => '',
  //   'title'          => 'Contact Info',
  //   'description'    => 'Set your contact information like email, phone number and address.',
  // ));

  //create section
  $wp_customize->add_section('undercustomz_contact_info_section', array(
    'priority' => 60,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => 'Contact Details',
    'description' => 'Set your contact information like email, phone number and address. You can use html.',
    // 'panel'          => 'undercustomz_contact_info_panel',
  ));

  // email
  $wp_customize->add_setting('undercustomz_contact_info_email', array(
    'default' => '',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_email', array(
    'section' => 'undercustomz_contact_info_section',
    'label' => 'Email Address',
    'type' => 'text',
  ));

  //phone
  $wp_customize->add_setting('undercustomz_contact_info_phone', array(
    'default' => '',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_phone', array(
    'section' => 'undercustomz_contact_info_section',
    'label' => 'Contact Phone',
    'type' => 'text',
  ));

  //Address
  $wp_customize->add_setting('undercustomz_contact_info_address', array(
    'default' => '',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_address', array(
    'section' => 'undercustomz_contact_info_section',
    'label' => 'Address',
    'type' => 'textarea',
  ));

  //contact shortcode
  $wp_customize->add_setting('undercustomz_contact_info_contact_form', array(
    'default' => '',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_contact_form', array(
    'section' => 'undercustomz_contact_info_section',
    'label' => 'Contact Form Shortcode',
    'type' => 'text',
  ));

  //map
  $wp_customize->add_setting('undercustomz_contact_info_map_iframe', array(
    'default' => '',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_map_iframe', array(
    'section' => 'undercustomz_contact_info_section',
    'label' => 'Contact Map Iframe',
    'type' => 'textarea',
  ));


}
add_action('customize_register', 'undercustoms_customize_register_contact_info');



/**
 * Amanized customizer option for undercustoms
 */
function undercustoms_extend_site_identity($wp_customize)
{
  // Add new setting
  $wp_customize->add_setting('undercustoms_site_description', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  // Add control to Site Identity section (after all others)
  $wp_customize->add_control('undercustoms_site_description', array(
    'label' => __('Site Description', 'undercustoms'),
    'section' => 'title_tagline', // Site Identity section ID
    'type' => 'textarea',
    'priority' => 999, // Large number to ensure it's placed last
  ));
}
add_action('customize_register', 'undercustoms_extend_site_identity');




/**
 * Amanized NEW customizer Home Page Slider
 */
function undercustoms_customize_register($wp_customize)
{
  // Single Section for the Home Page Slider
  $wp_customize->add_section('home_page_slider_section', array(
    'title' => __('Home Page Slider', 'undercustoms'),
    'priority' => 30,
    'description' => __('Add, remove, and configure slides for the homepage slider.', 'undercustoms'),
  ));

  // Repeater field using hidden JSON and JavaScript UI
  $wp_customize->add_setting('undercustoms_slider_repeater', array(
    'default' => json_encode([]),
    'sanitize_callback' => 'undercustoms_sanitize_repeater',
  ));

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize,
    'undercustoms_slider_repeater',
    array(
      'label' => __('Slides', 'undercustoms'),
      'section' => 'home_page_slider_section',
      'type' => 'hidden'
    )
  ));

  // Enqueue customizer JS for repeater UI
  add_action('customize_controls_enqueue_scripts', 'undercustoms_customizer_assets');
}
add_action('customize_register', 'undercustoms_customize_register');

function undercustoms_customizer_assets()
{
  wp_enqueue_script(
    'undercustoms-repeater',
    get_template_directory_uri() . '/inc/customizer-js.js',
    array('jquery', 'customize-controls'),
    null,
    true
  );
}

function undercustoms_sanitize_repeater($input)
{
  $decoded = json_decode($input, true);
  if (!is_array($decoded))
    return json_encode([]);

  $sanitized = array_map(function ($slide) {
    return [
      'image' => esc_url_raw($slide['image'] ?? ''),
      'caption' => wp_kses_post($slide['caption'] ?? ''),
      'link' => esc_url_raw($slide['link'] ?? '')
    ];
  }, $decoded);

  return json_encode($sanitized);
}







