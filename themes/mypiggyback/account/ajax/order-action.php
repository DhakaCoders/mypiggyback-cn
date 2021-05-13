<?php
add_action('wp_enqueue_scripts', 'mpb_order_action_hooks');

function mpb_order_action_hooks(){
		ajax_mpb_order_init();
}

function ajax_mpb_order_init(){
    wp_register_script('ajax-mpb-order-script', get_stylesheet_directory_uri(). '/assets/js/ajax-script.js', array('jquery') );
    wp_enqueue_script('ajax-mpb-order-script');

    wp_localize_script( 'ajax-mpb-order-script', 'ajax_mpb_order_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
}
add_action('wp_ajax_nopriv_mpb_order_create', 'mpb_order_create');
	//add_action('wp_ajax_ngo_user_create_account', 'ngo_user_create_account');
function mpb_order_create(){
	$data = array();
	if (isset( $_POST["email_address"] ) && wp_verify_nonce($_POST['user_ngo_register_nonce'], 'user-ngo-register-nonce')) {

	}
}
