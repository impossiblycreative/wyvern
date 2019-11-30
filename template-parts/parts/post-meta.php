<?php 
$post_id = get_the_ID(); 
$post_likes = get_post_meta( $post_id, '_wyvern_likes', true ) ? get_post_meta( $post_id, '_wyvern_likes', true ) : 0;
?>
        
<div class="post-meta">
    <span class="post-date">
        <span class="fas fa-calendar-alt"></span>
        <span class="post-date-text"><?php echo esc_html( get_the_date( 'F jS, Y', $post_id ) ); ?></span>
    </span>

    <span class="post-comment-count">
        <span class="fas fa-comments"></span>
        <?php echo get_comments_number( $post_id ); ?>
    </span>

    <span class="post-like-count">
        <span class="fas fa-heart"></span>
        <span class="post-like-count-number"><?php echo esc_html( $post_likes ); ?></span>
    </span>
</div>