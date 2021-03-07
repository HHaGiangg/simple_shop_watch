<aside class="single_sidebar_widget search_widget">
</aside>
<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title" style="color: #2d2d2d;">Sản Phẩm Bán Chạy</h4>
    <ul class="list cat-list">
        @foreach($products as $product)
            <div class="article" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px  #f2f2f2; display: flex">
                <div class="article_avatar">
                    <a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}"><img src="{{pare_url_file($product->pro_avatar)}}" style="width: 120px; height: 120px" alt=""></a>
                </div>
                <div class="article_info" style="width: 80%; margin-left: 20px">
                    <h2 style="font-size: 14px">
                        <a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}">{{$product->category->c_name ?? "[N\A]"}}</a>
                        <br>
                        <a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}">{{$product->pro_name}}</a></h2>
                    <p style="font-size: 13px">Giá bán <span>{{ number_format($product->pro_price,0,',','.') }} đ</span></p>
                </div>
            </div>
        @endforeach
    </ul>
</aside>
