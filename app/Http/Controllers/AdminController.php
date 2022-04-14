<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
    function login()
    {
        return view('backend.login');
    }

    function loginSubmit(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'password'
        ]);
        $userCheck = admin::where(['username' => $request->username, 'password' => $request->password])
            ->count();
        if($userCheck>0){
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error', 'Invalid Username or Password');
        }
    }

    function adminDashboard(){
        return view('backend.dashboard');
    }
}
