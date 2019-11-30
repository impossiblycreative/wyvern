<?php
/**
 * The search template, handling search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */

get_header();
get_template_part( 'template-parts/page-header/page-header' );
?>

<div class="wrapper page-content">
    <main id="site-main" class="main" role="main">
        <?php
            if ( have_posts() ) {
            ?>
                <div class="posts">
            <?php
                while ( have_posts() ) {
                    the_post();

                    get_template_part( 'template-parts/blocks/posts/post-card' );
                }

                get_template_part( 'template-parts/parts/pagination' );
                wp_reset_postdata();
            ?>
            </div>
            <?php
            } else {
                get_template_part( 'template-parts/content', 'none' );
            }
        ?>
    </main><!-- #site-main -->

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();