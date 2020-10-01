@extends('layouts.app4')
@section('title') Attendance  @endsection
@section('content')

<div class="container">


  <div class="row">

    <div class="col-12" >
      {{-- <h3 class="titulo-tabla">Lacasera Guestlist </h3> --}}
<br><br>
  <a class="btn btn-primary pull-right" href="{{ route('valgu') }}">View Validated Guest List </a>

  <!-- Editable table -->
<div class="card">
  <div class="card-body">
    <div class="col-md-12 pull-right">
 <div class="active-pink-3 active-pink-4 mb-4">
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
</div>
</div>


    <div id="table" class="table-editable">
            <table id="dtBasicExample" class="table table-responsive-md table-striped table-bordered table-sm" cellspacing="0" width="100%">
      {{-- <table class="table table-bordered table-responsive-md table-striped text-center"> --}}
        <thead>
          <tr>
            <th class="text-center">S/N</th>
            <th class="text-center">NAME</th>
              <th class="text-center">PHONE</th>
              <th class="text-center">WRISTBAND</th>
              <th class="text-center">TIME / DATE</th>
              <th class="text-center">ACTION</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $count = 1;
          foreach($pos as $row)
          {
            // $name=App\Model\Clients::usersinfo($row->tag_id);
            // $phone2=App\Model\Clients::phoneinfo2($row->tag_id);


          echo '
          <tr>
          <td>'.$count++.'</td>
          <td style="font-size :11px;">'.$row->name.'</td>
        <td style="font-size :11px;">'.$row->phone.'</td>
        <td style="">'.$row->tag_id.'</td>
            <td style="font-size :11px;">'.$row->created_at.'</td>

          <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$row->id.'" data-uid="'.$row->id.'" data-name="'.$row->name.'"  data-action="single">Check In</button></td>
          </tr>
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

     @section('javascript')
<script>
$(document).ready(function(){

  $("#myInput").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});

  // Basic example

  // $('#dtBasicExample').DataTable({
  // "searching": false // false to disable search (or any other option)
  // });
  // $('.dataTables_length').addClass('bs-select');




  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('.email_button').click(function(){
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr("id");
  var action = $(this).data("action");
  var email_data = [];

  var uid = $(this).data("uid");
    var name = $(this).data("name");


  // if(action == 'single')
  // {
  //  email_data.push({
  //   email: $(this).data("email"),
  //   name: $(this).data("name")
  //  });
  // }
  // else
  // {
  //  $('.single_select').each(function(){
  //   if($(this). prop("checked") == true)
  //   {
  //    email_data.push({
  //     email: $(this).data("email"),
  //     name: $(this).data('name')
  //    });
  //   }
  //  });
  // }

  $.ajax({
   url:"checkin",
   method:"POST",
    data:{name:name, id:uid},
   // data:{email_data:email_data,},
   beforeSend:function(){
    $('#'+id).html('Sending...');
    $('#'+id).addClass('btn-danger');
   },
   success:function(data){
    if(data = 'ok')
    {
     $('#'+id).text('Success');
     $('#'+id).removeClass('btn-danger');
     $('#'+id).removeClass('btn-info');
     $('#'+id).addClass('btn-success');
    }
    else
    {
     $('#'+id).text(data);
    }
    $('#'+id).attr('disabled', false);
   }

  });
 });
});
</script>
@endsection

@endsection
