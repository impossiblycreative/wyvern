<?php
/**
 * The template for displaying blog pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wyvern
 */


get_header();
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

                    get_template_part( 'template-parts/parts/post-card' );
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