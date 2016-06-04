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
                    <h3 class="section-heading">COMMUNICATION COMMITTEE</h3>
                    <p>
                        Maintain cooperative relationships with representatives of the community and with representatives from print, online, and broadcast journalism.  This committee will also promote the advertisement of events/programs, prepare press releases, maintain the AAULYP web presence and newsletters.  This committee will be responsible for the creation and keeping of the AAULYP branding.  All media representation must be approved by the executive board.
                    </p>

                    <br>
                    <h3>Activities</h3>

                    <p>* Maintain primary social media channels Facebook, Twitter, Instagram</p>
                    <p>* Prepare Monthly Newsletter of AAULYP activities</p>
                    <p>* Create content to uplift and Empower Young Professionals</p>
                    <p>* Generate Content or AAULYP Website</p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD</p>
                    <p>Location: TBD</p>
                    <p>Chair: Jonathan Robinson</p>
                    <p>Contact: <a href="mailto:pr.aaulyp@gmail.com">pr.aaulyp@gmail.com</a></p>

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