<?php

// Get style controls from the customizer
$typography_font_primary    = str_replace( '+', ' ', get_theme_mod( 'typography_font_primary' ) );
$typography_font_secondary  = str_replace( '+', ' ', get_theme_mod( 'typography_font_secondary' ) );

$colors_header_background   = get_theme_mod( 'colors_header_background' );

$colors_nav_item            = get_theme_mod( 'colors_nav_item' );
$colors_nav_item_hover      = get_theme_mod( 'colors_nav_item_hover' );

$colors_footer_background   = get_theme_mod( 'colors_footer_background' );
?>

<style type="text/css">
    :root {
        /* Fonts */
        <?php if ( $typography_font_primary ) : ?>
            --font-plain: <?php echo esc_html( $typography_font_primary ); ?>, sans-serif;
        <?php endif; ?>
        <?php if ( $typography_font_secondary ) : ?>
            --font-special: <?php echo esc_html( $typography_font_secondary ); ?>, serif;
        <?php endif; ?>

        /* Header */
        --site-header-background-color: <?php echo esc_html( $colors_header_background ); ?>;

        /* Navigation */
        --nav-item-color: <?php echo esc_html( $colors_nav_item ); ?>;
        --nav-item-color-hover: <?php echo esc_html( $colors_nav_item_hover ); ?>;
        
        /* Footer */
        --site-footer-background-color: <?php echo esc_html( $colors_footer_background ); ?>;
    }
</style>