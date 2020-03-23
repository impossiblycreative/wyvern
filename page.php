<?php
/**
 * The template for displaying all standard pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */

get_header();

// Get the background image
$page_header_background = get_the_post_thumbnail_url( get_the_ID(), 'page-header-background' );
$page_header_classes = 'page-header entry-header';
$page_header_style = '';

// Make sure we have a background image before setting up the style string
if ( $page_header_background ) {
	$page_header_classes = $page_header_classes . ' has-background-image';
	$page_header_style = 'style=" background-image: url('. esc_url( $page_header_background ) . ');"';
}

// Sett all of our attributes
$page_header_attributes = 'class="' . $page_header_classes . '"' . $page_header_style;
?>

<div <?php echo $page_header_attributes; ?>>
	<h1 class="entry-title page-title"><?php echo esc_html( get_the_title() ); ?></h1>
</div>

<div class="page-content">
	<main id="site-main" class="main" role="main">
		<?php
			if( have_posts() ) {
				while( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/content', 'page' );
				}
			}
		?>
	</main><!-- #site-main -->
</div>

<?php
get_footer();