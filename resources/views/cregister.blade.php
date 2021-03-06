@extends('layouts.app4')
@section('title') Registration  @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register </div>

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

                                         {{-- <form id="register-form" class="register-form"> --}}
                                         <form   method="POST" action="{{route('creg22') }}">
                                    {{ csrf_field() }}
              <div class="col-md-8 mb-3">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Mr/Mrs ..."   autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                          <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>
                 </div>
                     <div class="col-md-8 mb-3">
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Mobile Number     </label>
                            <div class="col-md-8">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="0802334 ..." >

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>
                      </div>

                         <div class="col-md-8 mb-3">
                      <div class="form-group{{ $errors->has('qr_code') ? ' has-error' : '' }}">
                         <label for="qr_code" class="col-md-4 control-label">Qrcode </label>

                         <div class="col-md-8">
                             <input id="qr_code" type="text" class="form-control" name="qr_code" value="{{ old('qr_code') }}" placeholder="105899......." >

                             @if ($errors->has('qr_code'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('qr_code') }}</strong>
                                 </span>
                             @endif
                         </div>

                     </div><br></div>
                     <div class="col-md-8 mb-3">
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="col-md-4 control-label">Gender</label>

                    <div class="col-md-8">
                      <select id="gender" name="gender" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <option value="">Select Gender </option>
                        <option value="Male">Male </option>
                        <option value="Female">Female </option>

                      </select>

                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><br></div>
                   <div class="col-md-8 mb-3">
             <div class="form-group row">
                   <label for="childname" class="col-md-4 col-form-label text-md-right">Childe Name</label>
               <div class="col-md-6">
                   <input id="childname[]" type="text" placeholder="Enter Child name...." class="form-control{{ $errors->has('childname') ? ' is-invalid' : '' }}" name="childname[]" value="{{ old('childname') }}" required autofocus>

                   @if ($errors->has('childname'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('childname') }}</strong>
                       </span>
                   @endif
               </div>
         </div></div>
            <div class="col-md-8 mb-3">
         <div class="form-group row">
             <label for="childqrcode" class="col-md-4 col-form-label text-md-right">child Qrcode</label>

             <div class="col-md-6">
               <input id="childqrcode[]" type="text" placeholder="Enter Child Qrcode...." class="form-control{{ $errors->has('childqrcode') ? ' is-invalid' : '' }}" name="childqrcode[]" value="{{ old('childqrcode') }}" required autofocus>
                 @if ($errors->has('childqrcode[]'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('childqrcode[]') }}</strong>
                     </span>
                 @endif
             </div>
         </div>
         </div>


  <div class="col-md-8 mb-3">
          <div class="form-group row ">
            <div id="cat_fields_">

           </div>

            <br>
          </div>
           </div>
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">  <!-- <div class="input-group-btn"> -->
          <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add Child </button>
          </div>
        </div>
                      {{-- <div class="form-group{{ $errors->has('dp') ? ' has-error' : '' }}">
                          <label for="dp" class="col-md-4 control-label">Location</label>
<br>
                          <div class="col-md-6">
                              <input id="dp" type="text" class="form-control" name="dp" value="{{ old('dp') }}" placeholder="Location ..."  required autofocus>

                              @if ($errors->has('dp'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('dp') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div><br> --}}
                        {{-- <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="kenneyg......."  autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div><br><br>
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
                        </div><br><br> --}}

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





                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">
                                            <div class="form-group row mb-0">
                          <!-- <div class="col-md-6 offset-md-4">
                      <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add Kids </button>
                      </div> -->
                    </div>
                    <div class="form-group">
<button style="color: #fff;" type="submit" class="btn btn-primary-clips">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
</button>
</div>
      {{-- <button type="submit" id="btn_save" class="btn btn-primary">
                                                  Register
                                              </button> --}}
                                          </div>
                                      </div>

                      </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>

                  @section('javascript')
                    <script >

                                    var room = 1;
                                    function cat_fields() {
                                    var cat_fields ='cat_fields_';
                                    // alert(cat_fields);
                                    room++;
                                    var objTo = document.getElementById(cat_fields)
                                    var divtest = document.createElement("div");
                                    divtest.setAttribute("class", "form-group removeclass"+room);
                                    var rdiv = 'removeclass'+room;
                                    divtest.innerHTML = ' <div class="form-group row"> <label for="childname" class="col-md-4 col-form-label text-md-right">Child Name</label>     <div class="col-md-6"> <input type="text" class="form-control" id="childname[]" name="childname[]" value="" placeholder="Enter Child Name....">    </div> </div> <div class="form-group row"> <label for="child Qrcode" class="col-md-4 col-form-label text-md-right">child Qrcode</label>     <div class="col-md-6"> <input type="text" class="form-control" id="childqrcode[]" name="childqrcode[]" value="" placeholder="Enter Child Qrcode....">  </div> </div>  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';

                                    objTo.appendChild(divtest)
                                    }
                                    function remove_cat_fields(rid) {
                                    $('.removeclass'+rid).remove();
                                    }
                                    </script>

                    <script >

                  //   var room = 1;
                  //   function cat_fields(id) {
                  //   var cat_fields ='cat_fields';
                  // // alert(cat_fields);
                  //   room++;
                  //   var objTo = document.getElementById(cat_fields)
                  //   var divtest = document.createElement("div");
                  //   divtest.setAttribute("class", "form-group removeclass"+room);
                  //   var rdiv = 'removeclass'+room;
                  //   divtest.innerHTML = ' <div class="form-group">  <label for="childname" class="col-md-4 control-label">Child Name</label> <div class="col-md-8">  <input id="childname" type="text" class="form-control" name="childname[]" value="" placeholder="Joy ..."  >  </div></div><br>  <div class="form-group">     <label for="chqr_code" class="col-md-4 control-label">Child Qrcode</label> <div class="col-md-8">  <input id="chqr_code" type="text" class="form-control" name="chqr_code[]" value="" placeholder="264651616 ..."  >  </div></div><br>  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';
                  //
                  //   objTo.appendChild(divtest)
                  //   }
                  //   function remove_cat_fields(rid) {
                  //   $('.removeclass'+rid).remove();
                  //   }
                      </script>


                    <script type="text/javascript">
                    	$(document).ready(function(){
                    //Save product
    $('#btn_save').on('click',function(){
      $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        var name = $('#name').val();
        var phone_no = $('#phone_no').val();
        var email        = 'MIL';
        var sh = 'NIL';
        var gender        = $('#gender').val();
        var qr_code        = $('#qr_code').val();
        var dp            = 'Lagos';
        $.ajax({
            type : "POST",
            url  : "{{route('creg22')}}",
              // url  : "{{route('creg22')}}",
            dataType : "JSON",
            data : {name:name,qr_code:qr_code,phone_no:phone_no, email:email,sh:sh,gender:gender,dp:dp},
            success: function(data){
              console.log(data);
	       	if(data.error =="1"){


            var errors=data;
            console.log(errors);
            $('[name="name"]').val(" ");
            $('[name="phone_no"]').val(" ");
            $('[name="gender"]').val(" ");
            $('[name="qr_code"]').val(" ");


            $("#add-error-bag").fadeIn(20, function()
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

                 $("#add-error-bag").fadeOut(10000);

                 }
                 else
                 {
                   var errors=data;
                console.log(errors);
                $('[name="name"]').val(" ");
                $('[name="phone_no"]').val(" ");
                $('[name="gender"]').val(" ");
                $('[name="qr_code"]').val(" ");

                     $("#add-error-bag").fadeIn(20, function()
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
                     $("#add-error-bag").fadeOut(10000);



                 }


            },

            error: function(data) {
              var errors=data.responseJSON;
           console.log(errors);
           var errors=data.responseJSON;
           errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
              $.each(errors.errors, function(key, value) {
                errorsHtml+='<li>' + value + '</li>';
                  // $('#add-task-errors').append('<li>' + value + '</li>');
              });
              errorsHtml+='</ul></div>';
              $("#add-error-bag").html(errorsHtml);
             }
        });
        return false;
    });
    	});
                    </script>


                    @endsection

                  @endsection
