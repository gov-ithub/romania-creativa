(function($) {

	// Navigation menu toggle
	$( '.menu-toggle' ).click( function(e) {
		$( this ).toggleClass( 'active' );
		$( '.navigation-top' ).toggleClass( 'active' );
		$( '.main-navigation' ).toggleClass( 'active' );
	} );
	
	// Home categories menu
	// Add 'active' class to first category
	$( '.home .category-list .title' ).first().addClass( 'active' );
	$( 'div.category-info' ).html( $( '.home .category-list .title' ).first().next( '.details' ).html() );
	
	// Toggle 'active' class on click
	$( '.home .category-list .title' ).click( function(e) {
		e.preventDefault();
		$( '.home .category-list .title' ).removeClass( 'active' );
		$( this ).addClass( 'active' );
		
		$( 'div.category-info' ).html( $( this ).next( '.details' ).html() );
		
	} );

	
})( jQuery );