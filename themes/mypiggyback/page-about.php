<?php 
/*
  Template Name: About Us
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
?>


<section class="mpb-about-des-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mpb-about-des-sec-inr clearfix hide-sm">
          <div class="mbp-about-des-lft">
            <div class="mbp-about-des">
              <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque mauris vel turpis semper, pharetra tincidunt magna scelerisque. Ut finibus ex nec sodales ullamcorper. Phasellus a neque pretium, hendrerit tortor.</strong></p>
              <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at. Phasellus ante magna, egestas a ultricies quis, dapibus at massa. Aliquam laoreet libero id tristique condimentum. Vivamus quis neque eu diam ultricies congue in non enim. Aliquam semper ex tortor, imperdiet consequat sapien efficitur et. Duis pretium velit non turpis luctus, vel maximus risus. </p>
              <div class="mbp-about-btn">
                <div class="mbp-abot-btn-red">
                  <a class="fl-red-btn" href="#">BOOK NOW</a>
                </div>
                <div class="mbp-abot-btn-blue">
                  <a class="fl-red-btn blue-btn" href="#">OUR SERVICES</a>
                </div>
              </div>
            </div>
          </div>
          <div class="mbp-about-des-rgt">
            <img src="<?php echo THEME_URI; ?>/assets/images/mpb-about-des-rgt-img-01.jpg">
          </div>
        </div>
        <div class="xs-about-des clearfix show-sm">
          <p class="text-img">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque mauris vel turpis semper, pharetra tincidunt magna scelerisque. Ut finibus ex nec sodales ullamcorper. Phasellus a neque pretium, hendrerit tortor.
            <img src="<?php echo THEME_URI; ?>/assets/images/mpb-about-des-rgt-img-01.jpg">
          </p>
          <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at. Phasellus ante magna, egestas a ultricies quis, dapibus at massa. Aliquam laoreet libero id tristique condimentum. Vivamus quis neque eu diam ultricies congue in non enim. 
            
          </p>
          <p>Aliquam semper ex tortor, imperdiet consequat sapien efficitur et. Duis pretium velit non turpis luctus, vel maximus risus.. </p>
          <div class="mbp-about-btn">
            <div class="mbp-abot-btn-red">
              <a class="fl-red-btn" href="#">BOOK NOW</a>
            </div>
            <div class="mbp-abot-btn-blue">
              <a class="fl-red-btn blue-btn" href="#">OUR SERVICES</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mbp-about-num-sec">
  <div class="mbp-about-num-lft-bg">
    <img class="hide-sm" src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-lft-bg.jpg">
    <img class="show-sm" src="<?php echo THEME_URI; ?>/assets/images/xs-mbp-about-num-lft-bg.jpg">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbp-about-num-sec-inr">
          <div class="mbp-about-num-lft-bg-color">
          </div>
          <div class="mbp-about-num-des">
            <div class="fl-entry-hdr">
              <h2 class="mbp-about-entry-title left-icon-title fl-h2">
                <span>Our Story in numbers...</span>
                <i>
                  <svg class="title-location-icon-white-svg" width="30" height="44.235" viewBox="0 0 30 44.234" fill="#fff">
                  <use xlink:href="#title-location-icon-white-svg"></use> </svg>
                </i>
              </h2>
            </div>
            <div class="mbp-about-num-grds">
              <ul class="reset-list clearfix">
                <li>
                  <div class="mbp-about-num-grd-item">
                    <div class="down-angle">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbp-down-angle.png">
                    </div>
                    <div class="mbp-angi-img">
                      <i><img src="<?php echo THEME_URI; ?>/assets/images/mpb-angi-img-01.svg"></i>
                    </div>
                    <div class="mbp-angi-des">
                      <span class="counter">206,234</span>
                      <strong>MILES TRAVELLED</strong>
                    </div>
                  </div>
                  <div class="mbp-about-num-btm-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-btm-icon.png">
                  </div>
                </li>
                <li>
                  <div class="mbp-about-num-grd-item">
                    <div class="down-angle">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbp-down-angle.png">
                    </div>
                    <div class="mbp-angi-img">
                      <i><img src="<?php echo THEME_URI; ?>/assets/images/mpb-angi-img-02.svg"></i>
                    </div>
                    <div class="mbp-angi-des">
                      <span class="counter">55,899</span>
                      <strong>VEHICLES TOWED</strong>
                    </div>
                  </div>
                  <div class="mbp-about-num-btm-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-btm-icon.png">
                  </div>
                </li>
                <li>
                  <div class="mbp-about-num-grd-item">
                    <div class="down-angle">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbp-down-angle.png">
                    </div>
                    <div class="mbp-angi-img">
                      <i><img src="<?php echo THEME_URI; ?>/assets/images/mpb-angi-img-03.svg"></i>
                    </div>
                    <div class="mbp-angi-des">
                      <span class="counter">135,234</span>
                      <strong>CUSTOMER CALLS</strong>
                    </div>
                  </div>
                  <div class="mbp-about-num-btm-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-btm-icon.png">
                  </div>
                </li>
                <li>
                  <div class="mbp-about-num-grd-item">
                    <div class="down-angle">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbp-down-angle.png">
                    </div>
                    <div class="mbp-angi-img">
                      <i><img src="<?php echo THEME_URI; ?>/assets/images/mpb-angi-img-04.svg"></i>
                    </div>
                    <div class="mbp-angi-des">
                      <span class="counter">103,725</span>
                      <strong>ROADSIDE REPAIRS</strong>
                    </div>
                  </div>
                  <div class="mbp-about-num-btm-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-btm-icon.png">
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="mbp-about-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbp-about-team-sec-inr">
          <div class="mbp-about-team-entry-hdr">
            <h2 class="mbp-about-team-entry-hdr-title left-icon-title fl-h2">
              <span>Our TEAM...</span>
              <i><svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
              <use xlink:href="#title-location-icon"></use> </svg></i>
            </h2>
          </div>
          <div class="mbp-abot-team-grds">
            <ul class="reset-list clearfix">
              <li>
                <div class="mbpat-grd-item">
                  <div class="mbp-atgi-img-ctlr">
                    <div class="mbp-atgi-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/mbp-atgi-img-01.jpg');">
                      
                    </div>
                    <div class="mbp-atgi-des">
                      <div class="mbp-atgi-des-hdr">
                        <h4 class="mbp-atgi-des-title fl-h4">Team Member #1</h4>
                      </div>
                      <p>Nulla volutpat eget est et ullamcorper. Ut porttitor nunc ac elit maximus maximus. Proin vestibulum risus purus, sed vestibulum augue bibendum at. </p>
                      <div class="mbp-atgi-socials-media">
                        <div class="mbp-atgism-lft">
                          <ul class="reset-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                          </ul>
                        </div>
                        <div class="mbp-atgism-rgt">
                          <a href="#">VISIT WEBSITE</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="mbpat-grd-item">
                  <div class="mbp-atgi-img-ctlr">
                    <div class="mbp-atgi-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/mbp-atgi-img-02.jpg');">
                      
                    </div>
                    <div class="mbp-atgi-des">
                      <div class="mbp-atgi-des-hdr">
                        <h4 class="mbp-atgi-des-title fl-h4">Team Member #2</h4>
                      </div>
                      <p>Nulla volutpat eget est et ullamcorper. Ut porttitor nunc ac elit maximus maximus. Proin vestibulum risus purus, sed vestibulum augue bibendum at. </p>
                      <div class="mbp-atgi-socials-media">
                        <div class="mbp-atgism-lft">
                          <ul class="reset-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                          </ul>
                        </div>
                        <div class="mbp-atgism-rgt">
                          <a href="#">VISIT WEBSITE</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="mbpat-grd-item">
                  <div class="mbp-atgi-img-ctlr">
                    <div class="mbp-atgi-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/mbp-atgi-img-03.jpg');">
                      
                    </div>
                    <div class="mbp-atgi-des">
                      <div class="mbp-atgi-des-hdr">
                        <h4 class="mbp-atgi-des-title fl-h4">Team Member #3</h4>
                      </div>
                      <p>Nulla volutpat eget est et ullamcorper. Ut porttitor nunc ac elit maximus maximus. Proin vestibulum risus purus, sed vestibulum augue bibendum at. </p>
                      <div class="mbp-atgi-socials-media">
                        <div class="mbp-atgism-lft">
                          <ul class="reset-list">
                            <li><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fab fa-youtube"></i></a></li>
                          </ul>
                        </div>
                        <div class="mbp-atgism-rgt">
                          <a href="#">VISIT WEBSITE</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="about-ctlr">
  <section class="mpb-about-sec inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/mbp-loca-bg.png');">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mpb-about-sec-inr clearfix">
            <div class="mpb-about-lft">
              <div class="mpb-about-img">
                <img src="<?php echo THEME_URI; ?>/assets/images/mpb-about-img-01.png">
              </div>
            </div>
            <div class="mpb-about-rgt">
              <div class="mbp-about-des">
                <h2 class="mbp-location-entry-hdr-title left-icon-title fl-h2">
                  <span>Our Locations...</span>
                  <i>
                    <svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                    <use xlink:href="#title-location-icon"></use> </svg>
                  </i>
                </h2>
                <h3 class="mbp-loca-title left-icon-title">
                  <span>England </span>
                  <i class="fas fa-map-marker-alt"></i>
                </h3>
                <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at. Phasellus ante magna, egestas a ultricies quis, dapibus at massa. </p>
                <h3 class="mbp-loca-title left-icon-title">
                  <span>Wales</span>
                  <i class="fas fa-map-marker-alt"></i>
                </h3>
                <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at.</p>
                <h3 class="mbp-loca-title left-icon-title">
                  <span>Scotland</span>
                  <i class="fas fa-map-marker-alt"></i>
                </h3>
                <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at. </p>
                <div class="mbp-location-btn">
                  <a class="fl-red-btn mbp-loca-btn" href="#">BOOK LOCAL SERVICE</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<?php get_footer(); ?>