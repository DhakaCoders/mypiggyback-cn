(function($) {
	
	var mylatln = {lat: 51.513100, lng: -0.135590};
    var mapProp = {
      center: mylatln,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map= new google.maps.Map(document.getElementById('disMap'),mapProp);

      var options = {
      	types: ['(cities)']
      };

      var input1 = document.getElementById('mfrom');
      var input2 = document.getElementById('mto');
      var auc1 = new google.maps.places.Autocomplete(input1, options);
      var auc2 = new google.maps.places.Autocomplete(input2, options);

})(jQuery);