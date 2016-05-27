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
            <h2 class="section-heading">AAULYP OFFICERS</h2>
            <!-- BOARD -->
            <section class="team">
                <div class="section-content">
                    <div class="col-md-5">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/president120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Omari Montique</h3>
                                <strong>President</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Omari has been the with the urban league since 2013 and prior to serving as YP president Omari served as Vice-President. Omari Graduated from Texas State University where he studied Finance and currently works as a financial adivices.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/vicepresident_120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Erika Crespo</h3>
                                <strong>Vice President</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Ericka has been a part of the Urban League since 2014. Actively serving in the community Ericka joined the urban league to fellowship and volunteer with young professionals that share her same passion for community engagement and service.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/secretary120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Nachele Grooms</h3>
                                <strong>Secretary</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Nachele has been been with the AAULYYP since the relaunch in 2011. A true Austin native Nachele cultivates connections through the Austin Area. A graduate of Texas State University Nachele with a degree in Legal Studies previously held the position as YP Social chair and curretly is a Human Resource manager for a </p>
                                <div class="clearfix"></div>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="team-member media">
                            <img src="{{ asset('assets/img/aaulyp/team/treasurer120x120.png') }}" class="media-object img-circle pull-left" alt="" />
                            <div class="media-body">
                                <h3 class="media-heading team-name">Marcus Anderson</h3>
                                <strong>Treasurer</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>Marcus cares for his community and as TReasrurer wants to help YOung Profressionals in Austin.  CUrrently Studying to get his masters in Finance MArcus decided that he could help the YP organization with his professional skill set and hunger to help others.</p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END TEAM -->

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
                                <p>Jonathan is a web developer during the day but as transplant from California Jonathan wants to spread the the powerful message of the YP's and Urban League Movement</p>
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
                                <p>Chris wanted to make a differnce in the community and knew Polical Education has a great impact. As a lawyer Chris wants to help educate young professionals on their rights and create opportunities to get involved in their civic engagement.</p>
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
                                <h3 class="media-heading team-name">Alexis Redick</h3>
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
                                <h3 class="media-heading team-name">Kobla Tetey</h3>
                                <strong>Professional Development</strong>
                                <hr class="pull-left">
                                <div class="clearfix"></div>
                                <p>FRom DC to Dallas to AUs</p>
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