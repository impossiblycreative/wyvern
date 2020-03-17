// Global Variables
const searchToggle = document.getElementById( 'search-toggle' );
const searchInput = document.querySelector( '#header-search .search-field' );
const searchButton = document.querySelector( '#header-search .search-submit' );
const mobileMenuToggle = document.getElementById( 'mobile-menu-toggle' );
const offCanvas = document.getElementById( 'off-canvas-container' );
const offCanvasClose = document.getElementById( 'off-canvas-close' );
const hasSubMenus = document.querySelectorAll( '#header-menu .menu-item.menu-item-has-children' );
const menuLinks = document.querySelectorAll( '.menu-item a' );
let delayTimer;
let lastMenuLevel = 0;
let currentMenuLevel = 0;
let gainedFocus;
let lostFocus;

// Toggle the search form
if ( searchToggle ) {
    searchToggle.addEventListener( 'click', searchToggleClick );
}

// Open the search form if the search field or search button is focused
if ( searchInput && searchButton ) {
    searchInput.addEventListener( 'focus', openSearch );
    searchButton.addEventListener( 'focus', openSearch );
    searchButton.addEventListener( 'blur', closeSearch );
}

// Toggle the mobile menu
if ( mobileMenuToggle ) {
    mobileMenuToggle.addEventListener( 'click', mobileMenuClick );
    offCanvasClose.addEventListener( 'click', mobileMenuClose );
}

// Listen for focus events on our menu links
if ( menuLinks ) {
    Array.prototype.forEach.call( menuLinks, function( e, i ) {
        e.addEventListener( 'focus', menuLinkGainFocus );
        e.addEventListener( 'blur', menuLinkLoseFocus );
    } );
}

// Deal with the sub-menus
if ( hasSubMenus ) {
    Array.prototype.forEach.call( hasSubMenus, function( element, iterator ){
        element.addEventListener( 'mouseenter', handleMenuItemMouseEnter );
        element.addEventListener( 'mouseleave', handleMenuItemMouseLeave );

        let buttons = element.querySelectorAll( 'button' );

        Array.prototype.forEach.call( buttons, function( e, i ) {
            e.addEventListener( 'click', toggleSubMenu );
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

function handleMenuItemMouseEnter( event ) {

    const hoverParent = this.parentNode;
    currentMenuLevel = parseInt( this.getAttribute( 'data-menu-level' ) );
    
    if ( hoverParent.classList.contains( 'sub-menu' ) || hoverParent.classList.contains( 'menu' ) ) {
        if ( currentMenuLevel !== lastMenuLevel ) {
            clearTimeout(delayTimer);
        }
    }

    // Open the menu and set the ARIA attributes
    this.classList.add( 'open' );
    this.setAttribute( 'aria-expanded', 'true' );

    // Set the ARIA on the button as well
    if ( this.children ) {
        this.children[1].setAttribute( 'aria-expanded', 'true' );
    }
}

function handleMenuItemMouseLeave( event ) {
    const menu = this;
    lastMenuLevel = parseInt( menu.getAttribute( 'data-menu-level' ) );

    // Set our timer to account for motor disabilities
    if ( menu.getAttribute( 'data-menu-level' ) === '0' ) {

        delayTimer = setTimeout( function( event ){
            menu.classList.remove('open');
            menu.setAttribute( 'aria-expanded', 'false' );
            currentMenuItem = null;
        
            // Set the ARIA on the button as well
            if ( this.children ) {
                menu.children[1].setAttribute( 'aria-expanded', 'false' );
            }
        }, 1000 );
    } 
    else {
        menu.classList.remove('open');
        menu.setAttribute( 'aria-expanded', 'false' );
        currentMenuItem = null;
    
        // Set the ARIA on the button as well
        if ( this.children ) {
            menu.children[1].setAttribute( 'aria-expanded', 'false' );
        }
    }
}

// Handle toggling the sub-menu
function toggleSubMenu( event ) {
    let button = event.target;

    if ( button.classList.contains( 'fas' ) ) {
        button = button.parentNode;
    }

    if ( button.classList.contains( 'menu-item' ) ) {
        button.classList.toggle( 'open' );
        button.setAttribute( 'aria-expanded', 'false' === button.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );

        currentParentMenu = button.parentNode.parentNode;
    } else {
        button.parentNode.classList.toggle( 'open' );
        button.parentNode.setAttribute( 'aria-expanded', 'false' === button.parentNode.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
        button.setAttribute( 'aria-expanded', 'false' === button.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );

        currentParentMenu = button.parentNode;
    }
}

// Handle a menu link gaining focus with the keyboard
function menuLinkGainFocus( event ) {
    gainedFocus = event.target.parentNode;
    currentMenuLevel = parseInt( gainedFocus.getAttribute( 'data-menu-level' ) );

    // Did we change menu levels?
    if ( lastMenuLevel !== currentMenuLevel ) {

        // Did we go up or down a level?
        if ( currentMenuLevel < lastMenuLevel ) {
            
            // How many steps did we jump up?
            const steps = lastMenuLevel - currentMenuLevel;
            
            // Check and see how many steps we need to close
            if ( steps === 1 ) {
                lostFocus.closest('.open').classList.remove( 'open' );
            } else {
                lostFocus.closest('.open').classList.remove( 'open' ); // Second level
                lostFocus.closest('.open').closest('.open').classList.remove( 'open' ); // First Level
            }
        }
    }
}

// Handle a menu link losing focus with the keyboard
function menuLinkLoseFocus( event ) {
    lostFocus = event.target.parentNode;
    lastMenuLevel = parseInt( lostFocus.getAttribute( 'data-menu-level' ) );
}