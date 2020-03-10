<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {
        $arr = ['email' => $request->email, 'password' => $request->password];
        if ($request->remember='Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        };
        if (Auth::attempt($arr,$remember)) {
           return redirect()->intended('admin/home');
        } else {
            return back()->withInput()->with('error','your account no valid!');
        }
        return view('backend.login');
    }
}
