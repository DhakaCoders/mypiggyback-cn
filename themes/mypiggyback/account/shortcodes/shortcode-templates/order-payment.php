<?php 
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	if( isset($_GET['order-id']) && !empty($_GET['order-id'])){
	$get_order = get_post( $_GET['order-id'] );
	$order_email = get_field('order_email', $get_order->ID); 
	$per_mile_rate = (int)get_field('per_mile','options'); 
	$toal_mile = 30;
	$total_amount = $per_mile_rate*$toal_mile;
?>
<div class="mpb-payment">
	<div class="mpb-payment-inner">
		<h2 class="payment-title">Payment Method</h2>
		<div class="payment-type">
			<input type="radio" name="payment_type" id="paypal_type" value="paypal" checked>&nbsp; Paypal
			<input type="radio" name="payment_type" id="stripe_type" value="stripe">&nbsp; Stripe
		</div>
		<div class="total_amount">
			<p><strong>Total Amount:</strong> <?php echo $total_amount; ?> <span class="currency_symble">USD</span></p>
		</div>
		<div class="paypal-payment" id="paypal_payment">
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="form-pp">
			<input type="hidden" name="business" value="seller@mail.com">
			<input type="hidden" name="image_url" value="http://paypal.local/static/logo.png">
			<input type="hidden" name="charset" value="utf8">
			<input type="hidden" name="item_name" value="<?php echo $get_order->post_title; ?>">
			<input type="hidden" name="item_number" value="1">
			<input type="hidden" name="amount" value="<?php echo $total_amount; ?>">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="return" value="<?php echo esc_url(home_url('thank-you')); ?>">
			<input type="hidden" name="rm" value="2">
			<!-- This can be set in PayPal profile -->
			<!-- <input type="hidden" name="notify_url" value="http://10.10.10.10/payment-listner.php"> -->
			<input type="hidden" name="cancel_return" value="http://10.10.10.10/payment-fail.php">
			  <input type="submit" name="submit" value="Pay Now" >
			  <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
		<div class="stripe-payment" id="stripe_payment">
			<form action="" method="post" id="payment-form">
			    <div class="form-row">
			        <div id="card-element" class="form-control">
                      <!-- a Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
			    </div>
			    <input type="hidden" name="description" value="<?php echo $get_order->post_title; ?>">
			    <input type="hidden" name="mile" value="<?php echo $toal_mile; ?>">
				<input type="hidden" name="email" value="<?php echo $order_email; ?>"/>
				<input type="hidden" name="application_form_nonce" value="<?php echo wp_create_nonce('application-form-nonce'); ?>"/>
			  <button type="submit" class="btn btn-primary btn-block mt-4">Payment</button>
			</form>
		</div>
	</div>
</div>
<?php } ?>