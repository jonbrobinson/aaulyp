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
                    <div class="col-md-6 ">
                        <h2 class="section-heading">Join Now</h2>
                        <div class="col-md-11 row">
                            <p>Joining the YP is easy. Please purchase a member from our Eventbrite.</p>
                            <p><a href="http://www.eventbrite.com/e/aaulyp-membership-tickets-5422224018?aff=es2" class="active btn btn-primary">Join on Eventbrite</a></p>
                            <p>From there, we encourage you to get involved by coming to our General Body Meetings (GBM), and volunteering at some of our service opportunities. Our committee chairs (Membership, Fundraising, Community Outreach, etc) are also looking for people to help plan and organize some of the events we host.</p>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gcp_garden_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/heritage_fest_group_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/omni_pres_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gbm_secretary_800x800.png') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

            </section>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-6">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F20531316728%2Fposts%2F10154009990506729%2F&width=500&show_text=false&height=290&appId" width="500" height="290" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>                </div>

                <div class="col-md-6">
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
            </div>

        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop