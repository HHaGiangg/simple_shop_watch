<?php

namespace App\Http\Controllers\User;

use App\Exports\TransactionExport;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
//        lay ra dung ID cua user dang dang nhap
        $transactions = Transaction::whereRaw(1)->where('tst_user_id', \Auth::id());
        if ($request->id) $transactions->where('id',$request->id);
        if ($email = $request->email){
            $transactions->where('tst_email','like','%'.$email.'%');
        }
        if ($status = $request->type){
            if ($status == 1){
                $transactions->where('tst_user_id','<>',0);
            }else{
                $transactions->where('tst_user_id',0);
            }
        }
        if ($status = $request->status){
            $transactions->where('tst_status',$status);
        }
        $transactions = $transactions->orderByDesc('id')->paginate(10);
//        if ($status = $request->export){
////            goi toi phan excel
//            return \Excel::download(new TransactionExport($transactions), time().'don-hang.CSV');
//        }

        $viewData = [
            'transactions' => $transactions,
            'query'        => $request->query()
        ];
        return view('user.transaction', $viewData);

    }
}
