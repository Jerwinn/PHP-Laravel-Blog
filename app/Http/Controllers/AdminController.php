<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

/**
 * This is a controller class for admin functions.
 */

class AdminController extends Controller
{
    /**
     * If returns the login view for admins.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function login()
    {
        return view('backend.login');
    }

    /**
     * Allows the admins credentials to be submitted for login.
     * @param Request $request username and password
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function loginSubmit(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid username or password');
        }

    }

    /**
     * Access Admin dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function adminDashboard(){
        return view('backend.dashboard');
    }

    /**
     * view if admin was the logout.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
