<?php
$post_id = get_the_ID();
$nonce = wp_create_nonce( 'wyvern_like_button_nonce' );
$like_link = admin_url( 'admin-ajax.php?action=wyvern_like_button&post_id=' . $post_id . '&nonce=' . $nonce );
$tweet_url = 'https://twitter.com/intent/tweet?text=' . '' . '&hashtags=' . '' ;
$pinterest_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
?>
<ul class="social-action-buttons">
    <li class="social-action-button">
        <a id="like-button" class="button like" href="<?php echo esc_url( $like_link ); ?>" data-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
            <span class="fas fa-heart"></span>
            <span class="button-text"><?php esc_html_e( 'I liked this', 'wyvern' ); ?></span>
        </a>
    </li>
    <li class="social-action-button">
        <a class="button facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink( $post_id ) ); ?>" target="_blank">
            <span class="fab fa-facebook"></span>
            <span class="button-text"><?php esc_html_e( 'Share on Facebook', 'wyvern' ); ?></span>
            <span class="screen-reader-text"><?php esc_html_e( ', Opens in a new window', 'wyvern' ); ?></span>
        </a>
    </li>
    <li class="social-action-button">
        <a class="button twitter" href="<?php echo esc_url( $tweet_url ); ?>" target="_blank">
            <span class="fab fa-twitter"></span>
            <span class="button-text"><?php esc_html_e( 'Tweet about it', 'wyvern' ); ?></span>
            <span class="screen-reader-text"><?php esc_html_e( ', Opens in a new window', 'wyvern' ); ?></span>
        </a>
    </li>
    <li class="social-action-button">
        <a class="button pinterest" count-layout="vertical" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink( $post_id ) ); ?>&media=<?php echo esc_url( $pinterest_image[0] ); ?>&description=<?php esc_html( get_the_title( $post_id ) ); ?>" target="_blank">
            <span class="fab fa-pinterest"></span>
            <span class="button-text"><?php esc_html_e( 'Pin it', 'wyvern' ); ?></span>
            <span class="screen-reader-text"><?php esc_html_e( ', Opens in a new window', 'wyvern' ); ?></span>
        </a>
    </li>
</ul>