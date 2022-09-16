<?php

add_action( 'admin_menu', 'fhw_dsgvo_cookies_adminmenu' );

function fhw_dsgvo_cookies_adminmenu() {
	global $_wp_last_object_menu;
	$_wp_last_object_menu++;
	
	add_menu_page( __( 'GDPR tools: cookies + privacy', 'dsgvo-tools-cookie-hinweis-datenschutz' ), __( 'GDPR tools: cookies + privacy', 'dsgvo-tools-cookie-hinweis-datenschutz' ), 'administrator', 'fhw_dsgvo_cookies_options', 'fhw_dsgvo_cookies_options_seite', null, $_wp_last_object_menu );

	add_action( 'admin_init', 'fhw_dsgvo_cookies_plugin_options' );
}

function fhw_dsgvo_cookies_plugin_options() {
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_position' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_abstand' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_bgcolor' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_textcolor' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_text' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_buttonbgcolor' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_buttontextcolor' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_buttontext' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_datenschutzerklaerung' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_datenschutzseite' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_datenschutztext' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_datenschutzdesign' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_datenschutztextfarbe' );
	register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_ppbuttonbg' );
	if( function_exists( 'pll_e' ) ) {
		$translations = pll_languages_list( array('fields' => 'name' ) );
		for( $i = 0; $i < count( $translations ); $i++) {
			register_setting( 'fhw_dsgvo_cookies_settings_group1', 'fhw_dsgvo_cookie_pp_' . $translations[ $i ] );
		}
	}
}
	
