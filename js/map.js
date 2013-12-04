function afficheCarte(lat, lng) {
    google.maps.event.addDomListener(document.getElementById("pop_cont"), 'load', creaMap(lat,lng));
    pop_map_show();
}

function creaMap(lat,lng){

    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 12
    };

    var map = new google.maps.Map(document.getElementById("pop_cont"),mapOptions);
}

function pop_map_show(){
    pop_show();
    document.getElementById('pop').setAttribute('class','map');
}