<?php
    if ( is_category() ) {
        $category           = get_category( get_query_var( 'cat' ) );
        $category_id        = $category->cat_ID;
        $category_image_id  = get_term_meta( $category_id, 'taxonomy-image-id', true );
        $category_image_src = wp_get_attachment_image_src( $category_image_id, array( 1600, 1067 ), false );
    }
?>

<div class="page-header" style="background-image: url(<?php echo esc_url( $category_image_src[0] ); ?>)">
    <div class="wrapper">
        <?php get_template_part( 'template-parts/page-header/avatar' ); ?>
        <?php get_template_part( 'template-parts/page-header/content' ); ?>
    </div>
</div><!-- .page-header -->