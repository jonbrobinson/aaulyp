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
                <li class="active">Fundraising</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.sidebar.committees', [request()->route()->__get('name') => "list-group-item current"] );
                </div>
                <div class="col-md-6">FUNDRAISING COMMITTEE</h3>
                    <p>
                        Responsible for ensuring that our organization is self-sustaining and thriving, so that we can offer more financial support to the initiatives of our affiliate chapter; Serves as a liaison to all of the other committees                    </p>

                    <br>
                    <h3>Activities</h3>

                    <p>* YP Bash and YP Weekend</p>
                    <p>* Organize Quarterly events to help raise donations for Urban League</p>
                    <p>* Build connections with Corporate Sponsors</p>
                    <p>* Integrate </p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD</p>
                    <p>Location: TBD</p>
                    <p>Chair: Open</p>
                    <p>Contact: <a href="mailto:fundraising.aaulyp@gmail.com">fundraising.aaulyp@gmail.com</a></p>

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