function fhw_dsgvo_cookies_options_seite() {
	global $wpdb;
	if( !is_admin() ) {
		wp_die( __( 'No permissions' ) );
	}	
?>
	<style>
		fieldset {
			border: 1px solid blue;
			padding: 15px;
		}
		legend { font-weight: bold; }
	</style>
	<div class="wrap">
		<h1><?php _e( 'GDPR tools: cookie notice + privacy', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?></h1>
		<form method="post" action="options.php">
		<?php settings_fields( 'fhw_dsgvo_cookies_settings_group1' ); ?>
		<?php do_settings_sections( 'fhw_dsgvo_cookies_settings_group1' ); ?>
			<fieldset>
				<legend><?php _e( 'Cookie notice settings', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?></legend>
				<p>
					<b><?php _e( 'Position', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?>:</b>
					<?php
						$fhw_dsgvo_cookie_position = esc_attr( get_option( 'fhw_dsgvo_cookie_position' ) );
					?>
					<select name="fhw_dsgvo_cookie_position">
						<option value="1" <?php selected( $fhw_dsgvo_cookie_position, 1 ); ?>><?php _e('Top', 'dsgvo-tools-cookie-hinweis-datenschutz') ?></option>
						<option value="2" <?php selected( $fhw_dsgvo_cookie_position, 2 ); ?>><?php _e('Bottom', 'dsgvo-tools-cookie-hinweis-datenschutz') ?></option>
					</select>
				</p>
				<p>
					<b><?php _e( 'Margin to border', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?>:</b>
					<input type="number" name="fhw_dsgvo_cookie_abstand" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_abstand', "0" ) ); ?>" /> px
				</p>
				<p>
					<b><?php _e( 'Background color', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?>:</b>
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_bgcolor" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_bgcolor', "#ffa500" ) ); ?>" />
				</p>
				<p>
					<b><?php _e( 'Text color', 'dsgvo-tools-cookie-hinweis-datenschutz' ); ?>:</b>
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_textcolor" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_textcolor', "#000000" ) ); ?>" />
				</p>
                <?php
                    if( function_exists( 'pll_register_string' ) ) { ?>
                        <div class="notice notice-success"> 
                            <p><?php
                            $var = "<a href='/wp-admin/admin.php?page=mlang_strings'>Polylang Strings</a>";
                            echo sprintf( wp_kses( __( 'You are using Polylang, to configure the strings go to %s', 'dsgvo-tools-cookie-hinweis-datenschutz' ), array(  'a' => array( 'href' => array() ) ) ), $var );
                            ?></p>
                        </div>
                        <?php
                    }
                    else {
                ?>
                    <p>
                        <b><?php _e( 'Text (no HTML)', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
                        <textarea style="width: 500px; height: 100px;" name="fhw_dsgvo_cookie_text"><?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_text', __( 'This website is using cookies to improve the user-friendliness. You agree by using the website further.', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) ); ?></textarea>
                    </p>
                <?php } ?>
				<p>
					<b><?php _e( 'Button color', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b>
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_buttonbgcolor" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_buttonbgcolor', "#222" ) ); ?>" />
				</p>
				<p>
					<b><?php _e( 'Text color in button', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b>
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_buttontextcolor" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_buttontextcolor', "#ffffff" ) ); ?>" />
                </p>
                <?php
                if( !function_exists( 'pll_register_string' ) ) { ?>
                    <p>
                        <b><?php _e('Text in button', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
                        <input type="text" name="fhw_dsgvo_cookie_buttontext" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_buttontext', __( 'Understand', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) ); ?>" />
                    </p>
                <?php } ?>
				<p>
					<b><?php _e( 'Show hyperlink to privacy policy', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
					<?php
						$fhw_dsgvo_cookie_position = esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutzerklaerung' ) );
					?>
					<select name="fhw_dsgvo_cookie_datenschutzerklaerung">
						<option value="1" <?php selected( $fhw_dsgvo_cookie_position, 1 ); ?>><?php _e( 'Yes', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?></option>
						<option value="2" <?php selected( $fhw_dsgvo_cookie_position, 2 ); ?>><?php _e( 'No', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?></option>
					</select>
				</p>
				<p>
					<b><?php _e( 'Privacy policy hyperlink design' ) ?>:</b><br />
					<?php
						$fhw_dsgvo_cookie_design = esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutzdesign' ) );
					?>
						<select name="fhw_dsgvo_cookie_datenschutzdesign">
							<option value="1" <?php selected( $fhw_dsgvo_cookie_design, 1 ); ?>><?php _e( 'Hyperlink', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?></option>
							<option value="2" <?php selected( $fhw_dsgvo_cookie_design, 2 ); ?>><?php _e( 'Button', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?></option>
						</select>
				</p>
				<p id='ppbtnbg'>
					<b><?php _e( 'Privacy policy button color' ) ?>:</b><br />
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_ppbuttonbg" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_ppbuttonbg', "#222" ) ); ?>" />
				</p>
				<p>
					<b><?php _e( 'Privacy policy page', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
					<?php 
					if( !function_exists( 'pll_register_string' ) ) {
						$fhw_dropdown_args = array(
							'selected'	=> esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutzseite', 0 ) ),
							'name'		=> 'fhw_dsgvo_cookie_datenschutzseite'
						);
						wp_dropdown_pages( $fhw_dropdown_args );
					} else {
						$translations = pll_languages_list( array('fields' => 'name' ) );
						for( $i = 0; $i < count( $translations ); $i++) {
							echo "<b>" . $translations[ $i ] . ":</b>";
							$fhw_dropdown_args = array(
								'selected'	=> esc_attr( get_option( 'fhw_dsgvo_cookie_pp_' . $translations[ $i ], 0 ) ),
								'name'		=> 'fhw_dsgvo_cookie_pp_' . $translations[ $i ]
							);
							wp_dropdown_pages( $fhw_dropdown_args );
							echo esc_attr( get_option( 'fhw_dsgvo_cookie_pp_' . $translations[ $i ] ) );
							echo "<br />";
						}
					}
					?>
				</p>
                <?php
                if( !function_exists( 'pll_register_string' ) ) { ?>
                    <p>
                    <b><?php _e( 'Text of privacy policy hyperlink', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
					<input type="text" name="fhw_dsgvo_cookie_datenschutztext" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutztext', __('Privacy policy','dsgvo-tools-cookie-hinweis-datenschutz')) ); ?>" />
                    </p>
                <?php } ?>
				<p>
					<b class="fhhyperlink"><?php _e( 'Color of privacy policy hyperlink', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b>
					<b class="fhbtn"><?php _e( 'Color of privacy policy text in button', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ?>:</b><br />
					<input type="text" class="color-picker" name="fhw_dsgvo_cookie_datenschutztextfarbe" value="<?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutztextfarbe', '#000000' ) ); ?>" />
				</p>
			</fieldset>
			<?php submit_button(); ?>
		</form>
	</div>
		

<?php
}
    