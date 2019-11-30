<?php
/**
 * Template part for displaying the branding
 *
 * @package wyvern
 */

// Do we have a custom logo?
if ( has_custom_logo() ) : $site_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
    <div class="footer-logo">
        <img class="site-logo" src="<?php echo esc_url( current( $site_logo ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        <?php if ( !empty( get_theme_mod( 'footer_statement' ) ) ) : ?>
            <p class="footer-statement"><?php echo esc_html( get_theme_mod( 'footer_statement' ) ); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>