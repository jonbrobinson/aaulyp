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
                    <!-- blog post -->
                    <article class="entry-post">
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="blog-single.html">Objectively Disseminate Customer Directed E-commerce</a>
                            </h2>
                            <div class="meta-line clearfix">
                                <div class="meta-author-category pull-left">
                                    <span class="post-author">by <a href="#">John Doe</a></span>
                                    <span class="post-category">In: <a href="#">Business</a>, <a href="#">Creative</a>, <a href="#">Media</a></span>
                                </div>
                                <div class="meta-tag-comment pull-right">
                                    <span class="post-tags"><i class="fa fa-twitter"></i> <a href="#">story</a>, <a href="#">inspiration</a>, <a href="#">creative</a></span>
                                    <span class="post-comment"><i class="fa fa-comments"></i> <a href="#">3 Comments</a></span>
                                </div>
                            </div>
                        </header>
                        <div class="entry-content clearfix">
                            <div class="row">
                                <div class="col-sm-5">
                                    <figure class="featured-image">
                                        <a href="blog-single.html">
                                            <div class="post-date-info clearfix"><span class="post-month">DEC</span><span class="post-date">11</span><span class="post-year">2014</span></div>
                                            <img src="assets/img/blog/buildings-med.jpg" class="img-responsive" alt="featured-image" />
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-sm-7">
                                    <div class="excerpt">
                                        <p><h4>Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </h4></p>
                                        <p><h4>Location: </h4></p>
                                        <p class="read-more">
                                            <a href="#" class="btn btn-primary">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- end blog post -->
                    <hr />
                </div>
                <!-- END BLOG ENTRIES -->
            </div>
            <div class="col-md-3">
                <!-- SIDEBAR -->
                <!-- tabbed content -->
                <div class="widget">
                    <div class="tabpanel">
                        <!-- nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#content-popular" aria-controls="content-popular" role="tab" data-toggle="tab">POPULAR</a></li>
                            <li role="presentation"><a href="#content-recents" aria-controls="content-recents" role="tab" data-toggle="tab">RECAPS</a></li>
                        </ul>
                        <!-- end nav tabs -->
                        <!-- tab panes -->
                        <div class="tab-content">
                            <div id="content-popular" class="tab-pane fade in active" role="tabpanel">
                                <ul class="list-unstyled blogposts popular">
                                    {{--<? $post = array(); ?>--}}
                                    {{--@if(count($post) > 0)--}}
                                    <li>
                                        <h4 class="post-title"><a href="#">Monotonectally Underwhelm Sustainable Outsourcing</a></h4>
                                        <span class="text-muted">Nov 4, 2014 | by John Doe</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Seamlessly Repurpose Equity Invested Intellectual Capital</a></h4>
                                        <span class="text-muted">Nov 23, 2014 | by George</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Efficiently Aggregate Multidisciplinary Markets With Professional Functionalities</a></h4>
                                        <span class="text-muted">Nov 9, 2014 | by Jane</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Collaboratively Actualize Revolutionary Total Linkage</a></h4>
                                        <span class="text-muted">Nov 9, 2014 | by Smith</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Credibly Disintermediate Client-centered Applications</a></h4>
                                        <span class="text-muted">Nov 9, 2014 | by Barbara</span>
                                    </li>
                                    {{--@else--}}
                                    <li>
                                        <h4 class="post-title"><a href="#">More Posts Coing son</a></h4>
                                        <span class="text-muted">Nov 4, 2014 | by John Doe</span>
                                    </li>
                                    {{--@endif--}}
                                </ul>
                            </div>
                            <div id="content-recents" class="tab-pane fade" role="tabpanel">
                                <ul class="list-unstyled blogposts latest">
                                    <li>
                                        <h4 class="post-title"><a href="#">Assertively Streamline Error-free Quality</a></h4>
                                        <span class="text-muted">Dec 9, 2014 | by John Doe</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Proactively Monetize Long-term High-impact Architectures After Value-added Experiences</a></h4>
                                        <span class="text-muted">Dec 12, 2014 | by George</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Efficiently Repurpose Enterprise-wide Processes For Granular Applications</a></h4>
                                        <span class="text-muted">Dec 29, 2014 | by Jane</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Monotonectally Underwhelm Sustainable Outsourcing</a></h4>
                                        <span class="text-muted">Nov 4, 2014 | by John Doe</span>
                                    </li>
                                    <li>
                                        <h4 class="post-title"><a href="#">Seamlessly Repurpose Equity Invested Intellectual Capital</a></h4>
                                        <span class="text-muted">Nov 23, 2014 | by George</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end tab panes -->
                    </div>
                </div>
                <!-- end tabbed content -->
                <!-- end tags -->
                <!-- text widget -->
                <div class="widget">
                    <h4 class="widget-title">TEXT WIDGET</h4>
                    <p>Conveniently develop parallel technologies via user-centric benefits. Globally deploy turnkey technologies vis-a-vis excellent partnerships. Completely aggregate one-to-one human capital with principle-centered initiatives. Seamlessly enable web-enabled.</p>
                    <p> Appropriately foster ethical architectures via functional alignments. Holisticly unleash enabled information via customized value. Collaboratively syndicate corporate benefits without process-centric communities.</p>
                </div>
                <!-- end text widget -->
                <!-- END SIDEBAR -->
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
@endsection