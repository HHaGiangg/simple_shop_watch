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
                            <li class="category3"><span>Đăng ký</span></li>

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
                    <div class="customer-register my-account">
                        <form method="post" class="register">
                            @csrf
                            <div class="form-fields">
                                <h2>Register</h2>
                                <p class="form-row form-row-wide">
                                    <label for="name">Name: <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" id="" value="{{ old('name') }}">
                                    @if($errors->first('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email address <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" value="{{ old('email') }}">

                                    @if($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Password <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" id="reg_password">

                                    @if($errors->first('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Phone <span class="required">*</span></label>
                                    <input type="number" class="input-text" name="phone" value="{{ old('phone') }}">
                                    @if($errors->first('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="wrapper">
                                <button type="submit" class="btn btn-success" > Đăng ký</button>
                                <p class="lost_password"> <a href=""{{ route('get.email_reset_password') }}>Lost your password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Button from "@/Jetstream/Button";
    import Input from "@/Jetstream/Input";
    export default {
        components: {Input, Button}
    }
</script>
