@extends('layouts.master')

@section('head_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('top_javascript')
    <script>
        UPLOADCARE_LOCALE = "en";
        UPLOADCARE_PUBLIC_KEY = 'bbccb78ea3e70e41783d';
        UPLOADCARE_LOCALE_TRANSLATIONS = {
            buttons: {
                choose: {
                    files: {
                        one: 'Update Image'
                    },
                    images: {
                        one: 'Update Profile Image'
                    }
                }
            }
        };
    </script>
    <script charset="utf-8" src="//ucarecdn.com/libs/widget/3.2.3/uploadcare.full.min.js"></script>
@endsection


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
                                @include("partials.admin.update_position_partial", ['position' => $position, 'divClass' => "col-md-10 col-md-offset-1"])
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
                    @foreach(array_chunk($chairs, 2) as $groupedPositions)
                    <div class="row">
                        @foreach($groupedPositions as $index => $position)
                            @include("partials.admin.update_position_partial", ['position' => $position, 'divClass' => "col-md-6"])
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
                                    <label for="about">Bio [Individual]</label>
                                    <textarea class="form-control"
                                              id="about-text" name="about" placeholder="Update About" >{{ $position->about or ""  }}</textarea>
                                </div>
                            </div>
                            <div class="row container">
                                <div class="form-group col-md-6">
                                    <label for="description">Description [Position]</label>
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
                            <div><input type="hidden" name="index-hidden" value="{{ $position->meta->index }}"></div>
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
                    window.location.replace("/admin/edit?token=" + token);
                }
            });
        }
    </script>
@endsection