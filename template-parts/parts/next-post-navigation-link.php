<?php extract( $wp_query->query_vars ); ?>

<a class="post-navigation-link next-post-link" href="<?php echo esc_url( get_the_permalink( $next_id ) ); ?>">
    <span class="post-nav-text">
        <span class="post-nav-label"><?php esc_html_e( 'Next Post:', 'wyvern' ); ?></span>
        <span class="post-nav-title"><?php echo esc_html( get_the_title( $next_id ) ); ?></span>
    </span>

    <span class="post-nav-image-container">
        <span class="scrim">
            <span class="fas fa-arrow-right"></span>
        </span>
        
        <?php echo get_the_post_thumbnail( $next_id, 'post-nav', array( 'class' => 'post-nav-image' ) ); ?>
    </span>
</a>