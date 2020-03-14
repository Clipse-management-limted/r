<!doctype html>
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


        <title>Wristbands.NG</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css2/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css2/font-awesome.min.css') }}">
            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
                <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
        <!-- Fonts -->



    </head>
    <body>
        <div class="flex-center position-ref full-height">
          <div class="top-left">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}"><img src="
          {{ url('img2/android-icon-72x72.png') }}" alt="{{ config('app.name', 'Laravel') }}'"
          >
            </a>
          </div>
            @if (Route::has('login'))
                <div class="top-right links">

                  @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        {{-- <a href="{{ route('register') }}">Register</a> --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" id="">
                  {{-- Wristbands.NG --}}
                <img class="responsive-imagew ui" style="" src="img/4_5979045550677296662.png" alt="{{ config('app.name', 'Laravel') }}" >
                </div>

                <div class="links">
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-pup btn-lg"><a href="{{ url('Temail') }}">E-Ticket</a></button>
                      <button type="button" class="btn btn-se  btn-lg"><a href="{{ url('validate') }}">Accreditation</a></button>
                  <button type="button" class="btn btn-se btn-lg"><a href="{{ url('Raffle') }}">Raffle</a></button>
                    </div>
                  </div>

                  <div class="row">
                    <div class=" col-sm-12">

                  <button type="button" class="btn btn-se  btn-lg"><a href="{{ url('cregister') }}">Register</a></button>
                  <button type="button" class="btn btn-primary btn-lg"><a href="{{ url('vendor') }}">Vendor</a></button>
                  <button type="button" class="btn btn-pup btn-lg"><a href="{{ url('topup') }}">Top - Up</a></button>
                </div>
              </div>

              <div class="row">
                <div class=" col-sm-12">

              <button type="button" class="btn btn-se btn-lg"><a href="{{ url('attend') }}">Attendance</a></button>
              {{-- <button type="button" class="btn btn-primary btn-lg"><a href="{{ url('vendor') }}">Vendor</a></button>
              <button type="button" class="btn btn-danger btn-lg"><a href="{{ url('topup') }}">Top - Up</a></button> --}}
            </div>
          </div>
                </div>

            </div>


            {{-- <div class="divFooter pull-right" style=""><img  src="icon/ms-icon-70x70.png" alt="{{ config('app.name', 'Laravel') }}" /></div>
  </div> --}}

      </body>
</html>
