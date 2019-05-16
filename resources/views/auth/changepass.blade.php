@extends('layouts.user')
@section('content')
<div class="row">
     <div class="col-md-8">
      <div class="panel panel-inverse text-center" >
        <div class="panel-heading">
          <h4 class="panel-title">Change Password</h4>
        </div>
        <div class="panel-body">
          <form method="POST" action="{{ route('changep') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="password" class="cols-sm-2">Old Password</label>
                  <input type="password" class="form-control input-sz" name="passwordold" id="passwordold" required />
                  @if ($errors->has('passwordold'))
                  <span class="help-block">
                    <strong>{{ $errors->first('passwordold') }}</strong>
                  </span>
                  @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="password" class="cols-sm-2">New Password</label>              
                  <input type="password" class="form-control input-sz" name="password" id="password" required />
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="password-confirm" class="cols-sm-2">Confirm Password</label>    
                <input id="password-confirm" type="password" class="form-control input-sz" name="password_confirmation" required>
                     @if ($errors->has('password'))
                     <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                   </span>
                   @endif
           </div>
              <div class="form-group ">
                <button type="submit" class="btn btn-lg btn-block btn-success">Change Password</button>
              </div>
          </div>

        </div>
      </form>
        </div>
      </div>
      
     </div>   

</div>

@endsection
