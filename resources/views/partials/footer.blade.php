<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- COLUMN 1 -->
                <h3 class="sr-only">ABOUT US</h3>
                <img src="{{ asset("assets/img/aaulyp/logos/UL-white.png") }}" class="logo" alt="AAULYP Logo">
                <p>The Austin Area Urban League Young Professionals (AAULYP) is a service auxiliary to the Austin Area Urban League.</p>
                <address class="margin-bottom-30px">
                    <ul class="list-unstyled">
                        <li>For More information about the Austin Area Urban League <br>
                        contact the AAUL Main Office at:
                        </li>
                        <li>8011A Cameron Rd
                            <br/> Austin, TX 78754</li>
                        <li>Phone: (512) 478 - 7176</li>
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
                            <li><a href="{{ url('/aaulyp') }}">About Us</a></li>
                            <li><a href="{{ url('http://www.aaul.org') }}">Austin Area Urban League</a></li>
                            <li><a href="{{ url('/join') }}">Join Us</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <ul class="list-unstyled footer-nav">
                            <li><a href="{{ url('/events') }}">Events</a></li>
                            {{--<li><a href="">Our Team</a></li>--}}
                            {{--<li><a href="#">FAQ</a></li>--}}
                            {{--<li><a href="/recaps">Blog</a></li>--}}
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
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
                    <form action="//aaul.us4.list-manage.com/subscribe/post?u=9827856e38f0a93a49703d780&amp;id=17d8d9f32d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll" class="input-group input-group-lg">
                            <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="youremail@domain.com" style="background-color: #414143; border: hidden"required>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <input type="hidden" name="b_9827856e38f0a93a49703d780_17d8d9f32d" tabindex="-1" value="">
                            <span class="input-group-btn"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-primary"></span>
                        </div>
                    </form>
                </div>

                <!--End mc_embed_signup-->
                <div class="social-connect">
                    <h3 class="footer-heading">GET CONNECTED</h3>
                    <ul class="list-inline social-icons">
                        <li><a href="http://www.fabebook.com/aaulyp" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/aaulyp" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="googleplus-bg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="http://www.instagram.com/aaulyp" class="rss-bg"><i class="fa fa-instagram"></i></a></li>
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