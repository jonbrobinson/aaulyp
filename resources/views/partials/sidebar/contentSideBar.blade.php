<!-- tabbed content -->
<div class="widget">
    <div class="pull-right">
        @if ($signedIn)
            <a href="/events/create" class="btn btn-primary">CREATE EVENT</a>
        @endif
    </div>
    <div class="clearfix"></div>
    <div class="tabpanel">
        <!-- nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#content-popular" aria-controls="content-popular" role="tab" data-toggle="tab">FEATURED</a></li>
            {{--<li role="presentation"><a href="#content-recents" aria-controls="content-recents" role="tab" data-toggle="tab">RECAPS</a></li>--}}
            <li role="presentation"><a href="#content-recent-comments" aria-controls="content-recent-comments" role="tab" data-toggle="tab"><i class="fa fa-twitter"></i></a></li>
        </ul>
        <!-- end nav tabs -->
        <!-- tab panes -->
        <div class="tab-content">
            <div id="content-popular" class="tab-pane fade in active" role="tabpanel">
                @if (!$eventsFeatured)
                    <ul class="list-unstyled blogposts latest">
                        <li>
                            <h4 class="post-title"><a href="#">Coming Soon</a></h4>
                        </li>
                    </ul>
                @else
                    <ul class="list-unstyled blogposts latest">
                        @foreach($eventsFeatured as $feature)
                            <li>
                                <h4 class="post-title"><a href="#">{{ $feature->name }}</a></h4>
                                <span class="text-muted">{{ date('M j, Y', $feature->date_start) }} | by {{ $feature->user->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{--<div id="content-recents" class="tab-pane fade" role="tabpanel">--}}
                {{--@if (!$eventsFeatured)--}}
                    {{--<ul class="list-unstyled blogposts latest">--}}
                        {{--<li>--}}
                            {{--<h4 class="post-title"><a href="#">Coming Soon</a></h4>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--@else--}}
                    {{--<ul class="list-unstyled blogposts latest">--}}
                        {{--@foreach($eventsFeatured as $feature)--}}
                            {{--<li>--}}
                                {{--<h4 class="post-title"><a href="#">{{ $feature->name }}</a></h4>--}}
                                {{--<span class="text-muted">{{ date('M j, Y', $feature->date_start) }} | by </span>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div id="content-recent-comments" class="tab-pane fade" role="tabpanel">
                <a class="twitter-timeline" href="https://twitter.com/AAULYP" data-widget-id="730989146307600386">Tweets by @AAULYP</a>
            </div>
        </div>
        <!-- end tab panes -->
    </div>
</div>
<!-- end tabbed content -->