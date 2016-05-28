@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Our Team</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/board') }}">Team</a></li>
                <li class="active">Our Team</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            @include('partials.officers')

            <h2 class="section-heading">COMMITTEE CHAIRS</h2>
            <!-- TEAM -->
            <section class="team">
                <div class="section-content">
                    <div class="col-md-4">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/communication120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Jonathan Robinson</h3>
                                <strong>Communications</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Dynamically evolve client-based portals through world-class models. Phosfluorescently simplify cross-platform convergence and multimedia based portals. Rapidiously.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/advocacy120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Chris Tolbert</h3>
                                <strong>Political</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Dynamically evolve client-based portals through world-class models. Phosfluorescently simplify cross-platform convergence and multimedia based portals. Rapidiously.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/community120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Alexis Reddick</h3>
                                <strong>Community Outreach</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Dynamically evolve client-based portals through world-class models. Phosfluorescently simplify cross-platform convergence and multimedia based portals. Rapidiously.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/prodev120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Kobla Teteys</h3>
                                <strong>Professional Development</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Dynamically evolve client-based portals through world-class models. Phosfluorescently simplify cross-platform convergence and multimedia based portals. Rapidiously.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop