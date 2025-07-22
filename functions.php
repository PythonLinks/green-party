<?php
/** 
 * Functions file.
 * 
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
}
    else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
}

if (! has_nav_menu( 'primary')){
   register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'green-party' ),
) );}

add_action( 'after_setup_theme', 'register_navwalker' );

// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140;// this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
}


// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = apply_filters('bootstrap_basic4_column_left', 3);
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = apply_filters('bootstrap_basic4_column_right', 3);
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
    $bootstrapbasic4_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to auto register widgets.
$AutoRegisterWidgets = new BootstrapBasic4\Widgets\AutoRegisterWidgets();
$AutoRegisterWidgets->registerAll();
unset($AutoRegisterWidgets);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Display theme help page for admin.
$ThemeHelp = new \BootstrapBasic4\Controller\ThemeHelp();
$ThemeHelp->addActionsFilters();
unset($ThemeHelp);

 function weplugins_execute_on_dynamic_sidebar_before_event($index, $has_widgets) {
        if ($index === 'sidebar-left') {
            $social_file = get_template_directory() . '/cagreens/social.html';
            if (file_exists($social_file)) {
                echo file_get_contents($social_file);
            }
        }
   }


add_action('dynamic_sidebar_before', 'weplugins_execute_on_dynamic_sidebar_before_event', 10, 2);

function get_logo_html() {
    // Query for attachment with exact title "Logo"
    $logo = get_posts(array(
        'post_type'      => 'attachment',
        'title'          => 'Logo',
        'posts_per_page' => 1,
        'post_status'    => 'inherit'
    ));

    // Exit if no logo found
    if (empty($logo)) {
        return '';
    }

    $logo_id = $logo[0]->ID;
    
    // Get image source data
    $logo_src = wp_get_attachment_image_src($logo_id, 'full');
    if (!$logo_src) {
        return '';
    }

    // Extract image properties
    list($src, $width, $height) = $logo_src;
    
    // Get alt text (always include, even if empty)
    $alt_text = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
    
    // Get attachment title (for optional title attribute)
    $attachment_title = get_the_title($logo_id);
    
    // Start building image tag
    $html = '<img src="' . esc_url($src) . '" width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" alt="' . esc_attr($alt_text) . '"';
    
    // Add title attribute only if it exists and is not empty
    if (!empty($attachment_title)) {
        $html .= ' title="' . esc_attr($attachment_title) . '"';
    }
    
    $html .= '>';

    return $html;
}


include "options/theme-options.php";
include "options/candidate-options.php";
//<?php echo get_logo_html(); ?>