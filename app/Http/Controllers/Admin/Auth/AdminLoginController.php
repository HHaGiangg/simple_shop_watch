<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //Dang nhap
    public function getLoginAdmin()
    {
        return view('admin.auth.login');
    }

    //check middleware login cho admin(chi co admin moi dang nhap dc vao hthong admin)
    public function postLoginAdmin(Request $request)
    {
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/api-admin');
        }
        return redirect()->back();
    }

    //Dang xuat
    public function getLogoutAdmin()
    {
        \Auth::guard('admin')->logout();
        return redirect()->to('/');
    }



}
