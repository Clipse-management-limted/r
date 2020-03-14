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
            <a style="height: 70px;padding: 0px 0px;" class="navbar-brand" href="{{ url('/') }}"><img src="
{{ url('img2/android-icon-72x72.png') }}" alt="Bootstrappin'"
>
                {{ config('app.name', 'Laravel') }}
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

        {{-- <div class="row cart-detail">
            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                <img src="{{ $details['photo'] }}" />
            </div>
            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                <p>{{ $details['name'] }}</p>
                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
            </div>
        </div> --}}
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
              <li class="nav-item"><a class="nav-link" href="{{ route('totops') }}">View Tops Up</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('ed') }}">Export Data</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tickets') }}">Tickets</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('data') }}">Data</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('createfood') }}">Create Food Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('updatefood') }}">Update food Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
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
                  <li class="dropdown">
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
                  </li>
                @endguest


            </ul>
        </div>
    </div>
</nav>








<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
    </a>

    <ul class="dropdown-menu">
      <div class="card">
        <div class="card-body">
      <div class="row total-header-section">
          <div class="col-md-6">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
          </div>

          <?php $total = 0 ?>
          @foreach(session('cart') as $id => $details)
              <?php $total += $details['price'] * $details['quantity'] ?>
          @endforeach

          <div class="col-md-6 total-section text-right">
              <p>Total:<span class="text-info">${{ $total }}</span></p>
          </div>
      </div>
    </div>
</div>

      @if(session('cart'))
          @foreach(session('cart') as $id => $details)
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <strong>{{ $details['name'] }}</strong>
               <span class="price text-info"> ${{ $details['price'] }}</span>
                   <span class="count"> Quantity:{{ $details['quantity'] }}</span>
              </div>
            </div>

              {{-- <div class="row cart-detail">
                  <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                      <img src="{{ $details['photo'] }}" />
                  </div>
                  <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                      <p>{{ $details['name'] }}</p>
                      <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                  </div>
              </div> --}}
          @endforeach
      @endif
      <div class="row">
          <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
              <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
          </div>
      </div>
    </ul>
</li>




<!-- MAIL_DRIVER=smtp
MAIL_HOST=smtp.dreamhost.com
MAIL_PORT=587
MAIL_USERNAME=tickets@celebrityfc.ng
MAIL_PASSWORD=Celeb.pass1
MAIL_ENCRYPTION=tls -->

{{-- <nav class="navbar navbar-default navbar-static-top">
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
            <a class="navbar-brand" href="{{ url('/') }}"><img src="
{{ url('img/MTN-logo.png') }}" alt="Bootstrappin'"
width="120">
                {{ config('app.name', 'Laravel') }}
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

<li><a href="{{ route('login') }}">Create Food Menu</a></li>
<li><a href="{{ route('register') }}">Update food Menu</a></li>
<li><a href="{{ route('register') }}">View Sales</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
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
                  <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                      <img src="{{ $details['photo'] }}" />
                  </div>
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
              <li><a href="{{ route('totops') }}">View Tops</a></li>
              <li><a href="{{ route('tickets') }}">Tickets</a></li>
              <li><a href="{{ route('data') }}">Data</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
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
                    <li class="dropdown">
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
                    </li>
                @endguest


            </ul>
        </div>
    </div>
</nav> --}}
<!--Navbar-->






<!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <!-- <script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
              responsive: true
      });
  });
  </script> -->
  {{-- <script>
  $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script> --}}

  <!-- Page script -->




