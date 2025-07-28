<?php

// Code written by DeepSeek to add new menu items.

// I (DeepSeek) dedicate these functions to the public domain. Anyone
// is free to copy, modify, distribute, and use this code for any
// purpose, commercial or non-commercial, without any restrictions or
// attribution requirements.




// Create a new menu if it doesn't exist
 function gpt_create_menu(
    $menu_name = 'Green Party Menu') {
 
    // Check if the menu already exists
    $menu = wp_get_nav_menu_object($menu_name);
    
    if (!$menu) {
      $new_menu =  wp_create_nav_menu($menu_name);

    $menu_location = 'primary';

    // Register the primary menu location
    register_nav_menu('primary', __('Primary Menu'));
    
    // Set menu location (overwrites existing primary menu)
    $locations = (array) get_theme_mod('nav_menu_locations');
    $locations[$menu_location] = $menu->term_id ?? $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

        return $new_menu ;
    }
    return $menu->term_id;
}

// Create a new top-level menu item (can be link or dropdown container)
function gpt_create_top_level_item($menu_id,
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
function gpt_create_dropdown_container($menu_id, $title = 'Resources', $args = []) {
    return gpt_create_top_level_item($menu_id, $title, '#', $args);
}

// Create a submenu item within a dropdown
// Create a submenu item within a dropdown
function gpt_create_submenu_item($menu_id,
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

function create_green_party_menu(){
     $menu_name = 'Green Party Menu';
 
    // Check if the menu already exists
    $menuExists = wp_get_nav_menu_object($menu_name);
    
    if ($menuExists) {
        return;}
    // Create main menu
    $menu_id = gpt_create_menu();

    // Top Level Home Link
    gpt_create_top_level_item($menu_id,
                                  'Home',
    			           '/');
				   
    $platform_id = gpt_create_dropdown_container(
                 $menu_id,'Platform');
    		 
    // Add items to Platform
    gpt_create_submenu_item($menu_id,
                                    $platform_id,
			            '10 Key Values',
			             '/10-key-values');
					       
    gpt_create_submenu_item($menu_id,
                                    $platform_id,
			            '4 Pillars',
			            '/4-pillars');
    
   // Take Action 
    $take_action_id = gpt_create_dropdown_container(
                 $menu_id,'Take Action');
    
     gpt_create_submenu_item($menu_id,
                                     $take_action_id,
				     'Register To Vote',
				     '[register_to_vote_URL]');
     gpt_create_submenu_item($menu_id,
                                     $take_action_id,
				     'Volunteer',
				     '/volunteer');
     gpt_create_submenu_item($menu_id,
                                    $take_action_id,
				    'Donate',
				    '[donations_Page_URL]');     
    
    // Top Level Contact Link
    gpt_create_top_level_item($menu_id,
                              'Contact',
                              '/contact');
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary-menu'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
    
}

if ( ! has_action('after_setup_theme', 'create_green_party_menu')){
       add_action('after_setup_theme', 'create_green_party_menu');
}


?>

    