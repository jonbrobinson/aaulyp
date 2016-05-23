@extends('layouts.master')

@section('content')
<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">Events</h1>
        <ol class="breadcrumb">
            <li><a href="#">Events</a></li>
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
                    @if(count($events) == 0)
                        <h1>We are planning some great opportunites. Please check back later to see some of the great events </h1>
                    @else
                        <!-- blog post -->
                        @foreach($events as $event)
                            <article class="entry-post">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="{{ action('EventsController@show', ['zip' => $event->zip, 'name' => str_slug($event->name)]) }}">{{ $event->name }}</a>
                                    </h2>
                                    <div class="meta-line clearfix">
                                        <div class="meta-author-category pull-left">
                                            <span class="post-author">by <a href="#">{{ $event->user->name }}</a></span>
                                            {{--<span class="post-category">In: <a href="#">Business</a>, <a href="#">Creative</a>, <a href="#">Media</a></span>--}}
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
                                                <a href="blog-single.html">
                                                    <div class="post-date-info clearfix"><span class="post-month">{{ strtoupper(date('M', $event->date_start)) }}</span><span class="post-date">{{ date('j', $event->date_start) }}</span><span class="post-year">{{ date('Y', $event->date_start) }}</span></div>
                                                    <img src="assets/img/blog/buildings-med.jpg" class="img-responsive" alt="featured-image" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="excerpt">
                                                <p>{!! str_limit($event->description, 170) !!}</p>
                                                <p><i class="fa fa-clock-o"></i> {{ date("D, d M Y g:iA", $event->date_start) }} - {{ date("D, d M Y g:iA", $event->date_end) }}</p>
                                                <p><i class="fa fa-map-marker"></i> {{ $event->street }} {{ $event->city }}, {{ $event->state }} {{ $event->zip }}</p>
                                                <p class="read-more">
                                                    <a href="{{ action('EventsController@show', ['zip' => $event->zip, 'name' => str_slug($event->name)]) }}" class="btn btn-primary">Read More <i class="fa fa-long-arrow-right"></i></a>
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
                <!-- SIDEBAR -->
                @if (count($eventsFeatured) > 0)
                    @include('partials.sidebar.contentSideBar', ['events' => $events, 'eventsFeatured' => $eventsFeatured])
                @else
                    <a class="twitter-timeline" href="https://twitter.com/AAULYP" data-widget-id="731769931243495424">Tweets by @AAULYP</a>
                @endif
                    <!-- end tags -->
                <!-- END SIDEBAR -->
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
@endsection

@section('javascript')
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
@stop