@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">DASHBOARD</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin?token=' . request()->get('token')) }}">Team</a></li>
                <li class="active"><a href="{{ url('/admin?token=' . request()->get('token')) }}">Admin Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <section class="team">
                @if (isset($successMessage))
                    <div class="alert alert-success">
                        {{ $successMessage }}
                    </div>
                @endif
                <div>
                    <a href="{{ url('/admin/edit?token='.request()->get('token')) }}"><button class="btn btn-primary">Edit Officers</button></a>
                </div>
            </section>
            <section>
                <div class="col-md-6">
                    <h2>Positions</h2>
                </div>
                <div class="col-md-6">
                    <h2>Officers</h2>
                    @if(isset($officers))
                            <table>
                                <tr>
                                    <th>Name</th>
                                </tr>
                                @foreach($officers as $officer)
                                <tr>
                                    <td>{{ $officer->first_name." ".$officer->last_name}}</td>
                                </tr>
                                @endforeach
                            </table>
                    @endif
                </div>
            </section>
            <h2 class="section-heading">EVENTS</h2>
            @if(isset($events) && count($events) > 0)
                <table >

                    <tr>
                        <th>Date &nbsp; &nbsp;</th>
                        <th>Event &nbsp; &nbsp;</th>
                        <th>Tickets &nbsp; &nbsp;</th>
                        <th>Count &nbsp; &nbsp;</th>
                        <th>Total Sold &nbsp; &nbsp;</th>
                        <th>Total Revenue  &nbsp; &nbsp;</th>
                    </tr>
                    @foreach($events as $index => $event)
                        @if(count($event->meta->tickets->ticket_types) > 1)
                            <tr>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}"> {{ date("D M j, Y", $event->time_start) }} &nbsp; &nbsp;</td>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->title }} &nbsp; &nbsp;</td>
                            @foreach($event->meta->tickets->ticket_types as $ticket)
                                <td>{{ $ticket->name }}  &nbsp; &nbsp;</td>
                                <td>{{ $ticket->quantity_sold }}  &nbsp; &nbsp;</td>
                            </tr>
                            <tr>
                            @endforeach
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->meta->tickets->total_sold }}</td>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->meta->tickets->total_revenue }}</td>
                            </tr>
                        @else
                            <tr>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}"> {{ date("D M j, Y", $event->time_start) }} &nbsp; &nbsp;</td>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->title }} &nbsp; &nbsp;</td>
                                @foreach($event->meta->tickets->ticket_types as $ticket)
                                    <td>{{ $ticket->name }}  &nbsp; &nbsp;</td>
                                    <td>{{ $ticket->quantity_sold }}  &nbsp; &nbsp;</td>
                                @endforeach
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->meta->tickets->total_sold }}</td>
                                <td rowspan="{{ count($event->meta->tickets->ticket_types) }}">{{ $event->meta->tickets->total_revenue }}</td>
                            </tr>

                        @endif

                    @endforeach
                </table>
            @endif
        </div>
    </div>
    <!-- END PAGE CONTENT -->

    @foreach(array_merge($officers) as $officer)
            <!-- Modal -->
    <div class="modal fade" id="modal-form-{{ $officer->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-{{ $officer->id }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-form{{ $officer->id }}Label">Update About Section</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form id="modal-form-position-{{ $officer->id }}" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="row container">
                                <div class="form-group col-sm-3">
                                    <label for="first_name-text">First Name</label>
                                    <input type="text" class="form-control"
                                           id="first_name-text" name="first_name" placeholder="First Name" value="{{ $officer->first_name or ""}}" >
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="last_name-text">Last Name</label>
                                    <input type="text" class="form-control"
                                           id="last_name-text" name="last_name" placeholder="Last Name" value="{{ $officer->last_name or ""}}" >
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="about">Bio [Individual]</label>
                                    <textarea class="form-control"
                                              id="about-text" name="about" placeholder="Update About" >{{ $officer->bio or ""  }}</textarea>
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="social-{{ $channel }}">{{ ucfirst($channel) }}</label>
                                    <input type="text" class="form-control"
                                           id="{{ $channel }}-text" name="social-{{ $channel }}" placeholder="Enter {{ ucfirst($channel) }} URL" value="{{ $link or ""  }}">
                                </div>
                            </div>
                            <div><input type="hidden" name="index-hidden" value="{{ $officer->id }}"></div>
                            <div><input type="hidden" id="token-hidden" name="token-hidden" value="{{ !empty(request()->get('token')) ? request()->get('token') : "" }}"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop

@section('javascript')
    <script>
        var widgets = uploadcare.initialize();

        var img_forms = $('form[id^=\'img_admin-\']');

        for(i = 0; i < img_forms.length; i++) {
            (function(){
                var currentForm = $(img_forms[i]);
                var urlToken = currentForm.find('input[name=token-hidden]').val();
                var posIndex = currentForm.find('input[name=position-index]').val();
                var currWidget = widgets[i];

                currWidget.onChange(function(file) {
                    if (file) {
                        file.done(function (info) {
                            submitImgInfo(info, posIndex, urlToken)
                        });
                    }
                });
            })();
        }

        var forms = $('form[id^=\'modal-form-position-\']');
        if ( forms.length > 0) {
            forms.each(function(i) {
                var currentForm = $(this);
                currentForm.submit(function(e) {
                    e.preventDefault();
                    var urlToken = currentForm.find('input[name=\'token-hidden\']').val();
                    ajaxSubmitForm(currentForm, urlToken);
                });
            });
        }

        /**
         * @param {object} form
         * @param {string} token
         */
        function ajaxSubmitForm( form, token){
            var positionIndex = form.find('input[name="index-hidden"]').val();
            var url = "/admin/update/" + positionIndex; // the script where you handle the form input

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    window.location.replace("/admin/edit?token=" + token);
                }
            });
        }

        /**
         *
         * @param {object} info
         * @param {string} index
         * @param {string} token
         */
        function submitImgInfo(info, index, token)
        {
            var url = "/admin/img/update/" + index; // the script where you handle the form input

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: "application/json; charset=UTF-8",
                data: JSON.stringify(info), // serializes the form's elements.
                success: function()
                {
                    window.location.replace("/admin?token=" + token);
                }
            });
        }
    </script>
@endsection