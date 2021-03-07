<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserFavouriteController extends Controller
{
    /**
     * * Hiển thị danh sách sản phẩm yêu thích
     **/
    public function index()
    {
        $userID = \Auth::id();
        $products = Product::with('category')->whereHas('favourite', function($query) use ($userID){
            $query->where('uf_user_id', $userID);
        })->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale','pro_category_id')->paginate(10);

        return view('user.favourite', compact('products'));
    }


    /**
     * * Thêm sản phẩm yêu thích
     **/
    public function addFavourite(Request $request, $id)
    {
        if($request->ajax()){
            //1. Kiểm tra tồn tại sản phẩm
            $product = Product::find($id);
            if(!$product) return response(['messages' =>'Không tồn tại sản phẩm']);

            $messages = ' Thêm yêu thích thành công';

            try {
                \DB::table('user_favourite')
                    ->insert([
                        'uf_product_id' => $id,
                        'uf_user_id' => \Auth::id()
                    ]);
            }catch (\Exception $exception) {
                $messages = 'Sản phẩm này đã được yêu thích';
            }

            return response(['messages' =>$messages]);

        }

    }
}
