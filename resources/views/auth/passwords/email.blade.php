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
                            <li class="category3"><span>Reset Password</span></li>

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
                                <h2>Reset Password</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email address <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" required="" value="{{ old('email') }}">

                                    @if($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="wrapper">
                                <button type="submit" class="btn btn-success" > Gửi xác nhận</button>
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
