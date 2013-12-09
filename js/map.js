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