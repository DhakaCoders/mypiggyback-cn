<?php get_header(); ?>
<section class="home-page-bnr">
  <div id="route_map"></div>
  <div class="loc-searching-form-cntlr show-sm">
    <div style="position: relative;">
      <form id="distance-form">
        <div class="input-field-row starting-field">
          <span>A</span>
          <input type="text" id="from_placesm" name="from_places" placeholder="Choose your starting point">
          <input id="originm" name="origin" required="" type="hidden"/>
        </div>
        <div class="input-field-row ending-field">
          <span>B</span>
          <input type="text" id="to_placesm" name="to_places" placeholder="Choose your ending point">
          <input id="destination" name="destination" required="" type="hidden"/>
        </div>
        <span class="destination-switcher-button">
          <i>
            <svg class="destination-switcher-button-icon" width="8" height="18.526" viewBox="0 0 8 18.526" fill="#ccc">
              <use xlink:href="#destination-switcher-button-icon"></use></svg>
            </i>
        </span>
      </form>
      <div class="loc-distance-miles">
        <div>
          <strong>15.6</strong>
          <span>miles</span>
        </div>
      </div>
    </div>
  </div>
  <div class="home-page-bnr-con-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="home-page-bnr-con-inr">
            <div class="loc-searching-form-cntlr hide-sm">
              <div style="position: relative;">
                <form id="distance-form">
                  <div class="input-field-row starting-field">
                    <span>A</span>
                    <input type="text" id="from_places" name="from_places" placeholder="Choose your starting point">
                    <input id="origin" name="origin" required="" type="hidden"/>
                    <a class="current_location" href="#"><i class="far fa-compass"></i></a>
                  </div>
                  <div class="input-field-row ending-field">
                    <span>B</span>
                    <input type="text" id="to_places" name="to_places" placeholder="Choose your ending point">
                    <input id="destination" name="destination" required="" type="hidden"/>
                  </div>
                  <span class="destination-switcher-button">
                    <i>
                      <svg class="destination-switcher-button-icon" width="8" height="18.526" viewBox="0 0 8 18.526" fill="#ccc">
                        <use xlink:href="#destination-switcher-button-icon"></use></svg>
                      </i>
                  </span>
                </form>
                <div class="loc-distance-miles" id="results" style="display: none;">
                  <div class="mgs">
                  </div>
                </div>
              </div>
            </div>
            <div class="bnr-booking-form-cntlr">
              <div class="fl-tabs bnr-booking-form-tabs bnr-booking-form-tabs-col-cntlr">
                <button class="vr-title tab-link current" data-tab="tab-1">
                  <i>
                    <svg class="info-icon" width="3.75" height="9.999" viewBox="0 0 3.75 9.999" fill="#fff">
                    <use xlink:href="#info-icon"></use></svg>
                  </i>
                  <span>Vehicle Recovery</span>
                </button>
                <button class="vt-title tab-link" data-tab="tab-2">
                  <i>
                    <svg class="info-icon" width="3.75" height="9.999" viewBox="0 0 3.75 9.999" fill="#fff">
                    <use xlink:href="#info-icon"></use></svg>
                  </i>
                  <span>Vehicle Transport</span>
                </button>
              </div>
              <div id="tab-1" class="fl-tab-content vcl-tab-content current">
                <div class="vehicle-recovery-form vehicle-form">
                  <div class="recovery_msg"></div>
                  <form method="post" id="vehicle-recovery" onsubmit="vehicleRecoveryOrder('recov'); return false">
                    <input type="hidden" name="action" value="mpb_order_create">
                    <input type="hidden" name="order_type" value="recovery">
                    <input type="hidden" name="amount_of_miles" id="recov_miles" value="0">
                    <input type="hidden" name="amount_of_time" id="recov_time" value="0">
                    <div class="input-field-row">
                      <input type="text" name="from_location" id="recv_origin" placeholder="From location A (Postcode)">
                      <span class="error recov_fromloc_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="to_location" id="recov_destin" placeholder="To location B (Postcode)">
                      <span class="error recov_toloc_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="fullname" placeholder="Full Name">
                      <span class="error recov_name_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="email_address" placeholder="Email Address">
                      <span class="error recov_email_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="telephone" placeholder="Telephone Number">
                      <span class="error recov_phone_error"></span>
                    </div>
                    <div class="input-field-row input-field-row-submit">
                      <input type="hidden" name="mpb_order_nonce" value="<?php echo wp_create_nonce('mpb-order-nonce'); ?>"/>
                      <input type="submit" name="submit" id="recoverybtn" value="SUPER-FASTBOOKING">
                    </div>
                  </form>
                </div>
              </div>
              <div id="tab-2" class="fl-tab-content vcl-tab-content">
               <div class="vehicle-transport-form vehicle-form">
                  <div class="transport_msg"></div>
                  <form id="vehicle-transport" onsubmit="vehicleTransportOrder('trans'); return false">
                    <input type="hidden" name="action" value="mpb_order_create">
                    <input type="hidden" name="order_type" value="transport">
                    <input type="hidden" name="amount_of_miles" id="trans_miles" value="0">
                    <input type="hidden" name="amount_of_time" id="trans_time" value="0">
                    <div class="input-field-row">
                      <input type="text" name="from_location" id="trans_origin" placeholder="From location A (Postcode)">
                      <span class="error trans_fromloc_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="to_location" id="trans_destin" placeholder="To location B (Postcode)">
                      <span class="error trans_toloc_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="fullname" placeholder="Full Name">
                      <span class="error trans_name_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="email_address" placeholder="Email Address">
                      <span class="error trans_email_error"></span>
                    </div>
                    <div class="input-field-row">
                      <input type="text" name="telephone" placeholder="Telephone Number">
                      <span class="error trans_phone_error"></span>
                    </div>
                    <div class="input-field-row input-field-row-submit">
                      <input type="hidden" name="mpb_order_nonce" value="<?php echo wp_create_nonce('mpb-order-nonce'); ?>"/>
                      <input type="submit" name="" value="SUPER-FASTBOOKING">
                    </div>
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
$showhidestep = get_field('showhidebooking', HOMEID);
if( $showhidestep ):
$booksystem = get_field('bookingsystem', HOMEID);
$steps = $booksystem['booking_steps'];
?>
<section class="piggyback-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="piggyback-cntlr">
          <?php if( !empty($booksystem['title']) ): ?>
          <h2 class="piggyback-title left-icon-title fl-h2">
            <?php printf('<span>%s</span>', $booksystem['title']); ?>
            <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
              <use xlink:href="#title-location-icon"></use> </svg></i>
          </h2>
          <?php endif; ?>
          <?php if( $steps ): ?>
          <div class="piggyback-slider piggybackSlider">
            <?php 
            $i = 1;
            foreach( $steps as $step ): 
            ?>
            <div class="piggyback-slide-item-cntlr">
              <div class="piggyback-slide-item">
                <div class="piggyback-item<?php echo ( $i == 1 )?' piggyback-active-item':'';?>">
                  <div class="piggyback-item-bdr">
                    <div class="piggyback-item-img-cntlr">
                      <?php if( !empty($step['icon']) ) echo cbv_get_image_tag($step['icon']); ?>
                    </div>
                    <div class="piggyback-item-desc mHc">
                      <?php if( !empty($step['description']) ) echo wpautop($step['description']); ?>
                    </div>
                  </div>
                  <div class="piggyback-item-hding">
                    <?php printf('<h3 class="piggyback-item-title fl-h3">%d.%s</h3>', $i, $step['title']); ?>
                    <span></span>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$showhide_services = get_field('showhide_services', HOMEID);
