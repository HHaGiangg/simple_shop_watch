<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    //
    public function index(Request $request)
    {
//        $Category = Category::where([
//            'c_status' => 1,
//            'c_hot' => 1
//        ])
//            ->orderByDesc('id')
//            ->limit(30)
//            ->select('id','c_name','c_slug','c_description')->get();
//        $categories = Category::all();


        $paramAtbSearch = $request->except('price','page','k','country');
        $paramAtbSearch = array_values($paramAtbSearch);

        $attributes = $this-> AttributeGroup();

        $Products = Product::where('pro_active', 1);

        //        loc sp theo ten san pham
        if ($name = $request->k) $Products->where('pro_name','like','%'.$name.'%');


        //         Loc theo xuat xư san pham
        if ($country = $request->country) $Products->where('pro_country',$country);


        //        loc tim sp theo thuoc tinh
        if (!empty($paramAtbSearch)){
            $Products->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id', $paramAtbSearch);
            });
        }
        //        loc tim sp theo gia
        if ($request->price){
            $price = $request ->price;
            if ($price == 6){
                $Products->where('pro_price','>',10000000);
            }else{
                $Products->where('pro_price','<=',2000000 * $price);
            }
        }

         $modelProduct = new Product();

        $Products = $Products->orderByDesc('id')
        ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description')
        ->paginate(12);

        $viewData = [
            'Products'   => $Products,
            'attributes' => $attributes,
            'query'      => $request->query(),
            'country'    => $modelProduct->country,
        ];

        return view('frontend.pages.product.index',$viewData);
    }
//    Show tu khoa
    public function AttributeGroup()
    {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key =>$attribute){
            $key = $attribute->gettype($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }
        return $groupAttribute;
    }


    //    show trong trang danh muc sp
    public function show( Request $request, $lug, $category)
    {
        $paramAtbSearch = $request->except('price','page');
        $paramAtbSearch = array_values($paramAtbSearch);

        $attributes = $this-> AttributeGroup();

        $Products = Product::where('pro_category_id', $category);

        //        loc tim sp theo thuoc tinh
        if (!empty($paramAtbSearch)){
            $Products->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id', $paramAtbSearch);
            });
        }
        //        loc tim sp theo gia
        if ($request->price){
            $price = $request ->price;
            if ($price == 6){
                $Products->where('pro_price','>',10000000);
            }else{
                $Products->where('pro_price','<=',2000000 * $price);
            }
        }

        $Products = $Products->where('pro_active', 1)->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_description','pro_sale')
            ->paginate(10);

        //        show thuoc tinh sp
        $attributes = $this-> AttributeGroup();

//        Lay toan bo danh muc(hãng) sp
//        Show tren header
        $categories = Category::all();
        $cate = Category::where('id',$category)
            ->select('id','c_name','c_slug')
            ->paginate(8);

        $viewData = [
            'categories' => $categories,
            'Products'   => $Products,
            'attributes' => $attributes,
            'cate'       => $cate,
//            'query'      => $request->query()
        ];
        return view('frontend.pages.product.index', $viewData);
    }

}
