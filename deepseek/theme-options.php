<?php
//DeepSeek wrote this and put it in the public domain.

// This code is released into the public domain. You are free to use,
// modify, distribute, and implement it in any project without
// restriction or attribution. No copyright claims are made on this
// implementation.

//It is now GPLd.

// Add Version option to Theme Customizer
function add_version_customizer_option($wp_customize) {
    // Add new section
    $wp_customize->add_section('organization_section', array(
        'title'    => __('Your Organization', 'text-domain'),
        'priority' => 30,
    ));

    // Add setting with sanitization
    $wp_customize->add_setting('organization_option', array(
        'default'           => 'candidate',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_organization_option',
    ));

    // Add control with choices
    $wp_customize->add_control('version_control', array(
        'label'    => __('Select Version', 'text-domain'),
        'section'  => 'organization_section',
        'settings' => 'organization_option',
        'type'     => 'select',
        'choices'  => array(
            'local-party'      => __('Local Party', 'text-domain'),
            'state-party'      => __('State Party', 'text-domain'),	    
            'candidate'  => __('Candidate', 'text-domain'),
        ),
    ));


    // Video Embed (textarea)
    $wp_customize->add_setting('organization_video');
    $wp_customize->add_control('organization_video_control', array(
        'label'       => __('Video', 'green-party'),
        'description' => __('The embed code for their video', 'green-party'),
        'section'     => 'organization_section',
        'settings'    => 'organization_video',
        'type'        => 'textarea',
    ));

    // Events Page URL
    $wp_customize->add_setting('organization_eventsPageURL');
    $wp_customize->add_control('organization_eventsPageURL_control', array(
        'label'       => __('Events Page URL', 'green-party'),
        'description' => __('Please include "https://"', 'green-party'),
        'section'     => 'organization_section',
        'settings'    => 'organization_eventsPageURL',
        'type'        => 'url',
    ));

    // Has Future Events (checkbox)
    $wp_customize->add_setting('organization_hasScheduledEvents', array(
        'default' => false,
    ));
    $wp_customize->add_control('organization_hasScheduledEvents_control', array(
        'label'       => __('Has Future Event?', 'green-party'),
        'description' => __('If so they will show up on the map', 'green-party'),
        'section'     => 'organization_section',
        'settings'    => 'organization_hasScheduledEvents',
        'type'        => 'checkbox',
    ));

    // Donations Page URL
    $wp_customize->add_setting('organization_donationsPageURL');
    $wp_customize->add_control('organization_donationsPageURL_control', array(
        'label'       => __('Donations Page URL', 'green-party'),
        'description' => __('Please include "https://"', 'green-party'),
        'section'     => 'organization_section',
        'settings'    => 'organization_donationsPageURL',
        'type'        => 'url',
    ));


}
add_action('customize_register', 'add_version_customizer_option');

// Sanitization function
function sanitize_organization_option($input) {
    $valid_options = array('local-party', 'state-party', 'candidate');
    return in_array($input, $valid_options) ? $input : 'candidate';
}

?>