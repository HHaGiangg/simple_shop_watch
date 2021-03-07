<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function getFormLogin()
    {
        $title_page = 'Đăng Nhập';
        return view('auth.login', compact('title_page'));
    }
    public function postFormLogin(RequestLogin $request)
    {
//        $data = $request->except('_token');

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return redirect()->back();
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
