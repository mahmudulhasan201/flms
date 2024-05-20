<header class="site-navbar py-4" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="index.html">
                    <!-- <img src="https://preview.colorlib.com/theme/soccer/images/logo.png.webp" alt="Logo"> -->
                    <h1 style="font-family:Fantasy">SCORRER</h1>
                </a>
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="{{route('homepage')}}" class="nav-link">Home</a></li>

                        <li><a href="{{route('league')}}" class="nav-link">League</a></li>

                        <li><a href="{{route('view.leagueList')}}" class="nav-link">Team List</a></li>

                        <li><a href="{{route('league.player.list')}}" class="nav-link">Players</a></li>

                        <li><a href="" class="nav-link">Fixture</a></li>

                        <li><a href="" class="nav-link">Point Table</a></li>

                        @guest('teamGuard')

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="" data-toggle="dropdown">Registration</a>
                            <!-- Dropdown list -->
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('registrationForm')}}">Registration as Owner</a></li>
                                <li><a class="dropdown-item" href="{{route('player.registrationForm')}}">Registration as Player</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('team.loginForm')}}" class="nav-link">Login</a></li>

                        @endguest

                        @auth('teamGuard')
                        <li><a href="{{route('myTeam')}}" class="nav-link">My Team</a></li>
                        <li>{{auth('teamGuard')->user()->ownerName}}</li>
                        <li><a href="{{route('team.logout')}}" class="nav-link">Logout</a></li>
                        @endauth

                    </ul>
                </nav>
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white">
                    <span class="icon-menu h3 text-white"></span></a>
            </div>
        </div>
    </div>
</header>