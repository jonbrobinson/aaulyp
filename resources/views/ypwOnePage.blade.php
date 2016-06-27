<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

    <title>AAULYP - TEXAS YP WEEKEND</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Join the Austin Area Urban League Young Professionals as we host our fellow chapters from Dallas & Houston, right here in #ATX! You don't want to miss this one-of-a-kind weekend, filled with opportunities to network, socialize, & serve with young professionals from all over TX!">
    <meta name="author" content="Austin Area Urban League Young Professionals">

    <!-- viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <!-- CSS -->
    <link rel="stylesheet" href="one-page-assets/css/bootstrap.css">
    <link rel="stylesheet" href="one-page-assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="one-page-assets/css/jquery.countdown.css">
    <link rel="stylesheet" href="one-page-assets/css/magnific-popup.css">
    <link rel="stylesheet" href="one-page-assets/css/flipCard.css">
    <link rel="stylesheet" href="one-page-assets/css/owl.carousel.css">
    <link rel="stylesheet" href="one-page-assets/css/owl.theme.css">

    <link rel="stylesheet" href="one-page-assets/css/main.css">
    <link rel="stylesheet" href="one-page-assets/css/color/custom_red.css"><!-- Choose your color, green, blue, yellow, red, darkblue, purple -->
    <link rel="stylesheet" href="one-page-assets/css/custom.css">


    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Economica:400,700' rel='stylesheet' type='text/css'>

    <!-- FAVICONS -->
    @include('partials.favicon')


</head>

<body>

<!-- PRELOADING  -->
<div id="preload">
    <div class="preload">
        <div class="loader">
            Loading...
        </div>
    </div>
</div>

<!-- NAVIGATION -->
<nav class="navbar navbar-fixed-top navbar-custom" role="navigation">
    <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
    <div class="container">
        <div data-scroll-header class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/ypweekend2016"><img src="one-page-assets/img/logo_yp_v3.png" alt="logo"></a>
        </div>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="nav navbar-nav navbar-right uppercase">
                <li><a data-scroll href="#overview">overview</a></li>
                {{--<li><a data-scroll href="#speakers">Speakers</a></li>--}}
                <li><a data-scroll href="#schedule">Schedule</a></li>
                <li><a data-scroll href="#venue">Accommodations</a></li>
                {{--<li><a data-scroll href="#sponsors">Sponsors</a></li>--}}
                <li><a data-scroll href="#faq-gallery">FAQ</a></li>
                <li><a data-scroll href="#register">Pricing</a></li>
                <li><a data-scroll href="#contact">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<!-- TOP -->
<section id="top" data-stellar-background-ratio="0.5">
    <div class="countdown">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h1 class="uppercase">Texas YP Weekend</h1>
                    <h3>July 8-10, 2016 in Austin, TX</h3>
                </div>

                <div class="col-md-4 col-lg-4 col-md-offset-4 text-center">
                    <div id="countdown"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OVERVIEW -->
<section id="overview">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <i class="fa fa-4x fa-globe"></i>
                <h2 class="uppercase">about YP weekend</h2>
                <p class="lead">Join us for the 5th Annual TX YP Weekend, hosted by the Austin Area Urban League Young Professionals and sponsored by all three Texas chapters, including the Houston Area Urban League Young Professionals and the Greater Dallas League of Young Professionals.</p>
            </div>


            <!-- MILESTONE -->
            <div id="milestone">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="row">

                        <div class="fact col-xs-6 col-md-3 col-lg-3">
                            <p style="font-size: larger"><span class="timer" data-to="100" data-speed="5000"></span>+</p>
                            <i class="fa fa-2x fa-users"></i>
                            <p>YP's</p>

                        </div>

                        <div class="fact col-xs-6 col-md-3 col-lg-3">
                            <p style="font-size: larger"><span class="timer" data-to="36" data-speed="5000"></span>+</p>
                            <i class="fa fa-2x fa-clock-o"></i>
                            <p>hours</p>
                        </div>

                        <div class="fact col-xs-6 col-md-3 col-lg-3">
                            <p style="font-size: larger"><span class="timer" data-to="200" data-speed="5000"></span>+</p>
                            <i class="fa fa-2x fa-plug"></i>
                            <p>connections</p>
                        </div>

                        <div class="fact col-xs-6 col-md-3 col-lg-3">
                            <p style="font-size: larger"><span class="timer" data-to="300" data-speed="5000"></span>+</p>
                            <i class="fa fa-2x fa-power-off"></i>
                            <p>memories</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-lg-offset-2 text-center">
                {{--<h3>Hurry Up! Only <span class="timer" data-from="575" data-to="198" data-speed="3000"></span> seats</h3>--}}
                <a class="button button-big button-dark" data-scroll href="#register">tickets</a>
            </div>

        </div>
    </div>
