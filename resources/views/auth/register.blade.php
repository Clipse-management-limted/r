@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('registerff') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Froonz ..."  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="emi@gmail.com ..."  required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Mobile Number                  </label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="0802334 ..."  required autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  placeholder="i8676766 ..."  required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="i8676766 ..."  required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
                            <label for="Role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                              <select id="Role" name="Role" class="form-group{{ $errors->has('Role') ? ' has-error' : '' }}">
                                <option value="">Select Role</option>
                                <option value="1">administrator </option>
                                <option value="2">staff </option>
                                <option value="3">Vendor </option>

                              </select>

                                @if ($errors->has('Role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
