@extends('layouts/master')

@section('top_javascript')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')

<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">Create An Event</h1>
        <ol class="breadcrumb">
            <li><a href="/">Events</a></li>
            <li class="active">Create</li>
        </ol>
    </div>
</div>
<div class="page-content">
    <!-- END BREADCRUMBS -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="/events" >
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="event-name" class="control-label sr-only">Event Name</label>
                            <input type="text" class="form-control" id="event-name" placeholder="Event Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group" id="date-picker-demo">
                                <input type="text" id="daterangepicker" class="form-control" placeholder="Event Date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="event-address" class="control-label sr-only">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="event-address" placeholder="Address">
                    </div>
                    <label for="event-state" class="control-label sr-only">City</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="event-state" placeholder="City">
                    </div>
                    <label for="event-city" class="control-label sr-only">State</label>
                    <div class="col-sm-2">
                        <select name="event-startime" class="form-control">
                            @foreach($states as $code => $state)
                                <option value="{{ $code }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="event-zip" class="control-label sr-only">Zip</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="event-zip" placeholder="Zip">
                    </div>
                </div>
                <div class="form-group">
                    <label for="event-description" class="control-label sr-only">Message</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="event-description" name="contact-message" rows="5" cols="30" placeholder="Descripe some of the event"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="event-social-facebook" class="control-label sr-only">Message</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="event-social-facebook" name="contact-message" rows="5" cols="30" placeholder="Facebook">
                    </div>
                    <label for="event-social-twitter" class="control-label sr-only">Message</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="event-social-twitter" name="contact-message" rows="5" cols="30" placeholder="Twitter">
                    </div>
                    <label for="event-social-instagram" class="control-label sr-only">Message</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="event-social-instagram" name="contact-message" rows="5" cols="30" placeholder="Instagram">
                    </div>
                    <label for="event-social-instagram" class="control-label sr-only">Message</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="event-social-instagram" name="contact-message" rows="5" cols="30" placeholder="Website">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </div>
            </form>
            <!-- END CONCTACT FORM -->
        </div>
    </div>

</div>
@include('partials.footer')

@endsection

@section('javascript')
    <script src="{{ asset('assets/js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
@endsection