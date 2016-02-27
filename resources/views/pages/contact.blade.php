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
                <p>Competently extend highly efficient initiatives whereas collaborative alignments. Collaboratively seize impactful opportunities and focused bandwidth. Continually expedite adaptive manufactured products and customer directed intellectual capital. Completely restore intermandated mindshare after multimedia based ideas. Credibly initiate distinctive metrics.</p>
                <p>Authoritatively embrace performance based information before highly efficient solutions. Globally disintermediate ubiquitous "outside the box" thinking without client-based schemas. Credibly parallel task dynamic technologies and cross-platform total linkage. Authoritatively unleash emerging growth strategies whereas future-proof resources. Distinctively transition 24/7 partnerships without effective testing procedures. Distinctively underwhelm proactive intellectual capital rather than best-of-breed total linkage. Uniquely whiteboard distinctive methods of empowerment after.</p>
                <br>
                <!-- CONCTACT FORM -->
                <div class="contact-form-wrapper">
                    <form id="contact-form" method="post" class="form-horizontal margin-bottom-30px" role="form" novalidate>
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
                    <h3 class="widget-title">CONTACT INFO</h3>
                    <ul class="contact-info fa-ul">
                        <li><i class="fa fa-li fa-building-o"></i> 76 Ninth Ave, New York, USA</li>
                        <li><i class="fa fa-li fa-phone"></i> +621 234 4567</li>
                        <li><i class="fa fa-li fa-envelope-o"></i> <a href="mailto:hello@yourcompany.com">hello@yourcompany.com</a></li>
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
    <script src="assets/js/plugins/google-map/google-map.js"></script>
@endsection