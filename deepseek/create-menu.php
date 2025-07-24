<?php
function create_green_party_menu() {
    // Register the primary menu location
    register_nav_menu('primary', __('Primary Menu'));

    // Check if the menu already exists
    $menu_name = 'Green Party';
    $menu_location = 'primary';
    $menu = wp_get_nav_menu_object($menu_name);
    
    if (!$menu) {
        // Create the menu if it doesn't exist
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Create menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Home'),
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish'
        ));
        
        // Create parent dropdown item
        $parent_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Party'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => 0
        ));
        
        // Create dropdown children
        $submenu_items = array(
            'State Party' => 'https://MyServer.com',
            'Local Party' => 'https://MyServer.com'
        );
        
        foreach ($submenu_items as $title => $url) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => __($title),
                'menu-item-url' => esc_url($url),
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $parent_id
            ));
        }
    }
    
    // Set menu location (overwrites existing primary menu)
    $locations = (array) get_theme_mod('nav_menu_locations');
    $locations[$menu_location] = $menu->term_id ?? $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}
add_action('after_setup_theme', 'create_green_party_menu');
?>