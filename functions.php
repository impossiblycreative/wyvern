<?php
/**
 * Wyvern functions and definitions. This file is a jumping-off point. The individual categories of functions are broken off into
 * separate files for easier maintenance.
 *
 * @package Wyvern
 */

// General functionality
require get_template_directory() . '/inc/general/scripts-styles.php';
require get_template_directory() . '/inc/general/theme-supports.php';
require get_template_directory() . '/inc/general/image-sizes.php';
require get_template_directory() . '/inc/general/menus.php';
require get_template_directory() . '/inc/general/sidebars.php';
require get_template_directory() . '/inc/general/body-class.php';
require get_template_directory() . '/inc/general/content.php';
require get_template_directory() . '/inc/general/breadcrumbs.php';


// Widgets
require get_template_directory() . '/inc/widgets/register-widgets.php';


// AJAX functionality
require get_template_directory() . '/inc/ajax/posts-block-categories-filter.php';
require get_template_directory() . '/inc/ajax/cookie-button.php';
require get_template_directory() . '/inc/ajax/like-button.php';


// Classes
require get_template_directory() . '/inc/classes/class-wyvern-nav-walker.php';


// Customizer
require get_template_directory() . '/inc/customizer/register.php';

add_theme_support( 'responsive-embeds' );