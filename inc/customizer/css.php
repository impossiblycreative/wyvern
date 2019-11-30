<?php
/**
 * Wyvern Theme Customizer Styles
 *
 * @package Wyvern
 */

/**
 * Prints the style block for the customizer controls
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wyvern_customizer_css() {
?>
<style type="text/css">
</style>
<?php
}
add_action( 'wp_head', 'wyvern_customizer_css' );