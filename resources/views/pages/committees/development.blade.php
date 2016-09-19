@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Committees</h1>
            <ol class="breadcrumb">
                <li><a href="/">Get Involved</a></li>
                <li><a href="{{ "/commitee/".request()->route()->__get('name') }}">Committees</a></li>
                <li class="active">Communications</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.sidebar.committees', [request()->route()->__get('name') => "list-group-item current"] )
                </div>
                <div class="col-md-6">
                    <h3 class="section-heading">PROFESSIONAL DEVELOPMENT COMMITTEE</h3>
                    <p>
                        Our Development Committee is responsible for encouraging our group of young professionals to remain diligent and encouraged in their respective careers.Other initiatives include offer tools and resources to equip our membership as they navigate through the workforce. Promotes taking a proactive approach when it comes to pursuing passions and endorsing interpersonal growth; Connects our organization with other entities that are devoted to enhancing personal performance
                    </p>
                    <br>
                    <h3>Activities</h3>

                    <p>* Organize workshops to build professional skills</p>
                    <p>* Host events to promote networking of local industries</p>
                    <p>* Cultivate relationships with other young professional organizations</p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD</p>
                    <p>Location: TBD</p>
                    <p>Chair: Kobla Tetey</p>
                    <p>Contact: <a href="mailto:careers.aaulyp@gmail.com">careers.aaulyp@gmail.com</a></p>

                </div>
                <div class="col-md-3">
                    <a class="twitter-timeline" href="https://twitter.com/AAULYP" data-widget-id="730989146307600386">Tweets by @AAULYP</a>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')

    @section('javascript')
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    @stop
</div>

@stop