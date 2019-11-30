( function( $ ) {
    $( '#cookie-button' ).on( 'click', function( event ){
        const nonce = $(this).attr( 'data-nonce' );

        $.ajax({
            url: cookieButton.ajax_url,
            type: 'post',
            data: {
                action: 'wyvern_cookie_button',
                nonce: nonce
            },
            success: function( response ) {
                $( '.cookie-bar' ).fadeOut();
            }
        });

        return false;
    });
} )( jQuery );