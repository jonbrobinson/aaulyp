@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Our Team</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/edit?token=') }}{{ !empty(request()->get('token')) ? request()->get('token') : "" }}">Team</a></li>
                <li class="active">Our Team</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <h2 class="section-heading">AAULYP OFFICERS</h2>
            <!-- BOARD -->
            <section class="team">
                <div class="section-content">
                    @foreach(array_chunk($officers, 2) as $groupedOfficers)
                        <div class="row">
                            @foreach($groupedOfficers as $index => $position)
                                @if($index % 2 == 0)
                                    @include("partials.admin.update_position_partial", ['position' => $position, 'divClass' => "col-md-5 col-md-offset-1"])
                                @else
                                    @include("partials.admin.update_position_partial", ['position' => $position, 'divClass' => "col-md-5"])
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- END TEAM -->

            <h2 class="section-heading">COMMITTEE CHAIRS</h2>
            <!-- CHAIRS -->
            <section class="team">
                <div class="section-content">
                    @foreach(array_chunk($chairs, 3) as $groupedPositions)
                    <div class="row">
                        @foreach($groupedPositions as $index => $position)
                            @include("partials.admin.update_position_partial", ['position' => $position, 'divClass' => "col-md-4"])
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

    @foreach(array_merge($chairs, $officers) as $position)
    <!-- Modal -->
    <div class="modal fade" id="modal-form-{{ $position->meta->index }}" tabindex="-1" role="dialog" aria-labelledby="modal-form-{{ $position->meta->index }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-form{{ $position->meta->index }}Label">Update About Section</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form id="modal-form-position-{{ $position->meta->index }}" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title-text" name="title" placeholder="Update Title" value="{{ $position->title or "" }}" >
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-sm-3">
                                    <label for="first_name-text">First Name</label>
                                    <input type="text" class="form-control"
                                            id="first_name-text" name="first_name" placeholder="First Name" value="{{ $position->first_name or ""}}" >
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="last_name-text">Last Name</label>
                                    <input type="text" class="form-control"
                                               id="last_name-text" name="last_name" placeholder="Last Name" value="{{ $position->last_name or ""}}" >
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control"
                                           id="email-text" name="email" placeholder="Email" value="{{ $position->email or ""}}">

                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="about">About</label>
                                    <textarea class="form-control"
                                              id="about-text" name="about" placeholder="Update About" >{{ $position->about or ""  }}</textarea>
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control"
                                              id="description-text" name="description" placeholder="Update Description" >{{ $position->description or ""  }}</textarea>
                                </div>
                            </div>
                            @foreach($position->social as $channel => $link)
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="social-{{ $channel }}">{{ ucfirst($channel) }}</label>
                                    <input type="text" class="form-control"
                                           id="{{ $channel }}-text" name="social-{{ $channel }}" placeholder="Enter {{ ucfirst($channel) }} URL" value="{{ $link or ""  }}">
                                </div>
                            </div>
                            @endforeach

                            <div><input type="hidden" id="index-hidden" name="index" value="{{ $position->meta->index }}"></div>
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
<!-- END WRAPPER                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            -->
@stop

@section('javascript')
    <script>
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

        function ajaxSubmitForm( form, token){
            var positionIndex = form.find('input[name="index"]').val();
            var url = "/admin/update/" + positionIndex; // the script where you handle the form input

            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: form.serialize(), // serializes the form's elements.
                success: function()
                {
                    window.location.replace("/admin/edit?token=" + token);
                }
            });
        }
    </script>
@endsection