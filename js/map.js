function afficheCarte(lat, lng) {
    pop_content('<div id=\'map\'></div>');
    google.maps.event.addDomListenerOnce(document.getElementById("map"), 'load', creaMap(lat,lng));
    pop_set_x(600);
    pop_set_y(400);
    pop_show();
}

function creaMap(lat,lng){

    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 12
    };

    var map = new google.maps.Map(document.getElementById("map"),mapOptions);
}

function afficheItineraire(){
    pop_content('<div id=\'map\'></div>');
    google.maps.event.addDomListenerOnce(document.getElementById("map"), 'load', itineraire(1,2));
    pop_set_x(600);
    pop_set_y(400);
    pop_show();
}


function itineraire(id_depart,id_arrive){

    var mapOptions = {
        zoom: 12
    };

    var map = new google.maps.Map(document.getElementById("map"),mapOptions);

    var myLatLng = new google.maps.LatLng(48.583148,7.747882);
    var myLatLng2 = new google.maps.LatLng(47.218371,-1.553621);
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer({ 'map': map });
    var request = {
        origin     : myLatLng,
        destination: myLatLng2,
        travelMode : google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.suppressMarkers = true;
            alert(response.routes[0].legs[0].duration.text);
        }
    });
}