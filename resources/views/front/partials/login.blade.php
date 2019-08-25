<div class="col-items">
    <button class="btn btn-light mySign" data-toggle="modal" data-target="#login">@lang('lang.logıns')</button>
    <div class="modal" id="login">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@lang('lang.logıns')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center" style="padding: 0">
                        <!-- Main Form -->
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
                        <div class="login-form-1">
                            <form id="login-form" class="text-left"  role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="login-form-main-message"></div>
                                <div class="main-login-form">
                                    <div class="login-group">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="lg_username" class="sr-only">@lang('lang.email')</label>
                                            <input type="text" class="form-control" id="lg_username" name="email" value="{{ old('email') }}" placeholder="@lang('lang.email')">
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ">
                                            <label for="lg_password" class="sr-only">@lang('lang.password')</label>
                                            <input type="password" class="form-control" id="lg_password"  name="password"  placeholder="@lang('lang.password')">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group login-group-checkbox">
                                            <input type="checkbox" id="lg_remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="lg_remember">@lang('lang.remember')</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <div class="etc-login-form">
                                    <p><a href="{{ route('password.request') }}">@lang('lang.ForgotYourPassword')</a></p>
                                    <p><a href="{{route('register')}}">@lang('lang.newaccount')</a></p>
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
