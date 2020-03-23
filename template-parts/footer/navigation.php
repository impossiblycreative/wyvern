<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
    <nav id="footer-menu" class="footer-menu-container" aria-label="Primary">
        <?php wp_nav_menu( array( 'container' 		=> false, 'theme_location' 	=> 'footer-menu' ) ); ?>
    </nav>
<?php endif; ?>