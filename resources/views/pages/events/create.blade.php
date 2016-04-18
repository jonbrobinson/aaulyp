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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="/events" >
                {{ csrf_field() }}
                @include('partials.forms.events')
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