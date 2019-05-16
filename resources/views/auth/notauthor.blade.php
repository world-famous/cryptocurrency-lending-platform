@extends('layouts.app')
@section('content')
@if (Auth::user()->status != '1')
<section id="login">
        <div class="container">
            <div class="section-inner">
                <div class="sign-main login-page">
                    <div class="title">
                        <h2><span class="fa fa-lock"></span>
                        Your account is Deactivated </h2>
                    </div>
                </div>
            </div>
        </div>
</section>

@elseif(Auth::user()->emailv != '1')
<div class="wrapper">
        <div id="ls-in">
            <div class="container">
                <div class="main">


                    <section id="registration">
                        <div class="section-inner">
                            <div class="sign-main">
                                <div class="title">
                                    <h2><span class="fa fa-user"></span> Please verify your Email</h2>
                                </div>
                                <div class="main-form">
                 <form action="{{route('sendemailver')}}" method="POST">
              {{csrf_field()}}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                                    </div>

                                    <input type="submit" value="Send Verification Code" class="btn btn-default">
                    </form>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="login">
                        <div class="section-inner">
                            <div class="sign-main log-sign-page">
                                <div class="title">
                                    <h2><span class="fa fa-lock"></span> Verify Code</h2>
                                </div>
                                <div class="main-form">
<form action="{{route('emailverify') }}" method="POST">
              {{csrf_field()}}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" name="code" class="form-control" placeholder="Verification Code">
                                    </div>

                                    <input type="submit" value="Verify" class="btn btn-default">
    </form>                            
                                </div>
                            
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@elseif(Auth::user()->smsv != '1')
<div class="wrapper">
        <div id="ls-in">
            <div class="container">
                <div class="main">
                    <section id="registration">
                        <div class="section-inner">
                            <div class="sign-main">
                                <div class="title">
                                    <h2><span class="fa fa-user"></span> Please verify your Mobile</h2>
                                </div>
                                <div class="main-form">
                <form action="{{route('sendsmsver')}}" method="POST">
              {{csrf_field()}}

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                        <input type="text" class="form-control" value="{{Auth::user()->mobile}}" readonly>
                                    </div>

                                    <input type="submit" value="Send Verification Code" class="btn btn-default">
                    </form>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="login">
                        <div class="section-inner">
                            <div class="sign-main log-sign-page">
                                <div class="title">
                                    <h2><span class="fa fa-lock"></span> Verify Code</h2>
                                </div>
                                <div class="main-form">
 <form action="{{route('smsverify') }}" method="POST">
              {{csrf_field()}}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" name="code" class="form-control" placeholder="Verification Code">
                                    </div>

                                    <input type="submit" value="Verify" class="btn btn-default">
    </form>                            
                                </div>
                            
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@elseif(Auth::user()->tfver != '1')
<section id="login">
        <div class="container">
            <div class="section-inner">
                <div class="sign-main login-page">
                    <div class="title">
                        <h2><span class="fa fa-lock"></span>Verify Google Authenticator Code</h2>
                    </div>
                    <div class="main-form">
               <form action="{{route('go2fa.verify') }}" method="POST">
              {{csrf_field()}}
                        <div class="input-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" value="{{ old('code') }}" class="form-control" name="code" placeholder="Enter Google Authenticator Code">
                             @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                        </div>

                    <input type="submit" value="Verify" class="btn btn-default">
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endif








@endsection
         
            
         