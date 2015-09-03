=== Friends Only ===

Contributors: gabrielwhite
Tags: login, username, password, privacy, private, friends, family, restrict, protect, hide, simple, easy, access, address
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 0.7.2

Restrict access to readers who login with a permitted email addresses (no usernames or passwords needed!). Perfect for private personal or family blogs.

== Description ==

Want to restrict access to your blog to friends and family only, but don't want the hassle of everyone remembering (and forgetting!) usernames and passwords? Friends Only requires users to "log in" with their email address before seeing anything in your blog. It's not particularly secure, but it's a great way to make sure that random people don't have easy access to your blog.

This plugin also blocks access to RSS and Atom feeds. If you want to re-enable the feeds on your blog, you'll have to use the Feed Wrangler Wordpress plugin to create unique URIs for your feed (this plugin is set up to allow Feed Wrangler feeds through). See FAQ for details.

Also, make sure that each email address is on its own line, and without any decoration (someone@site.com is okay, but "Some One" \[someone@site.com\] is not).

You can also use your own custom CSS. See FAQ for details.

== Installation ==

1. Upload `friends-only` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter the list of addresses that you want to allow under Settings -> Friends Only (learn more about custom settings in the FAQ)
4. Rate the plugin at http://wordpress.org/extend/plugins/friends-only/

== Frequently Asked Questions ==

= How secure is this plugin? =

Not very. If someone can guess an email address, then they can get in. Also, I'm pretty sure the plugin isn't hacker-proof. But it definitely helps keep out the random people you don't want looking in.

Note: the permitted address list in your Wordpress database is not encrypted in any way.

= How can I re-enable RSS/Atom feeds? =

This plugin also blocks access to feeds (because Wordpress has standard feed URIs that can be easily guessed by people you might not want seeing your blog). 

If you want to re-enable feeds on your blog, you'll have to use the Feed Wrangler Wordpress plugin to create unique URIs for your feed (Friends Only is set up to allow Feed Wrangler feeds through). Please note that the URI for FeedWrangler feeds must be in the format http://blog.com/?feed=secretname (and not http://blog.com/feed/secretname).

= Can I send login notifications to multiple email addresses? =

Yes, just separate the addresses by commas.

= Do I have to use email addresses as the login credentials? =

Actually, you can use anything you want. If you wanted to give Lady Gaga access to your holiday blog, but didn't know her email address, just add the line "ladygaga" to the permitted address list and then give her a handwritten note with the site URL and username written on it next time you see her at a party.

Just note that login credentials are not cases sensitive ("LadyGaga" is the same as "ladygaga"), and you can't use spaces (No "lady gaga", please).

= Can I use my own CSS? =

Yes. Open the login page in your web browser, and then look at the source. You'll see all the CSS styles that are used. Create your own custom CSS file based on this, and pop it onto your web server (ideally, along with your theme). Go to Friends Only settings and then specify the URL for the new CSS file. The custom CSS will now be used instead of the stock styling. 

== Changelog ==

= 0.7.2 =
* Fixed “from” email address for notification emails to reduce likelihood of messages ending up in spam (thanks goodmanfam!)

= 0.7.0 =

* Added support for custom CSS
* Added support for HTTPS Wordpress installs (thanks reflow!)
* Fixes and tweaks to the CSS and HTML in the login page
* Settings screen clean-up
* Clarified instructions for how to get FeedWrangler to work properly (thanks aleecek!)
* Other random small bug fixes

= 0.6.0 =

* Redesigned session authentication system

= 0.5.3 =

* Tweak for twice-login bugfix

= 0.5.2 =

* Fixed bug that requires users to log in twice in some Wordpress configurations (thanks raywp!)
* Fixed critical bug that would allow users to access a blog without permission

= 0.5.1 =

* Allow users who are viewing posts through an RSS reader or email to view media (thanks Joshua Lyman!)
* Disabled notification for failed login attempts when the form is blank (thanks Joshua Lyman!)
* Small performance tweaks (thanks Joshua Lyman!)
* Updated documentation

= 0.4.6 = 

* Minor bugfix

= 0.4.5 =

* Added the ability to notify multiple email addresses (email addresses must be separated by commas) (thanks flyw!)
* Fixed DOCTYPE and HTML language bugs

= 0.4.4 =

* Added wp_head() function so that things like privacy settings are honoured (thanks gorky5!)

= 0.4.3 =

* Fixed a critical bug that was preventing cron jobs from executing properly with this plugin enabled
* Improved support for extended / Unicode characters (thanks policieuxjp!)
* Added IP address information to notification e-mails
* Minor performance improvements

= 0.3.4 =

* Opened up access to XML-RPC to support the Wordpress mobile client application (and any other apps that use XML-RPC)

= 0.3.3 =

* Added support for the use of HTML entities in messages

= 0.3.2 =

* Fixed a bug which prevented users from logging in if there was a space before or after their email address

= 0.3.1 =

* Initial release to the Wordpress Plugin Directory

