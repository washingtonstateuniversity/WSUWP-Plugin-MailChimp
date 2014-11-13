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