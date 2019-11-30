<?php

/**
 * Registers our menus
 */
function wyvern_menus() {
    register_nav_menu( 'main-menu', __( 'Main Menu', 'wyvern' ) );
    register_nav_menu( 'footer-menu', __( 'Footer Menu', 'wyvern' ) );
}
add_action( 'after_setup_theme', 'wyvern_menus', 20 );