</section>

{{--<!-- SPEAKERS -->--}}
{{--<section id="speakers">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-10 col-lg-offset-1">--}}
                {{--<h2 class="uppercase text-center">speakers</h2>--}}

                {{--<div class="row">--}}

                    {{--<!-- speaker 1 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker1.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Bryan Spencer</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Bryan Spencer</h4>--}}
                        {{--<span class="title">Interdum Co.</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 2 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker2.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Susan Robertson</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Susan Robertson</h4>--}}
                        {{--<span class="title">Sollicitudin.com</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 3 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker3.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Joann Foster</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Joann Foster</h4>--}}
                        {{--<span class="title">Founder, PULV</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 4 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker4.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Leo Davis</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Leo Davis</h4>--}}
                        {{--<span class="title">fermentum.net</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 5 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker5.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Jayden Hawkins</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Jayden Hawkins</h4>--}}
                        {{--<span class="title">Faucibus Co.</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 6 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker6.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Danielle Grant</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Danielle Grant</h4>--}}
                        {{--<span class="title">Etiam</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 7 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker7.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Ruben Bennett</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Ruben Bennett</h4>--}}
                        {{--<span class="title">Lobortis Lab</span>--}}
                    {{--</div>--}}

                    {{--<!-- speaker 8 -->--}}
                    {{--<div class="speaker col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
                        {{--<figure>--}}
                            {{--<img class="img-responsive" src="one-page-assets/img/speaker8.png" alt="">--}}
                            {{--<figcaption>--}}
                                {{--<h4>Jennifer Berry</h4>--}}
                                {{--<p>Aliquam ut laoreet velit. Proin orci est, vulputate aliquam eu, tincidunt laoreet lorem.</p>--}}
                                {{--<a class="speaker-detail" href="speaker-detail.html"><i class="fa fa-2x fa-external-link"></i></a>--}}
                                {{--<div class="social">--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                                    {{--<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                                {{--</div>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}

                        {{--<h4>Jennifer Berry</h4>--}}
                        {{--<span class="title">Commodo Apps</span>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<!-- SCHEDULE -->
<section id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2 class="uppercase text-center">Schedule</h2>

                <div id="days" class="owl-carousel">
                    <div class="item uppercase">
                        <h4 class="uppercase hidden-xs">friday</h4>
                        <h5>JULY 8</h5>
                    </div>

                    <div class="item uppercase">
                        <h4 class="uppercase hidden-xs">saturday</h4>
                        <h5>JULY 9</h5>
                    </div>

                    <div class="item uppercase">
                        <h4 class="uppercase hidden-xs">sunday</h4>
                        <h5>JULY 10</h5>
                    </div>
                </div>

                <div id="timetable" class="owl-carousel owl-theme">

                    <!-- DAY 1 -->
                    <div id="day1" class="item">

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-clock-o"></i>
                                    <span class="time schedule-font">7.00 PM - 9:00 PM</span>
                                </div>

                                <div class="description">
                                    <h3>Check In | Welcome Mixer</h3>
                                    <p>Apanas Coffee (Formally Two Hands Coffee)</p>
                                    <p>We're kicking Off Texas YP Weekend in one of Austins hottest new nightlife destinations, Rock Rose, located in the Domain</p>
                                    <p>Grab a drink, listen to some tunes, meet and greet some of the awesome YP's coming down for the weekend. Get some Weekend details and get settled as we prepare for a weekend of activities.</p>
                                    <span class="name">NORTH AUSTIN</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DAY 2 -->
                    <div id="day2" class="item">

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-clock-o"></i>
                                    <span class="time schedule-font">09.00 AM</span>
                                </div>

                                <div class="description">
                                    <h3>Service Activity</h3>
                                    <p>School is out for the Summer and we're going to help a few local schools get ready for their upcoming year. Join us for some great service activities that will make an impact on the Austin youth.</p>
                                    <span class="name">DOWNTOWN AUSTIN</span>
                                </div>
                            </div>
                        </div>

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-cutlery"></i>
                                    <span class="time schedule-font">12.30 PM</span>
                                </div>

                                <div class="description">
                                    <h3>Lunch</h3>
                                    <span class="name">EAST AUSTIN</span>
                                </div>
                            </div>
                        </div>

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-anchor"></i>
                                    <span class="time schedule-font">6.00PM - 10.00PM</span>
                                </div>

                                <div class="description">
                                    <h3>The OASIS on Lake Travis</h3>
                                    <p>Come experience the best views in Austin, eat good food, and make lasting connections all while grooving to one of Austin's best DJ's.</p>
                                    <span class="name">WEST AUSTIN</span>
                                </div>
                            </div>
                        </div>

                        {{--<div class="event">--}}
                            {{--<div class="event-inner">--}}
                                {{--<div class="icon">--}}
                                    {{--<i class="fa fa-2x fa-clock-o"></i>--}}
                                    {{--<span class="time">10.30 PM</span>--}}
                                {{--</div>--}}

                                {{--<div class="description">--}}
                                    {{--<h3>Night Out Downtown</h3>--}}
                                    {{--<p>Music, food, persolatily defines Austin Downtown, If you are not to tired come out as we explore some of the dowtown late night scene.</p>--}}
                                    {{--<span class="name">DOWNTOWN AUSTIN</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>

                    <!-- DAY 3 -->
                    <div id="day3" class="item">

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-cutlery"></i>
                                    <span class="time schedule-font">10.30AM - 2.30PM</span>
                                </div>

                                <div class="description">
                                    <h3>YP BRUNCH | Max's Wine Dive</h3>
                                    <p>Max's Wine Dive is consistently ranked as one of the top brunch locations in Austin. Don't miss out! We'll be enjoying Max's famous "gourmet comfort food" for our sunday affair.</p>
                                    <span class="name">DOWNTOWN AUSTIN</span>
                                </div>
                            </div>
                        </div>

                        <div class="event">
                            <div class="event-inner">
                                <div class="icon">
                                    <i class="fa fa-2x fa-clock-o"></i>
                                    <span class="time schedule-font">12.00PM</span>
                                </div>

                                <div class="description">
                                    <div class="row">
                                        <h3>FEATURED SPEAKER  - PATRICK FELDER</h3>
                                        <div class="col-md-3">
                                            <img src="one-page-assets/img/pf_headshot_h200.png" alt="" class="img-responsive">
                                        </div>
                                        <div class="col-md-9">
                                            <p>Patrick currently serves and the human resources business partner for the Global Services and Deployment business at Dell Inc.  Patrick Felder is responsible for providing human resources support for ~17,000 team members globally.    During his tenure at Dell, he has held roles in Talent Acquisition and as an HR Generalist supporting a wide variety of client groups from technical support to marketing.</p>
                                        </div>
                                    </div>
                                    <span class="name">DOWNTOWN AUSTIN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VENUE -->
<section id="venue">
    <div class="venue">
        <div class="container">
            <div class="row">
                <div class="venue-address">
                    <h2 class="uppercase">aloft | domain</h2>
                    <p>YP WEEKEND SPECIAL has officially ended but let <br> the front desk know you are booking a room for<br>Texas YP Weekend to see if they have other specials. <br>Take advantage of some great lodging in one of <br>Austin's exciting new neighborhoods and <br>Domain shopping centers.

                    <p class="address">
                        <i class="fa fa-2x fa-map-marker fa-inverse"></i>
                        11601 Domain Drive Austin,<br>
                        TX, 78758
                    </p>

                    <a class="button button-light" href="http://www.aloftaustinatthedomain.com/">BOOK ROOM</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Alternative Accommodation Options</h3>
            </div>

            <div class="col-md-4 col-lg-4">
                <img src="one-page-assets/img/airbnb_horizontal_lockup_web.png" alt="">
                <p>Airbnb is a trusted community marketplace for people to list, discover, and book unique accommodations around the world. Austin has a variety of listings.  There are some great listings in east Austin and in the barton springs area that will keep you at the center of everything.</p>
                <a href="http://www.airbnb.com" class="button  button-dark">search AirBnB Listings</a>
            </div>

            <div class="col-md-4 col-lg-4">
                <br>
                <i class="fa fa-3x fa-building-o"></i>
                <h4 style="margin-bottom: 24px;">Downtown Hotel</h4>
                <p>Downtown offers a great variety of attractions and capitol city culture of the city. The great thing about being downtown is that you are in the heart of the city and have a variety of options within walking distance from your rental. Take a look at some alternative options.</p>
                <a href="https://www.hotels.com" class="button button-dark">search Hotel Listings</a>
            </div>

            <div class="col-md-4 col-lg-4">
                <img src="one-page-assets/img/homeaway-inc-logo.png" alt="">
                <p>HomeAway® offers an extensive selection of vacation rental homes that provide travelers with memorable experiences and benefits, especially more room to relax, for less than the cost of traditional hotel accommodations.  If you have a group of friends of YP's and want more of a home feel for the weekend we recommend.</p>
                <a href="https://www.homeaway.com" class="button button-dark">search HomeAway Listings</a>
            </div>
        </div>
    </div>

</section>

<!-- TESTIMONIAL -->
<section id="testimonial" >
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div id="quote" class="owl-carousel owl-theme">

                    <div class="item text-center">
                        <img class="img-circle" src="one-page-assets/img/yp_testimonial1.png" alt="">
                        <div>
                            <p>I would like to personally invite our Texas YP Family to attend the 5th Annual YP Weekend, held in Austin, TX.  Come experience an Austin culture, give back, share ideas and make long lasting connections.</p>
                            <p>--Yours in the Movement</p>

                            <h4 class="uppercase">Omari - President</h4>
                            <h4>Austin Area Urban League Young Professionals</h4>
                            <br>
                        </div>
                    </div>

                    <div class="item text-center">
                        <img class="img-circle" src="one-page-assets/img/yp_testimonial2.png" alt="">
                        <div>
                            <p>We all represent Texas as YP members but we come from all across the US. It's fun making the connections between what city you grew up in, to where you went to college and find others with similar experiences.</p>
                            <h4 class="uppercase">Adesewa</h4>
                        </div>
                    </div>

                    <div class="item text-center">
                        <img class="img-circle" src="one-page-assets/img/yp_testimonial3.png" alt="">
                        <div>
                            <p>It's incredible what a group of YP's can get done when they all work on one project.  Whether it's building homes, sorting food at a food bank, the imapct makes a different because of the individuals willing to help.</p>
                            <h4 class="uppercase">Jade</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- SPONSORS -->
<section id="sponsors">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                {{--<h2 class="uppercase">sponsors</h2>--}}

                {{--<h3 class="uppercase">gold partners</h3>--}}
                {{--<div class="sponsor-slider">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_01.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_02.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_03.png" alt="logo">--}}

                {{--</div>--}}

                <h3 class="uppercase">yp partners</h3>
                <div class="sponsor-slider">
                    <img class="img-responsive" src="one-page-assets/img/Juiceland_h114.png" alt="Juiceland">
                    <img class="img-responsive" src="one-page-assets/img/Beanitos_h114.jpg" alt="Beanitos">
                    <img class="img-responsive" src="one-page-assets/img/ufcu_h114.jpg" alt="University Federal Credit Union">
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_06.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_07.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_08.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_09.png" alt="logo">--}}
                </div>

                {{--<h3 class="uppercase">yp partners</h3>--}}
                {{--<div class="sponsor-slider">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_10.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_11.png" alt="logo">--}}
                    {{--<img class="img-responsive" src="one-page-assets/img/logo_12.png" alt="logo">--}}
                {{--</div>--}}

                {{--<p class="lead uppercase">Become a sponsor</p>--}}
                {{--<p>Interested in becoming a sponsor? Learn about opportunities and benefits.</p>--}}
                {{--<a class="button button-dark" href="#">request info</a>--}}
            </div>


        </div>
    </div>
</section>

{{--<!-- SUBSCRIBE -->--}}
{{--<div id="subscribe">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-8 col-lg-offset-2">--}}
                {{--<h3 class="text-center">Be the first to get nearly updates--}}
                {{--</h3>--}}

                {{--<div class="row">--}}
                    {{--<div class="col-lg-9">--}}
                        {{--<input type="email" id="newsletter_email">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3">--}}
                        {{--<button class="button button-big button-light" onclick="newsletter_send();">subscribe</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- FAQ and GALLERY -->
<section id="faq-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="panel-group" id="faq">
                    <h3 class="uppercase">faq</h3>
                    <p>We're here to help answer questions</p>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#faq" href="#collapseThree" class="collapsed">
                                    <i class="fa fa-2x fa-plus-circle"></i>
                                    Is Texas YP Weekend a members only event?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="small">No. YP Weekend is for anyone who wants to serve, network, and celebrate being a young professionals in Texas. Get your ticket and let's make an even greater impact.</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#faq" href="#collapseOne" class="collapsed">
                                    <i class="fa fa-2x fa-plus-circle"></i> Did Uber and Lyft Leave Austin?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p class="small">Yes. On Mon May 9th 2016, Uber and Lyft suspended their respective ridesharing services. However here is a list of alternative ridesharing apps that are working in Austin.</p>
                                <a href="http://www.bizjournals.com/austin/blog/techflash/2016/06/the-complete-field-guide-to-austins-ridesharing.html?ana=fbk" class="button button-dark">see article</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#faq" href="#collapseTwo" class="collapsed">
                                    <i class="fa fa-2x fa-plus-circle"></i> Can I buy tickets to the Saturday Night Party only?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="small">Yes. Please take a look at our <a href="#register" class="yp_red">Pricing</a> model for more details.</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#faq" href="#collapseFour" class="collapsed">
                                    <i class="fa fa-2x fa-plus-circle"></i> Where is a good place to eat in Austin
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="small"> What's great about Austin is that good food can be found around the city.  Too keep it simple, Austin is known for BBQ, TACOS and FUSION FOOD TRUCKS.  Here are a couple resources to help find some great food around town</p>
                                <ul>
                                    <li><a href="http://austin.eater.com/" class="yp_red">Austin Eater</a></li>
                                    <li><a href="http://roaminghunger.com/aus/vendors/" class="yp_red">Food Truck Locator</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h4 class="panel-title">--}}
                                {{--<a data-toggle="collapse" data-parent="#faq" href="#collapseFive" class="collapsed">--}}
                                    {{--<i class="fa fa-2x fa-plus-circle"></i> Nulla quis adipiscing nisi--}}
                                {{--</a>--}}
                            {{--</h4>--}}
                        {{--</div>--}}
                        {{--<div id="collapseFive" class="panel-collapse collapse">--}}
                            {{--<div class="panel-body">--}}
                                {{--<p class="small">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div id="gallery">
                    <h3>Past YP Weekend photos</h3>
                    <p>Take a look at some previous photos</p>
                    <div class="row">
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_001.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_001.jpg" alt=""></a>
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_002.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_002.jpg" alt=""></a>
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_003.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_003.jpg" alt=""></a>
                    </div>
                    <div class="row">
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_004.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_004.jpg" alt=""></a>
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_005.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_005.jpg" alt=""></a>
                        <a class="image-link col-md-4 col-lg-4" href="one-page-assets/img/past/ypw_past_006.jpg"><img class="img-responsive" src="one-page-assets/img/past/tn-ypw_past_006.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- REGISTER -->
<section id="register">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="uppercase">pricing</h2>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card-container">
                    <div class="card click price-table" data-direction="right">
                        <!-- front -->
                        <div class="front price-table-header">
                            <p class="price">$30</p>
                            <p class="title">Max's Wine Dive Brunch*</p>
                            <p>Single Event</p>
                        </div>

                        <!-- back -->
                        <div class="back">
                            <ul class="price-table-description">
                                <li class="description-item">Sunday Brunch Only</li>
                                <li class="description-item">*Excludes Saturday</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card-container">
                    <div class="card click price-table" data-direction="right">
                        <!-- front -->
                        <div class="front price-table-header">
                            <p class="price">$40</p>
                            <p class="title">OASIS on the Lake*</p><br>
                            <p>Single Event</p>
                        </div>

                        <!-- back -->
                        <div class="back">
                            <ul class="price-table-description">
                                <li class="description-item">YP Weekend Party Only</li>
                                <li class="description-item">*Excludes Sunday Brunch</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card-container">
                    <div class="card click price-table" data-direction="right">
                        <!-- front -->
                        <div class="front price-table-header">
                            <p class="price strike-through">$50</p>
                            <p class="title strike-through">Early Bird</p><br>
                            <p>Sale Ended</p>
                        </div>

                        <!-- back -->
                        <div class="back">
                            <ul class="price-table-description">
                                <li class="description-item">Sat Lunch</li>
                                <li class="description-item stripe">Ticket to Saturday Night Party</li>
                                <li class="description-item">Brunch</li>
                                <li class="description-item stripe ">YP Weekend T-Shirt</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card-container">
                    <div class="card click price-table" data-direction="right">
                        <!-- front -->
                        <div class="front price-table-header">
                            <p class="price">$65</p>
                            <p class="title">Regular</p><br>
                            <p>Includes All Weekend</p>
                        </div>

                        <!-- back -->
                        <div class="back">
                            <ul class="price-table-description">
                                <li class="description-item">Sat Lunch</li>
                                <li class="description-item stripe">Ticket to Saturday Night Party</li>
                                <li class="description-item">Brunch</li>
                                <li class="description-item stripe ">YP Weekend T-Shirt</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <br>
                <br>
                {{--<p class="lead">Hurry Up! Only <span class="timer" data-from="500" data-to="150" data-speed="5000"></span> seats</p>--}}
                <a class="button button-big button-light" href="https://www.eventbrite.com/e/texas-yp-weekend-2016-tickets-25893386817">get tickets</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">

    <!-- map -->
    <div id="gmap_canvas"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="contact">
                    <h2 class="uppercase">contact</h2>
                    <p>Austin Area Urban League Headquarters are located in Northeast Austin. </p>

                    <p class="address">
                        8011A Cameron Rd, Austin, TX 78754<br><br>
                    </p>

                    <p>Still have questions?</p>
                    <p>Please reach out to us via email <a href="mailto:pr.aaulyp@gmail.com" style="color: white;">pr.aaulyp@gmail.com</a> to help answer any questions we may have missed.  See you JULY 8th!</p>

                    <div class="social">
                        <a href="http://www.twitter.com/aaulyp">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>

                        <a href="http://www.facebook.com/aaulyp">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>

                        <a href="http://www.instagram.com/aaulyp">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- modernizr -->
<script src="one-page-assets/js/modernizr.custom.00695.js"></script>

<script src="one-page-assets/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="one-page-assets/js/bootstrap.min.js"></script>
<script src="one-page-assets/js/jquery.countdown.js"></script>
<script src="one-page-assets/js/owl.carousel.min.js"></script>
<script src="one-page-assets/js/jquery.magnific-popup.min.js"></script>
<script src="one-page-assets/js/jquery.countTo.js"></script>
<script src="one-page-assets/js/flipCard.js"></script>
<script src="one-page-assets/js/jquery.stellar.min.js"></script>
<script src="one-page-assets/js/smooth-scroll.js"></script>
<script src="one-page-assets/js/retina-1.1.0.min.js"></script>

<script src="one-page-assets/js/main.js"></script>
<script>
    $(document).on('click','.navbar-collapse.in',function(e) {
        if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
            $(this).collapse('hide');
        }
    });
</script>



<!-- GOOGLE ANALYTICS -->
<!-- JAVASCRIPTS -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-78412288-1', 'auto');
    ga('send', 'pageview');

</script>


</body>
</html>
