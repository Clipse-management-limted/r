@extends('layout')

@section('title', 'Cart')

@section('content')
  <br>  <br>  <br>
    @if(session('status'))

        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif


      <div class="row">
    <div class="col-sm-5 col-md-8">

      {{-- <div class="col-sm-8 col-sm-pull-4"> --}}
  {{-- <div class="col-md-6 col-sm-push-8 order-2 order-md-1"> --}}
      <table id="cart" class="table table-hover table-condensed">
          <thead>
          <tr>
              <th style="width:50%">Product</th>
              <th style="width:10%">Price</th>
              <th style="width:8%">Quantity</th>
              <th style="width:22%" class="text-center">Subtotal</th>
              <th style="width:10%"></th>
          </tr>
          </thead>
          <tbody>

          <?php $total = 0 ?>

          @if(session('cart'))
              @foreach(session('cart') as $id => $details)

                  <?php $total += $details['price'] * $details['quantity'] ?>

                  <tr>
                      <td data-th="Product">
                          <div class="row">
                              {{-- <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div> --}}
                              <div class="col-sm-9">
                                  <h4 class="nomargin">{{ $details['name'] }}</h4>
                              </div>
                          </div>
                      </td>
                      <td data-th="Price">${{ $details['price'] }}</td>
                      <td data-th="Quantity">
                          <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                      </td>
                      <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                      <td class="actions" data-th="">
                          <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                          <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                      </td>
                  </tr>

              @endforeach
          @endif

          </tbody>
          <tfoot >
          <tr class="visible-xs">
              <td class="text-center"><strong>Total {{ $total }}</strong></td>
          </tr>
          <tr >
              <td><a href="{{ url('/vendor') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
          </tr>

          </tfoot>
      </table>
      <form id="cart2" class="form-horizontal" method="POST" action="{{ route('checkOUT') }}">
          {{ csrf_field() }}
  <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $total }}" required>
          {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div> --}}

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Make Payment
                  </button>
              </div>
          </div>
      </form>
    </div>



        <div class="col-md-4">
    {{-- <div class="col-md-6 order-1 order-md-2"> --}}
      <!-- Card -->
<div class="card well">
<!-- Card content -->
  <div class="card-body">
    <div id="add-success-bag">
    </div>

    <div id="add-error-bag">
    </div>

    @if (session('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ session('message') }}
        </div>
    @endif

<form>
    {{-- <form class="form-horizontal" method="POST" action="{{ route('checkout') }}">
        {{ csrf_field() }} --}}
       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           <label for="name" class="col-md-4 control-label">Qrcode</label>

           <div class="col-sm-6 col-md-9">
               <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="67453 ..."  required autofocus>

               @if ($errors->has('name'))
                   <span class="help-block">
                       <strong>{{ $errors->first('name') }}</strong>
                   </span>
               @endif
           </div>
       </div>

       {{-- <button type="submit" class="btn btn-primary">
          Submit
       </button> --}}

       <button type="submit" id="btn_save" class="btn btn-primary">
         Validate
     </button>
     <br><br>


       <div class="form-group row mb-0">
           <label for="name" class="col-md-4 control-label"></label>
                 <div class="col-md-6 offset-md-2 m">

                 </div>
             </div>


     </form>

  </div>

</div>
</div>
<!-- Card -->



    {{-- </div> --}}




@endsection


@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });


        $('#btn_save').on('click',function(){
          $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
            var qrcode = $('#name').val();
            $.ajax({
                type : "POST",
                url  : "{{route('checkout')}}",
                dataType : "JSON",
                data : {qrcode:qrcode},

                success: function(data){
                  console.log(data);
              if(data.error =="1"){


                var errors=data;
                console.log(errors);
                $('[name="name"]').val(" ");

                $("#add-error-bag").fadeIn(10, function()
                              {
                                     //  var errors=data.responseJSON;
                errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
                //   $.each(errors.status, function(key, value) {
                     errorsHtml+='<p>' + data.status + '</p>';
                       // $('#add-task-errors').append('<li>' + value + '</li>');
                  // });
                   errorsHtml+='</div>';
                   $("#add-error-bag").html(errorsHtml);

                     });

                     $("#add-error-bag").fadeOut(15000);

                     }
                     else
                     {
                       var errors=data;
                    console.log(errors);
                    $('[name="name"]').val(" ");

                         $("#add-error-bag").fadeIn(10, function()
                                                               {
                       //  var errors=data.responseJSON;
                         errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
                         //   $.each(errors.status, function(key, value) {
                              errorsHtml+='<p>' + data.status + '</p>';
                                // $('#add-task-errors').append('<li>' + value + '</li>');
                           // });
                            errorsHtml+='</div>';
                            $("#add-error-bag").html(errorsHtml);


                          });
                         $("#add-error-bag").fadeOut(5000);

                         var newElement = '<tr><td><input type="hidden" value="' + data.sid + '" name="id" id="id" placeholder="' + data.sid + '"/></td><td><input type="hidden" value="' + data.balance + '" id="balance" name="balance" placeholder="' + data.balance + '"/></td></tr>';
                         $( "#cart2" ).append( $(newElement) );

                     }


                },

                error: function(data) {
                  var errors=data.responseJSON;
               console.log(errors);
                  if(errors.error =="1"){
                    console.log(errors);
                    $('[name="name"]').val(" ");

                    $("#add-error-bag").fadeIn(10, function()
                                  {
                                         //  var errors=data.responseJSON;
                    errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
                    //   $.each(errors.status, function(key, value) {
                         errorsHtml+='<p>' + errors.status + '</p>';
                           // $('#add-task-errors').append('<li>' + value + '</li>');
                      // });
                       errorsHtml+='</div>';
                       $("#add-error-bag").html(errorsHtml);

                         });

                         $("#add-error-bag").fadeOut(2000);

                         }
                         else
                         {

               //
                  var errors=data.responseJSON;
               console.log(errors);
               $("#add-error-bag").fadeIn(10, function()
                                                     {

               errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
                 errorsHtml+='<p>' + errors.message + '</p>';
                 // errorsHtml+='<p>' + errors.status + '</p>';
                 $.each(errors.errors, function(key, value) {
                   errorsHtml+='<li>' + value + '</li>';
                     // $('#add-task-errors').append('<li>' + value + '</li>');
                 });
                  errorsHtml+='</ul></div>';
                  $("#add-error-bag").html(errorsHtml);

                });
               $("#add-error-bag").fadeOut(3000);

                }
                 }
            });
            return false;
        });

    </script>

@endsection
