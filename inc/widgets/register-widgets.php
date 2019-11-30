<?php
// Include class files
require_once get_stylesheet_directory() . '/inc/widgets/class-wyvern-popular-posts-widget.php';

// Register all of our widgets
function wyvern_register_widgets() {
	register_widget( 'Wyvern_Popular_Posts_Widget' );
}
add_action( 'widgets_init', 'wyvern_register_widgets' );