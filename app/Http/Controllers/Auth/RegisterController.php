<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterSuccess;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function getFormRegister()
    {
        $title_page = 'Đăng Ký';
        return view('auth.register', compact('title_page'));
    }
    public function postFormRegister(RequestRegister $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);//Ma hoa password
        $data['created_at'] = Carbon::now();
        $id = User::insertGetId($data);
        if ($id){
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đăng ký thành công'
            ]);
            Mail::to($request->email)->send(new RegisterSuccess($request->name));
            if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication passed...
                return redirect()->intended('/');
            }
            return redirect()->route('get.login');
        }
        return redirect()->back();
    }
}
