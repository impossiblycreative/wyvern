<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */
?>


<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
        <div class="entry-header-content">
            <?php if ( is_author() ) : ?>
                <h2 class="entry-title"><?php esc_html_e( 'No posts yet!', 'wyvern' ); ?></h2>
            <?php else : ?>
                <h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'wyvern' ); ?></h2>
            <?php endif; ?>
        </div>
	</header><!-- .entry-header -->

    <div class="entry-content">
        <?php if ( is_author() ) : ?>
            <p><?php esc_html_e( 'This author has not published any posts yet.', 'wyvern' ); ?></p>
        <?php else : ?>
            <p><?php esc_html_e( 'Please try another search term.', 'wyvern' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- .no-results -->