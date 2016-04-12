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
                <div class="col-sm-6 col-md-4">
                    <h1>{{ $event->name }}</h1>

                    <h2> {!! $event->street !!}</h2>

                    <hr>

                    <div>{!! $event->description !!}</div>

                </div>
                <div class="col-md-8" id="map"></div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-8 gallery">
                    <div class="row">
                        @foreach($event->photos as $photo)
                            <div class="col-xs-4 col-md-3 gallery_image">
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
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjraWiz5BuIM0LnJl-AP5p8PF9fBbQQY&callback=initMap"
            async defer>

    </script>
@stop