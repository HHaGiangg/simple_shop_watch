<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $arrUrl = (preg_split("/(-)/i",$request->segment(2)));
        $id = array_pop($arrUrl);
        if ($id)
        {
            $proTopPay = $this->getProductTop();
            $articleDetail = Article::find($id);
            $article = Article::paginate(3);

            //Bai viet (cau hoi thuong gap) bên trái
            $articlesHotSidebarTop = Article::where([
                'a_active'     => 1,
                'a_position_2' => 1
            ])
                ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
                ->orderByDesc('id')
                ->limit(5)
                ->get();
            $viewData =[
                'title_page' => 'Bài viết',
                // Bài viết nổi bật
                'articlesHot' => $this->getArticleHot(),
                'articlesHotSidebarTop' => $articlesHotSidebarTop
            ];

            return view('frontend.pages.article_details.index',compact('article','articleDetail','proTopPay'), $viewData );
        }
        return redirect('/');
    }
}
