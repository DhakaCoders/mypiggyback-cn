jQuery(document).ready(function($) {
    $(document).on( 'click', '#driver_apply', function(e) {
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
                    
                }else{

                }
            }
        })
        return false;
    });
});

function vehicleRecoveryOrder(){
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
               
            }
        }
    });

    return false
}
function vehicleTransportOrder(){
    var error = false;
    var serialized = jQuery( '#vehicle-transport' ).serialize();
    console.log(serialized);
    jQuery.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: ajax_mpb_order_object.ajaxurl,
        data: serialized,
        success: function(data){
            console.log(data);
            if(typeof(data['success']) != "undefined" &&  data['success'].length != 0 && data['success'] == 'success'){
                jQuery("#transport_msg").text(data['success_msg']);
                function redirect_page(){
                    window.location.href = data['redirect'];
                }
                setTimeout(redirect_page,3000);
            }else{
               
            }
        }
    });

    return false
}