$(document).ready( function() {
    var form = $('#the-form');
    if ( form.length > 0) {
        form.submit(function(e) {
            var url = "/contact"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#the-form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    resetResponse();
                    var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                    $('#server-response').append(success);
                    $('#contact-name').val('');
                    $('#contact-email').val('');
                    $('#contact-subject').val('');
                    $('#contact-message').val('');
                },
                error: function(xhr, status, error) {
                    resetResponse();
                    var errorList = '';
                    var errors = xhr.responseJSON.errors;

                    for (index = 0; index < errors.length; ++index) {
                        errorList += '<li>' + errors[index] + '</li>';
                    }

                    var errorElem = '<ul>' + errorList + '</ul>';

                    $('#server-response').addClass('alert alert-danger').append(errorElem);

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    var form = $('#the-form-linkedin');
    if ( form.length > 0) {
        form.submit(function(e) {
            var url = "/linkedin"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#the-form-linkedin").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    resetResponse();
                    var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                    $('#server-response').append(success);
                    $('#linkedin-email').val('');
                },
                error: function(xhr, status, error) {
                    resetResponse();
                    var errorList = '';
                    var errors = xhr.responseJSON.errors;

                    for (index = 0; index < errors.length; ++index) {
                        errorList += '<li>' + errors[index] + '</li>';
                    }

                    var errorElem = '<ul>' + errorList + '</ul>';

                    $('#server-response').addClass('alert alert-danger').append(errorElem);

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    var form = $('#the-form-signin');
    if ( form.length > 0) {
        form.submit(function(e) {
            var url = "/signinyes"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#the-form-signin").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    resetResponse();
                    var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                    $('#server-response').append(success);
                    $('#signin-name').val('');
                    $('#signin-email').val('');
                    $('#datepicker').val('');
                    $('#signin-event').val('');
                    $('input[name="ypFirst"]').prop('checked', false);
                    $('input[name="mailList"]').prop('checked', false);
                },
                error: function(xhr, status, error) {
                    resetResponse();
                    var errorList = '';
                    var errors = xhr.responseJSON.errors;

                    for (index = 0; index < errors.length; ++index) {
                        errorList += '<li>' + errors[index] + '</li>';
                    }

                    var errorElem = '<ul>' + errorList + '</ul>';

                    $('#server-response').addClass('alert alert-danger').append(errorElem);

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    var form = $('#admin-form');
    if ( form.length > 0) {

        form.submit(function(e) {

            var url = "/admin"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#admin-form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    resetResponse();
                    var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                    $('#server-response').append(success);
                },
                error: function(xhr, status, error) {
                    resetResponse();
                    var errorList = '';
                    var errors = xhr.responseJSON.errors;

                    for (index = 0; index < errors.length; ++index) {
                        errorList += '<li>' + errors[index] + '</li>';
                    }

                    var errorElem = '<ul>' + errorList + '</ul>';

                    $('#server-response').addClass('alert alert-danger').append(errorElem);
                    window.location.href('/');

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    function resetResponse (){
        var emptyDiv= $('#server-response').empty();

        if (emptyDiv.hasClass('alert alert-danger')) {
            emptyDiv.removeClass('alert alert-danger');
        }
    }

    window.initMap = function initMap() {
        geocoder = new google.maps.Geocoder();

        var styles = [
            {
                "stylers": [
                    { "visibility": "on" }
                ]
            },
            {
                "featureType": "landscape.natural",
                "stylers": [
                    { "visibility": "simplified" },
                    { "color": "#f0f0f0" }
                ]
            },
            {
                "featureType": "water",
                "stylers": [
                    { "visibility": "simplified" },
                    { "color": "#C2E7F5" }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    { "visibility": "simplified" },
                    { "color": "#ffffff" }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [
                    { "visibility": "off" }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.icon",
                "stylers": [
                    { "visibility": "off" }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    { "visibility": "on" },
                    { "color": "#646464" }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [
                    { "visibility": "on" },
                    { "weight": 1 },
                    { "color": "#ffffff" }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [
                    { "lightness": 90 },
                    { "color": "#d7d7d7" },
                    { "visibility": "off" }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    { "visibility": "on" },
                    { "color": "#ffffff" }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    { "visibility": "on" },
                    { "color": "#b8b8b8" }
                ]
            },
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [
                    { "visibility": "on" },
                    { "lightness": 60 },
                    { "saturation": -90 },
                    { "gamma": 0.90 }
                ]
            }
        ];

        var styledMap = new google.maps.StyledMapType(styles, {
            name: "Styled Map"
        });

        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            panControl: false,
            scaleControl: false,
            mapTypeControlOptions: {
                mapTypeIds: []
            }
        };

        var mapPlaceholder = document.getElementById('map');

        if(mapPlaceholder) {
            customMap = new google.maps.Map(mapPlaceholder, mapOptions);
            customMap.mapTypes.set('map_style', styledMap);
            customMap.setMapTypeId('map_style');
            codeAddress(customMap);
        }
    }

    function codeAddress(theMap) {

        var address = document.getElementById('map-address').innerText;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                theMap.setCenter(results[0].geometry.location);
                var image = new google.maps.MarkerImage("/assets/img/location-pin.png", null, null, null, new google.maps.Size(32, 32));
                var beachMarker = new google.maps.Marker({
                    map: theMap,
                    icon: image,
                    position: results[0].geometry.location
                });

            } else {
                var map = document.getElementById('map');

                map.id = "";
            }
        });
    }
});