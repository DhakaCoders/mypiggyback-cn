<?php 
get_header(); 
$thisID = get_the_ID();
$from_location = get_field('order_from_location', $thisID);
$to_location = get_field('order_to_location', $thisID);
$order_type = get_field('order_type', $thisID);
$fullname = get_field('order_fullname', $thisID);
$order_email = get_field('order_email', $thisID);
$order_phone = get_field('order_telephone', $thisID);
?>
<div class="ac-page-cntlr">
  <section class="thankyou-page-cntlr">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="block-800">
              <div class="thankyou-page-con">
                <?php 
                $status_by_author = get_field('order_status_by_author', $thisID);
                $appointed_to = get_field('order_appointed_to', $thisID);
                $applied_ids = !empty(get_field('driver_applied_ids', $thisID))?get_field('driver_applied_ids', $thisID):array();
                $status_by_driver = get_field('order_status_by_driver', $thisID);
                $user_id = get_current_user_id();
                if ( current_user_can( 'driver' ) && is_user_logged_in() ){
                  if(in_array($user_id, $applied_ids) && $status_by_author == 0){
                    echo '<span class="applied topbar">You have already applied for this job.</span>';
                  }
                }
                ?>
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
              <?php if ( current_user_can( 'administrator' ) && is_user_logged_in() ){ ?>
              <div class="gap-50"></div>
              <div class="thankyou-page-con">
                <h1 class="fl-h3">Customer Details:</h1>
                <div class="job-points">
                  <ul>
                    <li><strong>Name:</strong> London 1</li>
                    <li><strong>Email:</strong> London 2</li>
                    <li><strong>Phone:</strong> Vehicle Recovery</li>
                  </ul>
                </div>
              </div>
              <?php } ?>
              <div class="gap-50"></div>
              <div class="job-location1">
                <h2 class="fl-h3">Job location:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d460398.79861694534!2d88.56278640983301!3d25.64258531053099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fcab08431748c5%3A0x8df9a73629fb8d7b!2z4Kam4Ka_4Kao4Ka-4Kac4Kaq4KeB4KawIOCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1621068290768!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <p><small>Dev note : Source and destination will show on the single map like <a target="_blank" href="https://www.google.com/maps/dir/%E0%A6%A0%E0%A6%BE%E0%A6%95%E0%A7%81%E0%A6%B0%E0%A6%97%E0%A6%BE%E0%A6%81%E0%A6%93+%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE/%E0%A6%A6%E0%A6%BF%E0%A6%A8%E0%A6%BE%E0%A6%9C%E0%A6%AA%E0%A7%81%E0%A6%B0/@25.8210675,88.2357146,9.96z/data=!4m13!4m12!1m5!1m1!1s0x39e4c35d5827f355:0x387789b45fbf75f1!2m2!1d88.4282616!2d26.0418392!1m5!1m1!1s0x39fb529bc7fc909b:0xd8f861ed9baf24de!2m2!1d88.6437649!2d25.6221009">This</a></small></p>
              </div>
              <?php if ( current_user_can( 'driver' ) && is_user_logged_in() ){ ?>
              <div class="gap-50"></div>
              <div class="applytojob">
                <div class="vcl-btn vcl-fst-btn" id="apply_btn_wrap">
                  <?php if(!in_array($user_id, $applied_ids)){ $nonce = wp_create_nonce('apply_nonce'); ?>
                 <a class="fl-red-btn" id="driver_apply" href="#" onclick='driverApplyJob(<?php the_ID() ?>, "<?php echo $nonce; ?>"); return false;'>Apply</a>
                  <?php } ?>
                    <?php if($status_by_author > 0 ): ?>
                    <h2 class="fl-h3">Job status:</h2>
                    <?php 
                      if($status_by_author == 1 && $status_by_driver == 0 && $appointed_to == $user_id){
                    ?>
                      <div class="jobconfirm by_driver"><a class="fl-red-btn" href="#"  id="job-confirmation" onclick="orderConfirmation(<?php the_ID() ?>, <?php echo $user_id; ?>); return false;">Submit for review</a></div>
                      <?php
                    }else{
                      if($status_by_driver == 1 && $appointed_to == $user_id){
                        echo '<div class="jobconfirm"><span><label>By Driver: </label>Completed</span></div>';
                      }
                      if($status_by_author == 2 && $appointed_to == $user_id){
                        echo '<div class="jobconfirm"><span><label>By Author: </label>Completed</span></div>';
                      }
                    }
                    ?>
                  <?php endif; ?>
                </div>
              </div>
              <?php } ?>
              <?php if ( current_user_can( 'administrator' ) && is_user_logged_in() ){ ?>
              <?php if($status_by_driver == 1): ?>
              <div class="gap-50"></div>
              <div class="applicants">
                <h2 class="fl-h3">Job status:</h2>
                <?php
                  if($status_by_driver == 1){
                    echo '<div class="jobconfirm"><span><label>By Driver: </label>Completed</span></div>';
                  }
                  if($status_by_author == 2){
                    echo '<div class="jobconfirm"><span><label>By Author: </label>Completed</span></div>';
                  }
                  if($status_by_author == 1 && $status_by_driver == 1 ){
                ?>
                  <div class="jobconfirm by_author"><a class="fl-red-btn" href="#"  id="job-confirmation-author" onclick="orderConfirmationByAuthor(<?php the_ID() ?>); return false;">Mark as completed</a></div>
                  <?php
                }
                ?>
              </div>
              <?php endif; ?>
              <div class="gap-50"></div>
              <div class="applicants">
                <h2 class="fl-h3">Interested drivers:</h2>
                <?php
                $applied_users = get_users( array( 'include' => $applied_ids ) );
                if($applied_users && $applied_ids){
                ?>
                <ul class="reset-list">
                  <?php foreach( $applied_users as $applied_user ){ ?>
                  <li>
                    <div class="diverListhook clearfix">
                      <?php if( !empty(get_the_author_meta( 'image', $applied_user->ID )) ){ ?>
                        <div class="profile-photo"><img src="<?php echo esc_attr( get_the_author_meta( 'image', $applied_user->ID ) ); ?>"></div>
                      <?php }else{ ?>
                        <div class="profile-photo"><img src="<?php echo THEME_URI; ?>/assets/images/avater-img.png"></div>
                      <?php } ?>
                      <div class="name">
                        <strong>
                          <?php
                            if(!empty($applied_user->display_name)){
                              echo $applied_user->display_name;
                            }else{
                              echo $applied_user->user_nicename;
                            }
                          ?> 
                        </strong>
                      </div>
                      <div class="details"><a target="_blank" href="<?php echo esc_url(home_url('author/'.$applied_user->user_login)); ?>">See Profile</a></div>
                      <?php if($status_by_author == 1 && $appointed_to == $applied_user->ID){ ?>
                        <div class="details"><a href="#"  onclick="return false;">Appointed</a></div>
                      <?php }else{ ?>
                        <div class="details" style="<?php echo ($status_by_author == 1)?'display:none;':'';?>"><a href="#" id="order_appoint_<?php echo $applied_user->ID; ?>" onclick="orderAppoint(<?php the_ID() ?>, <?php echo $applied_user->ID; ?>); return false;">Appoint</a></div>
                      <?php } ?>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              <?php }else{ ?>
                <p><small>Here not available applied driver.</small></p>
              <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>
<?php get_footer(); ?>