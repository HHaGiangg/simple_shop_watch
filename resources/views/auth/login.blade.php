@extends('layouts.app_master_frontend')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('get.home') }}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng nhập</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" class="login" action="{{ route('get.login') }}">
                            @csrf
                            <div class="form-fields">
                                <h2>Login</h2>
                                <p class="form-row form-row-wide">
                                    <label for="username">Email address <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="email" id="username" value="">
                                    @if($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password" id="password">
                                    @if($errors->first('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
                                <p class="lost_password"> <a href="{{ route('get.email_reset_password') }}">Lost your password?</a></p>
                                <div class="wrapper1">
                                    <button type="submit" class="btn btn-danger" > Đăng nhập</button>
                                </div>
{{--                                <label for="rememberme" class="inline">--}}
{{--                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me </label>--}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
