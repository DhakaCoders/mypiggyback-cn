jQuery(document).ready(function($) {
    $(document).on( 'click', '.delete-capm', function() {
        var id = $(this).data('id');
        var nonce = $(this).data('nonce');
        var post = $(this).parents('#camppost_'+id);
        $.ajax({
            type: 'post',
            url: ajax_delete_camp_object.ajaxurl,
            data: {
                action: 'my_delete_capm',
                nonce: nonce,
                id: id
            },
            success: function( result ) {
                if( result == 'success' ) {
                    post.fadeOut( function(){
                        post.remove();
                    });
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