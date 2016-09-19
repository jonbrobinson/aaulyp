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
                    <h3 class="section-heading">MEMBERSHIP COMMITTEE</h3>
                    <p>
                        Our Membership Committee is responsible for promoting hospitality within our organization. Our liasons engage our membership base level. Other responsibilities include membership recruitment initiatives and are actively devoted to ensuring membership retention and involvement.
                    </p>

                    <br>
                    <h3>Activities</h3>

                    <p>* Liaisons to transition members into the Austin YP Community</p>
                    <p>* Organize mixers for members and future members to network and build connections</p>
                    <p>* Profile members in our spotlight post and media outlets</p>
                    <p>* Cultivate opportunities to engage members in all areas of interest</p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD</p>
                    <p>Location: TBD</p>
                    <p>Contact: <a href="mailto:membership.aaulyp@gmail.com">membership.aaulyp@gmail.com</a></p>

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