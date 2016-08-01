@extends('layouts.master')
@section('top_javascript')
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <h2>{{ $album->name }}</h2>
                    <hr>
                    <div>{!! $album->description !!}</div>

                    @if(!empty($album->location))
                        <h4>Where</h4>
                        <p> {{ $album->location }}</p>
                    @endif
                </div>
                <div class="col-sm-6 col-md-8 gallery">
                    <div class="row">
                        @foreach($album->photos as $photo)
                            <div class="col-xs-4 col-sm-3 gallery_image">
                                <a href="{{ $photo->images[0]->source }}" data-lightbox="album-show"><img src="{{ $photo->picture }}" alt="" class="img-responsive"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@stop

@section('javascript')
    <script src="{{ asset('assets/js/plugins/lightbox/lightbox.js') }}"></script>
    <script>
        lightbox.option({
            'fitImagesInViewport': true,
            'wrapAround': true
        })
    </script>
    <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
@stop