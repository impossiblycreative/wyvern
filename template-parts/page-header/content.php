<h1 class="page-header-title">
    <?php if ( is_404() ) : ?>
        <?php esc_html_e( 'Error: 404 - Not Found', 'be-found-online' ); ?>
    <?php else : ?>
        <?php echo esc_html( get_the_archive_title() ); ?>
    <?php endif; ?>
</h1>

<div class="page-header-meta">
    <?php if ( is_search() ) :
            $count = $GLOBALS['wp_query']->found_posts;
            echo esc_html__( 'We found ', 'wyvern' ) . $count . ( $count !== 1 ? esc_html__( ' results', 'wyvern' ) : esc_html__( ' result', 'wyvern' ) );
        else :
            $count = $GLOBALS['wp_query']->found_posts;
            echo $count . ( $count !== 1 ? esc_html__( ' posts', 'wyvern' ) : esc_html__( ' post', 'wyvern' ) );
        endif;
    ?>
</div>

<?php if ( get_the_archive_description() ) : ?>
    <div class="page-header-description"><?php echo wp_kses_post( get_the_archive_description() ); ?></div>
<?php endif; ?>