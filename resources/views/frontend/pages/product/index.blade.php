@extends('layouts.app_master_frontend')
@section('content')
    <!-- breadcrumbs area start -->
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
                            <li class="home">
                                <a href="{{ route('get.product.list') }}">Đồng hồ chính hãng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            @if(isset($cate))
                                @foreach($cate as $category)
                                    <li class="category3"><a href="{{ route('get.product.show', [$category->c_slug, $category->id]) }}">{{ $category -> c_name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                @include('frontend.pages.product.include._inc_slidebar')
                <div class="col-md-9 col-sm-12 col-xs-12">
        <!-- shop toolbar start -->
        <div class="shop-content-area">
            <div class="shop-toolbar">
                <div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
                    <form class="tree-most" method="get">
                        <div class="orderby-wrapper">
                            <label>Sort By</label>
                            <select name="orderby" class="orderby">
                                <option value="menu_order" selected="selected">Sắp xếp</option>
                                <option value="popularity">Sản phẩm nổi bật</option>
                                <option value="rating">Giá thấp đến cao</option>
                                <option value="date">Giá cao xuống thấp</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 none-xs text-center">
                    <div class="limiter hidden-xs">
                        <label>Show</label>
                        <select>
                            <option selected="selected" value="">9</option>
                            <option value="">12</option>
                            <option value="">24</option>
                            <option value="">36</option>
                        </select>
                        per page
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
                    <div class="view-mode">
                        <label>View on</label>
                        <ul>
                            <li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
                            <li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop toolbar end -->
        <!-- product-row start -->
                    <span class="new-price"> Tổng số: {{ $Products->total()  }} sản phẩm</span>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="shop-grid-tab">
                <div class="row">
                    @if(isset($Products))
                    <div class="shop-product-tab first-sale">
                        @foreach($Products as $product)
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="two-product">
                                    <!-- single-product start -->
                                    <div class="single-product">
{{--                                        <span class="sale-text">Sale</span>--}}
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" style="width: 134px; height: 219px"/>
                                                <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" style="width: 134px; height: 219px"/>
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="{{ route('get.product.detail',[ 'id' => $product->id ,'slug' => $product->pro_slug]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="{{ route('ajax_get.user.add_favourite',$product->id ) }}" class="js-add-favourite" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{ route('get.shopping.add',$product->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                @php
                                                    $price = ((100 - $product->pro_sale) * $product->pro_price / 100);
                                                @endphp
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
                                            <h2 class="product-name"><a href="{{ route('get.product.detail',[$product->pro_slug, $product->id]) }}">{{ $product->pro_name }}</a></h2>
                                            <p>{{ $product->pro_description }}</p>
                                        </div>
                                    </div>
                                    <!-- single-product end -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <!-- list view -->
        {{--                        <div class="tab-pane fade" id="shop-list-tab">--}}
        {{--                            <div class="list-view">--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-7.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-2.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Cras neque metus</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$110.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-7.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-8.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Donec non est</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$450.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-5.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-6.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$380.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-11.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-12.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Cras neque metus</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$340.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-9.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-10.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Voluptas nulla</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$400.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-6.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-7.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Primis in faucibus</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$200.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-4.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-5.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Quisque in arcu</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$440.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-2.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-3.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Imperial Consequences</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$334.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-4.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-2.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Consequences</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$220.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                                <!-- single-product start -->--}}
        {{--                                <div class="product-list-wrapper">--}}
        {{--                                    <div class="single-product">--}}
        {{--                                        <div class="col-md-4 col-sm-4 col-xs-12">--}}
        {{--                                            <div class="product-img">--}}
        {{--                                                <a href="#">--}}
        {{--                                                    <img class="primary-image" src="img/products/product-1.jpg" alt="" />--}}
        {{--                                                    <img class="secondary-image" src="img/products/product-1.jpg" alt="" />--}}
        {{--                                                </a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-8 col-sm-8 col-xs-12">--}}
        {{--                                            <div class="product-content">--}}
        {{--                                                <h2 class="product-name"><a href="#">Proin lectus ipsum</a></h2>--}}
        {{--                                                <div class="rating-price">--}}
        {{--                                                    <div class="pro-rating">--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="price-boxes">--}}
        {{--                                                        <span class="new-price">$230.00</span>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="product-desc">--}}
        {{--                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="actions-e">--}}
        {{--                                                    <div class="action-buttons">--}}
        {{--                                                        <div class="add-to-cart">--}}
        {{--                                                            <a href="#">Add to cart</a>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="add-to-links">--}}
        {{--                                                            <div class="add-to-wishlist">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                            <div class="compare-button">--}}
        {{--                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <!-- single-product end -->--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        <!-- shop toolbar start -->
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    {!!$Products->appends($query ?? [])->links()!!}
                </ul>
            </nav>
            <!-- shop toolbar end -->
        </div>
    </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area Start -->
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
@endsection
