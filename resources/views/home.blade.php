@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- HERO UNIT -->
    <section class="hero-unit-slider no-margin">
        <div id="carousel-hero" class="slick-carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="assets/img/aaulyp/yp_collage_bw_bg.jpg" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">CLEAN &amp; ELEGANT DESIGN</h2>
                        <p class="lead">Giving valuable reputation and credibility to your business</p>
                        <a href="#" class="btn btn-lg hero-button">LEARN MORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/img/sliders/slider2-h500.png" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">ULTRA RESPONSIVE</h2>
                        <p class="lead">Leave it to the theme, it knows how to deal with screen sizes</p>
                        <a href="#about" class="btn btn-lg hero-button">LEARN MORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/img/sliders/slider1-h500.png" alt="Slider Image">
                    <div class="carousel-caption">
                        <h2 class="hero-heading">EASY TO CUSTOMIZE</h2>
                        <p class="lead">Readable code, well documented and FREE support</p>
                        <a href="#about" class="btn btn-lg hero-button">LEARN MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO UNIT -->
    <!-- MAIN FEATURES -->
    <div class="main-features ">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6"><i class="fa fa-cubes "></i>
                    <h3 class="feature-heading">STRONG STRUCTURE</h3></div>
                <div class="col-md-3 col-sm-6"><i class="fa fa-globe "></i>
                    <h3 class="feature-heading">GLOBAL SERVICES</h3></div>
                <div class="col-md-3 col-sm-6"><i class="fa fa-refresh "></i>
                    <h3 class="feature-heading">DYNAMIC CHANGE</h3></div>
                <div class="col-md-3 col-sm-6"><i class="fa fa-rocket "></i>
                    <h3 class="feature-heading">EXPONENTIAL GROWTH</h3></div>
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
                    <p class="lead">Our purpose is to empower young profressionals in their communities, and change lives through volunteer activities and civic engagement.</p>
                    <p>Austin Area Urban League Young Professionals are committed to community engagement, improving minority businesses through innovative programming, and dynamic dialogue and professional development.</p>
                    <p>Our activities are characterized by excellence in community service, fund-raising, and dedication to the development of its diverse members to empower communities and change lives through consistent involvement in the community in partnership with the Urban League.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/img/intro-img.png" class="img-responsive" alt="Image Intro">
                </div>
            </div>
        </div>
    </section>
    <!-- END INTRO -->
    <!-- BOXED CONTENT -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-group"></i>
                        <h2 class="boxed-content-title">LEADERSHIP EMPOWERMENT</h2>
                        <p>We encourage our members to become leaders within Austin and surrounding cities by building skills </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-graduation-cap"></i>
                        <h2 class="boxed-content-title">EDUCATION AND YOUTH EMPOWERMENT</h2>
                        <p>We are committed to mentoring and educating youth to help grow their opportunitties for future accomplishments</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-globe"></i>
                        <h2 class="boxed-content-title">ECONOMIC EMPOWERMENT</h2>
                        <p>Our network connects young professionals from across the nation to vast communities within Austin professions and companies.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed-content left-aligned left-boxed-icon">
                        <i class="fa fa-gavel"></i>
                        <h2 class="boxed-content-title">CIVIC ENGAGEMENT</h2>
                        <p>Our members are educated, dedicated, and committed to helping the comminity get involed in their polication and social movements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BOXED CONTENT -->
    {{--<!-- WHY REPUTE -->--}}
    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<h2 class="section-heading sr-only">WHY REPUTE</h2>--}}
            {{--<div class="tab-content">--}}
                {{--<div class="tab-pane fade in active text-center" id="tab-bottom1">--}}
                    {{--<img src="assets/img/hero-unit-obj.png" class="img-responsive center-block margin-bottom-30px" alt="Ultra Responsive">--}}
                    {{--<h3 class="text-accent-color">ULTRA RESPONSIVE</h3>--}}
                    {{--<p class="lead">Phosfluorescently revolutionize viral leadership via turnkey technology. Synergistically monetize intermandated strategic theme areas through multimedia based.</p>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade text-center" id="tab-bottom2">--}}
                    {{--<img src="assets/img/hero-unit-obj3.png" class="img-responsive center-block margin-bottom-30px" alt="Easy to Customize">--}}
                    {{--<h3 class="text-accent-color">IT'S EASY TO CUSTOMIZE</h3>--}}
                    {{--<p class="lead">Efficiently incentivize leading-edge alignments with go forward expertise. Conveniently myocardinate leveraged process improvements through progressive models.</p>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade text-center" id="tab-bottom3">--}}
                    {{--<img src="assets/img/hero-unit-obj.png" class="img-responsive center-block margin-bottom-30px" alt="Clean and Elegant Design">--}}
                    {{--<h3 class="text-accent-color">CLEAN &amp; ELEGANT DESIGN</h3>--}}
                    {{--<p class="lead">Competently implement bricks-and-clicks collaboration and idea-sharing rather than visionary internal or "organic" sources. Rapidiously matrix premium core competencies for.</p>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade text-center" id="tab-bottom4">--}}
                    {{--<img src="assets/img/free.png" class="img-responsive center-block margin-bottom-30px" alt="Free Updates and Support">--}}
                    {{--<h3 class="text-accent-color">GET UPDATES &amp; SUPPORT FOR FREE</h3>--}}
                    {{--<p class="lead">Dramatically supply adaptive imperatives and stand-alone content. Exceptional solutions after web-enabled potentialities. Synergistically negotiate alternative best practices whereas professional "outside the box" thinking.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="custom-tabs-line tabs-line-top">--}}
                {{--<ul class="nav" role="tablist">--}}
                    {{--<li class="active"><a href="#tab-bottom1" role="tab" data-toggle="tab">Responsive</a></li>--}}
                    {{--<li><a href="#tab-bottom2" role="tab" data-toggle="tab">Easy to Customize</a></li>--}}
                    {{--<li><a href="#tab-bottom3" role="tab" data-toggle="tab">Design</a></li>--}}
                    {{--<li><a href="#tab-bottom4" role="tab" data-toggle="tab">Free Updates &amp; Support</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-- END WHY REPUTE -->--}}
    <!-- RECENT WORKS -->
    <section class="recent-works">
        <div class="container">
            <h2 class="section-heading pull-left">RECENT WORKS</h2>
            <a href="#" class="btn btn-primary pull-right">See all works</a>
            <div class="clearfix"></div>
            <div class="portfolio-static">
                <div class="row">
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <div class="overlay"></div>
                            <div class="info">
                                <h4 class="title">Raining</h4>
                                <p class="brief-description">Photography</p>
                                <a href="#" class="btn">read more</a>
                            </div>
                            <div class="media-wrapper">
                                <img src="assets/img/aaulyp/yp_weekend_group.png" alt="Item Thumbnail" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <div class="overlay"></div>
                            <div class="info">
                                <h4 class="title">Perfect Edge</h4>
                                <p class="brief-description">Product Design</p>
                                <a href="#" class="btn">read more</a>
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
                                <h4 class="title">Sunny Day</h4>
                                <p class="brief-description">Photography</p>
                                <a href="#" class="btn">read more</a>
                            </div>
                            <div class="media-wrapper">
                                <img src="assets/img/aaulyp/yp_award800x500.png" alt="Item Thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END RECENT WORKS -->
    {{--<!-- LATEST NEWS -->--}}
    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<h2 class="section-heading">LATEST NEWS</h2>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="news-item news-featured">--}}
                        {{--<a href="#"><img src="assets/img/news/featured-news.png" class="img-responsive" alt="News Thumbnail"></a>--}}
                        {{--<h3 class="news-title"><a href="#">In Demand: Collaboration Skill</a></h3>--}}
                        {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures. Seamlessly predominate interoperable growth strategies.</p>--}}
                        {{--<div class="news-meta">--}}
                            {{--<span class="news-datetime">23-02-2015</span>--}}
                            {{--<span class="news-comment-count pull-right"><a href="#">65 Comments</a></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-8">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="news-item margin-bottom-30px clearfix">--}}
                                {{--<a href="#"><img src="assets/img/news/news1.png" class="img-responsive pull-left" alt="News Thumbnail"></a>--}}
                                {{--<div class="right">--}}
                                    {{--<h3 class="news-title"><a href="#">Growth Strategies We Must Know</a></h3>--}}
                                    {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="news-item margin-bottom-30px clearfix">--}}
                                {{--<a href="#"><img src="assets/img/news/news2.png" class="img-responsive pull-left" alt="News Thumbnail"></a>--}}
                                {{--<div class="right">--}}
                                    {{--<h3 class="news-title"><a href="#">Alternative E-commerce</a></h3>--}}
                                    {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="news-item margin-bottom-30px clearfix">--}}
                                {{--<a href="#"><img src="assets/img/news/news3.png" class="img-responsive pull-left" alt="News Thumbnail"></a>--}}
                                {{--<div class="right">--}}
                                    {{--<h3 class="news-title"><a href="#">Products Research Methodology &amp; Principles </a></h3>--}}
                                    {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="news-item margin-bottom-30px clearfix">--}}
                                {{--<a href="#"><img src="assets/img/news/news4.png" class="img-responsive pull-left" alt="News Thumbnail"></a>--}}
                                {{--<div class="right">--}}
                                    {{--<h3 class="news-title"><a href="#">Understanding Globally Scale Quality Network</a></h3>--}}
                                    {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="news-item margin-bottom-30px clearfix">--}}
                                {{--<a href="#"><img src="assets/img/news/news5.png" class="img-responsive pull-left" alt="News Thumbnail"></a>--}}
                                {{--<div class="right">--}}
                                    {{--<h3 class="news-title"><a href="#">Professional Leverage</a></h3>--}}
                                    {{--<p>Proactively engage orthogonal growth strategies without resource-leveling testing procedures.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<div class="see-all-news">--}}
                                {{--<a href="#">See all news <i class="fa fa-long-arrow-right"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-- END LATEST NEWS -->--}}
    {{--<!-- NUMBERS -->--}}
    {{--<section class="full-width-section no-margin">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-3 col-xs-6">--}}
                    {{--<div class="number-info horizontal text-white-color">--}}
                        {{--<i class="fa fa-plug pull-left"></i>--}}
                        {{--<p>5200 <span>SUBSCRIBERS</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-xs-6">--}}
                    {{--<div class="number-info horizontal text-white-color">--}}
                        {{--<i class="fa fa-cubes pull-left"></i>--}}
                        {{--<p>273 <span>PROJECTS</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-xs-6">--}}
                    {{--<div class="number-info horizontal text-white-color">--}}
                        {{--<i class="fa fa-thumbs-up pull-left"></i>--}}
                        {{--<p>640K <span>APPRECIATIONS</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-xs-6">--}}
                    {{--<div class="number-info horizontal text-white-color">--}}
                        {{--<i class="fa fa-users pull-left"></i>--}}
                        {{--<p>132 <span>CLIENTS</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-- END NUMBERS -->--}}
    {{--<!-- TESTIMONIAL -->--}}
    {{--<section id="testimoial-parallax" class="testimonial-with-bg parallax">--}}
        {{--<div class="container">--}}
            {{--<div class="testimonial slick-carousel">--}}
                {{--<div class="testimonial-container">--}}
                    {{--<div class="testimonial-body">--}}
                        {{--<p>Credibly extend parallel relationships after clicks-and-mortar content. Credibly pontificate team building alignments rather than diverse quality vectors.</p>--}}
                        {{--<div class="testimonial-author">--}}
                            {{--<img src="assets/img/user2.png" alt="Author" class="pull-left">--}}
                            {{--<span><span class="author-name">Antonius</span> <em>CEO of TheCompany</em></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="testimonial-body">--}}
                        {{--<p>Credibly pontificate team building alignments rather than diverse quality vectors. Monotonectally benchmark business communities for distinctive mindshare.</p>--}}
                        {{--<div class="testimonial-author">--}}
                            {{--<img src="assets/img/user1.png" alt="Author" class="pull-left">--}}
                            {{--<span><span class="author-name">Michael</span> <em>General Manager of DreamCorp</em></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="testimonial-body">--}}
                        {{--<p>Appropriately morph low-risk high-yield process improvements through progressive partnerships. Uniquely brand enabled. Globally network timely imperatives without plug-and-play schemas.</p>--}}
                        {{--<div class="testimonial-author">--}}
                            {{--<img src="assets/img/user5.png" alt="Author" class="pull-left">--}}
                            {{--<span><span class="author-name">Palmer</span> <em>Freelance Web Developer</em></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-- END TESTIMONIAL -->--}}
    <!-- OUR CLIENTS -->
    <section class="clients">
        <div class="container">
            <h2 class="section-heading">OUR CLIENTS</h2>
            <ul class="list-inline list-client-logo">
                <li>
                    <a href="#"><img src="assets/img/clients/logo1.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/img/clients/logo2.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/img/clients/logo3.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/img/clients/logo4.png" alt="logo"></a>
                </li>
                <li>
                    <a href="#"><img src="assets/img/clients/logo5.png" alt="logo"></a>
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
                <span>Call us at (1800) 765 - 4321 or</span>&nbsp;&nbsp;<a href="#" class="btn btn-lg btn-primary">CONTACT US</a>
            </div>
        </div>
    </section>
    <!-- END CALL-TO-ACTION -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@endsection