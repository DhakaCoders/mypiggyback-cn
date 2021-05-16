<?php 
$user = wp_get_current_user();
?>
<div class="ac-page-cntlr">
<section class="dashboard-sec">
  <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="dashboard-cn block-700">
            <div class="mp-tabs clearfix text-center">
              <button class="mp-tab-link current" data-tab="tab-1"><span>Profile</span></button>
              <button class="mp-tab-link " data-tab="tab-2"><span>Jobs</span></button>
            </div>
            <div id="tab-1" class="fl-tab-content current">
              <div class="tab-con-inr">
                <form action="" method="post">
                  <div class="fl-input-field-row mp-input profile-edit-step-cntlr" id="choose-file">
                    <div class="profile-img-edit profile-edit-step-1 profile-img-step-1" id="profile-priview">
                      <img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>">
                    </div>
                    <div class="profile-img-edit profile-edit-step-2 profile-img-step-2">
                      <input type="hidden" name="prfile_image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" id="_profile_logo">
                      <label for="choose-file">
                        <i><img src="<?php echo THEME_URI; ?>/assets/images/plus-icon-2.png"></i>
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
            <div id="tab-2" class="fl-tab-content">
              <div class="tab-con-inr">
                <div class="job-grds-cntlr">
                  <?php 
                    $Query = new WP_Query(array(
                      'post_type' => 'vehicle_order',
                      'posts_per_page'=> -1,
                      'orderby' => 'date',
                      'order'=> 'desc',

                    ));
                  if( $Query->have_posts() ):
                  ?>
                  <ul class="reset-list clearfix">
                    <?php 
                      while($Query->have_posts()): $Query->the_post(); 
                    ?>
                    <li>
                      <div class="job-grd-item mpac-grd">
                        <div class="mHc">
                          <h5 class="fl-h5"><?php the_title(); ?></h5>
                        </div>
                        <div class="mHc1">
                          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua.</p>
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

          </div>
        </div>
      </div>
  </div>    
</section>
</div>