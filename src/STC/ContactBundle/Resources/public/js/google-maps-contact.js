google.maps.event.addDomListener(window, 'load', init);
var map;
var icon = {
    path: "M25,0C11.191,0,0,11.194,0,25c0,23.87,25,55,25,55s25-31.13,25-55C50,11.194,38.807,0,25,0z M25,38.8c-7.457,0-13.5-6.044-13.5-13.5S17.543,11.8,25,11.8c7.455,0,13.5,6.044,13.5,13.5S32.455,38.8,25,38.8z",
    fillColor: '#e85356',
    fillOpacity: 1,
    anchor: new google.maps.Point(loc[1],loc[2]),
    strokeWeight: 0,
    scale: 0.5
};
function init() {
    var mapOptions = {
        center: new google.maps.LatLng(loc[1],loc[2]),
        zoom: 11,
        zoomControl: false,
        disableDoubleClickZoom: false,
        mapTypeControl: false,
        scaleControl: false,
        scrollwheel: true,
        panControl: false,
        streetViewControl: false,
        draggable : true,
        overviewMapControl: false,
        overviewMapControlOptions: {
            opened: false
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var mapElement = document.getElementById('box-map');
    var map = new google.maps.Map(mapElement, mapOptions);


        marker = new google.maps.Marker({
            icon: icon,
            position: new google.maps.LatLng(loc[1],loc[2]),
            map: map,
            title: loc[0]
        });


}