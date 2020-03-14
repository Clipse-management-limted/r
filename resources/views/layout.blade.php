<!DOCTYPE html>
<html>
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

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css2/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css2/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('js2/jquery.min.js') }}" ></script>
    <script src="{{ asset('js2/popper.min.js') }}" ></script>
  <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
</head>
<body>
  <div id="app">

    <nav style="background-color:#c93d79!important;" class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}"><img src="
    {{ url('img2/android-icon-72x72.png') }}" alt="{{ config('app.name', 'Laravel') }}'"
    >
      </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse " id="collapsibleNavbar">
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right float-lg-right">


                          @auth

        <!-- {{ Auth::user()->name }} -->
          @if(checkPermission(['customer']))

          <li class="nav-item"><a class="nav-link" href="{{ route('ViewSales') }}">View Sales</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                </a>

                <ul class="dropdown-menu">
                  <div class="row total-header-section">
                      <div class="col-lg-6 col-sm-6 col-6">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                      </div>

                      <?php $total = 0 ?>
                      @foreach(session('cart') as $id => $details)
                          <?php $total += $details['price'] * $details['quantity'] ?>
                      @endforeach

                      <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                          <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                      </div>
                  </div>

                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                          <div class="row cart-detail">
                              {{-- <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                  <img src="{{ $details['photo'] }}" />
                              </div> --}}
                              <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                  <p>{{ $details['name'] }}</p>
                                  <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                              </div>
                          </div>
                      @endforeach
                  @endif
                  <div class="row">
                      <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                          <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                      </div>
                  </div>
                </ul>
            </li>

                        @elseif(checkPermission(['administrator']))
                      <li class="nav-item"><a class="nav-link" href="{{ route('totops') }}">View Tops Up</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('ed') }}">Export Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tickets') }}">Tickets</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('data') }}">Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('createfood') }}">Create Food Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('updatefood') }}">Update food Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reg_all') }}">Register Staff | Admin| client </a></li>
        @elseif(checkPermission(['staff']))
          <li class="nav-item"><a class="nav-link" href="{{ route('totops') }}">View Tops</a></li>


        @elseif(checkPermission(['invaliduser']))

        @else
          I don't have any records!
        @endif
        @endauth
                            <!-- Authentication Links -->
                            @guest
                              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @else
                              <!-- Example split danger button -->
<div class="btn-group">
<button type="button" class="btn btn-danger">  {{ Auth::user()->name }}</button>
<button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu">
  <a style="color: #1d2124;" class=" dropdown-item dropdown-toggle" href="{{ route('logout') }}" id="navbardrop" data-toggle="dropdown"   onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    Logout

  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</div>
</div>

                            @endguest
      </ul>
      {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
    </div>
  </nav>
<br><br>
  <div class="container">
    @yield('content')
  </div>


</div>


    @yield('scripts')
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
    <script src="{{ asset('yo/tab.js') }}" ></script>
  @yield('javascript')

</body>
</html>
