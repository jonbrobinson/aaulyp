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
                <li><a href="/aaulyp">About</a></li>
                <li class="active">Our History</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul id="sidebar-nav" class="sidebar-nav margin-bottom-30px">
                        <li class="list-group-item current"><a href="/aaulyp">Our History</a></li>
                        <li class="list-group-item "><a href="/aaul">Austin Area Urban League</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <section>
                        <p>Austin Area Urban League Young Professionals [AAULYP's or YP's] are committed to helping make Austin a better city through diversity and urban culture. The purpose and mission of the Urban League and the Young Professionals in particular is to provide young people with resources that encourage networking and interaction with social, cultural, educational and political institutions and to help cultivate innovative ideas and dynamic dialogue in Austin amongst “Young Professionals”.</p>
                        <p>Over the years, significant steps have been made in removing the early prejudices and barriers, thus allowing many of our constituents to learn to grow, and to thrive in the Austin community. As we move forward with our programs, we have been able to adapt to the ever-changing Austin environment – one that has grown from being merely the state capital to that of a thriving technological hub that incorporates the community, government, and the business sectors.</p>
                        <br>
                        <h2 class="section-heading">OUR MISSION</h2>
                        <p class="lead"><span class="dropcap dropcap-big">P</span>rovide tools to African-Americans and under-served populations to build a foundation for social and economic equality.</p>
                        <br>
                        <h2 class="section-heading">OUR VISION</h2>
                        <p class="lead"><span class="dropcap dropcap-big">A</span> community where all individuals and families are empowered to be self-sufficient.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>

@stop