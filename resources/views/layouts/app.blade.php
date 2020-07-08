<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myCss.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
{{--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background: #343a40;">
            <div class="container" style="color:white;">  

                @if (Auth::check() && Auth::user()->role == 1)
                <a  style="color:white;" class="navbar-brand" href="{{route('users.index')}}">
                    Korisinici
                </a>
                <a  style="color:white;" class="navbar-brand" href="{{route('cities.index')}}">Gradovi</a>
                <a  style="color:white;" class="navbar-brand" href="{{route('states.index')}}">Države</a>
                <a style="color:white;" class="navbar-brand" href="{{route('logs')}}">Logovi</a>
                @endif
                @if (Auth::check() && Auth::user()->role == 2)
                <a  style="color:white;" class="navbar-brand" href="{{route('guests.index')}}">Gosti</a>
                <a  style="color:white;" class="navbar-brand" href="{{route('landlords.index')}}">Stanodavci</a>
                <a  style="color:white;" class="navbar-brand" href="{{route('renting')}}">Iznajmljivanja</a>
                <a  style="color:white;" class="navbar-brand" href="{{route('showDebt')}}">Zaduženja</a>
                @endif
                @if (Auth::check() && Auth::user()->role == 3)
                <a  style="color:white;" class="navbar-brand" href="{{route('inspectorDebt')}}">Zaduženja</a>
                <a  style="color:white;" class="navbar-brand" href="{{route('statistic')}}">Statistika</a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li style="display:flex;padding-top: 15px;">
                            <p  style="color:white;">Prijavljeni ste kao: {{Auth::user()->name}}</p>
                                <a  style="margin: 0 20px;color: inherit;color:white;" href="{{ route('logout') }}"
                                    >
                                   Odjavi me
                                </a>
                            </li>
                        @endauth
                    </ul>
                    {{-- <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> --}}
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="section footer-classic context-dark bg-image" style="background: #343a40;">
            <div class="container" id="foot">
                <h5><b>Važni telefoni</b></h5>
              <div class="row row-30">
                <!--<div class="col-md-4 col-xl-5">
                  <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                    <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
                    <!-- Rights
                    <p class="rights"><span>©  </span><span class="copyright-year">2018</span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved.</span></p>
                  </div>
                </div>-->
                <div class="col-md-3">
                  <dl class="contact-list">
                    <dt>Policija</dt>
                    <dd>122</dd>
                  </dl>
                  <dl class="contact-list">
                    <dt>Vatrogasna služba</dt>
                    <dd>123</dd>
                  </dl>
                  <dl class="contact-list">
                    <dt>Hitna pomoć</dt>
                    <dd>124
                    </dd>
                  </dl>
                </div>
                <div class="col-md-3">
                <dl class="contact-list">
                  <dt>Pomoć na putu</dt>
                  <dd>19807
                  </dd>
                </dl>
                <dl class="contact-list">
                  <dt>Međunarodni broj za hitne pozive</dt>
                  <dd>112
                  </dd>
                </dl>
                <dl class="contact-list">
                  <dt>MUP</dt>
                  <dd>19819
                  </dd>
                </dl>
              </div>
              <div class="col-md-3">
                <dl class="contact-list">
                  <dt>Vremenska prognoza</dt>
                  <dd>044 800 200
                  </dd>
                </dl>
                <dl class="contact-list">
                  <dt>Tačno vrijeme</dt>
                  <dd>125
                  </dd>
                </dl>
                <dl class="contact-list">
                  <dt>Služba za telegrame</dt>
                  <dd>126
                  </dd>
                </dl>
              </div>
              <div class="col-md-3">
                  <span><b>Kontakt</b></span>
                <dl class="contact-list">
                  <dt>Tehnička podrška</dt>
                  <dd>+382 20 123 456</dd>
                  <dt>Email tehničke podrške</dt>
                  <dd>support@isto.me</dd>
                </dl>
              </div>
              </div>
            </div>
            <div class="row no-gutters social-container">
              <div class="col"><a class="social-inner" href="http://www.mvp.gov.me/rubrike/konzularni-poslovi/Vizni-rezim-ino/" target="_blank" rel="noopener noreferrer" ><span class="icon mdi mdi-facebook"></span><span>Vizni režim</span></a></div>
              <div class="col"><a class="social-inner" href="https://www.montenegro.travel/" target="_blank" rel="noopener noreferrer"><span class="icon mdi mdi-instagram" ></span><span>NTO</span></a></div>
              <div class="col"><a class="social-inner" href="https://budva.travel/" target="_blank" rel="noopener noreferrer"><span class="icon mdi mdi-twitter" ></span><span>TOB</span></a></div>
              <div class="col"><a class="social-inner" href="https://www.montenegro.travel/info/granicni-prelazi-i-vize" target="_blank" rel="noopener noreferrer"><span class="icon mdi mdi-youtube-play"></span><span>Granični prelazi i vize</span></a></div>
            </div>
          </footer>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="/js/myJs.js"></script>
</html>
