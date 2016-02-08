<!-- NAVBAR -->
<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <!-- TOPBAR -->
        <div class="topbar">
            <ul class="list-inline top-nav">
                <li>Empowering Communitites | Changing Lives</li>
                <li><a href="http://twitter.com/aaulyp"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/AAULYP"><i class="fa fa-facebook"></i></a></li>
            </ul>
        </div>
        <!-- END TOPBAR -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a href="/" class="navbar-brand navbar-logo navbar-logo-bigger">
                <img src="{{ asset("assets/img/aaulyp/logos/UL-black.png") }}" alt="Repute - Responsive Multipurpose Bootstrap Theme">
            </a>
        </div>
        <!-- MAIN NAVIGATION -->
        <div id="main-nav" class="navbar-collapse collapse navbar-mega-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/aaulyp">Our History</a></li>
                        <li><a href="/aaul">Austin Area Urban League</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">NEWS <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="page-services.html">Events</a></li>
                        <li><a href="page-pricing-tables.html">Recaps</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">SERVICES <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu mega-menu-container">
                        <li><a href="page-services.html">Programs</a></li>
                        <li><a href="page-services.html">Volunteer</a></li>
                        <li><a href="page-pricing-tables.html">UYEP</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">TEAM <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/board') }}">Our Team</a></li>
                        <li><a href="{{ url('/team/join') }}">Join Us</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">CONTACT</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
<!-- END NAVBAR -->