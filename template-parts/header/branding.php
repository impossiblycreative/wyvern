<?php
/**
 * Template part for displaying the branding
 *
 * @package wyvern
 */

// Do we have a custom logo?
if ( has_custom_logo() ) : 
    $site_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

    if ( is_front_page() ) : ?>
    <h1 class="site-title">
        <a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img class="site-logo" src="<?php echo esc_url( current( $site_logo ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        </a>
    </h1>
        <?php else : ?>
        <a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img class="site-logo" src="<?php echo esc_url( current( $site_logo ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        </a>
    <?php endif; ?>

<?php else: 
    if ( is_front_page() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    <?php endif; ?>
<?php endif; ?>