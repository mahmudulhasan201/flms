<header class="site-navbar py-4" role="banner">
<div class="container">
<div class="d-flex align-items-center">
<div class="site-logo">
<a href="index.html">
<img src="https://preview.colorlib.com/theme/soccer/images/logo.png.webp" alt="Logo"> 
</a>
</div>
<div class="ml-auto">
<nav class="site-navigation position-relative text-right" role="navigation">
<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
<li class="active"><a href="{{route('homepage')}}" class="nav-link">Home</a></li>
<li><a href="{{route('matches')}}" class="nav-link">Matches</a></li>
<li><a href="players.html" class="nav-link">Players</a></li>
<!-- <li><a href="blog.html" class="nav-link">Blog</a></li> -->
<li><a href="contact.html" class="nav-link">Contact</a></li>

@guest('customerGuard')
<li><a href="{{route('registrationForm')}}" class="nav-link">Registration</a></li>

<li><a href="{{route('loginForm')}}" class="nav-link">Login</a></li>

@endguest

@auth('customerGuard')

<li><a href="{{route('customer.logout')}}" class="nav-link">Logout</a></li>
@endauth

</ul>
</nav>
<a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white">
    <span class="icon-menu h3 text-white"></span></a>
</div>
</div>
</div>
</header>