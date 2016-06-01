<!DOCTYPE html>
<html lang="en">

<head>
    <title>Austin Area Urban League Young Professionals</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Bootstrap Business Theme. Giving Valuable Reputation and Credibility To Your Business">
    <meta name="author" content="Jonbrobinson">
    <!-- CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/main-one-page.css" rel="stylesheet" type="text/css">
    <link href="{{ asset("assets/css/my-custom-styles.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset("assets/css/skins/indianred_custom.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset("assets/css/custom.css") }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/soon.css') }}">
    <link href="{{ asset("css/libs.css") }}" rel="stylesheet" type="text/css">

    <!-- IE 9 Fallback-->
    <!--[if IE 9]>
    <link href="assets/css/ie.css" rel="stylesheet">
    <![endif]-->
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,300' rel='stylesheet' type='text/css'>
    <!-- FAVICONS -->
    @include('partials.favicon')
</head>

<body id="top">
<!-- WRAPPER -->
<div class="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header" style="margin-bottom: 20px">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <a href="/" class="navbar-brand navbar-logo navbar-logo-bigger" style="padding: 10px;">
                    <img src="{{ asset("assets/img/aaulyp/logos/UL-black.png") }}" alt="Austin Area Urban League">
                </a>
            </div>
            <!-- MAIN NAVIGATION -->
            <div id="main-nav" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right" style="padding-top: 10px">
                    <li>
                        <a href="#about">ABOUT</a>
                    </li>
                    <li>
                        <a href="#services">SCHEDULE</a>
                    </li>
                    <li>
                        <a href="#portfolio">HOTEL</a>
                    </li>
                    <li>
                        <a href="#pricing">TICKETS</a>
                    </li>
                    <li>
                        <a href="#contact">CONTACT US</a>
                    </li>
                </ul>
            </div>
            <!-- MAIN NAVIGATION -->
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- HERO UNIT -->
    <section class="hero-unit-slider no-margin">
        <div id="carousel-hero" class="slick-carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <img class="img-responsive" src="{{ asset("assets/img/aaulyp/one_page/ypweekend_banner_one-page.png") }}" alt="Slider Image">
                </div>
        </div>
    </section>
    <!-- END HERO UNIT -->
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="heading-center">
                <h2 class="section-heading">ABOUT US</h2>
                <p class="lead">Getting to know us better</p>
                <hr>
            </div>
            <p>Completely reinvent business mindshare with superior strategic theme areas. Dramatically build reliable platforms without real-time e-tailers. Competently predominate covalent scenarios rather than future-proof content. Intrinsicly innovate holistic users whereas cost effective partnerships. Objectively transform collaborative outsourcing before an expanded array of services.</p>
            <p>Monotonectally provide access to next-generation imperatives rather than mission-critical materials. Seamlessly negotiate excellent services rather than web-enabled sources. Quickly actualize proactive niches rather than user friendly catalysts for change. Efficiently negotiate distributed experiences for alternative best practices. Efficiently.</p>
        </div>
    </section>
    <!-- END ABOUT -->
    <!-- SERVICES -->
    <section id="services">
        <div class="container">
            <div class="heading-center">
                <h2 class="section-heading">SCHEDULE</h2>
                <p class="lead">What we deliver to you</p>
                <hr>
            </div>
            <!-- BOXED CONTENT -->
            <div class="row">
                <div class="col-md-4 soon">
                    <br>
                    <h2>FRI JULY 8th</h2>

                </div>
                <div class="col-md-4 soon">
                    <h1>SAT JULY 9th</h1>
                </div>
                <div class="col-md-4 soon">
                    <br>
                    <h2>SUN JULY 10th</h2>
                </div>
            </div>
            <!-- END BOXED CONTENT -->
        </div>
    </section>
    <!-- END SERVICES -->
    <!-- PORTFOLIO -->
    <section id="portfolio">
        <div class="container">
            <div class="heading-center">
                <h2 class="section-heading">HOTEL</h2>
                <p class="lead">What we have accomplished</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-1">
                    <br>
                    <br>
                    <img src="assets/img/aaulyp/soon/Aloft_logo.jpg" alt="">
                    <p>11601 Domain Drive <br>
                        Austin, TX, 78758, United States <br>
                        Phone: 512-491-0777 <br>
                        Hotel Reservations: <a href="tel:1-866-716-8143">866-716-8143</a>
                    </p>
                    <a href="" class="btn btn-primary">RESERVE A ROOM</a>
                    <div id="map-address" style="display: none">11601 Domain Drive Austin, TX, 78758</div>
                </div>
                <div class="col-xs-10 col-md-offset-1 col-md-8 col-md-offset-1">
                    <div id="map"></div>
                </div>
            </div>

        </div>
    </section>
    <!-- END PORTFOLIO-->
    <!-- PRICING -->
    <section id="pricing">
        <div class="container">
            <div class="heading-center">
                <h2 class="section-heading">TICKETS</h2>
                <p class="lead">The 1st month is on us, 30-days free trial</p>
                <hr>
            </div>
        </div>
    </section>
    <!-- END PRICING -->
    <!-- TESTIMONIAL -->
    <section class="testimonial-with-bg parallax">
        <div class="container">
            <div class="testimonial slick-carousel">
                <div class="testimonial-container">
                    <div class="testimonial-body">
                        <p>Credibly extend parallel relationships after clicks-and-mortar content. Credibly pontificate team building alignments rather than diverse quality vectors.</p>
                        <div class="testimonial-author">
                            <img src="../assets/img/user2.png" alt="Author" class="pull-left">
                            <span><span class="author-name">Antonius</span> <em>CEO of TheCompany</em></span>
                        </div>
                    </div>
                    <div class="testimonial-body">
                        <p>Credibly pontificate team building alignments rather than diverse quality vectors. Monotonectally benchmark business communities for distinctive mindshare.</p>
                        <div class="testimonial-author">
                            <img src="../assets/img/user1.png" alt="Author" class="pull-left">
                            <span><span class="author-name">Michael</span> <em>General Manager of DreamCorp</em></span>
                        </div>
                    </div>
                    <div class="testimonial-body">
                        <p>Appropriately morph low-risk high-yield process improvements through progressive partnerships. Uniquely brand enabled. Globally network timely imperatives without plug-and-play schemas.</p>
                        <div class="testimonial-author">
                            <img src="../assets/img/user5.png" alt="Author" class="pull-left">
                            <span><span class="author-name">Palmer</span> <em>Freelance Web Developer</em></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->
    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="heading-center">
                <h2 class="section-heading">CONTACT US</h2>
                <p class="lead">Now is the time to execute your idea</p>
                <hr>
            </div>
        </div>
        <div class="google-map margin-bottom-50px">
            <div id="custom-map-canvas"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="contact-info contact-half margin-bottom-50px fa-ul">
                        <li><i class="fa fa-li fa-building-o"></i>
                            <h3>Address</h3>
                            <p>76 Ninth Ave, New York, USA</p>
                        </li>
                        <li><i class="fa fa-li fa-phone"></i>
                            <h3>Phone</h3>
                            <p>+621 234 4567</p>
                        </li>
                        <li><i class="fa fa-li fa-envelope-o"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:hello@yourcompany.com">hello@yourcompany.com</a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <!-- CONCTACT FORM -->
                    <div class="contact-form-wrapper">
                        <form id="contact-form" method="post" action="../php/contact.php" class="form-horizontal margin-bottom-30px" role="form" novalidate>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact-name" class="control-label sr-only">Name</label>
                                        <input type="text" class="form-control" id="contact-name" name="name" placeholder="Name*" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact-email" class="control-label sr-only">Email</label>
                                        <input type="email" class="form-control" id="contact-email" name="email" placeholder="Email*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact-subject" class="control-label sr-only">Subject</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact-message" class="control-label sr-only">Message</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="contact-message" name="message" rows="5" cols="30" placeholder="Message*" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>Submit Message</span></button>
                                </div>
                            </div>
                            <input type="hidden" name="msg-submitted" id="msg-submitted" value="true">
                        </form>
                    </div>
                    <!-- END CONCTACT FORM -->
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->
    @include('partials.footer')
    <!-- END FOOTER -->
    <div class="back-to-top">
        <a href="#top"><i class="fa fa-chevron-up"></i></a>
    </div>
</div>
<!-- END WRAPPER -->
<!-- JAVASCRIPTS -->
<script src="../assets/js/jquery-2.1.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/plugins/slick/slick.min.js"></script>
<script src="../assets/js/plugins/isotope/isotope.pkgd.js"></script>
<script src="../assets/js/plugins/google-map/google-map.js"></script>
<script src="../assets/js/plugins/parsley-validation/parsley.min.js"></script>
<script src="../assets/js/plugins/autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js"></script>
<script src="../assets/js/plugins/stellar/jquery.stellar.min.js"></script>
<script src="../assets/js/repute-scripts.js"></script>
<script src="assets/js/plugins/scrollto/jquery.localscroll-1.2.7-min.js"></script>
<script src="assets/js/plugins/scrollto/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/plugins/easing/jquery.easing.min.js"></script>
<script src="assets/js/one-page.js"></script>
<script src="{{ asset('assets/js/aaulyp.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjraWiz5BuIM0LnJl-AP5p8PF9fBbQQY&callback=initMap" async defer></script>


</body>

</html>
