<?php 
/*Template Name: Vehicle Transport*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
?>
<section class="home-page-bnr">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d66815.33056846341!2d-0.14238880307146762!3d51.51248988308131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sbd!4v1615400813839!5m2!1sen!2sbd" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  <div class="home-page-bnr-con-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="home-page-bnr-con-inr">
            <div class="loc-searching-form-cntlr">
              <div style="position: relative;">
                <form>
                  <div class="input-field-row starting-field">
                    <span>A</span>
                    <input type="text" name="" placeholder="Choose your starting point">
                  </div>
                  <div class="input-field-row ending-field">
                    <span>B</span>
                    <input type="text" name="" placeholder="Choose your ending point">
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
            <div class="bnr-booking-form-cntlr">
              <div class="fl-tabs bnr-booking-form-tabs">
                <div class="vt-title tab-link current" data-tab="tab-1">
                  <i>
                    <svg class="info-icon" width="3.75" height="9.999" viewBox="0 0 3.75 9.999" fill="#fff">
                    <use xlink:href="#info-icon"></use></svg>
                  </i>
                  <span>Vehicle Recovery Service</span>
                </div>
              </div>
              <div class="vehicle-recovery-form vehicle-form">
                <form id="vehicle-transport" onsubmit="vehicleTransportOrder('trans'); return false">
                  <input type="hidden" name="action" value="mpb_order_create">
                  <input type="hidden" name="order_type" value="transport">
                  <div class="input-field-row">
                    <input type="text" name="from_location" placeholder="From location A (Postcode)">
                    <span class="error trans_fromloc_error"></span>
                  </div>
                  <div class="input-field-row">
                    <input type="text" name="to_location" placeholder="To location B (Postcode)">
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
</section>
<?php 
$showhidestep = get_field('showhidebooking', $thisID);
if( $showhidestep ):
$booksystem = get_field('bookingsystem', $thisID);
$steps = $booksystem['booking_steps'];
?>
<section class="piggyback-sec vr-piggyback-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="piggyback-cntlr">
          <?php if( !empty($booksystem['title']) ): ?>
          <h2 class="piggyback-title left-icon-title fl-h2">
            <?php printf('%s', $booksystem['title']); ?>
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
$showhide_work = get_field('showhide_work', $thisID);
if( $showhide_work ):
$worklft = get_field('workprocess', $thisID);
$workrgt = get_field('workprocess_rgt', $thisID);
?>
<section class="Vehicle-sec-wrap order-pgbk-home vr-Vehicle-sec">
  <?php if( !empty($workrgt['mbtitle']) ):?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="Vehicle-sec-title fl-h2 left-icon-title show-sm">
          <?php printf('<span>%s</span>', $workrgt['mbtitle']); ?>
          <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
            <use xlink:href="#title-location-icon"></use> </svg></i>
          </h2>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <div>
    <div class="Vehicle-left-bg inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/Vehicle-left-bg-img.jpg');">

    </div>
    <div class="Vehicle-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="Vehicle-cntlr">
              <?php if( $worklft ):?>
              <div class="Vehicle-desc-cntlr">
                <div class="xs-Vehicle-left-bg inline-bg show-sm"style="background: url('<?php echo THEME_URI; ?>/assets/images/Vehicle-left-bg-img.jpg');"></div>
                <div class="Vehicle-desc">
                  <?php 
                    if( !empty($worklft['title']) ) printf('<h2 class="Vehicle-desc-title fl-h2">%s</h2>', $worklft['title']); 
                    if( !empty($worklft['description']) ) echo wpautop( $worklft['description'] );
                  ?>
                  <div class="vcl-btn-cntlr">
                  <?php 
                    $link1 = $worklft['link_1'];
                    $link2 = $worklft['link_2'];
                    if( is_array( $link1 ) &&  !empty( $link1['url'] ) ){
                        printf('<div class="vcl-btn vcl-fst-btn"><a class="fl-red-btn" href="%s" target="%s">%s</a></div>', $link1['url'], $link1['target'], $link1['title']); 
                    }
                    if( is_array( $link2 ) &&  !empty( $link2['url'] ) ){
                        printf('<div class="vcl-btn vcl-scnd-btn"><a class="fl-trnsprnt-btn" href="%s" target="%s">%s</a></div>', $link2['url'], $link2['target'], $link2['title']); 
                    }
                  ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <?php if( $workrgt ):?>
              <div class="vcl-right-wrap">
                  <?php if( !empty($workrgt['title']) ): ?>
                  <h2 class="Vehicle-title left-icon-title fl-h2 hide-sm">
                    <?php printf('<span>%s</span>', $workrgt['title']); ?>
                    <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                    <use xlink:href="#title-location-icon"></use> </svg></i>
                  </h2>
                  <?php endif; ?>
                  <div class="ordr-pgbk-hm-rt-img">
                    <?php if( !empty($workrgt['image']) ) echo cbv_get_image_tag($workrgt['image']); ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<?php endif; ?>
<?php 
$showhide_testimonial = get_field('showhide_testimonial', $thisID);
if( $showhide_testimonial ):
$testim = get_field('testimonialsec', $thisID);
?>
<section class="testimonials-sec">
  <div class="testimonials-bg">
    <img src="<?php echo THEME_URI; ?>/assets/images/testimonials-bg-img.png" alt="">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="testimonials-cntlr">
          <div class="super-piggs-img">
            <img src="<?php echo THEME_URI; ?>/assets/images/super-piggs.png" alt="">
          </div>
          <?php if( !empty($testim['title']) ): ?>
          <h2 class="testimonials-title left-icon-title fl-h2">
            <?php printf('<span>%s</span>', $testim['title']); ?>
            <i><svg class="quadarea-icon" width="52.562" height="44" viewBox="0 0 52.562 44" fill="#f2101c">
                  <use xlink:href="#quadarea-icon"></use> </svg></i>
          </h2>
        <?php endif; ?>
        <?php 
          $testimonials = $testim['select_testimonial'];
          if($testimonials){
        ?>
          <div class="testimonials-slider-wrap">
            <div class="testimonials-slider testimonialSlider">
              <?php 
              foreach( $testimonials as $testmonial ): 
                $desc = get_field('description', $testmonial->ID);
                $subtitle = get_field('subtitle', $testmonial->ID);
                $review = (int)get_field('review', $testmonial->ID);
              ?>
              <div class="tstmnl-slide-item-cntlr">
                <div class="tstmnl-slide-item">
                  <div class="tstmnl-item">
                    <?php if( !empty($desc) ) echo wpautop($desc); ?>
                    <div class="tstmnl-item-rating">
                      <ul class="reset-list">
                        <?php for( $i = 1; $i <= $review; $i++  ){ ?>
                        <li><a><i class="fas fa-star"></i></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                    <?php if( !empty(get_the_title()) ) printf('<h4 class="tstmnl-person-name fl-h4">%s</h4>', get_the_title());?>
                    <?php if( !empty($subtitle) ) printf('<h6 class="tstmnl-person-title">%s</h6>', $subtitle);?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>