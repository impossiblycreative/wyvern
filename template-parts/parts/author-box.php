<div class="author-box">
    <div class="author-image-container">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
            <?php echo get_avatar( 
                get_the_author_meta( 'ID' ), 
                100, 
                '', 
                get_the_author_meta( 'display_name' ),
                array( 'class' => 'author-image' )
            ); ?>
        </a>
    </div>
    
    <div class="author-description">
        <a class="author-name-link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
            <span class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
        </a>
        <div class="author-bio"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></div>
    </div>
</div>