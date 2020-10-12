<?php

/**
 * Registers support for various WordPress features.
 */
function wyvern_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    */
    add_theme_support( 'title-tag' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'wyvern_setup', 20 );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 * 
 * CREDIT: David Wolfpaw - Velox theme - https://github.com/davidwolfpaw/velox-theme
 */
function wyvern_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wyvern_content_width', 720 );
}
add_action( 'after_setup_theme', 'wyvern_content_width', 0 );