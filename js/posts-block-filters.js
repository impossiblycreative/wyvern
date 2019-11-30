( function( $ ) {
    $( '.category-filter a' ).on( 'click', function( event ){
        const category = $(this).attr( 'data-category' );
        const categoryName = $(this).attr( 'data-category-name' );
        const nonce = $(this).attr( 'data-nonce' );
        const currentFilter = $( '.category-filter.current' );
        const clickedFilter = event.target;
        const updateBox = document.getElementById( 'posts-block-filter-description' );

        currentFilter.removeClass( 'current' );
        clickedFilter.classList.add( 'current' );

        $.ajax({
            url: categoriesFilter.ajax_url,
            type: 'post',
            data: {
                action: 'wyvern_posts_block_categories_filter',
                category_ID: category,
                nonce: nonce
            },
            success: function( response ) {
                $( '#posts-block-posts' ).html( response );
            }
        });

        // Update the ARIA-Live info
        updateBox.textContent = 'Currently displaying posts from the category ' + categoryName;

        return false;
    });
} )( jQuery );