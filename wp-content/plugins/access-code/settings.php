<?php

// Create menu

add_action('admin_menu', 'friendsonly_createmenu');

function friendsonly_createmenu() {

	add_options_page('Access Page', 'Access Page', 'manage_options', 'friendsonly-settings', 'friendsonly_options');

	//call register settings function
	add_action( 'admin_init', 'register_friendsonlysettings' );
}


// Create settings

function register_friendsonlysettings() {
	//register our settings
	register_setting( 'friendsonly-main', 'email_list' );
	register_setting( 'friendsonly-main', 'prompt_email' );
	register_setting( 'friendsonly-main', 'prompt_error' );
	register_setting( 'friendsonly-main', 'prompt_submit' );
	register_setting( 'friendsonly-main', 'notify_success' );
	register_setting( 'friendsonly-main', 'notify_fail' );
	register_setting( 'friendsonly-main', 'notify_address' );
	register_setting( 'friendsonly-main', 'prompt_admin' );
	register_setting( 'friendsonly-main', 'css_link' );
	
	//Set defaults if any settings are empty
	if (trim(get_option('prompt_email')) == '') update_option('prompt_email', '<p class="prompt">Please enter your email address</p>');
	if (trim(get_option('prompt_error')) == '') update_option('prompt_error', '<p class="error">Unrecognized email address. Please try again.</p>');
	if (trim(get_option('prompt_submit')) == '') update_option('prompt_submit', 'Login');
	if (trim(get_option('prompt_admin')) == '') update_option('prompt_admin', 'Administrator login &gt;&gt;');
	if (trim(get_option('css_link')) == '') update_option('css_link', '');
	add_option ('notify_success', 1);
	add_option ('notify_fail', 1);
	if (trim(get_option('notify_address')) == '') update_option('notify_address', get_bloginfo('admin_email'));
}
	
// Show settings page

function friendsonly_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
?>

<div class="wrap">
<h2>Access Code Options</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'friendsonly-main' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Address list</th>
        <td><textarea rows="18" cols="40" name="email_list"><?php echo get_option('email_list'); ?></textarea>
		</td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Initial prompt</th>
        <td><textarea rows="2" cols="40" name="prompt_email"><?php echo htmlentities(get_option('prompt_email'), ENT_QUOTES); ?></textarea>
		</td>

        <tr valign="top">
        <th scope="row">Error message</th>
        <td><textarea rows="2" cols="40" name="prompt_error"><?php echo htmlentities(get_option('prompt_error'), ENT_QUOTES); ?></textarea>
		</td>

        <tr valign="top">
        <th scope="row">Submit button</th>
        <td><input type="text" size="40" name="prompt_submit" value="<?php echo htmlentities(get_option('prompt_submit'), ENT_QUOTES); ?>" />
		</td>
		</tr>

        <tr valign="top">
        <th scope="row">Administrator link</th>
        <td><input type="text" size="40" name="prompt_admin" value="<?php echo htmlentities(get_option('prompt_admin'), ENT_QUOTES); ?>" />
		</td>
		</tr>

        <tr valign="top">
        <th scope="row">Email notification</th>
        <td><input type="checkbox" name="notify_success" value="1" <?php if (get_option('notify_success')) echo 'checked'; ?>/> Notify on successful login<br />
        <input type="checkbox" name="notify_fail" value="1" <?php if (get_option('notify_fail')) echo 'checked'; ?>/> Notify on failed login<br />
        Email address: <input type="text" name="notify_address" size="40" value="<?php echo get_option('notify_address') ?>" />
		</td>
		</tr>
 
        <tr valign="top">
        <th scope="row">External CSS (URL)</th>
        <td><input type="text" name="css_link" size="40" value="<?php echo htmlentities(get_option('css_link'), ENT_QUOTES); ?>" />
		</td>
		</tr>
        
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>

<?php 
}
