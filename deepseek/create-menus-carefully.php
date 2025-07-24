<?php

// Code written by DeepSeek to add new menu items.

// I (DeepSeek) dedicate these functions to the public domain. Anyone
// is free to copy, modify, distribute, and use this code for any
// purpose, commercial or non-commercial, without any restrictions or
// attribution requirements.

// Create a new menu if it doesn't exist
 function green_party_create_menu($menu_name = 'Green Party Menu') {
    $menu = wp_get_nav_menu_object($menu_name);
    
    if (!$menu) {
        return wp_create_nav_menu($menu_name);
    }
    return $menu->term_id;
}

// Create a new top-level menu item (can be link or dropdown container)
function green_party_create_top_level_item($menu_id,
                                           $title = 'Resources',
					   $url = '#',
					   $args = []) {
    $items = wp_get_nav_menu_items($menu_id);
    $defaults = [
        'menu-item-title'  => sanitize_text_field($title),
        'menu-item-url'    => esc_url_raw($url),
        'menu-item-status' => 'publish'
    ];
    $item_data = wp_parse_args($args, $defaults);

    // Check for existing top-level item by title (since URLs may vary)
    if ($items) {
        foreach ($items as $item) {
            if (!$item->menu_item_parent && $item->title === $title) {
                return $item->ID;
            }
        }
    }
    
    return wp_update_nav_menu_item($menu_id, 0, $item_data);
}

// Create a dropdown container.
// This is a functon wrapper for top-level item function given above. 
function green_party_create_dropdown_container($menu_id, $title = 'Resources', $args = []) {
    return green_party_create_top_level_item($menu_id, $title, '#', $args);
}

// Create a submenu item within a dropdown
// Create a submenu item within a dropdown
function green_party_create_submenu_item($menu_id,
                                         $parent_id,
					 $title = 'Documents',
					 $url = '/documents',
					 $args = []) {
    $items = wp_get_nav_menu_items($menu_id);
    $defaults = [
        'menu-item-title'  => sanitize_text_field($title),
        'menu-item-url'    => esc_url_raw($url),
        'menu-item-status' => 'publish',
        'menu-item-parent-id' => $parent_id
    ];
    $item_data = wp_parse_args($args, $defaults);

    // Check for existing subitem under parent by title or URL
    if ($items) {
        foreach ($items as $item) {
            if ($item->menu_item_parent == $parent_id && 
                ($item->title === $title || $item->url === $url)) {
                return $item->ID;
            }
        }
    }
    
    return wp_update_nav_menu_item($menu_id, 0, $item_data);
}

// Create main menu
$menu_id = green_party_create_menu();

// Create regular top-level link
$home_id = green_party_create_top_level_item($menu_id,
                                             'Platform',
					     '/platform');


// Create dropdown container
$resources_id = green_party_create_dropdown_container($menu_id,'Take Action');

// Add items to dropdown
$docs_id = green_party_create_submenu_item($menu_id, $resources_id, '10 Key Values', '/10-key-values');
$docs_id = green_party_create_submenu_item($menu_id, $resources_id, '4 Pillars', '/4-pillars');


?>

    