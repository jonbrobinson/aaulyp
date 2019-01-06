@extends('layouts.master')

@section('content')
<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">CONTACT US</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('contact') }}">Contact</a></li>
            <li class="active">Contact Us</li>
        </ol>
    </div>
</div>
<!-- END BREADCRUMBS -->
<!-- PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <p>Austin Area Urban League Young Professionals is an organization that cares for the community. Please feel free to send us a comment or question if you need more information. Our goal is to build a greater Austin through service and education. We are allways searching for oppotunities to collaborate with different organizations or promote oppotuniotees to help build personal skills and career oppotunities.</p>
                <br>
                <div id="server-response"></div>
                <!-- CONCTACT FORM -->
                <div class="contact-form-wrapper">
                    <form id="the-form" method="post" class="form-horizontal margin-bottom-30px" role="form" novalidate>
                        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                        <div>
                            <input type="text" class="contact-aaulyp" name="website" value="">
                        </div>
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
                {{--<div class="widget">--}}
                    {{--<h3 class="widget-title">GETTING THERE</h3>--}}
                    {{--<div class="google-map sidebar-map">--}}
                        {{--<div id="custom-map-canvas"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
@endsection