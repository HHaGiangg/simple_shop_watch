@extends('layouts.app_master_uer')
@section('content')
    <section class="py-lg-5" style="background: white; padding: 20px">
        <h4>Cập nhật thông tin</h4>
        <div class="row mb-5">
            <div class="col-sm-12">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="">
                        {{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
                        {{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="Số điện thoại">
                        {{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" placeholder="Địa chỉ">
                        {{--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    {{--                <div class="form-group">--}}
                    {{--                    <label for="exampleInputPassword1">Password</label>--}}
                    {{--                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                    {{--                </div>--}}
                    {{--                <div class="form-check">--}}
                    {{--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                    {{--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                    {{--                </div>--}}
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
