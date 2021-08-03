<?php 
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>


<section class="order-payment-sec-cntlr">

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form>
					<div class="order-payment-sec-inr">
						<div class="order-payment-sidebar">
								<div class="box-white">
									<h3 class="fl-h2 ops-title hide-sm">Order summary</h3>
									<div class="order-payment-sidebar-map">
										<div id="route_map"></div>
									</div>
									<div class="ops-sm-bdr-cntlr">
										<h3 class="fl-h2 ops-title show-sm">Order summary</h3>
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
										<div class="order-payment-step-4-sidebar-des">
											<div class="">
												<div class="opsd-row">
													<div class="opsd-journey-time opsd-line"><span>Taxes & Fees</span> <strong> £26.20</strong></div>
												</div>
												<div class="opsd-row">
													<div class="opsd-subtotal"><strong> Total: £157.20</strong></div>
												</div>
											</div>
											<div class="opsd-card-option">
												<img src="<?php echo THEME_URI; ?>/assets/images/Stripe.png">
											</div>
											<div class="opsd-place-order-btn">
												<button>PLACE ORDER</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="order-payment-con">
								
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

									<div class="order-payment-steps-con">
										<div class="box-white-lft order-payment-step-1">
											<div class="order-payment-step">
												<h2 class="fl-h2 order-step-title"> <span>Step 1</span>  Your Journey</h2>
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
										</div>

										<div class="box-white-lft order-payment-step-2">
											<div class="order-payment-step">
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
										</div>
											
										<div class="box-white-lft order-payment-step-3">
											<div class="order-payment-step">
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
										</div>

										<div class="order-payment-step-4">
											<div class="box-white-lft">
												<div class="order-payment-step">
													<h2 class="fl-h2 order-step-title"> <span>Step 4</span>  Review & pay</h2>
													<div class="ops-form-field-rows">
														<div class="ops-form-edit-row">
															<h3 class="fl-h3 opsfer-title">Your Journey</h3>
															<ul class="reset-list list-cols">
																<li>
																	<div>
																		<strong>Vehicle Location:</strong>
																		<span>48 Woodstock Ave, Romford RM3 9NF</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Delivery:</strong>
																		<span>18 Earlsfield Dr, Chelmsford CM2 6SX</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Service:</strong>
																		<span>Vehicle Recovery</span>
																	</div>
																</li>
															</ul>
															<div class="ops-form-edit-btn">
																<a href="#">EDIT</a>
															</div>
														</div>
														<div class="ops-form-edit-row">
															<h3 class="fl-h3 opsfer-title">Your Details</h3>
															<ul class="reset-list list-cols">
																<li>
																	<div>
																		<strong>Full Name:</strong>
																		<span>Thomas Fide</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Email Address:</strong>
																		<span>tom@tradesitewales.co.uk</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Phone Number:</strong>
																		<span>07850 740357</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Billing Address:</strong>
																		<span>62 New Zealand Road <br>
																				Gabalfa <br>
																				Cardiff <br>
																				South Glamorgan<br>
																				CF14 3BS</span>
																	</div>
																</li>
															</ul>
															<div class="ops-form-edit-btn">
																<a href="#">EDIT</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="ops-form-accordion-cntlr">
												<div class="pg-accordion-tab-row">
						              <h3 class="fl-h3 pg-accordion-title pg-accordion-active">Your Vehicle <span class="pg-accordion-toggle-icon"></span></h3>
						              <div class="pg-accordion-des pg-accordion-active">
						                <div class="ops-form-accordion-des">
						                  <ul class="reset-list list-cols">
																<li>
																	<div>
																		<strong>Vehicle Type:</strong>
																		<span>Car</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Make:</strong>
																		<span>Mini</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Problem:</strong>
																		<span>Engine Trouble</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Comments:</strong>
																		<span>My car engine light came on all of a sudden and then I could smell rubber burning. I have pulled into a residential area but now the engine will not start and the engine light on my dashboard is still on. Could you bring some engine oil for my car with you.</span>
																	</div>
																</li>
															</ul>
															<div class="ops-form-edit-btn">
																<a href="#">EDIT</a>
															</div>
						                </div>
						              </div>
						            </div>
						            <div class="pg-accordion-tab-row">
						              <h3 class="fl-h3 pg-accordion-title">Response Time <span class="pg-accordion-toggle-icon"></span></h3>
						              <div class="pg-accordion-des">
						                <div class="ops-form-accordion-des">
						                  <ul class="reset-list list-cols">
																<li>
																	<div>
																		<strong>Vehicle Type:</strong>
																		<span>Car</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Make:</strong>
																		<span>Mini</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Problem:</strong>
																		<span>Engine Trouble</span>
																	</div>
																</li>
																<li>
																	<div>
																		<strong>Vehicle Comments:</strong>
																		<span>My car engine light came on all of a sudden and then I could smell rubber burning. I have pulled into a residential area but now the engine will not start and the engine light on my dashboard is still on. Could you bring some engine oil for my car with you.</span>
																	</div>
																</li>
															</ul>
															<div class="ops-form-edit-btn">
																<a href="#">EDIT</a>
															</div>
						                </div>
						              </div>
						            </div>
											</div>
										</div>
									</div>
							</div>
					</div>
				</form>
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