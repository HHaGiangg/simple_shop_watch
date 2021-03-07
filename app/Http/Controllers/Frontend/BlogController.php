<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends BlogBaseController
{

    public function index()
    {
        // Danh sách bài viết
        $articles = Article::where([
            'a_active' =>1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->orderByDesc('id')
            ->paginate(5);
        $proTopPay = $this->getProductTop();

        // Bai viet noi bat trung tam
        $articlesHotCenterTop = Article::where([
            'a_active'     => 1,
            'a_position_1' => 1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $viewData =[
            'title_page'  => 'Tin tức',
            'articlesHot' => $this->getArticleHot(),
            'articlesHotCenterTop' => $articlesHotCenterTop

        ];
//        $viewData =[
//          'articles'  => $articles
//        ];

        return view('frontend.pages.article.index', compact('articles','proTopPay'),$viewData);
    }
}
