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
            if(typeof(data['user_status']) != "undefined" &&  data['user_status'].length != 0 && data['user_status'] == 'success'){
                
            }else{
               
            }
        }
    });

    return false
}