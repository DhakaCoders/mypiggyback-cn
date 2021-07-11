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
			<div class="payment-type-col">
				<label for="paypal_type">
					<input type="radio" name="payment_type" id="paypal_type" value="paypal" checked>&nbsp;
					<i><img src="<?php echo THEME_URI; ?>/assets/images/paypal-icon.png"></i>
				</label>
			</div>
			<div class="payment-type-col">
				<label for="stripe_type">
					<input type="radio" name="payment_type" id="stripe_type" value="stripe">&nbsp;
					<i><img src="<?php echo THEME_URI; ?>/assets/images/stripe-icon.png"></i>
				</label>
			</div>
		</div>
		<div class="total_amount">
			<p><strong>Total Amount:</strong> <?php echo $total_amount; ?> <span class="currency_symble">USD</span></p>
		</div>
		<div class="paypal-payment" id="paypal_payment">
			<form action="" method="post" name="form-pp">
			<input type="hidden" name="orderid" value="<?php echo $get_order->ID; ?>">
			<input type="hidden" name="itemname" value="<?php echo $get_order->post_title; ?>">
			<input type="hidden" name="amount" value="<?php echo $total_amount; ?>">
			<input type="hidden" name="payer_email" value="<?php echo $order_email; ?>"/>
			<input type="submit" name="submit" value="Pay Now" >
			<input type="hidden" name="paypal_form_nonce" value="<?php echo wp_create_nonce('paypal-form-nonce'); ?>"/>
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
			    <input type="hidden" name="order_id" value="<?php echo $get_order->ID; ?>">
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