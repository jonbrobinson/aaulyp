<!-- NAVBAR -->
<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <!-- TOPBAR -->
        <div class="topbar">
                @if($signedIn)
                    <p class="top-nav">Hi {{ $user->name }} | </p>
                @endif
            <ul class="list-inline top-nav">
                <li>Empowering Communitites | Changing Lives</li>
                <li><a href="http://twitter.com/aaulyp"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/AAULYP"><i class="fa fa-facebook"></i></a></li>
                @if($signedIn)
                    <li><a href="/logout"><i class="fa fa-sign-out"></i></a></li>
                @else
                    <li><a href="/login"><i class="fa fa-user"></i></a></li>
                @endif
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
                        <li><a href={{ url('/board') }}>Meet the YP Officers</a></li>
                        <li><a href="{{ url('/aaul') }}">Austin Area Urban League</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">NEWS <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/events') }}">Events</a></li>
                        {{--<li><a href="/newsletters">Newsletters</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">GET INVOLVED <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/team/join') }}">Membership</a></li>
                        <li class="dropdown ">
                            <a href="#">Committees <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/committee/community') }}">Community Outreach</a></li>
                                <li><a href="{{ url('/committee/communication') }}">Communications</a></li>
                                <li><a href="{{ url('/committee/fundraising') }}">Fundraising</a></li>
                                <li><a href="{{ url('/committee/membership') }}">Membership/Social</a></li>
                                <li><a href="{{ url('/committee/development') }}">Professional Development</a></li>
                                <li><a href="{{ url('/committee/political') }}">Political</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="{{ url('/donate') }}" class="dropdown-toggle">DONATE</a>
                </li>
                <li class="dropdown ">
                    <a href="{{ url('/contact') }}" class="dropdown-toggle">CONTACT</a>
                </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
<!-- END NAVBAR -->