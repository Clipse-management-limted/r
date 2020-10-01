@extends('layouts.app4')
@section('title') Find Parent  @endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search for parent </div>

                <div class="panel-body">
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

                     <form>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Qrcode</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="67453 ..."  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>


                        <div class="form-group row mb-0">
                            <label for="name" class="col-md-4 control-label"></label>
                                  <div class="col-md-6 offset-md-2">
                                    <button type="submit" id="btn_save" class="btn btn-primary">
                                      Search
                                  </button>
                                  </div>
                              </div>
                                          </div>
                                      </div>

                      </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>

                  @section('javascript')

                      <script type="text/javascript">
                      	$(document).ready(function(){
                      //Save product
      $('#btn_save').on('click',function(){
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
          var qrcode = $('#name').val();
          $.ajax({
              type : "POST",
              url  : "{{route('findQrcode')}}",
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

                   $("#add-error-bag").fadeOut(2000);

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
                       $("#add-error-bag").fadeOut(2000);



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
      	});
                      </script>

                    @endsection

                  @endsection
