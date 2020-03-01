<?php

/**
 * Load theme assets
 */
function wyvern_load_theme_assets() {
	// Load main CSS file
	wp_enqueue_style( 'wyvern-styles', get_template_directory_uri() . '/css/build/main.min.css', NULL, '1.0.0', 'all' );

	// Google Fonts
	$primary_font 	= get_theme_mod( 'typography_font_primary' );
	$secondary_font = get_theme_mod( 'typography_font_secondary' );

	if ( $primary_font ) {
		if ( $secondary_font ) {
			wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=' . $primary_font . ':400,700|' . $secondary_font . '&display=swap' );
		} else {
			wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=' . $primary_font . ':400,700&display=swap' );
		}
	}

	// Font Awesome
	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/8ca253b275.js', NULL, NULL, false );

	// Load main JS file
	wp_enqueue_script( 'wyvern-scripts', trailingslashit( get_template_directory_uri() ) . 'js/scripts.js', array( 'jquery' ), NULL, true );

	// Cookie Bar - Only load if the cookie isn't set
    $site_title = get_bloginfo( 'name' );
    $site_title = sanitize_title( $site_title );
	$cookie_name = $site_title . '_cookie_consent';
	
	if ( ! isset( $_COOKIE[$cookie_name] ) ) {
		wp_enqueue_script( 'wyvern-cookie-button', trailingslashit( get_template_directory_uri() ) . 'js/cookie-button.js', array( 'jquery' ), NULL, true );
		wp_localize_script( 'wyvern-cookie-button', 'cookieButton', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	// Post Block Filters - only on the home page...for now
	if ( is_front_page() ) {
		// Enqueue the script
		wp_enqueue_script( 'wyvern-posts-block-filters', trailingslashit( get_template_directory_uri() ) . 'js/posts-block-filters.js', array( 'jquery' ), NULL, true );

		// Localize the scripts
		wp_localize_script( 'wyvern-posts-block-filters', 'categoriesFilter', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	// Like Button Scripts - Only needed on single posts
	if ( is_single() ) {
		// Enqueue the scripts
		wp_enqueue_script( 'wyvern-likes', trailingslashit( get_template_directory_uri() ) . 'js/likes.js', array( 'jquery' ), NULL, true );
		wp_enqueue_script( 'wyvern-progress-bar', trailingslashit( get_template_directory_uri() ) . 'js/progress-bar.js', array( 'jquery' ), NULL, true );

		// Localize the scripts
		wp_localize_script( 'wyvern-likes', 'likeButton', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'wyvern_load_theme_assets' );

/**
 * Load editor assets
 */
function wyvern_load_editor_assets() {
	add_editor_style( 'css/build/editor.css' );
}
add_action( 'after_setup_theme', 'wyvern_load_editor_assets' );