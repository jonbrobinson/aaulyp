@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- HERO UNIT -->
    <section class="hero-unit-slider no-margin">
        <div id="carousel-hero" class="slick-carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <img class="img-responsive" src="{{ asset("assets/img/aaulyp/slider_1920x500/slider2-h500-new.png") }}" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">JOIN THE MOVEMENT</h2>
                        <p class="lead">Be a part of the change to empower lives</p>
                        <a href="{{ url('join') }}" class="btn btn-lg hero-button">JOIN NOW</a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="{{ asset("assets/img/aaulyp/slider_1920x500/slider3-h500-new.png") }}" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">BUILD RELATIONSHIPS</h2>
                        <p class="lead">We are looking for more young professionals</p>
                        <a href="{{ url('join') }}" class="btn btn-lg hero-button">JOIN NOW</a>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="{{ asset("assets/img/aaulyp/slider_1920x500/slider1-h500-new.png") }}" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">SUPPORT YOUR COMMUNITY</h2>
                        <p class="lead">Together we build stronger neighborheads</p>
                        <a href="{{ url('join') }}" class="btn btn-lg hero-button">JOIN NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO UNIT -->
    <!-- MAIN FEATURES -->
    <div class="main-features">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    {{--<i class="fa fa-cubes"></i>--}}
                    {{--<h3 class="feature-heading">LEADERSHIP FOUNDATION</h3>--}}
                    <h3 class="feature-heading">PROFESSIONAL DEVELOPMENT</h3>
                </div>
                <div class="col-md-3 col-sm-6">
                    {{--<i class="fa fa-globe"></i>--}}
                    {{--<h3 class="feature-heading">PASSIONATE SERVICE</h3>--}}
                    <h3 class="feature-heading">FINANCIAL LITERACY</h3>
                </div>
                <div class="col-md-3 col-sm-6">
                    {{--<i class="fa fa-refresh"></i>--}}
                    {{--<h3 class="feature-heading">DYNAMIC CHANGE</h3>--}}
                    <h3 class="feature-heading">YOUTH EMPOWERMENT</h3>
                </div>
                <div class="col-md-3 col-sm-6">
                    {{--<i class="fa fa-rocket"></i>--}}
                    {{--<h3 class="feature-heading">CAREER DEVELOPMENT</h3>--}}
                    <h3 class="feature-heading">CIVIC ENGAGEMENT</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN FEATURES -->
    <!-- INTRO -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-heading">HOW CAN WE HELP</h2>
                    <p class="lead">The Austin Area Urban League Young Professionals (AAULYP) is a service auxiliary to the Austin Area Urban League.  We support the mission of our host affiliate by providing opportunities for young professionals to get involved in a national movement in a local and tangible way.  We are advocates for the amazing work of the Austin Area Urban League, and we are committed to carrying on its legacy of empowering residents in the Greater Austin Area and changing lives.</p>
                    <p>AAULYP is devoted to community engagement, professional development, fund-raising, and supporting historically underrepresented businesses.  We also provide the resources for both dynamic dialogue and innovative programing focused on addressing economic and social marginalization.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset("/assets/img/aaulyp/800x550/800x550.jpg") }}" class="img-responsive" alt="Image Intro">
                </div>
            </div>
        </div>
    </section>
    <!-- END INTRO -->
    <!-- BOXED CONTENT -->
    <!-- END BOXED CONTENT -->
    @if(!empty($events))
    <!-- RECENT WORKS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12 row">
                        <h2 class="section-heading pull-left"><a href="{{ url('/events') }}">UPCOMING EVENTS</a></h2>
                    </div>
                    @if(count($events) >= 1)
                    <div class="row">
                        @foreach($events as $index => $event)
                            @if($index <= 1)
                                <div class="col-md-6">
                                    <div class="">
                                        <a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}"><img src="{{ $event->cover_image }}" alt="" class="img-responsive"></a>
                                    </div>
                                    <h4 class="post-title"><a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}">{{ $event->title->text }}</a></h4>
                                    <h5 class="text-muted">{{ date('M j, Y', $event->time_start) }} | {{  date('g:iA', $event->time_start) }} - {{  date('g:iA', $event->time_end) }}</h5>
                                    <h5>{{ $event->venue->display or "" }}</h5>
                                    <p>{!! str_limit($event->description->text, 150) !!}<a href="{{ url("/events/$event->id".str_limit($event->platform, 2, "")) }}">SEE DETAILS</a></p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @else
                        <div class="col-md-12 row">
                            <h3>We are planning some great opportunities. Please check back later to see some of the activities we have planned</h3>
                            <h3>Please follow us on social media @AAULYP to keep up to date with our latest updates.</h3>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @include('partials.socialMediaTabs')
                </div>
            </div>
        </div>
    </section>
    @else
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-group"></i>
                        <h2 class="boxed-content-title">PROFESSIONAL DEVELOPMENT</h2>
                        <p>We encourage our members to become leaders within Austin and surrounding cities by building skills </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-graduation-cap"></i>
                        <h2 class="boxed-content-title">EDUCATION AND YOUTH EMPOWERMENT</h2>
                        <p>We are committed to mentoring and educating youth to help grow their opportunities for future accomplishments</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-money"></i>
                        <h2 class="boxed-content-title">FINANCIAL LITERACY</h2>
                        <p>Our network connects young professionals from across the nation to vast communities within Austin professions and companies.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-gavel"></i>
                        <h2 class="boxed-content-title">CIVIC ENGAGEMENT</h2>
                        <p>Our members are educated, dedicated, and committed to helping the community get involved in their politician and social movements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="recent-works">
        <div class="container">
            <h2 class="section-heading pull-left">GET INVOLVED</h2>
            <a href="{{ url('/join') }}" class="btn btn-primary pull-right">Join AAULYP</a>
            <div class="clearfix"></div>
            <div class="portfolio-static">
                <div class="row">
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <div class="overlay"></div>
                            <div class="info">
                                <h4 class="title">Network In Service</h4>
                                <p class="brief-description">We collaborate with other YP chapters in Texas and participate in national initiatives and conferences</p>
                                <a href="{{ url('committee/membership') }}" class="btn">See Membership & Social Committee</a>
                            </div>
                            <div class="media-wrapper">
                                <img src="{{ asset('assets/img/aaulyp/yp_weekend_group.png') }}" alt="TX YP Weekend" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <div class="overlay"></div>
                            <div class="info">
                                <h4 class="title">Acts of Service</h4>
                                <p class="brief-description">YP's are always involved through community service. From food banks to school campus cleanups, each year there are a variety of service efforts we get involved with.</p>
                                <a href="{{ url('committee/community') }}" class="btn">See Community Outreach Committee</a>
                            </div>
                            <div class="media-wrapper">
                                <img src="{{ asset("assets/img/aaulyp/yp_food_drive800x500.png") }}" alt="Item Thumbnail" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <div class="overlay"></div>
                            <div class="info">
                                <h4 class="title">Advocacy</h4>
                                <p class="brief-description">We host voter registration events, promote discussions on local policies and community action initiatives</p>
                                <a href="{{ url('committee/political') }}" class="btn">See Advocacy Committee</a>
                            </div>
                            <div class="media-wrapper">
                                <img src="{{ asset("assets/img/aaulyp/voterRegistration_800x500.jpg") }}" alt="Item Thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- OUR CLIENTS -->
    <section class="clients">
        <div class="container">
            <h2 class="section-heading">AAULYP WOULD LIKE TO THANK OUR AFFILIATE AND PARTNERS</h2>
            <ul class="list-inline list-client-logo">
                <li>
                    <a href="#"><img src="{{ asset('assets/img/aaul/aaul_h80.png') }}" alt="Capitol Metro"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/img/clients/Dell_Logo_80x80.png') }}" alt="Dell"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/img/clients/aayouthHarvestFoundation_135x80.png') }}" alt="Youth Harvest Foundation"></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/img/clients/CityOfAustin_80x80.png') }}" alt="City of Austin"></a>
                </li>

                <li>
                    <a href="#"><img src="{{ asset('assets/img/clients/Huston-tilotson_255x80.png') }}" alt="Houston Tillotson"></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- END OUR CLIENTS -->
    <!-- CALL-TO-ACTION -->
    <section class="call-to-action">
        <div class="container">
            <div class="pull-left">
                <h2 class="section-heading">GET IN TOUCH</h2>
            </div>
            <div class="pull-right">
                &nbsp;&nbsp;<a href="/contact" class="btn btn-lg btn-primary">CONTACT US</a>
            </div>
        </div>
    </section>
        <!-- END CALL-TO-ACTION -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@endsection

@section('javascript')
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
@stop