<?php

if ( ! function_exists( 'wyvern_get_breadcrumbs' ) ) {
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
                <?php $post_id            = get_the_ID(); ?>
    
                <?php if ( get_post_type( $post_id ) === 'product' ) : ?>
                    <li class="breadcrumb" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <a href="<?php echo esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ); ?>" itemprop="item">
                            <span itemprop="name"><?php esc_html_e( 'Shop' ); ?></span>
                            <meta itemprep="position" content="2" />
                        </a>
                        <span class="separator"><span class="fas fa-angle-double-right"></span></span>
                    </li>
                <?php elseif ( get_post_type( $post_id ) === 'wyvern_faqs' ) : ?>
                    <?php
                        $post_terms = wp_get_post_terms( $post_id, 'wyvern_faq_categories' );
                        $first_term = get_category( $post_terms[0] );
                    ?>
                    <li class="breadcrumb" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <a href="<?php echo esc_url( get_term_link( $first_term, 'wyvern_faq_categories' ) ); ?>" itemprop="item">
                            <span itemprop="name"><?php echo esc_html( $first_term->name ); ?></span>
                            <meta itemprop="position" content="2" />
                        </a>
                        <span class="separator"><span class="fas fa-angle-double-right"></span></span>
                    </li>
                <?php else : ?>
                    <?php
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
                <?php endif; ?>
    
                <li class="breadcrumb current" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">        
                    <span itemprop="name"><?php echo esc_html( get_the_title( $post_id ) ); ?></span>
                    <meta itemprop="position" content="3" />
                </li>
            <?php endif; ?>
        </ol>
    <?php
    }
}