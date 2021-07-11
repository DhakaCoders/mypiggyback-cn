<?php 
/*
  Template Name: Contact Us
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
?>



<section class="contact-form-sec-wrp clearfix">
  <?php 
    $map_sec = get_field('gmap', $thisID);
    if( !empty($map_sec['map_embedded']) ) printf('<div class="contact-map">%s</div>', $map_sec['map_embedded']);
  ?>
  <div class="contact-form-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contat-frm-cntlr clearfix">
            <div class="contat-frm-wrp">
              <?php 
                $intro_sec = get_field('introsec', $thisID);
                  if( $intro_sec ): 
              ?>
              <div class="contat-frm-dsc">
                <?php 
                  if( !empty($intro_sec['title']) ) :
                ?>
                <h2 class="contact-title left-icon-title fl-h2">
                 <?php printf('<span>%s...</span>', $intro_sec['title']); ?>
                 <i class="far fa-envelope-open"></i>
                </h2>
                <?php endif; ?>
                <?php if( !empty($intro_sec['description'])) echo wpautop($intro_sec['description']); ?>
              </div>
              <?php endif; ?>

              <?php 
                $form_sec = get_field('formsec', $thisID);
                if( $form_sec ): 
              ?>
              <div class="cnt-form">
                <?php if(!empty($form_sec['shortcode'])) echo do_shortcode( $form_sec['shortcode'] ); ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




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
                <h3 class="contact-info-box-title fl-h3"><?php _e( 'Address', 'mypiggyback' ); ?>
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
              $telephones = $contact_sec['telephone'];
                if( $telephones ): 
            ?>
            <li>
              <div class="contact-info-box mHc1">
                <h3 class="contact-info-box-title fl-h3"><?php _e( 'Telephone', 'mypiggyback' ); ?>
                  <i><svg class="contact-info-phn-icon-svg" width="30" height="30" viewBox="0 0 30 30" fill="#fff">
                  <use xlink:href="#contact-info-phn-icon-svg"></use></svg></i>
                </h3>
                <?php 
                  if(!empty($telephones['telephone_1'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_1']), $telephones['telephone_1']);
                  if(!empty($telephones['telephone_2'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_2']), $telephones['telephone_2']); 
                  if(!empty($telephones['telephone_3'])) printf('<div><a href="tel:%s">%s</a></div>', phone_preg($telephones['telephone_3']), $telephones['telephone_3']);  

                ?>
              </div>
            </li>
            <?php endif; ?>

            <?php 
              $emails = $contact_sec['email'];
                if( $emails ): 
            ?>
            <li>
              <div class="contact-info-box mHc1">
                <h3 class="contact-info-box-title fl-h3"><?php _e( 'Email', 'mypiggyback' ); ?>
                  <i><svg class="contact-info-mail-icon-svg" width="30" height="29.999" viewBox="0 0 30 29.999" fill="#fff">
                  <use xlink:href="#contact-info-mail-icon-svg"></use></svg></i>
                </h3>
                <?php 
                  if(!empty($emails['email_1'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_1'], $emails['email_1']); 
                  if(!empty($emails['email_2'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_2'], $emails['email_2']); 
                  if(!empty($emails['email_3'])) printf('<div><a href="mailto::%s">%s</a></div>', $emails['email_3'], $emails['email_3']); 
                ?>
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


<?php get_footer(); ?>