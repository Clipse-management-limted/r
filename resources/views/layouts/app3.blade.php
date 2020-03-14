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
<!-- Font Awesome -->
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ asset('mdb/css/bootstrap.min.css') }}">
<!-- Material Design Bootstrap -->
{{-- <link rel="stylesheet" href="{{ asset('mdb/css/mdb.css') }}"> --}}
<!-- Your custom styles (optional) -->
<link rel="stylesheet" href="{{ asset('mdb/css/style.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
.pt-3-half {
padding-top: 1.4rem;
}


</style>

</head>
<body>
    <div id="app">
      {{-- <div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div> --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <a class="navbar-brand" style="height: 70px;padding: 0px 0px;"  href="{{ url('/') }}"><img src="
{{ url('img2/android-icon-72x72.png') }}" alt="  {{ config('app.name', 'Laravel') }}'"
>
      {{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">

                    @auth

      <!-- {{ Auth::user()->name }} -->
      @if(checkPermission(['customer']))

      <li><a href="{{ route('createfood') }}">Create Food Menu</a></li>
      <li><a href="{{ route('updatefood') }}">Update food Menu</a></li>
      <li><a href="{{ route('ViewSales') }}">View Sales</a></li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
        </a>

      <!-- Basic dropdown -->


      <div class="dropdown-menu">
      <div class="panel ">
      <div class="panel-heading">
      <div class="col-md-6">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
      </div>

      <?php $total = 0 ?>
      @foreach(session('cart') as $id => $details)
          <?php $total += $details['price'] * $details['quantity'] ?>
      @endforeach

      <div class="col-md-6 total-section text-right">
          <p>Total:<span class="text-info">N{{ $total }}</span></p>
      </div></div>
      <br>

      <div class="panel-body">


      @if(session('cart'))
          @foreach(session('cart') as $id => $details)
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                {{-- <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
              <strong>{{ $details['name'] }}</strong>
               <span class="price text-info"> N{{ $details['price'] }}</span>
                   <span class="count"> Quantity:{{ $details['quantity'] }}</span>
              </div>
            </div>

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

      </div>
      </div>
      </div>
      <!-- Basic dropdown -->

      {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      </ul> --}}
      </li>


                  @elseif(checkPermission(['administrator']))



                      <li class="nav-item dropdown float-right">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Control Menu
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
       <a class="dropdown-item" href="#">Action</a>
       <a class="dropdown-item" href="{{ route('totops') }}">View Tops Up</a>
      <a class="dropdown-item" href="{{ route('ed') }}">Export Data</a>
         <a class="dropdown-item" href="{{ route('tickets') }}">Tickets</a>
         <a class="dropdown-item" href="{{ route('data') }}">Data</a>
         <a class="dropdown-item" href="{{ route('createfood') }}">Create Food Menu</a>
        <a class="dropdown-item" href="{{ route('updatefood') }}">Update food Menu</a>
        <a class="dropdown-item" href="{{ route('reg_all') }}">Register Staff | Admin| client </a>
     </div>
   </li>
      @elseif(checkPermission(['staff']))
      <li><a href="{{ route('totops') }}">View Tops</a></li>


      @elseif(checkPermission(['invaliduser']))

      @else
      I don't have any records!
      @endif
      @endauth
                      <!-- Authentication Links -->
                      @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                        <li class="nav-item dropdown float-right">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
             Logout
         </a>

           <a class="dropdown-item" href="#">Action</a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             {{ csrf_field() }}
         </form>
       </div>
     </li>
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
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
                            </ul>
                        </li> --}}
                      @endguest
      {{-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> --}}
    </ul>
  </div>
</nav>


        @yield('content')
    </div>


    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery.min.js') }}"></script>

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
