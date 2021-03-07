
<div style="width: 100%;max-width: 600px; margin: 0 auto">
    <div style="height: 55px;background: #3a2615; padding: 10px">
        <div style="width: 50%">
            <a href="">
                <img style="height: 55px" src="https://www.dangquangwatch.vn/view/css/icon/logo.png" >
            </a>
        </div>
        <div style="width: 50%"></div>
    </div>
    <div style="background: #f4f5f5;box-sizing: border-box; padding: 15px;border-top: 1px solid #dedede;border-bottom: 1px solid #dedede">
        <h2 style="margin: 10px 0; border-bottom: 1px solid #dedede; padding-bottom: 10px;">Danh sách sản phẩm bạn đã mua</h2>
        <div>
            @foreach($Shopping as $key => $item)
            <div style="border-bottom: 1px solid #dedede; padding-bottom: 10px; padding-top: 10px">
                <div class="" style="width: 15%; float: left">
                    <a href="">
                        <img style="max-width: 100%; width: 80px; height: 100px" src="{{ (pare_url_file($item->options->image))}}" alt="">
                    </a>
                </div>
                <div style="width: 80%; float: right">
                    <h4 style="margin: 10px 0">{{ $item->name }}</h4>
                    <p style="margin: 4px 0; font-size: 14px"> Giá <span>{{number_format($item->price,0,',','.')}}Đ</span></p>
                    @if($item->options->pro_old)
                    <p style="margin: 4px 0; font-size: 14px">
                        <span class="cart-price" style="text-decoration: line-through">{{number_format(number_price($item->options->pro_old),0,',','.')}}Đ</span>
                        <span class="cart-price">- {{$item->options->sale}} %</span>
                    </p>
                    @endif
                </div>
                <div style="clear: both"></div>
            </div>
            @endforeach
            <h2>Tổng tiền : <b>{{ \Cart::subtotal(0) }} Đ</b></h2>
        </div>
        <p>Đây là email tự động, xin vui lòng không trả lời email này</p>
        <p>Mời bạn <a href="{{ route('get.user.update_info')}}">click vào đây</a> để cập nhật thông tin cá nhân của bạn</p>
    </div>
    <div style="background: #f4f5f5; box-sizing: border-box; padding: 15px">
        <p style="margin: 2px 0; color: #333">Email : hhgiang.itdev@gmail.com</p>
        <p style="margin: 2px 0; color: #333">Phone : 0337302525</p>
        <p style="margin: 2px 0; color: #333">facebook : <a href="https://www.facebook.com/giang.ha.161446">HHgiang</a></p>
    </div>
</div>
