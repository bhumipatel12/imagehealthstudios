<?php
function fhw_dsgvo_cookie_content() {
?>
	<div id="fhw_cookiehinweis" style="
		<?php
		if( esc_attr( get_option( 'fhw_dsgvo_cookie_position' ) ) == 2)  {
			echo "bottom: " . esc_attr( get_option( 'fhw_dsgvo_cookie_abstand', '0' ) ) . "px;";
		} else 
			echo "top: " . esc_attr( get_option( 'fhw_dsgvo_cookie_abstand', '0' ) ) . "px;";
		?>
		background: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_bgcolor', 'orange' ) ); ?>;">
		<p style="color: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_textcolor', 'black' ) ); ?>">
			<?php if( function_exists( 'pll_e' ) ) {
						pll_e( __( 'This website is using cookies to improve the user-friendliness. You agree by using the website further.' ) );
					}
					else echo esc_attr( get_option( 'fhw_dsgvo_cookie_text', __( 'This website is using cookies to improve the user-friendliness. You agree by using the website further.', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) );
			?>
		</p>
			<button type="button" class="mainbutton" style="margin-left: 30px; margin-right: 30px; background: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_buttonbgcolor', '#222' ) ) ?>; color: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_buttontextcolor', "white" ) ); ?>;"><?php 
				if( function_exists( 'pll_e' ) ) {
					pll_e( __( 'Understand' ) );
				} else {
					echo esc_attr( trim( get_option( 'fhw_dsgvo_cookie_buttontext', __( 'Understand', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) ) ); 
				} ?>
			</button>
			<?php if( 1 == esc_attr( trim( get_option( 'fhw_dsgvo_cookie_datenschutzerklaerung', 1 ) ) ) ) { ?>
				<!-- text link -->
				<?php if( 1 == esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutzdesign', 1 ) ) ) { ?>
					<a href="<?php 
						if( !function_exists( 'pll_register_string' ) ) {
							echo get_page_link( esc_attr( trim( get_option( 'fhw_dsgvo_cookie_datenschutzseite', 1 ) ) ) ); 
						} else {
							$translations = pll_languages_list( array( 'fields' => 'name' ) );
							for( $i = 0; $i < count( $translations ); $i++) {
								if( $translations[ $i ] == pll_current_language( 'name' ) )
									echo get_page_link( esc_attr( trim( get_option( 'fhw_dsgvo_cookie_pp_' . $translations[ $i ], 1 ) ) ) );
							}
						}
						?>" style="color: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutztextfarbe', "black" ) ); ?>;" target="_blank">
						<?php if( function_exists( 'pll_e' ) ) {
							pll_e( __( 'Privacy policy' ) );
						} else {
							echo esc_attr( trim( get_option( 'fhw_dsgvo_cookie_datenschutztext', __( 'Privacy policy', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) ) ); 
						} ?>
					</a>					
				<?php } 
				else if( 2 == esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutzdesign', 1 ) ) ) { ?>
					<form action="<?php
						if( !function_exists( 'pll_register_string' ) ) {
							echo get_page_link( esc_attr( trim( get_option( 'fhw_dsgvo_cookie_datenschutzseite', 1 ) ) ) ); 
						} else {
							$translations = pll_languages_list( array( 'fields' => 'name' ) );
							for( $i = 0; $i < count( $translations ); $i++) {
								if( $translations[ $i ] == pll_current_language( 'name' ) )
									echo get_page_link( esc_attr( trim( get_option( 'fhw_dsgvo_cookie_pp_' . $translations[ $i ], 1 ) ) ) );
							}
						}
						?>" method='get' target='_blank'>
						<button class='privacybutton' type='submit' style="background: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_ppbuttonbg', '#222' ) ); ?>;color: <?php echo esc_attr( get_option( 'fhw_dsgvo_cookie_datenschutztextfarbe', "black" ) ); ?>;">
							<?php if( function_exists( 'pll_e' ) ) {
								pll_e( __( 'Privacy policy' ) );
							} else {
								echo esc_attr( trim( get_option( 'fhw_dsgvo_cookie_datenschutztext', __( 'Privacy policy', 'dsgvo-tools-cookie-hinweis-datenschutz' ) ) ) ); 
							} ?>
						</button>
					</form>
				<?php } ?>
			<?php } ?>
	</div>
<?php
}
?>