<?php extract( $wp_query->query_vars ); ?>

<a class="post-navigation-link prev-post-link" href="<?php echo esc_url( get_the_permalink( $prev_id ) ); ?>">
    <span class="post-nav-image-container">
        <span class="scrim">
            <span class="fas fa-arrow-left"></span>
        </span>
        
        <?php echo get_the_post_thumbnail( $prev_id, 'post-nav', array( 'class' => 'post-nav-image' ) ); ?>
    </span>
    
    <span class="post-nav-text">
        <span class="post-nav-label"><?php esc_html_e( 'Previous Post:', 'wyvern' ); ?></span>
        <span class="post-nav-title"><?php echo esc_html( get_the_title( $prev_id ) ); ?></span>
    </span>
</a>