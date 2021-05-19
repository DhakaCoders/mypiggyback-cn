<?php
defined('ACC_TEMP_PATH') or define('ACC_TEMP_PATH', 'account/shortcodes/shortcode-templates');
include_once(THEME_DIR .'/account/vendor/autoload.php');
include_once(THEME_DIR .'/account/lib/query.php');
include_once(THEME_DIR .'/account/lib/country-lists.php');
include_once(THEME_DIR .'/account/ajax/order-action.php');
include_once(THEME_DIR .'/account/core-functions.php');
include_once(THEME_DIR .'/account/shortcodes/shortcodes.php');
include_once(THEME_DIR .'/account/lib/stripe.php');

add_action('init', 'action_init_hooks');
function action_init_hooks(){
	if( !is_user_logged_in() ){
		user_login_account();
		user_register_save();
	}else{
        user_register_update();
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
		}elseif(empty($_POST["username"])){
			$login_errors['username'] = 'Email is required';
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
				$login_errors['loging_error'] = 'Invalid username or password.';
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
			$login_errors['loging_error'] = 'Invalid username or password.';
		}

	}
	return false;
}
function user_register_save(){
    global $data_reg;
    $data_reg = array();
    if (isset( $_POST["email"] ) && wp_verify_nonce($_POST['user_register_nonce'], 'user-register-nonce')) {

        if( isset($_POST['email']) && !empty($_POST['email'])){
            $email = sanitize_email($_POST['email']);
        }
        if( isset($_POST['password']) && !empty($_POST['password'])){
            $user_password = $_POST['password'];
        }
        $firstname = (isset($_POST['fname']) && !empty($_POST['fname']))? sanitize_text_field($_POST['fname']):'';
        $lastname = (isset($_POST['lname']) && !empty($_POST['lname']))? sanitize_text_field($_POST['lname']):'';
        if(isset($email) && !empty($email)){
            $exp = explode('@', $email);
            $user_login = $exp[0];

        }
        if(email_exists($email)) {
            //Email address already registered
            $data_reg['exists_email'] = 'Email already registered';
        }else{
            $customerId = wp_insert_user(array(
                'user_login'        => $user_login,
                'user_pass'         => $user_password,
                'user_email'        => $email,
                'first_name'        => $firstname,
                'last_name'        => $lastname,
                'user_registered'   => date('Y-m-d H:i:s'),
                'role'              => 'driver'
                )
            );
            if( $customerId ){
                if( isset($_POST['phone']) && !empty($_POST['phone'])){
                    update_user_meta( $customerId, "driver_phone", sanitize_text_field($_POST['phone']) );
                }
                if( isset($_POST['address_1']) && !empty($_POST['address_1']) ){
                    update_user_meta( $customerId, "driver_address_1", sanitize_text_field($_POST['address_1']) );
                }
                if( isset($_POST['address_2']) && !empty($_POST['address_2']) ){
                    update_user_meta( $customerId, "driver_address_2", sanitize_text_field($_POST['address_2']) );
                }
                if( isset($_POST['city']) && !empty($_POST['city']) ){
                    update_user_meta( $customerId, "driver_city", sanitize_text_field($_POST['city']));
                }
                if( isset($_POST['driving_year']) && !empty($_POST['driving_year']) ){
                    update_user_meta( $customerId, "driving_year", sanitize_text_field($_POST['driving_year']) );
                }
                if( isset($_POST['country']) && !empty($_POST['country']) ){
                    update_user_meta( $customerId, "driver_country", sanitize_text_field($_POST['country']) );
                }
                if( isset($_POST['yourself']) && !empty($_POST['yourself']) ){
                    update_user_meta( $customerId, "description", sanitize_text_field($_POST['yourself']) );
                }
				add_user_meta( $customerId, '_account_status', 'draft', true );
				if (! add_user_meta( $customerId, 'show_admin_bar_front', 'false', true )){ 
					update_user_meta ( $customerId, 'show_admin_bar_front', 'false' );
				}
                $user = get_user_by( 'id', $customerId );
                if($user){
                    wp_clear_auth_cookie();
                    wp_set_current_user( $user->ID, $user->user_login );
                    if (wp_validate_auth_cookie()==FALSE)
                    {
                        wp_set_auth_cookie($user->ID, false, true);
                    }
                    do_action( 'wp_login', $user->user_login );
                    if ( is_user_logged_in() ){
                        $data_reg['username'] = $user->user_login;
                        echo '<script>window.location.href ="'.home_url('account').'";</script>';
                        wp_die();
                    }
                }

            }
            $data_reg['error'] = 'Could Not register.';
        }
    }
     return false;
}

