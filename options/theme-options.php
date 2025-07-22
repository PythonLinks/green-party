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
            'candidate'  => __('Candidate Site', 'text-domain'),
            'california' => __('California Green Party', 'text-domain'),
        ),
    ));
}
add_action('customize_register', 'add_version_customizer_option');

// Sanitization function
function sanitize_organization_option($input) {
    $valid_options = array('local-party', 'state-party', 'candidate');
    return in_array($input, $valid_options) ? $input : 'candidate';
}

?>