<?php
function get_login_form($atts) {
  wpCheckLoggedin();
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/login', 'form');
  return ob_get_clean();
}
add_shortcode('login_form', 'get_login_form');

function get_register_form($atts) {
  wpCheckLoggedin();
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/register', 'form');
  return ob_get_clean();
}
add_shortcode('register_form', 'get_register_form');

function get_order_payment($atts) {
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/order', 'payment');
  return ob_get_clean();
}
add_shortcode('order_payment', 'get_order_payment');

function get_thank_you($atts) {
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/thank', 'you');
  return ob_get_clean();
}
add_shortcode('mpb_thank_you', 'get_thank_you');


function get_user_account($atts) {
  wpCheckLogout();
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/user', 'account');
  return ob_get_clean();
}
add_shortcode('user_account', 'get_user_account');