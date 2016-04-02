@extends('layouts.master')
@section('top_javascript')
{{--    <link href="{{ asset("assets/css/dropzone.css") }}" rel="stylesheet" type="text/css">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet" type="text/css">
@stop
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $event->name }}</h1>

            <h2> {!! $event->street !!}</h2>

            <hr>

            <div>{!! $event->description !!}</div>

        </div>

        <div class="col-md-8">
            @foreach($event->photos as $photo)
                <img src="{{ asset("$photo->thumbnail_path") }}" alt="">
            @endforeach
        </div>
    </div>


    <form id="addPhotoForm" action="/{{ $event->zip }}/{{ str_slug($event->name) }}/photos" method="post" class="dropzone">
        {{ csrf_field() }}

    </form>

    @include('partials.footer')
@stop

@section('javascript')
{{--    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotoForm = {
            paramName: "photo",
            maxFilesize: 5,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script>
@stop