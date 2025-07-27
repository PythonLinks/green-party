<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--WordPress head-->
        <?php wp_head(); ?> 
        <!--end WordPress head-->
    </head>
    <body <?php body_class(); ?>>
        <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        }
        ?> 
        <div class="<?php echo $container_class; ?> page-container">
            <header class="page-header page-header-sitebrand-topbar">
            <?php include 'navwalker-menu.php';?>
            </header><!--.page-header-->

            <div id="content" class="site-content row row-with-vspace">