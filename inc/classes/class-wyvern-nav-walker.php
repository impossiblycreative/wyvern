<?php

class Wyvern_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $title = $item->title;
        $permalink = $item->url;
        $classes = $item->classes;

        // Set the depth class
        $depth_class = 'menu-level-' . $depth;
        $classes[] = $depth_class;

        // Check if there is a submenu
        $dropdown = in_array( 'menu-item-has-children', $classes );
        
        // Open the list item, add aria-expanded if children present
        if ( $dropdown ) {
            $aria_text = 'aria-expanded="false"';
            $output .= '<li id="' . $item->ID . '" class="' . implode( ' ', $classes ) . '"' . ' data-menu-level="' . $depth . '"' . $aria_text . '>';
        } else {
            $output .= '<li id="' . $item->ID . '" class="' . implode( ' ', $classes ) . '"' . ' data-menu-level="' . $depth . '">';
        }

        // Use semantic markup/remove empty links
        if ( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<span class="menu-item-text">';
        }

        // Output the link text
        $output .= $title;

        // Close our link/span
        if ( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        // Add the caret if we have a dropdown
        if ( $dropdown ) {
            $output .= '<button class="sub-menu-activator" aria-haspopup="true" aria-expanded="false"><span class="screen-reader-text">' . esc_html__( 'Show sub-menu for ', 'wyvern' ) . $title . '</span><span class="fas fa-caret-down"></span></button>';
        }
    }
}