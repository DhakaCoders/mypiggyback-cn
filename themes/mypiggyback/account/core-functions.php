<?php
function wpCheckLogout(){
	if( !is_user_logged_in() ){
		echo '<script> location.replace("'.home_url('signin').'"); </script>';
		exit();
	}
}
function wpCheckLoggedin(){
	if( is_user_logged_in() ){
		echo '<script> location.replace("'.home_url('account').'"); </script>';
		exit();
	}
}
add_action('admin_init', 'add_custom_role');

function add_custom_role(){
  if(!get_role( 'driver' )){
  	add_role(
  		'driver', __('Driver', 'mypiggyback')
  	);
  }

}
add_action('init', 'allow_custom_role_uploads');
if(!function_exists('allow_custom_role_uploads')){
  function allow_custom_role_uploads() {
    $d_role = get_role('driver');
    if($d_role){
      $d_role->add_cap('read');
      $d_role->add_cap('upload_files');
      $d_role->add_cap('edit_posts');
    }
  }
}

function get_custom_logout($page_link = ''){
    if(!empty($page_link)){
      echo wp_logout_url( site_url() . '/'.$page_link );
    }else{
      echo wp_logout_url( site_url());
    }
    
}

add_action('admin_head', 'redirect_user_frontend_dashboard');
function redirect_user_frontend_dashboard(){
  $user = wp_get_current_user();
  if( is_admin() ){
    if ( in_array( 'driver', (array) $user->roles ) && is_user_logged_in() ) {
      $redirect_to = site_url('account');
      echo '<script>window.location.href="'.$redirect_to.'"</script>';
      exit();
    }
  }
   return false;
}

add_action( 'wp_enqueue_scripts', 'get_enqueue_media' );
function get_enqueue_media() {
	wp_enqueue_media();
	wp_enqueue_script('wpmedia-js',  THEME_URI.'/assets/js/wpmedia.js', array('jquery'), '1.0.0', true);
}
add_filter( 'ajax_query_attachments_args', 'filter_media' );

function filter_media( $query ) {
	// admins get to see everything
	if ( ! current_user_can( 'manage_options' ) )
		$query['author'] = get_current_user_id();

	return $query;
}
function get_current_user_name(){
   $user = wp_get_current_user();
   if ( $user &&  is_user_logged_in() ) {
      if(!empty($user->display_name)){
        echo $user->display_name;
      }else{
        echo $user->user_nicename;
      }
   }
   return false;
}

function get_total_completed_job($driverID = ''){
  global $wpdb;
  if( empty($driverID) ) return;
  $table = $wpdb->prefix.'order_appoint'; 
  $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE driver_id = $driverID AND status = 'completed'");
  if($rowcount > 0){
    return $rowcount;
  }else{
    return 0;
  }
}
function get_last_completed_job($driverID = ''){
  global $wpdb;
  if( empty($driverID) ) return;
  $table = $wpdb->prefix.'order_appoint'; 
  $result = $wpdb->get_row("SELECT * FROM $table WHERE driver_id = $driverID AND status = 'completed' ORDER BY created_at DESC LIMIT 1");
  if($result){
    $lastdate = date("d, M, Y", strtotime( $result->created_at ) );
    return $lastdate;
  }else{
    return false;
  }
}
function get_user_image(){
  $user = wp_get_current_user();
  if( $user ):
  $imageurl = get_the_author_meta( 'image', $user->ID );
  if( isset($imageurl) && !empty($imageurl)){
    $imgtag = '<img src="'.$imageurl.'" alt="Profile Image">';
    echo $imgtag;
  }else{
    echo '<img src="'.THEME_URI.'/assets/images/hdr-login-profile-img.png" alt="Profile Image">';
  }
  endif;
}
function milesToKilometers($miles){
    return $miles * 1.60934;
}
add_filter( 'template_include', 'single_vehicle_order_callback' );
function single_vehicle_order_callback( $original_template ) {
  if ( is_singular( 'vehicle_order' ) ) {
    return THEME_DIR .'/account/single-vehicle_order.php';
  }elseif ( is_author() ) {
    return THEME_DIR .'/account/author.php';
  }else{
    return $original_template;
  }
}