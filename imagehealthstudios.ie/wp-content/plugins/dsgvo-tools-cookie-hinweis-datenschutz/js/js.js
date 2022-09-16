jQuery( document ).ready( function () {
	if( document.cookie.indexOf( "fhw_dsgvo_cookies_cookie" ) === -1 ) {
        jQuery( "#fhw_cookiehinweis" ).css( 'display', 'grid' );
		jQuery( "#fhw_cookiehinweis" ).show();
		jQuery( "#fhw_cookiehinweis button.mainbutton" ).click( function() {
			jQuery( "#fhw_cookiehinweis" ).fadeOut( "slow" );
			var date = new Date();
			date.setTime( date.getTime()+(365*24*60*60*1000) );
			var expire = date.toGMTString();
			document.cookie = 'fhw_dsgvo_cookies_cookie = 1; expires=' + expire + ';' + "domain=." + document.domain + "; path=/;";
		});
	} else { jQuery( "#fhw_cookiehinweis" ).hide(); };

	/*	Display not all options for hyperlink	*/
	if( 1 == jQuery( '[name="fhw_dsgvo_cookie_datenschutzdesign"] option:selected' ).val() ) {
		jQuery( '#ppbtnbg' ).hide();
		jQuery( '.fhbtn' ).hide();
		jQuery( '.fhhyperlink' ).show();
	}
	if( 2 == jQuery( '[name="fhw_dsgvo_cookie_datenschutzdesign"] option:selected' ).val() ) {
		jQuery( '#ppbtnbg' ).show();
		jQuery( '.fhbtn' ).show();
		jQuery( '.fhhyperlink' ).hide();
	}

	jQuery( '[name="fhw_dsgvo_cookie_datenschutzdesign"]' ).change( function() {
		if( 2 == jQuery( '[name="fhw_dsgvo_cookie_datenschutzdesign"] option:selected' ).val() ) {
			jQuery( '#ppbtnbg' ).show( 'slow' );
			jQuery( '.fhbtn' ).show();
			jQuery( '.fhhyperlink' ).hide();
		}
		else {
			jQuery( '#ppbtnbg' ).hide( 'slow' );
			jQuery( '.fhbtn' ).hide();
			jQuery( '.fhhyperlink' ).show();
		}
	});



});