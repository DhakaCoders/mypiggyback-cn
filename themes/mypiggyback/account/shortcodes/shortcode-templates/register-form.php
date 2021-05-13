<?php 
  global $data_reg; 
?>
<div class="piggy-register-form vehicle-form">
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
    <div class="input-field-row">
      <input type="text" name="fullname" placeholder="Full Name" value="<?php echo isset($_POST['fullname'])? $_POST['fullname']:'';?>" required>
    </div>
    <div class="input-field-row">
      <input type="email" name="email" placeholder="Email Address" value="<?php echo isset($_POST['email'])? $_POST['email']:'';?>" required>
    </div>
    <div class="input-field-row">
      <input type="text" name="phone" placeholder="Telephone Number" value="<?php echo isset($_POST['phone'])? $_POST['phone']:'';?>" required>
    </div>
    <div class="input-field-row">
      <input type="text" name="location" placeholder="Location" value="<?php echo isset($_POST['location'])? $_POST['location']:'';?>" required>
    </div>
    <div class="input-field-row">
      <input type="text" name="city" placeholder="City" value="<?php echo isset($_POST['city'])? $_POST['city']:'';?>">
    </div>
    <div class="input-field-row">
      <input type="text" name="postcode" placeholder="Postcode" value="<?php echo isset($_POST['postcode'])? $_POST['postcode']:'';?>" required>
    </div>
    <div class="input-field-row">
      <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="input-field-row">
      <input type="password" name="password" placeholder="Conform Password" required>
    </div>
    <div class="input-field-row input-field-row-submit">
      <input type="hidden" name="user_register_nonce" value="<?php echo wp_create_nonce('user-register-nonce'); ?>"/>
      <input type="submit" name="submit" value="Signup">
    </div>
  </form>
</div>