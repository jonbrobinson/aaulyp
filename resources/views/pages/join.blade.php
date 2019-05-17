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
                        <p class="lead">Please contact Brook Campbell at <a href="mailto:membership.aaulyp@gmail.com">membership.aaulyp@gmail.com</a> for additional information.</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="ce">
                            <a href="{{ url('join?rd=1') }}" class="btn btn-primary btn-lg btn-block">Click To Join</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <br>
                    <div class="col-md-6 row">
                        <div>
                            <h2 class="section-heading">Membership Benefits</h2>
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to YP Events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to AAUL events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to events of our partner organizations</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to NUL events</h4>
                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>Discounts to NULYP events</h4>
                                </div>

                                <div class="col-md-1">
                                    <i class="fa fa-check-circle fa-lg favicon-list-custom"></i>
                                </div>
                                <div class="col-md-11">
                                    <h4>YP Paraphernalia</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gcp_garden_800x800.jpg') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/heritage_fest_group_800x800.jpg') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/pres_800x800.jpg') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                        <div class="col-xs-6">
                            <img src="{{ asset('assets/img/aaulyp/img_800x800/gbm_secretary_800x800.jpg') }}" alt="" class="img-responsive">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>

            </section>
            <section>

            </section>

        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop

@section('javascript')

@stop