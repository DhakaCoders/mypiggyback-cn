<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $address = get_field('address', 'options');
  $map_url = get_field('map_url', 'options');
  $gmaplink = !empty($map_url)?$map_url: 'javascript:void()';
  $fttitle = get_field('fttitle', 'options');
  $fttext = get_field('fttext', 'options');
  $ftlogotext = get_field('ftlogotext', 'options');
  $ftinfo = get_field('footerinfo', 'options');
  $smedias = get_field('socialmedia', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="ftr-top">
    <div class="ftr-top-bg">
      <img src="<?php echo THEME_URI; ?>/assets/images/ftr-bg-icon.png">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-top-inr clearfix">
            <div class="ftr-logo-ctlr">
              <?php 
                if( !empty( $fttitle ) ) printf('<h4 class="ftr-menu-title fl-h4">%s...</h4>', $fttitle); 
                if( !empty( $fttext ) ) echo wpautop( $fttext ); 
              ?>
              <?php if( !empty( $logo_tag ) ) :?>
              <div class="ftr-logo hide-sm">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $logo_tag; ?></a>
                <?php if( !empty( $ftlogotext ) ) printf('<span class="ftr-logo-title">%s</span>', $ftlogotext); ?>
              </div>
              <?php endif; ?>   
            </div>
            <div class="ftr-menu ftr-col-1">
              <h4 class="ftr-menu-title fl-h4"><?php _e( 'Get in touch', THEME_NAME ); ?>...</h4>
              <?php if( !empty( $ftinfo['telephone'] ) ): ?>
              <div class="ftr-menu-phn">
                <a href="tel:<?php echo phone_preg($ftinfo['telephone']); ?>">
                  <?php echo $ftinfo['telephone']; ?>
                  <i>
                    <svg class="ftr-phn-icon-svg" width="17" height="16.151" viewBox="0 0 17 16.151" fill="#fff">
                      <use xlink:href="#ftr-phn-icon-svg"></use>
                    </svg> 
                </i>
                </a>
              </div>
              <?php endif; ?>
              <?php if( !empty( $ftinfo['email'] ) ): ?>
              <div class="ftr-menu-mail">
                <a href="mailto:<?php echo $ftinfo['email']; ?>">
                  <?php echo $ftinfo['email']; ?>
                  <i>
                    <svg class="ftr-email-icon-svg" width="19" height="12.666" viewBox="0 0 19 12.666" fill="#fff">
                      <use xlink:href="#ftr-email-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
              </div>
              <?php endif; ?>
              <?php if( !empty( $address ) ): ?>
              <div class="ftr-menu-location">
                <a target="_blank" href="<?php echo $gmaplink; ?>">
                  <?php echo $address; ?>
                  <i>
                    <svg class="ftr-map-marker-icon-svg" width="16" height="21.333" viewBox="0 0 16 21.333" fill="#fff">
                      <use xlink:href="#ftr-map-marker-icon-svg"></use>
                    </svg> 
                  </i>
                </a>
              </div>
              <?php endif; ?>
              <?php if(!empty($smedias)):  ?>
              <div class="ftr-menu-socials-media">
                <ul class="reset-list">
                  <?php foreach($smedias as $smedia): ?>
                  <li>
                    <a target="_blank" href="<?php echo $smedia['url']; ?>">
                        <?php echo $smedia['icon']; ?>
                    </a>
                 </li>
                 <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <div class="ftr-menu ftr-col-2">
              <h4 class="ftr-menu-title fl-h4"><?php _e( 'Site Links', THEME_NAME ); ?>...</h4>
              <?php 
                wp_nav_menu( array(
                'menu_class'     => 'reset-list clearfix',
                'theme_location' => 'cbv_footer_menu',
                'container' => false,
                ) );
              ?>
            </div>
            <div class="ftr-menu ftr-col-3">
              <h4 class="ftr-menu-title fl-h4">Newsletter Signup...</h4>
              <p>Sign up to our mailing list and receive <br>  exclusive updates and discounts.  </p>
              <div class="ftr-search-box">
                <input type="text" name="email" placeholder="Your email address">
                <button>JOIN</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="ftr-btm">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-btm-inr">
            <div class="ftr-btm-menu">
              <?php 
                $cbv_copyright_menu = array( 
                    'theme_location' => 'cbv_copyright_menu', 
                    'menu_class' => 'reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $cbv_copyright_menu );
              ?>
            </div>
            <div class="ftr-btm-copywrite">
              <?php if( !empty($copyright_text) ) printf('%s', $copyright_text); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>