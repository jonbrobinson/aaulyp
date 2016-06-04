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
                <li class="active">Political</li>
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
                    <h3 class="section-heading">POLITICAL COMMITTEE</h3>
                    <p>
                        Responsible for keeping our membership base informed and involved in the political process, with a special focus on what is going on locally; Promotes our organization as a noteworthy collection of engaged citizens that are passionate about policy reform that promotes our focus on socioeconomic advancement; Connects our organization with other entities that share in our purpose; Assists with bringing the sexy back into politics for our age group and demographic.
                    </p>

                    <br>
                    <h3>Activities</h3>

                    <p>* Organize/Host town-hall meetings on important events, and policy changes</p>
                    <p>* Promote our organization to other entities that are engaged in the political process</p>
                    <p>* Present/Attend key Issues in Civic proceedings</p>
                    <p>* Provide an inside perspective into the local political process</p>

                    <br>
                    <h3>Meeting Information</h3>
                    <p>When: TBD</p>
                    <p>Location: TBD</p>
                    <p>Chair: Chris Tolbert</p>
                    <p>Contact: <a href="mailto:poly.edu.aaulyp@gmail.com">poly.edu.aaulyp@gmail.com</a></p>

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