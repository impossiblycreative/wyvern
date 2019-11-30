<?php $post_id = get_the_ID(); ?>

<h2 class="post-title">
    <a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
        <?php echo esc_html( get_the_title( $post_id ) ); ?>
    </a>
</h2>