<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\UserService;

class AccountController extends Controller
{
    protected $userService;

    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('web.user.account');
    }


    public function editProfile()
    {
        return view('web.user.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $this->userService->updateProfile($request);

        return redirect('/account')->with('success', 'Profile Updated');
    }

    public function myOrder()
    {
        $user_id = auth()->user()->id;
        $orders = Order::with('orders.product')->where('user_id', $user_id)->get();
        // $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;

        return view('web.user.order.index', compact('orders'));
    }
}
