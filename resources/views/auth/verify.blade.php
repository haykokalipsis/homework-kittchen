
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
                <div class="logo">Войти</div>
                <hr style="background-color: #00a700;">
                <!-- Main Form -->
                <div class="login-form-1">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.



                    </div>
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