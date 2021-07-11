<?php 
get_header(); 
?>
<div class="ac-page-cntlr">
  <section class="thankyou-page-cntlr">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="block-800">
              <?php 
                if ( current_user_can( 'administrator' ) && is_user_logged_in() ){ 
                  $author = get_queried_object();
                  $user = get_userdata( $author->ID );
                  if ( in_array( 'driver', $user->roles, true ) ) {
                    $registered = $user->user_registered;
              ?>
              <div class="thankyou-page-con">
                <h1 class="fl-h3">
                  <?php
                    if(!empty($user->display_name)){
                      echo $user->display_name;
                    }else{
                      echo $user->user_nicename;
                    }
                  ?> 
                </h1>
                <div class="job-points">
                  <ul>
                    <li><strong>Years of experiece:</strong> <?php echo get_the_author_meta( 'driving_year', $user->ID ); ?></li>
                    <li><strong>Member since:</strong><?php printf( ' %s', date("d, M, Y", strtotime( $registered ) ) );?></li>
                    <li><strong>Total completed job:</strong> <?php echo get_total_completed_job($user->ID); ?></li>
                    <?php if(get_last_completed_job($user->ID)): ?>
                    <li><strong>Last job completed on:</strong> <?php echo get_last_completed_job($user->ID); ?></li>
                  <?php endif; ?>
                    <li><strong>Phone:</strong> <?php echo get_the_author_meta( 'driver_phone', $user->ID ); ?> </li>
                    <li><strong>E-mail:</strong> <?php echo esc_html( $user->user_email ); ?></li>
                  </ul>
                </div>
              </div>
              <div class="gap-50"></div>
              <div class="job-location1">
                <h2 class="fl-h3">Current Location:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d460398.79861694534!2d88.56278640983301!3d25.64258531053099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fcab08431748c5%3A0x8df9a73629fb8d7b!2z4Kam4Ka_4Kao4Ka-4Kac4Kaq4KeB4KawIOCmnOCnh-CmsuCmvg!5e0!3m2!1sbn!2sbd!4v1621068290768!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <?php } ?>
              <?php }else{ ?>
                <p><small>You have no permission to see the details.</small></p>
              <?php } ?>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>
<?php get_footer(); ?>