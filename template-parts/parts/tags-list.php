<?php
$post_id = get_the_ID();
$post_tags = get_the_tags( $post_id );

if ( $post_tags ) {
?>
<div class="post-tags">
    <span class="tags-list-label">
        <span class="fas fa-tags"></span>
        <span class="tags-list-label-text">
            <?php
                esc_html_e( 'Tagged With: ', 'wyvern' );
            ?>
        </span>
    </span>
<?php
    echo '<ul class="tags-list">';

    foreach( $post_tags as $tag) {
        $current_tag = get_category( $tag );
    ?>
        <li class="tags-list-item">
            <a href="<?php echo esc_url( get_tag_link( $current_tag->term_id ) ); ?>">
                <?php echo esc_html( $current_tag->name ); ?>
            </a>
        </li>
    <?php
    }
?>
    </ul>
</div>
<?php
}