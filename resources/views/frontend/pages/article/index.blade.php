@extends('layouts.app_master_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Bài viết</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        @foreach($articlesHotCenterTop as $item)
                            <div class="article" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #f2f2f2; display: flex">
                                <div class="article_avatar">
                                    <a href="{{route('get.blog.detail',$item->a_slug.'-'.$item->id)}}" title="{{$item -> a_name}}"><img src="{{pare_url_file($item->a_avatar)}}" style="width: 880px; height: 260px" alt=""></a>
                                </div>
                                <div class="article_info" style="width: 55%; margin-left: 20px">
                                    <h2 style="font-size: 20px; font-weight: bolder; color: #288ad6"><a href="{{route('get.blog.detail',$item->a_slug.'-'.$item->id)}}" title="{{$item -> a_name}}">{{$item -> a_name}}</a></h2>
                                    <h3 style=" font: italic 13px Roboto; ">{{$item->a_description}}</h3>
                                </div>
                            </div>
                        @endforeach
                        <div class="blog_details">
                            @foreach($articles as $article)
                                @include('frontend.pages.article.include._inc_blog_item',['article' => $article])
                            @endforeach
                        </div>
                    </article>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="group">
                            {!!$articles->appends([])->links()!!}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('frontend.components.top_product',['products' => $proTopPay])
{{--                    @include('frontend.components.hot_article')--}}

{{--                    <aside class="single_sidebar_widget instagram_feeds">--}}
{{--                        <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>--}}
{{--                        <ul class="instagram_row flex-wrap">--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </aside>--}}

                </div>
            </div>
        </div>
    </div>
</section>
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
@endsection
