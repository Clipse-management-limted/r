@extends('layouts.app2')
@section('title') Top -Up  @endsection
@section('content')
  <style>
  main {
	font-family: 	Arial, Verdana, sans-serif;
	color:		#0000FF;
	font-size:	10px;
}
div.a {
  font-size: 15px;
}

tbody.b {
  font-size: large;
}

div.c {
  font-size: 150%;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Top by - {{ Auth::user()->name }} </div>

                <div class="panel-body">
                  <div class="col-lg-10 col-lg-offset-2">
                                         @if (session('status'))

                                                       <div class="alert alert-success">
                                                           {{ session('status') }}
                                                       </div>
                                                   @endif



                                         </div>


<table id="example" class="table table-striped table-bordered main" style="width:100%">
  <thead>
    <tr>
       <th class="th-sm">S/N</th>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Phone

      </th>
      <th class="th-sm">Wristband

      </th>
      <th class="th-sm">Amount

      </th>
      <th class="th-sm">Date / Time

      </th>

    </tr>
  </thead>
  <tbody>
    <?php
           $count = 1;
           foreach($posts as $row)
           {

             $name=App\Model\Clients::usersinfo($row->tag_id);
             $phone2=App\Model\Clients::phoneinfo2($row->tag_id);

           echo '
           <tr>
           <td>'.$count++.'</td>
           <td>'.$name.'</td>
           <td>'.$phone2.'</td>
           <td>'.$row->tag_id.'</td>
           <td>'.$row->amount.'</td>
           <td>'.date('d/m/Y h:i:a',strtotime($row->created_at)).'</td>

           </tr>
           ';
           }
           ?>

  </tbody>
  <tfoot>
    <tr>
       <th class="th-sm">S/N</th>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Phone

      </th>
      <th class="th-sm">Wristband

      </th>
      <th class="th-sm">Amount

      </th>
      <th class="th-sm">Date / Time

      </th>

    </tr>
  </tfoot>
</table>
                                       </div>
                                       </div>
                                       </div>
                                       </div>
                                       </div>

                                       @section('javascript')

                                         <script>
                                         // Basic example

                                         $(document).ready(function() {
                                             $('#example').DataTable(
                                               {
                                                //  dom: 'Bfrtip',
                                                // buttons: [
                                                //     'copy', 'csv', 'excel', 'pdf', 'print'
                                                // ]
                                               }
                                             );
                                         } );
                                         </script>


                                         @endsection

                                       @endsection
