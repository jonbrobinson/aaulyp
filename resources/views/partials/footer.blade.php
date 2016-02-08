<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- COLUMN 1 -->
                <h3 class="sr-only">ABOUT US</h3>
                <img src="{{ asset("assets/img/aaulyp/logos/UL-white.png") }}" class="logo" alt="AAULYP Logo">
                <p>The Austin Area Urban League Young Professionals (AAULYP) is a National Urban League volunteer auxiliary that targets young professionals ages 21-40 to empower their communities and change lives through the Urban League Movement.</p>
                <br>
                <address class="margin-bottom-30px">
                    <ul class="list-unstyled">
                        <li>8011A Cameron Rd
                            <br/> Austin, TX 78754</li>
                        <li>Phone: (512) 278 - 7176</li>
                        <li>Email: email@yourdomain.com</li>
                    </ul>
                </address>
                <!-- END COLUMN 1 -->
            </div>
            <div class="col-md-4">
                <!-- COLUMN 2 -->
                <h3 class="footer-heading">USEFUL LINKS</h3>
                <div class="row margin-bottom-30px">
                    <div class="col-xs-6">
                        <ul class="list-unstyled footer-nav">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <ul class="list-unstyled footer-nav">
                            <li><a href="#">Press Kit</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END COLUMN 2 -->
            </div>
            <div class="col-md-4">
                <!-- COLUMN 3 -->
                <div class="newsletter">
                    <h3 class="footer-heading">NEWSLETTER</h3>
                    <p>Get the latest update from us by subscribing to our newsletter.</p>
                    <form class="newsletter-form" method="POST">
                        <div class="input-group input-group-lg">
                            <input type="email" class="form-control" name="email" placeholder="youremail@domain.com">
									<span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i><span>SUBSCRIBE</span></button>
									</span>
                        </div>
                        <div class="alert"></div>
                    </form>
                </div>
                <div class="social-connect">
                    <h3 class="footer-heading">GET CONNECTED</h3>
                    <ul class="list-inline social-icons">
                        <li><a href="http://www.fabebook.com/aaulyp" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/aaulyp" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="googleplus-bg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
                <!-- END COLUMN 3 -->
            </div>
        </div>
    </div>
    <!-- COPYRIGHT -->
    <div class="text-center copyright">
        &copy; <?= date('Y'); ?> Austin Area Urban League Young Professionals. All Rights Reserved.
    </div>
    <!-- END COPYRIGHT -->
</footer>
<!-- END FOOTER -->