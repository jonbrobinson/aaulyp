@extends('layouts.master')

@section('content')
<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">SIGN IN</h1>
        <ol class="breadcrumb">
            {{--<li><a href="/contact">Contact</a></li>--}}
            {{--<li class="active">Contact Us</li>--}}
        </ol>
    </div>
</div>
<!-- END BREADCRUMBS -->
<!-- PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <p>We appreciate you coming to visit us today. Please sign in to help us account for attendance.</p>
                <br>
                <div id="server-response"></div>
                <!-- CONCTACT FORM -->
                <div class="contact-form-wrapper">
                    <form id="the-form-signin" method="post" class="form-horizontal margin-bottom-30px" role="form" novalidate>
                        {{ csrf_field() }}
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div>
                            <input type="text" class="contact-aaulyp" name="website" value="">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact-name" class="control-label sr-only">Name</label>
                                    <input type="text" class="form-control" id="signin-name" name="name" placeholder="Name (First & Last)" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email*" required>
                                </div>
                            </div>
                        </div>
                        <!-- DATE PICKER -->
                        <div class="row" id="date-picker-demo">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" id="datepicker" name="datepicker" class="form-control" placeholder="Date of The Event">
                                </div>
                            </div>
                            <label for="contact-subject" class="control-label sr-only">Name of Event</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="signin-event" name="event" placeholder="Name of Event">
                            </div>
                        </div>
                        <!-- END DATE PICKER -->
                        <div class="row">
                            <br>
                        </div>

                        <div id="loading">
                            <img src="{{ asset("assets/gif/ajax-loader.gif") }}" />
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Is this your first AAULYP Event?</label>
                            <div class="col-md-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="ypFirst" value="true">
                                </label>
                                <br>
                                <br>
                            </div>
                            <label class="col-md-3 control-label">Please subscribe me to AAULYP email list.</label>
                            <div class="col-md-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="mailList" value="true">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>Submit</span></button>
                            </div>
                        </div>
                        <input type="hidden" name="msg-submitted" id="msg-submitted" value="true">
                    </form>
                </div>
                <!-- END CONCTACT FORM -->
            </div>
            <div class="col-md-3">
                <!-- RIGHT SIDEBAR CONTENT -->
                <div class="widget">
                    <h3 class="widget-title">AAUL CONTACT INFO</h3>
                    <p>
                        For More information about the Austin Area Urban League contact the AAUL Main Office at:
                    </p>
                    <ul class="contact-info fa-ul">
                        <li><i class="fa fa-li fa-building-o"></i>8011A Cameron Rd
                            <br> Austin, TX 78754
                        </li>
                        <li><i class="fa fa-li fa-phone"></i> (512) 478 - 7176</li>
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
</div>
<!-- END PAGE CONTENT -->

@include('partials.footer')

@stop

@section('javascript')
    <script src="{{ asset('assets/js/plugins/google-map/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
@endsection