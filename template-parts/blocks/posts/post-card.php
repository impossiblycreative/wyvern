<?php $post_id = get_the_ID(); ?>

<div <?php post_class( 'post-card' ); ?>>
    <a class="post-card-image-container" href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
    <?php 
    if ( has_post_thumbnail( $post_id ) ) {
        echo get_the_post_thumbnail( $post_id, 'post-card', array( 'class' => 'post-card-image' ) );
    }
    ?>
    </a>

    <div class="post-card-content">
        <?php get_template_part( 'template-parts/parts/categories-list' ); ?>

        <?php get_template_part( 'template-parts/blocks/posts/post-card-title' ); ?>

        <?php get_template_part( 'template-parts/parts/post-meta' ); ?>

        <?php get_template_part( 'template-parts/parts/post-excerpt' ); ?>

        <?php get_template_part( 'template-parts/parts/read-more-link' ); ?>
    </div>
</div>