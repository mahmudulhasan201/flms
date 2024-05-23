<header class="site-navbar py-4" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="">
                    <h1 style="font-family:Fantasy">CRICKET</h1>
                    <!-- <img src="https://preview.colorlib.com/theme/soccer/images/logo.png.webp" alt="Logo"> -->
                </a>
            </div>

            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="{{route('homepage')}}" class="nav-link">Home</a></li>

                        <li><a href="{{route('league')}}" class="nav-link">League</a></li>

                        <li><a href="{{route('view.teamList')}}" class="nav-link">Team List</a></li>

                        <li><a href="{{route('league.player.list')}}" class="nav-link">Players</a></li>

                        <li><a href="{{route('web.fixture')}}" class="nav-link">Fixture</a></li>

                        <li><a href="{{route('web.pointTable')}}" class="nav-link">Point Table</a></li>

                        @php
                        $isTeamGuard = Auth::guard('teamGuard')->guest();
                        $isPlayerGuard = Auth::guard('playerGuard')->guest();
                        @endphp

                        @if($isTeamGuard && $isPlayerGuard)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="" data-toggle="dropdown">Registration</a>
                            <!-- Dropdown list -->
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('registrationForm')}}">Registration as Team</a></li>
                                <li><a class="dropdown-item" href="{{route('player.registrationForm')}}">Registration as Player</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="" data-toggle="dropdown">Login</a>
                            <!-- Dropdown list -->
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('team.loginForm')}}">Login as Team</a></li>
                                <li><a class="dropdown-item" href="{{route('player.login.form')}}">Login as Player</a></li>
                            </ul>
                        </li>
                        @endif

                        @auth('teamGuard')
                        <li><a href="{{route('myTeam')}}" class="nav-link">My Team</a></li>
                        <li>{{auth('teamGuard')->user()->ownerName}}</li>
                        <li><a href="{{route('team.logout')}}" class="nav-link">Logout</a></li>
                        @endauth

                        @auth('playerGuard')
                        <li><a href="{{route('player.profile')}}" 
                        class="nav-link">{{auth('playerGuard')->user()->fullName}}</a></li>
                        <li><a href="{{route('player.logout')}}" class="nav-link">Logout</a></li>
                        @endauth
                        
                    </ul>

                </nav>
    
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white">
                    <span class="icon-menu h3 text-white"></span></a>
            </div>
        </div>
    </div>
</header>