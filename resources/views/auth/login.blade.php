<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=big5">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/_icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/index.css') }}">

    <title>My Web Site</title>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-center" style="padding-top: 50px;">
                    <div class="logo">@lang('lang.logıns')</div>
                    <hr style="background-color: #00a700;">
     <button onclick="location.href
    ='{{url('login/facebook/callback')}}'">facebook</button>
                    <div class="login-form-1">
                        @if ($errors->has('email'))
                            <div class="alert alert-warning">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form id="login-form" class="text-left" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="login-form-main-message"></div>
                            <div class="main-login-form">
                                <div class="login-group">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="lg_username" class="sr-only">@lang('lang.email')</label>
                                        <input type="email" class="form-control" id="lg_username" name="email" value="{{ old('email') }}" placeholder="@lang('lang.email')" required autofocus >
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="lg_password" class="sr-only">@lang('lang.password')</label>
                                        <input type="password" class="form-control" id="lg_password" placeholder="@lang('lang.password')" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group login-group-checkbox">
                                        <input type="checkbox" id="lg_remember"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="lg_remember">@lang('lang.remember')</label>
                                    </div>
                                </div>
                                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('lang.ForgotYourPassword')

                                </a>
                               <a href="{{route('register')}}">@lang('lang.newaccount')</a>
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

    <script src="{{ asset('assets/front/js/_JQuery/jquery.js') }}"></script>
    <script src="{{ asset('assets/front/js/_Popper/popper.js') }}"></script>
    <script src="{{ asset('assets/front/js/_Slick/slick.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/index.js') }}"></script>
</body>
</html>