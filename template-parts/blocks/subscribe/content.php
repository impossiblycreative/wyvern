<?php
if ( !empty( get_theme_mod( 'newsletter_signup_form_name' ) ) ) {
    $newsletter_form_name = esc_html( get_theme_mod( 'newsletter_signup_form_name' ) );

    if ( !empty( get_theme_mod( 'newsletter_signup_form_prompt' ) ) ) {
    ?>
        <h2 class="subscribe-block-title"><?php echo esc_html( get_theme_mod( 'newsletter_signup_form_prompt' ) ); ?></h2>
    <?php
    }

    if ( function_exists( 'gravity_form' ) ) {
        gravity_form( $newsletter_form_name, false, false, false, '', true, 0 );
    }
} else {
    esc_html_e( 'Newsletter form not found.', 'wyvern' );
}