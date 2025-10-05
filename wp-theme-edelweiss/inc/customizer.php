<?php
/**
 * Edelweiss Gaishofen Customizer
 *
 * @package Edelweiss_Gaishofen
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function edelweiss_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'edelweiss_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'edelweiss_customize_partial_blogdescription',
            )
        );
    }

    // Hero Section
    $wp_customize->add_section('edelweiss_hero_section', array(
        'title'    => __('Hero Section', 'edelweiss-gaishofen'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('edelweiss_hero_bg_image', array(
        'default'           => get_template_directory_uri() . '/assets/img/schuetzenverein_sw.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'edelweiss_hero_bg_image', array(
        'label'    => __('Hero Background Image', 'edelweiss-gaishofen'),
        'section'  => 'edelweiss_hero_section',
        'settings' => 'edelweiss_hero_bg_image',
    )));

    $wp_customize->add_setting('edelweiss_hero_button_1_text', array(
        'default'           => __('Who are we', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_hero_button_1_text', array(
        'label'   => __('Button 1 Text', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('edelweiss_hero_button_1_link', array(
        'default'           => '#about',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('edelweiss_hero_button_1_link', array(
        'label'   => __('Button 1 Link', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('edelweiss_hero_button_2_text', array(
        'default'           => __('To Training', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_hero_button_2_text', array(
        'label'   => __('Button 2 Text', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('edelweiss_hero_button_2_link', array(
        'default'           => '#training',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('edelweiss_hero_button_2_link', array(
        'label'   => __('Button 2 Link', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_hero_section',
        'type'    => 'url',
    ));

    // About Section
    $wp_customize->add_section('edelweiss_about_section', array(
        'title'    => __('About Section', 'edelweiss-gaishofen'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('edelweiss_about_title', array(
        'default'           => __('About Us', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_about_title', array(
        'label'   => __('About Title', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('edelweiss_about_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('edelweiss_about_content', array(
        'label'   => __('About Content', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_about_section',
        'type'    => 'textarea',
        'description' => __('Leave empty to use default content', 'edelweiss-gaishofen'),
    ));

    // Statistics Section
    $wp_customize->add_section('edelweiss_stats_section', array(
        'title'    => __('Statistics Section', 'edelweiss-gaishofen'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('edelweiss_stats_bg_image', array(
        'default'           => get_template_directory_uri() . '/assets/img/bogen_sw.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'edelweiss_stats_bg_image', array(
        'label'    => __('Statistics Background Image', 'edelweiss-gaishofen'),
        'section'  => 'edelweiss_stats_section',
        'settings' => 'edelweiss_stats_bg_image',
    )));

    // Statistics
    $stats = array(
        'active_shooters' => __('Active Shooters', 'edelweiss-gaishofen'),
        'pistol_teams' => __('Pistol Teams', 'edelweiss-gaishofen'),
        'rifle_teams' => __('Rifle Teams', 'edelweiss-gaishofen'),
        'rifle_supported_teams' => __('Rifle Teams Supported', 'edelweiss-gaishofen'),
        'youth_teams' => __('Youth Teams', 'edelweiss-gaishofen'),
    );

    $defaults = array(
        'active_shooters' => '> 30',
        'pistol_teams' => '4',
        'rifle_teams' => '2',
        'rifle_supported_teams' => '2',
        'youth_teams' => '1',
    );

    foreach ($stats as $key => $label) {
        $wp_customize->add_setting("edelweiss_stat_{$key}", array(
            'default'           => $defaults[$key],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_stat_{$key}", array(
            'label'   => $label,
            'section' => 'edelweiss_stats_section',
            'type'    => 'text',
        ));
    }

    // Training Section
    $wp_customize->add_section('edelweiss_training_section', array(
        'title'    => __('Training Section', 'edelweiss-gaishofen'),
        'priority' => 60,
    ));

    $wp_customize->add_setting('edelweiss_training_title', array(
        'default'           => __('Training', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_training_title', array(
        'label'   => __('Training Section Title', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_training_section',
        'type'    => 'text',
    ));

    // Content source selection
    $wp_customize->add_setting('edelweiss_training_content_source', array(
        'default'           => 'customizer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_training_content_source', array(
        'label'   => __('Training Content Source', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_training_section',
        'type'    => 'select',
        'choices' => array(
            'customizer' => __('Use Customizer Settings (Simple)', 'edelweiss-gaishofen'),
            'page'       => __('Use WordPress Page (Advanced)', 'edelweiss-gaishofen'),
        ),
        'description' => __('Choose whether to use the simple customizer options below or create a dedicated WordPress page for more complex layouts.', 'edelweiss-gaishofen'),
    ));

    // Page selector (when using page source)
    $wp_customize->add_setting('edelweiss_training_page', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('edelweiss_training_page', array(
        'label'   => __('Training Page', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_training_section',
        'type'    => 'dropdown-pages',
        'description' => __('Select the page to display as training content. Only used when "Use WordPress Page" is selected above.', 'edelweiss-gaishofen'),
    ));

    // Customizer content (when using customizer source)
    $wp_customize->add_setting('edelweiss_training_times_title', array(
        'default'           => __('Current Training Times', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_training_times_title', array(
        'label'       => __('Training Times Title', 'edelweiss-gaishofen'),
        'section'     => 'edelweiss_training_section',
        'type'        => 'text',
        'description' => __('Only used when "Use Customizer Settings" is selected above.', 'edelweiss-gaishofen'),
    ));

    $wp_customize->add_setting('edelweiss_training_location', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_training_location', array(
        'label'   => __('Training Location', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_training_section',
        'type'    => 'text',
        'description' => __('e.g., "Edelweißschützen Neuhofen"', 'edelweiss-gaishofen'),
    ));

    // Training times (repeatable)
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("edelweiss_training_day_{$i}", array(
            'default'           => $i == 1 ? 'Dienstag' : ($i == 2 ? 'Freitag' : ''),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_training_day_{$i}", array(
            'label'   => sprintf(__('Training Day %d', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_training_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("edelweiss_training_time_{$i}", array(
            'default'           => $i == 1 ? 'ab 18:00' : ($i == 2 ? 'ab 18:00 (Jugendtraining!)' : ''),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_training_time_{$i}", array(
            'label'   => sprintf(__('Training Time %d', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_training_section',
            'type'    => 'text',
            'description' => $i == 1 ? __('Leave empty to hide this training time.', 'edelweiss-gaishofen') : '',
        ));
    }

    $wp_customize->add_setting('edelweiss_training_additional_info', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('edelweiss_training_additional_info', array(
        'label'       => __('Additional Training Information', 'edelweiss-gaishofen'),
        'section'     => 'edelweiss_training_section',
        'type'        => 'textarea',
        'description' => __('Additional text to display below training times (supports HTML)', 'edelweiss-gaishofen'),
    ));

    // Training Images
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("edelweiss_training_image_{$i}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "edelweiss_training_image_{$i}", array(
            'label'    => sprintf(__('Training Image %d', 'edelweiss-gaishofen'), $i),
            'section'  => 'edelweiss_training_section',
            'settings' => "edelweiss_training_image_{$i}",
        )));

        $wp_customize->add_setting("edelweiss_training_image_{$i}_title", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_training_image_{$i}_title", array(
            'label'   => sprintf(__('Training Image %d Title', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_training_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("edelweiss_training_image_{$i}_description", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("edelweiss_training_image_{$i}_description", array(
            'label'   => sprintf(__('Training Image %d Description', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_training_section',
            'type'    => 'textarea',
        ));
    }

    // Teams Section
    $wp_customize->add_section('edelweiss_teams_section', array(
        'title'    => __('Teams Section', 'edelweiss-gaishofen'),
        'priority' => 70,
        'description' => __('Teams are now managed through the Team Members post type. Go to Team Members in your WordPress admin to add and manage team content.', 'edelweiss-gaishofen'),
    ));

    $wp_customize->add_setting('edelweiss_teams_title', array(
        'default'           => __('People / Teams', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_teams_title', array(
        'label'       => __('Teams Section Title', 'edelweiss-gaishofen'),
        'section'     => 'edelweiss_teams_section',
        'type'        => 'text',
        'description' => __('This title will appear above the dynamic team members content.', 'edelweiss-gaishofen'),
    ));

    // Contact Section
    $wp_customize->add_section('edelweiss_contact_section', array(
        'title'    => __('Contact Section', 'edelweiss-gaishofen'),
        'priority' => 80,
    ));

    $wp_customize->add_setting('edelweiss_contact_title', array(
        'default'           => __('Contact & Imprint', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_contact_title', array(
        'label'   => __('Contact Title', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_contact_section',
        'type'    => 'text',
    ));

    // Contact persons
    $contact_defaults = array(
        1 => array('title' => __('1st Chairman', 'edelweiss-gaishofen'), 'icon' => 'crown'),
        2 => array('title' => __('Sports Director', 'edelweiss-gaishofen'), 'icon' => 'crosshairs'),
        3 => array('title' => __('Webmaster', 'edelweiss-gaishofen'), 'icon' => 'laptop'),
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("edelweiss_contact_{$i}_title", array(
            'default'           => $contact_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_contact_{$i}_title", array(
            'label'   => sprintf(__('Contact %d Title', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_contact_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("edelweiss_contact_{$i}_name", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_contact_{$i}_name", array(
            'label'   => sprintf(__('Contact %d Name', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_contact_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("edelweiss_contact_{$i}_contact", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_contact_{$i}_contact", array(
            'label'   => sprintf(__('Contact %d Info', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_contact_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("edelweiss_contact_{$i}_icon", array(
            'default'           => $contact_defaults[$i]['icon'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("edelweiss_contact_{$i}_icon", array(
            'label'   => sprintf(__('Contact %d Icon', 'edelweiss-gaishofen'), $i),
            'section' => 'edelweiss_contact_section',
            'type'    => 'select',
            'choices' => array(
                'crown' => __('Crown', 'edelweiss-gaishofen'),
                'crosshairs' => __('Crosshairs', 'edelweiss-gaishofen'),
                'laptop' => __('Laptop', 'edelweiss-gaishofen'),
                'phone' => __('Phone', 'edelweiss-gaishofen'),
                'envelope' => __('Envelope', 'edelweiss-gaishofen'),
                'user' => __('User', 'edelweiss-gaishofen'),
            ),
        ));
    }

    // Imprint Section
    $wp_customize->add_setting('edelweiss_imprint_title', array(
        'default'           => __('Imprint', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_imprint_title', array(
        'label'   => __('Imprint Title', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_contact_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('edelweiss_imprint_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('edelweiss_imprint_content', array(
        'label'   => __('Imprint Content', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_contact_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('edelweiss_privacy_title', array(
        'default'           => __('Privacy Policy', 'edelweiss-gaishofen'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('edelweiss_privacy_title', array(
        'label'   => __('Privacy Title', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_contact_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('edelweiss_privacy_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('edelweiss_privacy_content', array(
        'label'   => __('Privacy Content', 'edelweiss-gaishofen'),
        'section' => 'edelweiss_contact_section',
        'type'    => 'textarea',
    ));

    // Other Settings
    $wp_customize->add_section('edelweiss_other_section', array(
        'title'    => __('Other Settings', 'edelweiss-gaishofen'),
        'priority' => 90,
    ));

    $wp_customize->add_setting('edelweiss_default_header_image', array(
        'default'           => get_template_directory_uri() . '/assets/img/schuetzenverein.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'edelweiss_default_header_image', array(
        'label'    => __('Default Header Image for Posts', 'edelweiss-gaishofen'),
        'section'  => 'edelweiss_other_section',
        'settings' => 'edelweiss_default_header_image',
    )));
}
add_action('customize_register', 'edelweiss_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function edelweiss_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function edelweiss_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function edelweiss_customize_preview_js() {
    wp_enqueue_script(
        'edelweiss-customizer',
        get_template_directory_uri() . '/assets/js/customizer.js',
        array('customize-preview'),
        EDELWEISS_VERSION,
        true
    );
}
add_action('customize_preview_init', 'edelweiss_customize_preview_js');