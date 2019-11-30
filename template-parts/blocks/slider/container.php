<?php
// Set up the slide query
$slide_args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'cat' => is_category() ? get_query_var( 'cat' ) : null,
    'tag' => 'featured',
);

// Query for slides
$slide_query = new WP_Query( $slide_args );

// Keep track of our slide count, used for slide ID
$slide_number = 0;

// Make sure we have slides
if ( $slide_query->have_posts() ) {
?>
    <!-- Slider -->
    <div class="slider">
        <div id="slides-container" class="slides">
        <?php
            while( $slide_query->have_posts() ) {
                $slide_query->the_post();

                // Pass the slide number along to the individual slide
                set_query_var( 'slide_number', $slide_number );

                // Create the slide
                get_template_part( 'template-parts/blocks/slider/slide' );

                // Increment our slide count
                $slide_number++;
            }

            // Avoid conflicts with other loops
            wp_reset_postdata();
        ?>
        </div>
    </div>    
    
    <!-- Slider Navigation -->
    <ul id="slides-navigation" class="slider-navigation">
        <?php
            for( $i = 0; $i < $slide_number; $i++ ) {
            ?>
                <li class="navigation-button">
                    <a href="javascript: void(0)" data-target-slide="<?php echo $i ?>" tabindex="-1">
                        <span class="screen-reader-text">Scroll to Slide #<?php echo $i; ?></span>
                    </a>
                </li>
            <?php
            }
        ?>
    </ul>

    <!-- Slider Nav JS -->
    <script>
        const slidesContainer = document.getElementById( 'slides-container' );
        const containerWidth = slidesContainer.offsetWidth;
        const slidesNavButton = document.querySelectorAll( '#slides-navigation .navigation-button a' );

        Array.prototype.forEach.call( slidesNavButton, function( element, iterator ){
            if ( 0 === iterator ) {
                element.classList.add( 'current' );
            }

            element.addEventListener( 'click', scrollToSlide );
        } );

        function scrollToSlide( event ) {
            const targetSlide = event.target.getAttribute( 'data-target-slide' );

            // Remove the "current" class from every slider nav button
            Array.prototype.forEach.call( slidesNavButton, function( element, iterator ){
                element.classList.remove( 'current' );
            } );

            // Add the "current" class to our target slide's nav button
            event.target.classList.add( 'current' );

            // Scroll to the slide
            console.log(containerWidth);
            slidesContainer.scrollLeft = containerWidth * targetSlide;
        }
    </script>
<?php
}