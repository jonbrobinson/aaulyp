@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Austin Area Urban League Young Professionals</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{ url('/aaulyp') }}">About Us</a></li>
                <li class="active">Our History</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                    <br>
                    <div class="col-md-6">
                        <p>Austin Area Urban League Young Professionals [AAULYP's or YP's] are committed to helping make Austin a better city through diversity and urban culture. The purpose and mission of the Urban League and the Young Professionals in particular is to provide young people with resources that encourage networking and interaction with social, cultural, educational and political institutions and to help cultivate innovative ideas and dynamic dialogue in Austin amongst “Young Professionals”.</p>
                        <p>Over the years, significant steps have been made in removing the early prejudices and barriers, thus allowing many of our constituents to learn to grow, and to thrive in the Austin community. As we move forward with our programs, we have been able to adapt to the ever-changing Austin environment – one that has grown from being merely the state capital to that of a thriving technological hub that incorporates the community, government, and the business sectors.</p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="{{ asset("assets/img/aaulyp/multi-circle-r1.jpg") }}" alt="">
                        <br>
                        <br>
                    </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <img src="{{ asset('assets/img/yp/yp_service_1_200x200.jpg') }}" alt="services" class="img-responsive">
                </div>
                <div class="col-xs-6 col-md-3">
                    <img src="{{ asset('assets/img/yp/Texas_YP_Weekend_2016_32_200x200.jpg') }}" alt="services" class="img-responsive">
                </div>
                <div class="col-xs-6 col-md-3">
                    <img src="{{ asset('assets/img/yp/yp_formal_group.png') }}" alt="services" class="img-responsive">
                </div>
                <div class="col-xs-6 col-md-3">
                    <img src="{{ asset('assets/img/yp/yp_shirt.jpg') }}" alt="services" class="img-responsive">
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-heading">OUR MISSION</h2>
                    <p class="lead"><span class="dropcap dropcap-big">P</span>rovide tools to African-Americans and under-served populations to build a foundation for social and economic equality.</p>
                    <br>
                    <h2 class="section-heading">OUR VISION</h2>
                    <p class="lead"><span class="dropcap dropcap-big">A</span> community where all individuals and families are empowered to be self-sufficient.</p>
                    <br>
                    <br>
                </div>
                <div class="col-md-6">
                    @include('partials.aaulypInitiatives')
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>

@stop