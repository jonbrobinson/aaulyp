@extends('layouts.master')

@section('content')
<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">CONTACT US</h1>
        <ol class="breadcrumb">
            <li><a href="/contact">Contact</a></li>
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

                {{--<iframe src="https://docs.google.com/forms/d/1kk6OyhJqney0SPM6CRgvTwHAU3uHwgIDa_13PntkAMc/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>--}}
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
</div>
<!-- END PAGE CONTENT -->

@include('partials.footer')

@stop

@section('javascript')
    <script src="{{ asset('assets/js/plugins/google-map/google-map.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#the-form").submit(function(e) {

                var url = "/contact"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#the-form").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        resetResponse();
                        var success = '<p class=\'alert alert-success\'>' + data.message + '<a href=\'#\' class=\'close\' data-dismiss=\'alert\' aria-label=\'close\'>&times;</a></p>';
                        $('#server-response').append(success);
                        $('#contact-name').val('');
                        $('#contact-email').val('');
                        $('#contact-subject').val('');
                        $('#contact-message').val('');
                    },
                    error: function(xhr, status, error) {
                        resetResponse();
                        console.log(xhr.responseJSON.errors);
                        var errorList = '';
                        var errors = xhr.responseJSON.errors;

                        for (index = 0; index < errors.length; ++index) {
                            errorList += '<li>' + errors[index] + '</li>';
                        }

                        var errorElem = '<ul>' + errorList + '</ul>';

                        $('#server-response').addClass('alert alert-danger').append(errorElem);

                    }
                });

                e.preventDefault(); // avoid to execute the actual submit of the form.

                function resetResponse (){
                    var emptyDiv= $('#server-response').empty();

                    if (emptyDiv.hasClass('alert alert-danger')) {
                        emptyDiv.removeClass('alert alert-danger');
                    }
                };
            });
        });
    </script>
@endsection