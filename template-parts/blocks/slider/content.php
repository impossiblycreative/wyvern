<?php $post_id = get_the_ID(); ?>

<a class="slide-image-container" href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
    <?php 
    if ( has_post_thumbnail( $post_id ) ) {
        echo get_the_post_thumbnail( $post_id, 'slide', array( 'class' => 'slide-image' ) );
    }
    ?>
</a>

<div class="slide-content">
    <?php get_template_part( 'template-parts/parts/categories-list' ); ?>

    <?php get_template_part( 'template-parts/parts/post-title' ); ?>

    <?php get_template_part( 'template-parts/parts/post-meta' ); ?>

    <?php get_template_part( 'template-parts/parts/post-excerpt' ); ?>

    <?php get_template_part( 'template-parts/parts/read-more-link' ); ?>
</div>