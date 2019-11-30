<?php

// Set our custom excerpt length
add_filter( 'excerpt_length', function( $length ) {
    return 20;
} );

// Replaces the excerpt "Read More" text
function wyvern_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'wyvern_excerpt_more');

// Removes the intro text from the archive titles
function wyvern_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_search() ) {
        $title = 'Search Results for: "' . get_search_query() . '"';
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'wyvern_archive_title' );

// Limit the number of posts per page on an archive
function wyvern_archive_query( $query ){
    if( ! is_admin() && $query->is_archive() && $query->is_main_query() ){
        $query->set( 'posts_per_page', 6 );
    }
}
add_action( 'pre_get_posts', 'wyvern_archive_query' );