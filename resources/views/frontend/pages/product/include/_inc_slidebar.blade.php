<style>
    .form-check .active a{
        color: red;
    }
    .price-check .active a{
        color: red;
    }
</style>
<!-- shop-with-sidebar Start -->
            <!-- left sidebar start -->
            <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                <div class="topbar-left">
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="{{ asset('img/bar-ping.png')}}" alt=""></div>
                            <h2>Shop by</h2>
                        </div>
                    </aside>
                    <aside class="topbarr-category sidebar-content">
                        <div class="tpbr-title sidebar-title col-md-12 nopadding">
                            <h6>Khoảng giá</h6>
                        </div>
                        <div class="price-check">
                        <ul>
                            @for($i = 1; $i <= 5; $i++)
{{--                                <li class="{{ Request::get('price') == $i ? "active":""}}">--}}
{{--                                    <a href="{{ request()->fullUrlWithQuery(['price' => $i]) }}">--}}
{{--                                        {{ $i == 6 ? "Lớn hơn 10 triệu" : "Giá" . " ". $i*2 . " ". "triệu" }}--}}
{{--                                    </a>--}}
                                </li>
                                <li class="{{ Request::get('price') == $i ? "active":""}}">
                                    <a href=" {{ request()->fullUrlWithQuery(['price'=> $i])}}"> Giá < {{ $i*2 }} triệu</a>
                                </li>
                            @endfor
                                <li class="{{ Request::get('price') == $i ? "active":""}}">
                                    <a href=" {{ request()->fullUrlWithQuery(['price'=> 6])}}"> Lớn hơn 10 triệu</a>
                                </li>
                        </ul>
                </div>
                    </aside>
                    @if(isset($country))
                            <aside class="sidebar-content">
                                <div class="sidebar-title">
                                    <h6>Xuất xứ</h6>
                                </div>
                                    <div class="form-check">
                                        @foreach($country as $key =>$item)
                                        <ul>
                                            <li class="{{ Request::get('country') == $key ? "active":""}}">
                                                <a href="{{ request()->fullUrlWithQuery(['country' =>$key]) }}">
                                                    <p><span>{{$item}}</span></p>
                                                </a>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                    @endif
                    @if(isset($attributes))
                        @foreach($attributes as $key => $attribute)
                            <aside class="sidebar-content">
                                <div class="sidebar-title">
                                    <h6>{{$key}}</h6>
                                </div>
                                @foreach($attribute as $item)
                                    <div class="form-check">
                                        <ul>
                                            <li class="{{ Request::get('attr_'.$item['atb_type']) == $item['id'] ? "active":""}}">
                                                <a href="{{ request()->fullUrlWithQuery(['attr_'.$item['atb_type'] => $item['id']]) }}">
                                                    <p><span>{{$item['atb_name']}}</span></p>
                                                </a>
                                            </li>
                                        </ul>
{{--                                        <label class="form-check-label" for="check2">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="{{ $item['id']}}"><a--}}
{{--                                                href="{{ request()->fullUrlWithQuery(['attr_'.$item['id'] => $item['id']]) }}"></a>{{$item['atb_name']}}--}}
{{--                                        </label>--}}
                                    </div>
                                @endforeach
                            </aside>
                        @endforeach
                    @endif
{{--                    <aside class="sidebar-content">--}}
{{--                        <div class="sidebar-title">--}}
{{--                            <h6>Composition</h6>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">Cotton</a><span> (3)</span></li>--}}
{{--                            <li><a href="#">Polyester</a><span> (9)</span></li>--}}
{{--                            <li><a href="#">Viscose</a><span> (9)</span></li>--}}
{{--                        </ul>--}}
{{--                    </aside>--}}
                    <aside class="widge-topbar">
                        <div class="bar-title">
                            <div class="bar-ping"><img src="{{ asset('img/bar-ping.png')}}" alt=""></div>
                            <h2>Tags</h2>
                        </div>
                        <div class="exp-tags">
                            <div class="tags">
                                <a href="#">Omega</a>
                                <a href="#">Rolex</a>
                                <a href="#">Phillip</a>
                                <a href="#">Citizen</a>
                                <a href="#">tablet</a>
                                <a href="#">accessories</a>
                                <a href="#">camcorder</a>
                                <a href="#">laptop</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
<!-- shop-with-sidebar end -->
