<?php 
  global $data_reg; 
?>
<div class="ac-page-cntlr">
  <section class="registrar-sec">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="registrar-form block-800">
              <div class="ac-page-hdr">
                <h1 class="fl-h3 acph-title">Registration</h1>
              </div>
              <?php if( array_key_exists("exists_email", $data_reg) ): ?>
              <div class="alert-msg">
                <div class="unsuccess">
                  <?php printf('<p>%s</p>', $data_reg['exists_email']); ?>
                </div>
              </div>
              <?php endif; ?>
              <?php if( array_key_exists("error", $data_reg) ): ?>
              <div class="alert-msg">
                <div class="unsuccess">
                  <?php printf('<p>%s</p>', $data_reg['error']); ?>
                </div>
              </div>
              <?php endif; ?>
              <form action="" method="post">
                <div class="fl-input-field-row-grd">
                  <div class="fl-input-field-row mp-input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo isset($_POST['fname'])? $_POST['fname']:'';?>" required>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo isset($_POST['lname'])? $_POST['lname']:'';?>">
                  </div>
                </div>
                <div class="fl-input-field-row-grd">
                  <div class="fl-input-field-row mp-input">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email'])? $_POST['email']:'';?>" required>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Phone" value="<?php echo isset($_POST['Phone'])? $_POST['Phone']:'';?>" required>
                  </div>
                </div>
                <div class="fl-input-field-row mp-input">
                  <label>Address</label>
                  <input type="text" name="address_1" placeholder="Address" value="<?php echo isset($_POST['address_1'])? $_POST['address_1']:'';?>" required>
                </div>
                <div class="fl-input-field-row mp-input">
                  <label>Street Address</label>
                  <input type="text" name="address_2" placeholder="Street Address" value="<?php echo isset($_POST['address_2'])? $_POST['address_2']:'';?>">
                </div>
                <div class="fl-input-field-row-grd">
                  <div class="fl-input-field-row mp-input">
                    <label>City</label>
                    <input type="text" name="city" placeholder="City" value="<?php echo isset($_POST['city'])? $_POST['city']:'';?>"required>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Year of driving</label>
                    <input type="text" name="driving_year" placeholder="Year of driving" value="<?php echo isset($_POST['driving_year'])? $_POST['driving_year']:'';?>" required>
                  </div>
                </div>
                <div class="fl-input-field-row mp-input mp-selctpicker-ctlr">
                  <label>Country</label>
                  <select class="selectpicker" name="country" required>
                    <?php if( get_countries() ): ?>
                    <?php foreach( get_countries() as $key => $country_list ): ?>
                    <option value="<?php echo $key; ?>"><?php echo $country_list; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="fl-input-field-row-grd">
                  <div class="fl-input-field-row mp-input">
                    <label>Password*</label>
                    <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="fl-input-field-row mp-input">
                    <label>Retype password*</label>
                    <input type="password" name="confirm_password" placeholder="Retype password" required>
                  </div>
                </div>
                <div class="fl-input-field-row mp-input">
                  <div class="input-field">
                    <label>About yourself</label>
                    <textarea name="yourself" placeholder="About yourself" required></textarea>
                  </div>
                </div>
                
                <div class="fl-input-field-row mp-input fl-submit-btn w-full">
                  <input type="hidden" name="user_register_nonce" value="<?php echo wp_create_nonce('user-register-nonce'); ?>"/>
                  <input type="submit" value="Submit">
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>