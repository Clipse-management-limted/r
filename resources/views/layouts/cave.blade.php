<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

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


    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- Custom fonts for this template-->
    <link href="{{ asset('caveman/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="{{ asset('caveman/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('caveman/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      .boddivy {

      		background-image:url(caveman/assets/img/TheCavemenBackground.jpg);
      		background-repeat: no-repeat;
      		background-attachment: fixed;
      		background-size: cover;
      }
      .sidebar .nav-item .nav-link .img-profile, .topbar .nav-item .nav-link .img-profile {
          height: 4rem;
          width: 4rem;
      }

      .btn-primary {
          color: #fff;
          background-color: #100c09;
          border-color: #e74a3b;
      }

      .bg-white2 {
          background-color: linear-gradient(180deg,#3a3b45 10%,#b41770 100%);
      }

      </style>
</head>
    <body id="page-top">
    <div id="app">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="boddivy">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <!-- Topbar Search -->
          <!-- Branding Image -->
                <a style="height: 70px;padding: 0px 0px;" class="navbar-brand" href="#"><img src="caveman/assets/img/TheCavementext[photoutils.com].png" alt="" >

                </a>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> </span>
                    <img class="img-profile rounded-circle" src="caveman/assets/img/CAVE MEN/1.png">
                  </a>

                </li>
</ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        @yield('content')
    </div>

    <!-- Bootstrap core JavaScript-->
<script src="{{ asset('caveman/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('caveman/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('caveman/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('caveman/assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('caveman/assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('caveman/assets/js/sscript.js') }}"></script>


    @yield('javascript')
</body>
</html>
