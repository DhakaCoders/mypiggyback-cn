jQuery(document).ready( function($){
  if($('#choose-file').length){
      var logoMediaUploader;
    $('#choose-file').on('click', function(e){
       e.preventDefault();
        if(logoMediaUploader){
            logoMediaUploader.open();
            return;
        }
        
        logoMediaUploader = wp.media.frames.file_frame = wp.media({
           title: 'Choose a Profile Image',
           button: {
             text: 'Choose Image'  
           },
            multiple: false
        });
        
        logoMediaUploader.on('select', function(){
          attachment = logoMediaUploader.state().get('selection').first().toJSON(); 
          console.log(attachment.id);
          $('#_profile_logo').val(attachment.url);
          //$('#profile-picture-priview').css('background-image', 'url(' + attachment.url + ')');
          $('#profile-priview').html($('<img>',{id:'set-post-thumb',src:attachment.url}));
        })
        
        logoMediaUploader.open();
    });
  }


});