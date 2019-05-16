@extends('layouts.app')

@section('content')
<section id="login">
        <div class="container">
            <div class="section-inner">
                <div class="sign-main login-page">
                    <div class="title">
                        <h2><span class="fa fa-lock"></span> Register</h2>
                    </div>
                    <div class="main-form">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
 @if(isset($reference))
<input type="hidden" name="refid" value="{{$reference}}">
@endif
                    <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Username">
                             @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Email">
                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="input-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" value="{{ old('mobile') }}" class="form-control" name="mobile" placeholder="Mobile">
                             @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="input-group {{ $errors->has('wallet') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
                            @if(isset($walletid))
                            <input type="text" class="form-control" name="wallet" value="{{$walletid}}" >     
                            @else
                            <input type="text" value="{{ old('wallet') }}" class="form-control" name="wallet" placeholder="Wallet ID">
                            @endif

                            @if($errors->has('wallet'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('wallet') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>

                        <input type="submit" value="register" class="btn btn-default">
                    </form>
                    </div>
                     <div class="text-center">
                    <span class="reset bottom"> <a href="{{ route('password.request') }}">RESET PASSWORD</a> | <a href="{{ route('login') }}">LOGIN NOW</a></span>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
