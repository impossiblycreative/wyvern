<?php

function wyvern_like_button() {
    // Make sure our nonce is set & valid
    if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'wyvern_like_button_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
        exit( "Excuse you?" );
    }
 
    $likes = get_post_meta( $_REQUEST['post_id'], '_wyvern_likes', true );
    $likes = ( empty( $likes ) ) ? 0 : $likes;
    $new_likes = $likes + 1;
 
    update_post_meta( $_REQUEST['post_id'], '_wyvern_likes', $new_likes );
 
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo $new_likes;
        die();
    }
    else {
        wp_redirect( get_permalink( $_REQUEST['post_id'] ) );
        exit();
    }
}
add_action( 'wp_ajax_nopriv_wyvern_like_button', 'wyvern_like_button' );
add_action( 'wp_ajax_wyvern_like_button', 'wyvern_like_button' );