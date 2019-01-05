@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Membership</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/board') }}">Team</a></li>
                <li class="active">Join Us</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <section>

                <div class="col-md-12 row">
                    <div class="col-md-12 row">
                        <h1>
                            Redirecting to AAULYP Membership Portal in <span id="countdown">5</span> seconds
                        </h1>
                    </div>
                </div>

            </section>

        </div>
    </div>
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop

@section('javascript')
        <!-- JavaScript part -->
<script type="text/javascript">

    window.onload = function(){
        const url = 'https://www.joinit.org/o/austin-area-urban-league-young-professionals/HxtNtqM2ZcEk2zyAt';

        function countdown(secs, redirect_url) {
            secs = secs - 1;

            if (secs < 0) {
                // Chnage your redirection link here
                window.location = redirect_url;
            } else {
                // Update remaining seconds
                document.getElementById("countdown").innerHTML = secs;
                // Count down using javascript
            }
        }

        var interval = setInterval(function(){
            // Total seconds to wait
            var seconds = document.getElementById("countdown").innerHTML;
            console.log(seconds);
            countdown(seconds, url)
        }, 1000);

        // Run countdown function

    };


</script>
@stop