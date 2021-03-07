@extends('layouts.app_master_frontend')
@section('content')
    @include('frontend.pages.home.include._inc_slide',['slides' => $Slides])
    <!-- product section start -->
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <!-- area title end -->
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="features-tab">
{{--                        <!-- Nav tabs -->--}}
{{--                        <ul class="nav nav-tabs">--}}
{{--                            <li role="presentation" class="active"><a href="#home" data-toggle="tab">Bestsellers</a></li>--}}
{{--                            <li role="presentation"><a href="#profile" data-toggle="tab">Random Products</a></li>--}}
{{--                        </ul>--}}
                        <!-- Tab pans -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="row">
                                    <div class="features-curosel">
                                        @foreach($productNew as $proNew)
                                        <div class="col-lg-12 col-md-12">
                                            <!-- single-product start -->
                                            <div class="single-product first-sale">
                                                <div class="product-img">
                                                    <a href="#">
                                                        <img class="primary-image" src="{{ asset(pare_url_file($proNew->pro_avatar))}}" alt="" style="width: 475px; height: 475px"/>
                                                        <img class="secondary-image" src="{{ asset(pare_url_file($proNew->pro_avatar))}}" alt="" style="width: 475px; height: 475px"/>
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{ route('get.product.detail',[ 'id' => $proNew->id ,'slug' => $proNew->pro_slug]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="{{ route('ajax_get.user.add_favourite',$proNew->id ) }}" class="js-add-favourite" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="{{ route('get.shopping.add',$proNew->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($proNew->pro_price,0,',','.') }} đ</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="#">{{ $proNew->pro_name }}</a></h2>
                                                    <p>{{ $proNew->pro_description}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                        <!-- single-product end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
        @include('frontend.components.banner')
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            @foreach($productHot as $proHot)
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{ asset(pare_url_file($proHot->pro_avatar))}}" alt="" />
                                            <img class="secondary-image" src="{{ asset(pare_url_file($proHot->pro_avatar))}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{ route('get.product.detail',[ 'id' => $proHot->id ,'slug' => $proHot->pro_slug]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="{{ route('ajax_get.user.add_favourite',$proHot->id ) }}" class="js-add-favourite" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{ route('get.shopping.add',$proHot->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">{{ number_format($proHot->pro_price,0,',','.') }} đ</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">{{ $proHot->pro_name }}</a></h2>
                                        <p>{{ $proHot->pro_description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- single-product end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- latestpost area start -->
{{--    <div class="latest-post-area">--}}
{{--        <div class="container">--}}
{{--            <div class="area-title">--}}
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Tin Tức</h2>
            </div>
            <div class="row">
                <div class="features-curosel">
                    <!-- single latestpost start -->
                    @foreach($Articles as $articles)
                    <div class="col-lg-12 col-md-12">
                        <div class="single-product first-sale" style="margin-bottom: 10px">
{{--                        <div class="single-post" >--}}
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="{{ pare_url_file($articles->a_avatar) }}" alt="" style="width: 370px; height: 280px" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="{{ route('get.blog.detail',$articles->a_slug.'-'.$articles->id ) }}" style="height: 40px">{{ $articles->a_name }}</a>
{{--                                    <span>/</span>--}}
{{--                                    <span>Post by</span>--}}
{{--                                    <span>BootExperts</span>--}}
                                </div>
                                <div class="postexcerpt">
                                    <p>{{ $articles->a_description }}</p>
                                    <a href="{{ route('get.blog.detail',$articles->a_slug.'-'.$articles->id ) }}" class="read-more">Xem Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- latestpost area end -->
    <!-- block category area start -->
{{--    <div class="block-category">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <!-- featured block start -->--}}
{{--                <div class="col-md-4">--}}
{{--                    <!-- block title start -->--}}
{{--                    <div class="block-title">--}}
{{--                        <h2>Sản phẩm mua nhiều</h2>--}}
{{--                    </div>--}}
{{--                    <!-- block title end -->--}}
{{--                    <!-- block carousel start -->--}}
{{--                    @foreach($productPay as $product)--}}
{{--                    <div class="block-carousel">--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}"><img src="{{ asset(pare_url_file($product->pro_avatar))}}"  style="width: 140px; height: 144px" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}">{{ $product->pro_name  }}</a></h3>--}}
{{--                                    <p>{{ $product->pro_description }}</p>--}}
{{--                                    <div class="cat-price">--}}
{{--                                        @php--}}
{{--                                            $price = ((100 - $product->pro_sale) * $product->pro_price / 100);--}}
{{--                                        @endphp--}}
{{--                                        @if($product->pro_sale)--}}
{{--                                            <p style="font-size: 10px">Gía niêm yết:<span style="text-decoration: line-through; font-size: 9px">{{ number_format($product ->pro_price,0,',','.') }} Đ</span><br>--}}
{{--                                                Sale: <span>{{ number_format($product->pro_sale,0,',','.') }}%</span>--}}
{{--                                            </p>--}}
{{--                                            <p>--}}
{{--                                                Giá bán: <span style=" font-size: 10px">{{ number_format($price,0,',','.') }} Đ</span>--}}
{{--                                            </p>--}}
{{--                                        @else--}}
{{--                                            <p>Giá bán: <span style="font-size: 10px">{{ number_format($price,0,',','.') }} Đ</span></p>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--                    <!-- block carousel end -->--}}
{{--                </div>--}}
{{--                <!-- featured block end -->--}}
{{--                <!-- featured block start -->--}}
{{--                <div class="col-md-4">--}}
{{--                    <!-- block title start -->--}}
{{--                    <div class="block-title">--}}
{{--                        <h2>Sản phẩm giảm giá</h2>--}}
{{--                    </div>--}}
{{--                    <!-- block title end -->--}}
{{--                    <!-- block carousel start -->--}}
{{--                    @foreach($productSale as $sale)--}}
{{--                    <div class="block-carousel">--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="{{ route('get.product.detail',[ 'id' => $sale->id ,'slug' => $sale->pro_slug]) }}"><img src="{{ asset(pare_url_file($sale->pro_avatar))}}"  style="width: 140px; height: 144px" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="{{ route('get.product.detail',[ 'id' => $sale->id ,'slug' => $sale->pro_slug]) }}">{{ $sale -> pro_name }}</a></h3>--}}
{{--                                    <p>{{ $sale->pro_description }}</p>--}}
{{--                                    <div class="cat-price">--}}
{{--                                        @php--}}
{{--                                            $price = ((100 - $product->pro_sale) * $product->pro_price / 100);--}}
{{--                                        @endphp--}}
{{--                                        @if($product->pro_sale)--}}
{{--                                            <p style="font-size: 10px">Gía niêm yết:<span style="text-decoration: line-through; font-size: 9px">{{ number_format($product ->pro_price,0,',','.') }} Đ</span><br>--}}
{{--                                                Sale: <span>{{ number_format($sale->pro_sale,0,',','.') }}%</span>--}}
{{--                                            </p>--}}
{{--                                            <p>--}}
{{--                                                Giá bán: <span style=" font-size: 10px">{{ number_format($price,0,',','.') }} Đ</span>--}}
{{--                                            </p>--}}
{{--                                        @else--}}
{{--                                            <p>Giá bán: <span style="font-size: 10px">{{ number_format($price,0,',','.') }} Đ</span></p>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                    </div>--}}
{{--                    <!-- block carousel end -->--}}
{{--                </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <!-- featured block end -->--}}
{{--                <!-- featured block start -->--}}
{{--                <div class="col-md-4">--}}
{{--                    <!-- block title start -->--}}
{{--                    <div class="block-title">--}}
{{--                        <h2>Phụ kiện Hot</h2>--}}
{{--                    </div>--}}
{{--                    <!-- block title end -->--}}
{{--                    <!-- block carousel start -->--}}
{{--                    <div class="block-carousel">--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Voluptas nulla</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-14.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Cras neque metus</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$235.00</div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                        </div>--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-11.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Donec ac tempus</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-12.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Primis in faucibus</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$205.00</div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                        </div>--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-4.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Occaecati cupiditate</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-9.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Accumsan elit</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$165.00</div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                        </div>--}}
{{--                        <div class="block-content">--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-7.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Pellentesque habitant</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                            <!-- single block start -->--}}
{{--                            <div class="single-block">--}}
{{--                                <div class="block-image pull-left">--}}
{{--                                    <a href="product-details.html"><img src="img/block-cat/block-3.jpg" alt="" /></a>--}}
{{--                                </div>--}}
{{--                                <div class="category-info">--}}
{{--                                    <h3><a href="product-details.html">Donec non est</a></h3>--}}
{{--                                    <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    <div class="cat-price">$560.00</div>--}}
{{--                                    <div class="cat-rating">--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single block end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- block carousel end -->--}}
{{--                </div>--}}
{{--                <!-- featured block end -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- block category area end -->--}}
    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>BootExperts</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>Lavoro Store!</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>MR Selim Rana</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- Brand Logo Hãng Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href=""><img src="{{ asset('img/brand/PA.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href=""><img src="{{ asset('img/brand/AriesGold.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/Atlatic.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/DiamondD.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/Epos.jpg')}}" alt="" /></a></div>
{{--                    <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/Jacques.jpg')}}" alt="" /></a></div>--}}

                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
    <!--Chế độ bảo hành -->
    <div id="serviceSup">
        <div class="wrp">
            <div class="group">
                <div class="item">
                    <div class="flex">
                        <div class="img">
                            <img data-src="{{ asset('img/icon/sup1.png')}}" alt="Ship" class="lazy" src="{{ asset('img/icon/sup1.png')}}">
                        </div>
                        <div class="text">
                            <p class="ttu fRobotoB">GIAO HÀNG MIỄN PHÍ</p>
                            <p>Thanh toán (COD) tại nhà</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="flex">
                        <div class="img">
                            <img data-src="{{ asset('img/icon/sup2.png')}}" alt="Doi san pham" class="lazy" src="{{ asset('img/icon/sup2.png')}}">
                        </div>
                        <div class="text">
                            <p class="ttu fRobotoB">30 NGÀY ĐỔI SẢN PHẨM</p>
                            <p>Miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="flex">
                        <div class="img">
                            <img data-src="{{ asset('img/icon/sup3.png')}}" alt="Bao hanh" class="lazy" src="{{ asset('img/icon/sup3.png')}}">
                        </div>
                        <div class="text">
                            <p class="ttu fRobotoB">BẢO HÀNH QUỐC TẾ</p>
                            <p>Thay pin miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="flex">
                        <div class="img">
                            <img data-src="{{ asset('img/icon/sup4.png')}}" alt="Hoa don do" class="lazy" src="{{asset('img/icon/sup4.png')}}">
                        </div>
                        <div class="text">
                            <p class="ttu fRobotoB">CHÍNH HÃNG 100%</p>
                            <p>Xuất hóa đơn đỏ</p>
                        </div>
                    </div>
                </div>
            </div>
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
                        alert(results.messages);

                    });
                }

            })
        })
    </script>
@stop
