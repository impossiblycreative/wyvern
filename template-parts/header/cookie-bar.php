<?php
    $site_title = get_bloginfo( 'name' );
    $site_title = sanitize_title( $site_title );
	$cookie_name = $site_title . '_cookie_consent';
    $has_cookie = isset( $_COOKIE[$cookie_name] );

    $nonce = wp_create_nonce( 'wyvern_cookie_button_nonce' );

    $default_text = esc_html__( 'This site uses cookies to enhance your experience.', 'wyvern' );
    $default_button_text = esc_html__( 'Learn More', 'wyvern' ); 

    $cookie_text = get_theme_mod( 'cookie_notice_text' );
    $cookie_page = get_theme_mod( 'cookie_notice_page' );
    $cookie_button_text = get_theme_mod( 'cookie_notice_button_text' );

    if ( empty( $cookie_text ) ) {
        $cookie_text = $default_text;
    }

    if ( empty( $cookie_button_text ) ) {
        $cookie_button_text = $default_button_text;
    }
?>

<div class="cookie-bar <?php echo $has_cookie ? 'hide' : 'show'; ?>">
    <p class="cookie-bar-text"><?php echo esc_html( $cookie_text ) ?></p>
    <button id="cookie-button" data-nonce="<?php echo $nonce; ?>"><?php esc_html_e( 'Okay', 'wyvern' ); ?></button>
    <a class="button" href="<?php echo esc_url( get_the_permalink( $cookie_page ) ); ?>"><?php echo esc_html( $cookie_button_text ); ?></a>
</div>