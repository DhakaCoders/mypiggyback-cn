<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action('init', 'application_form_create');
	
function application_form_create(){
		global $msgs, $wpdb; $error = false;
		if (isset( $_POST["stripeToken"] ) && wp_verify_nonce($_POST['application_form_nonce'], 'application-form-nonce')) {
            $amount = 0;
            $orderid = $email = $desc = '';
	           if( isset( $_POST['order_id'] ) && !empty($_POST['order_id']) ) $orderid = $_POST['order_id'];
            if( isset( $_POST['email'] ) && !empty($_POST['email']) ) $email = $_POST['email'];
                  
            if( isset( $_POST['description'] ) && !empty($_POST['description']) ) $desc = $_POST['description'];

            if( isset( $_POST['mile'] ) && !empty($_POST['mile']) ){
                $toal_mile = $_POST['mile'];
                $per_mile_rate = (int)get_field('per_mile','options'); 
                $total_amount = $per_mile_rate*$toal_mile;
                $amount = $total_amount.'00'; 
            }
            

	        
	        $token = $_POST['stripeToken'];
	       if( ($amount > 0) && isset( $token ) && !empty($token) ){
            try {
               \Stripe\Stripe::setApiKey('sk_test_jd5upukUtze0z3FVkJPCZ2YQ');
               
                   // Create Customer In Stripe
                    $customer = \Stripe\Customer::create(array(
                      "email" => $email,
                      "source" => $token
                    ));
                    
                    // Charge Customer
                    $charge = \Stripe\Charge::create(array(
                      "amount" => $amount,
                      "currency" => "USD",
                      "description" => $desc,
                      "customer" => $customer->id,
                    ));
                    
                if($charge->amount_refunded == 0 && empty($charge->failure_code) && $charge->paid == 1 && $charge->captured == 1){ 
                $table = $wpdb->prefix . 'applications_form'; 
        			/*$status = CBV_DB_Query::create($table, array(
        				'personal_firstname' => $firstName,
        				'email' => $email,
        				'payment_currency' => $charge->currency,
        				'payment_method' => $charge->payment_method_details->type,
        				'course_total_price' => $mamount,
        				'created_at' => date('Y-m-d H:i:s'),
        			));*/
              $order_info = array(
                'ID' =>  $orderid,
                'post_status' => 'publish'
              );
       
              $get_id = wp_update_post($order_info);
              if($get_id){
                update_field( 'order_status', 'publish', $get_id );
              }
              payment_send_mail_by_customer($token, $amount, $orderid);
        			echo '<script>window.location.href="'.home_url('thank-you').'"</script>';
              exit();
        			if(isset($status)){

                echo '<script>window.location.href="'.home_url('thank-you').'"</script>';
                exit();
        				
        			}else{
        				//$msgs['error'] = 'Could not submit something was wrong please try again!';
        				$error = true;
        			}
        			
                }else{
                    $error = true;
                }
            } catch(Stripe_CardError $e) {
              //$msgs['error'] = $e->getMessage();
              $error = true;
            } catch (Stripe_InvalidRequestError $e) {
              // Invalid parameters were supplied to Stripe's API
              //$msgs['error'] = $e->getMessage();
              $error = true;
            } catch (Stripe_AuthenticationError $e) {
              // Authentication with Stripe's API failed
              //$msgs['error'] = $e->getMessage();
              $error = true;
            } catch (Stripe_ApiConnectionError $e) {
              // Network communication with Stripe failed
              //$msgs['error'] = $e->getMessage();
              $error = true;
            } catch (Stripe_Error $e) {
              // Display a very generic error to the user, and maybe send
              // yourself an email
              //$msgs['error'] = $e->getMessage();
              $error = true;
            } catch (Exception $e) {
              // Something else happened, completely unrelated to Stripe
             // $msgs['error'] = $e->getMessage();
              $error = true;
            }
	       }
	       else{
	           //$msgs['error'] = 'Could not payment something was wrong please try again!';
	           $error = true; 
	       }
            
            if($error) {
                
                echo '<script>window.location.href="'.home_url('unsuccessful').'"</script>';
                exit();
            }
		}
		return false;
}