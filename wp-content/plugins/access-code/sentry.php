<?php 

// This function determines whether the user should be displayed the login page based on whether or not they have already authenticated themselves with Wordpress (i.e. Administrator logged in), or with the sentry.

function fo_runSentry() {

	// Define session key and start the session
	define ('SESSION_KEY', md5(site_url()));
	
	//session_start();
	//session_name('fo_session');
	//$_COOKIE = WP_Session::get_instance();

	setcookie('friends_only');

	// Check for https
	
	if (is_ssl()) {
		$http_method = 'https://';
	}
	else {
		$http_method = 'http://';
	}

	// Create site path URLs to test later for URL hacking or provide access to special pages (e.g. login or FeedWrangler)
	
	$base_WP_URI = strtolower(site_url()); // e.g. "http://blog.com/gabesblog"
	$base_WP_path = parse_url($base_WP_URI, PHP_URL_PATH); // e.g. "/gabesblog"
	$request_URI = strtolower($http_method.$_SERVER['SERVER_NAME'].htmlspecialchars($_SERVER['REQUEST_URI'])); // e.g. http://blog.com/gabesblog/my-trip-to-the-supermarket
	$request_path = parse_url($request_URI, PHP_URL_PATH); // e.g. "/gabesblog/my-trip-to-the-supermarket"

	// If the sesion variable has already been set, then don't show the sentry
	if ($_COOKIE['friends_only'] == SESSION_KEY) {
		return;
		}
	else {
		$_COOKIE['friends_only'] = 'Not authenticated';
	}

	// If the user is logged in then don't show the sentry	
	if (is_user_logged_in()) {
		return;
	}
	// If the user is requesting media (mostly RSS readers and subscription emails), then let them view the media
	elseif (strpos($request_path, $base_WP_path.'/wp-content/uploads') === 0) {
		return;
	}
	// If this is a wp-cron request, then don't show the sentry (used for running scheduled tasks)
	elseif (strpos($request_path, $base_WP_path.'/wp-cron.php') === 0) {
		return;
	}
	// If the user is requesting a FeedWrangler feed, then don't show the sentry
	elseif (strpos($request_path, $base_WP_path.'/?feed=') === 0) {
		return;
	}
	// If the user is not logged in, but they are trying to log in, then let them see the login page
	elseif ((strpos($request_path, $base_WP_path.'/wp-admin/') === 0) || (strpos($request_path, $base_WP_path.'/wp-login.php') === 0)) {
		return;
	}
	// If the user is trying to access XML-RPC then don't show the sentry
	elseif (strpos($request_path, $base_WP_path.'/xmlrpc.php') === 0) {
		return;
	}
	// If the user is trying to run BackWPUp then don't show the sentry
	elseif (($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) && (strpos($request_URI, 'backwpup') > 0)) {
		return;
	}
	
	// Check that the user requested URL matches the Wordpress domain settings, and if not, change
	if (($_SERVER['HTTP_HOST'] != parse_url($base_WP_URI,PHP_URL_HOST)))
		{
		$new_URI = str_replace($_SERVER['HTTP_HOST'], parse_url($base_WP_URI,PHP_URL_HOST), selfURL()); // Fix hostname
		header('Location: '.$new_URI);
		}

	// Load the array of email addresses and clean it up (including removing invalid email addresses)
	
	$PERMITTED_ADDRESSES = explode(chr(13), get_option('email_list'));
				
	array_walk($PERMITTED_ADDRESSES, 'fo_cleanAddress');

	// Load and clean the address to be notified by email, then sort them so any null addresses are at the end of the list

	$notify_address = explode (',', get_option('notify_address'));
	array_walk($notify_address, 'fo_cleanAddress');
	array_walk($notify_address, 'fo_removeInvalidAddress');
	array_filter($notify_address, 'strlen');
	rsort($notify_address);
		
	// Process the user provided password
	
	if (isset($_POST['access_email'])) {
	
		$supplied_address = strtolower(trim($_POST['access_email']));
		setcookie("access_code", $supplied_address);
	 
		if ( strlen($supplied_address) == 0 ) { $supplied_address = 'null'; }
	
		if (!in_array($supplied_address, $PERMITTED_ADDRESSES)) {
	  
	  		//Send email notifying of FAILED login
	
			if (get_option('notify_fail') && is_email($notify_address[0]) && $supplied_address != 'blank') {
			wp_mail( $notify_address, "[".wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES)."] FAIL for ".$supplied_address,
	  		"Failed login at ".wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES)." by ".$supplied_address."\n\nTime: ".date("H:i:s \(\G\M\TP\)")."\nIP: ".$_SERVER['REMOTE_ADDR']." (http://whatismyipaddress.com/ip/".$_SERVER['REMOTE_ADDR'].")");
			}
		
			fo_showLoginForm(get_option('prompt_error'));
	  
	  	}
		else {
			// set session variable if password was validated
			setcookie('friends_only', SESSION_KEY);

			//$_COOKIE['friends_only'] = SESSION_KEY;

			// Clear password protector variables
			unset($_POST['access_login']);
			unset($_POST['access_password']);
			unset($_POST['Submit']);

			// Send email notifying of SUCCESSFUL login
		
			if (get_option('notify_success') && is_email($notify_address[0])) {
		    wp_mail( $notify_address, "[".wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES)."] SUCCESS for ".$supplied_address, "Successful login at ".wp_specialchars_decode(get_bloginfo('name'), ENT_QUOTES)." by ".$supplied_address."\n\nTime: ".date("H:i:s \(\G\M\TP\)")."\nIP: ".$_SERVER['REMOTE_ADDR']." (http://whatismyipaddress.com/ip/".$_SERVER['REMOTE_ADDR'].")", "From: Friends Only Notification <".get_settings('admin_email').">");
	    	}    
	  	}
	}
	
	// If the user hasn't authenticated yet, show the login form	
	else {
    	fo_showLoginForm('');
	}
}

