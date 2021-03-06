@extends('layouts.master')

@section('content')
        <!-- PAGE CONTENT -->
<div class="page-content page-error text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>404</h1>
                <h2>OOPS! PAGE NOT FOUND</h2>
                <hr />
                <div class="error-description">
                    <p>The page you were looking for could not be found.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
    @include('partials.footer')
@stop