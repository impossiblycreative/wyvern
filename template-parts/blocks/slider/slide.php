<?php extract( $wp_query->query_vars ); ?>

<div id="slide-<?php echo esc_html( $slide_number ); ?>" class="slide">
    <?php get_template_part( 'template-parts/blocks/slider/content' ); ?>
</div>