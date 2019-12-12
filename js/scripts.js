// Global Variables
const searchToggle = document.getElementById( 'search-toggle' );
const searchInput = document.querySelector( '#header-search .search-field' );
const searchButton = document.querySelector( '#header-search .search-submit' );
const mobileMenuToggle = document.getElementById( 'mobile-menu-toggle' );
const offCanvas = document.getElementById( 'off-canvas-container' );
const offCanvasClose = document.getElementById( 'off-canvas-close' );
const subMenus = document.querySelectorAll( 'li.menu-item-has-children' );
let focasable;
let delayTimer;
let focusTimer;

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

// Add a delay to sub-menu mouseout events to improve accessibility
if ( subMenus ) {
    Array.prototype.forEach.call( subMenus, function( element, iterator ){
        element.addEventListener( 'mouseover', menuMouseOver );
        element.addEventListener( 'mouseout', menuMouseOut );

        // Get all of the buttons for this sub-menu
        let buttons = element.querySelectorAll( 'button' );
        let links = element.querySelectorAll( '.sub-menu a' );
        
        // Add the focus and blur listeners to every button & link
        Array.prototype.forEach.call( buttons, function( e, i ) {
            e.addEventListener( 'click', toggleSubMenu );
            e.addEventListener( 'focus', subMenuGainFocus );
            e.addEventListener( 'blur', subMenuLostFocus );
        } );

        Array.prototype.forEach.call( links, function( e, i ) {
            e.addEventListener( 'focus', subMenuGainFocus );
            e.addEventListener( 'blur', subMenuLostFocus );
        } );
    } );
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

// Handle the mouseover event for menus
function menuMouseOver( event ) {
    // Close all of the open sub-menus
    const allOpenSubMenus = document.querySelectorAll( '.open > .sub-menu' );

    if ( allOpenSubMenus ) {
        Array.prototype.forEach.call( allOpenSubMenus, function( element ) {
            element.parentNode.classList.remove( 'open' );
        } );
    }

    // Open the new one
    clearTimeout( delayTimer );
    delayTimer = null;
    this.classList.add( 'open' );
}

// Handle the mouseout event for menus
function menuMouseOut( event ) {
    const target = this;
    
    // Set the timer for 1 second
    delayTimer = setTimeout( function() {
        target.classList.remove( 'open' );
    }, 1000 );
}

// Handle toggling the sub-menu
function toggleSubMenu( event ) {
    let button = event.target;

    if ( button.classList.contains( 'fas' ) ) {
        button = button.parentNode;
    }

    if ( button ) {
        button.parentNode.classList.toggle( 'open' );
        button.parentNode.setAttribute( 'aria-expanded', 'false' === button.parentNode.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
        button.setAttribute( 'aria-expanded', 'false' === button.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
    }
}

// Handle the sub-menu gaining focus
function subMenuGainFocus( event ) {
    // If there is an active focus timer, get rid of it because we're still in the sub-menu
    if ( focusTimer ) {
        clearTimeout( focusTimer );
        focusTimer = null;
    }
}

// Handle the sub-menu losing focus
function subMenuLostFocus( event ) {
    focusTimer = setTimeout( function() {
        let openNav = document.querySelector('li.menu-item-has-children.open');

        if ( openNav ) {
            openNav.classList.remove( 'open' );
            openNav.setAttribute( 'aria-expanded', 'false' === event.target.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
        }
    }, 10 );
}