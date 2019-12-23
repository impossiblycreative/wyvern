<?php
/**
 * Template part for displaying the header navigation
 *
 * @package Wyvern
 */
?>

<div class="header-navigation">
    <nav id="header-menu" class="main-menu-container" aria-label="Primary">
        <?php
            if ( has_nav_menu( 'main-menu' ) ) {
                wp_nav_menu( array(
                    'container' 		=> false,
                    'theme_location' 	=> 'main-menu',
                    'walker'            => new Wyvern_Walker_Nav_Menu(),
                ) );
            }
        ?>
        
        <div id="header-search" class="search-container">
            <button id="search-toggle" class="alt search-toggle" aria-expanded="false" aria-haspopup="true" title="<?php esc_html_e( 'Search', 'wyvern' ); ?>"><span class="fas fa-search"></span></button>
            <?php get_search_form(); ?>
        </div>
    </nav>
    
    <button id="mobile-menu-toggle" class="menu-toggle" aria-expanded="false" aria-haspopup="true" title="<?php esc_html_e( 'Menu', 'wyvern' ); ?>">
        <span class="fas fa-bars"></span>
        <span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'wyvern' ); ?></span>
    </button>
</div>