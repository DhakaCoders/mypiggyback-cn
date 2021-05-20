jQuery(document).ready(function($) {
/*    $(document).on( 'click', '#driver_apply', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var nonce = $(this).data('nonce');
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: ajax_driver_apply_object.ajaxurl,
            data: {
                action: 'apply_driver_order',
                nonce: nonce,
                id: id
            },
            success: function( data ) {
                console.log(data);
                if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
                  if(typeof(data['applied']) != "undefined" &&  data['applied'].length != 0 && data['applied'] == 'yes'){
                    $('#apply_btn_wrap').html('<span class="applied">You have already applied for this job.</span>');
                  }else{
                    $('#apply_btn_wrap').html('<span class="sent-apply">Sent succsessfully for this job.</span>');
                  } 
                }else{

                }
            }
        })
        return false;
    });*/

    $(document).on( 'click', '#driver_appoint', function(e) {
        e.preventDefault();
        var id = $(this).data('order_id');
        var driver_id = $(this).data('driver_id');
        var nonce = $(this).data('order_nonce');
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url: ajax_appoint_driver_by_admin_object.ajaxurl,
            data: {
                action: 'appoint_driver_by_admin',
                nonce: nonce,
                driver: driver_id,
                id: id
            },
            success: function( data ) {
                console.log(data);
                if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
                  if(typeof(data['appoint_sent']) != "undefined" &&  data['appoint_sent'].length != 0 && data['appoint_sent'] == 'sent'){
                    $('#driver_appoint').text('Appointed Already');
                  }else{
                    $('#driver_appoint').text('Appointed');
                  } 
                }else{

                }
            }
        })
        return false;
    });
});

