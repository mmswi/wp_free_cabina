function renderMediaUploader($, elem, type) {
    'use strict';

    var json, file_frame, image_data, thumb, obj;

    /**
     * If an instance of file_frame already exists, then we can open it
     * rather than creating a new instance.
     */
    if ( undefined !== file_frame ) {

        file_frame.open();
        return;

    }

    /**
     * If we're this far, then an instance does not exist, so we need to
     * create our own.
     *
     * Here, use the wp.media library to define the settings of the Media
     * Uploader. We're opting to use the 'post' frame which is a template
     * defined in WordPress core and are initializing the file frame
     * with the 'insert' state.
     *
     * We're also not allowing the user to select more than one image.
     */
    file_frame = wp.media.frames.file_frame = wp.media({
        frame:    'post',
        state:    'insert',
        multiple: false
    });

    /**
     * Setup an event handler for what to do when an image has been
     * selected.
     *
     * Since we're using the 'view' state when initializing
     * the file_frame, we need to make sure that the handler is attached
     * to the insert event.
     */
    file_frame.on( 'insert', function() {

    // Read the JSON data returned from the Media Uploader
    json = file_frame.state().get( 'selection' ).first().toJSON();

    // First, make sure that we have the URL of an image to display
    if ( 0 > $.trim( json.url.length ) ) {
        return;
    }
    if (type == "slider") {
        thumb = json.sizes.small.url;
        obj = json.id;
        // After that, set the properties of the image and display it
        elem.closest( $( '.slider_image__item' ) )
            .children( 'img' )
            .attr( 'src', thumb )
            .attr( 'alt', json.caption )
            .attr( 'title', json.title )
            .show()
            .parent()
            .removeClass( 'hidden' );

        // Next, hide the anchor responsible for allowing the user to select an image
        elem.closest( $( '.slider_image__item' ) )
            .prev()
            .hide();

        elem.parent().find( '.slider_field' ).val( obj );
        elem.closest( $( '.slider_image__item' ) ).addClass('image-added');
    }
    if (type == "single") {
        thumb = json.url;
        obj = json.url;
        elem.closest( $( '.fw_upload' ) ).find( $( '.upload-image-container' ) )
            .children( 'img' )
            .attr( 'src', thumb )
            .attr( 'alt', json.caption )
            .attr( 'title', json.title )
            .show()
            .parent()
            .removeClass( 'hidden' );

        // Next, hide the anchor responsible for allowing the user to select an image


        elem.parent().find( '.upload_image' ).val( obj );
    }

    if (type == "single-product") {
        thumb = json.url;
        if ( json.sizes.hasOwnProperty('big') ) {
            obj = json.sizes.big.url;
        } else {
            obj = json.url;
        }

        elem.closest( $( '.inner-field' ) ).find( $( '.product-image' ) )
            .children( 'img' )
            .attr( 'src', thumb )
            .attr( 'alt', json.caption )
            .attr( 'title', json.title )
            .show()
            .parent()
            .removeClass( 'hidden' );

        // Next, hide the anchor responsible for allowing the user to select an image
        elem.closest( $( '.inner-field' ) ).find( $( '.product-image' ) )
            .prev()
            .hide();

        elem.parent().find( '.custom_upload_image' ).val( obj );
    }


    });

    // Now display the actual file_frame
    file_frame.open();
}

/**
 * Checks to see if the input field for the thumbnail source has a value.
 * If so, then the image and the 'Remove featured image' anchor are displayed.
 *
 * Otherwise, the standard anchor is rendered.
 *
 * @param    object    $    A reference to the jQuery object
 * @since    1.0.0
 */

(function( $ ) {
    'use strict';

    $(function() {
        $( '.slider_image_item__upload' ).on( 'click', function( evt ) {
        	var btnAdd = $(this);
            // Stop the anchor's default behavior
            evt.preventDefault();

            // Display the media uploader
            renderMediaUploader($, btnAdd, "slider");
        });
        $( '.fw_upload input[type="button"]' ).on( 'click', function( evt ) {
            var btnAdd = $(this);
            // Stop the anchor's default behavior
            evt.preventDefault();

            // Display the media uploader
            renderMediaUploader($, btnAdd, "single");
        });
        $( '.upload_product_image' ).on( 'click', function( evt ) {
            var btnAdd = $(this);
            // Stop the anchor's default behavior
            evt.preventDefault();

            // Display the media uploader
            renderMediaUploader($, btnAdd, "single-product");
        });

    });

})( jQuery );