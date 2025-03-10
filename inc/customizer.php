<?php
/**
 * FreneticFocus Theme Customizer
 *
 * @package FreneticFocus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function freneticfocus_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.logo',
            'render_callback' => 'freneticfocus_customize_partial_blogname',
        ));
    }

    /*****************************************
     * Hero Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_hero_section', array(
        'title' => __('Hero Section', 'freneticfocus'),
        'priority' => 30,
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default' => get_template_directory_uri() . '/assets/images/hero-bg.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => __('Hero Background Image', 'freneticfocus'),
        'section' => 'freneticfocus_hero_section',
        'settings' => 'hero_background_image',
    )));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Comprehensive Management Services Tailored to Your Needs',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'freneticfocus'),
        'section' => 'freneticfocus_hero_section',
        'type' => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Empowering businesses and individuals to enhance digital literacy and operational efficiency',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'freneticfocus'),
        'section' => 'freneticfocus_hero_section',
        'type' => 'text',
    ));

    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Book a Consultation',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Button Text', 'freneticfocus'),
        'section' => 'freneticfocus_hero_section',
        'type' => 'text',
    ));

    // Hero Button URL
    $wp_customize->add_setting('hero_button_url', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label' => __('Button URL', 'freneticfocus'),
        'section' => 'freneticfocus_hero_section',
        'type' => 'url',
    ));

    /*****************************************
     * About Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_about_section', array(
        'title' => __('About Section', 'freneticfocus'),
        'priority' => 40,
    ));

    // About Title
    $wp_customize->add_setting('about_title', array(
        'default' => 'About Lara van Rooyen',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'type' => 'text',
    ));

    // About Content
    $wp_customize->add_setting('about_content', array(
        'default' => '<p>Lara van Rooyen provides comprehensive and innovative workshops and focus to businesses and individuals seeking to enhance their digital literacy and operational efficiency. Based in Stockholm and Nice, she specializes in a variety of management services tailored to meet the diverse needs of clients.</p>
        <p>As a seasoned professional, Lara is committed to delivering excellence through a combination of expertise, experience, and cutting-edge strategies. She is proficient in both Swedish and English languages, allowing her to serve a diverse clientele.</p>
        <p>We founded Legora with the mission of changing how professionals work. Millions of professionals dedicate their lives to solving their clients\' and companies\' most pressing problems. It became our calling to help them achieve these missions faster, with even greater impact.</p>',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_content', array(
        'label' => __('About Content', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'type' => 'textarea',
    ));

    // About Image
    $wp_customize->add_setting('about_image', array(
        'default' => get_template_directory_uri() . '/assets/images/about-image.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('About Image', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'settings' => 'about_image',
    )));

    // About Image Alt Text
    $wp_customize->add_setting('about_image_alt', array(
        'default' => 'Lara van Rooyen',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_image_alt', array(
        'label' => __('About Image Alt Text', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'type' => 'text',
    ));

    // About Button Text
    $wp_customize->add_setting('about_button_text', array(
        'default' => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_button_text', array(
        'label' => __('Button Text', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'type' => 'text',
    ));

    // About Button URL
    $wp_customize->add_setting('about_button_url', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('about_button_url', array(
        'label' => __('Button URL', 'freneticfocus'),
        'section' => 'freneticfocus_about_section',
        'type' => 'url',
    ));

    /*****************************************
     * Services Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_services_section', array(
        'title' => __('Services Section', 'freneticfocus'),
        'priority' => 50,
    ));

    // Services Title
    $wp_customize->add_setting('services_title', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_title', array(
        'label' => __('Services Title', 'freneticfocus'),
        'section' => 'freneticfocus_services_section',
        'type' => 'text',
    ));

    // Services Subtitle
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Specialized solutions designed to meet your unique business needs.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_subtitle', array(
        'label' => __('Services Subtitle', 'freneticfocus'),
        'section' => 'freneticfocus_services_section',
        'type' => 'text',
    ));

    // Number of services to display
    $wp_customize->add_setting('services_count', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('services_count', array(
        'label' => __('Number of Services to Display', 'freneticfocus'),
        'section' => 'freneticfocus_services_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 12,
            'step' => 1,
        ),
    ));

    // Services Button Text
    $wp_customize->add_setting('services_button_text', array(
        'default' => 'View All Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_button_text', array(
        'label' => __('Button Text', 'freneticfocus'),
        'section' => 'freneticfocus_services_section',
        'type' => 'text',
    ));

    // Services Button URL
    $wp_customize->add_setting('services_button_url', array(
        'default' => '/services',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('services_button_url', array(
        'label' => __('Button URL', 'freneticfocus'),
        'section' => 'freneticfocus_services_section',
        'type' => 'url',
    ));

    /*****************************************
     * Services Page Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_services_page_section', array(
        'title' => __('Services Page', 'freneticfocus'),
        'priority' => 55,
    ));

    // Services Hero Background Image
    $wp_customize->add_setting('services_hero_background_image', array(
        'default' => get_template_directory_uri() . '/assets/images/services-hero.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'services_hero_background_image', array(
        'label' => __('Services Hero Background Image', 'freneticfocus'),
        'section' => 'freneticfocus_services_page_section',
        'settings' => 'services_hero_background_image',
    )));

    // Services Page Title
    $wp_customize->add_setting('services_page_title', array(
        'default' => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_page_title', array(
        'label' => __('Services Page Title', 'freneticfocus'),
        'section' => 'freneticfocus_services_page_section',
        'type' => 'text',
    ));

    // Services Page Subtitle
    $wp_customize->add_setting('services_page_subtitle', array(
        'default' => 'Specialized solutions designed to meet your unique business needs',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_page_subtitle', array(
        'label' => __('Services Page Subtitle', 'freneticfocus'),
        'section' => 'freneticfocus_services_page_section',
        'type' => 'text',
    ));

    // Services Page Button Text
    $wp_customize->add_setting('services_page_button_text', array(
        'default' => 'Explore Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_page_button_text', array(
        'label' => __('Button Text', 'freneticfocus'),
        'section' => 'freneticfocus_services_page_section',
        'type' => 'text',
    ));

    // Services Images
    $services = array(
        'change_management' => 'Change Management',
        'program_management' => 'Program Management',
        'redili' => 'Real Estate Digital Literacy',
        'cx_mapping' => 'Customer Journey Mapping',
        'm365_adoption' => 'M365 Adoption'
    );

    foreach ($services as $service_key => $service_name) {
        $wp_customize->add_setting($service_key . '_image', array(
            'default' => get_template_directory_uri() . '/assets/images/' . $service_key . '.jpg',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $service_key . '_image', array(
            'label' => sprintf(__('%s Image', 'freneticfocus'), $service_name),
            'section' => 'freneticfocus_services_page_section',
            'settings' => $service_key . '_image',
        )));
    }

    /*****************************************
     * Contact Page Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_contact_page_section', array(
        'title' => __('Contact Page', 'freneticfocus'),
        'priority' => 65,
    ));

    // Contact Hero Background Image
    $wp_customize->add_setting('contact_hero_background_image', array(
        'default' => get_template_directory_uri() . '/assets/images/contact-hero.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_hero_background_image', array(
        'label' => __('Contact Hero Background Image', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'settings' => 'contact_hero_background_image',
    )));

    // Contact Page Title
    $wp_customize->add_setting('contact_page_title', array(
        'default' => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_page_title', array(
        'label' => __('Contact Page Title', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'type' => 'text',
    ));

    // Contact Page Subtitle
    $wp_customize->add_setting('contact_page_subtitle', array(
        'default' => 'Have a question or want to work together? Reach out to us today.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_page_subtitle', array(
        'label' => __('Contact Page Subtitle', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'type' => 'text',
    ));

    // Contact Info Title
    $wp_customize->add_setting('contact_info_title', array(
        'default' => 'Contact Information',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_info_title', array(
        'label' => __('Contact Info Title', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'type' => 'text',
    ));

    // Contact Info Description
    $wp_customize->add_setting('contact_info_description', array(
        'default' => 'We\'d love to hear from you. Fill out the form or reach out through any of the channels below.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_info_description', array(
        'label' => __('Contact Info Description', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'type' => 'textarea',
    ));

    // Contact Form 7 ID
    $wp_customize->add_setting('contact_form_id', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('contact_form_id', array(
        'label' => __('Contact Form 7 ID', 'freneticfocus'),
        'description' => __('Enter the ID of the Contact Form 7 form to display on the contact page.', 'freneticfocus'),
        'section' => 'freneticfocus_contact_page_section',
        'type' => 'number',
    ));

    /*****************************************
     * CTA Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_cta_section', array(
        'title' => __('Call to Action Section', 'freneticfocus'),
        'priority' => 60,
    ));

    // CTA Title
    $wp_customize->add_setting('cta_title', array(
        'default' => 'Ready to Transform Your Business?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_title', array(
        'label' => __('CTA Title', 'freneticfocus'),
        'section' => 'freneticfocus_cta_section',
        'type' => 'text',
    ));

    // CTA Subtitle
    $wp_customize->add_setting('cta_subtitle', array(
        'default' => 'Schedule a consultation today and discover how our comprehensive management services can help you achieve your goals.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_subtitle', array(
        'label' => __('CTA Subtitle', 'freneticfocus'),
        'section' => 'freneticfocus_cta_section',
        'type' => 'textarea',
    ));

    // CTA Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Book a Consultation',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_button_text', array(
        'label' => __('Button Text', 'freneticfocus'),
        'section' => 'freneticfocus_cta_section',
        'type' => 'text',
    ));

    // CTA Button URL
    $wp_customize->add_setting('cta_button_url', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cta_button_url', array(
        'label' => __('Button URL', 'freneticfocus'),
        'section' => 'freneticfocus_cta_section',
        'type' => 'url',
    ));

    /*****************************************
     * Footer Section
     *****************************************/
    $wp_customize->add_section('freneticfocus_footer_section', array(
        'title' => __('Footer Settings', 'freneticfocus'),
        'priority' => 100,
    ));

    // Footer Address
    $wp_customize->add_setting('footer_address', array(
        'default' => 'Stockholm and Nice',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_address', array(
        'label' => __('Address', 'freneticfocus'),
        'section' => 'freneticfocus_footer_section',
        'type' => 'text',
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@freneticfocus.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'freneticfocus'),
        'section' => 'freneticfocus_footer_section',
        'type' => 'email',
    ));

    // Social Media URLs
    $wp_customize->add_setting('linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('linkedin_url', array(
        'label' => __('LinkedIn URL', 'freneticfocus'),
        'section' => 'freneticfocus_footer_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('twitter_url', array(
        'label' => __('Twitter URL', 'freneticfocus'),
        'section' => 'freneticfocus_footer_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label' => __('Facebook URL', 'freneticfocus'),
        'section' => 'freneticfocus_footer_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'freneticfocus_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function freneticfocus_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function freneticfocus_customize_preview_js() {
    wp_enqueue_script('freneticfocus-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), FRENETICFOCUS_VERSION, true);
}
add_action('customize_preview_init', 'freneticfocus_customize_preview_js');

/**
 * Kirki configuration
 */
function freneticfocus_kirki_configuration() {
    return array('url_path' => get_template_directory_uri() . '/inc/kirki/');
}
add_filter('kirki/config', 'freneticfocus_kirki_configuration');