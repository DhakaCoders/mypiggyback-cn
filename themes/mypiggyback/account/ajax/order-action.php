<?php
add_action('wp_enqueue_scripts', 'mpb_order_action_hooks');
function mpb_order_action_hooks(){
        if(is_user_logged_in()){
            ajax_mpb_driver_apply_init();
            ajax_mpb_appoint_driver_init();
            ajax_mpb_confirm_driver_init();
            ajax_mpb_confirm_author_init();
        }
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
            if( isset($_POST['to_location']) && !empty($_POST['to_location']) ){
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
            update_field( 'order_status_by_author', '0', $pid );
            update_field( 'order_status_by_driver', '0', $pid );
            update_field( 'order_appointed_to', '0', $pid );

            $data['success'] = 'success';
            $data['success_msg'] = 'Order has been completed successfully.';
            $data['redirect'] = home_url('order-payment/?order-id='.$pid);
        }else{
            $data['error'] = 'Could not create order.';
        }
        echo json_encode($data);
        wp_die();
	}
}



function ajax_mpb_driver_apply_init(){
    wp_register_script('ajax-apply-order-script', get_stylesheet_directory_uri(). '/assets/js/ajax-script.js', array('jquery') );
    wp_enqueue_script('ajax-apply-order-script');

    wp_localize_script( 'ajax-apply-order-script', 'ajax_driver_apply_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
}
//add_action('wp_ajax_nopriv_apply_driver_order', 'apply_driver_order');
add_action('wp_ajax_apply_driver_order', 'apply_driver_order');
function apply_driver_order(){
    $data = array();
    $permission = check_ajax_referer( 'apply_nonce', 'nonce', false );
    if( $permission == false ) {
        $data['error'] = 'error';
    }
    else {
        $postid = $_POST['id'];
        $user_id = get_current_user_id();
        $applied_ids = get_field('driver_applied_ids', $postid);
        if(!empty($applied_ids)){
            if(in_array($user_id, $applied_ids)){
              $data['applied'] = 'yes';
            }else{
               $ids_array = array($user_id); 
               update_field('driver_applied_ids',array_merge($applied_ids,$ids_array),$postid);
               $data['apply_send'] = 'send';
            }
        }else{
            $ids_array = array($user_id);
            update_field('driver_applied_ids',$ids_array,$postid);
        }
        
        $data['success'] = 'success';
    }
    echo json_encode($data);
    wp_die();

}

function ajax_mpb_appoint_driver_init(){
    wp_register_script('ajax-appoint-order-script', get_stylesheet_directory_uri(). '/assets/js/ajax-script.js', array('jquery') );
    wp_enqueue_script('ajax-appoint-order-script');

    wp_localize_script( 'ajax-appoint-order-script', 'ajax_appoint_driver_by_admin_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
}
//add_action('wp_ajax_nopriv_apply_driver_order', 'apply_driver_order');
add_action('wp_ajax_appoint_driver_by_admin', 'appoint_driver_by_admin');
function appoint_driver_by_admin(){
    global $wpdb;
    $data = array();
    if (!isset( $_POST["nonce"] ) && $_POST["nonce"] != 'appoint_nonce') {
        $data['error'] = 'error';
    }
    else {
        $table = $wpdb->prefix.'order_appoint'; 
        $postid = $_POST['id'];
        $driver_id = $_POST['driver'];
        $author_id = get_current_user_id();
        $get_status = get_field('order_status_by_author', $postid);
        if($get_status > 0){
            $data['appoint_sent'] = 'sent';
        }else{
            $result = update_field('order_status_by_author',1,$postid);
            update_field('order_appointed_to',$driver_id,$postid);
            if( $result ){
                Cbv_Db_Query::create($table, array(
                    'order_id' => $postid,
                    'author_id' => $author_id,
                    'driver_id' => $driver_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ));
                $data['appoint_send'] = 'send';
            }
            
        }
        $data['success'] = 'success';
    }
    echo json_encode($data);
    wp_die();

}

function ajax_mpb_confirm_driver_init(){
    wp_register_script('ajax-confirm-driver-script', get_stylesheet_directory_uri(). '/assets/js/ajax-script.js', array('jquery') );
    wp_enqueue_script('ajax-confirm-driver-script');

    wp_localize_script( 'ajax-confirm-driver-script', 'ajax_confirmation_by_driver_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_ajax_order_confirmation_by_driver', 'order_confirmation_by_driver');
function order_confirmation_by_driver(){
    global $wpdb;
    $data = array();
    if (!isset( $_POST["nonce"] ) && $_POST["nonce"] != 'confirm_driver_nonce') {
        $data['error'] = 'error';
    }
    else {
        $postid = $_POST['id'];
        $get_status = get_field('order_status_by_driver', $postid);
        if($get_status > 0){
            $data['confirm_sent'] = 'sent';
        }else{
            update_field('order_status_by_driver',1,$postid);
            $data['confirm_send'] = 'send';
        }
        $data['success'] = 'success';
    }
    echo json_encode($data);
    wp_die();

}

function ajax_mpb_confirm_author_init(){
    wp_register_script('ajax-confirm-author-script', get_stylesheet_directory_uri(). '/assets/js/ajax-script.js', array('jquery') );
    wp_enqueue_script('ajax-confirm-author-script');

    wp_localize_script( 'ajax-confirm-author-script', 'ajax_confirmation_by_author_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_ajax_order_confirmation_by_author', 'order_confirmation_by_author');
function order_confirmation_by_author(){
    global $wpdb;
    $data = array();
    if (!isset( $_POST["nonce"] ) && $_POST["nonce"] != 'confirm_author_nonce') {
        $data['error'] = 'error';
    }
    else {
        $postid = $_POST['id'];
        $get_status = get_field('order_status_by_author', $postid);
        if($get_status == 2){
            $data['confirm_sent'] = 'sent';
        }else{
            $table = $wpdb->prefix.'order_appoint'; 
            update_field('order_status_by_author',2,$postid);
            Cbv_Db_Query::update($table, 
                array(
                    'status' => 'completed',
                ),
                array(
                    'order_id' => $postid,
                )
            );
            $data['confirm_send'] = 'send';
        }
        $data['success'] = 'success';
    }
    echo json_encode($data);
    wp_die();

}