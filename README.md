# WSU MailChimp

Provides a shortcode and a widget to easily display a subscription form to a MailChimp mailing list on your site.

## Required Information

To use either the shortcode or the widget, you'll need a MailChimp user ID and list ID. Neither of these are very easy to find, but it's possible! :)

1. Log in to your MailChimp account and navigate to the List you will be using.
2. Click on Signup Forms
3. Select Embedded Forms
4. Look at the Copy/Paste code provided and find this area:
	* `<form action="//wsu.us3.list-manage.com/subscribe/post?u=XXXXXXXXXXXXXXXXXXXXXXX&amp;id=XXXXXXXXXX"`
	* **Preferred:** Copy the text between the double quotes after action. This is your "form_action" for the shortcode.
	* The characters between `u=` and `&amp;` are your user ID.
	* The characters between `id=` and `"` are your list ID.
	* We'll make this easier one day.

## Using the shortcode

The shortcode can be used anywhere once you have the information above.

1. **Preferred:** `[wsu_mailchimp_subscribe form_action="//wsu.us3.list-manage.com/subscribe/post?u=XXXXXXXXXXXXXXXXXXXXXXX&amp;id=XXXXXXXXXX"]`
1. `[wsu_mailchimp_subscribe user_id="XXXXXXX" list_id="XXXXXXX"]`
	* Outputs a standard subscription form for the specified user and list IDs. Uses the default subscription text.
2. `[wsu_mailchimp_subscribe user_id="XXXXXXX" list_id="XXXXXXX" subscribe_label="Enter your email address below" subscribe_button="Click!"]`
	* Outputs a subscription form with a custom message above and in the button text.

## Using the widget

The available options in the widget are exactly the same as the shortcode, but with easier entry. As you add the widget to a sidebar, you will see a place to enter user ID, list ID, and the subscribe text options.