<div id="off-canvas-container" class="off-canvas-container">
	<?php get_template_part( 'template-parts/header/branding' ); ?>
    
    <button id="off-canvas-close" class="alt menu-toggle" title="<?php esc_html_e( 'Close', 'gbn' ); ?>">
        <span class="fas fa-times"></span>
        <span class="menu-toggle-text"><?php esc_html_e( 'Close', 'wyvern' ); ?></span>
    </button>

    <div class="search-container">
        <?php get_search_form(); ?>
    </div>

    <nav id="off-canvas-menu" class="off-canvas-menu-container" aria-label="Primary">
    <?php
        if ( has_nav_menu( 'main-menu' ) ) {
            wp_nav_menu( array(
                'container' 		=> false,
                'theme_location' 	=> 'main-menu',
                'walker'            => new Wyvern_Walker_Nav_Menu(),
            ) );
        }
    ?>
    <a class="button alt subscribe-button" href="/#subscribe-block"><?php esc_html_e( 'Subscribe', 'wyvern' ); ?></a>
    </nav>
</div>