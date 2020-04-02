    <footer id="footer" class="site-footer">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/footer/branding' ); ?>
			<?php get_template_part( 'template-parts/footer/social' ); ?>
			<?php get_template_part( 'template-parts/footer/navigation' ); ?>
		</div>
		
		<div class="copyright-container">
			<div class="wrapper">
				<?php get_template_part( 'template-parts/footer/copyright' ); ?>
			</div>
		</div>
	</footer>

	<!-- Off Canvas Menu Container -->
	<?php get_template_part( 'template-parts/off-canvas/off-canvas' ); ?>

	<!-- No touch! -->
	<?php wp_footer(); ?>

</body>
</html>