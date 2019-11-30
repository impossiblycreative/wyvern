<?php

function wyvern_posts_block_categories_filter() {
    // Make sure our nonce is set & valid
    if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'wyvern_posts_block_categories_filter_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
        exit( "Excuse you?" );
    }

    // Set up our query
    $args = array( 'posts_per_page' => 8, 'cat' => $_REQUEST['category_ID'] );

    // Make our query
    $query = new WP_Query( $args );

    // Output our posts
    if ( $query->have_posts() ) :

        ob_start();

        while ( $query->have_posts() ): $query->the_post();
            get_template_part( 'template-parts/blocks/posts/post-card' );
        endwhile;
        
		wp_reset_postdata();
    endif;
    
    // No pagination, just a button to the archive page
    if ( $query->found_posts > 8 ) : 
    ?>
        <div class="button-container">
            <a class="button" href="<?php echo esc_url( get_category_link( $_REQUEST['category_ID'] ) ); ?>"><?php esc_html_e( 'See all posts in this category', 'wyvern' ); ?></a>
        </div>
    <?php
    endif;
    
    $output = ob_get_clean();
    echo $output;

	die();
}
add_action( 'wp_ajax_nopriv_wyvern_posts_block_categories_filter', 'wyvern_posts_block_categories_filter' );
add_action( 'wp_ajax_wyvern_posts_block_categories_filter', 'wyvern_posts_block_categories_filter' );