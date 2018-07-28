@extends('layouts.app')

@section('content')

    {{--<div class="login-box">--}}
        {{--<div class="login-logo">--}}
            {{--<a href="../../index2.html"><b>Admin</b>LTE</a>--}}
        {{--</div>--}}
        {{--<!-- /.login-logo -->--}}
        {{--<div class="card">--}}
            {{--<div class="card-body login-card-body">--}}
                {{--<p class="login-box-msg">Sign in to start your session</p>--}}

                {{--<form action="../../index2.html" method="post">--}}
                    {{--<div class="form-group has-feedback">--}}
                        {{--<input type="email" class="form-control" placeholder="Email">--}}
                        {{--<span class="fa fa-envelope form-control-feedback"></span>--}}
                    {{--</div>--}}
                    {{--<div class="form-group has-feedback">--}}
                        {{--<input type="password" class="form-control" placeholder="Password">--}}
                        {{--<span class="fa fa-lock form-control-feedback"></span>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-8">--}}
                            {{--<div class="checkbox icheck">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox"> Remember Me--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                        {{--<div class="col-4">--}}
                            {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>--}}
                        {{--</div>--}}
                        {{--<!-- /.col -->--}}
                    {{--</div>--}}
                {{--</form>--}}

                {{--<div class="social-auth-links text-center mb-3">--}}
                    {{--<p>- OR -</p>--}}
                    {{--<a href="#" class="btn btn-block btn-primary">--}}
                        {{--<i class="fa fa-facebook mr-2"></i> Sign in using Facebook--}}
                    {{--</a>--}}
                    {{--<a href="#" class="btn btn-block btn-danger">--}}
                        {{--<i class="fa fa-google-plus mr-2"></i> Sign in using Google+--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<!-- /.social-auth-links -->--}}

                {{--<p class="mb-1">--}}
                    {{--<a href="#">I forgot my password</a>--}}
                {{--</p>--}}
                {{--<p class="mb-0">--}}
                    {{--<a href="register.html" class="text-center">Register a new membership</a>--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<!-- /.login-card-body -->--}}
        {{--</div>--}}
    {{--</div>--}}

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>

    <div class="login-box">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                <div class="login-logo">
                    <a href="#"><b>Lara</b>Stoke</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}


                        <div class="form-group has-feedback">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            {{ __('E-Mail') }}
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            {{ __('Senha') }}
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar') }}Lembrar                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{--{{ __('Login') }}--}}   Acessar o sistema
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
