<?php
function get_login_form($atts) {
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/login', 'form');
  return ob_get_clean();
}
add_shortcode('login_form', 'get_login_form');

function get_register_form($atts) {
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/register', 'form');
  return ob_get_clean();
}
add_shortcode('register_form', 'get_register_form');

function get_user_account($atts) {
  ob_start();
  get_template_part(ACC_TEMP_PATH.'/user', 'account');
  return ob_get_clean();
}
add_shortcode('user_account', 'get_user_account');