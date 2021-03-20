<?php 
/*
  Template Name: Contact Us
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
?>


<?php 
$form_sec = get_field('form_section', $thisID);
  if( $form_sec ): 
?>
<section class="contact-form-sec-wrp clearfix">
  <div class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d66815.33056846341!2d-0.14238880307146762!3d51.51248988308131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sbd!4v1615400813839!5m2!1sen!2sbd" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
  <div class="contact-form-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contat-frm-cntlr clearfix">
            <div class="contat-frm-wrp">
              <div class="contat-frm-dsc">
                <?php 
                  if( !empty($form_sec['title']) ) :
                ?>
                <h2 class="contact-title left-icon-title fl-h2">
                 <?php printf('<span>%s...</span>', $form_sec['title']); ?>
                 <i class="far fa-envelope-open"></i>
                </h2>
                <?php endif; ?>
                <?php if( !empty($form_sec['description'])) echo wpautop($form_sec['description']); ?>
              </div>
              <div class="cnt-form">
                <?php if(!empty($form_sec['form_shortcode'])) echo do_shortcode( $form_sec['form_shortcode'] ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>


<?php 
$contact_sec = get_field('contact_section', $thisID);
  if( $contact_sec ): 
?>
<section class="contact-info-sec-wrp">
  <div class="contact-info-bg" style="background: url(<?php echo THEME_URI; ?>/assets/images/contact-info-sec-bg.png);">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-info-wrp">
          <?php 
            if( !empty($contact_sec['title']) ) :
          ?>
          <h2 class="contact-info-title left-icon-title fl-h2">
           <?php printf('<span>%s...</span>', $contact_sec['title']); ?>
           <i class="far fa-comment"></i>
          </h2>
          <?php endif; ?>
          <ul class="clearfix reset-list">
            <?php 
              $address = get_field('address', 'options');
              $map_url = get_field('map_url', 'options');
              $gmaplink = !empty($map_url)?$map_url: 'javascript:void()';
            ?>
            <li>
              <div class="contact-info-box mHc1">
                <h3 class="contact-info-box-title fl-h3">Address
                  <i><svg class="contact-info-map-svg" width="22.5" height="30" viewBox="0 0 22.5 30" fill="#fff">
                <use xlink:href="#contact-info-map-svg"></use></svg></i>
                </h3>
                <span>My Piggy Back Ltd</span>
                <?php if( !empty( $address ) ): ?>
                <a href="<?php echo $gmaplink; ?>" target="_blank"><?php echo $address; ?></a>
                <?php endif; ?>
              </div>
            </li>
            <?php 
              $telephones = get_field('telephone', $thisID);
                if( $telephones ): 
            ?>
            <li>
              <div class="contact-info-box mHc1">
                <h3 class="contact-info-box-title fl-h3">Telephone
                  <i><svg class="contact-info-phn-icon-svg" width="30" height="30" viewBox="0 0 30 30" fill="#fff">
                  <use xlink:href="#contact-info-phn-icon-svg"></use></svg></i>
                </h3>
                <?php 
                  if(!empty($telephones['telephone_1'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_1']), $telephones['telephone_1']);
                  if(!empty($telephones['telephone_2'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_2']), $telephones['telephone_2']); 
                  if(!empty($telephones['telephone_3'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_3']), $telephones['telephone_3']);  

                ?>
                <!-- <div><a href="tel:02920 257257">02920 257257</a></div>
                <div><a href="tel:01234 564584">01234 564584</a></div>
                <div><a href="tel:01664 394273">01664 394273</a></div> -->
              </div>
            </li>
            <?php endif; ?>

            <?php 
              $emails = get_field('email', $thisID);
                if( $emails ): 
            ?>
            <li>
              <div class="contact-info-box mHc1">
                <h3 class="contact-info-box-title fl-h3">Email
                  <i><svg class="contact-info-mail-icon-svg" width="30" height="29.999" viewBox="0 0 30 29.999" fill="#fff">
                  <use xlink:href="#contact-info-mail-icon-svg"></use></svg></i>
                </h3>
                <?php 
                  if(!empty($emails['email_1'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_1'], $emails['email_1']); 
                  if(!empty($emails['email_2'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_2'], $emails['email_2']); 
                  if(!empty($emails['email_3'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_3'], $emails['email_3']); 
                ?>
                <!-- <div><a href="mailto:info@mypiggyback.com">info@mypiggyback.com</a></div>
                <div><a href="mailto:order@mypiggyback.com">order@mypiggyback.com</a></div>
                <div><a href="mailto:drivers@mypiggyback.com">drivers@mypiggyback.com</a></div> -->
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>


<?php 
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
            $images = get_field('gallery');
            $size = 'full';
            if( $images ): 
          ?>
          <div class="we-accept-rgt">
            <ul class="clearfix reset-list">
              <?php foreach( $images as $image_id ): ?>
              <li><?php echo wp_get_attachment_image( $image_id, $size ); ?></li>
              <?php endforeach; ?>
<!--               <li class="show-sm"><img src="<?php echo THEME_URI; ?>/assets/images/visa.svg"></li>
              <li class="show-sm"><img src="<?php echo THEME_URI; ?>/assets/images/mastercard.svg"></li>
              <li class="show-sm"><img src="<?php echo THEME_URI; ?>/assets/images/maestro.svg"></li>


              <li><img src="<?php echo THEME_URI; ?>/assets/images/discover-network.svg"></li>
              <li><img src="<?php echo THEME_URI; ?>/assets/images/american-express.svg"></li>
              <li><img src="<?php echo THEME_URI; ?>/assets/images/paypal.svg"></li>
              <li class="hide-sm"><img src="<?php echo THEME_URI; ?>/assets/images/visa.svg"></li>
              <li class="hide-sm"><img src="<?php echo THEME_URI; ?>/assets/images/mastercard.svg"></li>
              <li class="hide-sm"><img src="<?php echo THEME_URI; ?>/assets/images/maestro.svg"></li> -->
            </ul>
          </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>