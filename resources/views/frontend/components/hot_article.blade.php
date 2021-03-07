
<h4 class="widget_title" style="color: #2d2d2d;">Bài viết nổi bật</h4>
<div class="col-lg-12">
    <div class="blog_right_sidebar">
@foreach($articles as $article)
<div class="article" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #f2f2f2; display: flex">
    <div class="article_avatar">
        <a href="{{route('get.blog.detail',$article->a_slug.'-'.$article->id)}}" title="{{$article -> a_name}}"><img src="{{pare_url_file($article->a_avatar)}}" style="width: 360px; height: 214px" alt="">
        <p style="font-size: 14px; color: inherit">{{$article -> a_name}} </p>
        </a>
    </div>
</div>
@endforeach
    </div>
</div>
