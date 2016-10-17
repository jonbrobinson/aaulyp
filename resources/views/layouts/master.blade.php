<!DOCTYPE html>
<html lang="en">

    <head>

        <title>@yield('title', 'Austin Area Urban League Young Professionals')</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The Austin Area Urban League Young Professionals (AAULYP) is a National Urban League volunteer auxiliary that targets young professionals ages 21-40 to empower their communities and change lives through the Urban League Movement.">
        <meta name="author" content="Jonbrobinson.com">
        <!-- CSS -->
        @include('partials.mailchimp')
        <link href="{{ asset("assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/main.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/my-custom-styles.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/skins/indianred_custom.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/custom.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("css/libs.css") }}" rel="stylesheet" type="text/css">


        <!-- IE 9 Fallback-->
        <!--[if IE 9]>
        <!--<link href="assets/css/ie.css" rel="stylesheet">-->
        <![endif]-->
        <!-- GOOGLE FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,300' rel='stylesheet' type='text/css'>

        @include('partials/favicon')
        @yield('top_javascript')
    </head>

    <body>

        <div class="wrapper">
            @include('partials.nav')
        </div>

        @yield('content')


        <!-- JAVASCRIPTS -->
        <script src="{{ asset("assets/js/jquery-2.1.1.min.js") }}"></script>
        <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
        @yield('javascript')
        <script src="{{ asset("assets/js/plugins/autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/slick/slick.min.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/stellar/jquery.stellar.min.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js") }}"></script>
        <script src="{{ asset("assets/js/repute-scripts.js") }}"></script>
        <script src="{{ asset("js/libs.js") }}"></script>
        @include('partials.flash')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-78412288-1', 'auto');
            ga('send', 'pageview');

        </script>
    </body>

</html>
