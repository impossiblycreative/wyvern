( function( $ ) {
    $( '#like-button' ).on( 'click', function( event ){
        // Prevent multiple clicks
        if ( '' === $(this).attr( 'href' ) ) {
            // Set the button text & add the disabled class
            $( '#like-button .button-text' ).text( 'Liked!' );
            $(this).addClass( 'disabled' );

            return false;
        }

        const postID = $(this).attr( 'data-id' );
        const nonce = $(this).attr( 'data-nonce' );

        $.ajax({
            url: likeButton.ajax_url,
            type: 'post',
            data: {
                action: 'wyvern_like_button',
                post_id: postID,
                nonce: nonce
            },
            success: function( response ) {
                $( '#like-button' ).attr( 'href', '' );
                $( '#like-button' ).addClass( 'disabled' );
                $( '#like-button .button-text' ).text( 'Liked!' );
                $( '.post-like-count-number' ).text( response );
            }
        });

        return false;
    });
} )( jQuery );