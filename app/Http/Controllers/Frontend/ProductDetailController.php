<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use  App\Services\ProcessViewService;

class ProductDetailController extends FrontendController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function ProductDetail($slug, $id)
    {
        $product = Product::find($id);
//        $Product = Product::where('pro_active', 1)
//            ->orderByDesc('id')
//            ->limit(24)
//            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description')->get();
        $productNew = Product::where('pro_active', 1)
            ->orderByDesc('id')
            ->limit(8)
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description')->get();
        $price = ((100 - $product->pro_sale) * $product->pro_price / 100);
        if ($id)
        {
            $products = Product::with('category:id,c_name,c_slug','keywords')->findOrFail($id);
            ProcessViewService::view('products','pro_view','product',$id);
        }
            $productSuggets = $this->getProductSuggest($products->pro_category_id);
        $viewData =[
            'title_page' => $products->pro_name
        ];

        //Hien thi anh chi tiet sp
        $imgDetails = \DB::table('product_images')->where('pi_product_id',$id)->select('pi_image','pi_slug')->get();

        return view('frontend.pages.product_details.index', compact('product','productNew', 'price','products','productSuggets','imgDetails'), $viewData);
     }
        //Hien thi san pham lien quan
    private function getProductSuggest($categoryID)
    {
        $Product = Product::where([
            'pro_active' => 1,
            'pro_category_id' => $categoryID
        ])
            ->orderByDesc('id')
            ->limit(10)
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price')->get();
        return $Product;
    }


}
