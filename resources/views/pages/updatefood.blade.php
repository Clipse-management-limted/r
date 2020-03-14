@extends('layouts.app3')
@section('title') Update Food Menu  @endsection
@section('content')

<div class="container">


  <div class="row">

    <div class="col-12" >
      {{-- <h3 class="titulo-tabla">Lacasera Guestlist </h3> --}}

<div class="col-lg-8 col-lg-offset-2">
     @if (session('status'))

         <div class="alert alert-success">
             {{ session('status') }}
         </div>
     @endif
     <div id="add-success-bag">
     </div>

     <div id="add-error-bag">
     </div>


     <!-- <div class="alert alert-danger" id="add-error-bag">
                            <ul id="add-task-errors">
                            </ul>
                        </div> -->
                       </div>
      <form class="form-horizontal" method="POST" action="{{ route('upfetchac') }}">
          {{ csrf_field() }}
      <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
          <label for="gender" class="col-md-4 control-label">Select Vendor </label>

          <div class="col-md-6">
            <select id="vac" name="vac" class="form-control{{ $errors->has('vac') ? ' has-error' : '' }}">

                         <option>   Select Vendor  </option>
                           @if ($TICKECT->count() > 0 )
                           @foreach ($TICKECT as $user)
                           <option value="{{$user->id}}">{{$user->name}} </option>
                           @endforeach
                           @else
                             <option >   <div class="alert alert-warning">
                                   <strong>Sorry!</strong> No Available Vendor For This Events .....
                               </div></option>
                           @endif

            </select>

              @if ($errors->has('ac'))
                  <span class="help-block">
                      <strong>{{ $errors->first('ac') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                  Fetch Records
              </button>

          </div>
      </div>
  </form>
  <!-- Editable table -->
<div class="card">
  <div class="card-body">
    <div class="col-md-4 pull-right">
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
            <th class="text-center">Vendor Name</th>
            <th class="text-center">Food Name</th>
              <th class="text-center">Price</th>
              <th class="text-center">TIME / DATE</th>
              <th class="text-center">ACTION</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $count = 1;
        //  dd($posts);
          foreach($posts as $row)
          {
           $name=App\Model\Clients::chinfo($row->vendor_id);
            // $phone2=App\Model\Clients::phoneinfo2($row->tag_id);


          echo '

          <tr>
          <td>'.$count++.'</td>
          <td>'.$name.'</td>
          <td>'.$row->name.'</td>
          <td>N '.$row->price.'</td>';?>
          <td>{{date('d/m/Y h:i:a',strtotime($row->created_at))}}</td>
          <td><a href="{{ route('up', $row->id) }}" class="btn btn-info btn-xs email_button">Edit Task</a>   </td>
       {{-- <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$row->id.'" data-uid="'.$row->id.'" data-vendor_id="'.$row->vendor_id.'" data-food_name="'.$row->food_name.'" data-price="'.$row->price.'" data-action="single">Send Single</button></td> --}}
<?php   echo '
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


  if(action == 'single')
  {
   email_data.push({
     uid: $(this).data("uid"),
    vendor_id: $(this).data("vendor_id"),
    food_name: $(this).data("food_name"),
    price: $(this).data("price")
   });
  }
  else
  {
   $('.single_select').each(function(){
    if($(this). prop("checked") == true)
    {
     email_data.push({
      uid: $(this).data("uid"),
       vendor_id: $(this).data("vendor_id"),
       food_name: $(this).data("food_name"),
       price: $(this).data("price")
     });
    }
   });
  }

  $.ajax({
   url:"up",
   method:"POST",
  //  data:{name:name, id:uid},
    data:{email_data:email_data},
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
