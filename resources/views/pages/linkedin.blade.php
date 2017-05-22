@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">LinkedIn Tips</h1>
            <ol class="breadcrumb">
                {{--<li><a href="{{ url('/board') }}"></a></li>--}}
                <li class="active">LinkedIn</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- TEAM -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">LOOKING FOR SOME TIPS TO IMPROVE YOUR LINKEDIN</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <p class="lead">Click the Button below to view the LinkedIn Tips</p>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-info" href="{{ asset("assets/pdf/linkedIn_tips.pdf") }}">View LinkedIn Tips PDF</a>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="col-md-2">
                    <p class="lead pull-left">OR</p>
                    <br>
                    <br>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead"> Enter your email to receive the tips</p>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <div id="server-response"></div>
                            <!-- CONCTACT FORM -->
                            <div class="contact-form-wrapper">
                                <form id="the-form-linkedin" method="POST" class="form-horizontal margin-bottom-30px" role="form" novalidate>
                                    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                                    <div>
                                        <input type="text" class="contact-aaulyp" name="website" value="">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="linkedin-email" class="control-label sr-only">Email</label>
                                                <input type="email" class="form-control" id="linkedin-email" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>Send Me The Tips</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="msg-submitted" id="msg-submitted" value="true">
                                </form>
                            </div>
                            <!-- END CONCTACT FORM -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop

@section('javascript')
        <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
@endsection