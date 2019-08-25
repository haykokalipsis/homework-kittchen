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
                <div class="logo">@lang('lang.registeration')</div>
                <hr style="background-color: #00a700;">
                <!-- Main Form -->
                <div class="login-form-1">
                    <form id="register-form" class="text-left" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="reg_username" class="sr-only">@lang('lang.name')</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('lang.name')" required>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                    <label for="reg_fullname" class="sr-only">@lang('lang.surname')</label>
                                    <input type="text" class="form-control" id="reg_fullname"  name="surname" value="{{ old('surname') }}" placeholder="@lang('lang.surname')">
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="reg_password" class="sr-only">@lang('lang.password')</label>
                                    <input type="password" class="form-control" id="reg_password" name="password" placeholder="@lang('lang.password')" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="reg_password_confirm" class="sr-only">@lang('lang.chekpassword')</label>
                                    <input type="password" class="form-control" id="reg_password_confirm" name="password_confirmation" placeholder="@lang('lang.chekpassword')" required>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="reg_email" class="sr-only">@lang('lang.email')</label>
                                    <input type="text" class="form-control" id="reg_email" name="email" value="{{ old('email') }}" placeholder="@lang('lang.email')" required>
                                    @if($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('reg_gender') ? ' has-error' : '' }} login-group-checkbox">
                                    <input type="radio" class="" name="type" id="company" value="company" placeholder="Company" required>
                                    <label for="company">@lang('lang.company')</label>

                                    <input type="radio" class="" name="type" id="man" value="man" placeholder="man" required>
                                    <label for="man">@lang('lang.man')</label>

                                    @if($errors->has('reg_gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reg_gender') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group login-group-checkbox">
                                    <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                                    <label for="reg_agree"> <a href="#">@lang('lang.Iagree')</a></label>
                                </div>
                            </div>
                            <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="etc-login-form">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('lang.ForgotYourPassword')
                                </a>
                            @endif
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
</div>

<script src="{{asset('assets/front/js/_JQuery/jquery.js')}}"></script>
<script src="{{asset('assets/front/js/_Popper/popper.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/index.js')}}"></script>
</body>
</html>