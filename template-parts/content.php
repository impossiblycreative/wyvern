<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */
?>

<header class="<?php echo has_post_thumbnail() ? 'entry-header has-image' : 'entry-header' ; ?>">
    <?php 
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'single-post', array( 'class' => 'entry-header-image' ) );
    }
    ?>
    <div class="entry-header-content">
        <?php get_template_part( 'template-parts/parts/categories-list' ); ?>

        <h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1>

        <?php get_template_part( 'template-parts/parts/post-meta' ); ?>
    </div>
</header><!-- .entry-header -->

<div class="entry-content">
    <?php $disclaimer_page = get_theme_mod( 'affiliate_link_notification_page' ); ?>

    <?php if ( $disclaimer_page ) : ?>
    <p class="affiliate-notice">
        <?php echo esc_html( get_theme_mod( 'affiliate_link_notification_text' ) ); ?>
        <a class="disclaimer-link" href="<?php echo esc_url( get_permalink( $disclaimer_page ) ); ?>">
            <?php echo esc_html( get_the_title( $disclaimer_page ) ); ?>
        </a>
    </p>
    <?php endif; ?>

    <?php the_content(); ?>
</div><!-- .entry-content -->

<footer class="entry-footer">
    <?php get_template_part( 'template-parts/parts/tags-list' ); ?>
    <?php get_template_part( 'template-parts/parts/social-action-buttons' ); ?>
</footer><!-- .entry-footer -->

