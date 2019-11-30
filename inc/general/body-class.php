<?php

function gbn_body_class( $classes ) {
    if ( is_page_template( 'page-about.php' ) ) {
        $classes[] = 'page-about';
    }
    
    return array_filter($classes);
}
add_filter( 'body_class', 'gbn_body_class' );