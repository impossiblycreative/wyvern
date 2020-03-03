<?php
/**
 * Template part for displaying the branding
 *
 * @package wyvern
 */

// Do we have a custom logo?
$footer_logo = get_theme_mod( 'footer_logo' );
$header_logo = '';

if ( has_custom_logo() ) {
    $header_logo = current( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ) );
}

$logo = !empty( $footer_logo ) ? $footer_logo : $header_logo;
?>

<div class="footer-logo">
    <?php if ( !empty( get_theme_mod( 'footer_statement' ) ) ) : ?>
        <p class="footer-statement"><?php echo wp_kses_post( get_theme_mod( 'footer_statement' ) ); ?></p>
    <?php endif; ?>
    <?php if ( !empty( $logo ) ) : ?>
        <img class="site-logo" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
    <?php endif; ?>
</div>