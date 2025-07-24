<?php
/**
 * Public Domain: Green Party Site Icon Display
 * Displays the site icon with accessibility attributes and responsive sizing
 */
function green_party_display_site_icon() {
    // Exit early if no site icon exists
    if (!has_site_icon()) {
        return '';
    }

    // Get site information
    $icon_url = get_site_icon_url();
    $site_name = get_bloginfo('name');
    
    // Prepare accessibility attributes
    $alt_text = $site_name ? esc_attr($site_name) : esc_attr__('Website Icon', 'green_party');
    $title_text = $site_name ? esc_attr($site_name) : esc_attr__('Visit our site', 'green_party');

    // Generate responsive image tag
    return sprintf(
        '<img src="%s" alt="%s" title="%s" style="max-width:60px;max-height:50px;height:auto;display:inline-block;">',
        esc_url($icon_url),
        $alt_text,
        $title_text
    );
}
?>
