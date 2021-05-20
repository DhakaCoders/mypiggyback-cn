<?php 
$user = wp_get_current_user();
?>
<div class="ac-page-cntlr">
<?php if ( current_user_can( 'driver' ) && is_user_logged_in() ){ ?>
<section class="dashboard-sec">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="dashboard-cn block-800">
            <div class="mp-tabs clearfix text-center">
              <button class="mp-tab-link current" data-tab="tab-1"><span>Profile</span></button>
              <button class="mp-tab-link " data-tab="tab-2"><span>Jobs</span></button>
              <button class="mp-tab-link " data-tab="tab-3"><span>Ongoing Jobs</span></button>
              <button class="mp-tab-link " data-tab="tab-4"><span>Completed Jobs</span></button>
            </div>
            <div id="tab-1" class="mp-tab-content current">
              <div class="tab-con-inr">
                <form action="" method="post">
                  <div class="fl-input-field-row mp-input profile-edit-step-cntlr" id="choose-file">
                    <div class="profile-img-edit profile-edit-step-1 profile-img-step-1" id="profile-priview">
                      <img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>">
                    </div>
                    <div class="profile-img-edit profile-edit-step-2 profile-img-step-2">
                      <input type="hidden" name="prfile_image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" id="_profile_logo">
                      <label for="choose-file">
                        <i><img src="<?php echo THEME_URI; ?>/<?php echo THEME_URI; ?>/assets/images/plus-icon-2.png"></i>
                        <span class="file-up-instruction-txt">CLICK TO ADD<br> PROFILE PHOTO</span>
                      </label>
                    </div>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>First Name</label>
                      <input type="text" name="fname" value="<?php echo esc_attr($user->first_name); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Last Name</label>
                      <input type="text" name="lname" value="<?php echo esc_attr($user->last_name); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>Email</label>
                      <input type="email" name="email" value="<?php echo esc_attr($user->user_email); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Phone</label>
                      <input type="text" name="phone" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_phone', true )); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Address</label>
                    <input type="text" name="address_1" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_address_1', true )); ?>">
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Street Address</label>
                    <input type="text" name="address_2" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_address_2', true )); ?>">
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>City</label>
                      <input type="text" name="city" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_city', true )); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Year of driving</label>
                      <input type="text" name="driving_year" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driving_year', true )); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input mp-selctpicker-ctlr">
                    <label>Country</label>
                  <select class="selectpicker" name="country" required>
                    <?php 
                    $countryCode = get_user_meta( $user->ID, 'driver_country', true );
                    if( get_countries() ): 
                    ?>
                    <?php foreach( get_countries() as $key => $country_list ): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($countryCode == $key)?'selected':'';?>><?php echo $country_list; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>Password*</label>
                      <input type="password" name="password" value="Password">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Retype password*</label>
                      <input type="password" name="confirm_password" value="Retype password">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <div class="input-field">
                      <label>About yourself</label>
                      <textarea name="yourself"><?php echo esc_attr(get_user_meta( $user->ID, 'description', true )); ?></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="user_update_register_nonce" value="<?php echo wp_create_nonce('user-update-register-nonce'); ?>"/>
                  <div class="plr-30">
                    <div class="profile-submit-btn profile-edit-step-1 flx-btn-center">
                      <!-- <input type="submit" name="" value="Edit Profile"> -->
                      <a class="edit-profile-btn" href="javascript:void(0)">Edit Profile</a>
                    </div>
                    <div class="profile-submit-btn profile-edit-step-2 flx-btn-center clearfix">
                      
                      <input type="submit" name="" value="Save Changes">
                      <!-- <input id="edit-profile-cancle-btn" type="reset" name="" value="Cancel"> -->
                      <a href="javascript:void(0)" id="edit-profile-cancle-btn">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div id="tab-2" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '0',
                              'compare' => '='
                          )
                      )

                    ));
                  if( $Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($Query->have_posts()): $Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php else: ?>
                  <p><small>Here not available new jobs.</small><p>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div id="tab-3" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $ongo_Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                        'relation' => 'AND',
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '1',
                              'compare' => '='
                          ),
                          array(
                              'key' => 'order_appointed_to',
                              'value' => $user->ID,
                              'compare' => '='
                          )
                      )

                    ));
                  if( $ongo_Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($ongo_Query->have_posts()): $ongo_Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                        $status_by_driver = get_field('order_status_by_driver', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="process-btn mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                          <?php 
                            if( $status_by_driver == 1 )
                              echo '<span>Submitted for review</span>';
                            else
                              echo '<span>Ongoing</span>';
                          ?>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php else: ?>
                    <p><small>Here not available ongoing jobs.</small><p>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div id="tab-4" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $comp_Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                        'relation' => 'AND',
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '2',
                              'compare' => '='
                          ),
                          array(
                              'key' => 'order_appointed_to',
                              'value' => $user->ID,
                              'compare' => '='
                          )
                      )

                    ));
                  if( $comp_Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($comp_Query->have_posts()): $comp_Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="process-btn mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                          <span>Completed</span>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php else: ?>
                  <p><small>Here not available completed jobs.</small><p>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php }elseif ( current_user_can( 'administrator' ) && is_user_logged_in() ){ ?>
<section class="dashboard-sec">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="dashboard-cn block-800">
            <div class="mp-tabs clearfix text-center">
              <button class="mp-tab-link " data-tab="tab-1"><span>Profile</span></button>
              <button class="mp-tab-link " data-tab="tab-2"><span>Jobs</span></button>
              <button class="mp-tab-link " data-tab="tab-3"><span>Ongoing Jobs</span></button>
              <button class="mp-tab-link " data-tab="tab-4"><span>Completed Jobs</span></button>
              <button class="mp-tab-link current" data-tab="tab-5"><span>Drivers</span></button>
            </div>
            <div id="tab-1" class="mp-tab-content">
              <div class="tab-con-inr">
                <form action="" method="post">
                  <div class="fl-input-field-row mp-input profile-edit-step-cntlr" id="choose-file">
                    <div class="profile-img-edit profile-edit-step-1 profile-img-step-1" id="profile-priview">
                      <img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>">
                    </div>
                    <div class="profile-img-edit profile-edit-step-2 profile-img-step-2">
                      <input type="hidden" name="prfile_image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" id="_profile_logo">
                      <label for="choose-file">
                        <i><img src="<?php echo THEME_URI; ?>/<?php echo THEME_URI; ?>/assets/images/plus-icon-2.png"></i>
                        <span class="file-up-instruction-txt">CLICK TO ADD<br> PROFILE PHOTO</span>
                      </label>
                    </div>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>First Name</label>
                      <input type="text" name="fname" value="<?php echo esc_attr($user->first_name); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Last Name</label>
                      <input type="text" name="lname" value="<?php echo esc_attr($user->last_name); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>Email</label>
                      <input type="email" name="email" value="<?php echo esc_attr($user->user_email); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Phone</label>
                      <input type="text" name="phone" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_phone', true )); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Address</label>
                    <input type="text" name="address_1" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_address_1', true )); ?>">
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Street Address</label>
                    <input type="text" name="address_2" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_address_2', true )); ?>">
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>City</label>
                      <input type="text" name="city" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driver_city', true )); ?>">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Year of driving</label>
                      <input type="text" name="driving_year" value="<?php echo esc_attr(get_user_meta( $user->ID, 'driving_year', true )); ?>">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input mp-selctpicker-ctlr">
                    <label>Country</label>
                  <select class="selectpicker" name="country" required>
                    <?php 
                    $countryCode = get_user_meta( $user->ID, 'driver_country', true );
                    if( get_countries() ): 
                    ?>
                    <?php foreach( get_countries() as $key => $country_list ): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($countryCode == $key)?'selected':'';?>><?php echo $country_list; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  </div>
                  <div class="fl-input-field-row-grd">
                    <div class="fl-input-field-row mp-input">
                      <label>Password*</label>
                      <input type="password" name="password" value="Password">
                    </div>
                    <div class="fl-input-field-row mp-input">
                      <label>Retype password*</label>
                      <input type="password" name="confirm_password" value="Retype password">
                    </div>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <div class="input-field">
                      <label>About yourself</label>
                      <textarea name="yourself"><?php echo esc_attr(get_user_meta( $user->ID, 'description', true )); ?></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="user_update_register_nonce" value="<?php echo wp_create_nonce('user-update-register-nonce'); ?>"/>
                  <div class="plr-30">
                    <div class="profile-submit-btn profile-edit-step-1 flx-btn-center">
                      <!-- <input type="submit" name="" value="Edit Profile"> -->
                      <a class="edit-profile-btn" href="javascript:void(0)">Edit Profile</a>
                    </div>
                    <div class="profile-submit-btn profile-edit-step-2 flx-btn-center clearfix">
                      
                      <input type="submit" name="" value="Save Changes">
                      <!-- <input id="edit-profile-cancle-btn" type="reset" name="" value="Cancel"> -->
                      <a href="javascript:void(0)" id="edit-profile-cancle-btn">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div id="tab-2" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '0',
                              'compare' => '='
                          )
                      )
                    ));
                  if( $Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($Query->have_posts()): $Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div id="tab-3" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '1',
                              'compare' => '='
                          )
                      )
                    ));
                  if( $Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($Query->have_posts()): $Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                        $status_by_driver = get_field('order_status_by_driver', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="process-btn mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                          <?php 
                            if( $status_by_driver == 1 )
                              echo '<span>Submitted for review</span>';
                            else
                              echo '<span>Ongoing</span>';
                          ?>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div id="tab-4" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',
                      'meta_query' => array(
                          array(
                              'key' => 'order_status_by_author',
                              'value' => '2',
                              'compare' => '='
                          )
                      )
                    ));
                  if( $Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($Query->have_posts()): $Query->the_post(); 
                        $from_location = get_field('order_from_location', get_the_ID());
                        $to_location = get_field('order_to_location', get_the_ID());
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="details mHc1">
                          <ul>
                            <li><strong>From:</strong> <?php if( !empty($from_location) ) printf('%s', $from_location);?></li>
                            <li><strong>To:</strong> <?php if( !empty($to_location) ) printf('%s', $to_location);?></li>
                          </ul>
                        </div>
                        <div class="process-btn mHc2">
                          <a href="<?php the_permalink(); ?>">More</a>
                          <span>Completed</span>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div id="tab-5" class="mp-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $users = get_users('role=driver');
                  ?>
                  <ul class="reset-list clearfix">
                    <?php foreach ( $users as $user_row ) { ?>
                    <li>
                      <div class="driver-grd-item mpac-grd">
                        <div class="author-pro-img mHc">
                        <?php if( !empty(get_the_author_meta( 'image', $user_row->ID )) ){ ?>
                          <img src="<?php echo esc_attr( get_the_author_meta( 'image', $user_row->ID ) ); ?>">
                        <?php }else{ ?>
                          <img src="<?php echo THEME_URI; ?>/assets/images/avater-img.png">
                        <?php } ?>
                        </div>
                        <div class="mHc1 author-info">
                          <h5 class="fl-h5">
                          <?php
                            if(!empty($user_row->display_name)){
                              echo $user_row->display_name;
                            }else{
                              echo $user_row->user_nicename;
                            }
                          ?>  
                          </h5>
                          <?php if( !empty(get_the_author_meta( 'description', $user_row->ID )) ): ?>
                          <div class="mHc2">
                          <p><?php echo esc_attr( get_the_author_meta( 'description', $user_row->ID ) ); ?></p>
                          </div>
                          <?php endif; ?>
                          <div class="author-tel">
                            <?php $driver_phone = get_the_author_meta( 'driver_phone', $user_row->ID ); ?> 
                            <?php if( !empty($driver_phone) ) printf('<a href="tel:%s"><i class="fas fa-phone"></i>%s</a>', phone_preg($driver_phone), $driver_phone); ?>
                          </div>
                          <div class="author-mail">
                            <a href="mailto:<?php echo esc_html( $user_row->user_email ); ?>"><i class="far fa-envelope"></i><?php echo esc_html( $user_row->user_email ); ?></a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>    
</section>
<?php } ?>
</div>