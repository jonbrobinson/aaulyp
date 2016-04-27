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
                        <p class="lead">Membership is an annual commitment and  runs on a 12 month cycle from the time of purchase. Please contact our member ship chair Ashley Jenkins at <a href="mailto:membership.aaulyp@gmail.com">membership.aaulyp@gmail.com</a></p>
                    </div>
                    <div class="col-md-6 row">
                        <div>
                            <h2 class="section-heading">Membership Benefits</h2>
                            <div class="col-md-12 row">
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Partnering with us to impact our generation, empower communities and change lives </h4>
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Invitations and discounts to YP events and YP partner organization events</h4>
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Invitations to Austin Urban League events</h4>
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Discounts to Austin Area Urban League and Austin Area Urban League Young Professional Events</h4>
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Discounts to National Urban League and National Urban League Young Professional Events</h4>
                                <h4><span class="favicon-list-custom"><i class="fa fa-check-circle fa-lg"></i></span> Austin Area Urban League Young Professionals Shirt</h4>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <div class="col-md-11 row">
                            <p class="text-center"><a href="http://www.eventbrite.com/e/aaulyp-membership-tickets-5422224018?aff=es2" class="active btn btn-primary btn-lg">Join Now</a></p>
                        </div>
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

        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop