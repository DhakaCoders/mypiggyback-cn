<?php
defined('ACC_TEMP_PATH') or define('ACC_TEMP_PATH', 'account/shortcodes/shortcode-templates');

include_once(THEME_DIR .'/account/core-functions.php');
include_once(THEME_DIR .'/account/shortcodes/shortcodes.php');

add_action('init', 'action_init_hooks');
function action_init_hooks(){
	if( !is_user_logged_in() ){
		user_login_account();
	}
}
function user_login_account(){
	global $login_errors;
	$login_errors = array();
	if (isset( $_POST["username"] ) && wp_verify_nonce($_POST['user_login_nonce'], 'user-login-nonce')) {
		$success = true;
		if (filter_var($_POST["username"], FILTER_VALIDATE_EMAIL)) {
			$user = get_user_by( 'email', sanitize_email($_POST["username"]) );
			$data['username'] = ' ';
		}elseif ( !empty($_POST["username"]) ) {
			$user = get_user_by( 'login', sanitize_email($_POST["username"]) );
			$data['username'] = ' ';
		}elseif(empty($_POST["username"])){
			$login_errors['username'] = 'Username is required';
			$success = false;
			$user = false;
		}
		$password = esc_attr($_POST['password']);
		$data['pass'] = ' ';
		if(empty($password)) {
			$login_errors['pass'] = 'Password is required';
			$success = false;
			$user = false;
		}

		
		// this returns the user ID and other info from the user name
		if( isset($user) && $user ){

	 		if(!$user || !wp_check_password($password, $user->user_pass, $user->ID)) {
				// if the user name doesn't exist
				$login_errors['loging_error'] = 'Unsuccessful Login';
				$success = false;
			}

			if($success){
		        wp_clear_auth_cookie();
	            wp_set_current_user( $user->ID, $user->user_login );
	            if (wp_validate_auth_cookie()==FALSE)
				{
				    wp_set_auth_cookie($user->ID, false, false);
				}
	            do_action( 'wp_login', $user->user_login );
	            if ( is_user_logged_in() ){
	            	wp_redirect( home_url('account'));
	            	exit();
	            }
	        }
		}else{
			$login_errors['loging_error'] = 'Unsuccessful Login';
		}

	}
	return false;
}
