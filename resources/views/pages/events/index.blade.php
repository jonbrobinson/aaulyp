@extends('layouts.master')

@section('content')
<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">Events</h1>
        <ol class="breadcrumb">
            <li><a href="#">News</a></li>
            <li class="active">Events</li>
        </ol>
    </div>
</div>
<!-- END BREADCRUMBS -->
<!-- PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- BLOG ENTRIES -->
                <div class="blog medium-thumbnail margin-bottom-30px">
                    @if(count($events) < 1 && empty($pastEvents))
                        <h1>We are planning some great opportunities. Come back soon to see some of the upcoming events</h1>
                    @elseif(count($events) < 1 && !empty($pastEvents))
                        <h1>We are planning some great opportunities. Check out some of our past events we hosted</h1>
                        <!-- blog post -->
                        @foreach($pastEvents as $pastEvent)
                            <article class="entry-post">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="{{ url("/events/$pastEvent->id".str_limit($pastEvent->platform, 2, "")) }}">{{ $pastEvent->title }}</a>
                                    </h2>
                                    <div class="meta-line clearfix">
                                        <div class="meta-author-category pull-left">
                                            <span class="post-author"><a href="#">Austin Area Urban League Young Professionals</a></span>
                                            {{--<span class="post-category">In: <a href="#">{{ $pastEvent->category }}</a></span>--}}
                                        </div>
                                        {{--<div class="meta-tag-comment pull-right">--}}
                                        {{--<span class="post-tags"><i class="fa fa-twitter"></i> <a href="#">story</a>, <a href="#">inspiration</a>, <a href="#">creative</a></span>--}}
                                        {{--<span class="post-comment"><i class="fa fa-comments"></i> <a href="#">3 Comments</a></span>--}}
                                        {{--</div>--}}
                                    </div>
                                </header>
                                <div class="entry-content clearfix">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <figure class="featured-image">
                                                <a href="{{ url("/events/$pastEvent->id".str_limit($pastEvent->platform, 2, "")) }}">
                                                    <div class="post-date-info clearfix"><span class="post-month">{{ strtoupper(date('M', intval($pastEvent->time_start))) }}</span><span class="post-date">{{ date('j', intval($pastEvent->time_start)) }}</span><span class="post-year">{{ date('Y', intval($pastEvent->time_start)) }}</span></div>
                                                    <img src="{{ $pastEvent->cover_image }}" class="img-responsive" alt="featured-image" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="excerpt">
                                                <p>{!! str_limit($pastEvent->description->text, 170) !!}</p>
                                                @if (!empty($pastEvent->time_start) && !empty($pastEvent->time_end))
                                                    <p><i class="fa fa-clock-o"></i> {{ date("D, d M Y g:iA", intval($pastEvent->time_start)) }} - {{ date("D, d M Y g:iA", intval($pastEvent->time_end)) }}</p>
                                                @elseif (!empty($pastEvent->time_end) && empty($pastEvent->time_end))
                                                    <p><i class="fa fa-clock-o"></i> {{ date("D, d M Y g:iA", intval($pastEvent->time_start)) }}</p>
                                                @else
                                                    <p><i class="fa fa-clock-o"></i>TBD</p>
                                                @endif

                                                @if (!empty($pastEvent->venue->formatted_address) && !empty($pastEvent->venue->name))
                                                    <p><i class="fa fa-map-marker"></i> {{ $pastEvent->venue->name }} <br> {{ $pastEvent->venue->formatted_address }}</p>
                                                @elseif(!empty($pastEvent->venue->formatted_address))
                                                    <p><i class="fa fa-map-marker"></i> {{ $pastEvent->venue->formatted_address }}</p>
                                                @else
                                                    <p><i class="fa fa-map-marker"></i></p>
                                                @endif
                                                <p class="read-more">
                                                    <a href="{{ url("/events/$pastEvent->id".str_limit($pastEvent->platform, 2, "")) }}" class="btn btn-primary">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- end blog post -->
                            <hr />
                        @endforeach
                    @else
                        <!-- blog post -->
                        @foreach($events as $event)
                            <article class="entry-post">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}">{{ $event->title }}</a>
                                    </h2>
                                    <div class="meta-line clearfix">
                                        <div class="meta-author-category pull-left">
                                            <span class="post-author"><a href="#">Austin Area Urban League Young Professionals</a></span>
                                            {{--<span class="post-category">In: <a href="#">{{ $event->category }}</a></span>--}}
                                        </div>
                                        {{--<div class="meta-tag-comment pull-right">--}}
                                            {{--<span class="post-tags"><i class="fa fa-twitter"></i> <a href="#">story</a>, <a href="#">inspiration</a>, <a href="#">creative</a></span>--}}
                                            {{--<span class="post-comment"><i class="fa fa-comments"></i> <a href="#">3 Comments</a></span>--}}
                                        {{--</div>--}}
                                    </div>
                                </header>
                                <div class="entry-content clearfix">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <figure class="featured-image">
                                                <a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}">
                                                    <div class="post-date-info clearfix"><span class="post-month">{{ strtoupper(date('M', $event->time_start)) }}</span><span class="post-date">{{ date('j', $event->time_start) }}</span><span class="post-year">{{ date('Y', $event->time_start) }}</span></div>
                                                    <img src="{{ $event->cover_image }}" class="img-responsive" alt="featured-image" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="excerpt">
                                                <p>{!! str_limit($event->description->text, 170) !!}</p>
                                                @if (!empty($event->time_start) && !empty($event->time_end))
                                                    <p><i class="fa fa-clock-o"></i> {{ date("D, d M Y g:iA", intval($event->time_start)) }} - {{ date("D, d M Y g:iA", intval($event->time_end) ) }}</p>
                                                @elseif (!empty($event->time_start) && empty($event->time_end))
                                                    <p><i class="fa fa-clock-o"></i> {{ date("D, d M Y g:iA", intval($event->time_start)) }}</p>
                                                @else
                                                    <p><i class="fa fa-clock-o"></i>TBD</p>
                                                @endif

                                                @if (!empty($event->venue->formatted_address) && !empty($event->venue->name))
                                                    <p><i class="fa fa-map-marker"></i> {{ $event->venue->name }} <br> {{ $event->venue->formatted_address }}</p>
                                                @elseif(!empty($event->venue->formatted_address))
                                                    <p><i class="fa fa-map-marker"></i> {{ $event->venue->formatted_address }}</p>
                                                @else
                                                    <p><i class="fa fa-map-marker"></i></p>
                                                @endif
                                                <p class="read-more">
                                                    <a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}" class="btn btn-primary">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- end blog post -->
                            <hr />
                        @endforeach
                    @endif
                </div>
                <!-- END BLOG ENTRIES -->
            </div>
            <div class="col-md-3">
                @include('partials.socialMediaTabs')
            </div>
        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END PAGE CONTENT -->
@endsection

@section('javascript')
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
@stop