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
add_action('wp_ajax_mpb_order_create', 'mpb_order_create');
function mpb_order_create(){
	$data = array();
	if (isset( $_POST["email_address"] ) && wp_verify_nonce($_POST['mpb_order_nonce'], 'mpb-order-nonce')) {
        if(empty($msg)){
            $type = (isset($_POST['order_type']) && !empty($_POST['order_type']))?sanitize_text_field($_POST['order_type']):'';
            $post_information = array(
                'post_author'=> 1,
                'post_title' => wp_strip_all_tags( 'Vehicle '.$type.' #'. rand(11,50)),
                'post_type' => 'vehicle_order',
                'post_status' => 'publish'
            );
             
            $pid = wp_insert_post($post_information);

            if( isset($_POST['from_location']) && !empty($_POST['from_location']) ){
                update_field( 'order_from_location', sanitize_text_field($_POST['from_location']), $pid );
            }
            if( isset($_POST['order_to_location']) && !empty($_POST['order_to_location']) ){
                update_field( 'order_to_location', sanitize_text_field($_POST['to_location']), $pid );
            }
            if(isset($_POST['fullname']) && !empty($_POST['fullname'])){
                update_field( 'order_fullname', sanitize_text_field($_POST['fullname']), $pid );
            }
            if(isset($_POST['email_address']) && !empty($_POST['email_address'])){
                update_field( 'order_email', sanitize_email($_POST['email_address']), $pid );
            }
            if(isset($_POST['telephone']) && !empty($_POST['telephone'])){
                update_field( 'order_telephone', sanitize_text_field($_POST['telephone']), $pid );
            }
            if( !empty($type) ){
                update_field('order_type', sanitize_text_field($type), $pid );
            }
            update_field( 'driver_applied_ids', '', $pid );
            update_field( 'order_status', 'publish', $pid );
            update_field( 'order_ongoing_status', '0', $pid );
            update_field( 'order_completed_status', '0', $pid );
            wp_redirect( home_url('order-payment/'.$pid) );

            $data['success'] = 'success';
            $data['success_msg'] = 'Order has been completed successfully.';
            $data['redirect'] = home_url('order-payment/'.$pid);
        }else{
            $data['error'] = 'Could not create order.';
        }
        echo json_encode($data);
        wp_die();
	}
}
