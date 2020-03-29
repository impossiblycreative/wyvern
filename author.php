<?php
/**
 * The template for displaying author archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wyvern
 */

get_header(); 

/*
* Queue the first post, that way we know
* what author we're dealing with (if that is the case).
*
* We reset this later so we can run the loop
* properly with a call to rewind_posts().
*/
if( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/page-header/page-header' );
    ?>

    <div class="wrapper page-content">
        <main id="site-main" class="main" role="main">
            <div class="posts">
                <?php
                    /*
                    * Since we called the_post() above, we need to
                    * rewind the loop back to the beginning that way
                    * we can run the loop properly, in full.
                    */
                    rewind_posts();

                    while ( have_posts() ) {
                        the_post();

                        get_template_part( 'template-parts/parts/post-card' );
                    }
                ?>
            </div>
                <?php
                    get_template_part( 'template-parts/parts/pagination' );
                    wp_reset_postdata();
                ?>
        </main><!-- #site-main -->

        <?php get_sidebar(); ?>
    </div>
    <?php
} else {
?>
    <div class="wrapper page-content">
        <main id="site-main" class="main" role="main">
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        </main><!-- #site-main -->

        <?php get_sidebar(); ?>
    </div>
<?php
}

get_footer();