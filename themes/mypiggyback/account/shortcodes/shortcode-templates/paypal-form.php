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