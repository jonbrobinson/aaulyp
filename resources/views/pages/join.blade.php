@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Membership</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/board') }}">Team</a></li>
                <li class="active">Join Us</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <section>
                <div class="col-md-12 row">
                    <div class="col-md-12 row">
                        <p class="lead">Join a community that is empowering Austin and connecting young professionals around the Austin Area with same values and commitment to helping others.</p>
                        <p class="lead">Membership is an annual commitment and  runs on a 12 month cycle from the time of purchase. Please contact Erika Crespo at <a href="mailto:membership.aaulyp@gmail.com">membership.aaulyp@gmail.com</a></p>
                    </div>
                    <div class="col-md-6 row">
                        <div>
                            <h2 class="section-heading">Membership Benefits</h2>
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Partnering with us to impact our generation, empower communities and change lives</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Invitations and discounts to YP events and YP partner organization events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Invitations to Austin Urban League events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to Austin Area Urban League and Austin Area Urban League Young Professional Events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to National Urban League and National Urban League Young Professional Events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Austin Area Urban League Young Professionals Shirt</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gcp_garden_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/heritage_fest_group_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/omni_pres_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gbm_secretary_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

            </section>
            <div style="width:100%; text-align:left;" >
                <iframe  src="//eventbrite.com/tickets-external?eid=25179039184&ref=etckt" frameborder="0" height="214" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>
                <div style="font-family:Helvetica, Arial; font-size:10px; padding:5px 0 5px; margin:2px; width:100%; text-align:left;" ><a class="powered-by-eb" style="color: #dddddd; text-decoration: none;" target="_blank" href="http://www.eventbrite.com/r/etckt">Powered by Eventbrite</a>
                </div>
            </div>

        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop