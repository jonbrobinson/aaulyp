@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Frequently Asked Questions</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/board') }}">Contact</a></li>
                <li class="active">FAQ</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="col-md-9">
                <!-- TOP FAQs -->
                <h2>Top Questions</h2>
                <div class="panel-group panel-group-faq top-faq">
                    <div class="panel panel-minimal">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#top-faq1" class="collapsed"><span class="number pull-left">1</span> Is the AAULYP different from the Austin Area Urban League?</a>
                            </h4>
                        </div>
                        <div id="top-faq1" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p>No. We are all one Austin Area Urban League. As Young Professionals we work as an auxiliary for the Austin Area Urban League and help promote the movement of the Urban League</p>
                                <div class="faq-footer">
                                    <span class="text-muted">43 people found this useful - <a href="#">Me too!</a></span>
                                    <span class="share"><a href="#">Permalink</a> | <a href="#">Share</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-minimal">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#top-faq2" class="collapsed"><span class="number pull-left">2</span> How can I get involved?</a>
                            </h4>
                        </div>
                        <div id="top-faq2" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p>Getting involved is easy.  And we coud use your help. Right now we are planning general Body meetings, Community Service Days and Fundraising events. To get involved please email our
                                    <a href='mailto:membership.aaulyp@gmail.com'>membership chair</a> to see where your talents would be served</p>
                                <div class="faq-footer">
                                    <span class="text-muted">43 people found this useful - <a href="#">Me too!</a></span>
                                    <span class="share"><a href="#">Permalink</a> | <a href="#">Share</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-minimal">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#top-faq3" class="collapsed"><span class="number pull-left">3</span> Are AAULYP events for members only?</a>
                            </h4>
                        </div>
                        <div id="top-faq3" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p>No. However, membership does have its benefits. Our members do get special offers and discounts to certain events, but we want to make sure you see the great things we do in the community. Please check out our events page to find the next where we can meet you or
                                    <a class="share" href="/team/join">JOIN NOW</a> on our membership page to receive our announcements</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-minimal">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#top-faq4" class="collapsed"><span class="number pull-left">4</span> Can I promote an event/job/etc through the YP social channels?</a>
                            </h4>
                        </div>
                        <div id="top-faq4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Monotonectally underwhelm timely e-services vis-a-vis backward-compatible relationships. Energistically promote clicks-and-mortar value through interdependent vortals. Rapidiously strategize multimedia based communities for future-proof solutions. Assertively syndicate global e-services</p>
                                <p>via enabled paradigms. Completely productivate tactical models for installed base catalysts for change. Quickly leverage other's turnkey partnerships for exceptional data. Appropriately envisioneer performance based leadership skills with client-centered materials. Globally reinvent goal-oriented niches for.</p>
                                <div class="faq-footer">
                                    <span class="text-muted">8 people found this useful - <a href="#">Me too!</a></span>
                                    <span class="share"><a href="#">Permalink</a> | <a href="#">Share</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TOP FAQs -->
            </div>
            <div class="col-md-3">
                <!-- RIGHT SIDEBAR CONTENT -->
                <div class="widget">
                    <h3 class="widget-title">CONTACT INFO</h3>
                    <ul class="contact-info fa-ul">
                        <li><i class="fa fa-li fa-building-o"></i>8011A Cameron Rd, Austin, TX 78754</li>
                        <li><i class="fa fa-li fa-phone"></i> (512) 278 - 7176</li>
                        <li><i class="fa fa-li fa-envelope-o"></i> <a href="mailto:pr.aaulyp@gmail.com">pr.aaulyp@gmail.com</a></li>
                    </ul>
                </div>
                <div class="widget">
                    <h3 class="widget-title">GETTING THERE</h3>
                    <div class="google-map sidebar-map">
                        <div id="custom-map-canvas"></div>
                    </div>
                </div>
                <div class="widget">
                    <h3 class="widget-title">BUSINESS HOURS</h3>
                    <ul class="list-unstyled">
                        <li><strong>Monday-Friday: </strong> 8am to 5pm</li>
                        <li><strong>Saturday: </strong> 10am to 2pm</li>
                        <li><strong>Sunday: </strong> Closed</li>
                    </ul>
                </div>
                <!-- END RIGHT SIDEBAR CONTENT -->
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop

@section('javascript')
    <script src="{{ asset('assets/js/plugins/google-map/google-map.js') }}"></script>
@endsection