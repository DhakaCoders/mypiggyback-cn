<?php 
  global $login_errors; 
  $emailindex = '';
  if( isset($_POST['username']) && !empty($_POST['username']) ){
    $emailindex = $_POST['username'];
  }
?>
<div class="piggy-login-form vehicle-form">
  <?php if( array_key_exists("loging_error", $login_errors) ): ?>
  <div class="alert-msg">
    <div class="unsuccess">
      <?php printf('<p>%s</p>', $login_errors['loging_error']); ?>
    </div>
  </div>
  <?php endif; ?>
  <form action="" method="post">
    <div class="input-field-row">
      <input type="email" name="username" placeholder="Email Address" value="<?php echo $emailindex; ?>">
    <?php if( array_key_exists("username", $login_errors) ): ?>
        <?php printf('<p class="error"><span>%s</span></p>', $login_errors['username']); ?>
    <?php endif; ?>
    </div>
    <div class="input-field-row">
      <input type="password" name="password" placeholder="Password">
      <?php if( array_key_exists("pass", $login_errors) ): ?>
        <?php printf('<p class="error"><span>%s</span></p>', $login_errors['pass']); ?>
      <?php endif; ?>
    </div>
    <div class="input-field-row input-field-row-submit">
      <input type="submit" name="signin" value="Sign In">
    </div>
    <input type="hidden" name="user_login_nonce" value="<?php echo wp_create_nonce('user-login-nonce'); ?>"/>
  </form>
</div>