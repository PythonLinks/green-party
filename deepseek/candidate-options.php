<?php
function gpt_candidate_customizer($wp_customize) {
     $org_type = get_theme_mod('organization_option');
     //echo $org_type;
     
    // Only display this form, if this is a candidate
    if ($org_type !== 'candidate') {
        return;;
    }


    // Create Candidate Section
    $wp_customize->add_section('green_party_candidate_section', array(
        'title'    => __('Candidate Information', 'green-party'),
        'priority' => 30,
    ));

    // Office Field
    $wp_customize->add_setting('green_party_candidate_title');
    $wp_customize->add_control('green_party_candidate_title_control', array(
        'label'       => __('Office', 'green-party'),
        'description' => __('Which office are they running for?', 'green-party'),
        'section'     => 'green_party_candidate_section',
        'settings'    => 'green_party_candidate_title',
        'type'        => 'text',
        'input_attrs' => array('minlength' => 1),
    ));

    // Location Field
    $wp_customize->add_setting('green_party_candidate_location');
    $wp_customize->add_control('green_party_candidate_location_control', array(
        'label'       => __('Jurisdiction / Location', 'green-party'),
        'description' => __('Where did they win election?', 'green-party'),
        'section'     => 'green_party_candidate_section',
        'settings'    => 'green_party_candidate_location',
        'type'        => 'text',
        'input_attrs' => array('minlength' => 1),
    ));

    // Political Party (ballotStatus)
    $wp_customize->add_setting('green_party_candidate_ballotStatus', array(
        'default' => 'Green Party',
    ));
    $wp_customize->add_control('green_party_candidate_ballotStatus_control', array(
        'label'   => __('Political Party', 'green-party'),
        'section' => 'green_party_candidate_section',
        'settings' => 'green_party_candidate_ballotStatus',
        'type'    => 'select',
        'choices' => array(
            'Democrat' => 'Democrat',
            'Green Party' => 'Green Party',
            'Peace And Freedom' => 'Peace And Freedom',
            'Independent' => 'Independent',
            'Libertarian' => 'Libertarian',
            'Party for Socialism and Liberation' => 'Party for Socialism and Liberation',
            'Socialist' => 'Socialist',
            'Progressive Party' => 'Progressive Party',
            'People\'s Party' => 'People\'s Party',
        ),
    ));

    // On Ballot Status
    $wp_customize->add_setting('green_party_candidate_onBallot', array(
        'default' => 'No',
    ));
    $wp_customize->add_control('green_party_candidate_onBallot_control', array(
        'label'   => __('On Ballot', 'green-party'),
        'section' => 'green_party_candidate_section',
        'settings' => 'green_party_candidate_onBallot',
        'type'    => 'select',
        'choices' => array(
            'Yes' => 'Yes',
            'No' => 'No',
            'Write In' => 'Write In',
        ),
    ));

    // Endorsed Status
    $wp_customize->add_setting('green_party_candidate_endorsed', array(
        'default' => 'Undecided',
    ));
    $wp_customize->add_control('green_party_candidate_endorsed_control', array(
        'label'   => __('Endorsed by the State Green Party', 'green-party'),
        'section' => 'green_party_candidate_section',
        'settings' => 'green_party_candidate_endorsed',
        'type'    => 'select',
        'choices' => array(
            'Endorsed' => 'Endorsed',
            'Neutral' => 'Neutral',
            'Opposed' => 'Opposed',
            'Undecided' => 'Undecided',
        ),
    ));


    // Election Result
    $wp_customize->add_setting('green_party_candidate_result', array(
        'default' => '',
    ));
    $wp_customize->add_control('green_party_candidate_result_control', array(
        'label'       => __('Election Result', 'green-party'),
        'description' => __('Did they win or lose?', 'green-party'),
        'section'     => 'green_party_candidate_section',
        'settings'    => 'green_party_candidate_result',
        'type'        => 'select',
        'choices'     => array(
            '' => 'Select Result',
            'Won' => 'Won',
            'Lost' => 'Lost',
        ),
    ));
}
if ( ! has_action('customize_register', 'gpt__candidate_customizer')){
       add_action('customize_register', 'gpt__candidate_customizer');
}
?>