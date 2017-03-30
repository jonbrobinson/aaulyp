<!-- NAVBAR -->
<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <!-- TOPBAR -->
        <div class="topbar">
            <ul class="list-inline top-nav">
                <li>Empowering Communitites | Changing Lives</li>
                <li><a href="https://twitter.com/aaulyp"><i class="fa fa-twitter"></i></a></li>
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
                    <a href="{{ url('/') }}" class="dropdown-toggle">HOME</a>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ABOUT US<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/aaulyp') }}">Our History</a></li>
                        <li><a href="{{ url('http://www.aaul.org') }}">Austin Area Urban League</a></li>
                        <li><a href="{{ url('http://www.nulyp.org') }}">National Urban League Young Professionals</a></li>
                        <li><a href="{{ url('http://www.nul.org') }}">National Urban League</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown ">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">LEADERSHIP <i class="fa fa-angle-down"></i></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li><a href="{{ url('/board') }}">Officers</a></li>--}}
                        {{--<li><a href="{{ url('http://www.aaul.org') }}">Committees</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">EVENTS <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/events') }}">Upcoming Events</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">MEDIA <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        {{--<li><a href="{{ url('/events') }}">Upcoming Events</a></li>--}}
                        <li><a href="{{ url('/photos') }}">Photos</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">GET INVOLVED <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/join') }}">Become A Member</a></li>
                        <li class="dropdown ">
                            <a href="{{ url('/committee/advocacy') }}">Join A Committee
                                {{--<i class="fa fa-angle-right"></i>--}}
                            </a>
                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="{{ url('/committee/advocacy') }}">Advocacy</a></li>--}}
                                {{--<li><a href="{{ url('/committee/community') }}">Community Outreach</a></li>--}}
                                {{--<li><a href="{{ url('/committee/communication') }}">Communications</a></li>--}}
                                {{--<li><a href="{{ url('/committee/fundraising') }}">Fundraising</a></li>--}}
                                {{--<li><a href="{{ url('/committee/membership') }}">Membership/Social</a></li>--}}
                                {{--<li><a href="{{ url('/committee/development') }}">Professional Development</a></li>--}}
                            {{--</ul>--}}
                        </li>
                    </ul>
                </li>
                {{--<li class="dropdown ">--}}
                    {{--<a href="{{ url('/donate') }}" class="dropdown-toggle">DONATE</a>--}}
                {{--</li>--}}
                {{--<li class="dropdown ">--}}
                    {{--<a href="{{ url('/contact') }}" class="dropdown-toggle">CONTACT</a>--}}
                {{--</li>--}}
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">CONTACT US <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/contact') }}">Send Us A Message</a></li>
                        <li class="dropdown ">
                            {{--<a href="{{ url('/mail') }}">Join Our Mailing List--}}
                                {{--<i class="fa fa-angle-right"></i>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ url('/committee/advocacy') }}">Advocacy</a></li>--}}
                            {{--<li><a href="{{ url('/committee/community') }}">Community Outreach</a></li>--}}
                            {{--<li><a href="{{ url('/committee/communication') }}">Communications</a></li>--}}
                            {{--<li><a href="{{ url('/committee/fundraising') }}">Fundraising</a></li>--}}
                            {{--<li><a href="{{ url('/committee/membership') }}">Membership/Social</a></li>--}}
                            {{--<li><a href="{{ url('/committee/development') }}">Professional Development</a></li>--}}
                            {{--</ul>--}}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
<!-- END NAVBAR -->