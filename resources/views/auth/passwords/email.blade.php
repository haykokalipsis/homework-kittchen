
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
            <!-- FORGOT PASSWORD FORM -->
            <div class="text-center" style="padding-top: 50px;">
                <div class="logo">@lang('auth.reset')</div>
                <hr style="background-color: #cb0000;">
                <!-- Main Form -->
                <div class="login-form-1">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="forgot-password-form" class="text-left" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="etc-login-form">
                            <p>@lang('auth.alert')</p>
                        </div>
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">
                                <div class="form-group">
                                    <label for="fp_email" class="sr-only">{{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="fp_email"  placeholder="@lang('lang.email')"  required >
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
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
    <span>© 2018 Copyright:<a href="#"> Eargir it company</a></span>
</div>

<script src="{{asset('assets/front/js/_JQuery/jquery.js')}}"></script>
<script src="{{asset('assets/front/js/_Popper/popper.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/index.js')}}"></script>
</body>
</html>