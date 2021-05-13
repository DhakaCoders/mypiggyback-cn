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
  		'driver', __('Driver', 'mypiggyback'),
		array(
			'read'         => true,
			'edit_posts'   => true,
			'upload_files' => true,
		)
  	);
  }

}

function get_custom_logout($page_link = ''){
    if(!empty($page_link)){
      echo wp_logout_url( site_url() . '/'.$page_link );
    }else{
      echo wp_logout_url( site_url());
    }
    
}