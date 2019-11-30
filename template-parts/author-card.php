<div class="author-card">
    <?php
        echo get_avatar(
            $author_id, 
            300, 
            '', 
            get_the_author_meta( 'display_name' ),
            array( 'class' => 'author-image' )
        );
    ?>
    <div class="author-content">
        <div class="author-description"><?php echo esc_html( get_the_author_meta( 'description', $author_id ) ); ?></div>

        <a class="button" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $author_id ), get_the_author_meta( 'user_nicename', $author_id ) ); ?>">
            <span><?php esc_html_e( 'See all posts by ', 'wyvern' ); ?></span>
            <span><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></span>
        </a>
    </div>
</div>