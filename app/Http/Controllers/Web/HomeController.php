<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Product;

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
        $products = Product::all()->random(8);
        return view('web.index', compact('products'));
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

    public function changeLanguage($language)
    {
        //dd($language);
        //dd(\Session::put('website_language'));
        \Session::put('website_language', $language);

        config(['app.locale' => $language]);

        return redirect()->back();
    }
}