// This function displays the login form if the user is required to authenticate with the sentry

function fo_showLoginForm($error_message) {
	
	// echo "<!DOCTYPE html>
	// <html ";
	
	// echo language_attributes();
	
	// echo ">
	// <head>
	// <title>";
	
	// echo htmlentities(bloginfo('name'));
	
	// echo "
	// </title>
	//   <META HTTP-EQUIV='CACHE-CONTROL' CONTENT='NO-CACHE'>
	//   <META HTTP-EQUIV='PRAGMA' CONTENT='NO-CACHE'>
	//   <META HTTP-EQUIV='CONTENT-TYPE' CONTENT='";

	// echo bloginfo('html_type');
	// echo " CHARSET=";
	// echo bloginfo('charset');
	// echo "'>";
	
	// wp_head();
	
	// // Check whether the user has specified their own CSS file. If not, use the default CSS styling.
	
	// if (strlen(get_option('css_link')))	{
	// 	echo "<link rel='stylesheet' type='text/css' href='";
	// 	echo get_option('css_link');
	// 	echo "'>";
	// }
	// else	{
	// 	echo "	<style type='text/css'>
		
	// 	// Reset the CSS styles using the Meyer Reset (http://meyerweb.com/eric/tools/css/reset/) before applying CSS styles
		
	// 	/* This is the default Friends Only CSS. This CSS will be removed if you specify a custom CSS file in the Settings. */
				
	// 	html, body, div, span, applet, object, iframe,
	// 	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	// 	a, abbr, acronym, address, big, cite, code,
	// 	del, dfn, em, img, ins, kbd, q, s, samp,
	// 	small, strike, strong, sub, sup, tt, var,
	// 	b, u, i, center,
	// 	dl, dt, dd, ol, ul, li,
	// 	fieldset, form, label, legend,
	// 	table, caption, tbody, tfoot, thead, tr, th, td,
	// 	article, aside, canvas, details, embed, 
	// 	figure, figcaption, footer, header, hgroup, 
	// 	menu, nav, output, ruby, section, summary,
	// 	time, mark, audio, video {
	// 		margin: 0;
	// 		padding: 0;
	// 		border: 0;
	// 		font-size: 100%;
	// 		font: inherit;
	// 		vertical-align: baseline;
	// 	}
	// 	article, aside, details, figcaption, figure, 
	// 	footer, header, hgroup, menu, nav, section {
	// 		display: block;
	// 	}
	// 	body {
	// 		line-height: 1;
	// 	}
	// 	ol, ul {
	// 		list-style: none;
	// 	}
	// 	blockquote, q {
	// 		quotes: none;
	// 	}
	// 	blockquote:before, blockquote:after,
	// 	q:before, q:after {
	// 		content: '';
	// 		content: none;
	// 	}
	// 	table {
	// 		border-collapse: collapse;
	// 		border-spacing: 0;
	// 	}
		
	// 	body {
	// 		font-family : Tahoma, Verdana, Arial;
	// 		font-color: #000000;
	// 		padding-left: 20%;
	// 		padding-top:50px;
	// 		padding-bottom: 50px;
	// 		padding-right: 5%;
	// 		background-color: #FFFFFF;
	// 	}
		
	// 	h1	{
	// 		font-size: 2em; 
	// 		padding-bottom: 50px;
	// 		font-weight: normal;
	// 	}
		
	// 	p	{
	// 		padding-top: 8px;
	// 		padding-bottom: 8px;
	// 	}
		
	// 	p.prompt	{
	// 	}
		
	// 	p.error	{
	// 		color: #AA0000;
	// 	}
		
	// 	#form {
	// 		padding-top: 8px;
	// 		padding-bottom: 8px;
	// 	}
		
	// 	input.input_email	{
	// 		font-size: 1.2em;
	// 	}
		
	// 	input.input_submit	{
	// 		background-color: #DDDDDD; 
	// 		border-color: #AAAAAA; 
	// 		color: #000000; 
	// 		font-family: tahoma, verdana, arial; 
	// 		font-size: 1.2em;
	// 	}
		
	// 	.admin	{
	// 		padding-top: 20px;
	// 	}
		
	// 	.adminlink {
	// 		color: #CCCCCC; font-size: small;
	// 	}
	
	// 	</style>\n";
	// }
		
	// echo "</head>
	
	// <body>";
	
				
	// if ($error_message == NULL) {
	// 	echo get_option('prompt_email');
	// }
	// else {
	// 	echo $error_message; 
	// }
		
	// echo "
	// <div id='form'>
	// <form method='post'>\n<input class='input_email' type='text' name='access_email' size='32' />&nbsp;<input type='submit' class='input_submit' name='Submit' value='";
	
	// echo get_option('prompt_submit');
	
	// echo "' />\n</form></div>";
	
	// echo "</body></html>";
	
	// stop at this point

	
	include ('intro.php');
	die();
}

function fo_cleanAddress(&$value, $key) 
	{ 
	    $value = strtolower(trim($value));
	}
	
function fo_removeInvalidAddress (&$value, $key)
	{
    if (!is_email($value)) $value = NULL;
	}
	
function selfURL() 
{ 
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.htmlspecialchars($_SERVER['REQUEST_URI']); 
} 

function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

?>