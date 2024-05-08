
<!DOCTYPE html>
<html lang="en">
<head>
<title>Soccer &mdash; Website by Colorlib</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{url('frontend/css/fonts/style.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/flaticon.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/aos.css')}}"> 
<link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
<script nonce="16341e10-438c-4266-a0bf-82b5c020c82b">try{(function(w,d){!function(ng,nh,ni,nj){ng[ni]=ng[ni]||{};ng[ni].executed=[];ng.zaraz={deferred:[],listeners:[]};ng.zaraz._v="5594";ng.zaraz.q=[];ng.zaraz._f=function(nk){return async function(){var nl=Array.prototype.slice.call(arguments);ng.zaraz.q.push({m:nk,a:nl})}};for(const nm of["track","set","debug"])ng.zaraz[nm]=ng.zaraz._f(nm);ng.zaraz.init=()=>{var nn=nh.getElementsByTagName(nj)[0],no=nh.createElement(nj),np=nh.getElementsByTagName("title")[0];np&&(ng[ni].t=nh.getElementsByTagName("title")[0].text);ng[ni].x=Math.random();ng[ni].w=ng.screen.width;ng[ni].h=ng.screen.height;ng[ni].j=ng.innerHeight;ng[ni].e=ng.innerWidth;ng[ni].l=ng.location.href;ng[ni].r=nh.referrer;ng[ni].k=ng.screen.colorDepth;ng[ni].n=nh.characterSet;ng[ni].o=(new Date).getTimezoneOffset();if(ng.dataLayer)for(const nt of Object.entries(Object.entries(dataLayer).reduce(((nu,nv)=>({...nu[1],...nv[1]})),{})))zaraz.set(nt[0],nt[1],{scope:"page"});ng[ni].q=[];for(;ng.zaraz.q.length;){const nw=ng.zaraz.q.shift();ng[ni].q.push(nw)}no.defer=!0;for(const nx of[localStorage,sessionStorage])Object.keys(nx||{}).filter((nz=>nz.startsWith("_zaraz_"))).forEach((ny=>{try{ng[ni]["z_"+ny.slice(7)]=JSON.parse(nx.getItem(ny))}catch{ng[ni]["z_"+ny.slice(7)]=nx.getItem(ny)}}));no.referrerPolicy="origin";no.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(ng[ni])));nn.parentNode.insertBefore(no,nn)};["complete","interactive"].includes(nh.readyState)?zaraz.init():ng.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body>
<div class="site-wrap">
<div class="site-mobile-menu site-navbar-target">
<div class="site-mobile-menu-header">
<div class="site-mobile-menu-close">
<span class="icon-close2 js-menu-toggle"></span>
</div>
</div>
<div class="site-mobile-menu-body"></div>
</div>





 
@include('frontend.fixed.header')  








<div>
@yield('world_cup')
</div>
 

z
<div class="container md-6">
<div class="pt-5">
@yield('content')
</div>
</div>





@include('frontend.fixed.footer')









</div>

<script src="{{url('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{url('frontend/js/jquery-ui.js')}}"></script>
<script src="{{url('frontend/js/popper.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.stellar.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{url('frontend/js/aos.j')}}s"></script>
<script src="{{url('frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.sticky.js')}}"></script>
<script src="{{url('frontend/js/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793" integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg==" data-cf-beacon='{"rayId":"87b63636ecbbf444","version":"2024.4.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>

