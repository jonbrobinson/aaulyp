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
                <div class="col-sm-6 col-md-8 col-md-offset-2">
                    <h2>{{ $event->name }}</h2>
                    <hr>
                    <div>{!! $event->description !!}</div>

                    <h4>Where</h4>
                    <p id="map-address">{!! $event->street !!}, {!! $event->city !!}, {!! $event->state !!} {!! $event->zip !!}</p>

                    <h4>When</h4>
                    <p>{{ date("l, F t, Y", $event->date_start) }} - {{ date("l, F t, Y", $event->date_end) }}</p>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-8 col-md-offset-2 gallery">
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

            <div class="col-xs-10 col-md-offset-1">
                {{--<div class="col-xs-10 col-xs-offset-1">--}}
                    <div class="col-xs-12" id="map"></div>
                {{--</div>--}}
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
    <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjraWiz5BuIM0LnJl-AP5p8PF9fBbQQY&callback=initMap" async defer></script>
@stop