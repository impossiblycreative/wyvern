<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and the <header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wyvern
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- No touch! -->
	<?php wp_head(); ?>

	<!-- User Custom Colors -->
	<?php get_template_part( 'template-parts/header/customizer-styles' ); ?>
</head>

<body <?php body_class(); ?>>
	<a id="skip-to-content" class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'wyvern' ); ?></a>

	<?php get_template_part( 'template-parts/header/cookie-bar' ); ?>

	<header id="header" class="site-header" role="banner">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/header/branding' ); ?>
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
	</header>