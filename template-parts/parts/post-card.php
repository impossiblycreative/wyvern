<?php 
    $post_id    = get_the_ID(); 
    $has_video  = !empty( get_post_meta( $post_id, 'featured_video', true ) ); 
?>

<div <?php post_class( 'post-card' ); ?>>
    <a class="post-card-image-container" href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
        <?php  if ( has_post_thumbnail( $post_id ) ) : ?>
            <?php echo get_the_post_thumbnail( $post_id, 'post-card', array( 'class' => 'post-card-image' ) ); ?>

            <?php if ( $has_video ) : ?>
                <span class="video-icon fas fa-video"></span>
            <?php endif; ?>
        <?php endif; ?>
    </a>

    <div class="post-card-content">
        <?php get_template_part( 'template-parts/parts/categories-list' ); ?>

        <?php get_template_part( 'template-parts/parts/post-title' ); ?>

        <?php get_template_part( 'template-parts/parts/post-meta' ); ?>

        <?php get_template_part( 'template-parts/parts/post-excerpt' ); ?>

        <?php get_template_part( 'template-parts/parts/read-more-link' ); ?>
    </div>
</div>