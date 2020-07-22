<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (auth('admin')->check()) {
            return redirect()->route('admin.index');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');
        $remember_me = $request->remember_me ? true : false;
        if (Auth::guard('admin')->attempt($credential, $remember_me)) {
            // return 1;
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('status', 'Username or Password is invalid!');
    }
}
