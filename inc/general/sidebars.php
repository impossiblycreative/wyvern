<?php

function wyvern_sidebars() {
    $primary_sidebar = array(
        'name' => __( 'Primary Sidebar', 'wyvern' ),
        'id' => 'primary-sidebar',
        'description' => __( 'Widgets in this area will be shown on all single posts and blog pages.', 'wyvern' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    );

    register_sidebar( $primary_sidebar );
}
add_action( 'widgets_init', 'wyvern_sidebars' );