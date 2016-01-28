<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Austin Area Urban League Young Professionals</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Responsive Multipurpose Bootstrap Theme">
        <meta name="author" content="The Develovers">
        <!-- CSS -->
        <link href="{{ asset("assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/main.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/my-custom-styles.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/skins/indianred.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/css/custom.css") }}" rel="stylesheet" type="text/css">


        <!-- IE 9 Fallback-->
        <!--[if IE 9]>
        <!--<link href="assets/css/ie.css" rel="stylesheet">-->
        <![endif]-->
        <!-- GOOGLE FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,400italic,700,400,300' rel='stylesheet' type='text/css'>

        @include('partials/favicon')
    </head>

    <body>
        <div class="wrapper">
            @include('partials.nav')
        </div>

        @yield('content')


        <!-- JAVASCRIPTS -->
        <script src="{{ asset("assets/js/jquery-2.1.1.min.js") }}"></script>
        <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("assets/js/repute-scripts.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js") }}"></script>
        @yield('javascript')
        <script src="{{ asset("assets/js/plugins/slick/slick.min.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/stellar/jquery.stellar.min.js") }}"></script>
        <script src="{{ asset("assets/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js") }}"></script>
    </body>

</html>