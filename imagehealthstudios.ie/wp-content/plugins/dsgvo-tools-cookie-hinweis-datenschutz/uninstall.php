<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit();
}

delete_option( 'fhw_dsgvo_cookie_position' );
delete_option( 'fhw_dsgvo_cookie_bgcolor' );
delete_option( 'fhw_dsgvo_cookie_textcolor' );
delete_option( 'fhw_dsgvo_cookie_text' );
delete_option( 'fhw_dsgvo_cookie_buttonbgcolor' );
delete_option( 'fhw_dsgvo_cookie_buttontextcolor' );
delete_option( 'fhw_dsgvo_cookie_buttontext' );
delete_option( 'fhw_dsgvo_cookie_datenschutzerklaerung' );
delete_option( 'fhw_dsgvo_cookie_datenschutzseite' );
delete_option( 'fhw_dsgvo_cookie_datenschutztext' );
delete_option( 'fhw_dsgvo_cookie_datenschutztextfarbe' );
delete_option( 'fhw_dsgvo_cookie_datenschutzdesign' );
delete_option( 'fhw_dsgvo_cookie_ppbuttonbg' );
if( function_exists( 'pll_register_string' ) ) {
	$translations = pll_languages_list( array('fields' => 'name' ) );
	for( $i = 0; $i < count( $translations ); $i++) {
		delete_option( 'fhw_dsgvo_cookie_pp_' . $translations[ $i ] );
	}
}
?>