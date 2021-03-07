@extends('layouts.app_master_frontend')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{route('get.home')}}">Trang Chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                            <a href="{{route('get.blog.home')}}">Bài Viết</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
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
                        <div class="blog_details">
                            <div class="col-md-12">
                                <div class="article_content" style="margin-bottom: 20px">
                                    <h1>{{ $articleDetail->a_name }}</h1>
                                    <p style="font-weight: 700;color:#333; font-size: 15px">{{$articleDetail->a_description}}</p><br>
                                    <div>
                                        {!! $articleDetail->a_content !!}
                                    </div>
                                </div>
                                <h4>Bài viết khác</h4>
                            </div>
                        </div>
                    </article>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
{{--                            {!!$articles->links()!!}--}}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h4 class="widget_title" style="color: #2d2d2d;">Hỏi đáp về đồng hồ</h4>
                        <div class="media post_item1">
                            <ul>
                                @foreach($articlesHotSidebarTop as $key =>  $item)
                                <li>
                                    <br>
                                    <span class="stt">{{ $key + 1 }}</span>
                                    <a href="{{route('get.blog.detail',$item->a_slug.'-'.$item->id)}}" title="{{$item -> a_name}}" style=" font-size: 15px"> {{ $item->a_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                        @include('frontend.components.hot_article',['articles'=>$articlesHot])
                        </aside>
                    </div>
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
