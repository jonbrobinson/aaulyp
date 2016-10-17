@extends('layouts.master')
@section('top_javascript')
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" type="text/css">
    <meta property="og:url"           content="{{ request()->fullUrl()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ "AAULYP | ".$album->name }}" />
    <meta property="og:description"   content="{{ $album->description }}" />
    <meta property="og:image"         content="{{ $album->photos[0]->image[1]->source or asset("assets/img/800x550/800x550.jpg") }}" />
@stop
@section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1604453216535744";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Photos</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/news/photos') }}">Photos</a></li>
                <li class="active">{{ $album->name }}</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
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
                    <br>
                    <div class="social-button">
                        <div class="fb-share-button" data-href="{{ request()->fullUrl() }}" data-layout="button" data-size="large" data-mobile-iframe="true">
                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faaulyp.org%2F&amp;src=sdkpreparse">Share</a>
                        </div>
                    </div>
                    <div class="social-button">
                        <a class="twitter-share-button"
                           href="https://twitter.com/intent/tweet"
                           data-size="large">
                            Tweet
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-8 gallery">
                    <div class="row">
                        @foreach($album->photos as $photo)
                            <div class="col-xs-4 col-sm-4 gallery_image">
                                <a href="{{ $photo->images[0]->source }}" data-lightbox="album-show"><img src="{{ $photo->images[0]->source }}" alt="" class="img-responsive"></a>
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
    <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>
@stop