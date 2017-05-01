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
                <li class="active">Community Outreach</li>
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
                    <h3 class="section-heading">COMMUNITY OUTREACH COMMITTEE</h3>
                    <p>
                        Our Community Outreach committee is responsible for coordinating our service initiatives. Keeping us engaged and involved in making a difference in our local community. Promotes the mission of our organization in a tangible and impactful manner. Connects our organization with other entities that are active in the Greater Austin Area.
                    </p>

                    <br>
                    <h3>Activities</h3>

                    <p>* Coordinate Monthly Service Events</p>
                    <p>* Work with YP partners to create service opportunities to impact the community</p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD - Check with Committee chair</p>
                    <p>Location: TBD</p>
                    <p>Chair: Omari Montique</p>
                    <p>Contact: <a href="mailto:community.aaulyp@gmail.com">community.aaulyp@gmail.com</a></p>

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