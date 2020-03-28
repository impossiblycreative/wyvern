<?php
/**
 * The single post template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */

get_header();
?>

<div class="wrapper page-content">
	<?php echo wyvern_get_breadcrumbs(); ?>
	<main id="site-main" class="main" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				if( have_posts() ) {
					while( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content', get_post_format() );
					}
				}
			?>
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php
			get_template_part( 'template-parts/parts/author-box' );

			get_template_part( 'template-parts/parts/post-navigation' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
	</main><!-- #site-main -->

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();