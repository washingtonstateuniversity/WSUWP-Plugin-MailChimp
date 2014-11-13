<?php
/*
Plugin Name: WSU MailChimp
Plugin URI: http://web.wsu.edu/wordpress/plugins/wsu-mailchimp/
Description: Allow site visitors to subscribe to a mailing list.
Author: washingtonstateuniversity, jeremyfelt
Version: 0.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// shortcode
// widget

// capture
//  - user_id
//  - list_id
//  - subscribe_label
//  - subscribe_button

class WSU_MailChimp {
	/**
	 * Configure hooks.
	 */
	public function __construct() {
		add_shortcode( 'wsu_mailchimp_subscribe', array( $this, 'display_mailchimp_subscribe_shortcode' ) );
	}

	public function display_mailchimp_subscribe_shortcode( $atts ) {
		$defaults = array(
			'user_id' => '',
			'list_id' => '',
			'subscribe_label' => 'Subscribe to our mailing list',
			'subscribe_button' => 'Subscribe',
		);
		$atts = shortcode_atts( $defaults, $atts );

		ob_start();

		?><!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
		</style>

		<div id="mc_embed_signup">
			<form action="//wsu.us3.list-manage.com/subscribe/post?u=<?php esc_attr_e( $atts['user_id'] ); ?>&amp;id=<?php esc_attr_e( $atts['list_id'] ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<label for="mce-EMAIL">Subscribe to our mailing list</label>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" name="b_<?php esc_attr_e( $atts['user_id'] ); ?>_<?php esc_attr_e( $atts['list_id'] ); ?>" tabindex="-1" value=""></div>
					<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</div>
			</form>
		</div>

		<!--End mc_embed_signup--><?php

		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
new WSU_MailChimp();