<?php
$categories = get_categories( array( 'orderby' => 'name', 'parent'  => 0 ) );
$nonce = wp_create_nonce( 'wyvern_posts_block_categories_filter_nonce' );

if ( $categories ) : ?>
    <ul id="posts-block-categories-filter" class="categories-filter">
        <li class="category-filter current">
            <a href="javascript: void(0)" data-nonce="<?php echo $nonce; ?>" data-category="0" data-category-name="<?php esc_html_e( 'All categories', 'wyvern' ); ?>" title="<?php esc_html_e( 'Display posts from all categories', 'wyvern' ); ?>"><?php esc_html_e( 'All', 'wyvern' ); ?></a>
        </li>            

        <?php foreach ( $categories as $category ) { ?>
            <li class="category-filter">
                <a href="javascript: void(0)" data-category="<?php echo esc_html( $category->term_id ); ?>" data-category-name="<?php echo esc_html( $category->name ); ?>" data-nonce="<?php echo $nonce; ?>" title="<?php esc_html_e( 'Display posts from the ', 'wyvern' ); echo esc_html( $category->name ); esc_html_e( ' category.', 'wyvern' ); ?>">
                    <?php echo esc_html( $category->name ); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php endif; ?>


<div id="posts-block-filter-description" class="screen-reader-text" aria-live="polite" aria-atomic="true">
    <?php esc_html_e( 'Currently displaying posts from all categories.', 'wyvern' );?>
</div>

<div id="posts-block-posts" class="posts">
    <?php
        if ( have_posts() ) {
            while( have_posts() ) {
                the_post();

                get_template_part( 'template-parts/blocks/posts/post-card' );
            }
            
            get_template_part( 'template-parts/parts/pagination' );
            wp_reset_postdata();
        }
    ?>
</div>