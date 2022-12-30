// Google Maps
var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 23.22533, lng: -102.97232},
    zoom: 6,
    draggable: true,
    scrollwheel: false,
    mapTypeControl: false,
    rotateControl: true,
    styles: [{"featureType":"all","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":-30}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#353535"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#656565"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#505050"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#808080"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#454545"}]},{"featureType":"transit","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":100},{"lightness":-40},{"invert_lightness":true},{"gamma":1.5}]}]
});

var markers = [];

    for (var i = 0; i < sme_mex_map.events.length; i++) {
        console.log(sme_mex_map.marker_url);
        var marker = new google.maps.Marker({
            map: map,
            position: {lat: parseFloat(sme_mex_map.events[i].latitude), lng: parseFloat(sme_mex_map.events[i].longitude)},
            icon: {
                url: sme_mex_map.marker_url,
                size: new google.maps.Size(40, 40),
                anchor: new google.maps.Point(20, 20),
            }
        });

        var popupContent = '<div class="location-content">' +
                '<div class="map-title">' + sme_mex_map.events[i].artist + '</div>' +
                '<div class="map-venue">' + sme_mex_map.events[i].venue + '</div>' +
                '<div class="map-location">' + sme_mex_map.events[i].location + '</div>' +
                '<div class="map-date">' + sme_mex_map.events[i].event_date + '</div>'; +
        '</div>';

        createInfoWindow(marker, popupContent);

        markers.push(marker);
    }

    var infoWindow = new google.maps.InfoWindow();
    function createInfoWindow(marker, popupContent) {
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(popupContent);
            infoWindow.open(map, this);
        });
    }
