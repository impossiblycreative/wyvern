<?php
/**
 * The front page template (home page).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wyvern
 */

get_header();
?>

<main id="site-main" class="main" role="main">
	<section id="slider-block" class="home-block slider-block">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/blocks/slider/container' ); ?>
		</div>
	</section><!-- #slider-block -->

	<section id="posts-block" class="home-block posts-block">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/blocks/posts/container' ); ?>
		</div>
	</section><!-- #posts-block -->
	
	<section id="subscribe-block" class="home-block subscribe-block">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/blocks/subscribe/content' ); ?>
		</div>
	</section><!-- #subscribe-block -->
</main><!-- #site-main -->

<?php
get_footer();