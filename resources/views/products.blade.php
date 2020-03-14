@extends('layout')
@section('title') Products  @endsection

@section('content')
  <style>
  /* #content-desktop {display: block;}
  #content-mobile {display: none;}

  @media screen and (max-width: 768px) {

  #content-desktop {display: none;}
  #content-mobile {display: block;}

  } */


  @media screen and (min-width: 769px) {

      #div-mobile { display: none; }
      #div-desktop { display: block; }

  }

  @media screen and (max-width: 768px) {

      #div-mobile { display: block; }
      #div-desktop { display: none; }

  }



  </style>
<br><br>
  <div id=”div-desktop”>
{{-- This is the content that will display on DESKTOPS. --}}


  <div class="container">


    <div class="row">

</div>

    <div class="row">

      <div class="col-12" >
        {{-- <h3 class="titulo-tabla">Lacasera Guestlist </h3> --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

    <!-- Editable table -->
  <div class="card">
    <div class="card-body">
      <div class="col-md-4 pull-right">
    <div class="active-pink-3 active-pink-4 mb-4">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    </div>
      <div id="table" class="table-responsive ">
              <table id="dtBasicExample" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%">
        {{-- <table class="table table-bordered table-responsive-md table-striped text-center"> --}}
          <thead>
            <tr>
              <th class="text-center">S/N</th>
              <th class="text-center">PRODUCT NAME</th>
                <th class="text-center">DESCRIPTION</th>
                <th class="text-center">PRICE<strong>#</strong></th>
                <th class="text-center">ACTION</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
            $count = 1;
            foreach($products as $product)
            {
            echo '
            <tr>
            <td>'.$count++.'</td>
            <td>'.$product->name.'</td>
            <td>'.str_limit(strtolower($product->description), 350).'</td>
            <td>'. $product->price.'</td>';?>
            <td>  <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p></td>
        <?php   echo '    </tr>
            ';
            }
            ?>

          </tbody>
          </table>
          </div>


          </div>
          </div>


          </div>
          </div>






          </div>

        </div>

        <div id=”div-mobile”>
        {{-- This is the content that will display on MOBILE DEVICES. --}}
        </div>

          @section('javascript')
          <script>
          $(document).ready(function(){

            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

        });
        </script>

          @endsection

          @endsection
