<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */
?>

<?php
    $featured_video     = get_post_meta( get_the_ID(), 'featured_video', true );
    $has_featured_image = has_post_thumbnail();
?>

<header class="<?php echo $has_featured_image ? 'entry-header has-image' : 'entry-header' ; ?>">
    <?php if ( $has_featured_image ) : ?>
        <div class="featured-image-container">
            <?php the_post_thumbnail( 'single-post', array( 'class' => 'entry-header-image' ) ); ?>

        <?php if ( !empty( $featured_video ) ) : ?>
            <div class="featured-video-container">
                <?php echo wp_oembed_get( $featured_video, array( 'showinfo' => 0, 'modestbranding' => 1 ) ); ?>
            </div>
        <?php endif; ?>
        </div>
    <?php endif; ?>

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

