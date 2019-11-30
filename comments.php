<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wyvern
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
    <h2 class="comments-title"><?php esc_html_e( 'Comments', 'wyvern' ); ?></h2>

    <?php
        $comment_nav_args = array(
            'prev_text' => '<span class="fas fa-arrow-left"></span> ' . esc_html__( 'Older Comments', 'wyvern' ),
            'next_text' => esc_html__( 'Newer Comments', 'wyvern' ) . ' <span class="fas fa-arrow-right"></span>'
        );
    ?>

    <?php the_comments_navigation( $comment_nav_args ); ?>

    <ol class="comment-list">
        <?php
            wp_list_comments(
                array(
                    'avatar_size' => 48,
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'format'      => 'html5',
                )
            );
        ?>
    </ol><!-- .comment-list -->

    <?php
        the_comments_navigation( $comment_nav_args );

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) {
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wyvern' ); ?></p>
            <?php
        }
    endif; 

	comment_form( array( 'format' => 'html5' ) );
    ?>

</div><!-- #comments -->