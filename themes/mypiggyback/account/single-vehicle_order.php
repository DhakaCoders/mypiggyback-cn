<?php 
get_header(); 
$thisID = get_the_ID();
$from_location = get_field('order_from_location', $thisID);
$to_location = get_field('order_to_location', $thisID);
$order_type = get_field('order_type', $thisID);
?>
<div class="ac-page-cntlr">
  <section class="thankyou-page-cntlr">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="block-700">
              <div class="thankyou-page-con">
                <h1 class="fl-h3"><?php the_title(); ?></h1>
                <div class="job-points">
                  <ul>
                    <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                    <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                    <li><strong>Type:</strong> Vehicle <?php if( !empty($order_type) ) printf('%s', ucfirst($order_type));?></li>
                    <li><strong>Distance:</strong> 20km</li>
                  </ul>
                </div>
              </div>
              <div class="gap-50"></div>
              <div class="job-location1">
                <h2 class="fl-h3">Job location:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d460398.79861694534!2d88.56278640983301!3d25.64258531053099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fcab08431748c5%3A0x8df9a73629fb8d7b!2z4Kam4Ka_4Kao4Ka-4Kac4Kaq4KeB4KawIOCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1621068290768!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <p><small>Dev note : Source and destination will show on the single map like <a target="_blank" href="https://www.google.com/maps/dir/%E0%A6%A0%E0%A6%BE%E0%A6%95%E0%A7%81%E0%A6%B0%E0%A6%97%E0%A6%BE%E0%A6%81%E0%A6%93+%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE/%E0%A6%A6%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%9C%E0%A6%AA%E0%A7%81%E0%A6%B0/@25.8210675,88.2357146,9.96z/data=!4m13!4m12!1m5!1m1!1s0x39e4c35d5827f355:0x387789b45fbf75f1!2m2!1d88.4282616!2d26.0418392!1m5!1m1!1s0x39fb529bc7fc909b:0xd8f861ed9baf24de!2m2!1d88.6437649!2d25.6221009">This</a></small></p>
              </div>
              <?php if ( current_user_can( 'driver' ) && is_user_logged_in() ){ ?>
              <div class="gap-50"></div>
              <div class="applytojob">
                <p><small>Dev note : Apply button only for drivers</small></p>
                <div class="vcl-btn vcl-fst-btn">
                  <a class="fl-red-btn" href="#">Apply</a>
                </div>
              </div>
              <?php } ?>
              <?php if ( current_user_can( 'administrator' ) && is_user_logged_in() ){ ?>
              <div class="gap-50"></div>
              <div class="applicants">
                <h2 class="fl-h3">Interested drivers:</h2>
                <ul class="reset-list">
                  <li>
                    <div class="diverListhook clearfix">
                      <div class="profile-photo">Photo</div>
                      <div class="name"><strong>Driver Name</strong></div>
                      <div class="details"><a target="_blank" href="#">See Profile</a></div>
                      <div class="details"><a href="#">Appoint</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="diverListhook clearfix">
                      <div class="profile-photo">Photo</div>
                      <div class="name"><strong>Driver Name</strong></div>
                      <div class="details"><a target="_blank" href="#">See Profile</a></div>
                      <div class="details"><a href="#">Appoint</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="diverListhook clearfix">
                      <div class="profile-photo">Photo</div>
                      <div class="name"><strong>Driver Name</strong></div>
                      <div class="details"><a target="_blank" href="#">See Profile</a></div>
                      <div class="details"><a href="#">Appoint</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="diverListhook clearfix">
                      <div class="profile-photo">Photo</div>
                      <div class="name"><strong>Driver Name</strong></div>
                      <div class="details"><a target="_blank" href="#">See Profile</a></div>
                      <div class="details"><a href="#">Appoint</a></div>
                    </div>
                  </li>
                </ul>
                <p><small>Dev note : only admin will see this list</small></p>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>
<?php get_footer(); ?>