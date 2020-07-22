<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('web.user.password.index');
    }

    public function change(PasswordRequest $request)
    {
        if (!(Hash::check($request->current_password, auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
             return redirect()->back()->with("success","Password changed successfully !");
    }
}
