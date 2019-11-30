const progressBar = document.createElement( 'span' ),
      windowOuterHeight = window.innerHeight,
      articleHeight = document.querySelector( '.post' ).offsetHeight;

// Set up the progress bar's attributes and classes, then add it to the DOM
progressBar.setAttribute( 'id', 'progress-bar' );
progressBar.classList.add( 'progress-bar' );
document.body.prepend( progressBar );

// If we have an icon, set it up and add it to the DOM
if ( wyvern_options.progress_bar_icon ) {
    const icon = document.createElement( 'img' );
    const iconURL = wyvern_options.progress_bar_icon;

    // Set up the icon
    icon.setAttribute( 'src', iconURL );
    icon.classList.add( 'progress-bar-icon' );

    // Add the icon to the DOM
    progressBar.prepend( icon );
}

// Update upon scroll
window.addEventListener( 'scroll', updateProgressBar );

// Control the size of the progress bar
function updateProgressBar() {
    const windowScrollTop = window.scrollY,
          total = ( windowScrollTop / ( articleHeight - windowOuterHeight ) ) * 100;
    let updatedWidth = ( total <= 100 ? total : 100 );

    if( 0 > updatedWidth ) {
        updatedWidth = updatedWidth * -1;
    }

    updatedWidth = updatedWidth + '%';

    progressBar.style.width = updatedWidth;
}