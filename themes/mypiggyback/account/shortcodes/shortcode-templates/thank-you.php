<?php 
if(isset($_GET['tx']) && !empty($_GET['action'])){
  $pp_hostname = "www.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
  // read the post from PayPal system and add 'cmd'
  $req = 'cmd=_notify-synch';
   
  $tx_token = $_GET['tx'];
  $auth_token = "GX_sTf5bW3wxRfFEbgofs88nQxvMQ7nsI8m21rzNESnl_79ccFTWj2aPgQ0";
  $req .= "&tx=$tx_token&at=$auth_token";
   
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
  //set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
  //if your server does not bundled with default verisign certificates.
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
  $res = curl_exec($ch);
  curl_close($ch);
  if(!$res){
      //HTTP ERROR
  }else{
    var_dump($res);
  }
}

?>

<div class="ac-page-cntlr">
  <section class="thankyou-page-cntlr">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="block-800">
              <div class="thankyou-page-con">
                <h1 class="fl-h3">Thank you!</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
    </div>    
  </section>
</div>