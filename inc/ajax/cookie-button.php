<?php

function wyvern_cookie_button() {
    // Make sure our nonce is set & valid
    if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'wyvern_cookie_button_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
        exit( "Excuse you?" );
    }

    // Set the cookie for a year
    $expires = strtotime('+1 year');

    // Set up the cookie name
    $site_title = get_bloginfo( 'name' );
    $site_title = sanitize_title( $site_title );
    $cookie_name = $site_title . '_cookie_consent';

    if ( !isset( $_COOKIE[$cookie_name] ) ) {
        setcookie( $cookie_name, 'okay', $expires, '/', $_SERVER['HTTP_HOST'] );
    }

    die();
}
add_action( 'wp_ajax_nopriv_wyvern_cookie_button', 'wyvern_cookie_button' );
add_action( 'wp_ajax_wyvern_cookie_button', 'wyvern_cookie_button' );