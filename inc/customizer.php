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
function undercustomz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'undercustomz_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'undercustomz_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'undercustomz_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function undercustomz_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function undercustomz_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function undercustomz_customize_preview_js() {
	wp_enqueue_script( 'undercustomz-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'undercustomz_customize_preview_js' );




/**
 * Amanized customizer option for darkcustoms
 */
function darkcustoms_customize_register_slides( $wp_customize ) {

  $wp_customize->add_panel( 'undercustomz_slider_panel', array(
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Hero Slider',
    'description'    => 'Custom hero slider carousel based on bootstrap 5. Maximum 3 slides supported.',
  ));

  //slide 1
  $wp_customize->add_section( 'undercustomz_slider1' , array(
    'title'          => 'Slide 1',
    'priority'       => 101,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'description'    => '',
    'panel'          => 'undercustomz_slider_panel',
  ));
  $wp_customize->add_setting('undercustomz_slider1_image',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo1', array(
    'label'      => 'Slide Background Image',
    'section'    => 'undercustomz_slider1',
    'settings'   => 'undercustomz_slider1_image',
    'context'    => 'undercustomz_slider1_context'
  )));
  $wp_customize->add_setting('undercustomz_slider1_caption',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_slider1_caption',  array(
    'section'   => 'undercustomz_slider1',
    'label'     => 'Slide Caption',
    'type'      => 'textarea',
  ));

  //slide 2
  $wp_customize->add_section( 'undercustomz_slider2' , array(
    'title'          => 'Slide 2',
    'priority'       => 102,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'description'    => '',
    'panel'          => 'undercustomz_slider_panel',
  ));
  $wp_customize->add_setting('undercustomz_slider2_image',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo2', array(
    'label'      => 'Slide Background Image',
    'section'    => 'undercustomz_slider2',
    'settings'   => 'undercustomz_slider2_image',
    'context'    => 'undercustomz_slider2_context'
  )));
  $wp_customize->add_setting('undercustomz_slider2_caption',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_slider2_caption',  array(
    'section'   => 'undercustomz_slider2',
    'label'     => 'Slide Caption',
    'type'      => 'textarea',
  ));

  //slide 3
  $wp_customize->add_section( 'undercustomz_slider3' , array(
    'title'          => 'Slide 3',
    'priority'       => 103,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'description'    => '',
    'panel'          => 'undercustomz_slider_panel',
  ));
  $wp_customize->add_setting('undercustomz_slider3_image',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo3', array(
    'label'      => 'Slide Background Image',
    'section'    => 'undercustomz_slider3',
    'settings'   => 'undercustomz_slider3_image',
    'context'    => 'undercustomz_slider3_context'
  )));
  $wp_customize->add_setting('undercustomz_slider3_caption',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_slider3_caption',  array(
    'section'   => 'undercustomz_slider3',
    'label'     => 'Slide Caption',
    'type'      => 'textarea',
  ));

}
add_action( 'customize_register', 'darkcustoms_customize_register_slides' );



/**
 * Amanized customizer option for darkcustoms
 */
function darkcustoms_customize_register_contact_info( $wp_customize ) {

  // $wp_customize->add_panel( 'undercustomz_contact_info_panel', array(
  //   'priority'       => 60,
  //   'capability'     => 'edit_theme_options',
  //   'theme_supports' => '',
  //   'title'          => 'Contact Info',
  //   'description'    => 'Set your contact information like email, phone number and address.',
  // ));

  //create section
  $wp_customize->add_section( 'undercustomz_contact_info_section' , array(
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Contact Details',
    'description'    => 'Set your contact information like email, phone number and address. You can use html.',
    // 'panel'          => 'undercustomz_contact_info_panel',
  ));

  // email
  $wp_customize->add_setting('undercustomz_contact_info_email',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_email',  array(
    'section'   => 'undercustomz_contact_info_section',
    'label'     => 'Email Address',
    'type'      => 'text',
  ));

  //phone
  $wp_customize->add_setting('undercustomz_contact_info_phone',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_phone',  array(
    'section'   => 'undercustomz_contact_info_section',
    'label'     => 'Contact Phone',
    'type'      => 'text',
  ));

  //Address
  $wp_customize->add_setting('undercustomz_contact_info_address',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_address',  array(
    'section'   => 'undercustomz_contact_info_section',
    'label'     => 'Address',
    'type'      => 'textarea',
  ));

  //contact shortcode
  $wp_customize->add_setting('undercustomz_contact_info_contact_form',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_contact_form',  array(
    'section'   => 'undercustomz_contact_info_section',
    'label'     => 'Contact Form Shortcode',
    'type'      => 'text',
  ));

  //map
  $wp_customize->add_setting('undercustomz_contact_info_map_iframe',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_contact_info_map_iframe',  array(
    'section'   => 'undercustomz_contact_info_section',
    'label'     => 'Contact Map Iframe',
    'type'      => 'textarea',
  ));


}
add_action( 'customize_register', 'darkcustoms_customize_register_contact_info' );



/**
 * Amanized customizer option for darkcustoms
 */
function darkcustoms_customize_register_footer_area( $wp_customize ) {

  //create section
  $wp_customize->add_section( 'undercustomz_footer_area_section' , array(
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Footer Area',
    'description'    => 'Set text to appear in footer here.',
  ));

  //footer text
  $wp_customize->add_setting('undercustomz_footer_area_text',  array(
    'default'    =>  '',
    'transport'  =>  'postMessage'
  ));
  $wp_customize->add_control('undercustomz_footer_area_text',  array(
    'section'   => 'undercustomz_footer_area_section',
    'label'     => 'Footer Text',
    'type'      => 'textarea',
  ));

}
add_action( 'customize_register', 'darkcustoms_customize_register_footer_area' );

