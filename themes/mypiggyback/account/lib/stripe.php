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
        if( isset( $_POST['order_id'] ) && !empty($_POST['order_id']) ){
            $orderid = $_POST['order_id'];
            order_info_update($_POST, $orderid);
        } 
           
        if( isset( $_POST['email_address'] ) && !empty($_POST['email_address']) ){
            $email = $_POST['email_address'];
        } 
              
        if( isset( $_POST['order_type'] ) && !empty($_POST['order_type']) ){
            $desc = 'Vehicle '.ucfirst($_POST['order_type']);
        } 

        if( isset( $_POST['grandTotal'] ) && !empty($_POST['grandTotal']) ){
            $amount = $_POST['grandTotal'].'00'; 
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
                      "currency" => "GBP",
                      "description" => $desc,
                      "customer" => $customer->id,
                    ));
                    
            if($charge->amount_refunded == 0 && empty($charge->failure_code) && $charge->paid == 1 && $charge->captured == 1){ 
              $order_info = array(
                'ID' =>  $orderid,
                'post_status' => 'publish'
              );
       
              $get_id = wp_update_post($order_info);
              if($get_id){
                update_field( 'order_status', 'publish', $get_id );
                update_field( 'payment_currency', $charge->currency, $get_id );
                update_field( 'pay_status', $charge->status, $get_id );
              }
              payment_send_mail_by_customer($token, $amount, $orderid);
                    echo '<script>window.location.href="'.home_url('thank-you').'"</script>';
              exit();
                    
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

function order_info_update($post, $pid){
    if( isset($post['from_location']) && !empty($post['from_location']) ){
        update_field( 'order_from_location', sanitize_text_field($post['from_location']), $pid );
    }
    if( isset($post['to_location']) && !empty($post['to_location']) ){
        update_field( 'order_to_location', sanitize_text_field($post['to_location']), $pid );
    }
    if( isset($post['amount_of_miles']) && !empty($post['amount_of_miles']) ){
        update_field( 'amount_of_miles', sanitize_text_field($post['amount_of_miles']), $pid );
    }
    if( isset($post['amount_of_time']) && !empty($post['amount_of_time']) ){
        update_field( 'amount_of_time', sanitize_text_field($post['amount_of_time']), $pid );
    }
    if(isset($post['fullname']) && !empty($post['fullname'])){
        update_field( 'order_fullname', sanitize_text_field($post['fullname']), $pid );
    }
    if(isset($post['email_address']) && !empty($post['email_address'])){
        update_field( 'order_email', sanitize_email($post['email_address']), $pid );
    }
    if(isset($post['telephone']) && !empty($post['telephone'])){
        update_field( 'order_telephone', sanitize_text_field($post['telephone']), $pid );
    }
    if( isset($post['order_type']) && !empty($post['order_type']) ){
        update_field('order_type', sanitize_text_field($post['order_type']), $pid );
    }

    // Billing Info

    if( isset($post['bill_add_type']) && !empty($post['bill_add_type']) ){
        update_field('bill_address_type', sanitize_text_field($post['bill_add_type']), $pid );
    }
    if( isset($post['bill_add_1']) && !empty($post['bill_add_1']) ){
        update_field('bill_address_1', sanitize_text_field($post['bill_add_1']), $pid );
    }
    if( isset($post['bill_add_2']) && !empty($post['bill_add_2']) ){
        update_field('bill_address_2', sanitize_text_field($post['bill_add_2']), $pid );
    }
    if( isset($post['bill_city']) && !empty($post['bill_city']) ){
        update_field('bill_city', sanitize_text_field($post['bill_city']), $pid );
    }
    if( isset($post['bill_county']) && !empty($post['bill_county']) ){
        update_field('bill_county', sanitize_text_field($post['bill_county']), $pid );
    }
    if( isset($post['bill_postcode']) && !empty($post['bill_postcode']) ){
        update_field('bill_postcode', sanitize_text_field($post['bill_postcode']), $pid );
    }
    // Vehicle Info.
    if( isset($post['vehicle_type']) && !empty($post['vehicle_type']) ){
        update_field('vehicle_type', sanitize_text_field($post['vehicle_type']), $pid );
    }
    if( isset($post['vehicle_make']) && !empty($post['vehicle_make']) ){
        update_field('vehicle_make', sanitize_text_field($post['vehicle_make']), $pid );
    }
    if( isset($post['vehicle_issue']) && !empty($post['vehicle_issue']) ){
        update_field('vehicle_issue', sanitize_text_field($post['vehicle_issue']), $pid );
    }
    if( isset($post['vehicle_requests']) && !empty($post['vehicle_requests']) ){
        update_field('vehicle_requests', sanitize_text_field($post['vehicle_requests']), $pid );
    }
    // Time
    if( isset($post['response_time']) && !empty($post['response_time']) ){
        update_field('response_time', sanitize_text_field($post['response_time']), $pid );
    }
    if( isset($post['grandTotal']) && !empty($post['grandTotal']) ){
        update_field('grand_total', sanitize_text_field($post['grandTotal']), $pid );
    }
}