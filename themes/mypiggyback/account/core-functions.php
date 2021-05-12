<?php
function wpCheckloggetout(){
	if( !is_user_logged_in() ){
		wp_redirect( home_url());
		exit();
	}
}

function wpCheckLoggedin(){
	if( is_user_logged_in() ){
		wp_redirect( home_url('account') );
		exit();
	}
}