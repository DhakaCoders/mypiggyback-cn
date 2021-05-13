<?php 
  global $login_errors; 
  $emailindex = '';
  if( isset($_POST['username']) && !empty($_POST['username']) ){
    $emailindex = $_POST['username'];
  }
?>
<div class="ac-page-cntlr">
  <section class="logon-sec">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="login-form block-700">
              <div class="ac-page-hdr">
                <h1 class="fl-h3 acph-title">Login</h1>
              </div>
              <?php if( array_key_exists("loging_error", $login_errors) ): ?>
              <div class="alert-msg">
                <div class="unsuccess">
                  <?php printf('<p>%s</p>', $login_errors['loging_error']); ?>
                </div>
              </div>
              <?php endif; ?>
              <form action="" method="post">
               <div class="fl-input-field-row mp-input">
                  <label>Email *</label>
                  <input type="email" name="username" placeholder="Your Email" value="<?php echo $emailindex; ?>">
                  <?php if( array_key_exists("username", $login_errors) ): ?>
                      <?php printf('<p class="error"><span>%s</span></p>', $login_errors['username']); ?>
                  <?php endif; ?>
                </div>
               <div class="fl-input-field-row mp-input">
                  <label>Password *</label>
                  <input type="password" name="password" placeholder="Password">
                  <?php if( array_key_exists("pass", $login_errors) ): ?>
                    <?php printf('<p class="error"><span>%s</span></p>', $login_errors['pass']); ?>
                  <?php endif; ?>
                </div>
                <div class="fl-forget-row">
                    <a class="fl-forget-pass-btn" href="#">Forgot your password?</a>
                  </div>
                <div class="fl-input-field-row mp-input fl-submit-btn w-full">
                  <input type="hidden" name="user_login_nonce" value="<?php echo wp_create_nonce('user-login-nonce'); ?>"/>
                  <input type="submit" value="Submit">
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>