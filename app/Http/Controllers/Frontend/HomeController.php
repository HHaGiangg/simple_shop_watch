<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Event;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class HomeController extends FrontendController
{

    public function index()
    {


//        $Shopping = \Cart::content();
        //    san pham moi
        $productNew = Product::where('pro_active', 1)
            ->orderByDesc('id')
            ->limit(8)
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description')->get();

//        san pham Hot
        $productHot = Product::where([
            'pro_hot' => 1
        ])
            ->orderByDesc('id')
            ->limit(8)
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description')->get();

//      show bai viet ra trang chu
        $Articles = Article::where([
            'a_active' => 1,
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->orderByDesc('id')
            ->paginate(10);

//        Show slide trang chu
        $Slides = Slide::where('sd_active', 1)
            ->orderBy('sd_sort','asc')
            ->get();

//      Show event
        $event1 = Event::where('e_position_1',1)->first();

//        $price = ((100 - $product->pro_sale) * $product->pro_price / 100);
////        show sp duoc mua nhieu
//        $productPay = Product::with('category:id,c_name,c_slug')
//            ->where([
//                'pro_active' => 1,
//            ])
//            ->where('pro_pay','>',0)
//            ->orderByDesc('pro_pay')
//            ->limit(3)
//            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale','pro_category_id')->get();
//
////        show sp giam gia
//        $productSale = Product::with('category:id,c_name,c_slug')
//            ->where([
//                'pro_active' => 1,
//                'pro_hot'    =>1
//            ])
//            ->where('pro_pay','>',0)
//            ->orderByDesc('pro_pay')
//            ->limit(5)
//            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale','pro_category_id')->get();

        $viewData =[
            'title_page' => "Đồ án",
//            'event1'     => $event1
        ];
//        return view('frontend.pages.home.index',$viewData);
        return view('frontend.pages.home.index', compact('productNew','productHot', 'viewData','Articles','Slides','event1'));
    }
    public function delete($rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back();
    }

}
