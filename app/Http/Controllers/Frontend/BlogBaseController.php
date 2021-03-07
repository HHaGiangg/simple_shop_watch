<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogBaseController extends Controller
{
    public function getProductTop()
    {
        // San pham mua nhieu
        $productPay = Product::with('category:id,c_name,c_slug')
        ->where([
            'pro_active' => 1,
        ])
            ->where('pro_pay','>',0)
            ->orderByDesc('pro_pay')
            ->limit(4)
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale','pro_category_id')->get();

        return $productPay;
    }
    /**
    Bai viet noi bật
     **/
    public function getArticleHot()
    {
        $articlesHot = Article::where([
            'a_hot' => 1,
//            'a_active' => 1
        ])
            ->select('id', 'a_name', 'a_slug', 'a_description', 'a_avatar', 'created_at')
            ->orderByDesc('id')
            ->get(6);

        return $articlesHot;
    }
}