function user_register_update(){
    global $data_reg;
    $data_reg = array();
    if (isset( $_POST["email"] ) && wp_verify_nonce($_POST['user_update_register_nonce'], 'user-update-register-nonce')) {
        $user_id = get_current_user_id();
        if( isset($_POST['email']) && !empty($_POST['email'])){
            $email = sanitize_email($_POST['email']);
        }
        if( isset($_POST['password']) && !empty($_POST['password'])){
            $user_password = $_POST['password'];
        }
        $firstname = (isset($_POST['fname']) && !empty($_POST['fname']))? sanitize_text_field($_POST['fname']):'';
        $lastname = (isset($_POST['lname']) && !empty($_POST['lname']))? sanitize_text_field($_POST['lname']):'';
        if( !empty($user_id ) ){
            if( !empty($user_password) ){
                $customerId = wp_update_user(array(
                    'ID'         => $user_id,
                    'user_pass'  => $user_password,
                    'user_email' => $email,
                    'first_name' => $firstname,
                    'last_name'  => $lastname
                    )
                );
            }else{
                $customerId = wp_update_user(array(
                    'ID'         => $user_id,
                    'user_email' => $email,
                    'first_name' => $firstname,
                    'last_name'  => $lastname
                    )
                );
            }
            if( $customerId ){
                if( isset($_POST['phone']) && !empty($_POST['phone'])){
                    update_user_meta( $customerId, "driver_phone", sanitize_text_field($_POST['phone']) );
                }
                if( isset($_POST['address_1']) && !empty($_POST['address_1']) ){
                    update_user_meta( $customerId, "driver_address_1", sanitize_text_field($_POST['address_1']) );
                }
                if( isset($_POST['address_2']) && !empty($_POST['address_2']) ){
                    update_user_meta( $customerId, "driver_address_2", sanitize_text_field($_POST['address_2']) );
                }
                if( isset($_POST['city']) && !empty($_POST['city']) ){
                    update_user_meta( $customerId, "driver_city", sanitize_text_field($_POST['city']));
                }
                if( isset($_POST['driving_year']) && !empty($_POST['driving_year']) ){
                    update_user_meta( $customerId, "driving_year", sanitize_text_field($_POST['driving_year']) );
                }
                if( isset($_POST['country']) && !empty($_POST['country']) ){
                    update_user_meta( $customerId, "driver_country", sanitize_text_field($_POST['country']) );
                }
                if( isset($_POST['yourself']) && !empty($_POST['yourself']) ){
                    update_user_meta( $customerId, "description", sanitize_text_field($_POST['yourself']) );
                }
                if( isset($_POST['prfile_image']) && !empty($_POST['prfile_image']) ){
                    update_user_meta( $user_id, 'image', $_POST[ 'prfile_image' ] );
                }
                echo '<script>window.location.href ="'.home_url('account').'";</script>';
                wp_die();

            }
            $data_reg['error'] = 'Could Not register.';
        }
    }
     return false;
}


/* table crate hook*/
include_once(THEME_DIR .'/account/lib/table.php');
add_action('init', array('cbv_create_tables','create_tables'));