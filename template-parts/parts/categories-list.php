<?php
$post_id = get_the_ID();
$post_categories = wp_get_post_categories( $post_id );

if ( $post_categories ) {
    echo '<ul class="categories-list">';

    foreach( $post_categories as $category) {
        $current_cat = get_category( $category );
    ?>
        <li class="categories-list-item">
            <a href="<?php echo esc_url( get_category_link( $current_cat ) ); ?>"><?php echo esc_html( $current_cat->name ); ?></a>
        </li>
    <?php
    }

    echo '</ul>';
}
?>