<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
//    public function index()
//    {
//        $Category = Category::where([
//            'c_status' => 1,
//            'c_hot' => 1
//        ])
//            ->orderByDesc('id')
//            ->limit(30)
//            ->select('id','c_name','c_slug','c_description')->get();
//        return view('frontend.pages.product.index',compact('Category'));
//    }
}
