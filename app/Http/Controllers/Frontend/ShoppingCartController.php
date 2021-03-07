<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //    Hien danh sach gio hang
    public function index()
    {
        $Shopping = \Cart::content();
        $viewData =[
            'title_page' => 'Danh sách giỏ hàng'
        ];
        return view('frontend.pages.shopping.index', compact('Shopping'), $viewData);
    }

    //    Them gio hang
    public function add($id)
    {
        $product = Product::find($id);

        //1. Kiểm tra tồn tại của sản phẩm
        if (!$product) return redirect()->to('/');

        //2. Kiểm tra số lượng sản phẩm
        if($product->pro_number < 1){
            //4. Thông báo
            \Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);
            return redirect()->back();
        }

        //3. Thêm sản phẩm vào giỏ hàng
        \Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => number_price($product->pro_price, $product->pro_sale),
            'weight' => 1,
            'options' => [
                'sale' => $product->pro_sale,
                'pro_old' => $product ->pro_price,
                'image' => $product->pro_avatar
                ]]);

        //4. Thông báo
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);

        return redirect()->back();
    }

    //    Xoa 1 sp
    public function delete($rowId)
    {
        \Cart::remove($rowId);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa sản phẩm khỏi đơn hàng thành công'
        ]);

        return redirect()->back();
    }

    //    Xoa toan bo sp
//    public function deleteAll()
//    {
//        \Cart::destroy();
//        \Session::flash('toastr',[
//            'type' => 'success',
//            'message' => 'Xóa tất cả sản phẩm khỏi đơn hàng thành công'
//        ]);
//        return redirect()->back();
//    }
    // Update gio hang
    public function update(Request $request, $id){
        if ($request->ajax()){
            //1. Lấy tham số
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            //2. Kiểm tra sản phẩm tồn tại
            if (!$product) return response(['message' => 'Không tồn tại sản phẩm để cập nhật']);
            //3. Kiểm tra số lượng sản phẩm
            if ($product->pro_number < $qty)
            {
                return response(['message' => 'Số lượng sản phẩm  không đủ để cập nhật']);
            }
            //4. Update
            \Cart::update($id, $qty);
            return response(['message' => 'Cập nhật thành công']);
        };
    }


}
