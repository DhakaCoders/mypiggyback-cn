(function($) {

if( $('#route_map').length ){
    	var origin, destination, map;
        
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function (listener) {
            setDestination();
            initMap();
        });

        // init or load map
        function initMap() {

            var myLatLng = {
                lat: 51.513100,
                lng: -0.135590
            };
            map = new google.maps.Map(document.getElementById('route_map'), {zoom: 16, center: myLatLng,});
        }
        function setDestination() {
          var options = {
          	types: ['(cities)']
          };
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);

                var origin = $('#origin').val();
                var destination = $('#destination').val();
                var travel_mode = 'DRIVING';
                var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
                var directionsService = new google.maps.DirectionsService();
                displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
                calculateDistance(travel_mode, origin, destination);
            });
        }

        function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: travel_mode,
                avoidTolls: true
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setMap(null);
                    directionsDisplay.setDirections(null);
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        // calculate distance , after finish send result to callback function
        function calculateDistance(travel_mode, origin, destination) {
            var DistanceMatrixService = new google.maps.DistanceMatrixService();
            DistanceMatrixService.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode[travel_mode],
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, save_results);
        }

        // save distance results
        function save_results(response, status) {

            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#results .mgs').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#results .mgs').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    var distance_in_kilo = distance.value / 1000; // the kilo meter
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    appendResults(distance_in_kilo, distance_in_mile, duration_text);
                    setSourceDestination(origin, destination, distance_in_mile);
                    //sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                }
            }
        }
    	// append html results
    	function appendResults(distance_in_kilo, distance_in_mile, duration_text) {
    	    $("#results").show();
    	    $('#results .mgs').html("<strong>"+ distance_in_mile.toFixed(1) +"</strong><span>miles</span>");
            if( distance_in_mile > 0 ){
                $('#recov_miles').val(distance_in_mile.toFixed(1));
                $('#trans_miles').val(distance_in_mile.toFixed(1));
            }
    	}
        function setSourceDestination(origin, destination, distance_in_mile) {
            if( origin !='' &&  destination !='' && distance_in_mile > 0 ){
                $('#recv_origin').val(origin);
                $('#recov_destin').val(destination);
                $('#trans_origin').val(origin);
                $('#trans_destin').val(destination);
            }
        }
        // get current Position
        $('a.current_location').on('click', function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(setCurrentPosition);
            } else {
                alert("Geolocation is not supported by this browser.")
            }
        });

        // get formatted address based on current position and set it to input
        function setCurrentPosition(pos) {
            var geocoder = new google.maps.Geocoder();
            var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
            geocoder.geocode({ 'location' :latlng  }, function (responses) {
                console.log(responses);
                if (responses && responses.length > 0) {
                    $("#origin").val(responses[1].formatted_address);
                    $("#from_places").val(responses[1].formatted_address);
                    //    console.log(responses[1].formatted_address);
                } else {
                    alert("Cannot determine address at this location.")
                }
            });
        }
}
    //
if( $('#routeMapID').length ){
     google.maps.event.addDomListener(window, 'load', function (listener) {
        initMap();
        document.getElementById('from_places').click();
        document.getElementById('to_places').click();
    });
    function initMap() {
      const directionsService = new google.maps.DirectionsService();
      const directionsRenderer = new google.maps.DirectionsRenderer();
      const map = new google.maps.Map(document.getElementById("routeMapID"), {
        zoom: 16,
        center: { lat: 51.513100, lng: -0.135590 },
        scrollwheel: false,
        zoomControl: false,
        gestureHandling: 'none'
      });
      directionsRenderer.setMap(map);

      const onChangeHandler = function () {
        calculateAndDisplayRoute(directionsService, directionsRenderer);
      };
  document.getElementById("from_places").addEventListener("click", onChangeHandler);
  document.getElementById("to_places").addEventListener("click", onChangeHandler);
    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
      directionsService
        .route({
          origin: {
            query: document.getElementById("from_places").value,
          },
          destination: {
            query: document.getElementById("to_places").value,
          },
          travelMode: google.maps.TravelMode.DRIVING,
        })
        .then((response) => {
          directionsRenderer.setDirections(response);
        })
        .catch((e) => window.alert("Directions request failed due to " + status));
    }
}
})(jQuery);