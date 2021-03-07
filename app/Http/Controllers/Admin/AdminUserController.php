<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $viewData =[
          'users' => $users
        ];
        return view('admin.user.index',$viewData);
    }
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) $user->delete();

        return redirect()->back();
    }
}
