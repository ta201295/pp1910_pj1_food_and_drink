<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }

    
    public function about()
    {
        return view('web.pages.about');
    }

    public function contact()
    {
        return view('web.pages.contact');
    }

    public function contactSend(Request $request)
    {
        Contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'content' => $request->get('content'),
        ]);

        return back()->with('success', 'Thanks for contacting us!');
    }
}




