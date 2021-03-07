<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;

class UserInforController extends Controller
{
   public function updateInfo()
   {
       return view('user.update_info');
   }
   public function saveUpdateInfo(UserRequestUpdateInfo $request)
   {
        $data = $request->except('_token');
        $user = User::find(\Auth::id());
        $user->update($data);

        return redirect()->back();
   }
}
