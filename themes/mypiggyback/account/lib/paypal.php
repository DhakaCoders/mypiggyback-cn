<?php
$total_amount = 0;
// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
	'email' => 'seller@mail.com',
	'return_url' => home_url('thank-you'),
	'cancel_url' => '',
	'notify_url' => ''
];
$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
// Check if paypal request or response
if (isset( $_POST["amount"] ) && wp_verify_nonce($_POST['paypal_form_nonce'], 'paypal-form-nonce')) {
	$data = [];

	$itemname = $_POST['itemname'];
	$total_amount = $_POST['amount'];
	$data['business'] = $paypalConfig['email'];
	// Set the PayPal return addresses.
	$data['return'] = stripslashes($paypalConfig['return_url']);
	$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);
    $data['item_name'] = $itemname;
	$data['amount'] = $total_amount;
	$data['item_number'] = $total_amount;
	$data['paymentaction'] = 'order';
	$data['currency_code'] = 'USD';
	$data['charset'] = 'utf8';
	$data['cmd'] = '_xclick';
	$data['no_note'] = '1';
	$data['email'] = stripslashes($_POST['payer_email']);
	// Build the query string from the data.
	$queryString = http_build_query($data);
	// Redirect to paypal IPN
	header('location:' . $paypalUrl . '?' . $queryString);
	exit();
} else{

}