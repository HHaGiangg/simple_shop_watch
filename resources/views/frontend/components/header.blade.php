<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="{{ route('get.home') }}"><img src="{{ asset('img/logo.gif')}}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-7 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{ route('get.home') }}">Trang chủ</a></li>
                            <li class="expand"><a href="{{ route('get.product.list') }}">Đồng hồ chính hãng</a>
                                <ul class="restrain sub-menu">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <li><a href="{{ route('get.product.show', [$category->c_slug, $category->id]) }}">{{ $category -> c_name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="expand"><a href="shop-grid.html">Phụ kiện </a>
                                <div class="restrain mega-menu megamenu1">
											<span>
												<a class="mega-menu-title" href="shop-grid.html"> Dresses </a>
												<a href="shop-grid.html">Coctail</a>
												<a href="shop-grid.html">Day</a>
												<a href="shop-grid.html">Evening </a>
												<a href="shop-grid.html">Sports</a>
											</span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html"> Handbags </a>
												<a href="shop-grid.html">Blazers</a>
												<a href="shop-grid.html">Table</a>
												<a href="shop-grid.html">Coats</a>
												<a href="shop-grid.html">Kids</a>
											</span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html"> Clothing </a>
												<a href="shop-grid.html">T-Shirt</a>
												<a href="shop-grid.html">Coats</a>
												<a href="shop-grid.html">Jackets</a>
												<a href="shop-grid.html">Jeans</a>
											</span>
                                    <span class="block-last">
												<img src="img/block_menu.jpg" alt="" />
											</span>
                                </div>
                            </li>
                            <li class="expand"><a href="#">Pages</a>
                                <ul class="restrain sub-menu">
                                    <li><a href="{{ route('get.blog.home') }}">Tin tức</a></li>
                                    <li><a href="about-us.html">Về Chúng Tôi</a></li>
                                    <li><a href="contact-us.html">Liên Hệ Với Chúng Tôi</a></li>
                                </ul>
                            </li>
                            @if(Auth::check())
                                <li><a href="{{ route('get.register') }}">Xin chào {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ route('get.user.dashboard') }}">Quản lý tài khoản</a></li>
                            @else
                                <li class="expand"><a href="{{ route('get.login') }}">Đăng nhập</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-sm-2 ">
                <div class="top-detail">
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{ route('get.shopping.list') }}"><i class="icon-bag"></i></a>
                                    <a href=""><span class="cart-quantity">{{ \Cart::count() }}</span></a>
                                </div>
{{--                                <div class="restrain small-cart-content">--}}
{{--                                    @foreach($Shopping as $key =>  $item)--}}
{{--                                    <ul class="cart-list">--}}
{{--                                        <li>--}}
{{--                                            <a class="sm-cart-product" href="product-details.html">--}}
{{--                                                <img src="{{ asset('img/products/sm-products/cart2.jpg')}}" alt="">--}}
{{--                                            </a>--}}
{{--                                            <div class="small-cart-detail">--}}
{{--                                                <a class="remove" href="{{ route('get.shopping.delete', $key) }}"><i class="fa fa-times-circle"></i></a>--}}
{{--                                                <a href="#" class="edit-btn" style="width: 50px; height: 66px;"><img src="{{ (pare_url_file($item->options->image))}}" alt="Edit Button" /></a>--}}
{{--                                                <a class="small-cart-name" href="">{{ $item->name }}</a>--}}
{{--                                                <span class="quantitys"><strong></strong><span>{{number_format($item->price,0,',','.')}}Đ</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                        <p class="total">Subtotal: <span class="amount">{{number_format($item->price * $item->qty,0,',','.')}}Đ</span></p>--}}
{{--                                    @endforeach--}}
{{--                                    <p class="buttons">--}}
{{--                                        <a href="checkout.html" class="button">Checkout</a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="{{ route('get.product.list') }}" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language" style="width: 200px">
                                @if(Auth::check())
{{--                                    <li><a href="{{ route('get.register') }}">Xin chào {{ Auth::user()->name }}</a></li>--}}
                                    <li><a href="login.html">Quản lý</a></li>
                                    <li><a href="wishlist.html">Sản phẩm yêu thích</a></li>
                                    <li><a href="{{route('get.shopping.list')}}">Giỏ hàng</a></li>
                                    <li><a href="{{ route('get.logout') }}">Thoát</a></li>
                                @else
{{--                                    <li class="expand"><a href="{{ route('get.login') }}">Đăng nhập</a></li>--}}
                                    <li class="expand"><a href="{{ route('get.register') }}">Đăng ký</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>

    </div>
</header>
