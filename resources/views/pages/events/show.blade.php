@extends('layouts.master')
@section('top_javascript')
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" type="text/css">
    <meta property="og:url"           content="{{ request()->fullUrl()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ "AAULYP | ".$event->title }}" />
    <meta property="og:description"   content="{{ $event->description->text }}" />
    <meta property="og:image"         content="{{ asset("assets/img/800x550/800x550.jpg") }}" />
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
            <h1 class="page-title pull-left">Events</h1>
            <ol class="breadcrumb">
                <li><a href="#">News</a></li>
                <li><a href="{{ url('/events') }}">Events</a></li>
                <li class="active">{{ $event->title }}</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="col-sm-6 col-md-12">
                        <img src="{{ $event->cover_image }}" alt="" class="img-responsive">
                    </div>
                    <br>
                    <div class="col-sm-6 col-md-12">
                        <h2>{{ $event->title }}</h2>
                        <hr>
                        <div>{!! $event->description->html !!}</div>
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
                        <br><br>
                        <h4>Where</h4>
                        @if ($event->venue->formatted_address && $event->venue)
                            {{--<p id="map-address"><i class="fa fa-map-marker"></i> {{ $event->venue->name }} <br> {{ $event->venue->formatted_address }}</p>--}}
                        @elseif($event->venue->formatted_address)
                            <p id="map-address"><i class="fa fa-map-marker"></i> {{ $event->venue->formatted_address }}</p>
                        @else
                            <p><i class="fa fa-map-marker"></i></p>
                        @endif
                        <h4>When</h4>
                        @if(!empty($event->time_start) && !empty($event->time_end))
                        <p>{{ date("l, F j, Y g:iA", $event->time_start) }} - {{ date("l, F j, Y g:iA", $event->time_end) }}</p>
                        @elseif(!empty($event->time_start) && empty($event->time_end))
                        <p>{{ date("l, F j, Y g:iA", $event->time_start) }}</p>
                        @endif
                        @if(!empty($event->ticket_url))
                            <h4>Tickets</h4>
                            <p><a href="{{ url($event->ticket_url) }}">{{ $event->ticket_url }}</a></p>
                        @endif
                    </div>
                    <div class="col-md-12" id="map"></div>
                </div>
                @if(count($events) >= 1)
                    <div class="col-md-3">
                        <div class="widget">
                            <h2 class="widget-title"><i class="fa fa-calendar"></i> Upcoming Events</h2>
                            @foreach($events as $feature)
                                <h4><a href="{{ url("/events/$feature->id".str_limit($event->platform, 2, "")) }}">{{ $feature->title }}</a></h4>
                                <p><strong>{{ date("l, F j, Y g:iA", $feature->time_start) }}</strong></p>
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('partials.footer')
@stop

@section('javascript')
    <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjraWiz5BuIM0LnJl-AP5p8PF9fBbQQY&callback=initMap" async defer></script>
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