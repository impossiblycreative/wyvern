<?php $post_id = get_the_ID(); ?>

<p class="post-excerpt"><?php echo esc_html( get_the_excerpt( $post_id ) ); ?></p>