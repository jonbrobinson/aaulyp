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
                <div class="col-md-6 row">
                    <h2 class="section-heading">Join Now</h2>
                    <div class="col-md-11 row">
                        <p>Joining the YP is easy. Please purchase a member from our Eventbrite.</p>
                        <p><a href="http://www.eventbrite.com/e/aaulyp-membership-tickets-5422224018?aff=es2" class="active btn btn-primary">Join on Eventbrite</a></p>
                        <p>From there, we encourage you to get involved by coming to our General Body Meetings (GBM), and volunteering at some of our service opportunities. Our committee chairs (Membership, Fundraising, Community Outreach, etc) are also looking for people to help plan and organize some of the events we host.</p>
                    </div>
                </div>
                <div class="col-md-6 row">
                    <h2 class="section-heading">Membership Benefits</h2>
                    <div class="col-md-12 row">
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Austin Area Urban League Young Professionals Shirt</h5>
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Invitations and discounts to YP events and YP partner organization events</h5>
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Invitations and discounts to Austin Urban League events</h5>
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Member Only Events</h5>
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Member Only Discounts</h5>
                        <h5><span class="favicon-list-custom"><i class="fa fa-check-circle"></i></span> Partnering with us to impact our generation, empower communities and change lives </h5>
                    </div>
                </div>
            </section>

            <div class="clearfix"></div>

            <div class="col-md-6 row">
                @include('partials.mailchimp')
            </div>
            <div class="col-md-6 row">
                <br>
                <br>
                <br>
                <img class="img-responsive" src="{{ asset('assets/img/aaulyp/join_week_networking_group.png') }}" alt="">
            </div>
        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop