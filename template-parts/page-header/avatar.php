<?php
    if ( is_author() ) {
        echo get_avatar( 
            get_the_author_meta( 'ID' ), 
            150, 
            '', 
            get_the_author_meta( 'display_name' ),
            array( 'class' => 'author-image' )
        );
    }