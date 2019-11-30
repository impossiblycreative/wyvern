<?php $post_id = get_the_ID(); ?>

<a class="read-more" href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
    <span class="button read-more-button">
        <span class="read-more-text">
            <span><?php esc_html_e( 'Read More', 'wyvern' ); ?></span>
            <span class="screen-reader-text">... of <?php esc_html( get_the_title( $post_id ) ); ?></span>
        </span>
        <span class="icon fas fa-book-reader"></span>
    </span>
</a>