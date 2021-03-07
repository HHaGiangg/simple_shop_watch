@extends('layouts.app_master_frontend')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('get.home')}}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{route('get.shopping.list')}}">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{ route('get.shopping.pay') }}">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('get.shopping.list') }}">Cập nhật</a></small></div>
                        </div>
                        @foreach($Shopping as $key => $item)
                        <div class="panel-body">
                            <div class="form-group" >
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" style="width: 80px; height: 100px" src="{{ (pare_url_file($item->options->image))}}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $item->name }}</div>
                                    <div class="col-xs-12"><small>Số lượng x<span>{{ $item->qty }}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>
                                        <span><b>{{number_format($item->price,0,',','.')}}</b></span><span> VNĐ</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền</strong>
                                    <div class="pull-right"><span><b>{{number_format($item->price * $item->qty,0,',','.')}}Đ</b></span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                        </div>
                        @endforeach
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin thanh toán</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Name:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tst_name" class="form-control" required="" value="{{ get_data_user('web', 'name') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tst_email"  required="" class="form-control" value="{{ get_data_user('web', 'email') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tst_address"  required="" class="form-control" value="{{ get_data_user('web', 'address') }}" />
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <input type="text" name="zip_code" class="form-control" value="" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <div class="col-md-12"><strong>Điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="tst_phone"  required="" class="form-control" value="{{ get_data_user('web', 'phone') }}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12"><textarea name="tst_notes" id="" cols="72" rows="10"></textarea></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-submit-fix" style="text-align: center">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
{{--                    <div class="panel panel-info">--}}
{{--                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12"><strong>Card Type:</strong></div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <select id="CreditCardType" name="CreditCardType" class="form-control">--}}
{{--                                        <option value="5">Visa</option>--}}
{{--                                        <option value="6">MasterCard</option>--}}
{{--                                        <option value="7">American Express</option>--}}
{{--                                        <option value="8">Discover</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>--}}
{{--                                <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12"><strong>Card CVV:</strong></div>--}}
{{--                                <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <strong>Expiration Date</strong>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
{{--                                    <select class="form-control" name="">--}}
{{--                                        <option value="">Month</option>--}}
{{--                                        <option value="01">01</option>--}}
{{--                                        <option value="02">02</option>--}}
{{--                                        <option value="03">03</option>--}}
{{--                                        <option value="04">04</option>--}}
{{--                                        <option value="05">05</option>--}}
{{--                                        <option value="06">06</option>--}}
{{--                                        <option value="07">07</option>--}}
{{--                                        <option value="08">08</option>--}}
{{--                                        <option value="09">09</option>--}}
{{--                                        <option value="10">10</option>--}}
{{--                                        <option value="11">11</option>--}}
{{--                                        <option value="12">12</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
{{--                                    <select class="form-control" name="">--}}
{{--                                        <option value="">Year</option>--}}
{{--                                        <option value="2015">2015</option>--}}
{{--                                        <option value="2016">2016</option>--}}
{{--                                        <option value="2017">2017</option>--}}
{{--                                        <option value="2018">2018</option>--}}
{{--                                        <option value="2019">2019</option>--}}
{{--                                        <option value="2020">2020</option>--}}
{{--                                        <option value="2021">2021</option>--}}
{{--                                        <option value="2022">2022</option>--}}
{{--                                        <option value="2023">2023</option>--}}
{{--                                        <option value="2024">2024</option>--}}
{{--                                        <option value="2025">2025</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <span>Pay secure using your credit card.</span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <ul class="cards">--}}
{{--                                        <li class="visa hand">Visa</li>--}}
{{--                                        <li class="mastercard hand">MasterCard</li>--}}
{{--                                        <li class="amex hand">Amex</li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--CREDIT CART PAYMENT END-->
                </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>

@endsection
