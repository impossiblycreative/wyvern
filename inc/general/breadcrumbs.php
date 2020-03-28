<?php

function wyvern_get_breadcrumbs() {
?>
    <ol class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemprop="item">
                <span itemprop="name"><?php esc_html_e( 'Home', 'wyvern' ); ?></span>
                <meta itemprop="position" content="1" />
            </a>
            <span class="separator"><span class="fas fa-angle-double-right"></span></span>
        </li>

        <?php if ( is_single() ) : ?>
            <?php
                $post_id            = get_the_ID();
                $post_categories    = wp_get_post_categories( $post_id );
                $first_category     = get_category( $post_categories[0] );
            ?>

            <li class="breadcrumb" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                <a href="<?php echo esc_url( get_category_link( $first_category ) ); ?>" itemprop="item">
                    <span itemprop="name"><?php echo esc_html( $first_category->name ); ?></span>
                    <meta itemprop="position" content="2" />
                </a>
                <span class="separator"><span class="fas fa-angle-double-right"></span></span>
            </li>

            <li class="breadcrumb current" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">        
                <span itemprop="name"><?php echo esc_html( get_the_title( $post_id ) ); ?></span>
                <meta itemprop="position" content="3" />
            </li>
        <?php endif; ?>
    </ol>
<?php
}