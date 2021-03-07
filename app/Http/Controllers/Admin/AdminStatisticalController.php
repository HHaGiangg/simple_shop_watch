<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminStatisticalController extends Controller
{
    public function index()
    {
        //Tổng sản phẩm
        $totalProducts = \DB::table('products')->select('id')->count();

        //Tổng đơn hàng
        $totalTransactions = \DB::table('transactions')->select('id')->count();

        //Tổng thành viên
        $totalUsers = \DB::table('users')->select('id')->count();

        //Tổng bài viết
        $totalArticles = \DB::table('articles')->select('id')->count();

        //Danh sách đơn hàng mới
        $transactions = Transaction::orderByDesc('id')
                            ->limit(10)
                            ->get();
        // Top sản phẩm xem nhiều
        $topViewproducts  = Product::orderByDesc('pro_view')
                            ->limit(10)
                            ->get();

        // Top sản phẩm bán chạy
        $topPayproducts  = Product::orderByDesc('pro_pay')
            ->limit(10)
            ->get();

        // Thống kê trạng thái đơn hàng
        //Tiếp nhận
        $transactionDefault = Transaction::where('tst_status',1)->select('id')->count();
        //Đang vận chuyển
        $transactionPocess = Transaction::where('tst_status',2)->select('id')->count();
        //Giao hàng thành công
        $transactionSuccess = Transaction::where('tst_status',3)->select('id')->count();
        //Giao hàng bị hủy
        $transactionCancel = Transaction::where('tst_status',-1)->select('id')->count();

        $statusTransactions = [
            [
                'Hoàn tất', $transactionSuccess, false
            ],
            [
                'Vận chuyển', $transactionPocess, false
            ],
            [
                'Tiếp nhận', $transactionDefault, false
            ],
            [
                'Hủy bỏ', $transactionCancel, false
            ],
        ];

        $viewData = [
            'totalTransactions' => $totalTransactions,
            'totalProducts'     => $totalProducts,
            'totalUsers'        => $totalUsers,
            'totalArticles'     => $totalArticles,
            'transactions'      => $transactions,
            'topViewproducts'   => $topViewproducts,
            'topPayproducts'    => $topPayproducts,
            'statusTransactions'=> json_encode($statusTransactions),


        ];
        return view('admin.statistical.index', $viewData);
    }
}
