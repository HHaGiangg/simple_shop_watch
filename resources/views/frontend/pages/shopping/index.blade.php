@extends('layouts.app_master_frontend')
@section('content')
    <style>
        .btn-action{
            font-size: 12px;
            padding: 7px 10px ;
            border: 1px solid #dedede;
            background-color:  #99ffff;
            color: white;
            margin-top: 5px;
            display: inline-block;
            border-radius: 10px;
        }
    </style>
    <!-- header area end -->
    <!-- breadcrumbs area start -->
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
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- Shopping Table Container -->
    <div class="cart-area-start">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
{{--                                <th></th>--}}
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php $i =1?>
                                @foreach($Shopping as $key => $item)
                                        <td>#{{$i}}</td>
                                <td>
{{--                                    <a href="{{ route('get.product.detail',\Str::slug($item->name).'-'.$item->id) }}">--}}
                                        <a><img style="width: 61px; height: 100px" src="{{ (pare_url_file($item->options->image))}}" class="img-responsive" alt=""/></a>
                                </td>
                                    <td>
                                        <div class="cart-name">{{ $item->name }}</div>
                                    </td>
{{--                                <td><a href="#">Edit</a></td>--}}
                                <td>
                                    <div class="cart-price"><b>{{number_format($item->price,0,',','.')}}Đ</b></div>
                                    @if($item->options->pro_old)
                                        <div class="cart-price" style="text-decoration: line-through">{{number_format(number_price($item->options->pro_old),0,',','.')}}Đ</div>
                                    @endif
                                    <div class="cart-price">- {{$item->options->sale}} %</div>
                                </td>
                                <td class="col col4">
                                    <div >
                                        <input type="number" id="qty"  value="{{ $item->qty }}" min="1" class="input_quantity" >
                                        <a class="js-update-item-cart btn-action" value="Cập nhật" href="{{ route('ajax_get.shopping.update', $key) }}" data-id-product="{{$item->id}}" data-id="{{ $key }}">Cập nhật</a>
                                    </div>
{{--                                    <input type="number" id="qty"  value="{{ $item->qty }}">--}}
{{--                                    <input type="button"class="js-update-item-cart" href="{{ route('ajax_get.shopping.update', $key) }}" data-id-product="{{$item->id}}" data-id="{{ $key }}" value="Cập nhật">--}}

                                </td>
                                <td>
                                    <div class="cart-subtotal"><b>{{number_format($item->price * $item->qty,0,',','.')}}Đ</b></div>
                                </td>
                                <td>
{{--                                    <a class="js-update-item-cart" href="{{ route('ajax_get.shopping.update', $key) }}" data-id-product="{{$item->id}}" data-id="{{ $key }}"><i class="fa fa-plus"></i></a>--}}
                                    <a href="{{ route('get.shopping.delete', $key) }}"><i class="fa fa-trash-o"></i></a>
                                </td>

                            </tr>
{{--                            <?php $i ++ ?>--}}
{{--                            <tr>--}}
{{--                                <td class="actions-crt" colspan="7">--}}
{{--                                    <div class="">--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{ route('get.home') }}">Tiếp tục mua hàng</a></div>--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="js-update-item-cart" href="{{ route('ajax_get.shopping.update', $key) }}" data-id-product="{{$item->id}}" data-id="{{ $key }}">Cập nhật giỏ hàng</a></div>--}}
{{--                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{ route('get.shopping.deleteAll') }}">Xóa giỏ hàng</a></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}

                            @endforeach
                            </tbody>
                        </table>
                            <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="btn-info" href="{{ route('get.product.list') }} " style="background: #3498db;padding: 10px 15px;color: #FFF;border-radius: 25px;text-transform: uppercase;">Tiếp tục mua hàng<i class="fa fa-arrow-right"></i></a></div>
                                <h5 class="pull-right">Tổng tiền cần thanh toán:<b>{{ \Cart::subtotal(0) }} Đ</b> <a href="{{route('get.shopping.pay')}}" class="btn btn-success">Thanh toán</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->

            <!-- Shopping Coupon -->
        </div>
    <!-- Shopping Table Container -->
    <!-- FOOTER START -->
    {{--    <script src="{{ asset('js/cart.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            $(".js-update-item-cart").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let qty = $("#qty").val()
                let idProduct = $this.attr('data-id-product')
                if(url)
                {
                    $.ajax({
                        url: url,
                        data: {
                            qty: qty,
                            idProduct : idProduct
                        }
                    }).done(function( results ) {
                        // alert(results.message)
                        toastr.success(results.message);
                        // window.location.reload();
                        });
                }
            })
        })
    </script>
@endsection


