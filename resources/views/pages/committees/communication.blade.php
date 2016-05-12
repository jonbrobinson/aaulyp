@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Austin Area Urban League</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/aaul">About</a></li>
                <li class="active">AAUL</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.sidebar.committees', [request()->route()->__get('name') => "list-group-item current"] );
                </div>
                <div class="col-md-9">Made It Here</div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>

@stop