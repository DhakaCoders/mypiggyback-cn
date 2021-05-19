<?php
/**
Theme specific styles and scripts
	wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	wp_enqueue_style( $handle, $src, $deps, $ver );
*/ 
wp_enqueue_style('cbv-style', get_stylesheet_uri(), array(), rand(0, 999));
wp_enqueue_style('cbv-devices-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), array(0, 99));
wp_enqueue_script('cbv-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('cbv-waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '2.0.5', true);
wp_enqueue_script('cbv-custom', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
if( is_page(296) ) wp_enqueue_script('cbv-stripe', get_template_directory_uri() . '/assets/js/stripe.js', array('jquery'), '1.0.0', true);

?>