// Global Variables
const searchToggle = document.getElementById( 'search-toggle' );
const searchInput = document.querySelector( '#header-search .search-field' );
const searchButton = document.querySelector( '#header-search .search-submit' );
const mobileMenuToggle = document.getElementById( 'mobile-menu-toggle' );
const offCanvas = document.getElementById( 'off-canvas-container' );
const offCanvasClose = document.getElementById( 'off-canvas-close' );

// Toggle the search form
if ( searchToggle ) {
    searchToggle.addEventListener( 'click', searchToggleClick );
}

// Open the search form if the search field or search button is focused
searchInput.addEventListener( 'focus', openSearch );
searchButton.addEventListener( 'focus', openSearch );
searchButton.addEventListener( 'blur', closeSearch );

// Toggle the mobile menu
if ( mobileMenuToggle ) {
    mobileMenuToggle.addEventListener( 'click', mobileMenuClick );
    offCanvasClose.addEventListener( 'click', mobileMenuClose );
}

function searchToggleClick( event ) {
    const searchContainer = document.getElementById( 'header-search' );
    const searchIcon = document.querySelector( '#search-toggle span' );

    searchToggle.setAttribute( 'aria-expanded', 'false' === searchToggle.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
    searchIcon.classList.toggle( 'fa-search' );
    searchIcon.classList.toggle( 'fa-times' );
    searchContainer.classList.toggle( 'open' );
}

function openSearch( event ) {
    const searchContainer = document.getElementById( 'header-search' );
    const searchIcon = document.querySelector( '#search-toggle span' );

    searchToggle.setAttribute( 'aria-expanded', 'true' );
    searchIcon.classList.remove( 'fa-search' );
    searchIcon.classList.add( 'fa-times' );
    searchContainer.classList.add( 'open' );
}

function closeSearch( event ) {
    const searchContainer = document.getElementById( 'header-search' );
    const searchIcon = document.querySelector( '#search-toggle span' );

    searchToggle.setAttribute( 'aria-expanded', 'false' );
    searchIcon.classList.add( 'fa-search' );
    searchIcon.classList.remove( 'fa-times' );
    searchContainer.classList.remove( 'open' );
}

// Controlling the toggling of the mobile menu's click event
function mobileMenuClick( event ) {
    mobileMenuToggle.setAttribute( 'aria-expanded', 'false' === mobileMenuToggle.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
    offCanvas.classList.toggle( 'active' );
}

// Close the mobile menu
function mobileMenuClose( event ) {
    offCanvas.classList.toggle( 'active' );
}