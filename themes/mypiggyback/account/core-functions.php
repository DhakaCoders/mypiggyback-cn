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
