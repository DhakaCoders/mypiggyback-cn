<?php 
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>


<section class="order-payment-sec-cntlr">

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="order-payment-sec-inr">
					<div class="order-payment-sidebar">
						<div class="box-white">
							<h3 class="fl-h2 ops-title">Order summary</h3>
							<div class="order-payment-sidebar-map">
								<div id="route_map"></div>
							</div>
							<div class="order-payment-sidebar-des">
								<div class="opsd-row">
									<div class="opsd-loc-1 opsd-loc"><strong>A:</strong> 48 Woodstock Ave, Romford RM3 9NF</div>
								</div>
								<div class="opsd-row">
									<div class="opsd-loc-2 opsd-loc"><strong>B:</strong> 18 Earlsfield Dr, Chelmsford CM2 6SX</div>
								</div>
								<div class="opsd-row">
									<div class="opsd-journey-time opsd-line"><span>Journey Time</span> <strong> 25 mins</strong></div>
								</div>
								<div class="opsd-row">
									<div class="opsd-journey-time opsd-line"><span>Total Miles</span> <strong> 15.5  </strong></div>
								</div>
								<div class="opsd-row">
									<div class="opsd-journey-time opsd-line"><span>Cost per mile</span> <strong> £2.00</strong></div>
								</div>
								<div class="opsd-row">
									<div class="opsd-subtotal"><strong> Subtotal: £131</strong></div>
								</div>
							</div>
						</div>
					</div>
					<div class="order-payment-con">
						<form>
						<div class="order-payment-step-bar">
							<div class="order-payment-step-bar-titles">
								<ul class="reset-list">
									<li class="active"><span>Journey</span></li>
									<li><span>Vehicle</span></li>
									<li><span>Response</span></li>
									<li><span>Payment</span></li>
								</ul>
							</div>
							<div class="order-payment-step-bar-radio-cntlr">
								<span class="line-eraser-lft line-eraser"></span>
								<span class="line-eraser-rgt line-eraser"></span>
								<ul class="reset-list">
									<li class="active"><span><i></i></span></li>
									<li><span><i></i></span></li>
									<li><span><i></i></span></li>
									<li><span><i></i></span></li>
								</ul>
							</div>
						</div>
						<div class="box-white-lft">
							
								<div class="order-payment-step order-payment-step-1 d-none">
									<h2 class="fl-h2 order-step-title"> <span>Step 2</span>  Your Journey</h2>
									<div class="form-fields-block">
										<div class="ops-form-field-row starting-field">
											<label>Veichle Location</label>
											<input type="text" name="">
											<span>A</span>
										</div>
										<div class="ops-form-field-row ending-field">
											<label>Veichle Delivery</label>
											<input type="text" name="">
											<span>B</span>
										</div>
										<div class="ops-form-field-row">
											<label>Veichle Service</label>
											<select class="selectpicker">
												<option>Vehicle Recovery</option>
												<option>Vehicle Transport</option>
											</select>
										</div>
									</div>
									<h2 class="fl-h2 order-step-details-title"> Your Details</h2>
									<div class="form-fields-block">
										<div class="ops-form-field-row">
											<label>Full Name</label>
											<input type="text" name="">
										</div>
										<div class="ops-form-field-row">
											<label>Email Address</label>
											<input type="email" name="">
										</div>
										<div class="ops-form-field-row">
											<label>Telephone Number</label>
											<input type="text" name="">
										</div>
										<div class="ops-form-field-row">
											<label>Billing Address</label>
											<select class="selectpicker">
												<option>Different to my vehicle address</option>
												<option>Different to my vehicle address 2</option>
											</select>
										</div>
										<div class="ops-form-field-row ops-gray-label">
											<label>Address</label>
											<input type="text" name="">
											<label class="ops-label-2">Address Line 1</label>
										</div>
										<div class="ops-form-field-row ops-gray-label">
											<input type="text" name="">
											<label class="ops-label-2">Address Line 2</label>
										</div>
										<div class="ops-form-field-row ops-form-field-cols">
											<div class="ops-form-field-col">
												<div>
													<input type="text" name="">
													<label class="ops-label-2">City</label>
												</div>
											</div>
											<div class="ops-form-field-col">
												<div>
													<input type="text" name="">
													<label class="ops-label-2">County</label>
												</div>
											</div>
										</div>
										<div class="ops-form-field-row ops-form-field-cols">
											<div class="ops-form-field-col">
												<div>
													<input type="text" name="">
													<label class="ops-label-2">Postcode</label>
												</div>
											</div>
										</div>
									</div>
									<div class="osp-btns">
										<div class="osp-btn-nxt">
											<button><span>next</span></button>
										</div>
									</div>
								</div>

								<div class="order-payment-step order-payment-step-2 d-none">
									<h2 class="fl-h2 order-step-title"> <span>Step 2</span>  Your Vehicle</h2>
									<div class="gap-50"></div>
									<div class="form-fields-block">
										<div class="ops-form-field-row">
											<label>Vehicle Type</label>
											<select class="selectpicker">
												<option>Car</option>
												<option>Bus</option>
											</select>
										</div>
										<div class="ops-form-field-row">
											<label>Vehicle Make</label>
											<input type="text" name="">
										</div>
										<div class="gap-50"></div>
										<div class="gap-50"></div>
										<div class="ops-form-field-row">
											<label>Vehicle Problem</label>
											<select class="selectpicker">
												<option>Engine Trouble</option>
												<option>Others</option>
											</select>
										</div>
										<div class="ops-form-field-row">
											<label>Vehicle Requests & Requirements</label>
											<textarea></textarea>
										</div>
										
									</div>
									<div class="osp-btns">
										<div class="osp-btn-back">
											<button><span>back</span></button>
										</div>
										<div class="osp-btn-nxt">
											<button><span>next</span></button>
										</div>
									</div>
								</div>
								
								<div class="order-payment-step order-payment-step-3 d-none">
									<h2 class="fl-h2 order-step-title"> <span>Step 3</span>  Response time</h2>
									<div class="ops-form-field-row-des">
										<p>The response time is the time you want to wait for one of our super fast
										recovery drivers to pick up and service your car at <strong>location A</strong>, and then 
										deliver it to your final destination at <strong>location B</strong>.</p>
									</div>
									<div class="form-fields-block">
										<div class="ops-form-field-radio">
											<input type="radio" id="mp-lbl1" name="response_time" value="gold_service">
											<span class="label-text">MOST POPULAR</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl1"><p>Gold Service <strong>(45 mins - 1 hr)</strong> </p>  <span>+£150</span></label>
										</div>
										<div class="ops-form-field-radio">
											
											<input type="radio" id="mp-lbl2" name="response_time"  value="silver_service">
											<span class="label-text">RECOMMENDED</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl2"><p>Silver Service <strong>(3 hrs - 5 hrs)</strong> </p>  <span>+£100</span></label>
										</div>
										<div class="ops-form-field-radio">
											
											<input type="radio" id="mp-lbl3" name="response_time"  value="brozne_service">
											<span class="label-text">SLOWEST</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl3"><p>Brozne Service <strong> (Next Working Day)</strong> </p>  <span>+£50</span></label>
										</div>
									</div>
									<div class="osp-btns">
										<div class="osp-btn-back">
											<button><span>back</span></button>
										</div>
										<div class="osp-btn-nxt">
											<button><span>next</span></button>
										</div>
									</div>
								</div>

								<div class="order-payment-step order-payment-step-4 ">
									<h2 class="fl-h2 order-step-title"> <span>Step 4</span>  Review & pay</h2>
									<div class="ops-form-field-row-des">
										<p>The response time is the time you want to wait for one of our super fast
										recovery drivers to pick up and service your car at <strong>location A</strong>, and then 
										deliver it to your final destination at <strong>location B</strong>.</p>
									</div>
									<div class="form-fields-block">
										<div class="ops-form-field-radio">
											<input type="radio" id="mp-lbl1" name="response_time" value="gold_service">
											<span class="label-text">MOST POPULAR</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl1"><p>Gold Service <strong>(45 mins - 1 hr)</strong> </p>  <span>+£150</span></label>
										</div>
										<div class="ops-form-field-radio">
											
											<input type="radio" id="mp-lbl2" name="response_time"  value="silver_service">
											<span class="label-text">RECOMMENDED</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl2"><p>Silver Service <strong>(3 hrs - 5 hrs)</strong> </p>  <span>+£100</span></label>
										</div>
										<div class="ops-form-field-radio">
											
											<input type="radio" id="mp-lbl3" name="response_time"  value="brozne_service">
											<span class="label-text">SLOWEST</span>
											<span class="ops-radio-bx"></span>
											<label for="mp-lbl3"><p>Brozne Service <strong> (Next Working Day)</strong> </p>  <span>+£50</span></label>
										</div>
									</div>
									<div class="osp-btns">
										<div class="osp-btn-back">
											<button><span>back</span></button>
										</div>
										<div class="osp-btn-nxt">
											<button><span>next</span></button>
										</div>
									</div>
								</div>

							
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="order-page-graphics">
		<img src="<?php echo THEME_URI; ?>/assets/images/order-page-graphics.png">
	</div>
</section>



<?php 
$thisID = get_the_ID();
$payment_sec = get_field('payment_section', $thisID);
  if( $payment_sec ): 
?>
<section class="we-accept-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="we-accept-wrp clearfix">
          <div class="we-accept-lft">
          <?php 
            if( !empty($payment_sec['title']) ) :
          ?>
          <h4 class="we-accept-title left-icon-title fl-h4">
           <i class="far fa-bell"></i>
           <?php  printf('<span>%s</span>', $payment_sec['title']); ?> 
          </h4>
          <?php endif; ?>
          </div>

          <?php 
            $images = $payment_sec['gallery'];
            $size = 'full';
            if( $images ): 
          ?>
          <div class="we-accept-rgt">
            <ul class="clearfix reset-list">
              <?php foreach( $images as $image_id ): ?>
              <li><?php echo wp_get_attachment_image( $image_id, $size ); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>