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
                <div class="col-md-6">
                        <p>The Austin Area Urban League incorporated on August 12, 1977, stands proudly as it takes its place among the 96 affiliates of the National Urban League. Although 36 years have passed since its creation, the Austin Area Urban League continues to hold fast to our original mission; one which guides our outreach, programming, partnerships and advocacy. We envision a community in which all citizens are free from barriers to education, economic and social success.</p>
                        <p>Over the years, significant steps have been made in removing the early prejudices and barriers, thus allowing many of our constituents to learn to grow, and to thrive in the Austin community. As we move forward with our programs, we have been able to adapt to the ever-changing Austin environment – one that has grown from being merely the state capital to that of a thriving technological hub that incorporates the community, government, and the business sectors.</p>
                        <br>
                </div>
                <div class="col-md-6">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/nYTlWfsK9OY" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    @include('partials.mission')
                </div>
                <div class="col-md-6">
                    @include('partials.aaulPrograms')
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>

@stop