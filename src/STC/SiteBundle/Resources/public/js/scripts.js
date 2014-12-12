/*
    Slider
*/
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide"
    });
});

/*
    Pretty Photo
*/
jQuery(document).ready(function() {
    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools: false});
});


/*
    Flickr feed
*/
$(document).ready(function() {
    $('.flickr-feed').jflickrfeed({
        limit: 8,
        qstrings: {
            id: '52617155@N08'
        },
        itemTemplate: '<li><a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
    });
});


/*
    Google maps
*/
jQuery(document).ready(function() {
    var position = new google.maps.LatLng(45.067883, 7.687231);
    $('.map').gmap({'center': position,'zoom': 15, 'disableDefaultUI':true, 'callback': function() {
            var self = this;
            self.addMarker({'position': this.get('map').getCenter() });	
        }
    }); 
});


