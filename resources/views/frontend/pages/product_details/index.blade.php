@extends('layouts.app_master_frontend')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('get.home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{  $product -> pro_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset(pare_url_file($product->pro_avatar))}}" data-zoom-image="{{ asset(pare_url_file($product->pro_avatar))}}" alt="big-1">
                            </a>
                        </div>
{{--                        @if($imgDetails)--}}
{{--                        <div class="single-zoom-thumb">--}}
{{--                            @foreach($imgDetails as $img)--}}
{{--                            <ul class="bxslider" id="gallery_01">--}}

{{--                                <li>--}}
{{--                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="" data-zoom-image="{{ asset(pare_url_file($img->pi_slug))}}"><img src="{{ asset(pare_url_file($img->pi_slug))}}" /></a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        @endif--}}
                        <div class="single-zoom-thumb" class="zoomWrapper single-zoom">
                            <div class="bxslider" id="gallery_01">
                                @foreach($imgDetails as $item)
                                    <div class="col-sm-3" style="margin-bottom: 15px;">
                                        <ul >
                                            <li>
                                        <a href="" style="display: block">
                                            <img id="zoom1" src="{{ pare_url_file($item->pi_slug) }}" alt="" style="width: 70px;height: 83px" data-zoom-image="{{ pare_url_file($item->pi_slug) }}">
                                        </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{  $product -> pro_name }}</a></h2>
                                <div class="rating-price">
{{--                                    <div class="pro-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
                                    <div class="price-boxes">
                                        @if($product->pro_sale)
                                            <p>Gía niêm yết:<span style="text-decoration: line-through">{{ number_format($product ->pro_price,0,',','.') }} vnđ</span><br>
                                            </p>
                                            <br>
                                            <p>
                                                Giá bán: <span>{{ number_format($price,0,',','.') }} vnđ</span>
                                                <span>{{ number_format($price,0,',','.') }} %</span>
                                            </p>
                                        @else
                                            <p>Giá bán: <span>{{ number_format($price,0,',','.') }} vnđ</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-view">
                                    <p>
                                        <span>View : </span>
                                        <span>{{ $product->pro_view }}</span>
                                    </p>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $product->pro_description }}</p>
                                </div>
                                <p class="availability in-stock">Trình trạng: <span>Còn hàng</span></p>
                                @if(isset($products->keywords))
                                <div class="product-name">
                                    <h6 class="text2">KeyWord</h6>
                                    @foreach($products->keywords as $keyword)
                                    <p class="text1"><a href="" style="border: 1px solid #E91E63; display: inline-block; font-size: 13px;
                                    padding: 0 5px; border-radius: 5px;margin-right: 10px; color:#E91E63 ">{{ $keyword->k_name }}</a></p>
                                    @endforeach
                                </div>
                                @endif
{{--                                <div class="product-name">--}}
{{--                                    <p class="text1"> Độ chịu nước: <span>{{ $product->pro_resistant }}</span></p>--}}
{{--                                    --}}{{--                                    <h2 class="text2"></h2>--}}
{{--                                </div>--}}
{{--                                <div class="product-name">--}}
{{--                                    <p class="text1"> Xuất xứ: <span>{{ $product->getCountry($product->pro_country) }}</span></p>--}}
{{--                                    --}}{{--                                    <h2 class="text2"></h2>--}}
{{--                                </div>--}}
                                <div class="actions-e">
                                    <div class="action-buttons-single">
{{--                                        <div class="inputx-content">--}}
{{--                                            <label for="qty">Quantity:</label>--}}
{{--                                            <input type="text" name="qty" id="qty" maxlength="12" value="{{ $product->qty }}" title="Qty" class="input-text qty" action="{{route('get.shopping.add')}}">--}}
{{--                                        </div>--}}
                                        <div class="add-to-cart">
                                            <a href="{{ route('get.shopping.add',$product->id) }}">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="{{ route('ajax_get.user.add_favourite', $product->id) }}" data-toggle="tooltip" title="" class="js-add-favourite" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-share">
                                    <a href="#"><img src="" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Thông số kỹ thuật</a></li>
{{--                        <li class=""><a href="#messages" data-toggle="tab"> Review</a></li>--}}
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{{ $product->pro_content }} </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">
                                <div class="comments-area">
                                    <h3 class="comment-reply-title">{{  $product -> pro_name }}</h3>
                                    <div class="comments-list">
                                        <ul>
                                            <li>
                                                <div class="comments-details">
                                                    <div class="comments-list-img">
                                                        <img src="{{asset('img/user-1.jpg')}}" alt="">
                                                    </div>
                                                    <div class="content-wrap">
                                                        <p class="text1"><b>Thông số kỹ thuật:</b></p>
                                                        <hr>
                                                        <p class="text1"> Năng lượng: <span>{{ $product->pro_energy }}</span></p>
                                                        <hr>
                                                        <p class="text1"> Độ chịu nước: <span>{{ $product->pro_resistant }}</span></p>
                                                        <hr>
                                                        <p class="text1"> Xuất xứ: <span>{{ $product->getCountry($product->pro_country) }}</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm tương tự</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($productSuggets as $pro)
                                <div class="col-lg-12 col-md-12">
                                    <!-- single-product start -->
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-image" src="{{ asset(pare_url_file($pro->pro_avatar))}}" alt="" style="width: 134px; height: 219px"/>
                                                <img class="secondary-image" src="{{ asset(pare_url_file($pro->pro_avatar))}}" alt="" style="width: 134px; height: 219px"/>
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="{{ route('get.product.detail',[$pro->pro_slug, $pro->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                            <a href="{{ route('ajax_get.user.add_favourite',$pro->id ) }}" class=" {{ !\Auth::id() ? 'js-show-login' : 'js-add-favourite'}}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        <div class="compare-button">
                                                            <a href="{{ route('get.shopping.add',$pro->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
{{--                                                <a href="{{ route('ajax_get.user.add_favourite',$pro->id ) }}" title="Thêm sản phẩm yêu thích" class="favourite  js-add-favourite"></a>--}}
{{--                                                <a href="{{ route('get.shopping.add',$pro->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>--}}
                                            </div>
                                            <div class="price-box">
                                                @if($product->pro_sale)
                                                    {{--                                                    <span class="new-price" style="text-decoration: line-through">{{ number_format($product->pro_price,0,',','.') }} đ</span>--}}
                                                    {{--                                                    <br>--}}
                                                    <span class="new-price">{{ number_format($price,0,',','.') }} đ</span>
                                                @else
                                                    <span class="new-price">{{ number_format($price,0,',','.') }} đ</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="{{ route('get.product.detail',[$pro->pro_slug, $pro->id]) }}">{{ $pro->pro_name }}</a></h2>
                                            <p>{{ $pro->pro_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- single-product end -->
                            <!-- single-product start -->

                            <!-- single-product end -->
                            <!-- single-product start -->
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="single-product first-sale">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <a href="#">--}}
{{--                                            <img class="primary-image" src="{{ asset('img/products/product-9.jpg')}}" alt="" />--}}
{{--                                            <img class="secondary-image" src="{{ asset('img/products/product-10.jpg')}}" alt="" />--}}
{{--                                        </a>--}}
{{--                                        <div class="action-zoom">--}}
{{--                                            <div class="add-to-cart">--}}
{{--                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="actions">--}}
{{--                                            <div class="action-buttons">--}}
{{--                                                <div class="add-to-links">--}}
{{--                                                    <div class="add-to-wishlist">--}}
{{--                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="compare-button">--}}
{{--                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="quickviewbtn">--}}
{{--                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="price-box">--}}
{{--                                            <span class="new-price">$270.00</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content">--}}
{{--                                        <h2 class="product-name"><a href="#">Voluptas nulla</a></h2>--}}
{{--                                        <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
                            <!-- single-product end -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            //    bat su kien click
            $(".js-add-favourite").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url   = $this.attr('href');
                console.log(url)
                if(url)
                {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method:"POST",
                        url: url,
                    }).done(function( results ) {
                        // alert(results.messages);
                        toastr.warning(results.messages);
                    });
                }

            });

        })
    </script>
@endsection

