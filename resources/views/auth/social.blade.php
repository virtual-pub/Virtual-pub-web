
@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
            <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-block btn-social btn-facebook">
                <span class="fa fa-facebook"></span>
                Login with Facebook
            </a>
           
            <a href="{{ route('social.oauth', 'google') }}" class="btn btn-block btn-social btn-google">
                <span class="fa fa-google"></span>
                Login with Google
            </a>
            <hr>
            <a href="{{ route('login') }}" class="btn btn-block btn-social btn-default">
                <span class="fa fa-envelope"></span>
                Login with Email
            </a>
        </div>
    </div>
@stop