function driverApplyJob(id, nonce){
    jQuery.ajax({
        type: 'post',
        dataType: 'JSON',
        url: ajax_driver_apply_object.ajaxurl,
        data: {
            action: 'apply_driver_order',
            nonce: nonce,
            id: id
        },
        success: function( data ) {
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
              if(typeof(data['applied']) != "undefined" &&  data['applied'].length != 0 && data['applied'] == 'yes'){
                jQuery('#apply_btn_wrap').html('<span class="applied">You have already applied for this job.</span>');
              }else{
                jQuery('#apply_btn_wrap').html('<span class="sent-apply">Your application has been sent successfully.</span>');
              } 
            }else{

            }
        }
    })
    return false;
}
function orderAppoint(orderid, driverid){
    jQuery.ajax({
        type: 'post',
        dataType: 'JSON',
        url: ajax_appoint_driver_by_admin_object.ajaxurl,
        data: {
            action: 'appoint_driver_by_admin',
            nonce: 'appoint_nonce',
            driver: driverid,
            id: orderid
        },
        success: function( data ) {
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
              if(typeof(data['appoint_sent']) != "undefined" &&  data['appoint_sent'].length != 0 && data['appoint_sent'] == 'sent'){
                jQuery('#order_appoint_'+driverid).text('Appointed Already');
              }else{
                jQuery('#order_appoint_'+driverid).text('Appointed');
              } 
            }else{

            }
        }
    })
    return false;
}
function orderConfirmation(orderid, driverid){
    jQuery.ajax({
        type: 'post',
        dataType: 'JSON',
        url: ajax_confirmation_by_driver_object.ajaxurl,
        data: {
            action: 'order_confirmation_by_driver',
            nonce: 'confirm_driver_nonce',
            driver: driverid,
            id: orderid
        },
        success: function( data ) {
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
              if(typeof(data['confirm_sent']) != "undefined" &&  data['confirm_sent'].length != 0 && data['confirm_sent'] == 'sent'){
                jQuery('.jobconfirm.by_driver').html('<span><label>By Driver: </label>Completed</span>');
              }else{
                jQuery('.jobconfirm.by_driver').html('<span><label>By Driver: </label>Completed</span>');
              } 
            }else{

            }
        }
    })
    return false;
}
function orderConfirmationByAuthor(orderid){
    jQuery.ajax({
        type: 'post',
        dataType: 'JSON',
        url: ajax_confirmation_by_author_object.ajaxurl,
        data: {
            action: 'order_confirmation_by_author',
            nonce: 'confirm_author_nonce',
            id: orderid
        },
        success: function( data ) {
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
              if(typeof(data['confirm_sent']) != "undefined" &&  data['confirm_sent'].length != 0 && data['confirm_sent'] == 'sent'){
                jQuery('.jobconfirm.by_author').html('<span><label>By Author: </label>Completed</span>');
              }else{
                jQuery('.jobconfirm.by_author').html('<span><label>By Author: </label>Completed</span>');
              } 
            }else{

            }
        }
    })
    return false;
}
function vehicleRecoveryOrder(prefix){
    var error = false;
    var serialized = jQuery( '#vehicle-recovery' ).serialize();
    console.log(serialized);
    jQuery.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: ajax_mpb_order_object.ajaxurl,
        data: serialized,
        success: function(data){
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
                jQuery("#recovery_msg").text(data['success_msg']);
                function redirect_page(){
                    window.location.href = data['redirect'];
                }
                setTimeout(redirect_page,3000);
            }else{
                if(typeof(data['fromloc']) != "undefined" &&  data['fromloc'].length != 0){
                    jQuery('.'+prefix+'_fromloc_error').text(data['fromloc']); 
                }else{
                    jQuery('.'+prefix+'_fromloc_error').text('');
                }
                if(typeof(data['toloc']) != "undefined" &&  data['toloc'].length != 0){
                    jQuery('.'+prefix+'_toloc_error').text(data['toloc']);
                }else{
                    jQuery('.'+prefix+'_toloc_error').text('');
                }
                if(typeof(data['name']) != "undefined" &&  data['name'].length != 0){
                    jQuery('.'+prefix+'_name_error').text(data['name']);
                }else{
                    jQuery('.'+prefix+'_name_error').text('');
                }
                if(typeof(data['email']) != "undefined" &&  data['email'].length != 0){
                    jQuery('.'+prefix+'_email_error').text(data['email']);
                }else{
                    jQuery('.'+prefix+'_email_error').text('');
                }
                if(typeof(data['phone']) != "undefined" &&  data['phone'].length != 0){
                    jQuery('.'+prefix+'_phone_error').text(data['phone']);
                }else{
                    jQuery('.'+prefix+'_phone_error').text('');
                } 
            }
        }
    });

    return false
}
function vehicleTransportOrder(prefix){
    var error = false;
    var serialized = jQuery( '#vehicle-transport' ).serialize();
    console.log(prefix);
    jQuery.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: ajax_mpb_order_object.ajaxurl,
        data: serialized,
        success: function(data){
            
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
                jQuery("#transport_msg").text(data['success_msg']);
                function redirect_page(){
                    window.location.href = data['redirect'];
                }
                setTimeout(redirect_page,3000);
            }else{
                if(typeof(data['fromloc']) != "undefined" &&  data['fromloc'].length != 0){
                    jQuery('.'+prefix+'_fromloc_error').text(data['fromloc']); 
                }else{
                    jQuery('.'+prefix+'_fromloc_error').text('');
                }
                if(typeof(data['toloc']) != "undefined" &&  data['toloc'].length != 0){
                    jQuery('.'+prefix+'_toloc_error').text(data['toloc']);
                }else{
                    jQuery('.'+prefix+'_toloc_error').text('');
                }
                if(typeof(data['name']) != "undefined" &&  data['name'].length != 0){
                    jQuery('.'+prefix+'_name_error').text(data['name']);
                }else{
                    jQuery('.'+prefix+'_name_error').text('');
                }
                if(typeof(data['email']) != "undefined" &&  data['email'].length != 0){
                    jQuery('.'+prefix+'_email_error').text(data['email']);
                }else{
                    jQuery('.'+prefix+'_email_error').text('');
                }
                if(typeof(data['phone']) != "undefined" &&  data['phone'].length != 0){
                    jQuery('.'+prefix+'_phone_error').text(data['phone']);
                }else{
                    jQuery('.'+prefix+'_phone_error').text('');
                }  
            }
        }
    });

    return false
}