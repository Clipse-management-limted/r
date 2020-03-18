<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('icon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('icon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('icon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title') - {{config('app.name')}}</title>
<meta name="description" content=" ">
<meta name="Author" content=" ">
<meta name="keywords" content=" " />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
  <!-- MDB icon -->
{{-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon"> --}}
<!-- Font Awesome -->
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<!-- Bootstrap core CSS -->
{{-- <link rel="stylesheet" href="{{ asset('mdb/css/bootstrap.min.css') }}"> --}}
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="{{ asset('mdb/css/mdb.min.css') }}">
<!-- Your custom styles (optional) -->
<link rel="stylesheet" href="{{ asset('mdb/css/style.css') }}">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
{{-- https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css --}}
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">
<style>
.pt-3-half {
padding-top: 1.4rem;
}


</style>

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <!-- Branding Image -->
                  <a style="height: 70px;padding: 0px 0px;" class="navbar-brand" href="{{ url('/') }}"><img style="height: 70px;padding: 0px 0px;" src="img/download.png" alt="{{ config('app.name', 'Vanguard’s Personality Award') }}" >
<img style="height: 70px;padding: 0px 0px;" src="img/vanguard-personality.png" alt="{{ config('app.name', 'Vanguard’s Personality Award') }}" >
                  </a>

              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      &nbsp;
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">

                    @auth

<!-- {{ Auth::user()->name }} -->
    @if(checkPermission(['customer']))


                  @elseif(checkPermission(['administrator']))
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('totops') }}">View Tops Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ed') }}">Export Data</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('tickets') }}">Tickets</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('data') }}">Data</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('createfood') }}">Create Food Menu</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('updatefood') }}">Update food Menu</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('reg_all') }}">Register Staff | Admin | client </a></li> --}}
  @elseif(checkPermission(['staff']))



@elseif(checkPermission(['invaliduser']))

@else
    I don't have any records!
@endif
@endauth
                      <!-- Authentication Links -->
                      @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                      @else
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              {{-- <ul class="dropdown-menu">
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                              </ul> --}}
                          </li>
                      @endguest


                  </ul>
              </div>
          </div>
      </nav>

        @yield('content')
    </div>


    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery.min.js') }}"></script>

  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}
<script src="{{ asset('yo/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.buttons.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/jszip.min.js') }}" ></script>
<script src="{{ asset('yo/js/pdfmake.min.js') }}" ></script>
<script src="{{ asset('yo/js/vfs_fonts.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.html5.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.print.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.colVis.min.js') }}" ></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
    <script src="{{ asset('yo/tab.js') }}" ></script>
  @yield('javascript')
    </body>
    </html>
