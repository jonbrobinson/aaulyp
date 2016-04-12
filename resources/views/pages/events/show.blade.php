@extends('layouts.master')
@section('top_javascript')
{{--    <link href="{{ asset("assets/css/dropzone.css") }}" rel="stylesheet" type="text/css">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-9">
                    <h2>{{ $event->name }}</h2>

                    <h4 id="map-address">{!! $event->street !!}, {!! $event->city !!}, {!! $event->state !!} {!! $event->zip !!}</h4>

                    <hr>

                    <div>{!! $event->description !!}</div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-9 gallery">
                    <div class="row">
                        @foreach($event->photos as $photo)
                            <div class="col-xs-4 col-md-2 gallery_image">
                                <a href="{{ asset("$photo->path") }}" data-lightbox="event-show"><img src="{{ asset("$photo->thumbnail_path") }}" alt="" class="img-responsive"></a>
                            </div>
                        @endforeach
                    </div>
                    @if ($user && $user->owns($event))
                        <hr>
                        <div>
                            <h2 class="section-heading">ADD PHOTOS</h2>
                            <form id="addPhotoForm"
                                  action="{{ action('EventsController@addPhoto', [$event->zip, $event->slug]) }}"
                                  method="post"
                                  class="dropzone"
                            >
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-9" id="map"></div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@stop

@section('javascript')
{{--    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>--}}
    <script src="{{ asset('assets/js/plugins/lightbox/lightbox.js') }}"></script>
    <script>
        lightbox.option({
            'fitImagesInViewport': true,
            'wrapAround': true
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotoForm = {
            paramName: "photo",
            maxFilesize: 5,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script>
    <script>
        function initMap() {
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
            console.log(address);
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    theMap.setCenter(results[0].geometry.location);
                    var image = new google.maps.MarkerImage("{{ asset('assets/img/location-pin.png') }}", null, null, null, new google.maps.Size(32, 32));
                    var beachMarker = new google.maps.Marker({
                        map: theMap,
                        icon: image,
                        position: results[0].geometry.location
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjraWiz5BuIM0LnJl-AP5p8PF9fBbQQY&callback=initMap"
            async defer>

    </script>
@stop