<nav id="footer-menu" class="footer-menu-container" aria-label="Primary">
<?php
    if ( has_nav_menu( 'footer-menu' ) ) {
        wp_nav_menu( array(
            'container' 		=> false,
            'theme_location' 	=> 'footer-menu',
        ) );
    }
?>
</nav>