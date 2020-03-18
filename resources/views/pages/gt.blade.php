<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">



</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">All Activitie Attendance </h3>




      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Gender</th>
                <th>Time In</th>
                  <th></th>
            </tr>
        </thead>
        <tbody>
  <?php $count ='1';?>
          @foreach($posts as $p)
<?php
// $name2=App\Model\mtncotumer::usersinfo323($p->reg);
// $name=App\Model\mtncotumer::usersinfo($p->reg);
// $phone2=App\Model\mtncotumer::phoneinfo2($p->reg);
// $phone=App\Model\mtncotumer::phoneinfo($p->reg);
// $group=App\Model\mtncotumer::usersinfogroup($p->reg);
?>

            <tr>
                <td>{{$count++}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->qr_code}}</td>
                  <td>{{$p->gender}}</td>
                <td>{{date('d/m/Y h:i:a',strtotime($p->created_at))}}</td>
                  <td></td>
            </tr>
@endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Location</th>
                  <th>Gender</th>
                <th>Time In</th>
                  <th></th>
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
<script src="{{ asset('datatable/script.js') }}" ></script>

</body>
</html>
