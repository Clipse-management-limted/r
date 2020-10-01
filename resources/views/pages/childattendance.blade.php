<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css'> -->
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">Child Guestlist </h3>
  <a class="btn btn-primary" href="{{ route('attend') }}">Validated Guest List </a>
      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th class="text-center">S/N</th>
              <th class="text-center">Parent NAME</th>
              <th class="text-center">Parent Phone Number</th>
              <th class="text-center">Child NAME</th>
                <th class="text-center">WRISTBAND</th>
                <th class="text-center">TIME / DATE</th>
                <!-- <th>Time</th> -->
            </tr>
        </thead>
        <tbody>
          <?php
          $count = 1;
          foreach($posts as $row)
          {
            $name=App\Model\Clients::usersinfo($row->parent_qrcode);
            $phone2=App\Model\Clients::phoneinfo2($row->tag_id);
            $cbyname=App\Model\Clients::chinfo($row->ch_by);


          echo '
          <tr>
          <td>'.$count++.'</td>
          <td>'.$name.'</td>
          <td>'.$phone2.'</td>
          <td>'.$row->name.'</td>
          <td>'.$row->qrcode.'</td>
          <td>'.$row->updated_at.'</td>

          </tr>
          ';
          }
          ?>

        </tbody>
        <tfoot>
            <tr>
              <th class="text-center">S/N</th>
              <th class="text-center">Parent NAME</th>
              <th class="text-center">Parent Phone Number</th>
              <th class="text-center">Child NAME</th>
                <th class="text-center">WRISTBAND</th>
                <th class="text-center">TIME / DATE</th>
            </tr>
        </tfoot>
    </table>




    </div>
  </div>






</div>

<script src="{{ asset('yo/js/jquery.min.js') }}" ></script>
<script src="{{ asset('yo/js/popper.min.js') }}" ></script>
<script src="{{ asset('yo/js/bootstrap.min.js') }}" ></script>
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

  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>

<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>

<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script>



<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script> -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js'></script> -->
<script src="{{ asset('datatable/script.js') }}" ></script>


</body>
</html>
