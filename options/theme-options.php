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
    $wp_customize->add_setting('organization_type', array(
        'default'           => 'candidate',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_version_option',
    ));

    // Add control with choices
    $wp_customize->add_control('version_control', array(
        'label'    => __('Select Version', 'text-domain'),
        'section'  => 'version_section',
        'settings' => 'version_option',
        'type'     => 'select',
        'choices'  => array(
            'local_party' => __('Local Party', 'text-domain'),
            'state_party' => __('State Party', 'text-domain'),	    
            'candidate'   => __('Candidate Site', 'text-domain'),
        ),
    ));
}
add_action('customize_register', 'add_version_customizer_option');

// Sanitization function
function sanitize_version_option($input) {
    $valid_options = array('candidate', 'local_party', 'state_party');
    return in_array($input, $valid_options) ? $input : 'candidate';
}

?>