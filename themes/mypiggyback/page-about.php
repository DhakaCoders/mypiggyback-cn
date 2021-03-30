<?php 
/*
  Template Name: About Us
*/
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/page', 'breadcrumb');
?>

<?php 
$intro_sec = get_field('intro_section', $thisID);
  if( $intro_sec ): 
?>
<section class="mpb-about-des-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mpb-about-des-sec-inr clearfix hide-sm">
          <div class="mbp-about-des-lft">
            <div class="mbp-about-des">
              <?php if( !empty($intro_sec['description'])) echo wpautop($intro_sec['description']); ?>
              <div class="mbp-about-btn">
                <?php 
                  $intro_sec_link_1 = $intro_sec['link_1'];
                  if( is_array( $intro_sec_link_1 ) &&  !empty( $intro_sec_link_1['url'] ) ){
                      printf('<div class="mbp-abot-btn-red"><a class="fl-red-btn" href="%s" target="%s">%s</a></div>', $intro_sec_link_1['url'], $intro_sec_link_1['target'], $intro_sec_link_1['title']); 
                  } 
                  $intro_sec_link_2 = $intro_sec['link_2'];
                  if( is_array( $intro_sec_link_2 ) &&  !empty( $intro_sec_link_2['url'] ) ){
                      printf('<div class="mbp-abot-btn-blue"><a class="fl-red-btn blue-btn" href="%s" target="%s">%s</a></div>', $intro_sec_link_2['url'], $intro_sec_link_2['target'], $intro_sec_link_2['title']); 
                  } 
                ?>
              </div>
            </div>
          </div>
          <?php if(!empty($intro_sec['image'])): ?>
          <div class="mbp-about-des-rgt">
            <?php echo cbv_get_image_tag($intro_sec['image']) ?>
          </div>
          <?php endif; ?>
        </div>
        <div class="xs-about-des clearfix show-sm">
          <p class="text-img">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque mauris vel turpis semper, pharetra tincidunt magna scelerisque. Ut finibus ex nec sodales ullamcorper. Phasellus a neque pretium, hendrerit tortor.
            <img src="<?php echo THEME_URI; ?>/assets/images/mpb-about-des-rgt-img-01.jpg">
          </p>
          <p>Phasellus a neque pretium, hendrerit tortor vitae, accumsan neque. Suspendisse posuere odio quam, id elementum arcu egestas at. Phasellus ante magna, egestas a ultricies quis, dapibus at massa. Aliquam laoreet libero id tristique condimentum. Vivamus quis neque eu diam ultricies congue in non enim. 
            
          </p>
          <p>Aliquam semper ex tortor, imperdiet consequat sapien efficitur et. Duis pretium velit non turpis luctus, vel maximus risus.. </p>
          <div class="mbp-about-btn">
            <?php 
              $intro_sec_link_1 = $intro_sec['link_1'];
              if( is_array( $intro_sec_link_1 ) &&  !empty( $intro_sec_link_1['url'] ) ){
                  printf('<div class="mbp-abot-btn-red"><a class="fl-red-btn" href="%s" target="%s">%s</a></div>', $intro_sec_link_1['url'], $intro_sec_link_1['target'], $intro_sec_link_1['title']); 
              } 
              $intro_sec_link_2 = $intro_sec['link_2'];
              if( is_array( $intro_sec_link_2 ) &&  !empty( $intro_sec_link_2['url'] ) ){
                  printf('<div class="mbp-abot-btn-blue"><a class="fl-red-btn blue-btn" href="%s" target="%s">%s</a></div>', $intro_sec_link_2['url'], $intro_sec_link_2['target'], $intro_sec_link_2['title']); 
              } 
            ?>
          </div>



        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>



<?php 
$our_story_sec = get_field('our_story_section', $thisID);
  if( $our_story_sec ): 
?>
<section class="mbp-about-num-sec">
  <div class="xs-red-bg"></div>
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
              <?php 
                if( !empty($our_story_sec['title']) ) :
              ?>
              <h2 class="mbp-about-entry-title left-icon-title fl-h2">
               <?php printf('<span>%s...</span>', $our_story_sec['title']); ?>
               <i>
                  <svg class="title-location-icon-white-svg" width="30" height="44.235" viewBox="0 0 30 44.234" fill="#fff">
                  <use xlink:href="#title-location-icon-white-svg"></use> </svg>
                </i>
              </h2>
              <?php endif; ?>
            </div>

            <?php 
              $our_storyes = $our_story_sec['our_story'];
                if($our_storyes):
            ?>
            <div class="mbp-about-num-grds">
              <ul class="reset-list clearfix">
                <?php foreach( $our_storyes as $our_story ): ?>
                <li>
                  <div class="mbp-about-num-grd-item">
                    <div class="down-angle">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbp-down-angle.png">
                    </div>
                    <?php if( !empty($our_story['icon']) ):  ?>
                    <div class="mbp-angi-img">
                      <i><?php echo cbv_get_image_tag($our_story['icon']); ?></i>
                    </div>
                    <?php endif; ?>
                    <div class="mbp-angi-des">
                      <?php if( !empty($our_story['number']) ) printf('<span class="counter">%s</span>', $our_story['number']); ?>
                      <?php if( !empty($our_story['title']) ) printf('<strong>%s</strong>', $our_story['title']); ?>
                    </div>
                  </div>
                  <div class="mbp-about-num-btm-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/mbp-about-num-btm-icon.png">
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
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
$team_sec = get_field('team_section', $thisID);
  if( $team_sec ): 
