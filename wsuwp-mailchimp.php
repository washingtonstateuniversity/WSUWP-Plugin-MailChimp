<?php
/*
Plugin Name: WSU MailChimp
Plugin URI: https://web.wsu.edu/wordpress/plugins/wsu-mailchimp/
Description: Allow site visitors to subscribe to a mailing list.
Author: washingtonstateuniversity, jeremyfelt
Version: 0.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Include code for the widget.
include_once( __DIR__ . '/includes/widget-wsu-mailchimp.php' );

class WSU_MailChimp {
	/**
	 * Configure hooks.
	 */
	public function __construct() {
		add_shortcode( 'wsu_mailchimp_subscribe', array( $this, 'display_mailchimp_subscribe_shortcode' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	public function display_mailchimp_subscribe_shortcode( $atts ) {
		$defaults = array(
			'form_action' => '',
			'user_id' => apply_filters( 'wsu_mailchimp_user_id', '' ),
			'list_id' => apply_filters( 'wsu_mailchimp_list_id', '' ),
			'server' => 'wsu.us3.list-manage.com',
			'subscribe_label' => 'Subscribe to our mailing list',
			'subscribe_button' => 'Subscribe',
		);
		$atts = shortcode_atts( $defaults, $atts );

		if ( '' !== $atts['form_action'] ) {
			$form_action = array_values( array_filter( explode( '/', $atts['form_action'] ) ) );
			if ( 3 > count( $form_action ) ) {
				return '';
			}

			$atts['server'] = $form_action[0];

			$id_params = explode( '=', $form_action[2] );

			if ( 3 > count( $id_params ) ) {
				return '';
			}
			$atts['list_id'] = $id_params[2];
			$user_params = explode( '&amp', $id_params[1] );
			$atts['user_id'] = $user_params[0];
		}

		$url = '//' . esc_attr( $atts['server'] ) . '/subscribe/post?u=' . esc_attr( $atts['user_id'] ) . '&amp;id=' . esc_attr( $atts['list_id'] );

		ob_start();

		?><!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<div id="mc_embed_signup">
			<form action="<?php echo $url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<label for="mce-EMAIL"><?php echo esc_html( $atts['subscribe_label'] ); ?></label>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" name="b_<?php esc_attr_e( $atts['user_id'] ); ?>_<?php esc_attr_e( $atts['list_id'] ); ?>" tabindex="-1" value=""></div>
					<div class="clear"><input type="submit" value="<?php esc_attr_e( $atts['subscribe_button'] ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</div>
			</form>
		</div>

		<!--End mc_embed_signup--><?php

		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}

	public function widgets_init() {
		register_widget( 'Widget_WSU_MailChimp' );
	}
}
new WSU_MailChimp();