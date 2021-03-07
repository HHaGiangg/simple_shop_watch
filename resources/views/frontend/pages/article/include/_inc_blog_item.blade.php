    <div class="article" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #f2f2f2; display: flex">
                <div class="article_avatar">
                    <a href="{{route('get.blog.detail',$article->a_slug.'-'.$article->id)}}" title="{{$article -> a_name}}"><img src="{{pare_url_file($article->a_avatar)}}" style="width: 250px; height: 140px" alt=""></a>
                </div>
                <div class="article_info" style="width: 80%; margin-left: 20px">
                    <h2 style="font-size: 14px"><a href="{{route('get.blog.detail',$article->a_slug.'-'.$article->id)}}" title="{{$article -> a_name}}">{{$article -> a_name}}</a></h2>
                    <p style="font-size: 13px">{{$article->a_description}}</p>
                    <p>Admin: <span>{{ $article->created_at }}</span></p>
                </div>
    </div>


