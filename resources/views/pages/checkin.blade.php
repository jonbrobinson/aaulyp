@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Check In</h1>
            <ol class="breadcrumb">
                {{--<li><a href="{{ url('/board') }}"></a></li>--}}
                {{--<li class="active">LinkedIn</li>--}}
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScVABw8epTUOGU_PtjWtooKi18xXRRzUgMNnSPw48kW07zfGA/viewform?embedded=true" width="760" height="1400" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
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