if( $showhide_services ):
$services = get_field('servicessec', HOMEID);
$serv_steps = $services['service'];
?>
<section class="Vehicle-sec-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if( !empty($services['title']) ): ?>
        <h2 class="Vehicle-sec-title fl-h2 left-icon-title show-sm">
          <?php printf('<span>%s</span>', $services['title']); ?>
          <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
          <use xlink:href="#title-location-icon"></use> </svg></i>
        </h2>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div>
    <div class="Vehicle-left-bg inline-bg hide-sm" style="background: url('<?php echo THEME_URI; ?>/assets/images/Vehicle-left-bg-img.jpg');">

    </div>
    <?php if( $serv_steps ): ?>
    <div class="Vehicle-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="Vehicle-cntlr">
              <div class="Vehicle-desc-cntlr">
                <div class="xs-Vehicle-left-bg inline-bg show-sm"style="background: url('<?php echo THEME_URI; ?>/assets/images/Vehicle-left-bg-img.jpg');"></div>
                <?php 
                  $i = 1;
                  foreach( $serv_steps as $serv_step ): 
                ?>
                <div id="vcl-tab-<?php echo $i; ?>" class="Vehicle-desc fl-tab-content vcl-tab-content<?php echo ($i == 1)?' current':'';?>">
                  <?php 
                    if( !empty($serv_step['title']) ) printf('<h2 class="Vehicle-desc-title fl-h2">%s</h2>', $serv_step['title']); 
                    if( !empty($serv_step['description']) ) echo wpautop( $serv_step['description'] );
                  ?>
                  <div class="vcl-btn-cntlr">
                  <?php 
                    $link1 = $serv_step['link_1'];
                    $link2 = $serv_step['link_2'];
                    if( is_array( $link1 ) &&  !empty( $link1['url'] ) ){
                      printf('<div class="vcl-btn vcl-scnd-btn"><a class="fl-red-btn" href="%s" target="%s">%s</a></div>', $link1['url'], $link1['target'], $link1['title']); 
                    }
                    if( is_array( $link2 ) &&  !empty( $link2['url'] ) ){
                      printf('<div class="vcl-btn vcl-scnd-btn"><a class="fl-trnsprnt-btn" href="%s" target="%s">%s</a></div>', $link2['url'], $link2['target'], $link2['title']); 
                    }
                  ?>
                  </div>
                </div>
                <?php $i++; endforeach; ?>
              </div>

              <div class="vcl-right-wrap">
                <?php if( !empty($services['title']) ): ?>
                <h2 class="Vehicle-tab-title left-icon-title fl-h2 hide-sm">
                  <?php printf('<span>%s</span>', $services['title']); ?>
                  <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                    <use xlink:href="#title-location-icon"></use> </svg></i>
                  </h2>
                <?php endif; ?>
                  <div class="vcl-tabs clearfix">
                    <?php 
                      $i = 1;
                      foreach( $serv_steps as $serv_step ): 
                    ?>
                    <div class="vcl-tab-link<?php echo ($i == 1)?' current':'';?>">
                      <span><?php echo $i; ?></span>
                      <button class="tab-link" data-tab="vcl-tab-<?php echo $i; ?>">
                        <i><svg class="vcl-tab-icon-0<?php echo $i; ?>" width="100" height="69.986" viewBox="0 0 100 69.986" fill="#141414">
                          <use xlink:href="#vcl-tab-icon-0<?php echo $i; ?>"></use> </svg>
                        </i>
                      </button>
                    </div>
                    <?php $i++; endforeach; ?>
                  </div>

                  <div class="vcl-tabs-slider-wrap show-sm">
                    <div class="vcl-tabs-slider VclTabSlider">
                    <?php 
                      $i = 1;
                      foreach( $serv_steps as $serv_step ): 
                    ?>
                        <div class="vcl-tabs-slide-item-cntlr">
                          <div class="vcl-tabs-slide-item">
                            <div class="vcl-tabs-slide">
                              <div class="vcl-tab-link">
                                <span><?php echo $i; ?></span>
                                <button class="tab-link" data-tab="vcl-tab-<?php echo $i; ?>">
                                  <i><svg class="vcl-tab-icon-0<?php echo $i; ?>" width="100" height="69.986" viewBox="0 0 100 69.986" fill="#141414">
                                    <use xlink:href="#vcl-tab-icon-0<?php echo $i; ?>"></use> </svg>
                                  </i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php 
$showhide_about = get_field('showhide_about', HOMEID);
if( $showhide_about ):
$about = get_field('aboutsec', HOMEID);
?>
<section class="mpb-about-sec inline-bg" style="background: url('<?php echo !empty($about['icon'])? cbv_get_image_src($about['icon']):''; ?>');">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mpb-about-sec-inr clearfix">
          <div class="mpb-about-lft">
            <div class="mpb-about-img">
              <?php if( !empty($about['image']) ) echo cbv_get_image_tag($about['image']); ?>
            </div>
          </div>
          <div class="mpb-about-rgt">
            <div class="mbp-about-rgt-des">
              <?php if( !empty($about['title']) ): ?>
              <h2 class="mbp-about-des-title left-icon-title fl-h2">
                <?php printf('<span>%s</span>', $about['title']); ?>
                <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                  <use xlink:href="#title-location-icon"></use> </svg></i>
              </h2>
              <?php endif; ?>
              <?php if( !empty($about['description']) ) echo wpautop( $about['description'] ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>