?>
<section class="mbp-about-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbp-about-team-sec-inr">
          <div class="mbp-about-team-entry-hdr">
            <?php 
                if( !empty($team_sec['title']) ) :
              ?>
              <h2 class="mbp-about-team-entry-hdr-title left-icon-title fl-h2">
               <?php printf('<span>%s...</span>', $team_sec['title']); ?>
               <i>
                <svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                <use xlink:href="#title-location-icon"></use> </svg>
                </i>
              </h2>
              <?php endif; ?>
          </div>

          <?php 
            $teams = $team_sec['team'];
              if($teams):
          ?>
          <div class="mbp-abot-team-grds">
            <ul class="reset-list clearfix">
              <?php foreach( $teams as $team ): ?>
              <li>
                <div class="mbpat-grd-item">
                  <div class="mbp-atgi-img-ctlr">
                    <?php if( !empty($team['image']) ): ?>
                    <div class="mbp-atgi-img inline-bg" style="background: url(<?php echo cbv_get_image_src($team['image'], 'full'); ?>);">
                    </div>
                    <?php endif; ?>
                    <div class="mbp-atgi-des">
                      <?php 
                        if( !empty($team['title']) ) printf('<div class="mbp-atgi-des-hdr"><h4 class="mbp-atgi-des-title fl-h4">%s</h4></div>', $team['title']);
                        if( !empty($team['description']) ) echo wpautop( $team['description'] );
                      ?>
                      <div class="mbp-atgi-socials-media">
                        <div class="mbp-atgism-lft">
                          <ul class="reset-list">
                            <?php if( !empty($team['facebook_link']) ): ?>
                            <li><a target="_blank" href="<?php echo $team['facebook_link']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <?php endif; if( !empty($team['instagram_link']) ): ?>
                            <li><a target="_blank" href="<?php echo $team['instagram_link']; ?>"><i class="fab fa-instagram"></i></a></li>
                            <?php endif; if( !empty($team['twitter_link']) ): ?>
                            <li><a target="_blank" href="<?php echo $team['twitter_link']; ?>"><i class="fab fa-twitter"></i></a></li>
                            <?php endif; if( !empty($team['youtube_link']) ): ?>
                            <li><a target="_blank" href="<?php echo $team['youtube_link']; ?>"><i class="fab fa-youtube"></i></a></li>
                            <?php endif; ?>
                          </ul>
                        </div>
                        <?php if( !empty($team['website_link']) ): ?>
                        <div class="mbp-atgism-rgt">
                          <a target="_blank" href="<?php echo $team['website_link']; ?>">VISIT WEBSITE</a>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
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


<?php 
$our_locations_sec = get_field('our_locations_section', $thisID);
  if( $our_locations_sec ): 
?>
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
                <?php 
                  if( !empty($our_locations_sec['title']) ) :
                ?>
                <h2 class="mbp-location-entry-hdr-title left-icon-title fl-h2">
                 <?php printf('<span>%s...</span>', $our_locations_sec['title']); ?>
                 <i>
                    <svg class="title-location-icon" width="30" height="44.234" viewBox="0 0 30 44.234" fill="#ec131b">
                    <use xlink:href="#title-location-icon"></use> </svg>
                  </i>
                </h2>
                <?php endif; ?>

                <?php 
                  $our_locations = $our_locations_sec['our_locations'];
                    if($our_locations):
                ?>
                <div>
                  <?php foreach( $our_locations as $our_location ): ?>
                  <div>
                    <?php 
                      if( !empty($our_location['title']) ) :
                    ?>
                    <h3 class="mbp-loca-title left-icon-title">
                     <?php printf('<span>%s</span>', $our_location['title']); ?>
                     <i class="fas fa-map-marker-alt"></i>
                    </h3>
                    <?php endif; 
                      if( !empty($our_location['description']) ) echo wpautop( $our_location['description'] );
                    ?>
                  </div>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
  
                <?php 
                  if( !empty($our_locations_sec['link']) ) :
                ?>
                <div class="mbp-location-btn">
                  <a class="fl-red-btn mbp-loca-btn" href="<?php echo $our_locations_sec['link']; ?>">BOOK LOCAL SERVICE</a>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endif; ?>


<?php get_footer(); ?>