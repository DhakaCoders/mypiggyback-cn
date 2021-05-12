<?php 
  global $login_errors; 
  var_dump($login_errors);
  $emailindex = '';
  if( isset($_POST['username']) && !empty($_POST['username']) ){
    $emailindex = $_POST['username'];
  }
?>
<div class="piggy-login-form vehicle-form">
  <form action="" method="post">
    <div class="input-field-row">
      <input type="text" name="username" placeholder="Username/Email Address" value="<?php echo $emailindex; ?>">
    </div>
    <div class="input-field-row">
      <input type="password" name="password" placeholder="Password">
    </div>
    <div class="input-field-row input-field-row-submit">
      <input type="submit" name="signin" value="Sign In">
    </div>
    <input type="hidden" name="user_login_nonce" value="<?php echo wp_create_nonce('user-login-nonce'); ?>"/>
  </form>
  <?php if( array_key_exists("loging_error", $login_errors) ): ?>
  <div class="alert-msg">
    <div class="unsuccess">
      <?php printf('<p>%s</p>', $login_errors['loging_error']); ?>
    </div>
  </div>
  <?php endif; ?>
</div>