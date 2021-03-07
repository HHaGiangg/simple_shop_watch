<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\TransactionSuccess;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PayController extends ShoppingCartController
{
    //    Luu don hang

    public function getPay()
    {
        $Shopping = \Cart::content();
        return view('frontend.pages.shopping.pay', compact('Shopping'));
    }
    public function postPay(Request $request)
    {
        $data = $request->except('_token');
        if (isset(\Auth::user()->id))
        {
            $data['tst_user_id'] = \Auth::user()->id;
        }
            $data['tst_total_money'] = str_replace(',','',\Cart::subtotal(0));
        $data['updated_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);
        if ($transactionID)
        {
            $Shopping = \Cart::content();
            Mail::to($request->tst_email)->send(new TransactionSuccess($Shopping));
            foreach ($Shopping as $key => $item)
            {

                //Luu chi tiet dơn hang
                Order::insert([
                   'od_transaction_id' =>$transactionID,
                    'od_product_id' => $item->id,
                    'od_sale' => $item->options->sale,
                    'od_qty' => $item->qty,
                    'od_price' => $item->price
                ]);
                // Tăng số lượt mua của sản phẩm
                \DB::table('products')
                    ->where('id', $item->id)
                    ->increment('pro_pay');
            }
        }
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đơn hàng của bạn đã được lưu'
        ]);
        \Cart::destroy();
        return redirect()->to('/');
    }

}
