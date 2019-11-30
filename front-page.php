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
			<?php
    			if ( !empty( get_theme_mod( 'newsletter_signup_form_name' ) ) ) {
					$newsletter_form_name = esc_html( get_theme_mod( 'newsletter_signup_form_name' ) );

					if ( !empty( get_theme_mod( 'newsletter_signup_form_prompt' ) ) ) {
					?>
						<h2 class="subscribe-block-title"><?php echo esc_html( get_theme_mod( 'newsletter_signup_form_prompt' ) ); ?></h2>
					<?php
					}

					if ( function_exists( 'gravity_form' ) ) {
						gravity_form( $newsletter_form_name, false, false, false, '', true, 0 );
					}
				} else {
					esc_html_e( 'Newsletter form not found.', 'wyvern' );
				}
			?>
		</div>
	</section><!-- #subscribe-block -->
</main><!-- #site-main -->

<?php
get_footer();