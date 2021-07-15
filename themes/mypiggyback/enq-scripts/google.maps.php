<?php
/**
Theme specific styles and scripts
	wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	wp_enqueue_style( $handle, $src, $deps, $ver );
*/ 
$place = 'places';
if( is_single() ){
	$place = '&v';
}
wp_enqueue_script('cbv-google.js', 'https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries='.$place.'&key=AIzaSyBsJC1Qvzh-486zUtJ6iDCOrWykQe2LDFw', array('jquery'), '', true);
wp_enqueue_script('map-api',  get_template_directory_uri() . '/assets/js/google-map-js.js', array('jquery'), '1.0.0', true);

?>