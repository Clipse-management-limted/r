@extends('layouts.app')
@section('title') Registration  @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Vendor Food Menu </div>

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
               <form id="" role="form"  method="POST" action="{{route('create_vendor_food') }}">
                            {{ csrf_field() }}
                 <input type="hidden" class="form-control input-sm" value="{{$user->vendor_id}}" id="id" name="id" >
                             <div class="form-group row">
                                 <label for="name" class="col-md-4 col-form-label text-md-right">Food Name</label>

                                 <div class="col-md-6">
                                     <input id="subname[]" type="text" placeholder="Enter Food Name In Combo...." class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname[]" value="{{ old('subname') }}" required autofocus>

                                     @if ($errors->has('subname'))
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('subname') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                                   </div>
                                 <div class="form-group row">
                                     <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                                 <div class="col-md-6">
                                     <input id="price[]" type="text" placeholder="Enter Food Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]" value="{{ old('price') }}" required autofocus>

                                     @if ($errors->has('price'))
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('price') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                           </div>
                           <div class="form-group row">
                               <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                               <div class="col-md-6">
                                  <textarea class="form-control{{ $errors->has('description[]') ? ' is-invalid' : '' }}" name="description[]" value="{{ old('description[]') }}"  autofocus>


                                  </textarea>
                                   @if ($errors->has('description[]'))
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('description[]') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group row">
                             <div id="cat_fields_">

                            </div>
                                </div>

                             <div class="line"></div>
                              <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Vendors</label>
                             <div class="col-md-6">

                               <select id="ac" name="ac" class="form-control{{ $errors->has('ac') ? ' has-error' : '' }}">

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
                             <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">  <!-- <div class="input-group-btn"> -->
                             <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add More Food </button>
                             </div>  </div>
                             <div class="form-group row mb-8">
                                 <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                                 <div class="col-md-6 offset-md-4">
                                     <button type="submit" class="pull-right btn btn-primary btn-block margin-bottom">
                                         Save
                                     </button>
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
                                    divtest.innerHTML = ' <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Food Name</label>     <div class="col-md-6"> <input type="text" class="form-control" id="subname[]" name="subname[]" value="" placeholder="Enter Food Name In Combo....">    </div> </div> <div class="form-group row"> <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>     <div class="col-md-6"> <input type="text" class="form-control" id="price[]" name="price[]" value="" placeholder="Enter Food Price....">    </div> </div><div class="form-group row"> <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>     <div class="col-md-6"> <textarea  class="form-control" id="description[]" name="description[]" value="" placeholder="Description....">    </textarea>  </div> </div>  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';

                                    objTo.appendChild(divtest)
                                    }
                                    function remove_cat_fields(rid) {
                                    $('.removeclass'+rid).remove();
                                    }
                                    </script>

                    @endsection

                  @endsection
