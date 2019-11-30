<aside id="sidebar" class="sidebar widget-area" role="complementary">
	<?php 
        if ( is_active_sidebar( 'primary-sidebar' ) ) {
            dynamic_sidebar( 'primary-sidebar' );
        }
	?>
</aside><!-- #sidebar -->