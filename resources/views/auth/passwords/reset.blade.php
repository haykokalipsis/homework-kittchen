
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/_icons/css/font-awesome.min.css')}}">

    <title>My Web Site</title>

</head>
<body>

<div class="container-fluid">


    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="text-center" style="padding-top: 50px;">
                <div class="logo">{{ __('Reset Password') }}</div>
                <hr style="background-color: #00a700;">
                <!-- Main Form -->
                <div class="login-form-1">
                    <form id="login-form" class="text-left" role="form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" id="lg_username" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" style="border-bottom: 1px solid;" required autofocus placeholder="@lang('lang.email')">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password"  id="lg_password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" style="border-bottom: 1px solid;" required placeholder="@lang('lang.password')">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group login-group-checkbox">
                                    <input type="password" id="password-confirm"  class="form-control" name="password_confirmation" required style="border-bottom: 1px solid;" placeholder="@lang('lang.chekpassword')">

                                </div>
                            </div>
                            <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>

                        </div>
                    </form>
                </div>
                <!-- end:Main Form -->
            </div>
        </div>
    </div>
</div>
<hr style="margin-top: 50px;">
<div class="container-fluid text-center" style="padding-top: 25px;">
    <span>© 2018 Copyright:<a href="https://mdbootstrap.com/education/bootstrap/"> Eargir it company</a></span>
</div>

<script src="{{asset('assets/frontjs/_JQuery/jquery.js')}}"></script>
<script src="{{asset('assets/frontjs/_Popper/popper.js')}}"></script>
<script src="{{asset('assets/frontjs/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontjs/index.js')}}"></script>
</body>
</html>