@extends('layouts.app')
@section('content')
<section id="login">
        <div class="container">
            <div class="section-inner">
                <div class="sign-main login-page">
                    <div class="title">
                        <h2><span class="fa fa-lock"></span> log in</h2>
                    </div>
                    <div class="main-form">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Username">
                             @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
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

                        <input type="submit" value="login" class="btn btn-default">
                    </form>
                    </div>
                    <span class="reset bottom"><i class="fa fa-question-circle"></i> Forgot your password? <a href="{{ route('password.request') }}">Reset now</a></span>
                    <span class="signup bottom"><i class="fa fa-question-circle"></i> Don't Have an Account? <a href="{{ route('register') }}">Sign up</a></span>
                </div>
            </div>
        </div>
    </section>
@endsection