<form class="form-horizontal" method="POST" action="{{ route('creg2') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name of Guadian/ number of kids</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Mr/Mrs ..."  required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="phone_no" class="col-md-4 control-label">Mobile Number</label>

        <div class="col-md-6">
            <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="0802334 ..."  required autofocus>

            @if ($errors->has('phone_no'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone_no') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="kenneyg......."  autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="sh" class="col-md-4 control-label">Social Handle</label>

        <div class="col-md-6">
            <input id="sh" type="text" class="form-control" name="sh" value="{{ old('sh') }}" placeholder="@SocialHandle ..."   autofocus>

            @if ($errors->has('sh'))
                <span class="help-block">
                    <strong>{{ $errors->first('sh') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
        <label for="kd" class="col-md-4 control-label">Names of kids</label>

        <div class="col-md-6">
            <input id="kd[]" type="text" class="form-control{{ $errors->has('kd') ? ' is-invalid' : '' }}" name="kd[]" value="{{ old('kd') }}" placeholder="james ..."  required autofocus>

            @if ($errors->has('kd'))
                <span class="help-block">
                    <strong>{{ $errors->first('kd') }}</strong>
                </span>
            @endif
        </div>
    </div> -->
    <!-- <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
        <label for="kt" class="col-md-4 control-label">kid Tag Number</label>

        <div class="col-md-6">
            <input id="kt[]" type="text" class="form-control{{ $errors->has('kd') ? ' is-invalid' : '' }}" name="kt[]" value="{{ old('kd') }}" placeholder="101 ..."  required autofocus>

            @if ($errors->has('kt'))
                <span class="help-block">
                    <strong>{{ $errors->first('kt') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
  <div id="cat_fields">

 </div>
     </div> -->
    <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
        <label for="gender" class="col-md-4 control-label">Gender</label>

        <div class="col-md-6">
          <select id="gender" name="gender" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <option value="">Select Gender </option>
            <option value="m">Male </option>
            <option value="f">FeMale </option>

          </select>

            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>
    </div>



    <!-- <div class="form-group{{ $errors->has('qr_code') ? ' has-error' : '' }}">
        <label for="qr_code" class="col-md-4 control-label">Registration Code</label>

        <div class="col-md-6">
            <input id="qr_code" type="text" class="form-control" name="qr_code" value="{{ old('qr_code') }}" placeholder="5476356756 ..."  required autofocus>

            @if ($errors->has('qr_code'))
                <span class="help-block">
                    <strong>{{ $errors->first('qr_code') }}</strong>
                </span>
            @endif
        </div>
    </div> -->


                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <div class="form-group row mb-0">
      <!-- <div class="col-md-6 offset-md-4">
  <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add Kids </button>
  </div> -->
</div>
                          <button type="submit" id="btn-add" class="btn btn-primary">
                              Register
                          </button>
                      </div>
                  </div>

  </form>

  <?php
header('Location: public/');



var table = $('.data-table').DataTable({
//      processing: true,
//      serverSide: true,
//      ajax: "{{ route('ajaxproducts.index') }}",
//      columns: [
//          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//          {data: 'name', name: 'name'},
//          {data: 'detail', name: 'detail'},
//          {data: 'action', name: 'action', orderable: false, searchable: false},
//      ]
//  });
//
//  $('#createNewProduct').click(function () {
//      $('#saveBtn').val("create-product");
//      $('#product_id').val('');
//      $('#productForm').trigger("reset");
//      $('#modelHeading').html("Create New Product");
//      $('#ajaxModel').modal('show');
//  });
//
//  $('body').on('click', '.editProduct', function () {
//    var product_id = $(this).data('id');
//    $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {
//        $('#modelHeading').html("Edit Product");
//        $('#saveBtn').val("edit-user");
//        $('#ajaxModel').modal('show');
//        $('#product_id').val(data.id);
//        $('#name').val(data.name);
//        $('#detail').val(data.detail);
//    })
// });
//
//  $('#saveBtn').click(function (e) {
//      e.preventDefault();
//      $(this).html('Sending..');
//
//      $.ajax({
//        data: $('#productForm').serialize(),
//        url: "{{ route('ajaxproducts.store') }}",
//        type: "POST",
//        dataType: 'json',
//        success: function (data) {
//
//            $('#productForm').trigger("reset");
//            $('#ajaxModel').modal('hide');
//            table.draw();
//
//        },
//        error: function (data) {
//            console.log('Error:', data);
//            $('#saveBtn').html('Save Changes');
//        }
//    });
//  });
//
//  $('body').on('click', '.deleteProduct', function () {
//
//      var product_id = $(this).data("id");
//      confirm("Are You sure want to delete !");
//
//      $.ajax({
//          type: "DELETE",
//          url: "{{ route('ajaxproducts.store') }}"+'/'+product_id,
//          success: function (data) {
//              table.draw();
//          },
//          error: function (data) {
//              console.log('Error:', data);
//          }
//      });
//  });
