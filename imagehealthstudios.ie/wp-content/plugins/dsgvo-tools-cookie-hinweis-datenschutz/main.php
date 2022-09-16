<?php
/*
Plugin Name: 	GDPR tools: cookie notice + privacy
Description: part of the GDPR tools package. Adds a cookie notice and a privacy notice
Version: 1.9
Author: fabian heinz webdesign
Author URI: https://www.fabian-heinz-webdesign.de
License: GPL3
Text Domain: dsgvo-tools-cookie-hinweis-datenschutz
*/

require_once plugin_basename( '/admin/settings.php' );
require_once plugin_basename( '/content/content.php' );

add_action( 'init', function () {
	load_plugin_textdomain( 'dsgvo-tools-cookie-hinweis-datenschutz' );
	if( function_exists( 'pll_register_string' ) ) {
        pll_register_string( __( 'Text in cookie notice' ), __( 'This website is using cookies to improve the user-friendliness. You agree by using the website further.' ), 'dsgvo tools', true);
        pll_register_string( __( 'Text in cookie button' ), __( 'Understand' ), 'dsgvo tools' );
        pll_register_string( __( 'Text of privacy policy hyperlink' ), __( 'Privacy policy' ), 'dsgvo tools' );
		//get_option( 'fhw_dsgvo_cookie_text', __( 'This website is using cookies to improve the user-friendliness. You agree by using the website further.', 'dsgvo-tools-cookie-hinweis-datenschutz' ) )
	}
} );

add_action( 'wp_enqueue_scripts', 'fhw_dsgvo_cookie_register_script' );

add_action( 'wp_enqueue_scripts', 'fhw_dsgvo_cookie_register_styles' );
function fhw_dsgvo_cookie_register_styles() {
	wp_register_style( 'fhw_dsgvo_cookie_register_frontend_style', plugins_url( '/styles/frontend.css', __FILE__ ), array(), ( new DateTime() )->getTimestamp() );
	wp_enqueue_style( 'fhw_dsgvo_cookie_register_frontend_style' );
}

function fhw_dsgvo_cookie_register_script() {
	wp_register_script( 'fhw_dsgvo_cookie_js', plugins_url( 'js/js.js', __FILE__ ), array( 'jquery' ), ( new DateTime() )->getTimestamp() );
	wp_enqueue_script( 'fhw_dsgvo_cookie_js' );
}

function fhw_dsgvo_cookie_insert() {
	echo fhw_dsgvo_cookie_content();
}
add_action('wp_footer', 'fhw_dsgvo_cookie_insert');

// Farbwähler
add_action( 'admin_menu', 'fhw_dsgvo_cookie_colorchooser' );
add_action( 'admin_menu', 'fhw_dsgvo_cookie_colorchooser' );
add_action( 'admin_menu', 'fhw_dsgvo_cookie_colorchooserstyles' );
add_action( 'admin_menu', 'fhw_dsgvo_cookie_colorchooserstyles' );
add_action( 'admin_menu', 'fhw_dsgvo_cookie_register_script' );

function fhw_dsgvo_cookie_colorchooser() {
  wp_enqueue_script( 'fhw_dsgvo_cookie_colorjsfile', plugins_url( 'js/colorfile.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ) );
}

function fhw_dsgvo_cookie_colorchooserstyles(){
  wp_enqueue_style( 'wp-color-picker' );
}

?>