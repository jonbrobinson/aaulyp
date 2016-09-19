@extends('layouts/master')

@section('top_javascript')
    <script src="{{ url('//cdn.tinymce.com/4/tinymce.min.js') }}"></script>
    <script>tinymce.init({
            selector:'textarea',
            setup: function(ed) {

                // Set placeholder
                var tinymce_placeholder = $('#description'+ed.id);
                if(tinymce_placeholder.length){
                    var is_default = false;

                    ed.onInit.add(function(ed) {
                        // get the current content
                        var cont = ed.getContent();

                        // If its empty and we have a placeholder set the value
                        if(cont.length == 0){
                            ed.setContent(tinymce_placeholder.attr("placeholder"));

                            // Get updated content
                            cont = tinymce_placeholder.attr("placeholder");
                            //cont = ed.getContent(); - too slow
                        }

                        // convert to plain text and compare strings
                        is_default = (cont == tinymce_placeholder.attr("placeholder"));

                        // nothing to do
                        if (!is_default){
                            return;
                        }
                    });

                    ed.onMouseDown.add(function(ed,e) {
                        // replace the default content on focus if the same as original placeholder
                        if (is_default){
                            ed.setContent('');
                        }
                    });
                }
            }});
    </script>

    <script src="{{ url('https://ucarecdn.com/widget/2.10.0/uploadcare/uploadcare.full.min.js') }}" charset="utf-8">

    </script>

    <script>
        UPLOADCARE_PUBLIC_KEY = '{{ env('UPLOADCARE') }}';
    </script>

@endsection

@section('content')

<!-- BREADCRUMBS -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title pull-left">Add a Leadership Team Member</h1>
    </div>
</div>
<div class="page-content">
    <!-- END BREADCRUMBS -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ action('AdminController@leadershipStore') }}"  >
                {{ csrf_field() }}
                @include('partials.forms.leadership')
            </form>
            <!-- END CONTACT FORM -->
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