<?php

/**
 * @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
 */
function wyvern_taxonomy_meta_add_taxonomy_image( $taxonomy ) { ?>
    <div class="form-field term-group">
        <label for="taxonomy-image-id"><?php esc_html_e( 'Image', 'wyvern' ); ?></label>
        <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
        <div id="category-image-wrapper"></div>
            <p>
                <input type="button" class="button button-secondary wyvern-taxonomy-media-button" id="wyvern-taxonomy-media-button" name="wyvern-taxonomy-media-button" value="<?php _e( 'Add Image', 'wyvern' ); ?>" />
                <input type="button" class="button button-secondary wyvern-taxonomy-media-remove" id="wyvern-taxonomy-media-remove" name="wyvern-taxonomy-media-remove" value="<?php _e( 'Remove Image', 'wyvern' ); ?>" />
            </p>
        </div>
<?php }
add_action( 'category_add_form_fields', 'wyvern_taxonomy_meta_add_taxonomy_image' );


/**
 * @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
 */
function wyvern_save_taxonomy_image ( $term_id, $tt_id ) {
    if ( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ) {
        $image = $_POST['taxonomy-image-id'];
        add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
    }
}
add_action( 'created_category', 'wyvern_save_taxonomy_image' );


/**
 * @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
 */
function wyvern_update_taxonomy_image ( $term, $taxonomy = 'category' ) { ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
           <label for="taxonomy-image-id"><?php _e( 'Image', 'wyvern' ); ?></label>
        </th>

        <td>
            <?php $image_id = get_term_meta( $term->term_id, 'taxonomy-image-id', true ); ?>
            <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo $image_id; ?>">
            
            <div id="category-image-wrapper">
                <?php if ( $image_id ) : ?>
                    <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
                <?php endif; ?>
            </div>
            <p>
                <input type="button" class="button button-secondary wyvern-taxonomy-media-button" id="wyvern-taxonomy-media-button" name="wyvern-taxonomy-media-button" value="<?php _e( 'Add Image', 'wyvern' ); ?>" />
                <input type="button" class="button button-secondary wyvern-taxonomy-media-remove" id="wyvern-taxonomy-media-remove" name="wyvern-taxonomy-media-remove" value="<?php _e( 'Remove Image', 'wyvern' ); ?>" />
            </p>
        </td>
    </tr>
<?php }
add_action( 'category_edit_form_fields', 'wyvern_update_taxonomy_image' );

/**
* Update the form field value
*
* @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
*/
function wyvern_updated_taxonomy_image ( $term_id ) {
    if( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ){
        $image = $_POST['taxonomy-image-id'];
        update_term_meta ( $term_id, 'taxonomy-image-id', $image );
    } else {
        update_term_meta ( $term_id, 'taxonomy-image-id', '' );
    }
}
add_action( 'edited_category', 'wyvern_updated_taxonomy_image' );



/**
 * Load the media upload scripts
 * 
 * @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
 */
function wyvern_taxonomy_meta_load_media() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wyvern_taxonomy_meta_load_media' );


/**
 * Scripts controlling the buttons on the taxonomy admin pages
 * 
 * @see https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
 */
function wyvern_taxonomy_meta_add_media_updload_scripts() { ?>
        <script id="wyvern-taxonomy-upload-script">
            jQuery( document ).ready( function( $ ) {
                function wyvern_media_upload( button_class ) {
                    var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;

                    $('body').on('click', button_class, function(e) {
                        var button_id = '#'+$(this).attr('id');
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(button_id);

                        _custom_media = true;

                        wp.media.editor.send.attachment = function( props, attachment ) {
                            if ( _custom_media ) {
                                $( '#taxonomy-image-id' ).val( attachment.id );
                                $( '#category-image-wrapper' ).html( '<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />' );
                                $( '#category-image-wrapper .custom_media_image' ).attr( 'src', attachment.url ).css( 'display','block' );
                            } else {
                                return _orig_send_attachment.apply( button_id, [props, attachment] );
                            }
                        }
                        wp.media.editor.open( button );

                        return false;
                    } );
                }

                wyvern_media_upload( '.wyvern-taxonomy-media-button.button' ); 
            
                $( 'body' ).on( 'click', '.wyvern-taxonomy-media-remove', function() {
                    $( '#taxonomy-image-id' ).val( '' );
                    $( '#category-image-wrapper' ).html( '<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />' );
                });

                // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
                $( document ).ajaxComplete( function( event, xhr, settings ) {
                    var queryStringArr = settings.data.split('&');

                    if ( $.inArray( 'action=add-tag', queryStringArr ) !== -1 ) {
                        var xml = xhr.responseXML;
        
                        $response = $( xml ).find( 'term_id' ).text();
        
                        if( $response != "" ) {
                            // Clear the thumb image
                            $( '#category-image-wrapper' ).html( '' );
                        }
                    }
                } );
            } );
        </script>
      <?php
}
add_action( 'admin_footer', 'wyvern_taxonomy_meta_add_media_updload_scripts' );