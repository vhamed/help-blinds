function newLocation(newLat, newLng){
    map.setCenter({
        lat: newLat,
        lng: newLng
    });
    marker.setPosition({
        lat: newLat,
        lng: newLng
    });
}

function showInMap(element){ // location icon action
    // console.log(element.getAttribute("data-latitude");
    var newLat = Number(element.getAttribute('data-latitude')), newLng = Number(element.getAttribute('data-longitude'));
    newLocation(newLat, newLng);
}

function loadHelpers(modal){ // search icon action
    document.getElementById('header-title').innerHTML = "Suggests People for helping " + modal.getAttribute('data-blind-name');
    $(document).ready(function(){
        $('#content').load('helper-table.php', {
            id: modal.getAttribute('data-blind-id'),
            name: modal.getAttribute('data-blind-name'),
            lat: modal.getAttribute('data-latitude'),
            lng: modal.getAttribute('data-longitude')
        });
    });
}

function show(element, blindLat, blindLng, helperLat, helprLng){
    var origin1 = {lat: blindLat, lng: blindLng};
    var destinationA = {lat: helperLat, lng: helprLng};
    var outputDiv = '';
    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
        origins: [origin1],
        destinations: [destinationA],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function(response, status) {
        if (status !== 'OK') {
        alert('Error was: ' + status);
        } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            // var outputDiv = document.getElementById('output');
            // outputDiv.innerHTML = '';
            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[i].elements;
                for (var j = 0; j < results.length; j++) {
                    outputDiv += results[j].distance.text + '(' + results[j].duration.text + ')<br>';
                    element.innerHTML = outputDiv;
                }
            }
        }
    });
}

// imported from htdocs project 
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        return ;
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}

// This script calculates great-circle distances between the two points – that is, the shortest distance over the earth’s surface 
// using the ‘Haversine’ formula.
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
