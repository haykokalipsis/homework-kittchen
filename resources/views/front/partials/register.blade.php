<div class="col-items">
    <button class="btn btn-success myPostAdd" data-toggle="modal" data-target="#reg">@lang('lang.registeration')</button>
    <!-- The Modal -->
    <div class="modal" id="reg">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@lang('lang.registeration')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!-- REGISTRATION FORM -->
                    <div class="text-center" style="padding: 0">
                        <!-- Main Form -->
                        <div class="login-form-1">
                            <form id="register-form" class="text-left" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="login-form-main-message">
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
                                </div>
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
                                            <input type="radio" class="" name="type" id="company" value="company" placeholder="@lang('lang.company')" required>
                                            <label for="company">@lang('lang.company')</label>

                                            <input type="radio" class="" name="type" id="man" value="man" placeholder="@lang('lang.man')" required>
                                            <label for="man">@lang('lang.man')</label>
                                            @if($errors->has('reg_gender'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('reg_gender') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group login-group-checkbox">
                                            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                                            <label for="reg_agree"><a href="#">@lang('lang.Iagree')</a></label>
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

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('lang.close')</button>
                </div>

            </div>
        </div>
    </div>
</div>
