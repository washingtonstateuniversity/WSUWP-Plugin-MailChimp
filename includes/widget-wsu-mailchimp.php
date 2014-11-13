<?php
/**
 * Configure and display a widget to capture subscription information for
 * a user who wants to subscribe to a mailing list through MailChimp.
 *
 * Class Widget_WSU_MailChimp
 */
class Widget_WSU_MailChimp extends WP_Widget {

	/**
	 * Configure the Widget with the parent.
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct( 'wsu_mailchimp', 'WSU MailChimp' );
	}

	/**
	 * Process the display of the widget.
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		?>
		<!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<div id="mc_embed_signup">
			<form action="//wsu.us3.list-manage.com/subscribe/post?u=<?php esc_attr_e( $instance['user_id'] ); ?>&amp;id=<?php esc_attr_e( $instance['list_id'] ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<label for="mce-EMAIL">Subscribe to our mailing list</label>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" name="b_<?php esc_attr_e( $instance['user_id'] ); ?>_<?php esc_attr_e( $instance['list_id'] ); ?>" tabindex="-1" value=""></div>
					<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</div>
			</form>
		</div>
		<!--End mc_embed_signup-->
	<?php

	}

	/**
	 * Output a form to retrieve widget options in the admin area.
	 *
	 * @param array $instance
	 */
	public function form( $instance ) {

	}

	/**
	 * Sanitize and process options when saved in the form.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 */
	public function update( $new_instance, $old_instance ) {

	}
}